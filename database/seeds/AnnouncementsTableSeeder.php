<?php

use Illuminate\Database\Seeder;

class AnnouncementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('announcements')->delete();
        
        \DB::table('announcements')->insert(array (
            0 => 
            array (
                'id' => '1cc9ef41-c506-49c4-ba59-935ac3a0a49d',
                'user_id' => 6,
                'body' => '11.21.2016 Vacoda Release Notes

Updated platform functionality
- Domain change to https://vacoda.io
- User interface upgrades:
- Banner creation steps have been consolidated to a single page
- Layouts and templates have been combined and users will now simply select the template they wish to use
- Overall design update
- Announcement tab where we can push out release notes, updates, and other information to all users
- Behind the scenes code updates that will allow us to better support Vacoda and your account

Platform fixes and other notes
- Offer import temporarily disabled for additional work
- Users can now email support via the user dropdown
- Cleaned up the way category selection works in preparation for importing new categories
- Offer owner is now a dropdown selection instead of a text field',
                'action_text' => '',
                'action_url' => '',
                'created_at' => '2016-11-21 19:48:47',
                'updated_at' => '2016-11-21 19:48:47',
            ),
            1 => 
            array (
                'id' => '3a8c09bc-576e-4df5-8add-dea6665731bf',
                'user_id' => 6,
                'body' => '12.08.2016 Hotfixes

- Fixed an issue where the option to return to the banner list or create another banner was not displayed after submitting a banner
- Fixed an issue where banner ID was not displayed after submission. Banner ID is now displayed on the page title and on the success modal after submission.',
                'action_text' => '',
                'action_url' => '',
                'created_at' => '2016-12-08 18:02:18',
                'updated_at' => '2016-12-08 18:02:57',
            ),
            2 => 
            array (
                'id' => '6574cc7c-7ecd-4eff-93a1-90af2b7f26d5',
                'user_id' => 6,
                'body' => 'Good afternoon everyone,

We have just pushed a couple of hotfixes to Vacoda that required no application downtime. We decided that these issues needed to be addressed quickly, which is why there wasn\'t communication about the issues before the fix. These fixes addressed a few issues we found this morning:

Vacoda hotfixes 2.2.2017
- Fixed an issue that was causing compiled banner code to duplicate
- Fixed an issue causing some subcategories to map incorrectly

Please note that no emails in production were affected. In order to ensure you\'re using the most updated code, please log out and log back in. As always, feel free to contact me with any questions or concerns.

Thanks,
Claire',
                'action_text' => '',
                'action_url' => '',
                'created_at' => '2017-02-02 19:18:55',
                'updated_at' => '2017-02-02 19:18:55',
            ),
            3 => 
            array (
                'id' => '71f7c562-7170-40cc-bc83-80c6f68efe88',
                'user_id' => 2,
                'body' => 'Welcome to the new Vacoda!',
                'action_text' => '',
                'action_url' => '',
                'created_at' => '2016-11-18 20:12:04',
                'updated_at' => '2016-11-18 20:12:04',
            ),
            4 => 
            array (
                'id' => '72307d03-1853-4968-b32f-2f75db694fd7',
                'user_id' => 6,
                'body' => 'Good afternoon all,

The Vacoda team has been hard at work prepping a new release. In order to get this release out to you, we\'re going to put Vacoda into maintenance mode next Thursday, 3/2, at 4pm. This means you will be unable to log in or perform actions after 4 pm. Please ensure you have completed any work before 4. Actions taken on a banner before maintenance mode (approving, saving, etc.) will still be processed via Vacoda’s queue system. The actions will continue to be handled as normal once the application is out of maintenance mode.

We\'re very excited about the new features in this release. I\'ve included the release notes below and will be sending out a demo video that documents some of the changes. It\'s fairly straightforward but if you have any questions or concerns, as always, please feel free to reach out to me.

Claire

Vacoda Release 3.2.2017

New features
- A calendar widget has been added to the home page that displays the active offers and banners for the day
- Users can toggle between days to see what is coming up
- Offers are marked with an orange dot and banners are marked with a yellow dot
- Clicking on an offer or banner link takes the user to the associated single-view page
- A needs review widget has been added to the home page that displays up to 10 pending banners
- Users can toggle between seeing the oldest or the most recent pending banners
- Clicking on an offer or banner link takes the user to the associated single-view page
- We have added the dynamic population of Vacoda banner IDs to the click Alias Tags for improved tracking

Updated features
- Users can now select multiple categories in the taxonomy section of banner create
- The email hook has been updated as well
- Users can now search the offer dropdown list when creating a banner

Bug fixes
- Fixed a bug where banner end dates were auto-populating the current date but not saving',
                'action_text' => '',
                'action_url' => '',
                'created_at' => '2017-02-22 19:44:40',
                'updated_at' => '2017-02-22 19:44:40',
            ),
            5 => 
            array (
                'id' => '796a389e-0ed1-4d38-860c-68c162f31c0d',
                'user_id' => 6,
                'body' => 'Good afternoon, all!

We\'ve been back at it to bring you new features and a more polished user interface. In order to get this release out to you, we\'ll be putting Vacoda into maintenance mode this Friday, 5/12 at 4 pm. Please be sure to have time-sensitive work wrapped up by 4, since you will be unable to log in or perform actions until the update is complete. We expect it to take a few hours and will complete the update as promptly as possible. Don\'t worry, though - actions taken on a banner before we initiate maintenance mode will still be processed as normal once we are done.

We\'re very excited about the new features in this release! Check out the updates in the release notes below and keep your eye out for a demo video we\'ll be sending your way that documents some of the changes. As always, don\'t hesitate to let us know if you have any questions or concerns.

Claire

Vacoda Release 5.12.2017

New features
- New banner templates are here! We\'ve added full-width text templates and image templates in 724px width. These have been added to the "Template" dropdown on Banner Create.
- Note: email templates are not built to resize banners and will need correctly-sized templates to display.
- To update any existing banners to one of the new templates, simply edit and re-approve.
- We\'ve added the ability to view and restore archived offers and banners. You can navigate to this view from the "Offers" or "Banners" dropdown in the top navigation.
- Offers and banners can be unarchived from the "Detail View" page.
- Unarchived banners will be set to Pending in Vacoda but will not update in Salesforce Marketing Cloud until they are edited or re-approved.

Updated features
- We\'ve updated the look and feel of the application in accordance with our new style guide. You\'ll notice some updates to navigation, color, fonts, tables, and more.
- We have a new top navigation that allows users to access "Create," "Active List" view, and "Archived List" view for offers and for banners.
- We\'ve updated the email hook to look for a matching banner of the correct size. So 600-width emails will look for 600-width banners, for example.',
                'action_text' => '',
                'action_url' => '',
                'created_at' => '2017-05-12 19:45:32',
                'updated_at' => '2017-05-12 19:45:32',
            ),
            6 => 
            array (
                'id' => 'c8e923ae-dd81-4c5c-9577-787f878f9a41',
                'user_id' => 6,
                'body' => 'Good afternoon, all!

We\'ve been hard at work developing some great new features and updating some of our existing code. In order to get this release out to you, we\'ll be putting Vacoda into maintenance mode today, 4/11 at 4 pm. Please be sure to have time-sensitive work wrapped up by 4, since you will be unable to log in or perform actions until the update is complete. We expect it to take a few hours and will complete it as promptly as possible. Don\'t worry, though - actions taken on a banner before maintenance mode will still be processed and will be handled as normal once we are done.

We\'re very excited about the new features in this release! Check out the updates in the release notes below and keep your eye out for a demo video we\'ll be sending your way that documents some of the changes. As always, don\'t hesitate to let us know if you have any questions or concerns.

Vacoda Release 4.11.2017

New features
- We\'ve added an alerts widget that notifies users if the queue has been unable to process their banner.
- If you see an alert, please reach out to support@vacoda.io so we can start working on a fix.
- An activity stream widget has been added to the home page. It displays a snippet of recent user activity.

Bug fixes
- We\'ve tweaked the save option when editing a banner that was approved. Previously it saved the information but remained on the edit page. It now refreshes and displays the changes on saving, along with showing the user a success message.
- Fixed an issue where old banners were not repopulating categories correctly.
- Fixed an issue where the progress bar and required fields weren\'t properly switching when changing templates.
- Fixed an issue where banner buttons sometimes weren\'t loading correctly.',
                'action_text' => '',
                'action_url' => '',
                'created_at' => '2017-04-11 19:03:41',
                'updated_at' => '2017-04-11 19:03:41',
            ),
            7 => 
            array (
                'id' => 'edd55490-41c8-44f1-b7cb-d3812a0f2653',
                'user_id' => 6,
                'body' => 'Good afternoon all,

The Vacoda team has been hard at work prepping a new release that adds a lot of functionality. In order to get this release out to you, we\'re going to put Vacoda into maintenance mode tomorrow, 1/27, at 4pm. This means you will be unable to log in or perform actions after 4 pm. Please ensure you have completed any work before 4. Actions taken on a banner before maintenance mode (approving, saving, etc.) will still be processed via Vacoda’s queue system. The actions will continue to be handled as normal once the application is out of maintenance mode.

We\'re very excited about the new features in this release. I\'ve included the release notes below and will be sending out a demo video on Monday that goes over some of the changes. It\'s fairly straightforward but if you have any questions or concerns, as always, please feel free to reach out to me.

Claire

Vacoda Release 1.27.2017

New features
- Approved banners can now be edited
- Editing a banner will set the status back to Pending on save
- Setting the status back to Pending means the banner will no longer be available for display in an email
- Edited banners must still be re-approved for display in an email
- Banners can now be exported as an image
- A new Output section has been added to the banner creation page
- Selecting the "export as image" option will cause the banner to send a .png file to Salesforce Marketing Cloud on approval

Updated features
- Refreshed banner creation process
- We\'ve added an updated preview pane that is now fixed at the top of the page
- If banners are too large for the fixed pane, the display will scale the preview down
- Users can click on a preview link to see a true-sized preview
- We\'ve added navigation links to banner create sections on the left-hand side of the page
- We\'ve added a detail summary page on the right-hand side of the page that includes offer information, marketing segmentation selection, and other key details
- We\'ve added a thumbnail preview to theme selection

Bug fixes
- Fixed an issue where a banner’s image upload meta data wasn’t always synced with Salesforce Marketing Cloud',
                'action_text' => '',
                'action_url' => '',
                'created_at' => '2017-01-26 23:29:59',
                'updated_at' => '2017-01-26 23:29:59',
            ),
        ));
        
        
    }
}
