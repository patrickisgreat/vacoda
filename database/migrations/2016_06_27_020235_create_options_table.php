<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Log;
use App\Team;
use App\Option;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->integer('option_type_id')->unsigned();
            $table->integer('creator_id')->unsigned();

            $table->string('name');
            $table->string('abbreviation')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('options', function (Blueprint $table) {
            $table->foreign('option_type_id')
                ->references('id')
                ->on('option_types')
                ->onDelete('cascade');

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
//        $old_options_data = DB::table('poms_prod.options')->get()->all();
//
//        foreach ($old_options_data as $key => $option) {
//
//            $migrated_option = new Option();
//
//            //same fields
//            $migrated_option->id = $option->id;
//            $migrated_option->name = $option->name;
//            $migrated_option->abbreviation = $option->abbreviation;
//            $migrated_option->created_at = $option->created_at;
//            $migrated_option->updated_at = $option->updated_at;
//
//            //field mappings or differences
//
//            //creator_id did not exist
//            $migrated_option->creator_id = 1;
//
//            //team_id
//            $old_relationship = DB::table('poms_prod.company_option')->get()->all();
//
//            foreach($old_relationship as $relationship) {
//                if ($option->id == $relationship->option_id) {
//                    $migrated_option->team_id = $relationship->company_id;
//                }
//            }
//
//            //option_type_id
//            $old_relationship = DB::table('poms_prod.option_option_type')->get()->all();
//
//            foreach($old_relationship as $relationship) {
//                if ($option->id == $relationship->option_id) {
//                    $migrated_option->option_type_id = $relationship->option_type_id;
//                }
//                else {
//                    $migrated_option->option_type_id = 1;
//                }
//            }
//
//            $migrated_option->save();
//        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('options');
    }
}
