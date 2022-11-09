<?php

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Only return default value if we don't have a post ID (in the 'post' query variable)
 *
 * @param bool $default On/Off (true/false)
 * @return mixed          Returns true or '', the blank default
 */
function bizino_set_checkbox_default_for_new_post($default)
{
    return isset($_GET['post']) ? '' : ($default ? (string)$default : '');
}

add_action('cmb2_admin_init', 'bizino_register_metabox');

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */

function bizino_register_metabox()
{

    $prefix = '_bizino_';

    $prefixpage = '_bizinopage_';


    $bizino_post_meta = new_cmb2_box(array(
        'id' => $prefixpage . 'blog_post_control',
        'title' => esc_html__('Post Thumb Controller', 'bizino'),
        'object_types' => array('post'), // Post type
        'closed' => true
    ));
    $bizino_post_meta->add_field(array(
        'name' => esc_html__('Post Format Video', 'bizino'),
        'desc' => esc_html__('Use This Field When Post Format Video', 'bizino'),
        'id' => $prefix . 'post_format_video',
        'type' => 'text_url',
    ));
    $bizino_post_meta->add_field(array(
        'name' => esc_html__('Post Format Audio', 'bizino'),
        'desc' => esc_html__('Use This Field When Post Format Audio', 'bizino'),
        'id' => $prefix . 'post_format_audio',
        'type' => 'oembed',
    ));
    $bizino_post_meta->add_field(array(
        'name' => esc_html__('Post Thumbnail For Slider', 'bizino'),
        'desc' => esc_html__('Use This Field When You Want A Slider In Post Thumbnail', 'bizino'),
        'id' => $prefix . 'post_format_slider',
        'type' => 'file_list',
    ));

    $bizino_page_meta = new_cmb2_box(array(
        'id' => $prefixpage . 'page_meta_section',
        'title' => esc_html__('Page Meta', 'bizino'),
        'object_types' => array('page'), // Post type
        'closed' => true
    ));

    $bizino_page_meta->add_field(array(
        'name' => esc_html__('Page Breadcrumb Area', 'bizino'),
        'desc' => esc_html__('check to display page breadcrumb area.', 'bizino'),
        'id' => $prefix . 'page_breadcrumb_area',
        'type' => 'select',
        'default' => '1',
        'options' => array(
            '1' => esc_html__('Show', 'bizino'),
            '2' => esc_html__('Hide', 'bizino'),
        )
    ));


    $bizino_page_meta->add_field(array(
        'name' => esc_html__('Page Breadcrumb Settings', 'bizino'),
        'id' => $prefix . 'page_breadcrumb_settings',
        'type' => 'select',
        'default' => 'global',
        'options' => array(
            'global' => esc_html__('Global Settings', 'bizino'),
            'page' => esc_html__('Page Settings', 'bizino'),
        )
    ));

    $bizino_page_meta->add_field(array(
        'name' => esc_html__('Page Title', 'bizino'),
        'desc' => esc_html__('check to display Page Title.', 'bizino'),
        'id' => $prefix . 'page_title',
        'type' => 'select',
        'default' => '1',
        'options' => array(
            '1' => esc_html__('Show', 'bizino'),
            '2' => esc_html__('Hide', 'bizino'),
        )
    ));

    $bizino_page_meta->add_field(array(
        'name' => esc_html__('Page Title Settings', 'bizino'),
        'id' => $prefix . 'page_title_settings',
        'type' => 'select',
        'options' => array(
            'default' => esc_html__('Default Title', 'bizino'),
            'custom' => esc_html__('Custom Title', 'bizino'),
        ),
        'default' => 'default'
    ));

    $bizino_page_meta->add_field(array(
        'name' => esc_html__('Custom Page Title', 'bizino'),
        'id' => $prefix . 'custom_page_title',
        'type' => 'text'
    ));

    $bizino_page_meta->add_field(array(
        'name' => esc_html__('Breadcrumb', 'bizino'),
        'desc' => esc_html__('Select Show to display breadcrumb area', 'bizino'),
        'id' => $prefix . 'page_breadcrumb_trigger',
        'type' => 'switch_btn',
        'default' => bizino_set_checkbox_default_for_new_post(true),
    ));

    $bizino_layout_meta = new_cmb2_box(array(
        'id' => $prefixpage . 'page_layout_section',
        'title' => esc_html__('Page Layout', 'bizino'),
        'context' => 'side',
        'priority' => 'high',
        'object_types' => array('page'), // Post type
        'closed' => true
    ));

    $bizino_layout_meta->add_field(array(
        'desc' => esc_html__('Set page layout container,container fluid,fullwidth or both. It\'s work only in template builder page.', 'bizino'),
        'id' => $prefix . 'custom_page_layout',
        'type' => 'radio',
        'options' => array(
            '1' => esc_html__('Container', 'bizino'),
            '2' => esc_html__('Container Fluid', 'bizino'),
            '3' => esc_html__('Fullwidth', 'bizino'),
        ),
    ));

}

add_action('cmb2_admin_init', 'bizino_register_taxonomy_metabox');
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function bizino_register_taxonomy_metabox()
{

    $prefix = '_bizino_';
    /**
     * Metabox to add fields to categories and tags
     */
    $bizino_term_meta = new_cmb2_box(array(
        'id' => $prefix . 'term_edit',
        'title' => esc_html__('Category Metabox', 'bizino'),
        'object_types' => array('term'),
        'taxonomies' => array('category'),
    ));
    $bizino_term_meta->add_field(array(
        'name' => esc_html__('Extra Info', 'bizino'),
        'id' => $prefix . 'term_extra_info',
        'type' => 'title',
        'on_front' => false,
    ));
    $bizino_term_meta->add_field(array(
        'name' => esc_html__('Category Image', 'bizino'),
        'desc' => esc_html__('Set Category Image', 'bizino'),
        'id' => $prefix . 'term_avatar',
        'type' => 'file',
        'text' => array(
            'add_upload_file_text' => esc_html__('Add Image', 'bizino') // Change upload button text. Default: "Add or Upload File"
        ),
    ));


    /**
     * Metabox for the user profile screen
     */
    $bizino_user = new_cmb2_box(array(
        'id' => $prefix . 'user_edit',
        'title' => esc_html__('User Profile Metabox', 'bizino'), // Doesn't output for user boxes
        'object_types' => array('user'), // Tells CMB2 to use user_meta vs post_meta
        'show_names' => true,
        'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
    ));
    $bizino_user->add_field(array(
        'name' => esc_html__('Social Profile', 'bizino'),
        'id' => $prefix . 'user_extra_info',
        'type' => 'title',
        'on_front' => false,
    ));

    $group_field_id = $bizino_user->add_field(array(
        'id' => $prefix . 'social_profile_group',
        'type' => 'group',
        'description' => __('Social Profile', 'bizino'),
        'options' => array(
            'group_title' => __('Social Profile {#}', 'bizino'), // since version 1.1.4, {#} gets replaced by row number
            'add_button' => __('Add Another Social Profile', 'bizino'),
            'remove_button' => __('Remove Social Profile', 'bizino'),
            'closed' => true
        ),
    ));

    $bizino_user->add_group_field($group_field_id, array(
        'name' => __('Icon Class', 'bizino'),
        'id' => $prefix . 'social_profile_icon',
        'type' => 'text', // This field type
    ));

    $bizino_user->add_group_field($group_field_id, array(
        'desc' => esc_html__('Set social profile link.', 'bizino'),
        'id' => $prefix . 'lawyer_social_profile_link',
        'name' => esc_html__('Social Profile link', 'bizino'),
        'type' => 'text'
    ));
}