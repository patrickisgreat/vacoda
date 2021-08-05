<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Offer;


class AddDepartmentToOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offers', function ($table) {
            $table->integer('department_id')->unsigned()->nullable();
        });

        Schema::table('offers', function ($table) {
            $table->foreign('department_id')
                ->references('id')
                ->on('options')
                ->onDelete('cascade');
        });

//        //for migrating from POMS
//        $old_offers_data = DB::table('poms_prod.offers')->get()->all();
//
//        foreach ($old_offers_data as $key => $offer) {
//
//            $existing_offer = Offer::find($offer->id);
//
//            if ($offer->department_id && $existing_offer) {
//                $existing_offer->department_id = $offer->department_id;
//                $existing_offer->save();
//            }
//
//        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offers', function ($table) {
            $table->dropForeign(['department_id']);
        });
    }
}
