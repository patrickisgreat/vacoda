<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Banner;
use App\BannerImage;

class CreateBannerImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('banner_id')->unsigned();
            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('cascade');
            $table->string('name');
            $table->string('path');
            $table->timestamps();
            $table->softDeletes();
        });

//        //for migrating from POMS
//        $old_banner_images_data = DB::table('poms_prod.banner_images')->get()->all();
//
//        foreach ($old_banner_images_data as $key => $banner_image) {
//
//            $migrated_banner_image = new BannerImage();
//
//            //same fields
//            $migrated_banner_image->id = $banner_image->id;
//            $migrated_banner_image->banner_id = $banner_image->banner_id;
//            $migrated_banner_image->name = $banner_image->name;
//
//            //field mappings or differences
//            $prod_path = '/home/forge/vacoda.io/current/public/uploads/banner-images/';
//            $migrated_banner_image->path = $prod_path.$banner_image->name;
//
//            $migrated_banner_image->save();
//        }
//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('banner_images');
    }
}
