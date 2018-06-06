# Gutenberg Manager

A simple and easy way to manage Gutenberg editor. You can disable/enable the editor and the elements for every post types.

Gutenberg is a great editor but sometime you could want to disable it for Pages, Posts or other post types. Gutenberg Manager allow you to enable/disable the editor where you want. Why would you want to disable the editor on pages? Maybe you would like to use a page builder like Visual Composer or Elementor instead! 

Gutenberg Editor will be probably included in the next great release of WordPress (5.0) so Gutenberg Manager will be really useful. With the Manager you can also decide to disable specific blocks in the editor if you don't need them.

If you are developing or editing a theme/plugin all features are also available via Hooks so you can include Gutenberg Manager plugin inside your theme and use it without the Option Panel.

## Installation (WordPress Backend)

1. Login to your WordPress website. When you're logged in, you will be in your "Dashboard". On the left-hand side, you will see a menu. In that menu, click on "Plugins".
2. Click on "Add New" near the top of the screen. Type "Gutenberg Manager" in the search bar.
3. This will give you a page of search results. Our plugin should be visible now. Click the "Install Now" link to start installing our plugin.
4. Click the "Activate" button that appeared where the "Install Now" button was previously located. 

## Installation (FTP)

1. Download Gutenberg Manager zip file from Github (Releases) or WordPress.org repository.
2. "Unzip" the file you just downloaded and you will see a folder called "manager-for-gutenberg".
3. Login to your hosting using your FTP account.
4. Go to the folder /wp-content/plugins/ on your WP installation and upload the "manager-for-gutenberg" folder.
5. Now login your WP backend and in Plugins page "Activate" Gutenberg Manager

## How to use

Under "Gutenberg" menu in your dashboard you'll find a new button "Gutenberg Manager". This is the Option Panel of our plugin. For now it includes 4 options areas:

1. Settings
2. Default Blocks
3. Additional Blocks
4. API/Hooks

## Settings

Here you can globally disable Gutenberg Editor or manage the visibility of editor in the different post types.

![Gutenberg Manager Panel](http://uncommons.pro/github/gutenberg-manager-media/Gutenberg_Manager_Panel.png)

## Default Blocks

Here you can disable the default blocks in the Editor.

![Gutenberg Manager Default Blocks](http://uncommons.pro/github/gutenberg-manager-media/Gutenberg_Manager_Default_Blocks.png)

## Additional Blocks

Here you can enable our additional blocks in the Editor. 

> This section is under construction

## API/Hooks

Here you find a list of Hooks to use in your custom Theme/Plugin!
> Note: there is an action to disable the Option Panel of Gutenberg Manager so our plugin will be hidden for the final user but the theme/plugin developer can use all the plugin's features.

![Gutenberg Manager Hooks](http://uncommons.pro/github/gutenberg-manager-media/Gutenberg_Manager_Hooks.png)

## How You Can Contribute

Anyone is welcome to contribute to Gutenberg Manager.

There are various ways you can contribute:

* [Raise an issue](https://github.com/unCommonsTeam/gutenberg-manager/issues) on GitHub.
* [Send us a Pull Request](https://github.com/unCommonsTeam/gutenberg-manager/pulls) with your bug fixes and/or new features.
* Provide feedbacks and [suggestions on enhancements](https://github.com/unCommonsTeam/gutenberg-manager/labels/enhancement).