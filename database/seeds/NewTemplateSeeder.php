<?php

use Illuminate\Database\Seeder;

use App\Team;
use App\Template;

class NewTemplateSeeder extends Seeder
{
    /**
     * Create 362px templates for each company
     *
     * @return void
     */
    public function run()
    {
        $templates = [
            [
                'name'          => '362px | text - image export',
                'description'   => 'A 100% width text template at 362px. Must be exported as image',
                'html'          => file_get_contents(realpath(__DIR__ . '/templates/html/100-362.html')),
                'width_desktop' => 362,
                'width_mobile'  => 362,
                'image_export_required' => true,
                'has_themes' => false,
                'has_alt_ctas' => true,
            ],
            [
                'name'          => '362px | text & card - image export',
                'description'   => 'A 100% width text template at 362px with card image. Must be exported as image',
                'html'          => file_get_contents(realpath(__DIR__ . '/templates/html/100-362-card.html')),
                'width_desktop' => 362,
                'width_mobile'  => 362,
                'image_export_required' => true,
                'has_themes' => false,
                'has_alt_ctas' => true,
            ],
            [
                'name'          => '362px | text (no CTA) - image export',
                'description'   => 'A 100% width text template at 362px. Must be exported as image',
                'html'          => file_get_contents(realpath(__DIR__ . '/templates/html/100-no-cta-362.html')),
                'width_desktop' => 362,
                'width_mobile'  => 362,
                'image_export_required' => true,
                'has_themes' => false,
                'has_cta'     => false,
            ],
            [
                'name'          => '362px | text & card (no CTA) - image export',
                'description'   => 'A 100% width text template at 362px with card image. Must be exported as image',
                'html'          => file_get_contents(realpath(__DIR__ . '/templates/html/100-no-cta-362-card.html')),
                'width_desktop' => 362,
                'width_mobile'  => 362,
                'image_export_required' => true,
                'has_themes' => false,
                'has_cta'     => false,
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
