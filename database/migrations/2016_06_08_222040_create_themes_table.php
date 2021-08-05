<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Log;
use App\Theme;


class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->integer('creator_id')->unsigned();

            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('font_color')->nullable();
            $table->string('font_color_secondary')->nullable();
            $table->string('cta_font_color')->nullable();
            $table->string('cta_bg_color')->nullable();
            $table->string('background_color')->nullable();

            $table->timestamps();
            $table->softDeletes();

        });

        Schema::table('themes', function (Blueprint $table) {
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
//        $old_themes_data = DB::table('poms_prod.themes')->get()->all();
//
//        foreach ($old_themes_data as $key => $theme) {
//
//            $migrated_theme = new Theme();
//
//            //same fields
//            $migrated_theme->id = $theme->id;
//            $migrated_theme->name = $theme->name;
//            $migrated_theme->font_color = $theme->font_color;
//            $migrated_theme->font_color_secondary = $theme->font_color_secondary;
//            $migrated_theme->cta_font_color = $theme->cta_font_color;
//            $migrated_theme->cta_bg_color = $theme->cta_bg_color;
//            $migrated_theme->background_color = $theme->background_color;
//            $migrated_theme->created_at = $theme->created_at;
//            $migrated_theme->updated_at = $theme->updated_at;
//            $migrated_theme->deleted_at = $theme->deleted_at;
//
//
//            //company_id to team_id
//            $migrated_theme->team_id = $theme->company_id;
//
//            //creator_id did not exist
//            $migrated_theme->creator_id = 1;
//
//            $migrated_theme->save();
//        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('themes');
    }
}
