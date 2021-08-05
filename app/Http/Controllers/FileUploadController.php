<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Controller;
use Illuminate\Cache\Repository;
use App\Jobs\ImportCategoriesJob;
use App\Jobs\ImportOffersJob;
use Maatwebsite\Excel\Excel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\Option;
use Exception;
use Validator;
use App\Offer;
use App\Team;
use Log;

class FileUploadController extends Controller
{

    /**
     * @var string
     */
    protected $destinationPath;


    /**
     * @var Repository
     */
    protected $cache;

    /**
     * @var CategoryRepository
     */
    public $categoryRepo;

    /**
     * @var int
     */
    public $teamId;

    /**
     * @var array
     */
    public $spreadsheet_rows;


    /**
     * FileUploadController constructor.
     * @param Repository $cache
     * @param CategoryRepository $categoryRepository
     */
    function __construct(CategoryRepository $categoryRepo)
    {
        $this->destinationPath = 'storage/tmp';
        $this->categoryRepo = $categoryRepo;
    }


    /**
     * Push the import onto the Beanstalk Queue
     *
     * @param Request $request
     * @param Application $app
     * @param Excel $excel
     * @return Exception|mixed
     */
    public function dispatchImport($uploadType = null, Request $request, Application $app, Excel $excel)
    {
        try {
            $teamId = $request->user()->currentTeam->id;
            $userId = $request->user()->id;

            $fileName = 'temp.xls';
            $request->file('spreadsheet')->move($this->destinationPath, $fileName);

            $import_controller_instance = new SpreadsheetImportController($app, $excel);
            $spreadsheet_rows = $import_controller_instance->get();

            if ($uploadType == "categories") {
                $this->dispatch(new ImportCategoriesJob($teamId, $spreadsheet_rows));

                return back();
            }

            if ($uploadType == 'offers') {
                $this->dispatch(new ImportOffersJob($teamId, $spreadsheet_rows, $userId));

                return back();
            }

        } catch (Exception $e) {
            Log::info($e);

            return $e;
        }
    }


    /**
     * Create the nested set
     *
     * @param $teamId
     * @param $all_rows_from_spreadsheet
     * @return Exception
     */
    public function createImportedCategories($teamId, $all_rows_from_spreadsheet)
    {
        $all_rows_from_spreadsheet = collect($all_rows_from_spreadsheet);
        $categoryRepo = $this->categoryRepo;

        try {
            $all_rows_from_spreadsheet->each(function ($row_of_categories) use ($teamId, $categoryRepo) {
                $row_of_categories->each(function ($category, $level) use ($teamId, $row_of_categories, $categoryRepo) {

                    $row_of_categories = $row_of_categories->toArray();
                    $depth = array_search($level, array_keys((array)$row_of_categories));
                    $does_this_category_already_exist = CategoryRepository::find($category, $depth, $teamId);

                    if ($category && $does_this_category_already_exist == null) {
                        return ${"category" . $level} = $categoryRepo->save($category, $depth, $teamId);
                    }

                });
            });

        } catch (Exception $e) {
            return response()->json($e);
        }
    }
}
