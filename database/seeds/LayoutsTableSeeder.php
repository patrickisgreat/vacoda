<?php

use Illuminate\Database\Seeder;

class LayoutsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('layouts')->delete();
        
        \DB::table('layouts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '100',
                'description' => 'A full-width layout.',
                'html' => '<!--100 banner-->
<table class="banner-html banner-container" border="0" cellspacing="0" cellpadding="0" width="600" style="background-color: {{ theme.background_color }};">
<tbody v-component="section1"></tbody>
</table>',
                'css' => '* { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; -webkit-font-smoothing: antialiased;padding:0;margin:0;}/*Stop iproducts from auto-resizing text*/
table, td {  border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt !importan',
                'thumbnail' => '100.png',
                'created_at' => '2016-04-21 05:05:44',
                'updated_at' => '2016-04-21 05:05:44',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '50/50',
                'description' => 'A layout split in half.',
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
<tbody v-component="section1"></tbody>
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
<tbody v-component="section2"></tbody>
</table>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" width="10"></td>
</tr>
</table>',
                'css' => '* { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; -webkit-font-smoothing: antialiased;padding:0;margin:0;}/*Stop iproducts from auto-resizing text*/
table, td {  border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt !importan',
                'thumbnail' => '5050.png',
                'created_at' => '2016-04-21 05:05:44',
                'updated_at' => '2016-04-21 05:05:44',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
