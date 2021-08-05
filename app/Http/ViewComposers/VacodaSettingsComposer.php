<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use App\VacodaSettings;
use Log;

class VacodaSettingsComposer
{
    protected $request;
    protected $team_id;
    protected $vacoda_settings;

    /**
     * Create a new Vacoda Settings composer.
     *
     * @param  Request  $request
     * @param  VacodaSettings  $vacoda_settings
     * @return void
     */
    public function __construct(Request $request, VacodaSettings $vacoda_settings)
    {
        $this->request = $request;
        $this->team_id = null;
        $this->vacoda_settings = [];

        if ($this->request->user()) {
            $this->team_id = $this->request->user()->currentTeam->id;
        }

        $settings = $vacoda_settings->where('team_id', $this->team_id)->first();

        if ($settings) {
            $this->vacoda_settings = [
                'active_date_precedence' => $settings->active_date_precedence,
            ];
        }
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('vacoda_settings', $this->vacoda_settings);
    }
}
