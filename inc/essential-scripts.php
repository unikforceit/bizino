<?php
/**
 * @Packge     : Bizino
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

// Block direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue scripts and styles.
 */
function bizino_essential_scripts()
{

    wp_enqueue_style('bizino-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

    // google font
    wp_enqueue_style('bizino-fonts', bizino_google_fonts(), array(), null);

    // Bootstrap Min
    wp_enqueue_style('bootstrap', get_theme_file_uri('/assets/css/bootstrap.min.css'), array(), '4.3.1');

    // Font Awesome Five
    wp_enqueue_style('fontawesome', get_theme_file_uri('/assets/css/fontawesome.min.css'), array(), '5.9.0');

    // Magnific Popup
    wp_enqueue_style('magnific-popup', get_theme_file_uri('/assets/css/magnific-popup.min.css'), array(), '1.0');

    // Slick css
    wp_enqueue_style('slick', get_theme_file_uri('/assets/css/slick.min.css'), array(), '4.0.13');

    // bizino app style
    wp_enqueue_style('bizino-main-style', get_theme_file_uri('/assets/css/style.css'), array(), wp_get_theme()->get('Version'));


    // Load Js

    // Bootstrap
    wp_enqueue_script('bootstrap', get_theme_file_uri('/assets/js/bootstrap.min.js'), array('jquery'), '4.3.1', true);

    // Slick
    wp_enqueue_script('slick', get_theme_file_uri('/assets/js/slick.min.js'), array('jquery'), '1.0.0', true);

    // Isotope
    wp_enqueue_script('isototpe-pkgd', get_theme_file_uri('/assets/js/isotope.pkgd.min.js'), array('jquery'), '1.0.0', true);

    // Images Loaded
    wp_enqueue_script('imagesloaded');

    // magnific popup
    wp_enqueue_script('bizino-jquery-magnific-popup', get_theme_file_uri('/assets/js/jquery.magnific-popup.min.js'), array('jquery'), '1.0.0', true);

    // main script
    wp_enqueue_script('bizino-main-script', get_theme_file_uri('/assets/js/main.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    // comment reply
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'bizino_essential_scripts', 99);


function bizino_block_editor_assets()
{
    // Add custom fonts.
    wp_enqueue_style('bizino-editor-fonts', bizino_google_fonts(), array(), null);
}

add_action('enqueue_block_editor_assets', 'bizino_block_editor_assets');


/*
Register Fonts
*/
function bizino_google_fonts()
{
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ('off' !== _x('on', 'Google font: on or off', 'bizino')) {
        $font_url = 'https://fonts.googleapis.com/css2?family=Sora:wght@100;300;400;500;600;700&display=swap';
    }
    return $font_url;
}