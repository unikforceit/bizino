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
        exit();
    }

    if( class_exists( 'ReduxFramework' ) ) {
        $bizino404title     = bizino_opt( 'bizino_fof_title' );
        $bizino404subtitle  = bizino_opt( 'bizino_fof_subtitle' );
        $bizino404desc      = bizino_opt( 'bizino_fof_description' );
        $bizino404btntext   = bizino_opt( 'bizino_fof_btn_text' );
        $bizino_404_image   = bizino_opt( 'bizino_404_image','url' );
    } else {
        $bizino404title     = __( '404', 'bizino' );
        $bizino404subtitle  = __( 'Oops, Page Not Found', 'bizino' );
        $bizino404desc      = __( 'We Can\'t Seem to find the page you\'re looking for.', 'bizino' );
        $bizino404btntext   = __( 'Go Back Home', 'bizino');
        $bizino_404_image   = get_template_directory_uri().'/assets/img/error.png';
    }

    // get header
    get_header();

    echo '<section class="vs-error-wrapper bg-dark space-bottom">';
        echo '<div class="container">';
            echo '<div class="error-content text-center">';
                echo '<h1 class="error-number text-white">'.esc_html( $bizino404title ).'</h1>';
                echo '<h2 class="error-title text-white">'.esc_html( $bizino404subtitle ).'</h2>';
                echo '<p class="error-text text-white">'.esc_html( $bizino404desc ).'</p>';
                echo '<div class="row justify-content-center mb-20">';
                    echo '<div class="col-lg-9 col-xl-8 pt-1">';
                        echo '<form action="'.esc_url( home_url('/') ).'" class="search-inline">';
                            echo '<input name="s" type="text" class="form-control" placeholder="'.esc_attr__( 'Enter Your Keyword....', 'bizino' ).'">';
                            echo '<button><i class="far fa-search"></i></button>';
                        echo '</form>';
                    echo '</div>';
                echo '</div>';
                echo '<a href="'.esc_url( home_url('/') ).'" class="vs-btn style-black style-white-hover"><i class="fas fa-home me-2 pe-1"></i>'.esc_html( $bizino404btntext ).'</a>';
            echo '</div>';
        echo '</div>';
    echo '</section>';
    //footer
    get_footer();