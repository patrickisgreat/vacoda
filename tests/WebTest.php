<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WebTest extends TestCase
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
     * Test the base pages (welcome & home)
     *
     * @return void
     */
    public function testBasePages()
    {
        $this->loadsRoute('welcome');
        $this->loadsRoute('home', 'Dashboard');
    }

    /**
     * Test the banner pages
     *
     * @return void
     */
    public function testBannerPages()
    {
        $this->loadsRoute('banners', 'Banners');
        $this->loadsRoute('archived-banners', 'Archived Banners');
        $this->loadsRoute('scheduled-banners', 'Banners Scheduled');
        $this->loadsRoute('banner', 'Banner');
    }

    /**
     * Test the offer pages
     *
     * @return void
     */
    public function testOfferPages()
    {
        $this->loadsRoute('offers', 'Offers');
        $this->loadsRoute('archived-offers', 'Archived Offers');
        $this->loadsRoute('offer', 'Offer');
    }

    /**
     * Test the template pages
     *
     * @return void
     */
    public function testTemplatePages()
    {
        $this->loadsRoute('templates', 'Templates');
        $this->loadsRoute('template', 'Template');
    }

    /**
     * Test the theme pages
     *
     * @return void
     */
    public function testThemePages()
    {
        $this->loadsRoute('themes', 'Themes');
        $this->loadsRoute('theme', 'Theme');
    }

    /**
     * Test the option pages
     *
     * @return void
     */
    public function testOptionPages()
    {
        $this->loadsRoute('options', 'Options');
        $this->loadsRoute('option', 'Option');
    }
    /**
     * Test the option type pages
     *
     * @return void
     */
    public function testOptionTypePages()
    {
        $this->loadsRoute('option-types', 'Option Types');
        $this->loadsRoute('option-type', 'Option Type');
    }

    /**
     * Assert route loads successfully, with optional text presence assertion
     *
     * @param  string $route
     * @param  string $text
     * @return void
     */
    private function loadsRoute($route, $text = null)
    {
        if (is_null($text)) {
            $this->actingAs($this->user)
                 ->visitRoute($route)
                 ->assertResponseOk();

        } else {
            $this->actingAs($this->user)
                 ->visitRoute($route)
                 ->assertResponseOk()
                 ->see($text);
        }
    }
}
