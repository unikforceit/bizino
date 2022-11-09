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

if (class_exists('ReduxFramework') && defined('ELEMENTOR_VERSION')) {
    if (is_page() || is_page_template('template-builder.php')) {
        $bizino_post_id = get_the_ID();

        // Get the page settings manager
        $bizino_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers('page');

        // Get the settings model for current post
        $bizino_page_settings_model = $bizino_page_settings_manager->get_model($bizino_post_id);

        // Retrieve the color we added before
        $bizino_header_style = $bizino_page_settings_model->get_settings('bizino_header_style');
        $bizino_header_builder_option = $bizino_page_settings_model->get_settings('bizino_header_builder_option');

        if ($bizino_header_style == 'header_builder') {

            if (!empty($bizino_header_builder_option)) {
                $bizinoheader = get_post($bizino_header_builder_option);
                echo '<header class="header">';
                echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($bizinoheader->ID);
                echo '</header>';
            }
        } else {
            // global options
            $bizino_header_builder_trigger = bizino_opt('bizino_header_options');
            if ($bizino_header_builder_trigger == '2') {
                echo '<header>';
                $bizino_global_header_select = get_post(bizino_opt('bizino_header_select_options'));
                $header_post = get_post($bizino_global_header_select);
                echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($header_post->ID);
                echo '</header>';
            } else {
                // wordpress Header
                bizino_global_header_option();
            }
        }
    } else {
        $bizino_header_options = bizino_opt('bizino_header_options');
        if ($bizino_header_options == '1') {
            bizino_global_header_option();
        } else {
            $bizino_header_select_options = bizino_opt('bizino_header_select_options');
            $bizinoheader = get_post($bizino_header_select_options);
            echo '<header class="header">';
            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($bizinoheader->ID);
            echo '</header>';
        }
    }
} else {
    bizino_global_header_option();
}