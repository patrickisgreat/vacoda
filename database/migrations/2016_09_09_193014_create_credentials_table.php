<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Credential;

class CreateCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //DB::unprepared(file_get_contents(base_path('/database/migrations/import_credentials.sql')));
//        $credentials = DB::table('credentials')->get()->all();
//        $credentials = collect($credentials);
//
//        $credentials->each( function($cred) {
//            $credential = Credential::where('id', $cred->id)->first();
//            $credential->xmlloc = base_path('vendor/digitaladditive/exacttarget-laravel/src/FuelSdkPhp/ExactTargetWSDL.xml');
//            $credential->save();
//        });
        Schema::create('credentials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->text('appsignature');
            $table->longtext('clientid');
            $table->longtext('clientsecret');
            $table->text('defaultwsdl');
            $table->text('xmlloc');
            $table->timestamps();
        });

        Schema::table('credentials', function(Blueprint $table) {
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
        Schema::drop('credentials');
    }
}
