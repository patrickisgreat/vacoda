<?php

use Illuminate\Database\Seeder;

use App\Team;
use App\Template;

class TemplateSeeder extends Seeder
{
    /**
     * Create 4 templates for each company
     *
     * @return void
     */
    public function run()
    {
        $templates = [
            [
                'name'        => '600px | 100 with CTA',
                'description' => 'A 100% width template at 600px',
                'html'        => file_get_contents(realpath(__DIR__ . '/templates/html/100.html')),
                'width_desktop' => 600,
                'width_mobile'  => 320,
            ],
            [
                'name'        => '600px | 100 no CTA',
                'description' => 'A 100% width template at 600px with no CTA',
                'html'        => file_get_contents(realpath(__DIR__ . '/templates/html/100-no-cta.html')),
                'has_cta'     => false,
                'width_desktop' => 600,
                'width_mobile'  => 320,
            ],
            [
                'name'        => '600px | image upload',
                'description' => 'A 100% width image template at 600px',
                'html'        => file_get_contents(realpath(__DIR__ . '/templates/html/100-image.html')),
                'is_image'    => true,
                'width_desktop' => 600,
                'width_mobile'  => 320,
            ],
//            [
//                'name'          => '600px | 50/50 default',
//                'description'   => 'A split width template at 600px',
//                'html'          => file_get_contents(realpath(__DIR__ . '/templates/html/5050.html')),
//                'width_desktop' => 600,
//                'width_mobile'  => 320,
//            ],
            [
                'name'          => '724px | 100 with CTA',
                'description'   => 'A 100% width template at 724px',
                'html'          => file_get_contents(realpath(__DIR__ . '/templates/html/100-724.html')),
                'width_desktop' => 724,
                'width_mobile'  => 362,
            ],
            [
                'name'          => '724px | 100 no CTA',
                'description'   => 'A 100% width template at 724px with no CTA',
                'html'          => file_get_contents(realpath(__DIR__ . '/templates/html/100-no-cta-724.html')),
                'has_cta'       => false,
                'width_desktop' => 724,
                'width_mobile'  => 362,
            ],
            [
                'name'          => '724px | image upload',
                'description'   => 'A 100% width image template at 724px',
                'html'          => file_get_contents(realpath(__DIR__ . '/templates/html/100-724-image.html')),
                'is_image'      => true,
                'width_desktop' => 724,
                'width_mobile'  => 362,
            ],
            [
                'name'          => '362 | image upload',
                'description'   => 'A 100% width image template at 362px',
                'html'          => file_get_contents(realpath(__DIR__ . '/templates/html/100-362-image.html')),
                'is_image'      => true,
                'width_desktop' => 362,
                'width_mobile'  => 362,
            ],
        ];

        $teams = Team::all();

        foreach ($teams as $team) {
            foreach ($templates as $template) {
                $template['creator_id'] = 2;
                $team->templates()->save(new Template($template));
            }
        }
    }
}
