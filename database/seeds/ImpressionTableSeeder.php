<?php

use App\Impression;
use Illuminate\Database\Seeder;
use App\Impressions;
use App\Category;
use App\Banner;
use Carbon\Carbon;
use Faker\Factory as Faker;

class ImpressionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $all_banners = Banner::with('categories')->get();

        $all_banners->each(function($banner, $key) use ($faker) {
            if (!empty($banner->categories)) {
                $banner->categories()->get()->each(function($category, $key) use ($banner, $faker) {
                    $start = $banner->start_date;
                    $end = $banner->end_date;

                    // create between 1 and 5 impressions for this banner.category
                    $impressionCount = rand(1, 5);

                    // dates that have already been used for this banner.category
                    $impressionDates = [];

                    for ($i = 0; $i < $impressionCount; $i++) {
                        // get a random date between banner start and end as a Carbon instance
                        $sentDate = Carbon::instance($faker->dateTimeBetween($start, $end)->setTime(0, 0, 0));

                        // avoid duplicate records for the same date
                        if (!in_array($sentDate, $impressionDates)) {
                            // random values for data points
                            $send = rand(10000, 100000);
                            $bounce = rand(500, 5000); // lowestSend / 2 = max (half can bounce)
                            $open = rand(250, 4999); // lowestSend - highestBounce - 1 = max
                            $click = rand(10, 249); // lowestOpen - 1 = max

                            // create record if a previous loop hasn't already created one for this sentDate
                            $impression = new Impression([
                                'SentCount'   => $send,
                                'BounceCount' => $bounce,
                                'OpenCount'   => $open,
                                'ClickCount'  => $click,
                                'BannerID'    => $banner->id,
                                'BannerName'  => $banner->name,
                                'Campaign'    => $category->cell_label,
                                'SentDate'    => $sentDate,
                                'StoredDate'  => Carbon::now(),
                                'created_at'  => Carbon::now(),
                                'updated_at'  => Carbon::now(),
                            ]);

                            $impression->save();

                            // add this date to used dates array
                            array_push($impressionDates, $sentDate);
                        }
                    }
                });
            }
        });
    }
}
