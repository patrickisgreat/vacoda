<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiTest extends TestCase
{
    use DatabaseTransactions;

    protected $team;
    protected $user;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        $this->team = App\Team::find(1); // DA team
        $this->user = App\User::find(1); // Super Admin user
        $this->user->switchToTeam($this->team); // Super Admin user on DA team
    }

    /**
     * Test the Banner API endpoints
     *
     * @return void
     */
    public function testBannerApi()
    {
        $uri = 'banner';
        $banner = $this->makeBanner();

        $bannerId = $this->creates($uri, $banner);
        $this->reads($uri, $bannerId);
        $this->updates($uri, $bannerId, $banner);
        $this->deletes($uri, $bannerId);
        $this->lists($uri);
    }

    /**
     * Test the Offer API endpoints
     *
     * @return void
     */
    public function testOfferApi()
    {
        $uri = 'offer';
        $offer = $this->makeOffer();

        $offerId = $this->creates($uri, $offer);
        $this->reads($uri, $offerId);
        $this->updates($uri, $offerId, $offer);
        $this->deletes($uri, $offerId);
        $this->lists($uri);
    }

    /**
     * Test the Template API endpoints
     *
     * @return void
     */
    public function testTemplateApi()
    {
        $uri = 'template';
        $template = $this->makeTemplate();

        $templateId = $this->creates($uri, $template);
        $this->reads($uri, $templateId);
        $this->updates($uri, $templateId, $template);
        $this->deletes($uri, $templateId);
        $this->lists($uri);
    }

    /**
     * Test the Theme API endpoints
     *
     * @return void
     */
    public function testThemeApi()
    {
        $uri = 'theme';
        $theme = $this->makeTheme();

        $themeId = $this->creates($uri, $theme);
        $this->reads($uri, $themeId);
        $this->updates($uri, $themeId, $theme);
        $this->deletes($uri, $themeId);
        $this->lists($uri);
    }

    /**
     * Test the Option API endpoints
     *
     * @return void
     */
    public function testOptionApi()
    {
        $uri = 'option';
        $option = $this->makeOption();

        $optionId = $this->creates($uri, $option);
        $this->reads($uri, $optionId);
        $this->updates($uri, $optionId, $option);
        $this->deletes($uri, $optionId);
        $this->lists($uri);
    }

    /**
     * Test the Option Type API endpoints
     *
     * @return void
     */
    public function testOptionTypeApi()
    {
        $uri = 'option-type';
        $optionType = $this->makeOptionType();

        $optionTypeId = $this->creates($uri, $optionType);
        $this->reads($uri, $optionTypeId);
        $this->updates($uri, $optionTypeId, $optionType);
        $this->deletes($uri, $optionTypeId);
        $this->lists($uri);
    }

    /**
     * Make a test banner with the Banner factory
     *
     * @return array
     */
    private function makeBanner()
    {
        $banner = factory(App\Banner::class)->make()->toArray();

        $banner['team_id'] = $this->team->id;
        $banner['offer_id'] = $this->team->offers()->get()->random()->id;
        $banner['theme_id'] = $this->team->themes()->get()->random()->id;

        $banner['template_id'] = $this->team->templates()->get()->filter(function ($template, $key) {
            // no image templates (yet)
            return is_null($template->is_image);
        })->random()->id;

        // team's categories as an array of ids
        $categories = App\Category::where('team_id', $this->team->id)->get()->pluck('id');

        // random number of random categories
        $banner['categories'] = $categories->random(rand(2, $categories->count()))->toArray();

        return $banner;
    }

    /**
     * Make a test offer with the Offer factory
     *
     * @return array
     */
    private function makeOffer()
    {
        $offer = factory(App\Offer::class)->make()->toArray();

        $offer['team_id'] = $this->team->id;
        $offer['department_id'] = $this->team->options()->get()->random()->id;

        return $offer;
    }

    /**
     * Make a test template with the Template factory
     *
     * @return array
     */
    private function makeTemplate()
    {
        $template = factory(App\Template::class)->make()->toArray();
        $template['team_id'] = $this->team->id;

        return $template;
    }

    /**
     * Make a test theme with the Theme factory
     *
     * @return array
     */
    private function makeTheme()
    {
        $theme = factory(App\Theme::class)->make()->toArray();
        $theme['team_id'] = $this->team->id;

        return $theme;
    }

    /**
     * Make a test option with the Option factory
     *
     * @return array
     */
    private function makeOption()
    {
        $option = factory(App\Option::class)->make()->toArray();
        $option['team_id'] = $this->team->id;
        $option['option_type_id'] = $this->team->optionTypes()->get()->random()->id;;

        return $option;
    }

    /**
     * Make a test option type with the OptionType factory
     *
     * @return array
     */
    private function makeOptionType()
    {
        $optionType = factory(App\OptionType::class)->make()->toArray();
        $optionType['team_id'] = $this->team->id;

        return $optionType;
    }

    /**
     * Assert a successful response from a create endpoint
     *
     * @param  string $uri
     * @param  array  $data
     * @return Response
     */
    private function creates($uri, $data)
    {
        return $this->actingAs($this->user)
                    ->postJson("/api/${uri}", $data)
                    ->assertResponseOk()
                    ->seeJson([
                        'created' => 'true',
                    ])
                    ->decodeResponseJson()['id'];
    }

    /**
     * Assert a successful response from a read endpoint
     *
     * @param  string $uri
     * @param  int    $id
     * @return void
     */
    private function reads($uri, $id)
    {
        $this->actingAs($this->user)
             ->getJson("/api/${uri}/${id}")
             ->assertResponseOk()
             ->seeJson([
                 'id' => (int)$id,
             ]);
    }

    /**
     * Assert a successful response from an update endpoint
     *
     * @param  string $uri
     * @param  int    $id
     * @param  array  $data
     * @return Response
     */
    private function updates($uri, $id, $data)
    {
        $data['name'] = "Updated ${uri}";

        $this->actingAs($this->user)
             ->putJson("/api/${uri}/${id}", $data)
             ->assertResponseOk()
             ->seeJson([
                 'updated' => 'true',
             ]);
    }

    /**
     * Assert a successful response from a delete endpoint
     *
     * @param  string $uri
     * @param  int    $id
     * @return void
     */
    private function deletes($uri, $id)
    {
        $this->actingAs($this->user)
             ->deleteJson("/api/${uri}/${id}")
             ->assertResponseOk()
             ->seeJson([
                 'destroyed' => 'true',
             ]);
    }

    /**
     * Assert a successful response from a list endpoint
     *
     * @param  string $uri
     * @return void
     */
    private function lists($uri)
    {
        $this->actingAs($this->user)
             ->getJson("/api/${uri}")
             ->assertResponseOk()
             ->seeJsonStructure([
                 '*' => [
                     'id', 'name'
                 ]
             ]);
    }
}
