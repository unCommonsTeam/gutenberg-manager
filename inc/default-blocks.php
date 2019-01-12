<?php
/**
 * Gutenberg Manager Default Blocks managing.
 * @since 1.0
 */

add_filter( 'allowed_block_types', 'misha_allowed_block_types', 10, 2 );

function misha_allowed_block_types( $allowed_blocks, $post ){

    // Default Blocks Array
    $default_blocks = array(

        array('slug' => 'core/image', 'opt' => 'gm-block-image-disable', 'title' => 'Image', 'const' => 'GM_DISABLE_BLOCK_image'),
        array('slug' => 'core/gallery', 'opt' => 'gm-block-gallery-disable', 'title' => 'Gallery', 'const' => 'GM_DISABLE_BLOCK_gallery'),
        array('slug' => 'core/heading', 'opt' => 'gm-block-heading-disable', 'title' => 'Heading', 'const' => 'GM_DISABLE_BLOCK_heading'),
        array('slug' => 'core/quote', 'opt' => 'gm-block-quote-disable', 'title' => 'Quote', 'const' => 'GM_DISABLE_BLOCK_quote'),
        array('slug' => 'core/list', 'opt' => 'gm-block-list-disable', 'title' => 'List', 'const' => 'GM_DISABLE_BLOCK_list'),
        array('slug' => 'core/cover', 'opt' => 'gm-block-cover-disable', 'title' => 'Cover', 'const' => 'GM_DISABLE_BLOCK_cover'),
        array('slug' => 'core/video', 'opt' => 'gm-block-video-disable', 'title' => 'Video', 'const' => 'GM_DISABLE_BLOCK_video'),
        array('slug' => 'core/audio', 'opt' => 'gm-block-audio-disable', 'title' => 'Audio', 'const' => 'GM_DISABLE_BLOCK_audio'),
        array('slug' => 'core/paragraph', 'opt' => 'gm-block-paragraph-disable', 'title' => 'Paragraph', 'const' => 'GM_DISABLE_BLOCK_paragraph'),
        array('slug' => 'core/file', 'opt' => 'gm-block-file-disable', 'title' => 'File', 'const' => 'GM_DISABLE_BLOCK_file'),

        array('slug' => 'core/pullquote', 'opt' => 'gm-block-pullquote-disable', 'title' => 'Pullquote', 'const' => 'GM_DISABLE_BLOCK_pullquote'),
        array('slug' => 'core/table', 'opt' => 'gm-block-table-disable', 'title' => 'Table', 'const' => 'GM_DISABLE_BLOCK_table'),
        array('slug' => 'core/preformatted', 'opt' => 'gm-block-preformatted-disable', 'title' => 'Preformatted', 'const' => 'GM_DISABLE_BLOCK_preformatted'),
        array('slug' => 'core/code', 'opt' => 'gm-block-code-disable', 'title' => 'Code', 'const' => 'GM_DISABLE_BLOCK_code'),
        array('slug' => 'core/html', 'opt' => 'gm-block-html-disable', 'title' => 'Custom HTML', 'const' => 'GM_DISABLE_BLOCK_custom_html'),
        array('slug' => 'core/freeform', 'opt' => 'gm-block-freeform-disable', 'title' => 'Classic', 'const' => 'GM_DISABLE_BLOCK_classic_text'),
        array('slug' => 'core/verse', 'opt' => 'gm-block-verse-disable', 'title' => 'Verse', 'const' => 'GM_DISABLE_BLOCK_verse'),

        array('slug' => 'core/media-text', 'opt' => 'gm-block-media-text-disable', 'title' => 'Media & Text', 'const' => 'GM_DISABLE_BLOCK_media_text'),
        array('slug' => 'core/separator', 'opt' => 'gm-block-separator-disable', 'title' => 'Separator', 'const' => 'GM_DISABLE_BLOCK_separator'),
        array('slug' => 'core/more', 'opt' => 'gm-block-more-disable', 'title' => 'More', 'const' => 'GM_DISABLE_BLOCK_more'),
        array('slug' => 'core/button', 'opt' => 'gm-block-button-disable', 'title' => 'Button', 'const' => 'GM_DISABLE_BLOCK_button'),
        array('slug' => 'core/columns', 'opt' => 'gm-block-columns-disable', 'title' => 'Columns', 'const' => 'GM_DISABLE_BLOCK_columns'),
        array('slug' => 'core/nextpage', 'opt' => 'gm-block-nextpage-disable', 'title' => 'Page Break', 'const' => 'GM_DISABLE_BLOCK_nextpage'),
        array('slug' => 'core/spacer', 'opt' => 'gm-block-spacer-disable', 'title' => 'Spacer', 'const' => 'GM_DISABLE_BLOCK_spacer'),

        array('slug' => 'core/shortcode', 'opt' => 'gm-block-shortcode-disable', 'title' => 'Shortcode', 'const' => 'GM_DISABLE_BLOCK_shortcode'),
        array('slug' => 'core/latest-posts', 'opt' => 'gm-block-latest-posts-disable', 'title' => 'Latest Posts', 'const' => 'GM_DISABLE_BLOCK_latest_posts'),
        array('slug' => 'core/latest-comments', 'opt' => 'gm-block-latest-comments-disable', 'title' => 'Latest Comments', 'const' => 'GM_DISABLE_BLOCK_latest_comments'),
        array('slug' => 'core/categories', 'opt' => 'gm-block-categories-disable', 'title' => 'Categories', 'const' => 'GM_DISABLE_BLOCK_categories'),
        array('slug' => 'core/archives', 'opt' => 'gm-block-archives-disable', 'title' => 'Archives', 'const' => 'GM_DISABLE_BLOCK_archives'),

        array('slug' => 'core/embed', 'opt' => 'gm-block-embed-disable', 'title' => 'Embed', 'const' => 'GM_DISABLE_BLOCK_embed'),
        array('slug' => 'core-embed/twitter', 'opt' => 'gm-block-twitter-disable', 'title' => 'Twitter', 'const' => 'GM_DISABLE_BLOCK_twitter'),
        array('slug' => 'core-embed/youtube', 'opt' => 'gm-block-youtube-disable', 'title' => 'YouTube', 'const' => 'GM_DISABLE_BLOCK_youtube'),
        array('slug' => 'core-embed/facebook', 'opt' => 'gm-block-facebook-disable', 'title' => 'Facebook', 'const' => 'GM_DISABLE_BLOCK_facebook'),
        array('slug' => 'core-embed/instagram', 'opt' => 'gm-block-instagram-disable', 'title' => 'Instagram', 'const' => 'GM_DISABLE_BLOCK_instagram'),
        array('slug' => 'core-embed/wordpress', 'opt' => 'gm-block-wordpress-disable', 'title' => 'WordPress', 'const' => 'GM_DISABLE_BLOCK_wordpress'),
        array('slug' => 'core-embed/soundcloud', 'opt' => 'gm-block-soundcloud-disable', 'title' => 'SoundCloud', 'const' => 'GM_DISABLE_BLOCK_soundcloud'),
        array('slug' => 'core-embed/spotify', 'opt' => 'gm-block-spotify-disable', 'title' => 'Spotify', 'const' => 'GM_DISABLE_BLOCK_spotify'),
        array('slug' => 'core-embed/flickr', 'opt' => 'gm-block-flickr-disable', 'title' => 'Flickr', 'const' => 'GM_DISABLE_BLOCK_flickr'),
        array('slug' => 'core-embed/vimeo', 'opt' => 'gm-block-vimeo-disable', 'title' => 'Vimeo', 'const' => 'GM_DISABLE_BLOCK_vimeo'),
        array('slug' => 'core-embed/animoto', 'opt' => 'gm-block-animoto-disable', 'title' => 'Animoto', 'const' => 'GM_DISABLE_BLOCK_animoto'),
        array('slug' => 'core-embed/cloudup', 'opt' => 'gm-block-cloudup-disable', 'title' => 'Cloudup', 'const' => 'GM_DISABLE_BLOCK_cloudup'),
        array('slug' => 'core-embed/collegehumor', 'opt' => 'gm-block-collegehumor-disable', 'title' => 'CollegeHumor', 'const' => 'GM_DISABLE_BLOCK_collegehumor'),
        array('slug' => 'core-embed/dailymotion', 'opt' => 'gm-block-dailymotion-disable', 'title' => 'Dailymotion', 'const' => 'GM_DISABLE_BLOCK_dailymotion'),
        array('slug' => 'core-embed/funnyordie', 'opt' => 'gm-block-funnyordie-disable', 'title' => 'Funny or Die', 'const' => 'GM_DISABLE_BLOCK_funny_or_die'),
        array('slug' => 'core-embed/hulu', 'opt' => 'gm-block-hulu-disable', 'title' => 'Hulu', 'const' => 'GM_DISABLE_BLOCK_hulu'),
        array('slug' => 'core-embed/imgur', 'opt' => 'gm-block-imgur-disable', 'title' => 'Imgur', 'const' => 'GM_DISABLE_BLOCK_imgur'),
        array('slug' => 'core-embed/issuu', 'opt' => 'gm-block-issuu-disable', 'title' => 'Issuu', 'const' => 'GM_DISABLE_BLOCK_issuu'),
        array('slug' => 'core-embed/kickstarter', 'opt' => 'gm-block-kickstarter-disable', 'title' => 'Kickstarter', 'const' => 'GM_DISABLE_BLOCK_kickstarter'),
        array('slug' => 'core-embed/meetup-com', 'opt' => 'gm-block-meetup-com-disable', 'title' => 'Meetup.com', 'const' => 'GM_DISABLE_BLOCK_meetup'),
        array('slug' => 'core-embed/mixcloud', 'opt' => 'gm-block-mixcloud-disable', 'title' => 'Mixcloud', 'const' => 'GM_DISABLE_BLOCK_mixcloud'),
        array('slug' => 'core-embed/photobucket', 'opt' => 'gm-block-photobucket-disable', 'title' => 'Photobucket', 'const' => 'GM_DISABLE_BLOCK_photobucket'),
        array('slug' => 'core-embed/polldaddy', 'opt' => 'gm-block-polldaddy-disable', 'title' => 'Polldaddy', 'const' => 'GM_DISABLE_BLOCK_polldaddy'),
        array('slug' => 'core-embed/reddit', 'opt' => 'gm-block-reddit-disable', 'title' => 'Reddit', 'const' => 'GM_DISABLE_BLOCK_reddit'),
        array('slug' => 'core-embed/reverbnation', 'opt' => 'gm-block-reverbnation-disable', 'title' => 'ReverbNation', 'const' => 'GM_DISABLE_BLOCK_reverbnation'),
        array('slug' => 'core-embed/screencast', 'opt' => 'gm-block-screencast-disable', 'title' => 'Screencast', 'const' => 'GM_DISABLE_BLOCK_screencast'),
        array('slug' => 'core-embed/scribd', 'opt' => 'gm-block-scribd-disable', 'title' => 'Scribd', 'const' => 'GM_DISABLE_BLOCK_scribd'),
        array('slug' => 'core-embed/slideshare', 'opt' => 'gm-block-slideshare-disable', 'title' => 'Slideshare', 'const' => 'GM_DISABLE_BLOCK_slideshare'),
        array('slug' => 'core-embed/smugmug', 'opt' => 'gm-block-smugmug-disable', 'title' => 'SmugMug', 'const' => 'GM_DISABLE_BLOCK_smugmug'),
        array('slug' => 'core-embed/speaker-deck', 'opt' => 'gm-block-speaker-deck-disable', 'title' => 'Speaker Deck', 'const' => 'GM_DISABLE_BLOCK_speaker_deck'),
        array('slug' => 'core-embed/ted', 'opt' => 'gm-block-ted-disable', 'title' => 'TED', 'const' => 'GM_DISABLE_BLOCK_ted'),
        array('slug' => 'core-embed/tumblr', 'opt' => 'gm-block-tumblr-disable', 'title' => 'Tumblr', 'const' => 'GM_DISABLE_BLOCK_tumblr'),
        array('slug' => 'core-embed/videopress', 'opt' => 'gm-block-videopress-disable', 'title' => 'VideoPress', 'const' => 'GM_DISABLE_BLOCK_videopress'),
        array('slug' => 'core-embed/wordpress-tv', 'opt' => 'gm-block-wordpress-tv-disable', 'title' => 'WordPress.tv', 'const' => 'GM_DISABLE_BLOCK_wordpress_tv'),

    );

    $options_blocks = array();
    $allowed_blocks = array();

    // Allowed Blocks from Options
    foreach ( $default_blocks as $block ) {

        if (get_option($block['opt']) != 1) {

            $options_blocks[] = $block['slug'];

        }

    }

    // Remove Blocks from API
    foreach ( $default_blocks as $block ) {

        if (defined($block['const']) && constant($block['const']) === true) {

            if (($key = array_search($block['slug'], $options_blocks)) !== false) {
                unset($options_blocks[$key]);
            }

        }

    }

    // Generate the Allowed Blocks Array
    foreach ( $options_blocks as $block ){

        $allowed_blocks[] = $block;

    }

    return $allowed_blocks;

}