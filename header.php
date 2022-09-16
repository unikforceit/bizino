<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>

<?php
    wp_body_open();

    /**
    *
    * Preloader
    *
    * Hook bizino_preloader_wrap
    *
    * @Hooked bizino_preloader_wrap_cb 10
    *
    */
    do_action( 'bizino_preloader_wrap' );


    /**
    *
    * bizino header
    *
    * Hook bizino_header
    *
    * @Hooked bizino_header_cb 10
    *
    */
    do_action( 'bizino_header' );