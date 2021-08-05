<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\OptionType;
use App\Team;

class CreateOptionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('creator_id')->unsigned();
            $table->integer('team_id')->unsigned();

            $table->string('name');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('option_types', function (Blueprint $table) {
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
//        $old_option_types_data = DB::table('poms_prod.option_types')->get()->all();
//
//        $current_teams = Team::get();
//
//        foreach ($old_option_types_data as $key => $option_type) {
//
//            $migrated_option_type = new OptionType();
//
//            //same fields
//            $migrated_option_type->id = $option_type->id;
//            $migrated_option_type->name = $option_type->type;
//
//            $migrated_option_type->created_at = $option_type->created_at;
//            $migrated_option_type->updated_at = $option_type->updated_at;
//            $migrated_option_type->deleted_at = $option_type->deleted_at;
//
//            //field mappings or differences
//
//            //creator_id did not exist
//            $migrated_option_type->creator_id = 1;
//
//            //team_id
//            if ($option_type->type == 'departments') {
//                $migrated_option_type->team_id = 3;
//            }
//            else {
//                $migrated_option_type->team_id =1;
//            }
//
//            $migrated_option_type->save();
//        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('option_types');
    }
}
