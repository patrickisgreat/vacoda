<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       //DB::unprepared(file_get_contents(base_path('/database/migrations/import_templates.sql')));

        Schema::create('templates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->integer('creator_id')->unsigned();

            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->longtext('html')->nullable();
            $table->longtext('css')->nullable();
            $table->boolean('is_image')->nullable();
            $table->boolean('has_cta')->default(true)->nullable();

            $table->string('width_desktop')->nullable();
            $table->string('width_mobile')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('templates', function (Blueprint $table) {
            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

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
        Schema::drop('templates');
    }
}
