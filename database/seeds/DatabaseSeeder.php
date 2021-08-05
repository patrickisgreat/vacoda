<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(TeamSeeder::class);
//        $this->call(UserSeeder::class);
//        $this->call(OfferSeeder::class);
//        $this->call(RolesSeeder::class);
//        $this->call(OptionSeeder::class);
//        $this->call(TemplateSeeder::class);
//        $this->call(ThemeSeeder::class);
//        $this->call(BannerSeeder::class);
//        $this->call(CredentialSeeder::class);

        //$this->call('PerformanceIndicatorsTableSeeder');
        $this->call('AnnouncementsTableSeeder');
        $this->call('UsersTableSeeder');
        //$this->call('PasswordResetsTableSeeder');
        $this->call('ApiTokensTableSeeder');
        //$this->call('SubscriptionsTableSeeder');
        //$this->call('InvoicesTableSeeder');
        $this->call('NotificationsTableSeeder');
        $this->call('TeamsTableSeeder');
        $this->call('TeamUsersTableSeeder');
        //$this->call('InvitationsTableSeeder');
        $this->call('OptionTypesTableSeeder');
        $this->call('OptionsTableSeeder');
        $this->call('OfferSeeder');
        $this->call('TemplateSeeder');
        $this->call('NewTemplateSeeder');
        $this->call('ThemesTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call(CategorySeeder::class);
        $this->call('BannerSeeder');
        //$this->call('CredentialsTableSeeder');
        $this->call('CredentialSeeder');
        //$this->call('FailedJobsTableSeeder');
//        $this->call('BannerImagesTableSeeder');
        $this->call('AuditsTableSeeder');
        $this->call('AlertsTableSeeder');
        $this->call('PermissionsTableSeeder');
        $this->call('PermissionRoleTableSeeder');
        $this->call('RoleUserTableSeeder');

        //$this->call(TestUserSeeder::class);
        $this->call(AutoArchiveNotifySeeder::class);
        $this->call(VacodaSettingsSeeder::class);
        $this->call(CopyPermissionSeeder::class);
        $this->call(ImpressionTableSeeder::class);
    }
}
