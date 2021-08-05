 <?php

use Illuminate\Database\Seeder;
use App\Team;
use App\Credential;

class CredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $da_team = Team::where('name', 'Digital Additive')->firstOrFail();
        $thd_team = Team::where('name', 'The Home Depot')->firstOrFail();

        //DA ET creds for QA only
        $creds = [
            [
                'team_id'      => $da_team->id,
                'appsignature' => 'none',
                'clientid'     => 'zhfjs6f9ne3zqt5yzrea22yq',
                'clientsecret' => '4rAGkepq8jJy3bNqvgdJZMmb',
                'defaultwsdl'  => 'https://webservice.exacttarget.com/etframework.wsdl',
                'xmlloc'       => base_path() . '/vendor/digitaladditive/exacttarget-laravel/ExactTargetWSDL.xml'
            ],
            [
                'team_id'      => $thd_team->id,
                'appsignature' => 'none',
                'clientid'     => 'rwruluykjrwl9lnc3ene0eb4',
                'clientsecret' => 'I1YvKMrqdBl6PdUDxKHNAo02',
                'defaultwsdl'  => 'https://webservice.exacttarget.com/etframework.wsdl',
                'xmlloc'       => base_path() . '/vendor/digitaladditive/exacttarget-laravel/ExactTargetWSDL.xml'
            ]
        ];
        foreach ($creds as $cred) {
            $c = new Credential();
            $c->fill($cred);
            $save = $c->save();
        }
    }
}
