<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Team;
use App\Template;

class Add724BannerTemplates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('templates', function ($table) {
//            $table->string('width_desktop')->nullable();
//            $table->string('width_mobile')->nullable();
//        });
//
//        $previousTemplates = Template::all();
//
//        foreach ($previousTemplates as $template) {
//            $template->width_desktop = 600;
//            $template->width_mobile = 320;
//            $template->save();
//        }
//
//        $templates = [
//            [
//                'name'          => '100 - 724',
//                'description'   => 'A 724px template for the 100 layout',
//                'html'          => file_get_contents(database_path() . '/seeds/templates/html/100-724.html'),
//                'css'           => file_get_contents(database_path() . '/seeds/templates/css/responsive.css'),
//                'width_desktop' => 724,
//                'width_mobile'  => 362,
//            ],
//            [
//                'name'          => '100 No CTA - 724',
//                'description'   => 'A template without a CTA for the 100 layout',
//                'html'          => file_get_contents(database_path() . '/seeds/templates/html/100-no-cta-724.html'),
//                'has_cta'       => false,
//                'css'           => file_get_contents(database_path() . '/seeds/templates/css/responsive.css'),
//                'width_desktop' => 724,
//                'width_mobile'  => 362,
//            ],
//            [
//                'name'          => '100 - 724 Image',
//                'description'   => 'An image template for the 100 layout',
//                'html'          => file_get_contents(database_path() . '/seeds/templates/html/100-724-image.html'),
//                'css'           => file_get_contents(database_path() . '/seeds/templates/css/responsive.css'),
//                'is_image'    => true,
//                'width_desktop' => 724,
//                'width_mobile'  => 362,
//            ],
//        ];
//
//        $teams = Team::all();
//
//        foreach ($teams as $team) {
//            foreach ($templates as $template) {
//                $template['creator_id'] = 2;
//                $team->templates()->save(new Template($template));
//            }
//        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
