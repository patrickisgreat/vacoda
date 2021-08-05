<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned()->default(1);
            $table->integer('program_id')->unsigned();
            $table->string('cell_label');
            $table->string('name', 255);
            $table->timestamps();
        });

        Schema::table('categories', function(Blueprint $table) {
            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');

            $table->foreign('program_id')
                ->references('id')
                ->on('programs')
                ->onDelete('cascade');
        });

        Schema::create('banner_category', function(Blueprint $table){
            $table->increments('id');
            $table->integer('banner_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->foreign('banner_id')
                ->references('id')
                ->on('banners')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });

        Schema::table('banners', function(Blueprint $table) {
            $table->string('campaign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('banner_category');
        Schema::drop('categories');
    }
}
