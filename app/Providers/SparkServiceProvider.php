<?php

namespace App\Providers;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Spark\Spark;
use App\User;
use App\Role;
use Debugbar;
use Schema;
use Log;


class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Digital Additive',
        'product' => 'Vacoda',
        'street' => '1075 Zonolite Road, Suite 1d',
        'location' => 'Atlanta, GA 30306',
        'phone' => '404-551-5558',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = 'support@vacoda.io';

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'ben.yarbrough@digitaladditive.com',
        'zach.lang@digitaladditive.com',
        'patrick.bennett@digitaladditive.com',
        'alex.cobb@digitaladditive.com',
        'patrickisgreat@gmail.com',
        'kevin.moran@digitaladditive.com',
        'claire.cadena@digitaladditive.com',
        'maggie.martin@digitaladditive.com',
        'da-super-admin@example.com',
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
//        Spark::useStripe()->noCardUpFront()->trialDays(10);
//
//        Spark::freePlan()
//            ->features([
//                'First', 'Second', 'Third'
//            ]);
//
//        Spark::plan('Basic', 'provider-id-1')
//            ->price(10)
//            ->features([
//                'First', 'Second', 'Third'
//            ]);
//
//        Spark::plan('Mid', 'provider-id-1')
//            ->price(20)
//            ->features([
//                'First', 'Second', 'Third'
//            ]);

        if (Schema::hasTable('roles')) {
            $allRoles = Role::all();

            $roles = [];

            foreach ($allRoles as $key => $value) {

                $roles[$key]['id'] = $value->id;
                $roles[$key]['name'] = $value->name;
                $roles[$key]['label'] = $value->label;
                $roles[$key]['team_id'] = $value->team_id;
            }
            Spark::useRoles(
                $roles
            );
        }

    }

    public function register() {

        //register custom services
        $this->registerVacodaServices();

        //alters how the current user is retrieved.
        Spark::swap('UserRepository@current', function() {
            if (Auth::check() && Spark::usesTeams()) {

                $id = Auth::id();

                $user = Spark::user()->where('id', $id)->first();

                $user->load('subscriptions');

                $user->load('roles');

                $user->load(['ownedTeams.subscriptions', 'teams.subscriptions']);

                $currentTeam = $user->currentTeam();

                return $user;
            }
        });

        //alters how the current team is retrieved.
        Spark::swap('TeamRepository@find', function($id) {
            $team = Spark::team()->with(['users.roles' => function($q) use ($id)
            {
                $q->wherePivot('team_id', '=', $id);

            }])->with('owner', 'templates', 'themes')->find($id);
            return $team;
        });

        //modifies team member update validation (if needed at all)
        Spark::swap('UpdateTeamMember@validator', function($team, $member, array $data) {
            return Validator::make($data, [

            ]);
        });

        //modifies how team members are updated adding in
        Spark::swap('UpdateTeamMember@handle', function($team, $member, array $data) {

            $user = User::where('id', $member->id)->first();

            $roles = $user->roles()->wherePivot('team_id', $data['team_id'])->get();

            $incomingRoles = collect($data['roles']);

            $incomingRoles->each( function ($role) use ($user, $data) {
                if (!$user->hasRole($role)) {
                     $user->assignRole($role, $data['team_id']);
                }
            });

            $userHasTheseRoles = $roles->map( function ($role) use ($data) {
                if ($role->pivot->team_id == $data['team_id']) {
                    return $role->name;
                }
            });


            $userHasTheseRoles = collect($userHasTheseRoles);

            $rolesToDelete = $userHasTheseRoles->diff($incomingRoles);


            $rolesToDelete->each( function ($role) use ($user, $data) {
               $user->removeRole($role, $data['team_id']);
            });

        });



    }


    /**
     * Register any custom services with the IOC
     */
    public function registerVacodaServices() {
        $services = [
            'Contracts\Repositories\AuditTrailRepository' => 'Repositories\AuditTrailRepository',
        ];

        foreach ($services as $key => $value) {
            $this->app->singleton('App\\'.$key, 'App\\'.$value);
        }
    }
}
