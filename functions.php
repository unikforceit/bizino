<?php
/**
 * @Packge     : Bizino
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Include File
 *
 */

// Constants
require_once get_parent_theme_file_path() . '/inc/bizino-constants.php';

//theme setup
require_once BIZINO_DIR_PATH_INC . 'theme-setup.php';

//essential scripts
require_once BIZINO_DIR_PATH_INC . 'essential-scripts.php';

// Woo Hooks
require_once BIZINO_DIR_PATH_INC . 'woo-hooks/bizino-woo-hooks.php';

// Woo Hooks Functions
require_once BIZINO_DIR_PATH_INC . 'woo-hooks/bizino-woo-hooks-functions.php';

// plugin activation
require_once BIZINO_DIR_PATH_FRAM . 'plugins-activation/bizino-active-plugins.php';

// meta options
require_once BIZINO_DIR_PATH_FRAM . 'bizino-meta/bizino-config.php';

// page breadcrumbs
require_once BIZINO_DIR_PATH_INC . 'bizino-breadcrumbs.php';

// sidebar register
require_once BIZINO_DIR_PATH_INC . 'bizino-widgets-reg.php';

//essential functions
require_once BIZINO_DIR_PATH_INC . 'bizino-functions.php';

// helper function
require_once BIZINO_DIR_PATH_INC . 'wp-html-helper.php';

// Demo Data
require_once BIZINO_DEMO_DIR_PATH . 'demo-import.php';

// pagination
require_once BIZINO_DIR_PATH_INC . 'wp_bootstrap_pagination.php';

// bizino options
require_once BIZINO_DIR_PATH_FRAM . 'bizino-options/bizino-options.php';

// hooks
require_once BIZINO_DIR_PATH_HOOKS . 'hooks.php';

// hooks funtion
require_once BIZINO_DIR_PATH_HOOKS . 'hooks-functions.php';