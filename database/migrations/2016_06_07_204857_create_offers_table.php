<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Offer;
use Illuminate\Support\Facades\Log;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->integer('owner_id')->unsigned()->nullable();
            $table->integer('creator_id')->unsigned();

            $table->string('name');
            $table->string('description')->nullable();
            $table->longText('legal_display_copy')->nullable();
            $table->string('external_offer_id')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('offers', function ($table) {
            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');

            $table->foreign('owner_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

//        //for migrating from POMS
//        $old_offers_data = DB::table('poms_prod.offers')->get()->all();
//
//        foreach ($old_offers_data as $key => $offer) {
//
//            $migrated_offer = new Offer();
//
//            //same fields
//            $migrated_offer->id = $offer->id;
//            $migrated_offer->name = $offer->name;
//            $migrated_offer->description = $offer->description;
//            $migrated_offer->legal_display_copy = $offer->legal_display_copy;
//            $migrated_offer->external_offer_id = $offer->external_offer_id;
//            $migrated_offer->start_date = $offer->start_date;
//            $migrated_offer->end_date = $offer->end_date;
//            $migrated_offer->created_at = $offer->created_at;
//            $migrated_offer->updated_at = $offer->updated_at;
//            $migrated_offer->deleted_at = $offer->deleted_at;
//
//            //field mappings or differences
//            //offer_owner to creator_id
//            if ($offer->offer_owner) {
//                $offer_owner = DB::table('poms_prod.users')->where('name', $offer->offer_owner)->first();
//                if ($offer_owner) {
//                    $migrated_offer->owner_id = $offer_owner->id;
//                } else {
//                    $migrated_offer->owner_id = 1;
//                }
//            }
//
//            //company_id to team_id
//            $migrated_offer->team_id = $offer->company_id;
//
//            //creator_id did not exist
//            $migrated_offer->creator_id = 1;
//
//            $migrated_offer->save();
//        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('offers');
    }
}
