<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Banner;

class MigrateMissingBannerFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        $old_banners_data = DB::table('poms_prod.banners')->get()->all();
//
//        foreach ($old_banners_data as $key => $old_banner) {
//            $migrated_banner = Banner::withTrashed()->where('id', $old_banner->id)->first();
//
//            if ($migrated_banner) {
//                $migrated_banner->subcategory = $old_banner->subcategory;
//                $migrated_banner->body_font_size = $old_banner->body_font_size;
//                $migrated_banner->save();
//            }
//        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
