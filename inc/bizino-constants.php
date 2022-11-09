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
 *
 * Define constant
 *
 */

// Base URI
if (!defined('BIZINO_DIR_URI')) {
    define('BIZINO_DIR_URI', get_parent_theme_file_uri() . '/');
}

// Assist URI
if (!defined('BIZINO_DIR_ASSIST_URI')) {
    define('BIZINO_DIR_ASSIST_URI', get_theme_file_uri('/assets/'));
}


// Css File URI
if (!defined('BIZINO_DIR_CSS_URI')) {
    define('BIZINO_DIR_CSS_URI', get_theme_file_uri('/assets/css/'));
}

// Skin Css File
if (!defined('BIZINO_DIR_SKIN_CSS_URI')) {
    define('BIZINO_DIR_SKIN_CSS_URI', get_theme_file_uri('/assets/css/skins/'));
}


// Js File URI
if (!defined('BIZINO_DIR_JS_URI')) {
    define('BIZINO_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// External PLugin File URI
if (!defined('BIZINO_DIR_PLUGIN_URI')) {
    define('BIZINO_DIR_PLUGIN_URI', get_theme_file_uri('/assets/plugins/'));
}

// Base Directory
if (!defined('BIZINO_DIR_PATH')) {
    define('BIZINO_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('BIZINO_DIR_PATH_INC')) {
    define('BIZINO_DIR_PATH_INC', BIZINO_DIR_PATH . 'inc/');
}

//BIZINO framework Folder Directory
if (!defined('BIZINO_DIR_PATH_FRAM')) {
    define('BIZINO_DIR_PATH_FRAM', BIZINO_DIR_PATH_INC . 'bizino-framework/');
}

//Classes Folder Directory
if (!defined('BIZINO_DIR_PATH_CLASSES')) {
    define('BIZINO_DIR_PATH_CLASSES', BIZINO_DIR_PATH_INC . 'classes/');
}

//Hooks Folder Directory
if (!defined('BIZINO_DIR_PATH_HOOKS')) {
    define('BIZINO_DIR_PATH_HOOKS', BIZINO_DIR_PATH_INC . 'hooks/');
}

//Demo Data Folder Directory Path
if (!defined('BIZINO_DEMO_DIR_PATH')) {
    define('BIZINO_DEMO_DIR_PATH', BIZINO_DIR_PATH_INC . 'demo-data/');
}

//Demo Data Folder Directory URI
if (!defined('BIZINO_DEMO_DIR_URI')) {
    define('BIZINO_DEMO_DIR_URI', BIZINO_DIR_URI . 'inc/demo-data/');
}