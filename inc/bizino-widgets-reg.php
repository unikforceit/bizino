<?php
/**
 * @Packge     : Bizino
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */


// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit;
}

function bizino_widgets_init() {

    if( class_exists('ReduxFramework') ) {
        $bizino_sidebar_widget_title_heading_tag = bizino_opt('bizino_sidebar_widget_title_heading_tag');
    } else {
        $bizino_sidebar_widget_title_heading_tag = 'h3';
    }

    //sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'bizino' ),
        'id'            => 'bizino-blog-sidebar',
        'description'   => esc_html__( 'Add Blog Sidebar Widgets Here.', 'bizino' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget_title">',
        'after_title'   => '</h3>',
    ) );

    // page sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'bizino' ),
        'id'            => 'bizino-page-sidebar',
        'description'   => esc_html__( 'Add Page Sidebar Widgets Here.', 'bizino' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget_title">',
        'after_title'   => '</h3>',
    ) );
    if( class_exists( 'ReduxFramework' ) ){
        // footer widgets register
        register_sidebar( array(
           'name'          => esc_html__( 'Footer One', 'bizino' ),
           'id'            => 'bizino-footer-1',
           'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Two', 'bizino' ),
           'id'            => 'bizino-footer-2',
           'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Three', 'bizino' ),
           'id'            => 'bizino-footer-3',
           'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
    }
    if( class_exists('woocommerce') ) {
        register_sidebar(
            array(
                'name'          => esc_html__( 'WooCommerce Sidebar', 'bizino' ),
                'id'            => 'bizino-woo-sidebar',
                'description'   => esc_html__( 'Add widgets here to appear in your woocommerce page sidebar.', 'bizino' ),
                'before_widget' => '<div class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="widget_title"><h4>',
                'after_title'   => '</h4></div>',
            )
        );
    }

}

add_action( 'widgets_init', 'bizino_widgets_init' );