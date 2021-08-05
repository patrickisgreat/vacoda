<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Team;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->index();
            $table->string('name');
            $table->text('photo_url')->nullable();
            $table->string('stripe_id')->nullable();
            $table->string('current_billing_plan')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->string('card_country')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_address_line_2')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_zip', 25)->nullable();
            $table->string('billing_country', 2)->nullable();
            $table->string('vat_id', 50)->nullable();
            $table->text('extra_billing_information')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamps();
        });

//        //for migrating from POMS
//        $old_company_data = DB::table('poms_prod.companies')->get()->all();
//
//        foreach ($old_company_data as $key => $company) {
//
//            $migrated_team = new Team();
//
//            //same fields
//            $migrated_team->id = $company->id;
//            $migrated_team->name = $company->name;
//            $migrated_team->created_at = $company->created_at;
//            $migrated_team->updated_at = $company->updated_at;
//
//            //field mappings or differences
//
//            //da_executive
//            if ($company->da_executive) {
//                $da_executive = DB::table('poms_prod.users')->where('name', $company->da_executive)->first();
//                $migrated_team->owner_id = $da_executive->id;
//            } else {
//                $migrated_team->owner_id = 1;
//            }
//
//            $migrated_team->save();
//        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teams');
    }
}
