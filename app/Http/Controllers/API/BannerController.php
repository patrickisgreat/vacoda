<?php

namespace App\Http\Controllers\API;

use Log;
use App\Team;
use App\Offer;
use Validator;
use App\Banner;
use App\Status;
use App\Template;
use Carbon\Carbon;
use App\VacodaSettings;
use App\AddImageToBanner;
use Illuminate\Http\Request;
use App\Jobs\ExportBannerImage;
use App\Jobs\BannerNotification;
use App\Jobs\CreateBannerInExactTarget;
use App\Jobs\UpdateBannerInExactTarget;
use App\Jobs\UploadBannerImageToExactTarget;


/**
 * Class BannerController
 * @package App\Http\Controllers\API
 */
class BannerController extends ResourceController
{
    protected $team_id;

    public function __construct(Banner $model)
    {
        $this->resource = $model;

        $this->rules = [
            // details
            'offer_id'           => 'required|integer',
            'name'               => 'required|max:255',
            'description'        => 'max:255',
            'start_date'         => 'required',
            'end_date'           => 'required',

            // category
            'categories'         => 'required',

            // template
            'template_id'        => 'required|integer',

            // theme
            'theme_id'           => 'required|integer',

            // contents
            'headline'           => 'required|string|max:255',
            'headline_font_size' => 'integer',
            //'sub_headline'       => 'string|max:255',
            'body'               => 'string|max:255',
            'body_font_size'     => 'integer',
            'cta'                => 'string|max:255',
            'url'                => 'required|url',
            //'disclaimer'         => 'string|max:255',
            'legal_copy'         => 'string',
            'image_file_name'    => '',
            'image_alt'          => '',
            'export_image'       => '',
        ];

        $this->middleware(function ($request, $next) {
            $this->request = $request;

            // because null user in artisan session breaks artisan route:list
            $this->team_id = null;

            if ($this->request->user()) {
                $this->team_id = $this->request->user()->currentTeam->id;
            }

            $this->fields = [
                'team_id'            => $this->team_id,

                // details
                'offer_id'           => $this->request->offer_id,
                'name'               => $this->request->name,
                'description'        => $this->request->description,
                'start_date'         => $this->request->start_date,
                'end_date'           => $this->request->end_date,

                // category
                'categories'         => $this->request->categories,
                'campaign'           => $this->request->categories,

                // template
                'template_id'        => $this->request->template_id,

                // theme
                'theme_id'           => $this->request->theme_id,

                // contents
                'headline'           => $this->request->headline,
                'headline_font_size' => $this->request->headline_font_size,
                //'sub_headline'       => $this->request->sub_headline,
                'body'               => $this->request->body,
                'body_font_size'     => $this->request->body_font_size,
                'cta'                => $this->request->cta,
                'url'                => $this->request->url,
                //'disclaimer'         => $this->request->disclaimer,
                'legal_copy'         => $this->request->legal_copy,
                'image_file_name'    => $this->request->image_file_name,
                'image_alt'          => $this->request->image_alt,
                'status'             => $this->request->status,
                'compiled_html'      => $this->request->compiled_html,
                'export_image'       => $this->request->export_image,
                'updated_at'         => $this->request->updated_at
            ];

            return $next($request);
        });
    }

    /**
     * Display a listing of the Banners.
     *
     * @return Response
     */
    public function index($team_id = null)
    {
        $start = $this->request->input('start');
        $end = $this->request->input('end');

        if ($start && $end) {
            // find all active banners for current team that occur within date range
            return $this->resource->where([
                ['team_id', '=', $this->team_id],
                ['status', '=', 'Approved'],
            ])->where(function ($query) use ($start, $end) {
                $query->whereBetween('start_date', [$start, $end])
                    ->orWhereBetween('end_date', [$start, $end])
                    ->orWhere([
                        ['start_date', '<=', $start],
                        ['end_date', '>=', $end],
                    ]);
            })->with('offer', 'offer.department')->get();
        }

        if ($team_id) {
            return $this->resource->where('team_id', $team_id)->with('offer', 'offer.department')->get();
        }

        return $this->resource->where('team_id', $this->team_id)->with('offer', 'offer.department')->get();
    }

    /**
     * Display a listing of the archived Banners.
     *
     * @return Response
     */
    public function archived($team_id = null)
    {
        if ($team_id) {
            return $this->resource->onlyTrashed()->where('team_id', $team_id)
                ->with(['offer' => function($query) {
                    $query->withTrashed();
                }, 'offer.department'])->get();
        }

        return $this->resource->onlyTrashed()->where('team_id', $this->team_id)
            ->with(['offer' => function($query) {
                $query->withTrashed();
            }, 'offer.department'])->get();
    }

    /**
     * Display the specified Banner.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return $this->resource->withTrashed()->with('banner_image', 'offer')->findOrFail($id);
    }

    /**
     * Store a newly created Banner.
     *
     * @return Response
     */
    public function store()
    {
        $this->set_validation_rules($this->fields['template_id']);
        $this->doValidation();
        $this->fields['creator_id'] = $this->request->user()->id;
        $categories = $this->fields['categories'];
        unset($this->fields['categories']);

        $resource = new $this->resource();
        $resource->fill($this->fields);
        $resource->status = Status::pending;

        try {
            $this->update_offer_dates($resource);

            $created = $resource->save() ? 'true' : 'false';
            $resource->categories()->sync($categories);

            return response()->json([
                'created' => $created,
                'id'      => "{$resource->id}"
            ]);

        } catch (Exception $e) {
            return response()->json([
                'created' => 'false',
                'error'   => $e
            ]);
        }
    }

    /**
     * adds or subtracts from base validation
     * rules based on template type
     */
    public function set_validation_rules($template_id)
    {
        if ($template_id) {
            $template = Template::where('id', $template_id)->firstOrFail();

            if ($template->is_image) {
                $this->rules['image_alt'] = 'required';
                $this->rules['image_path'] = 'required';
                $this->rules['theme_id'] = '';
                $this->rules['headline'] = 'string|max:255';

                return true;
            }

            if (!$template->has_themes) {
                $this->rules['theme_id'] = '';
                return true;
            }
        }
    }

    /**
     * Update the specified Banner.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id = null, $team_id = null)
    {
        try {
            $this->set_validation_rules($this->fields['template_id']);
            $this->doValidation();
            $url = config('app.protocol') . config('app.domain') . '/banner/' . $id;
            $banner = Banner::where('id', $id)->firstOrFail();
            $savedStatus = $banner->status;
            $banner->fill($this->fields);

            //set array for syncing to SFMC because categories does not exist there
            $banner_for_sfmc = $banner->toArray();
            unset($banner_for_sfmc['categories']);

            // recycle a banner
            if ($savedStatus == Status::pending && $this->fields['status'] == Status::denied || $savedStatus == Status::approved && $this->fields['status'] == Status::denied) {
                $banner->status = Status::denied;
                $banner_for_sfmc['status'] = 'Denied';
                $this->dispatch(new UpdateBannerInExactTarget($banner_for_sfmc, $this->team_id));
                $this->dispatch(new BannerNotification($id, $banner->status, $url));
            } else {
                if ($savedStatus == Status::approved && $this->fields['status'] == Status::approved) {
                    $banner->status = Status::pending;
                    $banner_for_sfmc['status'] = 'Pending';
                    $this->dispatch(new UpdateBannerInExactTarget($banner_for_sfmc, $this->team_id));
                    Log::info('notifying');
                    $this->dispatch(new BannerNotification($id, $banner->status, $url));
                }
            }

            // notify a user when the status has changed
            if ($savedStatus !== $this->fields['status'] && $this->fields['status'] == Status::processing) {
                $banner->status = Status::approved;
                $banner_for_sfmc['status'] = 'Approved';
                Log::info('status change');

                if ($this->fields['export_image']) {
                    Log::info('export_image true');
                    $this->dispatch(new ExportBannerImage($id));
                }


                if (empty($banner->compiled_html)) {
                    $this->dispatch(new CreateBannerInExactTarget($banner_for_sfmc, $this->team_id));
                } else {
                    $this->dispatch(new UpdateBannerInExactTarget($banner_for_sfmc, $this->team_id));
                }
                Log::info('THIS RIGHT HERE');
                Log::info($banner->banner_image);
                if (isset($banner->banner_image->path)) {
                    $this->dispatch(new UploadBannerImageToExactTarget($banner->banner_image->path,
                        $banner->banner_image->name, $this->team_id, $banner_for_sfmc));
                }

                Log::info('notifying');
                $this->dispatch(new BannerNotification($id, $banner->status, $url));

            } else {
                if ($banner->status !== $this->fields['status']) {
                    Log::info('notifying');
                    $this->dispatch(new BannerNotification($id, $banner->status, $url));
                }
            }

            $this->update_offer_dates($banner);

            $updated = $banner->save() ? 'true' : 'false';


            return response()->json([
                'updated' => $updated,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'updated' => 'false',
                'error'   => $e
            ]);
        }
    }

    /**
     * Remove the specified Banner.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $banner_to_archive = $this->resource->findOrFail($id);

            $banner_to_archive->status = Status::archived;

            $banner_to_archive->save();

            $banner_for_sfmc = $banner_to_archive->toArray();
            unset($banner_for_sfmc['categories']);

            $this->dispatch(new UpdateBannerInExactTarget($banner_for_sfmc, $this->team_id));

            $destroyed = $banner_to_archive->delete() ? 'true' : 'false';

            return response()->json([
                'destroyed' => $destroyed,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'destroyed' => 'false',
                'error'     => $e
            ]);
        }

    }

    /**
     * Restore the specified archived Banner.
     *
     * @param  int $id
     * @return Response
     */
    public function restore($id)
    {
        try {
            $banner_to_restore = $this->resource->withTrashed()->findOrFail($id);
            $banner_to_restore->status = Status::pending;

            $banner_to_restore->offer()->restore();
            $restored = $banner_to_restore->restore() ? 'true' : 'false';

            return response()->json([
                'restored' => $restored,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'restored' => 'false',
                'error'    => $e
            ]);
        }
    }

    /**
     * Upload a banner image.
     *
     * @param  int $id
     * @return Response
     */
    public function uploadImage($id)
    {
        if ($this->request->hasFile('image')) {
            $image = $this->request->file('image');

            if ($image->isValid()) {
                $files = ['image' => $image];
                $rules = ['image' => 'mimes:jpeg,jpg,png,gif|required|max:1000'];
                $validator = Validator::make($files, $rules);

                if ($validator->passes()) {
                    $banner = Banner::where('id', $id)->firstOrFail();
                    $bannerImage = new AddImageToBanner($banner, $image);
                    $uploaded = $bannerImage->save() ? 'true' : 'false';

                    return response()->json(['uploaded' => $uploaded]);

                } else {
                    return response()->json([
                        'uploaded' => 'false',
                        'error'    => $validator->errors()->getMessages()
                    ], 400);
                }

            } else {
                return response()->json([
                    'uploaded' => 'false',
                    'error'    => 'upload-fail'
                ], 400);
            }

        } else {
            return response()->json([
                'uploaded' => 'false',
                'error'    => 'no-file'
            ], 400);
        }
    }

    /**
     * Display the specified Banner's rendered HTML.
     *
     * @param  int $id
     * @return Response
     */
    public function html($id)
    {
        $banner = $this->resource->with('banner_image', 'offer')->findOrFail($id);

        return view('components.banners.banner-html', ['banner' => $banner]);
    }


    /**
     * Updates related offer dates on Banner Save
     * When a user changes banner dates to something that is outside the current offer active dates, the offer dates should update automatically.
     */
    public function update_offer_dates($banner) {
        $active_date_precedence = VacodaSettings::where('team_id', $this->team_id)->firstOrFail()->active_date_precedence;

        if ($active_date_precedence === "banner") {
            // get the related offer
            $offer = $banner->offer()->firstOrFail();

            // normalize date formats for comparison
            $banner_start = Carbon::parse($banner->start_date);
            $banner_end = Carbon::parse($banner->end_date);
            $offer_start = Carbon::parse($offer->start_date);
            $offer_end = Carbon::parse($offer->end_date);

            $offerUpdated = false;

            if ($banner_start->lt($offer_start)) {
                $offer->start_date = $banner_start;
                $offerUpdated = true;
            }

            if ($banner_end->gt($offer_end)) {
                $offer->end_date = $banner_end;
                $offerUpdated = true;
            }

            if ($offerUpdated) {
                $offer->save();
            }
        }
    }
}
