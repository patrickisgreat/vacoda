<?php

use Illuminate\Database\Seeder;

use App\User;

class AutoArchiveNotifySeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $thdUsersToNotify = User::whereIn('name', [
            'Ben Yarbrough',
            'Zach Lang',
            'Patrick Bennett',
            'Claire Cadena',
            'Abby Major',
            'Jennie Woolley',
            'Julia Arpag',
            'Marcus Macon',
            'Lindsey Gregory',
            'Jessica Higgins',
            'Bridget Hunt',
            'Jess Graber',
        ])->get();

        foreach ($thdUsersToNotify as $thdUser) {
            $thdUser->teams()->updateExistingPivot(3, ['role' => 'auto-archive-notify']);
        }
    }
}
