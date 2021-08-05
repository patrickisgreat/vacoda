<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Laravel\Spark\Spark;
use App\Team;
use App\User;
use Illuminate\Support\Facades\Log;

class CreateTeamUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_users', function (Blueprint $table) {
            $table->integer('team_id');
            $table->integer('user_id');
            $table->string('role', 20);

            $table->unique(['team_id', 'user_id']);
        });

//        //for migrating from POMS
//        $old_users = DB::table('poms_prod.users')->get()->all();
//
//
//        foreach ($old_users as $key => $user) {
//
//            $new_user = User::find($user->id);
//
//            if ($user->id === 1) {
//                $role = 'owner';
//            } else {
//                $role = '';
//            }
//
//            $team = Team::find($user->company_id);
//
//            if ($user->company_id === 1) {
//                //also add these to THD team
//                $thd_team = Team::find(3);
//
//                $thd_team->users()->attach($new_user, ['role' => $role]);
//            }
//
//            $team->users()->attach($new_user, ['role' => $role]);
//
//        }

        DB::statement('INSERT INTO `team_users` (`team_id`, `user_id`, `role`) VALUES
	(3, 95, \'\'),
	(3, 96, \'\'),
	(3, 97, \'\'),
	(3, 98, \'\');');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('team_users');
    }
}
