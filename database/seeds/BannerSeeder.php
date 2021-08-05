<?php

use Illuminate\Database\Seeder;
use App\Offer;
use App\Banner;
use App\Status;
use Faker\Factory as Faker;

class BannerSeeder extends Seeder
{
    /**
     * Create banners for all offers using all templates
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $offers = Offer::all();
        $bannerCount = 1;
        $daysAgo = time() - 86400 * 120; // 120 days ago

        $ctas = [
            'SHOP NOW >',
            'LEARN MORE >',
            'SHOP ALL >'
        ];

        $statuses = [
            Status::pending,
            Status::approved,
            Status::denied,
        ];

        foreach ($offers as $offer) {
            $team = $offer->team()->firstOrFail();
            $templates = $team->templates()->get();
            $themes = $team->themes()->get();

            foreach ($templates as $template) {
                foreach ($themes as $theme) {
                    $start = date("Y-m-d H:i:s", $daysAgo);
                    $end = date("Y-m-d H:i:s", $daysAgo + 86400 * 7); // 7 days after start

                    $banner = $offer->banners()->save(new Banner([
                        'creator_id'         => 2,
                        'name'               => $faker->catchPhrase,
                        'description'        => $faker->bs,
                        'headline'           => $faker->catchPhrase,
                        'headline_font_size' => rand(16, 100),
                        'body'               => $faker->bs,
                        'body_font_size'     => rand(10, 30),
                        'cta'                => $faker->randomElement($ctas),
                        'url'                => 'http://example.com',
                        'status'             => $faker->randomElement($statuses),
                        'image_alt'          => $faker->bs,

                        'team_id'            => $team->id,
                        'template_id'        => $template->id,
                        'theme_id'           => $theme->id,
                        'start_date'         => $start,
                        'end_date'           => $end,
                    ]));

                    if ($team->id === 1) {
                        $banner->categories()->sync([rand(203, 209), rand(210, 216)]);
                    }

                    if ($team->id === 3) {
                        $banner->categories()->sync([rand(1, 100), rand(101, 200)]);
                    }

                    if ($bannerCount >= 50 && $bannerCount <= 70) {
                        $banner->start_date = date("Y-m-d H:i:s", time());
                        $banner->end_date = date("Y-m-d H:i:s", time() + 86400);
                        $banner->status = Status::approved;
                        $banner->save();
                    }

                    $bannerCount++;
                    $daysAgo = $daysAgo + 86400; // next banner starts a day later
                }
            }
        }
    }
}
