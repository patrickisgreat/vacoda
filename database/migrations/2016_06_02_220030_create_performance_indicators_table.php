<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


class CreatePerformanceIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        //first migration set up the copy of POMS PROD
//        DB::statement('CREATE DATABASE IF NOT EXISTS poms_prod');
//
//        //Artisan::call('make:pomsdump', []);
//        DB::connection('mysql_migration')->unprepared(file_get_contents(base_path('database/migrations/poms_prod_dump.sql')));


        Schema::create('performance_indicators', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('monthly_recurring_revenue');
            $table->decimal('yearly_recurring_revenue');
            $table->decimal('daily_volume');
            $table->integer('new_users');
            $table->timestamps();
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('performance_indicators');
    }
}
