<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTaxonomyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //@TODO ADD FOREIGN KEY HERE FOR TEAM ID ?
        //DB::unprepared(file_get_contents(base_path('/database/migrations/import_categories.sql')));
//        //\DB::unprepared(file_get_contents(base_path('/database/migrations/sb_categories.sql')));
        Schema::create('categories_taxonomy', function(Blueprint $table) {
            // These columns are needed for Baum's Nested Set implementation to work.
            // Column names may be changed, but they *must* all exist and be modified
            // in the model.
            // Take a look at the model scaffold comments for details.
            // We add indexes on parent_id, lft, rgt columns by default.
            $table->increments('id');

            $table->integer('parent_id')->nullable()->index();
            $table->integer('lft')->nullable()->index();
            $table->integer('rgt')->nullable()->index();
            $table->integer('depth')->nullable();
            $table->integer('team_id')->unsigned()->default(1);

            // Add needed columns here (f.ex: name, slug, path, etc.)
            $table->string('name', 255);

            $table->timestamps();
        });

        Schema::table('categories_taxonomy', function(Blueprint $table) {
            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories_taxonomy');
    }
}
