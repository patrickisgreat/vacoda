<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->text('photo_url')->nullable();
            $table->tinyInteger('uses_two_factor_auth')->default(0);
            $table->string('authy_id')->nullable();
            $table->string('country_code', 10)->nullable();
            $table->string('phone', 25)->nullable();
            $table->string('two_factor_reset_code', 100)->nullable();
            $table->integer('current_team_id')->nullable();
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
            $table->timestamp('last_read_announcements_at')->nullable();
            $table->timestamps();
        });
//
//        //for migrating from POMS
//        $old_user_data = DB::table('poms_prod.users')->get()->all();
//
//        foreach ($old_user_data as $key => $user) {
//
//            $migrated_user = new User();
//
//            $migrated_user->fill((array) $user);
//
//            $migrated_user->id = $user->id;
//            $migrated_user->password = $user->password;
//
//            $migrated_user->save();
//        }

        DB::statement('INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `photo_url`, `uses_two_factor_auth`, `authy_id`, `country_code`, `phone`, `two_factor_reset_code`, `current_team_id`, `stripe_id`, `current_billing_plan`, `card_brand`, `card_last_four`, `card_country`, `billing_address`, `billing_address_line_2`, `billing_city`, `billing_state`, `billing_zip`, `billing_country`, `vat_id`, `extra_billing_information`, `trial_ends_at`, `last_read_announcements_at`, `created_at`, `updated_at`) VALUES
	(95, \'THD Reviewer\', \'thd-reviewer@example.com\', \'$2y$10$xYVt92cH.VYb007eadOAguk0doixBvsMb7VxLJzBkpsk0DBO/rYcO\', NULL, NULL, 0, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, \'2016-11-17 03:36:34\', \'2016-11-17 13:21:20\'),
	(96, \'THD Creator\', \'thd-creator@example.com\', \'$2y$10$xYVt92cH.VYb007eadOAguk0doixBvsMb7VxLJzBkpsk0DBO/rYcO\', NULL, NULL, 0, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, \'2016-11-17 03:36:34\', \'2016-11-17 13:21:20\'),
	(97, \'THD Viewer\', \'thd-viewer@example.com\', \'$2y$10$xYVt92cH.VYb007eadOAguk0doixBvsMb7VxLJzBkpsk0DBO/rYcO\', NULL, NULL, 0, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, \'2016-11-17 03:36:34\', \'2016-11-17 13:21:20\'),
	(98, \'THD Company Admin\', \'thd-company-admin@example.com\', \'$2y$10$xYVt92cH.VYb007eadOAguk0doixBvsMb7VxLJzBkpsk0DBO/rYcO\', NULL, NULL, 0, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, \'2016-11-17 03:36:34\', \'2016-11-17 13:21:20\');
      ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
