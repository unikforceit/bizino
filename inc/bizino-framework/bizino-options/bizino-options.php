<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if (!class_exists('Redux')) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "bizino_opt";

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('redux_demo/opt_name', $opt_name);

/*
 *
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 *
 */

$sampleHTML = '';
if (file_exists(dirname(__FILE__) . '/info-html.html')) {
    Redux_Functions::initWpFilesystem();

    global $wp_filesystem;

    $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
}


$alowhtml = array(
    'p' => array(
        'class' => array()
    ),
    'span' => array()
);


// Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns = array();

if (is_dir($sample_patterns_path)) {

    if ($sample_patterns_dir = opendir($sample_patterns_path)) {
        $sample_patterns = array();

        while (($sample_patterns_file = readdir($sample_patterns_dir)) !== false) {

            if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                $name = explode('.', $sample_patterns_file);
                $name = str_replace('.' . end($name), '', $sample_patterns_file);
                $sample_patterns[] = array(
                    'alt' => $name,
                    'img' => $sample_patterns_url . $sample_patterns_file
                );
            }
        }
    }
}

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => esc_html__('Bizino Options', 'bizino'),
    'page_title' => esc_html__('Bizino Options', 'bizino'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key' => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar' => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Show the time the page took to load, etc
    'update_notice' => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => '',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints' => array(
        'icon' => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color' => 'lightgray',
        'icon_size' => 'normal',
        'tip_style' => array(
            'color' => 'red',
            'shadow' => true,
            'rounded' => false,
            'style' => '',
        ),
        'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect' => array(
            'show' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'mouseover',
            ),
            'hide' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'click mouseleave',
            ),
        ),
    )
);


Redux::setArgs($opt_name, $args);

/*
 * ---> END ARGUMENTS
 */


/*
 * ---> START HELP TABS
 */

$tabs = array(
    array(
        'id' => 'redux-help-tab-1',
        'title' => esc_html__('Theme Information 1', 'bizino'),
        'content' => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'bizino')
    ),
    array(
        'id' => 'redux-help-tab-2',
        'title' => esc_html__('Theme Information 2', 'bizino'),
        'content' => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'bizino')
    )
);
Redux::set_help_tab($opt_name, $tabs);

// Set the help sidebar
$content = esc_html__('<p>This is the sidebar content, HTML is allowed.</p>', 'bizino');
Redux::set_help_sidebar($opt_name, $content);


/*
 * <--- END HELP TABS
 */


/*
 *
 * ---> START SECTIONS
 *
 */


// -> START General Fields

Redux::setSection($opt_name, array(
    'title' => esc_html__('General', 'bizino'),
    'id' => 'bizino_general',
    'customizer_width' => '450px',
    'icon' => 'el el-cog',
    'fields' => array(
        array(
            'id' => 'bizino_theme_color',
            'type' => 'color',
            'title' => esc_html__('Theme Color', 'bizino'),
            'subtitle' => esc_html__('Set Theme Color', 'bizino')
        ),
        array(
            'id' => 'bizino_map_apikey',
            'type' => 'text',
            'title' => esc_html__('Map Api Key', 'bizino'),
            'subtitle' => esc_html__('Set Map Api Key', 'bizino'),
        ),
    )

));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Back To Top', 'bizino'),
    'id' => 'bizino_backtotop',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'bizino_display_bcktotop',
            'type' => 'switch',
            'title' => esc_html__('Back To Top Button', 'bizino'),
            'subtitle' => esc_html__('Switch On to Display back to top button.', 'bizino'),
            'default' => true,
            'on' => esc_html__('Enabled', 'bizino'),
            'off' => esc_html__('Disabled', 'bizino'),
        ),
        array(
            'id' => 'bizino_custom_bcktotop',
            'type' => 'switch',
            'title' => esc_html__('Custom Back To Top Button', 'bizino'),
            'subtitle' => esc_html__('If you select "Disabled", it will show default design for "back to top" button.', 'bizino'),
            'default' => false,
            'on' => esc_html__('Enabled', 'bizino'),
            'off' => esc_html__('Disabled', 'bizino'),
            'required' => array('bizino_display_bcktotop', 'equals', '1'),
        ),
        array(
            'id' => 'bizino_custom_bcktotop_icon',
            'type' => 'text',
            'title' => esc_html__('Custom Back To Top Button Icon', 'bizino'),
            'subtitle' => esc_html__('Write Icon Class Here', 'bizino'),
            'required' => array('bizino_custom_bcktotop', 'equals', '1'),
        ),
        array(
            'id' => 'bizino_bcktotop_bg_color',
            'type' => 'color',
            'title' => esc_html__('Back To Top Button Background Color', 'bizino'),
            'subtitle' => esc_html__('Set Back to top button Background Color.', 'bizino'),
            'required' => array('bizino_display_bcktotop', 'equals', '1'),
            'output' => array('background-color' => '.scrollToTop'),
        ),
        array(
            'id' => 'bizino_bcktotop_color',
            'type' => 'color',
            'title' => esc_html__('Back To Top Icon Color', 'bizino'),
            'subtitle' => esc_html__('Set Back to top Icon Color.', 'bizino'),
            'required' => array('bizino_display_bcktotop', 'equals', '1'),
            'output' => array('.scrollToTop i'),
        ),
        array(
            'id' => 'bizino_bcktotop_border_color',
            'type' => 'color',
            'title' => esc_html__('Back To Top Button Border Color', 'bizino'),
            'subtitle' => esc_html__('Set Back to top button border Color.', 'bizino'),
            'required' => array('bizino_display_bcktotop', 'equals', '1'),
            'output' => array('border-color' => '.border-before-theme:before'),
        )
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Preloader', 'bizino'),
    'id' => 'bizino_preloader',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'bizino_display_preloader',
            'type' => 'switch',
            'title' => esc_html__('Preloader', 'bizino'),
            'subtitle' => esc_html__('Switch Enabled to Display Preloader.', 'bizino'),
            'default' => true,
            'on' => esc_html__('Enabled', 'bizino'),
            'off' => esc_html__('Disabled', 'bizino'),
        ),

        array(
            'id' => 'bizino_preloader_img',
            'type' => 'media',
            'title' => esc_html__('Preloader Image', 'bizino'),
            'subtitle' => esc_html__('Set Preloader Image.', 'bizino'),
            'required' => array("bizino_display_preloader", "equals", true)
        ),
    )
));

/* End General Fields */

/* Admin Lebel Fields */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Admin Label', 'bizino'),
    'id' => 'bizino_admin_label',
    'customizer_width' => '450px',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Admin Login Logo', 'bizino'),
            'subtitle' => esc_html__('It belongs to the back-end of your website to log-in to admin panel.', 'bizino'),
            'id' => 'bizino_admin_login_logo',
            'type' => 'media',
        ),
        array(
            'title' => esc_html__('Custom CSS For admin', 'bizino'),
            'subtitle' => esc_html__('Any CSS your write here will run in admin.', 'bizino'),
            'id' => 'bizino_theme_admin_custom_css',
            'type' => 'ace_editor',
            'mode' => 'css',
            'theme' => 'chrome',
            'full_width' => true,
        ),
    ),
));

// -> START Basic Fields
Redux::setSection($opt_name, array(
    'title' => esc_html__('Header', 'bizino'),
    'id' => 'bizino_header',
    'customizer_width' => '400px',
    'icon' => 'el el-credit-card',
    'fields' => array(
        array(
            'id' => 'bizino_header_options',
            'type' => 'button_set',
            'default' => '1',
            'options' => array(
                "1" => esc_html__('Prebuilt', 'bizino'),
                "2" => esc_html__('Header Builder', 'bizino'),
            ),
            'title' => esc_html__('Header Options', 'bizino'),
            'subtitle' => esc_html__('Select header options.', 'bizino'),
        ),
        array(
            'id' => 'bizino_header_select_options',
            'type' => 'select',
            'data' => 'posts',
            'args' => array(
                'post_type' => 'bizino_header_build'
            ),
            'title' => esc_html__('Header', 'bizino'),
            'subtitle' => esc_html__('Select header.', 'bizino'),
            'required' => array('bizino_header_options', 'equals', '2')
        ),
        array(
            'id' => 'bizino_header_topbar_switcher',
            'type' => 'switch',
            'default' => '0',
            'on' => esc_html__('Show', 'bizino'),
            'off' => esc_html__('Hide', 'bizino'),
            'title' => esc_html__('Header Topbar?', 'bizino'),
            'subtitle' => esc_html__('Control Header Topbar By Show Or Hide System.', 'bizino'),
            'required' => array('bizino_header_options', 'equals', '1')
        ),
        array(
            'id' => 'bizino_topbar_address',
            'type' => 'text',
            'validate' => 'html',
            'title' => esc_html__('Office Location', 'bizino'),
            'subtitle' => esc_html__('Google Map url', 'bizino'),
            'required' => array('bizino_header_topbar_switcher', 'equals', '1')
        ),
        array(
            'id' => 'bizino_topbar_phone',
            'type' => 'text',
            'validate' => 'html',
            'title' => esc_html__('Contact Number', 'bizino'),
            'required' => array('bizino_header_topbar_switcher', 'equals', '1')
        ),
        array(
            'id' => 'bizino_topbar_email',
            'type' => 'text',
            'validate' => 'html',
            'title' => esc_html__('Email Address', 'bizino'),
            'required' => array('bizino_header_topbar_switcher', 'equals', '1')
        ),
        array(
            'id' => 'bizino_btn_text',
            'type' => 'text',
            'validate' => 'html',
            'title' => esc_html__('Button Text', 'bizino'),
            'subtitle' => esc_html__('Set Button Text', 'bizino'),
        ),
        array(
            'id' => 'bizino_btn_url',
            'type' => 'text',
            'title' => esc_html__('Button URL?', 'bizino'),
            'subtitle' => esc_html__('Set Button URL Here', 'bizino'),
        ),
    ),
));
// -> START Header Logo
Redux::setSection($opt_name, array(
    'title' => esc_html__('Header Logo', 'bizino'),
    'id' => 'bizino_header_logo_option',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'bizino_mobile_logo',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Mobile Logo', 'bizino'),
            'compiler' => 'true',
            'subtitle' => esc_html__('Upload your logo for mobile ( recommendation png format ).', 'bizino'),
        ),
        array(
            'id' => 'bizino_site_logo',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Logo', 'bizino'),
            'compiler' => 'true',
            'subtitle' => esc_html__('Upload your site logo for header ( recommendation png format ).', 'bizino'),
        ),
        array(
            'id' => 'bizino_site_logo_dimensions',
            'type' => 'dimensions',
            'units' => array('px'),
            'title' => esc_html__('Logo Dimensions (Width/Height).', 'bizino'),
            'output' => array('.header-logo .logo img'),
            'subtitle' => esc_html__('Set logo dimensions to choose width, height, and unit.', 'bizino'),
        ),
        array(
            'id' => 'bizino_site_logomargin_dimensions',
            'type' => 'spacing',
            'mode' => 'margin',
            'output' => array('.header-logo .logo img'),
            'units_extended' => 'false',
            'units' => array('px'),
            'title' => esc_html__('Logo Top and Bottom Margin.', 'bizino'),
            'left' => false,
            'right' => false,
            'subtitle' => esc_html__('Set logo top and bottom margin.', 'bizino'),
            'default' => array(
                'units' => 'px'
            )
        ),
        array(
            'id' => 'bizino_text_title',
            'type' => 'text',
            'validate' => 'html',
            'title' => esc_html__('Text Logo', 'bizino'),
            'subtitle' => esc_html__('Write your logo text use as logo ( You can use span tag for text color ).', 'bizino'),
        )
    )
));
// -> End Header Logo

// -> START Header Menu
Redux::setSection($opt_name, array(
    'title' => esc_html__('Header Menu', 'bizino'),
    'id' => 'bizino_header_menu_option',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'bizino_header_menu_color',
            'type' => 'color',
            'title' => esc_html__('Menu Color', 'bizino'),
            'subtitle' => esc_html__('Set Menu Color', 'bizino'),
            'output' => array('color' => '.menu-style1 > ul > li > a'),
        ),
        array(
            'id' => 'bizino_header_menu_hover_color',
            'type' => 'color',
            'title' => esc_html__('Menu Hover Color', 'bizino'),
            'subtitle' => esc_html__('Set Menu Hover Color', 'bizino'),
            'output' => array('color' => '.menu-style1 > ul > li > a:hover'),
        ),
        array(
            'id' => 'bizino_header_submenu_color',
            'type' => 'color',
            'title' => esc_html__('Submenu Color', 'bizino'),
            'subtitle' => esc_html__('Set Submenu Color', 'bizino'),
            'output' => array('color' => '.main-menu ul li ul.sub-menu li a'),
        ),
        array(
            'id' => 'bizino_header_submenu_hover_color',
            'type' => 'color',
            'title' => esc_html__('Submenu Hover Color', 'bizino'),
            'subtitle' => esc_html__('Set Submenu Hover Color', 'bizino'),
            'output' => array('color' => '.main-menu ul li ul.sub-menu li a:hover'),
        ),
        array(
            'id' => 'bizino_header_submenu_icon_color',
            'type' => 'color',
            'title' => esc_html__('Submenu Icon Color', 'bizino'),
            'subtitle' => esc_html__('Set Submenu Icon Color', 'bizino'),
            'output' => array('color' => '.main-menu ul li ul.sub-menu li a:after'),
        ),
        array(
            'id' => 'bizino_header_submenu_border_top_color',
            'type' => 'color',
            'title' => esc_html__('Submenu Border Top Color', 'bizino'),
            'subtitle' => esc_html__('Set Submenu Border Top Color', 'bizino'),
            'output' => array('border-top-color' => '.main-menu ul.sub-menu'),
        ),
    )
));
// -> End Header Menu

// -> START Mobile Menu
Redux::setSection($opt_name, array(
    'title' => esc_html__('Offcanvas', 'bizino'),
    'id' => 'bizino_offcanvas_panel',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'bizino_offcanvas_panel_bg',
            'type' => 'background',
            'title' => esc_html__('Offcanvas Panel Background', 'bizino'),
            'output' => array('.sidemenu-wrapper .sidemenu-content'),
            'subtitle' => esc_html__('Set Offcanvas Panel Background Color', 'bizino'),
        ),
        array(
            'id' => 'bizino_offcanvas_title_color',
            'type' => 'color',
            'title' => esc_html__('Offcanvas Title Color', 'bizino'),
            'subtitle' => esc_html__('Set Offcanvas Title color.', 'bizino'),
            'output' => array('.sidemenu-content h3.sidebox-title')
        ),
    )
));
// -> End Mobile Menu

// -> START Blog Page
Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog', 'bizino'),
    'id' => 'bizino_blog_page',
    'icon' => 'el el-blogger',
    'fields' => array(

        array(
            'id' => 'bizino_blog_style',
            'type' => 'select',
            'options' => array(
                '1' => esc_html__('Style One', 'bizino'),
                '2' => esc_html__('Style Two', 'bizino'),
            ),
            'default' => '1',
            'title' => esc_html__('Blog Style', 'bizino'),
        ),

        array(
            'id' => 'bizino_blog_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Layout', 'bizino'),
            'subtitle' => esc_html__('Choose blog layout from here. If you use this option then you will able to change three type of blog layout ( Default Left Sidebar Layour ). ', 'bizino'),
            'options' => array(
                '1' => array(
                    'alt' => esc_attr__('1 Column', 'bizino'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/no-sideber.png')
                ),
                '2' => array(
                    'alt' => esc_attr__('2 Column Left', 'bizino'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/left-sideber.png')
                ),
                '3' => array(
                    'alt' => esc_attr__('3 Column Right', 'bizino'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/right-sideber.png')
                ),

            ),
            'default' => '3',
            'required' => array("bizino_blog_style", "equals", "1")
        ),
        array(
            'id' => 'bizino_blog_grid',
            'type' => 'image_select',
            'title' => esc_html__('Post Column', 'bizino'),
            'subtitle' => esc_html__('Select your blog post column from here. If you use this option then you will able to select three type of blog post layout ( Default Two Column ).', 'bizino'),
            //Must provide key => value(array:title|img) pairs for radio options
            'options' => array(
                '1' => array(
                    'alt' => esc_attr__('1 Column', 'bizino'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/1column.png')
                ),
                '2' => array(
                    'alt' => esc_attr__('2 Column Left', 'bizino'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/2column.png')
                ),
                '3' => array(
                    'alt' => esc_attr__('2 Column Right', 'bizino'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/3column.png')
                ),

            ),
            'default' => '1',
            'required' => array("bizino_blog_style", "equals", "1")
        ),
        array(
            'id' => 'bizino_blog_page_title_switcher',
            'type' => 'switch',
            'default' => 1,
            'on' => esc_html__('Show', 'bizino'),
            'off' => esc_html__('Hide', 'bizino'),
            'title' => esc_html__('Blog Page Title', 'bizino'),
            'subtitle' => esc_html__('Control blog page title show / hide. If you use this option then you will able to show / hide your blog page title ( Default Setting Show ).', 'bizino'),
        ),
        array(
            'id' => 'bizino_blog_page_title_setting',
            'type' => 'button_set',
            'title' => esc_html__('Blog Page Title Setting', 'bizino'),
            'subtitle' => esc_html__('Control blog page title setting. If you use this option then you can able to show default or custom blog page title ( Default Blog ).', 'bizino'),
            'options' => array(
                "predefine" => esc_html__('Default', 'bizino'),
                "custom" => esc_html__('Custom', 'bizino'),
            ),
            'default' => 'predefine',
            'required' => array("bizino_blog_page_title_switcher", "equals", "1")
        ),
        array(
            'id' => 'bizino_blog_page_custom_title',
            'type' => 'text',
            'title' => esc_html__('Blog Custom Title', 'bizino'),
            'subtitle' => esc_html__('Set blog page custom title form here. If you use this option then you will able to set your won title text.', 'bizino'),
            'required' => array('bizino_blog_page_title_setting', 'equals', 'custom')
        ),
        array(
            'id' => 'bizino_blog_postExcerpt',
            'type' => 'slider',
            'title' => esc_html__('Blog Posts Excerpt', 'bizino'),
            'subtitle' => esc_html__('Control the number of characters you want to show in the blog page for each post.. If you use this option then you can able to control your blog post characters from here ( Default show 10 ).', 'bizino'),
            "default" => 46,
            "min" => 0,
            "step" => 1,
            "max" => 100,
            'resolution' => 1,
            'display_value' => 'text',
        ),
        array(
            'id' => 'bizino_blog_title_color',
            'output' => array('.vs-blog .blog-title a'),
            'type' => 'color',
            'title' => esc_html__('Blog Title Color', 'bizino'),
            'subtitle' => esc_html__('Set Blog Title Color.', 'bizino'),
        ),
        array(
            'id' => 'bizino_blog_title_hover_color',
            'output' => array('.vs-blog .blog-title a:hover'),
            'type' => 'color',
            'title' => esc_html__('Blog Title Hover Color', 'bizino'),
            'subtitle' => esc_html__('Set Blog Title Hover Color.', 'bizino'),
        ),
        array(
            'id' => 'bizino_blog_contant_color',
            'output' => array('.blog-content p'),
            'type' => 'color',
            'title' => esc_html__('Blog Excerpt / Content Color', 'bizino'),
            'subtitle' => esc_html__('Set Blog Excerpt / Content Color.', 'bizino'),
        ),
        array(
            'id' => 'bizino_blog_pagination_color',
            'output' => array('.pagination li a,.pagination a i'),
            'type' => 'color',
            'title' => esc_html__('Blog Pagination Color', 'bizino'),
            'subtitle' => esc_html__('Set Blog Pagination Color.', 'bizino'),
        ),
        array(
            'id' => 'bizino_blog_pagination_active_color',
            'output' => array('.pagination li span.current'),
            'type' => 'color',
            'title' => esc_html__('Blog Pagination Active Color', 'bizino'),
            'subtitle' => esc_html__('Set Blog Pagination Active Color.', 'bizino'),
            'required' => array('bizino_blog_pagination', '=', '1')
        ),
        array(
            'id' => 'bizino_blog_pagination_hover_color',
            'output' => array('.pagination li a:hover,.pagination a i:hover'),
            'type' => 'color',
            'title' => esc_html__('Blog Pagination Hover Color', 'bizino'),
            'subtitle' => esc_html__('Set Blog Pagination Hover Color.', 'bizino'),
        ),
    ),
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Single Blog Page', 'bizino'),
    'id' => 'bizino_post_detail_styles',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'bizino_blog_single_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Layout', 'bizino'),
            'subtitle' => esc_html__('Choose blog single page layout from here. If you use this option then you will able to change three type of blog single page layout ( Default Left Sidebar Layour ). ', 'bizino'),
            'options' => array(
                '1' => array(
                    'alt' => esc_attr__('1 Column', 'bizino'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/no-sideber.png')
                ),
                '2' => array(
                    'alt' => esc_attr__('2 Column Left', 'bizino'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/left-sideber.png')
                ),
                '3' => array(
                    'alt' => esc_attr__('3 Column Right', 'bizino'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/right-sideber.png')
                ),

            ),
            'default' => '3'
        ),
        array(
            'id' => 'bizino_post_details_title_position',
            'type' => 'button_set',
            'default' => 'header',
            'options' => array(
                'header' => esc_html__('On Header', 'bizino'),
                'below' => esc_html__('Below Thumbnail', 'bizino'),
            ),
            'title' => esc_html__('Blog Post Title Position', 'bizino'),
            'subtitle' => esc_html__('Control blog post title position from here.', 'bizino'),
        ),
        array(
            'id' => 'bizino_post_details_custom_title',
            'type' => 'text',
            'title' => esc_html__('Blog Details Custom Title', 'bizino'),
            'subtitle' => esc_html__('This title will show in Breadcrumb title.', 'bizino'),
            'required' => array('bizino_post_details_title_position', 'equals', 'below')
        ),
        array(
            'id' => 'bizino_display_post_tags',
            'type' => 'switch',
            'title' => esc_html__('Tags', 'bizino'),
            'subtitle' => esc_html__('Switch On to Display Tags.', 'bizino'),
            'default' => true,
            'on' => esc_html__('Enabled', 'bizino'),
            'off' => esc_html__('Disabled', 'bizino'),
        ),
        array(
            'id' => 'bizino_post_details_share_options',
            'type' => 'switch',
            'title' => esc_html__('Share Options', 'bizino'),
            'subtitle' => esc_html__('Control post share options from here. If you use this option then you will able to show or hide post share options.', 'bizino'),
            'on' => esc_html__('Show', 'bizino'),
            'off' => esc_html__('Hide', 'bizino'),
            'default' => '0',
        ),
        array(
            'id' => 'bizino_post_details_author_desc_trigger',
            'type' => 'switch',
            'title' => esc_html__('Biography Info', 'bizino'),
            'subtitle' => esc_html__('Control biography info from here. If you use this option then you will able to show or hide biography info ( Default setting Show ).', 'bizino'),
            'on' => esc_html__('Show', 'bizino'),
            'off' => esc_html__('Hide', 'bizino'),
            'default' => '0',
        ),
        array(
            'id' => 'bizino_post_details_author_thumb',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Author Thumb', 'bizino'),
            'compiler' => 'true',
            'subtitle' => esc_html__('Upload your author logo ( recommendation png format ).', 'bizino'),
        ),
        array(
            'id' => 'bizino_post_details_post_navigation',
            'type' => 'switch',
            'title' => esc_html__('Post Navigation', 'bizino'),
            'subtitle' => esc_html__('Control post navigation from here. If you use this option then you will able to show or hide post navigation ( Default setting Show ).', 'bizino'),
            'on' => esc_html__('Show', 'bizino'),
            'off' => esc_html__('Hide', 'bizino'),
            'default' => true,
        ),
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Meta Data', 'bizino'),
    'id' => 'bizino_common_meta_data',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'bizino_blog_meta_icon_color',
            'output' => array('.blog-meta span i'),
            'type' => 'color',
            'title' => esc_html__('Blog Meta Icon Color', 'bizino'),
            'subtitle' => esc_html__('Set Blog Meta Icon Color.', 'bizino'),
        ),
        array(
            'id' => 'bizino_blog_meta_text_color',
            'output' => array('.blog-meta a,.blog-meta span'),
            'type' => 'color',
            'title' => esc_html__('Blog Meta Text Color', 'bizino'),
            'subtitle' => esc_html__('Set Blog Meta Text Color.', 'bizino'),
        ),
        array(
            'id' => 'bizino_blog_meta_text_hover_color',
            'output' => array('.blog-meta a:hover'),
            'type' => 'color',
            'title' => esc_html__('Blog Meta Hover Text Color', 'bizino'),
            'subtitle' => esc_html__('Set Blog Meta Hover Text Color.', 'bizino'),
        ),
        array(
            'id' => 'bizino_display_post_date',
            'type' => 'switch',
            'title' => esc_html__('Post Date', 'bizino'),
            'subtitle' => esc_html__('Switch On to Display Post Date.', 'bizino'),
            'default' => true,
            'on' => esc_html__('Enabled', 'bizino'),
            'off' => esc_html__('Disabled', 'bizino'),
        ),
        array(
            'id' => 'bizino_display_post_comment',
            'type' => 'switch',
            'title' => esc_html__('Comment Count', 'bizino'),
            'subtitle' => esc_html__('Switch On to Display Comment Count.', 'bizino'),
            'default' => true,
            'on' => esc_html__('Enabled', 'bizino'),
            'off' => esc_html__('Disabled', 'bizino'),
        ),
        array(
            'id' => 'bizino_display_post_category',
            'type' => 'switch',
            'title' => esc_html__('Category', 'bizino'),
            'subtitle' => esc_html__('Switch On to Display Category.', 'bizino'),
            'default' => true,
            'on' => esc_html__('Enabled', 'bizino'),
            'off' => esc_html__('Disabled', 'bizino'),
        ),
    )
));

/* End blog Page */

// -> START Page Option
Redux::setSection($opt_name, array(
    'title' => esc_html__('Page', 'bizino'),
    'id' => 'bizino_page_page',
    'icon' => 'el el-file',
    'fields' => array(
        array(
            'id' => 'bizino_page_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Select layout', 'bizino'),
            'subtitle' => esc_html__('Choose your page layout. If you use this option then you will able to choose three type of page layout ( Default no sidebar ). ', 'bizino'),
            //Must provide key => value(array:title|img) pairs for radio options
            'options' => array(
                '1' => array(
                    'alt' => esc_attr__('1 Column', 'bizino'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/no-sideber.png')
                ),
                '2' => array(
                    'alt' => esc_attr__('2 Column Left', 'bizino'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/left-sideber.png')
                ),
                '3' => array(
                    'alt' => esc_attr__('2 Column Right', 'bizino'),
                    'img' => esc_url(get_template_directory_uri() . '/assets/img/right-sideber.png')
                ),

            ),
            'default' => '1'
        ),
        array(
            'id' => 'bizino_page_layoutopt',
            'type' => 'button_set',
            'title' => esc_html__('Sidebar Settings', 'bizino'),
            'subtitle' => esc_html__('Set page sidebar. If you use this option then you will able to set three type of sidebar ( Default no sidebar ).', 'bizino'),
            //Must provide key => value pairs for options
            'options' => array(
                '1' => esc_html__('Page Sidebar', 'bizino'),
                '2' => esc_html__('Blog Sidebar', 'bizino')
            ),
            'default' => '1',
            'required' => array('bizino_page_sidebar', '!=', '1')
        ),
        array(
            'id' => 'bizino_page_title_switcher',
            'type' => 'switch',
            'title' => esc_html__('Title', 'bizino'),
            'subtitle' => esc_html__('Switch enabled to display page title. Fot this option you will able to show / hide page title.  Default setting Enabled', 'bizino'),
            'default' => '1',
            'on' => esc_html__('Enabled', 'bizino'),
            'off' => esc_html__('Disabled', 'bizino'),
        ),
        array(
            'id' => 'bizino_page_title_tag',
            'type' => 'select',
            'options' => array(
                'h1' => esc_html__('H1', 'bizino'),
                'h2' => esc_html__('H2', 'bizino'),
                'h3' => esc_html__('H3', 'bizino'),
                'h4' => esc_html__('H4', 'bizino'),
                'h5' => esc_html__('H5', 'bizino'),
                'h6' => esc_html__('H6', 'bizino'),
            ),
            'default' => 'h1',
            'title' => esc_html__('Title Tag', 'bizino'),
            'subtitle' => esc_html__('Select page title tag. If you use this option then you can able to change title tag H1 - H6 ( Default tag H1 )', 'bizino'),
            'required' => array("bizino_page_title_switcher", "equals", "1")
        ),
        array(
            'id' => 'bizino_allHeader_title_color',
            'type' => 'color',
            'title' => esc_html__('Title Color', 'bizino'),
            'subtitle' => esc_html__('Set Title Color', 'bizino'),
            'output' => array('color' => '.breadcumb-title'),
        ),
        array(
            'id' => 'bizino_allHeader_bg',
            'type' => 'media',
            'title' => esc_html__('Breadcrumb Image', 'bizino'),
            'subtitle' => esc_html__('Setting page header background. If you use this option then you will able to set Background Color, Background Image, Background Repeat, Background Size, Background Attachment, Background Position.', 'bizino'),
        ),
        array(
            'id' => 'bizino_enable_breadcrumb',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb Hide/Show', 'bizino'),
            'subtitle' => esc_html__('Hide / Show breadcrumb from all pages and posts ( Default settings hide ).', 'bizino'),
            'default' => '1',
            'on' => 'Show',
            'off' => 'Hide',
        ),
        array(
            'id' => 'bizino_allHeader_breadcrumbtextcolor',
            'type' => 'color',
            'title' => esc_html__('Breadcrumb Color', 'bizino'),
            'subtitle' => esc_html__('Choose page header breadcrumb text color here.If you user this option then you will able to set page breadcrumb color.', 'bizino'),
            'required' => array("bizino_page_title_switcher", "equals", "1"),
            'output' => array('color' => '.breadcumb-wrapper .breadcumb-content ul li a'),
        ),
        array(
            'id' => 'bizino_allHeader_breadcrumbtextactivecolor',
            'type' => 'color',
            'title' => esc_html__('Breadcrumb Active Color', 'bizino'),
            'subtitle' => esc_html__('Choose page header breadcrumb text active color here.If you user this option then you will able to set page breadcrumb active color.', 'bizino'),
            'required' => array("bizino_page_title_switcher", "equals", "1"),
            'output' => array('color' => '.breadcumb-wrapper .breadcumb-content ul li:last-child'),
        ),
        array(
            'id' => 'bizino_allHeader_dividercolor',
            'type' => 'color',
            'output' => array('color' => '.breadcumb-wrapper .breadcumb-content ul li:after'),
            'title' => esc_html__('Breadcrumb Divider Color', 'bizino'),
            'subtitle' => esc_html__('Choose breadcrumb divider color.', 'bizino'),
        ),
    ),
));
/* End Page option */

// -> START 404 Page

Redux::setSection($opt_name, array(
    'title' => esc_html__('404 Page', 'bizino'),
    'id' => 'bizino_404_page',
    'icon' => 'el el-ban-circle',
    'fields' => array(
        array(
            'id' => 'bizino_404_background',
            'type' => 'background',
            'title' => esc_html__('404 Background', 'bizino'),
            'subtitle' => esc_html__('Set 404 background.', 'bizino'),
            'output' => array('.vs-error-wrapper'),
        ),
        array(
            'id' => 'bizino_fof_title',
            'type' => 'text',
            'title' => esc_html__('Page Title', 'bizino'),
            'subtitle' => esc_html__('Set Page Title', 'bizino'),
            'default' => esc_html__('404', 'bizino'),
        ),
        array(
            'id' => 'bizino_fof_subtitle',
            'type' => 'text',
            'title' => esc_html__('Page Subtitle', 'bizino'),
            'subtitle' => esc_html__('Set Page Subtitle ', 'bizino'),
            'default' => esc_html__('Ooops, Page Not Found', 'bizino'),
        ),
        array(
            'id' => 'bizino_fof_description',
            'type' => 'text',
            'title' => esc_html__('Page Description', 'bizino'),
            'subtitle' => esc_html__('Set Page Description ', 'bizino'),
            'default' => esc_html__('The page you\'ve requested is not available.', 'bizino'),
        ),
        array(
            'id' => 'bizino_fof_btn_text',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'bizino'),
            'subtitle' => esc_html__('Set Button Text ', 'bizino'),
            'default' => esc_html__('Return To Home', 'bizino'),
        ),
        array(
            'id' => 'bizino_fof_text_color',
            'type' => 'color',
            'output' => array('.vs-error-wrapper .error-number'),
            'title' => esc_html__('Title Color', 'bizino'),
            'subtitle' => esc_html__('Pick a title color', 'bizino'),
            'validate' => 'color'
        ),
        array(
            'id' => 'bizino_fof_subtitle_color',
            'type' => 'color',
            'output' => array('.vs-error-wrapper .error-title'),
            'title' => esc_html__('Subtitle Color', 'bizino'),
            'subtitle' => esc_html__('Pick a subtitle color', 'bizino'),
            'validate' => 'color'
        ),
        array(
            'id' => 'bizino_fof_description_color',
            'type' => 'color',
            'output' => array('.vs-error-wrapper .error-text'),
            'title' => esc_html__('Description Color', 'bizino'),
            'subtitle' => esc_html__('Pick a Description color', 'bizino'),
            'validate' => 'color'
        ),
        array(
            'id' => 'bizino_fof_btn_color',
            'type' => 'color',
            'output' => array('.vs-btn.style-black'),
            'title' => esc_html__('Button Color', 'bizino'),
            'subtitle' => esc_html__('Pick Button Color', 'bizino'),
            'validate' => 'color'
        ),
        array(
            'id' => 'bizino_fof_btn_color_hover',
            'type' => 'color',
            'output' => array('.vs-btn.style-black:hover'),
            'title' => esc_html__('Button Hover Color', 'bizino'),
            'subtitle' => esc_html__('Pick Button Hover Color', 'bizino'),
            'validate' => 'color'
        ),
    ),
));

/* End 404 Page */
// -> START Gallery
Redux::setSection($opt_name, array(
    'title' => esc_html__('Gallery', 'bizino'),
    'id' => 'bizino_gallery_widget',
    'icon' => 'el el-gift',
    'fields' => array(
        array(
            'id' => 'bizino_gallery_image_widget',
            'type' => 'slides',
            'title' => esc_html__('Add Gallery Image', 'bizino'),
            'subtitle' => esc_html__('Add gallery Image and url.', 'bizino'),
            'show' => array(
                'title' => false,
                'description' => false,
                'progress' => false,
                'icon' => false,
                'facts-number' => false,
                'facts-title1' => false,
                'facts-title2' => false,
                'facts-number-2' => false,
                'facts-title3' => false,
                'facts-number-3' => false,
                'url' => true,
                'project-button' => false,
                'image_upload' => true,
            ),
        ),
    ),
));
// -> START Subscribe
Redux::setSection($opt_name, array(
    'title' => esc_html__('Subscribe', 'bizino'),
    'id' => 'bizino_subscribe_page',
    'icon' => 'el el-eject',
    'fields' => array(

        array(
            'id' => 'bizino_subscribe_apikey',
            'type' => 'text',
            'title' => esc_html__('Mailchimp API Key', 'bizino'),
            'subtitle' => esc_html__('Set mailchimp api key.', 'bizino'),
        ),
        array(
            'id' => 'bizino_subscribe_listid',
            'type' => 'text',
            'title' => esc_html__('Mailchimp List ID', 'bizino'),
            'subtitle' => esc_html__('Set mailchimp list id.', 'bizino'),
        ),
    ),
));

/* End Subscribe */

// -> START Social Media

Redux::setSection($opt_name, array(
    'title' => esc_html__('Social', 'bizino'),
    'id' => 'bizino_social_media',
    'icon' => 'el el-globe',
    'desc' => esc_html__('Social', 'bizino'),
    'fields' => array(
        array(
            'id' => 'bizino_social_links',
            'type' => 'slides',
            'title' => esc_html__('Social Profile Links', 'bizino'),
            'subtitle' => esc_html__('Add social icon and url.', 'bizino'),
            'show' => array(
                'title' => true,
                'description' => true,
                'progress' => false,
                'facts-number' => false,
                'facts-title1' => false,
                'facts-title2' => false,
                'facts-number-2' => false,
                'facts-title3' => false,
                'facts-number-3' => false,
                'url' => true,
                'project-button' => false,
                'image_upload' => false,
            ),
            'placeholder' => array(
                'icon' => esc_html__('Icon (example: fa fa-facebook) ', 'bizino'),
                'title' => esc_html__('Social Icon Class', 'bizino'),
                'description' => esc_html__('Social Icon Title', 'bizino'),
            ),
        ),
    ),
));

/* End social Media */


// -> START Footer Media
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer', 'bizino'),
    'id' => 'bizino_footer',
    'desc' => esc_html__('bizino Footer', 'bizino'),
    'customizer_width' => '400px',
    'icon' => 'el el-photo',
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Pre-built Footer / Footer Builder', 'bizino'),
    'id' => 'bizino_footer_section',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'bizino_footer_builder_trigger',
            'type' => 'button_set',
            'default' => 'prebuilt',
            'options' => array(
                'footer_builder' => esc_html__('Footer Builder', 'bizino'),
                'prebuilt' => esc_html__('Pre-built Footer', 'bizino'),
            ),
            'title' => esc_html__('Footer Builder', 'bizino'),
        ),
        array(
            'id' => 'bizino_footer_builder_select',
            'type' => 'select',
            'required' => array('bizino_footer_builder_trigger', 'equals', 'footer_builder'),
            'data' => 'posts',
            'args' => array(
                'post_type' => 'bizino_footer_build'
            ),
            'on' => esc_html__('Enabled', 'bizino'),
            'off' => esc_html__('Disable', 'bizino'),
            'title' => esc_html__('Select Footer', 'bizino'),
            'subtitle' => sprintf(wp_kses_post('First make your footer from footer custom types then select it from here. To make footer <a href="%sedit.php?post_type=bizino_footer_build" target="_blank">Click Here</a>', 'bizino'), esc_url(admin_url()))
        ),
        array(
            'id' => 'bizino_footerwidget_enable',
            'type' => 'switch',
            'title' => esc_html__('Footer Widget', 'bizino'),
            'default' => 0,
            'on' => esc_html__('Enabled', 'bizino'),
            'off' => esc_html__('Disable', 'bizino'),
            'required' => array('bizino_footer_builder_trigger', 'equals', 'prebuilt'),
        ),
        array(
            'id' => 'bizino_footer_background',
            'type' => 'background',
            'title' => esc_html__('Footer Background', 'bizino'),
            'subtitle' => esc_html__('Set footer background.', 'bizino'),
            'output' => array('.footer-layout1'),
            'required' => array('bizino_footerwidget_enable', '=', '1'),
        ),
        array(
            'id' => 'bizino_footer_widget_title_color',
            'type' => 'color',
            'title' => esc_html__('Footer Widget Title Color', 'bizino'),
            'required' => array('bizino_footerwidget_enable', '=', '1'),
            'output' => array('.footer-layout1 .footer-widget h3.widget_title'),
        ),
        array(
            'id' => 'bizino_footer_widget_color',
            'type' => 'color',
            'title' => esc_html__('Footer Widget Text Color', 'bizino'),
            'required' => array('bizino_footerwidget_enable', '=', '1'),
            'output' => array('.footer-layout1 .footer-wid-wrap .widget_contact p'),
        ),
        array(
            'id' => 'bizino_footer_widget_anchor_color',
            'type' => 'color',
            'title' => esc_html__('Footer Widget Anchor Color', 'bizino'),
            'required' => array('bizino_footerwidget_enable', '=', '1'),
            'output' => array('.footer-layout1 .copyright-wrap p a,.footer-layout1 .copyright-wrap a'),
        ),
        array(
            'id' => 'bizino_footer_widget_anchor_hov_color',
            'type' => 'color',
            'title' => esc_html__('Footer Widget Anchor Hover Color', 'bizino'),
            'required' => array('bizino_footerwidget_enable', '=', '1'),
            'output' => array('.footer-layout1 .copyright-wrap p a:hover,.footer-layout1 .copyright-wrap a:hover'),
        ),
        array(
            'id' => 'bizino_disable_footer_gallery',
            'type' => 'switch',
            'title' => esc_html__('Footer Gallery?', 'bizino'),
            'default' => 0,
            'on' => esc_html__('Enabled', 'bizino'),
            'off' => esc_html__('Disable', 'bizino'),
            'required' => array('bizino_footer_builder_trigger', 'equals', 'prebuilt'),
        ),

        array(
            'id' => 'bizino_gallery_footer_widget',
            'type' => 'slides',
            'title' => esc_html__('Add Gallery Image', 'bizino'),
            'subtitle' => esc_html__('Add gallery Image and url.', 'bizino'),
            'required' => array('bizino_disable_footer_gallery', 'equals', '1'),
            'show' => array(
                'title' => false,
                'description' => false,
                'progress' => false,
                'icon' => false,
                'facts-number' => false,
                'facts-title1' => false,
                'facts-title2' => false,
                'facts-number-2' => false,
                'facts-title3' => false,
                'facts-number-3' => false,
                'url' => true,
                'project-button' => false,
                'image_upload' => true,
            ),
        ),
        array(
            'id' => 'bizino_disable_footer_bottom',
            'type' => 'switch',
            'title' => esc_html__('Footer Bottom?', 'bizino'),
            'default' => 1,
            'on' => esc_html__('Enabled', 'bizino'),
            'off' => esc_html__('Disable', 'bizino'),
            'required' => array('bizino_footer_builder_trigger', 'equals', 'prebuilt'),
        ),
        array(
            'id' => 'bizino_footer_bottom_background',
            'type' => 'color',
            'title' => esc_html__('Footer Bottom Background Color', 'bizino'),
            'required' => array('bizino_disable_footer_bottom', '=', '1'),
            'output' => array('background-color' => '.footer-wrapper .copyright'),
        ),
        array(
            'id' => 'bizino_copyright_text',
            'type' => 'textarea',
            'title' => esc_html__('Copyright Text', 'bizino'),
            'subtitle' => esc_html__('Add Copyright Text', 'bizino'),
            'default' => sprintf('Copyright <i class="fal fa-copyright"></i> %s <a href="%s">%s</a> All Rights Reserved by <a href="%s">%s</a>', date('Y'), esc_url('#'), __('Bizino.', 'bizino'), esc_url('#'), __('Vecuro', 'bizino')),
            'required' => array('bizino_disable_footer_bottom', 'equals', '1'),
        ),
        array(
            'id' => 'bizino_footer_copyright_color',
            'type' => 'color',
            'title' => esc_html__('Footer Copyright Text Color', 'bizino'),
            'subtitle' => esc_html__('Set footer copyright text color', 'bizino'),
            'required' => array('bizino_disable_footer_bottom', 'equals', '1'),
            'output' => array('.footer-wrapper .copyright p'),
        ),
        array(
            'id' => 'bizino_footer_copyright_acolor',
            'type' => 'color',
            'title' => esc_html__('Footer Copyright Ancor Color', 'bizino'),
            'subtitle' => esc_html__('Set footer copyright ancor color', 'bizino'),
            'required' => array('bizino_disable_footer_bottom', 'equals', '1'),
            'output' => array('.footer-wrapper .copyright p a'),
        ),
        array(
            'id' => 'bizino_footer_copyright_a_hover_color',
            'type' => 'color',
            'title' => esc_html__('Footer Copyright Ancor Hover Color', 'bizino'),
            'subtitle' => esc_html__('Set footer copyright ancor Hover color', 'bizino'),
            'required' => array('bizino_disable_footer_bottom', 'equals', '1'),
            'output' => array('.footer-wrapper .copyright p a:hover'),
        ),

    ),
));


/* End Footer Media */

// -> START Custom Css
Redux::setSection($opt_name, array(
    'title' => esc_html__('Custom Css', 'bizino'),
    'id' => 'bizino_custom_css_section',
    'icon' => 'el el-css',
    'fields' => array(
        array(
            'id' => 'bizino_css_editor',
            'type' => 'ace_editor',
            'title' => esc_html__('CSS Code', 'bizino'),
            'subtitle' => esc_html__('Paste your CSS code here.', 'bizino'),
            'mode' => 'css',
            'theme' => 'monokai',
        )
    ),
));

/* End custom css */


if (file_exists(dirname(__FILE__) . '/../README.md')) {
    $section = array(
        'icon' => 'el el-list-alt',
        'title' => __('Documentation', 'bizino'),
        'fields' => array(
            array(
                'id' => '17',
                'type' => 'raw',
                'markdown' => true,
                'content_path' => dirname(__FILE__) . '/../README.md', // FULL PATH, not relative please
                //'content' => 'Raw content here',
            ),
        ),
    );
    Redux::setSection($opt_name, $section);
}
/*
 * <--- END SECTIONS
 */


/*
 *
 * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
 *
 */

/**
 * This is a test function that will let you see when the compiler hook occurs.
 * It only runs if a field    set with compiler=>true is changed.
 * */
if (!function_exists('compiler_action')) {
    function compiler_action($options, $css, $changed_values)
    {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r($changed_values); // Values that have changed since the last save
        echo "</pre>";
        //print_r($options); //Option values
        //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }
}

/**
 * Custom function for the callback validation referenced above
 * */
if (!function_exists('redux_validate_callback_function')) {
    function redux_validate_callback_function($field, $value, $existing_value)
    {
        $error = false;
        $warning = false;

        //do your validation
        if ($value == 1) {
            $error = true;
            $value = $existing_value;
        } elseif ($value == 2) {
            $warning = true;
            $value = $existing_value;
        }

        $return['value'] = $value;

        if ($error == true) {
            $field['msg'] = 'your custom error message';
            $return['error'] = $field;
        }

        if ($warning == true) {
            $field['msg'] = 'your custom warning message';
            $return['warning'] = $field;
        }

        return $return;
    }
}

/**
 * Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')) {
    function redux_my_custom_field($field, $value)
    {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
}

/**
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 * so you must use get_template_directory_uri() if you want to use any of the built in icons
 * */
if (!function_exists('dynamic_section')) {
    function dynamic_section($sections)
    {
        //$sections = array();
        $sections[] = array(
            'title' => __('Section via hook', 'bizino'),
            'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'bizino'),
            'icon' => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }
}

/**
 * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
 * */
if (!function_exists('change_arguments')) {
    function change_arguments($args)
    {
        //$args['dev_mode'] = true;

        return $args;
    }
}

/**
 * Filter hook for filtering the default value of any given field. Very useful in development mode.
 * */
if (!function_exists('change_defaults')) {
    function change_defaults($defaults)
    {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }
}