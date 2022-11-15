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
    exit();
}

if (class_exists('ReduxFramework')) {
    $bizino404title = bizino_opt('bizino_fof_title');
    $bizino404subtitle = bizino_opt('bizino_fof_subtitle');
    $bizino404desc = bizino_opt('bizino_fof_description');
    $bizino404btntext = bizino_opt('bizino_fof_btn_text');
    $bizino_404_image = bizino_opt('bizino_404_image', 'url');
} else {
    $bizino404title = __('404', 'bizino');
    $bizino404subtitle = __('Oops, Page Not Found', 'bizino');
    $bizino404desc = __('We Can\'t Seem to find the page you\'re looking for.', 'bizino');
    $bizino404btntext = __('Go Back Home', 'bizino');
    $bizino_404_image = get_template_directory_uri() . '/assets/img/error-bg.jpg';
}

// get header
get_header();
echo ' <section data-bg-src="' . esc_url($bizino_404_image) . '" class="overflow-hidden error-wrapper">
            <div class="error-content">
                <div class="error-shape1"></div>
                <h1 class="error-number">' . esc_html($bizino404title) . '</h1>
                <h2 class="error-title">' . esc_html($bizino404subtitle) . '</h2>
                <p class="error-text">' . esc_html($bizino404desc) . '</p>
                <form action="' . esc_url(home_url('/')) . '" class="search-inline">
                    <input name="s" type="text" class="form-control" placeholder="' . esc_attr__('Enter Your Keyword....', 'bizino') . '">
                    <button><i class="far fa-search"></i></button>
                </form>
                <a href="' . esc_url(home_url('/')) . '" class="vs-btn">' . esc_html($bizino404btntext) . '</a>
            </div>
        </section>';
//footer
get_footer();