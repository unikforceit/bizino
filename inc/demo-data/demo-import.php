<?php
// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
    exit();
}
/**
 * @Packge    : bizino
 * @version   : 1.0
 * @Author    : Vecurosoft
 * @Author URI: https://www.vecurosoft.com/
 */

// demo import file
function bizino_import_files()
{

    return array(
        array(
            'import_file_name' => esc_html__('Bizino Demo', 'bizino'),
            'local_import_file' => BIZINO_DEMO_DIR_PATH . 'demo.xml',
            'local_import_widget_file' => BIZINO_DEMO_DIR_PATH . 'widgets.json',
            'local_import_redux' => array(
                array(
                    'file_path' => BIZINO_DEMO_DIR_PATH . 'options.json',
                    'option_name' => 'bizino_opt',
                ),
            ),
        ),
    );
}

add_filter('pt-ocdi/import_files', 'bizino_import_files');

// demo import setup
function bizino_after_import_setup()
{
    // Assign menus to their locations.
    $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');
    $mobile_menu = get_term_by('name', 'Mobile Menu', 'nav_menu');
    $footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');

    set_theme_mod('nav_menu_locations', array(
            'primary-menu' => $main_menu->term_id,
            'mobile-menu' => $mobile_menu->term_id,
            'footer-menu' => $footer_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title('Home 01');
    $blog_page_id = get_page_by_title('Blog');

    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id->ID);
    update_option('page_for_posts', $blog_page_id->ID);

    if (class_exists('LS_Sliders')) {
        include LS_ROOT_PATH . '/classes/class.ls.importutil.php';
        new LS_ImportUtil(BIZINO_DEMO_DIR_PATH . 'slider/Bizino-Slider-1.zip');
        new LS_ImportUtil(BIZINO_DEMO_DIR_PATH . 'slider/Bizino-Slider-2.zip');
        new LS_ImportUtil(BIZINO_DEMO_DIR_PATH . 'slider/Bizino-Slider-4.zip');
    }

}

add_action('pt-ocdi/after_import', 'bizino_after_import_setup');


//disable the branding notice after successful demo import
add_filter('pt-ocdi/disable_pt_branding', '__return_true');

//change the location, title and other parameters of the plugin page
function bizino_import_plugin_page_setup($default_settings)
{
    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title'] = esc_html__('Bizino Demo Import', 'bizino');
    $default_settings['menu_title'] = esc_html__('Import Demo Data', 'bizino');
    $default_settings['capability'] = 'import';
    $default_settings['menu_slug'] = 'bizino-demo-import';

    return $default_settings;
}

add_filter('pt-ocdi/plugin_page_setup', 'bizino_import_plugin_page_setup');

// Enqueue scripts
function bizino_demo_import_custom_scripts()
{
    if (isset($_GET['page']) && $_GET['page'] == 'bizino-demo-import') {
        // style
        wp_enqueue_style('bizino-demo-import', BIZINO_DEMO_DIR_URI . 'css/bizino.demo.import.css', array(), '1.0', false);
    }
}

add_action('admin_enqueue_scripts', 'bizino_demo_import_custom_scripts');