<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpressionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        - SentCount - Number
//        - OpenCount - Number
//        - ClickCount - Number
//        - BannerID - Number
//        - Campaign - Text - 500
//        - SentDate - Date
//        - BounceCount - Number
        Schema::create('impressions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('SentCount')->nullable();
            $table->string('OpenCount')->nullable();
            $table->string('ClickCount')->nullable();
            $table->string('BannerID')->nullable();
            $table->string('BannerName')->nullable();
            $table->string('Campaign')->nullable();
            $table->string('SentDate')->nullable();
            $table->string('BounceCount')->nullable();
            $table->string('StoredDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('impressions');
    }
}
