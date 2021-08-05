<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Status;
use Illuminate\Support\Facades\Log;
use App\Banner;
use App\User;
use App\Team;
use App\Offer;
use Illuminate\Support\Facades\DB;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('offer_id')->unsigned();
            $table->integer('creator_id')->unsigned();
            $table->integer('template_id')->unsigned()->nullable();
            $table->integer('theme_id')->unsigned()->nullable();
            $table->integer('team_id')->unsigned();

            // details
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('subcategory')->nullable();
            $table->string('sub_category_chain')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->boolean('display_end_date')->nullable();

            // contents
            $table->string('headline')->nullable();
            $table->string('headline_font_size')->nullable();
            //$table->string('sub_headline')->nullable();
            $table->string('body')->nullable();
            $table->string('body_font_size')->nullable();
            $table->string('cta')->nullable();
            //$table->string('disclaimer')->nullable();
            $table->string('url')->nullable();
            $table->longText('legal_copy')->nullable();
            $table->string('image_file_name')->nullable();
            $table->string('image_alt')->nullable();

            $table->string('status')->nullable();
            $table->mediumText('denial_comments')->nullable();
            $table->longText('compiled_html')->nullable();
            $table->mediumText('sfmc_image_url')->nullable();
            $table->integer('auto_archived')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('banners', function(Blueprint $table) {
            $table->foreign('offer_id')
                ->references('id')
                ->on('offers')
                ->onDelete('cascade');

            $table->foreign('template_id')
                ->references('id')
                ->on('templates')
                ->onDelete('cascade');

            $table->foreign('theme_id')
                ->references('id')
                ->on('themes')
                ->onDelete('cascade');

            //set up foreign key(s)
            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');
        });

//        //for migrating from POMS
//        $old_banners_data = DB::table('poms_prod.banners')->get()->all();
//
//        foreach ($old_banners_data as $key => $banner) {
//
//            $migrated_banner = new Banner();
//
//            //same fields
//            $migrated_banner->id = $banner->id;
//            $migrated_banner->offer_id = $banner->offer_id;
//
//
//            $migrated_banner->theme_id = $banner->theme_id;
//            $migrated_banner->name = $banner->name;
//            $migrated_banner->description = $banner->description;
////            $migrated_banner->subcategory = $banner->legal_display_copy;
////            $migrated_banner->sub_category_chain = $banner->external_banner_id;
//            $migrated_banner->start_date = $banner->start_date;
//            $migrated_banner->end_date = $banner->end_date;
//            $migrated_banner->display_end_date = $banner->display_end_date;
//            $migrated_banner->headline = $banner->headline;
//            $migrated_banner->headline_font_size = $banner->headline_font_size;
//            $migrated_banner->sub_headline = $banner->sub_headline;
//            $migrated_banner->body = $banner->body;
//            $migrated_banner->cta = $banner->cta;
//            $migrated_banner->url = $banner->url;
//            $migrated_banner->image_file_name = $banner->image_file_name;
//            $migrated_banner->image_alt = $banner->image_alt;
//            $migrated_banner->legal_copy = $banner->legal_copy;
//            $migrated_banner->disclaimer = $banner->disclaimer;
//            $migrated_banner->status = $banner->status;
//            $migrated_banner->denial_comments = $banner->denial_comments;
//            $migrated_banner->compiled_html = $banner->compiled_html;
//            $migrated_banner->created_at = $banner->created_at;
//            $migrated_banner->updated_at = $banner->updated_at;
//            $migrated_banner->deleted_at = $banner->deleted_at;
//
//            //field mappings or differences
//
//            //subCategory Chain be wrong
//            $sub_cat = (array) json_decode($banner->sub_category_chain);
//
//            $new_category_array = [];
//
//            foreach ($sub_cat as $cat) {
//                array_push($new_category_array, $cat);
//            }
//
//            $migrated_banner->sub_category_chain = json_encode($new_category_array);
//
//            //template_id
//
//            if ($banner->template_id == 4) {
//                $migrated_banner->template_id = 5;
//            }
//
//            if ($banner->template_id == 7) {
//                $migrated_banner->template_id = 9;
//            }
//
//            if ($banner->template_id == 8) {
//                $migrated_banner->template_id = 11;
//            }
//
//            if ($banner->template_id == 9) {
//                $migrated_banner->template_id = 12;
//            }
//
//            if ($banner->template_id == 10) {
//                $migrated_banner->template_id = $banner->template_id;
//            }
//
//            //creator_id
//            $migrated_banner->creator_id = $banner->user_id;
//
//            //company_id to team_id
//            $associated_offer = Offer::find($banner->offer_id);
//
//            if ($associated_offer) {
//                $migrated_banner->team_id = $associated_offer->team_id;
//            }
//            else {
//                $migrated_banner->team_id = 1;
//            }
//
//
//            $migrated_banner->save();
//
//            //set Banners with soft deleted Offers to also be soft deleted
//        }
//        DB::update("UPDATE banners SET deleted_at=now() WHERE offer_id in (SELECT id FROM offers WHERE deleted_at IS NOT NULL)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('banners');
    }
}
