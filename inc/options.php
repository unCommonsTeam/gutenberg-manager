<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

/**
 * Gutenberg Manager options.
 * @since 1.0
 */

// Options Menu
add_action('admin_menu', 'add_gutenberg_manager_menu', 105);

function add_gutenberg_manager_menu(){

    add_submenu_page('options-general.php', 'Gutenberg Manager', 'Gutenberg Manager', 'manage_options', 'gutenberg-manager', 'gutenberg_manager_page');

}

//Options Page
function gutenberg_manager_page(){ ?>

    <div class="wrap">

        <h2><?php esc_html_e('Gutenberg Manager', 'gutenberg-manager'); ?></h2>

        <?php
        // Default Data
        if( isset( $_GET[ 'tab' ] ) ) {
            $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'settings';
        }else{
            $active_tab = 'settings';
        }

        // Default Blocks Alert
        if( $active_tab == 'default-blocks' ) {
            echo '
            <div class="notice notice-warning is-dismissible">
                <p>' . esc_html__('Attention: if you disable a block that you have already used in a post/page you may get an editor issue.', 'gutenberg-manager') . '</p>
            </div>';
        }

        // Notices
        if( get_option('gm-global-disable') && !is_plugin_active('classic-editor/classic-editor.php') ){ ?>

            <div class="notice notice-warning is-dismissible">
                <p><?php esc_html_e('Warning: Gutenberg Editor is globally disabled.', 'gutenberg-manager'); ?></p>
            </div>

        <?php }

        // Post Types Array
        $post_types = get_post_types(array('public' => true, '_builtin' => false), 'object');

        // Default Blocks Array
        $default_blocks = array(

            'Common' => array(
                array( 'slug' => 'core/image', 'name' => 'image', 'title' => 'Image' ),
                array( 'slug' => 'core/gallery', 'name' => 'gallery', 'title' => 'Gallery' ),
                array( 'slug' => 'core/heading', 'name' => 'heading', 'title' => 'Heading' ),
                array( 'slug' => 'core/quote', 'name' => 'quote', 'title' => 'Quote' ),
                array( 'slug' => 'core/list', 'name' => 'list', 'title' => 'List' ),
                array( 'slug' => 'core/cover', 'name' => 'cover', 'title' => 'Cover' ),
                array( 'slug' => 'core/video', 'name' => 'video', 'title' => 'Video' ),
                array( 'slug' => 'core/audio', 'name' => 'audio', 'title' => 'Audio' ),
                array( 'slug' => 'core/paragraph', 'name' => 'paragraph', 'title' => 'Paragraph' ),
                array( 'slug' => 'core/file', 'name' => 'file', 'title' => 'File' ),
            ),

            'Formatting' => array(
                array( 'slug' => 'core/pullquote', 'name' => 'pullquote', 'title' => 'Pullquote' ),
                array( 'slug' => 'core/table', 'name' => 'table', 'title' => 'Table' ),
                array( 'slug' => 'core/preformatted', 'name' => 'preformatted', 'title' => 'Preformatted' ),
                array( 'slug' => 'core/code', 'name' => 'code', 'title' => 'Code' ),
                array( 'slug' => 'core/html', 'name' => 'html', 'title' => 'Custom HTML' ),
                array( 'slug' => 'core/freeform', 'name' => 'freeform', 'title' => 'Classic' ),
                array( 'slug' => 'core/verse', 'name' => 'verse', 'title' => 'Verse' ),
            ),

            'Layout' => array(
                array( 'slug' => 'core/media-text', 'name' => 'media-text', 'title' => 'Media & Text' ),
                array( 'slug' => 'core/separator', 'name' => 'separator', 'title' => 'Separator' ),
                array( 'slug' => 'core/more', 'name' => 'more', 'title' => 'More' ),
                array( 'slug' => 'core/button', 'name' => 'button', 'title' => 'Button' ),
                array( 'slug' => 'core/columns', 'name' => 'columns', 'title' => 'Columns' ),
                array( 'slug' => 'core/nextpage', 'name' => 'nextpage', 'title' => 'Page Break' ),
                array( 'slug' => 'core/spacer', 'name' => 'spacer', 'title' => 'Spacer' ),
            ),

            'Widgets' => array(
                array( 'slug' => 'core/shortcode', 'name' => 'shortcode', 'title' => 'Shortcode' ),
                array( 'slug' => 'core/latest-posts', 'name' => 'latest-posts', 'title' => 'Latest Posts' ),
                array( 'slug' => 'core/latest-comments', 'name' => 'latest-comments', 'title' => 'Latest Comments' ),
                array( 'slug' => 'core/categories', 'name' => 'categories', 'title' => 'Categories' ),
                array( 'slug' => 'core/archives', 'name' => 'archives', 'title' => 'Archives' ),
            ),

            'Embed' => array(
                array( 'slug' => 'core/embed', 'name' => 'embed', 'title' => 'Embed' ),
                array( 'slug' => 'core-embed/twitter', 'name' => 'twitter', 'title' => 'Twitter' ),
                array( 'slug' => 'core-embed/youtube', 'name' => 'youtube', 'title' => 'YouTube' ),
                array( 'slug' => 'core-embed/facebook', 'name' => 'facebook', 'title' => 'Facebook' ),
                array( 'slug' => 'core-embed/instagram', 'name' => 'instagram', 'title' => 'Instagram' ),
                array( 'slug' => 'core-embed/wordpress', 'name' => 'wordpress', 'title' => 'WordPress' ),
                array( 'slug' => 'core-embed/soundcloud', 'name' => 'soundcloud', 'title' => 'SoundCloud' ),
                array( 'slug' => 'core-embed/spotify', 'name' => 'spotify', 'title' => 'Spotify' ),
                array( 'slug' => 'core-embed/flickr', 'name' => 'flickr', 'title' => 'Flickr' ),
                array( 'slug' => 'core-embed/vimeo', 'name' => 'vimeo', 'title' => 'Vimeo' ),
                array( 'slug' => 'core-embed/animoto', 'name' => 'animoto', 'title' => 'Animoto' ),
                array( 'slug' => 'core-embed/cloudup', 'name' => 'cloudup', 'title' => 'Cloudup' ),
                array( 'slug' => 'core-embed/collegehumor', 'name' => 'collegehumor', 'title' => 'CollegeHumor' ),
                array( 'slug' => 'core-embed/dailymotion', 'name' => 'dailymotion', 'title' => 'Dailymotion' ),
                array( 'slug' => 'core-embed/funnyordie', 'name' => 'funnyordie', 'title' => 'Funny or Die' ),
                array( 'slug' => 'core-embed/hulu', 'name' => 'hulu', 'title' => 'Hulu' ),
                array( 'slug' => 'core-embed/imgur', 'name' => 'imgur', 'title' => 'Imgur' ),
                array( 'slug' => 'core-embed/issuu', 'name' => 'issuu', 'title' => 'Issuu' ),
                array( 'slug' => 'core-embed/kickstarter', 'name' => 'kickstarter', 'title' => 'Kickstarter' ),
                array( 'slug' => 'core-embed/meetup-com', 'name' => 'meetup-com', 'title' => 'Meetup.com' ),
                array( 'slug' => 'core-embed/mixcloud', 'name' => 'mixcloud', 'title' => 'Mixcloud' ),
                array( 'slug' => 'core-embed/photobucket', 'name' => 'photobucket', 'title' => 'Photobucket' ),
                array( 'slug' => 'core-embed/polldaddy', 'name' => 'polldaddy', 'title' => 'Polldaddy' ),
                array( 'slug' => 'core-embed/reddit', 'name' => 'reddit', 'title' => 'Reddit' ),
                array( 'slug' => 'core-embed/reverbnation', 'name' => 'reverbnation', 'title' => 'ReverbNation' ),
                array( 'slug' => 'core-embed/screencast', 'name' => 'screencast', 'title' => 'Screencast' ),
                array( 'slug' => 'core-embed/scribd', 'name' => 'scribd', 'title' => 'Scribd' ),
                array( 'slug' => 'core-embed/slideshare', 'name' => 'slideshare', 'title' => 'Slideshare' ),
                array( 'slug' => 'core-embed/smugmug', 'name' => 'smugmug', 'title' => 'SmugMug' ),
                array( 'slug' => 'core-embed/speaker-deck', 'name' => 'speaker-deck', 'title' => 'Speaker Deck' ),
                array( 'slug' => 'core-embed/ted', 'name' => 'ted', 'title' => 'TED' ),
                array( 'slug' => 'core-embed/tumblr', 'name' => 'tumblr', 'title' => 'Tumblr' ),
                array( 'slug' => 'core-embed/videopress', 'name' => 'videopress', 'title' => 'VideoPress' ),
                array( 'slug' => 'core-embed/wordpress-tv', 'name' => 'wordpress-tv', 'title' => 'WordPress.tv' ),
            ),

        );

        // Options names list
        $opt_names_list = '';

        ?>

        <div class="gm-content-sidebar-wrap">

            <div class="gm-content">

                <h2 class="nav-tab-wrapper">
                    <a href="?page=gutenberg-manager&tab=settings" class="nav-tab <?php echo $active_tab == 'settings' ? 'nav-tab-active' : ''; ?>">
                        <i class="dashicons dashicons-admin-settings"></i> <?php esc_html_e('Settings', 'gutenberg-manager'); ?>
                    </a>
                    <a href="?page=gutenberg-manager&tab=default-blocks" class="nav-tab <?php echo $active_tab == 'default-blocks' ? 'nav-tab-active' : ''; ?>">
                        <i class="dashicons dashicons-welcome-write-blog"></i> <?php esc_html_e('Default Blocks', 'gutenberg-manager'); ?>
                    </a>
                    <a href="?page=gutenberg-manager&tab=additional-blocks" class="nav-tab <?php echo $active_tab == 'additional-blocks' ? 'nav-tab-active' : ''; ?>">
                        <i class="dashicons dashicons-welcome-add-page"></i> <?php esc_html_e('Additional Blocks', 'gutenberg-manager'); ?>
                    </a>
                    <a href="?page=gutenberg-manager&tab=api-hooks" class="nav-tab <?php echo $active_tab == 'api-hooks' ? 'nav-tab-active' : ''; ?>">
                        <i class="dashicons dashicons-editor-code"></i> <?php esc_html_e('API/Hooks ', 'gutenberg-manager'); ?>
                    </a>
                    <a href="?page=gutenberg-manager&tab=more" class="nav-tab <?php echo $active_tab == 'more' ? 'nav-tab-active' : ''; ?>">
                        <i class="dashicons dashicons-plus"></i> <?php esc_html_e('More features are coming...', 'gutenberg-manager'); ?>
                    </a>
                </h2>

                <form method="post" action="options.php" class="gm-options-form">

                    <?php wp_nonce_field('update-options') ?>

                    <!-- SETTINGS -->
                    <?php if( $active_tab == 'settings' ) { ?>

                        <?php
                        // Settings Opt Names
                        $opt_names_list .= 'gm-global-disable,gm-page-disable,gm-post-disable,';
                        foreach( $post_types as $name=>$obj ) {
                            $opt_names_list .= 'gm-'.$name.'-disable,';
                        }
                        ?>

                        <div class="tab_intro">
                            <p><?php esc_html_e('Here you can globally disable Gutenberg Editor or manage the visibility of editor in the different post types.', 'gutenberg-manager'); ?></p>
                        </div>

                        <div class="gm-container">

                            <h3><span class="dashicons dashicons-admin-site"></span> <?php esc_html_e('Global Options', 'gutenberg-manager'); ?></h3>

                            <div class="gm-container-content">

                                <table class="form-table">
                                    <tbody>
                                    <!-- GLOBAL -->
                                    <tr>
                                        <th scope="row"><?php esc_html_e('Globally disable Gutenberg', 'gutenberg-manager'); ?></th>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="gm-global-disable" value="1" <?php if( get_option('gm-global-disable') ){ echo 'checked'; } ?>>
                                                <?php esc_html_e('Disable', 'gutenberg-manager'); ?>
                                            </label>
                                            <br>
                                            <p class="description indicator-hint">
                                                <?php esc_html_e('Disable the editor globally to use the classic wp editor instead', 'gutenberg-manager'); ?><br>
                                                <strong><?php esc_html_e('Note: this option will overide all the next options', 'gutenberg-manager'); ?></strong>
                                            </p>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>

                        </div>

                        <div class="gm-container">

                            <h3><span class="dashicons dashicons-admin-page"></span> <?php esc_html_e('Standard Post Types', 'gutenberg-manager'); ?></h3>

                            <div class="gm-container-content">

                                <table class="form-table">
                                    <tbody>
                                    <!-- PAGES -->
                                    <tr>
                                        <th scope="row"><?php esc_html_e('Pages', 'gutenberg-manager'); ?></th>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="gm-page-disable" value="1" <?php if( get_option('gm-page-disable') ){ echo 'checked'; } ?>>
                                                <?php esc_html_e('Disable', 'gutenberg-manager'); ?>
                                            </label>
                                            <br>
                                            <p class="description indicator-hint">
                                                <?php esc_html_e('Disable the editor on Pages', 'gutenberg-manager'); ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <!-- POSTS -->
                                    <tr>
                                        <th scope="row"><?php esc_html_e('Posts', 'gutenberg-manager'); ?></th>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="gm-post-disable" value="1" <?php if( get_option('gm-post-disable') ){ echo 'checked'; } ?>>
                                                <?php esc_html_e('Disable', 'gutenberg-manager'); ?>
                                            </label>
                                            <br>
                                            <p class="description indicator-hint">
                                                <?php esc_html_e('Disable the editor on Posts', 'gutenberg-manager'); ?>
                                            </p>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>

                        </div>

                        <div class="gm-container">

                            <h3><span class="dashicons dashicons-admin-generic"></span> <?php esc_html_e('Custom Post Types', 'gutenberg-manager'); ?></h3>

                            <div class="gm-container-content">

                                <table class="form-table">
                            <tbody>
                            <?php
                            if( $post_types ) {
                                // Post Types Loop
                                foreach ($post_types as $name => $obj) { ?>

                                    <tr>
                                        <th scope="row"><?php echo $obj->label; ?></th>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="gm-<?php echo $name; ?>-disable"
                                                       value="1" <?php if (get_option('gm-' . $name . '-disable')) {
                                                    echo 'checked';
                                                } ?>>
                                                <?php esc_html_e('Disable', 'gutenberg-manager'); ?>
                                            </label>
                                            <br>

                                            <p class="description indicator-hint">
                                                <?php esc_html_e('Disable the editor on ', 'gutenberg-manager');
                                                echo $obj->label; ?>
                                            </p>
                                        </td>
                                    </tr>

                                <?php } // End Loop

                            }else{

                                ?>

                                <tr><td><?php esc_html_e('No additional Post Types are available', 'gutenberg-manager'); ?></td></tr>

                                <?php

                            }
                            ?>

                            </tbody>
                        </table>

                            </div>

                        </div>

                    <?php } ?>

                    <!-- DEFAULT BLOCKS -->
                    <?php if( $active_tab == 'default-blocks' ) { ?>

                        <?php
                        // Default Blocks Opt Names
                        foreach( $default_blocks as $cat=>$blocks ){
                            foreach( $blocks as $block ){
                                $opt_names_list .= 'gm-block-'.$block['name'].'-disable,';
                            }
                        }
                        ?>

                        <div class="tab_intro">
                            <p><?php esc_html_e('Here you can disable the default blocks in the Editor.', 'gutenberg-manager'); ?></p>
                        </div>

                        <?php foreach( $default_blocks as $cat=>$blocks ) { ?>

                            <?php
                            // Icons
                            $cat_icon = '';
                            switch( $cat ){
                                case 'Common':
                                    $cat_icon = 'dashicons dashicons-admin-generic';
                                    break;
                                case 'Formatting':
                                    $cat_icon = 'dashicons dashicons-align-left';
                                    break;
                                case 'Layout':
                                    $cat_icon = 'dashicons dashicons-layout';
                                    break;
                                case 'Widgets':
                                    $cat_icon = 'dashicons dashicons-welcome-widgets-menus';
                                    break;
                                case 'Embed':
                                    $cat_icon = 'dashicons dashicons-editor-code';
                                    break;
                            }
                            ?>

                            <div class="gm-container">

                                <h3><span class="<?php echo $cat_icon; ?>"></span> <?php echo $cat; ?>  <span style="float: right; font-size: 14px;"><input id="select-<?php echo $cat; ?>" type="checkbox" name="select-<?php echo $cat; ?>" value="1"> Select/Deselect All </span></h3>

                                <div class="gm-container-content">

                                    <table class="form-table <?php echo $cat; ?>">
                                        <tbody>

                                        <tr>
                                        <?php $index = 0; ?>
                                        <?php foreach( $blocks as $block ){ ?>

                                            <?php if ($index > 0 and $index % 2 == 0) { ?>

                                                </tr><tr>

                                            <?php } ?>
                                            <th scope="row" valign="middle"><?php echo $block['title']; ?></th>
                                            <td>
                                                <label>
                                                    <input type="checkbox" name="gm-block-<?php echo $block['name']; ?>-disable" value="1" <?php if( get_option('gm-block-'.$block['name'].'-disable') ){ echo 'checked'; } ?>>
                                                    <?php esc_html_e('Disable', 'gutenberg-manager'); ?>
                                                </label>
                                            </td>

                                            <?php $index++; ?>

                                        <?php } ?>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>

                            </div>

                        <?php } ?>

                    <?php } ?>

                    <!-- ADDITIONAL BLOCKS -->
                    <?php if( $active_tab == 'additional-blocks' ) { ?>

                        <div class="tab_intro">
                            <p><?php esc_html_e('Here you can enable our additional blocks in the Editor.', 'gutenberg-manager'); ?></p>
                        </div>

                        <h2>This section is under construction</h2>

                        <a class="button button-secondary" href="?page=gutenberg-manager&tab=more">
                            More Informations
                        </a>

                        <style>.gm-update-button { display: none !important; }</style>

                    <?php } ?>

                    <!-- API/HOOKS -->
                    <?php if( $active_tab == 'api-hooks' ) { ?>

                        <div class="tab_intro">
                            <p><?php esc_html_e('Here you find a list of Hooks to use in your custom Theme/Plugin!', 'gutenberg-manager'); ?></p>
                        </div>

                        <style>.gm-update-button { display: none !important; }</style>

                        <!-- GLOBAL ACTIONS -->
                        <div class="gm-container">

                            <h3><span class="dashicons dashicons-admin-site"></span> <?php esc_html_e('Global Actions', 'gutenberg-manager'); ?></h3>

                            <div class="gm-container-content">

                                <h4><?php esc_html_e('HOOK', 'gutenberg-manager'); ?>: <code>gm_global</code></h4>


                                <h4><?php esc_html_e('Hidden Mode', 'gutenberg-manager'); ?></h4>

<pre class="language-php"><code class="language-php">
add_action ( 'gm_global', 'your_global_features' );

function your_global_features(){

    // This is the function to enable the hidden mode
    gm_set_hidden(true);

}

</code></pre>

                                <p class="description indicator-hint">
                                    <?php esc_html_e('Enabling the Hidden Mode you can use Gutenberg Manager without option panel, simply using the hooks.', 'gutenberg-manager'); ?><br>
                                    <b><?php esc_html_e('Warning: this action will empty all options you saved in Gutenberg Manager panel!', 'gutenberg-manager'); ?></b>
                                </p>

                                <br>

                                <h4><?php esc_html_e('Globally disable Gutenberg', 'gutenberg-manager'); ?></h4>

<pre class="language-php"><code class="language-php">
add_action ( 'gm_global', 'your_global_features' );

function your_global_features(){

    // This is the function to completely disable Gutenberg Editor
    gm_global_disable(true);

}

</code></pre>

                                <p class="description indicator-hint">
                                    <?php esc_html_e('Disable the editor globally to use the classic wp editor instead', 'gutenberg-manager'); ?><br>
                                </p>

                                <br>

                            </div>

                        </div>

                        <!-- POST TYPES -->
                        <div class="gm-container">

                            <h3><span class="dashicons dashicons-admin-generic"></span> <?php esc_html_e('Post Types', 'gutenberg-manager'); ?></h3>

                            <div class="gm-container-content">

                                <h4><?php esc_html_e('HOOK', 'gutenberg-manager'); ?>: <code>gm_post_types</code></h4>


                                <h4><?php esc_html_e('Diable Post Types by Name', 'gutenberg-manager'); ?></h4>

<pre class="language-php"><code class="language-php">
add_action ( 'gm_post_types', 'your_posttypes_managing' );

function your_posttypes_managing(){

    // This function will disable Gutenberg Editor on Posts, Pages, Custom post type and it accepts an array of values
    gm_disable_post_type(
        array(
            'post',
            'page',
            'custom_post_type'
        )
    );

}

</code></pre>

                                <p class="description indicator-hint">
                                    <?php esc_html_e('Disable Gutenberg Editor on specific post types.', 'gutenberg-manager'); ?><br>
                                    <b><?php esc_html_e('Warning: in the array of post types you have to use the post type\'s registration name.', 'gutenberg-manager'); ?></b>
                                </p>

                                <br>

                            </div>

                        </div>

                        <!-- DEFAULT BLOCKS -->
                        <div class="gm-container">

                            <h3><span class="dashicons dashicons-welcome-write-blog"></span> <?php esc_html_e('Default Blocks', 'gutenberg-manager'); ?></h3>

                            <div class="gm-container-content">

                                <h4><?php esc_html_e('HOOK', 'gutenberg-manager'); ?>: <code>gm_default_blocks</code></h4>


                                <h4><?php esc_html_e('Diable Default Blocks by Name', 'gutenberg-manager'); ?></h4>

<pre class="language-php"><code class="language-php">
add_action ( 'gm_default_blocks', 'your_default_blocks_managing' );

function your_default_blocks_managing(){

    // This function will disable Image, Facebook and Twitter blocks on Gutenberg Editor and it accepts an array of values
    gm_disable_block(
        array(
            'image',
            'facebook',
            'twitter'
        )
    );

}

</code></pre>

                                <p class="description indicator-hint">
                                    <?php esc_html_e('Disable Gutenberg\'s Default Blocks.', 'gutenberg-manager'); ?><br>
                                </p>

                                <br>

                                <h4><?php esc_html_e('Blocks names', 'gutenberg-manager'); ?></h4>

<pre class="language-php"><code class="language-php">
array(
    //Common Blocks
    'image', // Image
    'gallery', // Gallery
    'heading', // Heading
    'quote', // Quote
    'list', // List
    'cover', // Cover
    'video', // Video
    'audio', // Audio
    'paragraph', // Paragraph
    'file', // File

    // Formatting
    'pullquote', // Pullquote
    'table', // Table
    'preformatted', // Preformatted
    'code', // Code
    'custom_html', // Custom HTML
    'classic_text', // Classic
    'verse', // Verse

    // Layouts Elements
    'media_text', // Media & Text
    'separator', // Separator
    'more', // More
    'button', // Button
    'columns', // Columns
    'nextpage', // Page Break
    'spacer', // Spacer

    // Widgets
    'shortcode', // Shortcode
    'latest_posts', // Latest Posts
    'latest_comments', // Latest Comments
    'categories', // Categories
    'archives', // Archives

    // Embeds
    'embed', // Embed
    'twitter', // Twitter
    'youtube', // YouTube
    'facebook', // Facebook
    'instagram', // Instagram
    'wordpress', // WordPress
    'soundcloud', // SoundCloud
    'spotify', // Spotify
    'flickr', // Flickr
    'vimeo', // Vimeo
    'animoto', // Animoto
    'cloudup', // Cloudup
    'collegehumor', // CollegeHumor
    'dailymotion', // Dailymotion
    'funny_or_die', // Funny or Die
    'hulu', // Hulu
    'imgur', // Imgur
    'issuu', // Issuu
    'kickstarter', // Kickstarter
    'meetup', // Meetup.com
    'mixcloud', // Mixcloud
    'photobucket', // Photobucket
    'polldaddy', // Polldaddy
    'reddit', // Reddit
    'reverbnation', // ReverbNation
    'screencast', // Screencast
    'scribd', // Scribd
    'slideshare', // Slideshare
    'smugmug', // SmugMug
    'speaker_deck', // Speaker Deck
    'ted', // TED
    'tumblr', // Tumblr
    'videopress', // VideoPress
    'wordpress_tv', // WordPress.tv
)

</code></pre>

                                <p class="description indicator-hint">
                                    <?php esc_html_e('In this array you\'ll find the names to disable all default blocks.', 'gutenberg-manager'); ?><br>
                                </p>

                                <br>

                            </div>

                        </div>

                    <?php } ?>

                    <!-- MORE FEATURES -->
                    <?php if( $active_tab == 'more' ) { ?>

                        <img class="gm-image gm-more-image" src="<?php echo GM_URL.'assets/images/working-hard.jpg'; ?>">
                        <h2 class="gm-more-title">We are working hard to improve the plugin and to add more amazing features on Gutenberg Editor!</h2>
                        <div class="gm-more-text">
                            <h3>If you have some idea to improve the plugin please share it with us!</h3>
                            You can do it in GitHub or using the Support feature in plugin's page.
                            <br>
                            Your ideas will help us to improve Gutenberg Manager!
                            <br><br>
                            <a class="button button-secondary" href="https://github.com/unCommonsTeam/gutenberg-manager/" target="_blank">
                                <img src="<?php echo GM_URL.'assets/images/github-icon.png'; ?>"> GitHub
                            </a>
                            <br><br>
                            <a class="button button-secondary" href="https://wordpress.org/plugins/manager-for-gutenberg/" target="_blank">
                                <img src="<?php echo GM_URL.'assets/images/wp-icon.png'; ?>"> Plugin's Page
                            </a>
                        </div>
                        <div class="gm-clearfix"></div>

                        <style>.gm-update-button { display: none !important; }</style>

                    <?php } ?>

                    <p class="submit gm-update-button">
                        <input name="submit_btn" id="submit_btn" class="button button-primary" value="<?php esc_html_e('Save Changes', 'gutenberg-manager'); ?>" type="submit">
                    </p>

                    <?php
                    // Remove latest comma from opt list
                    $opt_names_list = rtrim( $opt_names_list, ',' );
                    ?>
                    <input type="hidden" name="page_options" value="<?php echo $opt_names_list; ?>" />
                    <input type="hidden" name="action" value="update" />
                    <input type="hidden" name="warn" value="0" />

                </form>

            </div>

            <div class="gm-sidebar">

                <!-- GitHub Spot -->
                <div class="gm-sidebar-spot">

                    <h2>GitHub Project</h2>
                    <p>
                        <a href="https://github.com/unCommonsTeam/gutenberg-manager/" target="_blank">
                            <img src="<?php echo GM_URL.'assets/images/github-banner.jpg'; ?>">
                        </a>
                        Use <b>GitHub</b> to open <a href="https://github.com/unCommonsTeam/gutenberg-manager/issues" target="_blank">issues</a> or to <a href="https://github.com/unCommonsTeam/gutenberg-manager/pulls" target="_blank">contribute</a> to the developing. You're a precious resource for us.
                    </p>

                </div>

                <!-- Contibute -->
                <div class="gm-sidebar-spot">

                    <h2>Contribute</h2>
                    <p>
                        <img src="<?php echo GM_URL.'assets/images/share-ideas-banner.jpg'; ?>">
                        If you have some <b>idea</b> to improve the plugin <b>share it</b> with us using the support forum in <a href="https://wordpress.org/plugins/manager-for-gutenberg" target="_blank">WP.org</a> or <a href="https://github.com/unCommonsTeam/gutenberg-manager/issues" target="_blank">GitHub</a>
                    </p>

                </div>

                <!-- Rate Us -->
                <div class="gm-sidebar-spot">

                    <h2>Rate Us</h2>
                    <p>
                        <a href="https://wordpress.org/plugins/manager-for-gutenberg/reviews/" target="_blank"><img src="<?php echo GM_URL.'assets/images/rate-us-banner.jpg'; ?>"></a>
                        Your  <a href="https://wordpress.org/plugins/manager-for-gutenberg/reviews/" target="_blank"><b>Rate</b></a> is really important for the future of plugin. But if you get a problem, <b>before</b> to give a bad rate, use <a href="https://github.com/unCommonsTeam/gutenberg-manager/issues" target="_blank">GitHub</a> or <a href="https://wordpress.org/support/plugin/manager-for-gutenberg" target="_blank">support forum</a> so we can help you to solve it!
                    </p>

                </div>

                <!-- Support Development -->
                <div class="gm-sidebar-spot">

                    <h2>Support Development</h2>
                    <p>
                        <a href="https://www.paypal.me/unCommonsTeam" target="_blank"><img src="<?php echo GM_URL.'assets/images/donate-banner.jpg'; ?>"></a>
                        Your donations will be used to <a href="https://www.paypal.me/unCommonsTeam" target="_blank"><b>support the development</b></a> of Gutenberg Manager.
                    </p>

                </div>

            </div>

        </div>

    </div>

<?php
}

