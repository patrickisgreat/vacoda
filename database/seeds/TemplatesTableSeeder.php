<?php

use Illuminate\Database\Seeder;

class TemplatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('templates')->delete();
        
        \DB::table('templates')->insert(array (
            0 => 
            array (
                'id' => 1,
                'team_id' => 1,
                'creator_id' => 1,
                'name' => '600px | 100 with CTA',
                'description' => 'A default template for the 100 layout',
                'html' => '<!--100 banner-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}"><!--<![endif]-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color: {{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="10"></td>
<td align="left" valign="top" width="580" class="W300">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Headline-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;"><strong style="text-decoration:none;color:{{ theme.font_color }};"><![endif]-->{{ fields.headline }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Body-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="452">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;"><strong style="color:{{ theme.font_color }};text-decoration:none;font-weight:normal;"><![endif]--><span>{{ fields.body }}</span><span class="valid-date">{{ fields.valid_thru }}</span><!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
<!--[if gte mso 9]>
</td>
<td valign="top">
<![endif]-->
<!--CTA-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="128">
<tr>
<td class="textLalign" align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.cta_font_color }};font-size:13px;font-weight:normal;padding-bottom:10px;padding-top:10px;text-align:right;"><!--[if mso]><a class="incomments cta-font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="color:{{ theme.cta_font_color }};text-decoration:none;"><strong style="color:{{ theme.cta_font_color }};text-decoration:none;font-weight:normal;"><![endif]-->{{ fields.cta }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="10"></td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => NULL,
                'is_image' => NULL,
                'has_cta' => 1,
                'created_at' => '2016-11-08 03:11:14',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '600',
                'width_mobile' => '320',
            ),
            1 => 
            array (
                'id' => 2,
                'team_id' => 1,
                'creator_id' => 1,
                'name' => '600px | 100 no CTA',
                'description' => 'A template without a CTA for the 100 layout',
                'html' => '<!--100 banner-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}"><!--<![endif]-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color: {{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="10"></td>
<td align="left" valign="top" width="580" class="W300">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Headline-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;color:{{ theme.font_color }};"><strong style="text-decoration:none;color:{{ theme.font_color }};"><![endif]-->{{ fields.headline }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Body-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="color:{{ theme.font_color }};text-decoration:none;"><strong style="color:{{ theme.font_color }};text-decoration:none;font-weight:normal;"><![endif]--><span>{{ fields.body }}</span><span class="valid-date">{{ fields.valid_thru }}</span><!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="10"></td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => NULL,
                'is_image' => NULL,
                'has_cta' => 0,
                'created_at' => '2016-11-08 03:11:14',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '600',
                'width_mobile' => '320',
            ),
            2 => 
            array (
                'id' => 3,
                'team_id' => 1,
                'creator_id' => 1,
                'name' => '600px | image upload',
                'description' => 'An image template for the 100 layout',
                'html' => '<!--100 banner-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}"><!--<![endif]-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color: {{ theme.background_color }};">
<tr>
<td style="border:none; mso-table-lspace:0pt; mso-table-rspace:0pt; border-collapse:collapse; width: 100%;" class="headline">
<img :src="fields.image_path" alt="{{ fields.image_alt }}" width="{{ width }}" />
</td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => NULL,
                'is_image' => 1,
                'has_cta' => 1,
                'created_at' => '2016-11-08 03:11:14',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '600',
                'width_mobile' => '320',
            ),
            3 => 
            array (
                'id' => 4,
                'team_id' => 1,
                'creator_id' => 1,
                'name' => '600px | 50/50 default',
                'description' => 'A default template for the 50/50 layout',
                'html' => '<!--5050 banner-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color:{{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="20" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule:exactly;line-height:20px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="10"></td>
<td align="left" valign="top" width="580" class="W300">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Left Half-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="290">
<!--Headline-->
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;">{{ fields.headline }}</td>
</tr>
</table>
<!--[if gte mso 9]>
</td>
<td valign="top">
<![endif]-->
<!--Spacer-->
<table align="left" class="hide" border="0" cellspacing="0" cellpadding="0" width="10">
<tr>
<td align="left" valign="top" width="10" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
</table>
<!--[if gte mso 9]>
</td>
<td valign="top">
<![endif]-->
<!--Right Half-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="280">
<!--Body-->
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;">
<span>{{ fields.body }}</span>
<span class="valid-date">{{ fields.valid_thru }}</span>
</td>
</tr>
<!--CTA-->
<tr>
<td class="textLalign" align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.cta_font_color }};font-size:13px;font-weight:bold;padding-bottom:10px;padding-top:10px;text-align:right;">{{ fields.cta }}</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="10"></td>
</tr>
</table>
',
                'css' => NULL,
                'is_image' => NULL,
                'has_cta' => 1,
                'created_at' => '2016-11-08 03:11:14',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '600',
                'width_mobile' => '320',
            ),
            4 => 
            array (
                'id' => 5,
                'team_id' => 2,
                'creator_id' => 11,
                'name' => '600px | 100 with CTA',
                'description' => 'A default template for the 100 layout',
                'html' => '<!--100 banner-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}"><!--<![endif]-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color: {{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="10"></td>
<td align="left" valign="top" width="580" class="W300">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Headline-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;"><strong style="text-decoration:none;color:{{ theme.font_color }};"><![endif]-->{{ fields.headline }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Body-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="452">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;"><strong style="color:{{ theme.font_color }};text-decoration:none;font-weight:normal;"><![endif]--><span>{{ fields.body }}</span><span class="valid-date">{{ fields.valid_thru }}</span><!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
<!--[if gte mso 9]>
</td>
<td valign="top">
<![endif]-->
<!--CTA-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="128">
<tr>
<td class="textLalign" align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.cta_font_color }};font-size:13px;font-weight:normal;padding-bottom:10px;padding-top:10px;text-align:right;"><!--[if mso]><a class="incomments cta-font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="color:{{ theme.cta_font_color }};text-decoration:none;"><strong style="color:{{ theme.cta_font_color }};text-decoration:none;font-weight:normal;"><![endif]-->{{ fields.cta }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="10"></td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => NULL,
                'is_image' => NULL,
                'has_cta' => 1,
                'created_at' => '2016-11-08 03:11:14',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '600',
                'width_mobile' => '320',
            ),
            5 => 
            array (
                'id' => 6,
                'team_id' => 2,
                'creator_id' => 11,
                'name' => '600px | 100 no CTA',
                'description' => 'A template without a CTA for the 100 layout',
                'html' => '<!--100 banner-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}"><!--<![endif]-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color: {{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="10"></td>
<td align="left" valign="top" width="580" class="W300">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Headline-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;color:{{ theme.font_color }};"><strong style="text-decoration:none;color:{{ theme.font_color }};"><![endif]-->{{ fields.headline }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Body-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="color:{{ theme.font_color }};text-decoration:none;"><strong style="color:{{ theme.font_color }};text-decoration:none;font-weight:normal;"><![endif]--><span>{{ fields.body }}</span><span class="valid-date">{{ fields.valid_thru }}</span><!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="10"></td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => NULL,
                'is_image' => NULL,
                'has_cta' => 0,
                'created_at' => '2016-11-08 03:11:14',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '600',
                'width_mobile' => '320',
            ),
            6 => 
            array (
                'id' => 7,
                'team_id' => 2,
                'creator_id' => 11,
                'name' => '600px | image upload',
                'description' => 'An image template for the 100 layout',
                'html' => '<!--100 banner-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}"><!--<![endif]-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color: {{ theme.background_color }};">
<tr>
<td style="border:none; mso-table-lspace:0pt; mso-table-rspace:0pt; border-collapse:collapse; width: 100%;" class="headline">
<img :src="fields.image_path" alt="{{ fields.image_alt }}" width="{{ width }}" />
</td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => NULL,
                'is_image' => 1,
                'has_cta' => 1,
                'created_at' => '2016-11-08 03:11:14',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '600',
                'width_mobile' => '320',
            ),
            7 => 
            array (
                'id' => 8,
                'team_id' => 2,
                'creator_id' => 11,
                'name' => '600px | 50/50 default',
                'description' => 'A default template for the 50/50 layout',
                'html' => '<!--5050 banner-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color:{{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="20" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule:exactly;line-height:20px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="10"></td>
<td align="left" valign="top" width="580" class="W300">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Left Half-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="290">
<!--Headline-->
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;">{{ fields.headline }}</td>
</tr>
</table>
<!--[if gte mso 9]>
</td>
<td valign="top">
<![endif]-->
<!--Spacer-->
<table align="left" class="hide" border="0" cellspacing="0" cellpadding="0" width="10">
<tr>
<td align="left" valign="top" width="10" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
</table>
<!--[if gte mso 9]>
</td>
<td valign="top">
<![endif]-->
<!--Right Half-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="280">
<!--Body-->
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;">
<span>{{ fields.body }}</span>
<span class="valid-date">{{ fields.valid_thru }}</span>
</td>
</tr>
<!--CTA-->
<tr>
<td class="textLalign" align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.cta_font_color }};font-size:13px;font-weight:bold;padding-bottom:10px;padding-top:10px;text-align:right;">{{ fields.cta }}</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="10"></td>
</tr>
</table>
',
                'css' => NULL,
                'is_image' => NULL,
                'has_cta' => 1,
                'created_at' => '2016-11-08 03:11:14',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '600',
                'width_mobile' => '320',
            ),
            8 => 
            array (
                'id' => 9,
                'team_id' => 3,
                'creator_id' => 13,
                'name' => '600px | 100 with CTA',
                'description' => 'A default template for the 100 layout',
                'html' => '<!--100 banner-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}"><!--<![endif]-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color: {{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="10"></td>
<td align="left" valign="top" width="580" class="W300">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Headline-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;"><strong style="text-decoration:none;color:{{ theme.font_color }};"><![endif]-->{{ fields.headline }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Body-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="452">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;"><strong style="color:{{ theme.font_color }};text-decoration:none;font-weight:normal;"><![endif]--><span>{{ fields.body }}</span><span class="valid-date">{{ fields.valid_thru }}</span><!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
<!--[if gte mso 9]>
</td>
<td valign="top">
<![endif]-->
<!--CTA-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="128">
<tr>
<td class="textLalign" align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.cta_font_color }};font-size:13px;font-weight:normal;padding-bottom:10px;padding-top:10px;text-align:right;"><!--[if mso]><a class="incomments cta-font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="color:{{ theme.cta_font_color }};text-decoration:none;"><strong style="color:{{ theme.cta_font_color }};text-decoration:none;font-weight:normal;"><![endif]-->{{ fields.cta }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="10"></td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => NULL,
                'is_image' => NULL,
                'has_cta' => 1,
                'created_at' => '2016-11-08 03:11:14',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '600',
                'width_mobile' => '320',
            ),
            9 => 
            array (
                'id' => 10,
                'team_id' => 3,
                'creator_id' => 13,
                'name' => '600px | 100 no CTA',
                'description' => 'A template without a CTA for the 100 layout',
                'html' => '<!--100 banner-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}"><!--<![endif]-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color: {{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="10"></td>
<td align="left" valign="top" width="580" class="W300">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Headline-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;color:{{ theme.font_color }};"><strong style="text-decoration:none;color:{{ theme.font_color }};"><![endif]-->{{ fields.headline }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Body-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="color:{{ theme.font_color }};text-decoration:none;"><strong style="color:{{ theme.font_color }};text-decoration:none;font-weight:normal;"><![endif]--><span>{{ fields.body }}</span><span class="valid-date">{{ fields.valid_thru }}</span><!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="10"></td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => NULL,
                'is_image' => NULL,
                'has_cta' => 0,
                'created_at' => '2016-11-08 03:11:14',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '600',
                'width_mobile' => '320',
            ),
            10 => 
            array (
                'id' => 11,
                'team_id' => 3,
                'creator_id' => 13,
                'name' => '600px | image upload',
                'description' => 'An image template for the 100 layout',
                'html' => '<!--100 banner-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}"><!--<![endif]-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color: {{ theme.background_color }};">
<tr>
<td style="border:none; mso-table-lspace:0pt; mso-table-rspace:0pt; border-collapse:collapse; width: 100%;" class="headline">
<img :src="fields.image_path" alt="{{ fields.image_alt }}" width="{{ width }}" />
</td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => NULL,
                'is_image' => 1,
                'has_cta' => 1,
                'created_at' => '2016-11-08 03:11:14',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '600',
                'width_mobile' => '320',
            ),
            11 => 
            array (
                'id' => 12,
                'team_id' => 3,
                'creator_id' => 13,
                'name' => '600px | 50/50 default',
                'description' => 'A default template for the 50/50 layout',
                'html' => '<!--5050 banner-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color:{{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="20" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule:exactly;line-height:20px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="10"></td>
<td align="left" valign="top" width="580" class="W300">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Left Half-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="290">
<!--Headline-->
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;">{{ fields.headline }}</td>
</tr>
</table>
<!--[if gte mso 9]>
</td>
<td valign="top">
<![endif]-->
<!--Spacer-->
<table align="left" class="hide" border="0" cellspacing="0" cellpadding="0" width="10">
<tr>
<td align="left" valign="top" width="10" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
</table>
<!--[if gte mso 9]>
</td>
<td valign="top">
<![endif]-->
<!--Right Half-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="280">
<!--Body-->
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;">
<span>{{ fields.body }}</span>
<span class="valid-date">{{ fields.valid_thru }}</span>
</td>
</tr>
<!--CTA-->
<tr>
<td class="textLalign" align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.cta_font_color }};font-size:13px;font-weight:bold;padding-bottom:10px;padding-top:10px;text-align:right;">{{ fields.cta }}</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="10"></td>
</tr>
</table>
',
                'css' => NULL,
                'is_image' => NULL,
                'has_cta' => 1,
                'created_at' => '2016-11-08 03:11:14',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '600',
                'width_mobile' => '320',
            ),
            12 => 
            array (
                'id' => 13,
                'team_id' => 4,
                'creator_id' => 2,
                'name' => '600px | 100 with CTA',
                'description' => 'A default template with 100% width',
                'html' => '<!--100 banner-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color: {{ theme.background_color }};">

<tr>
<td colspan="3" align="left" valign="top" width="100%" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="10"></td>
<td align="left" valign="top" width="580" class="W300">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Headline-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;"><strong style="text-decoration:none;color:{{ theme.font_color }};"><![endif]-->{{ fields.headline }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Body-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="452">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;"><strong style="color:{{ theme.font_color }};text-decoration:none;font-weight:normal;"><![endif]--><span>{{ fields.body }}</span><span class="valid-date">{{ fields.valid_thru }}</span><!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
<!--[if gte mso 9]>
</td>
<td valign="top">
<![endif]-->
<!--CTA-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="128">
<tr>
<td class="textLalign" align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.cta_font_color }};font-size:13px;font-weight:normal;padding-bottom:10px;padding-top:10px;text-align:right;"><!--[if mso]><a class="incomments cta-font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="color:{{ theme.cta_font_color }};text-decoration:none;"><strong style="color:{{ theme.cta_font_color }};text-decoration:none;font-weight:normal;"><![endif]-->{{ fields.cta }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="10"></td>
</tr>

</table>',
                'css' => NULL,
                'is_image' => NULL,
                'has_cta' => 1,
                'created_at' => '2016-12-21 03:11:14',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '600',
                'width_mobile' => '320',
            ),
            13 => 
            array (
                'id' => 14,
                'team_id' => 4,
                'creator_id' => 2,
                'name' => '600px | 100 no CTA',
                'description' => 'A template without a CTA for the 100 layout',
                'html' => '<!--100 banner-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}"><!--<![endif]-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color: {{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="10"></td>
<td align="left" valign="top" width="580" class="W300">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Headline-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;color:{{ theme.font_color }};"><strong style="text-decoration:none;color:{{ theme.font_color }};"><![endif]-->{{ fields.headline }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Body-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="color:{{ theme.font_color }};text-decoration:none;"><strong style="color:{{ theme.font_color }};text-decoration:none;font-weight:normal;"><![endif]--><span>{{ fields.body }}</span><span class="valid-date">{{ fields.valid_thru }}</span><!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="10"></td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => NULL,
                'is_image' => NULL,
                'has_cta' => 0,
                'created_at' => '2016-11-08 03:11:14',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '600',
                'width_mobile' => '320',
            ),
            14 => 
            array (
                'id' => 15,
                'team_id' => 4,
                'creator_id' => 2,
                'name' => '600px | image upload',
                'description' => 'An image template for the 100 layout',
                'html' => '<!--100 banner-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}"><!--<![endif]-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color: {{ theme.background_color }};">
<tr>
<td style="border:none; mso-table-lspace:0pt; mso-table-rspace:0pt; border-collapse:collapse; width: 100%;" class="headline">
<img :src="fields.image_path" alt="{{ fields.image_alt }}" width="{{ width }}" />
</td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => NULL,
                'is_image' => 1,
                'has_cta' => 1,
                'created_at' => '2016-11-08 03:11:14',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '600',
                'width_mobile' => '320',
            ),
            15 => 
            array (
                'id' => 16,
                'team_id' => 4,
                'creator_id' => 2,
                'name' => '600px | 50/50 default',
                'description' => 'A default template for the 50/50 layout',
                'html' => '<!--5050 banner-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color:{{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="20" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule:exactly;line-height:20px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="10"></td>
<td align="left" valign="top" width="580" class="W300">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Left Half-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="290">
<!--Headline-->
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;">{{ fields.headline }}</td>
</tr>
</table>
<!--[if gte mso 9]>
</td>
<td valign="top">
<![endif]-->
<!--Spacer-->
<table align="left" class="hide" border="0" cellspacing="0" cellpadding="0" width="10">
<tr>
<td align="left" valign="top" width="10" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
</table>
<!--[if gte mso 9]>
</td>
<td valign="top">
<![endif]-->
<!--Right Half-->
<table align="left" class="W300" border="0" cellspacing="0" cellpadding="0" width="280">
<!--Body-->
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;">
<span>{{ fields.body }}</span>
<span class="valid-date">{{ fields.valid_thru }}</span>
</td>
</tr>
<!--CTA-->
<tr>
<td class="textLalign" align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.cta_font_color }};font-size:13px;font-weight:bold;padding-bottom:10px;padding-top:10px;text-align:right;">{{ fields.cta }}</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="10"></td>
</tr>
</table>
',
                'css' => NULL,
                'is_image' => NULL,
                'has_cta' => 1,
                'created_at' => '2016-11-08 03:11:14',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '600',
                'width_mobile' => '320',
            ),
            16 => 
            array (
                'id' => 17,
                'team_id' => 1,
                'creator_id' => 2,
                'name' => '724px | 100 with CTA',
                'description' => 'A 724px template for the 100 layout',
                'html' => '<!--100 banner 724-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}" style="text-decoration: none;"><!--<![endif]-->
<table class="banner-html banner-container-724 W100P" border="0" cellspacing="0" cellpadding="0" width="724" style="background-color: {{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="2%"></td>
<td align="left" valign="top" width="96%">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Headline-->
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;"><strong style="text-decoration:none;color:{{ theme.font_color }};"><![endif]-->{{ fields.headline }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td class="bannerStack" align="left" valign="top" width="596"  style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;"><strong style="color:{{ theme.font_color }};text-decoration:none;font-weight:normal;"><![endif]--><span>{{ fields.body }}</span><span class="valid-date">{{ fields.valid_thru }}</span><!--[if mso]></strong></a><![endif]-->
</td>
<td class="bannerStack textLalign" align="left" valign="top" width="128" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.cta_font_color }};font-size:13px;font-weight:normal;padding-bottom:10px;padding-top:10px;text-align:right;"><!--[if mso]><a class="incomments cta-font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="color:{{ theme.cta_font_color }};text-decoration:none;"><strong style="color:{{ theme.cta_font_color }};text-decoration:none;font-weight:normal;"><![endif]-->{{ fields.cta }}<!--[if mso]></strong></a><![endif]-->
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="2%"></td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => '* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
padding: 0;
margin: 0;
}

table, td {
border-collapse: collapse;
mso-table-lspace: 0pt;
mso-table-rspace: 0pt !important;
}

/* Banner Media Queries */
@media (max-width: 480px) {
* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
}

.banner-container { width: 320px !important; }
.W300 { width: 300px !important; }
.W310 { width: 310px !important; }
.hide { display: none !important; }
.textLalign { text-align: left !important; }

.textLalign6633 {
text-align: left !important;
width: 310px !important;
}

.ctaHeight { height: 0px !important; }
}

@media (max-width: 480px) {
.W100P {width:100% !important;}
.bannerStack {width:100% !important;display:block !important;}
.textLalign {text-align:left !important;}
}
',
                'is_image' => NULL,
                'has_cta' => 1,
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '724',
                'width_mobile' => '362',
            ),
            17 => 
            array (
                'id' => 18,
                'team_id' => 1,
                'creator_id' => 2,
                'name' => '724px | 100 no CTA',
                'description' => 'A template without a CTA for the 100 layout',
                'html' => '<!--100 banner 724-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}"><!--<![endif]-->
<table class="banner-html banner-container-724 W100P" bgcolor="grey" border="0" cellspacing="0" cellpadding="0" width="724" style="background-color: {{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="2%"></td>
<td align="left" valign="top" width="96%">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Headline-->
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;color:{{ theme.font_color }};"><strong style="text-decoration:none;color:{{ theme.font_color }};"><![endif]-->{{ fields.headline }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Body-->
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="color:{{ theme.font_color }};text-decoration:none;"><strong style="color:{{ theme.font_color }};text-decoration:none;font-weight:normal;"><![endif]--><span>{{ fields.body }}</span><span class="valid-date">{{ fields.valid_thru }}</span><!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="2%"></td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => '* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
padding: 0;
margin: 0;
}

table, td {
border-collapse: collapse;
mso-table-lspace: 0pt;
mso-table-rspace: 0pt !important;
}

/* Banner Media Queries */
@media (max-width: 480px) {
* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
}

.banner-container { width: 320px !important; }
.W300 { width: 300px !important; }
.W310 { width: 310px !important; }
.hide { display: none !important; }
.textLalign { text-align: left !important; }

.textLalign6633 {
text-align: left !important;
width: 310px !important;
}

.ctaHeight { height: 0px !important; }
}

@media (max-width: 480px) {
.W100P {width:100% !important;}
.bannerStack {width:100% !important;display:block !important;}
.textLalign {text-align:left !important;}
}
',
                'is_image' => NULL,
                'has_cta' => 0,
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '724',
                'width_mobile' => '362',
            ),
            18 => 
            array (
                'id' => 19,
                'team_id' => 1,
                'creator_id' => 2,
                'name' => '724px | image upload',
                'description' => 'An image template for the 100 layout',
                'html' => '<!--100 image banner 724-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}" alias="Vacoda_Text_Banner_{{fields.id}}"><!--<![endif]-->
<table class="banner-html banner-container-724" border="0" cellspacing="0" cellpadding="0" width="724" style="background-color: {{ theme.background_color }};">
<tr>
<td style="border:none; mso-table-lspace:0pt; mso-table-rspace:0pt; border-collapse:collapse; width: 100%;" class="headline">
<img :src="fields.image_path" alt="{{ fields.image_alt }}" width="{{ width }}" />
</td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => '* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
padding: 0;
margin: 0;
}

table, td {
border-collapse: collapse;
mso-table-lspace: 0pt;
mso-table-rspace: 0pt !important;
}

/* Banner Media Queries */
@media (max-width: 480px) {
* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
}

.banner-container { width: 320px !important; }
.W300 { width: 300px !important; }
.W310 { width: 310px !important; }
.hide { display: none !important; }
.textLalign { text-align: left !important; }

.textLalign6633 {
text-align: left !important;
width: 310px !important;
}

.ctaHeight { height: 0px !important; }
}

@media (max-width: 480px) {
.W100P {width:100% !important;}
.bannerStack {width:100% !important;display:block !important;}
.textLalign {text-align:left !important;}
}
',
                'is_image' => 1,
                'has_cta' => 1,
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '724',
                'width_mobile' => '362',
            ),
            19 => 
            array (
                'id' => 20,
                'team_id' => 2,
                'creator_id' => 2,
                'name' => '724px | 100 with CTA',
                'description' => 'A 724px template for the 100 layout',
                'html' => '<!--100 banner 724-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}" style="text-decoration: none;"><!--<![endif]-->
<table class="banner-html banner-container-724 W100P" border="0" cellspacing="0" cellpadding="0" width="724" style="background-color: {{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="2%"></td>
<td align="left" valign="top" width="96%">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Headline-->
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;"><strong style="text-decoration:none;color:{{ theme.font_color }};"><![endif]-->{{ fields.headline }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td class="bannerStack" align="left" valign="top" width="596"  style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;"><strong style="color:{{ theme.font_color }};text-decoration:none;font-weight:normal;"><![endif]--><span>{{ fields.body }}</span><span class="valid-date">{{ fields.valid_thru }}</span><!--[if mso]></strong></a><![endif]-->
</td>
<td class="bannerStack textLalign" align="left" valign="top" width="128" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.cta_font_color }};font-size:13px;font-weight:normal;padding-bottom:10px;padding-top:10px;text-align:right;"><!--[if mso]><a class="incomments cta-font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="color:{{ theme.cta_font_color }};text-decoration:none;"><strong style="color:{{ theme.cta_font_color }};text-decoration:none;font-weight:normal;"><![endif]-->{{ fields.cta }}<!--[if mso]></strong></a><![endif]-->
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="2%"></td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => '* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
padding: 0;
margin: 0;
}

table, td {
border-collapse: collapse;
mso-table-lspace: 0pt;
mso-table-rspace: 0pt !important;
}

/* Banner Media Queries */
@media (max-width: 480px) {
* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
}

.banner-container { width: 320px !important; }
.W300 { width: 300px !important; }
.W310 { width: 310px !important; }
.hide { display: none !important; }
.textLalign { text-align: left !important; }

.textLalign6633 {
text-align: left !important;
width: 310px !important;
}

.ctaHeight { height: 0px !important; }
}

@media (max-width: 480px) {
.W100P {width:100% !important;}
.bannerStack {width:100% !important;display:block !important;}
.textLalign {text-align:left !important;}
}
',
                'is_image' => NULL,
                'has_cta' => 1,
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '724',
                'width_mobile' => '362',
            ),
            20 => 
            array (
                'id' => 21,
                'team_id' => 2,
                'creator_id' => 2,
                'name' => '724px | 100 no CTA',
                'description' => 'A template without a CTA for the 100 layout',
                'html' => '<!--100 banner 724-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}"><!--<![endif]-->
<table class="banner-html banner-container-724 W100P" bgcolor="grey" border="0" cellspacing="0" cellpadding="0" width="724" style="background-color: {{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="2%"></td>
<td align="left" valign="top" width="96%">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Headline-->
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;color:{{ theme.font_color }};"><strong style="text-decoration:none;color:{{ theme.font_color }};"><![endif]-->{{ fields.headline }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Body-->
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="color:{{ theme.font_color }};text-decoration:none;"><strong style="color:{{ theme.font_color }};text-decoration:none;font-weight:normal;"><![endif]--><span>{{ fields.body }}</span><span class="valid-date">{{ fields.valid_thru }}</span><!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="2%"></td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => '* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
padding: 0;
margin: 0;
}

table, td {
border-collapse: collapse;
mso-table-lspace: 0pt;
mso-table-rspace: 0pt !important;
}

/* Banner Media Queries */
@media (max-width: 480px) {
* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
}

.banner-container { width: 320px !important; }
.W300 { width: 300px !important; }
.W310 { width: 310px !important; }
.hide { display: none !important; }
.textLalign { text-align: left !important; }

.textLalign6633 {
text-align: left !important;
width: 310px !important;
}

.ctaHeight { height: 0px !important; }
}

@media (max-width: 480px) {
.W100P {width:100% !important;}
.bannerStack {width:100% !important;display:block !important;}
.textLalign {text-align:left !important;}
}
',
                'is_image' => NULL,
                'has_cta' => 0,
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '724',
                'width_mobile' => '362',
            ),
            21 => 
            array (
                'id' => 22,
                'team_id' => 2,
                'creator_id' => 2,
                'name' => '724px | image upload',
                'description' => 'An image template for the 100 layout',
                'html' => '<!--100 image banner 724-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}" alias="Vacoda_Text_Banner_{{fields.id}}"><!--<![endif]-->
<table class="banner-html banner-container-724" border="0" cellspacing="0" cellpadding="0" width="724" style="background-color: {{ theme.background_color }};">
<tr>
<td style="border:none; mso-table-lspace:0pt; mso-table-rspace:0pt; border-collapse:collapse; width: 100%;" class="headline">
<img :src="fields.image_path" alt="{{ fields.image_alt }}" width="{{ width }}" />
</td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => '* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
padding: 0;
margin: 0;
}

table, td {
border-collapse: collapse;
mso-table-lspace: 0pt;
mso-table-rspace: 0pt !important;
}

/* Banner Media Queries */
@media (max-width: 480px) {
* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
}

.banner-container { width: 320px !important; }
.W300 { width: 300px !important; }
.W310 { width: 310px !important; }
.hide { display: none !important; }
.textLalign { text-align: left !important; }

.textLalign6633 {
text-align: left !important;
width: 310px !important;
}

.ctaHeight { height: 0px !important; }
}

@media (max-width: 480px) {
.W100P {width:100% !important;}
.bannerStack {width:100% !important;display:block !important;}
.textLalign {text-align:left !important;}
}
',
                'is_image' => 1,
                'has_cta' => 1,
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '724',
                'width_mobile' => '362',
            ),
            22 => 
            array (
                'id' => 23,
                'team_id' => 3,
                'creator_id' => 2,
                'name' => '724px | 100 with CTA',
                'description' => 'A 724px template for the 100 layout',
                'html' => '<!--100 banner 724-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}" style="text-decoration: none;"><!--<![endif]-->
<table class="banner-html banner-container-724 W100P" border="0" cellspacing="0" cellpadding="0" width="724" style="background-color: {{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="2%"></td>
<td align="left" valign="top" width="96%">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Headline-->
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;"><strong style="text-decoration:none;color:{{ theme.font_color }};"><![endif]-->{{ fields.headline }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td class="bannerStack" align="left" valign="top" width="596"  style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;"><strong style="color:{{ theme.font_color }};text-decoration:none;font-weight:normal;"><![endif]--><span>{{ fields.body }}</span><span class="valid-date">{{ fields.valid_thru }}</span><!--[if mso]></strong></a><![endif]-->
</td>
<td class="bannerStack textLalign" align="left" valign="top" width="128" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.cta_font_color }};font-size:13px;font-weight:normal;padding-bottom:10px;padding-top:10px;text-align:right;"><!--[if mso]><a class="incomments cta-font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="color:{{ theme.cta_font_color }};text-decoration:none;"><strong style="color:{{ theme.cta_font_color }};text-decoration:none;font-weight:normal;"><![endif]-->{{ fields.cta }}<!--[if mso]></strong></a><![endif]-->
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="2%"></td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => '* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
padding: 0;
margin: 0;
}

table, td {
border-collapse: collapse;
mso-table-lspace: 0pt;
mso-table-rspace: 0pt !important;
}

/* Banner Media Queries */
@media (max-width: 480px) {
* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
}

.banner-container { width: 320px !important; }
.W300 { width: 300px !important; }
.W310 { width: 310px !important; }
.hide { display: none !important; }
.textLalign { text-align: left !important; }

.textLalign6633 {
text-align: left !important;
width: 310px !important;
}

.ctaHeight { height: 0px !important; }
}

@media (max-width: 480px) {
.W100P {width:100% !important;}
.bannerStack {width:100% !important;display:block !important;}
.textLalign {text-align:left !important;}
}
',
                'is_image' => NULL,
                'has_cta' => 1,
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '724',
                'width_mobile' => '362',
            ),
            23 => 
            array (
                'id' => 24,
                'team_id' => 3,
                'creator_id' => 2,
                'name' => '724px | 100 no CTA',
                'description' => 'A template without a CTA for the 100 layout',
                'html' => '<!--100 banner 724-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}"><!--<![endif]-->
<table class="banner-html banner-container-724 W100P" bgcolor="grey" border="0" cellspacing="0" cellpadding="0" width="724" style="background-color: {{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="2%"></td>
<td align="left" valign="top" width="96%">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Headline-->
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;color:{{ theme.font_color }};"><strong style="text-decoration:none;color:{{ theme.font_color }};"><![endif]-->{{ fields.headline }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Body-->
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="color:{{ theme.font_color }};text-decoration:none;"><strong style="color:{{ theme.font_color }};text-decoration:none;font-weight:normal;"><![endif]--><span>{{ fields.body }}</span><span class="valid-date">{{ fields.valid_thru }}</span><!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="2%"></td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => '* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
padding: 0;
margin: 0;
}

table, td {
border-collapse: collapse;
mso-table-lspace: 0pt;
mso-table-rspace: 0pt !important;
}

/* Banner Media Queries */
@media (max-width: 480px) {
* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
}

.banner-container { width: 320px !important; }
.W300 { width: 300px !important; }
.W310 { width: 310px !important; }
.hide { display: none !important; }
.textLalign { text-align: left !important; }

.textLalign6633 {
text-align: left !important;
width: 310px !important;
}

.ctaHeight { height: 0px !important; }
}

@media (max-width: 480px) {
.W100P {width:100% !important;}
.bannerStack {width:100% !important;display:block !important;}
.textLalign {text-align:left !important;}
}
',
                'is_image' => NULL,
                'has_cta' => 0,
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '724',
                'width_mobile' => '362',
            ),
            24 => 
            array (
                'id' => 25,
                'team_id' => 3,
                'creator_id' => 2,
                'name' => '724px | image upload',
                'description' => 'An image template for the 100 layout',
                'html' => '<!--100 image banner 724-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}" alias="Vacoda_Text_Banner_{{fields.id}}"><!--<![endif]-->
<table class="banner-html banner-container-724" border="0" cellspacing="0" cellpadding="0" width="724" style="background-color: {{ theme.background_color }};">
<tr>
<td style="border:none; mso-table-lspace:0pt; mso-table-rspace:0pt; border-collapse:collapse; width: 100%;" class="headline">
<img :src="fields.image_path" alt="{{ fields.image_alt }}" width="{{ width }}" />
</td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => '* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
padding: 0;
margin: 0;
}

table, td {
border-collapse: collapse;
mso-table-lspace: 0pt;
mso-table-rspace: 0pt !important;
}

/* Banner Media Queries */
@media (max-width: 480px) {
* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
}

.banner-container { width: 320px !important; }
.W300 { width: 300px !important; }
.W310 { width: 310px !important; }
.hide { display: none !important; }
.textLalign { text-align: left !important; }

.textLalign6633 {
text-align: left !important;
width: 310px !important;
}

.ctaHeight { height: 0px !important; }
}

@media (max-width: 480px) {
.W100P {width:100% !important;}
.bannerStack {width:100% !important;display:block !important;}
.textLalign {text-align:left !important;}
}
',
                'is_image' => 1,
                'has_cta' => 1,
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '724',
                'width_mobile' => '362',
            ),
            25 => 
            array (
                'id' => 26,
                'team_id' => 4,
                'creator_id' => 2,
                'name' => '724px | 100 with CTA',
                'description' => 'A 724px template for the 100 layout',
                'html' => '<!--100 banner 724-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}" style="text-decoration: none;"><!--<![endif]-->
<table class="banner-html banner-container-724 W100P" border="0" cellspacing="0" cellpadding="0" width="724" style="background-color: {{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="2%"></td>
<td align="left" valign="top" width="96%">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Headline-->
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;"><strong style="text-decoration:none;color:{{ theme.font_color }};"><![endif]-->{{ fields.headline }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td class="bannerStack" align="left" valign="top" width="596"  style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;"><strong style="color:{{ theme.font_color }};text-decoration:none;font-weight:normal;"><![endif]--><span>{{ fields.body }}</span><span class="valid-date">{{ fields.valid_thru }}</span><!--[if mso]></strong></a><![endif]-->
</td>
<td class="bannerStack textLalign" align="left" valign="top" width="128" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.cta_font_color }};font-size:13px;font-weight:normal;padding-bottom:10px;padding-top:10px;text-align:right;"><!--[if mso]><a class="incomments cta-font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="color:{{ theme.cta_font_color }};text-decoration:none;"><strong style="color:{{ theme.cta_font_color }};text-decoration:none;font-weight:normal;"><![endif]-->{{ fields.cta }}<!--[if mso]></strong></a><![endif]-->
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="2%"></td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => '* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
padding: 0;
margin: 0;
}

table, td {
border-collapse: collapse;
mso-table-lspace: 0pt;
mso-table-rspace: 0pt !important;
}

/* Banner Media Queries */
@media (max-width: 480px) {
* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
}

.banner-container { width: 320px !important; }
.W300 { width: 300px !important; }
.W310 { width: 310px !important; }
.hide { display: none !important; }
.textLalign { text-align: left !important; }

.textLalign6633 {
text-align: left !important;
width: 310px !important;
}

.ctaHeight { height: 0px !important; }
}

@media (max-width: 480px) {
.W100P {width:100% !important;}
.bannerStack {width:100% !important;display:block !important;}
.textLalign {text-align:left !important;}
}
',
                'is_image' => NULL,
                'has_cta' => 1,
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '724',
                'width_mobile' => '362',
            ),
            26 => 
            array (
                'id' => 27,
                'team_id' => 4,
                'creator_id' => 2,
                'name' => '724px | 100 no CTA',
                'description' => 'A template without a CTA for the 100 layout',
                'html' => '<!--100 banner 724-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}"><!--<![endif]-->
<table class="banner-html banner-container-724 W100P" bgcolor="grey" border="0" cellspacing="0" cellpadding="0" width="724" style="background-color: {{ theme.background_color }};">
<tr>
<td colspan="3" align="left" valign="top" width="100%" height="10" style="border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 10px;"><!--[if gte mso 15]>&nbsp;<![endif]--></td>
</tr>
<tr>
<td align="left" valign="top" width="2%"></td>
<td align="left" valign="top" width="96%">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Headline-->
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color }};font-size:{{ fields.headline_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.headline_font_size }}px;font-weight:bold;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="text-decoration:none;color:{{ theme.font_color }};"><strong style="text-decoration:none;color:{{ theme.font_color }};"><![endif]-->{{ fields.headline }}<!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%">
<!--Body-->
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top" width="100%" style="font-family:Helvetica, Arial, sans-serif;color:{{ theme.font_color_secondary }};font-size:{{ fields.body_font_size }}px;mso-line-height-rule:exactly;line-height:{{ fields.body_font_size }}px;font-weight:normal;padding-bottom:10px;"><!--[if mso]><a class="incomments font-color" href="%%=RedirectTo(@bannerLink)=%%" alias="Vacoda Text Banner" style="color:{{ theme.font_color }};text-decoration:none;"><strong style="color:{{ theme.font_color }};text-decoration:none;font-weight:normal;"><![endif]--><span>{{ fields.body }}</span><span class="valid-date">{{ fields.valid_thru }}</span><!--[if mso]></strong></a><![endif]--></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="2%"></td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => '* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
padding: 0;
margin: 0;
}

table, td {
border-collapse: collapse;
mso-table-lspace: 0pt;
mso-table-rspace: 0pt !important;
}

/* Banner Media Queries */
@media (max-width: 480px) {
* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
}

.banner-container { width: 320px !important; }
.W300 { width: 300px !important; }
.W310 { width: 310px !important; }
.hide { display: none !important; }
.textLalign { text-align: left !important; }

.textLalign6633 {
text-align: left !important;
width: 310px !important;
}

.ctaHeight { height: 0px !important; }
}

@media (max-width: 480px) {
.W100P {width:100% !important;}
.bannerStack {width:100% !important;display:block !important;}
.textLalign {text-align:left !important;}
}
',
                'is_image' => NULL,
                'has_cta' => 0,
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '724',
                'width_mobile' => '362',
            ),
            27 => 
            array (
                'id' => 28,
                'team_id' => 4,
                'creator_id' => 2,
                'name' => '724px | image upload',
                'description' => 'An image template for the 100 layout',
                'html' => '<!--100 image banner 724-->
<!--[if !mso]><!-- --><a href="{{ fields.url }}" alias="Vacoda_Text_Banner_{{fields.id}}"><!--<![endif]-->
<table class="banner-html banner-container-724" border="0" cellspacing="0" cellpadding="0" width="724" style="background-color: {{ theme.background_color }};">
<tr>
<td style="border:none; mso-table-lspace:0pt; mso-table-rspace:0pt; border-collapse:collapse; width: 100%;" class="headline">
<img :src="fields.image_path" alt="{{ fields.image_alt }}" width="{{ width }}" />
</td>
</tr>
</table>
<!--[if !mso]><!-- --></a><!--<![endif]-->
',
                'css' => '* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
padding: 0;
margin: 0;
}

table, td {
border-collapse: collapse;
mso-table-lspace: 0pt;
mso-table-rspace: 0pt !important;
}

/* Banner Media Queries */
@media (max-width: 480px) {
* {
/* Stop iProducts from auto-resizing text */
-webkit-text-size-adjust: none;
-ms-text-size-adjust: none;
-webkit-font-smoothing: antialiased;
}

.banner-container { width: 320px !important; }
.W300 { width: 300px !important; }
.W310 { width: 310px !important; }
.hide { display: none !important; }
.textLalign { text-align: left !important; }

.textLalign6633 {
text-align: left !important;
width: 310px !important;
}

.ctaHeight { height: 0px !important; }
}

@media (max-width: 480px) {
.W100P {width:100% !important;}
.bannerStack {width:100% !important;display:block !important;}
.textLalign {text-align:left !important;}
}
',
                'is_image' => 1,
                'has_cta' => 1,
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
                'deleted_at' => NULL,
                'width_desktop' => '724',
                'width_mobile' => '362',
            ),
        ));
        
        
    }
}
