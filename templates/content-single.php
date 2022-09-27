<?php
/**
 * @Packge     : Bizino
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    ?>
    <div <?php post_class('vs-blog blog-single'); ?> >
    <?php
        if( class_exists('ReduxFramework') ) {
            $bizino_post_details_title_position = bizino_opt('bizino_post_details_title_position');
            $bizino_display_post_date      =  bizino_opt('bizino_display_post_date');
        } else {
            $bizino_post_details_title_position = 'header';
            $bizino_display_post_date      =  '1';
        }

        $allowhtml = array(
            'p'         => array(
                'class'     => array()
            ),
            'span'      => array(),
            'a'         => array(
                'href'      => array(),
                'title'     => array()
            ),
            'br'        => array(),
            'em'        => array(),
            'strong'    => array(),
            'b'         => array(),
        );

            // Blog Post Thumbnail
            do_action( 'bizino_blog_post_thumb' );

            echo '<div class="blog-content">';

                if( $bizino_display_post_date ){
                    echo '<a class="blog-date" href="'.esc_url( bizino_blog_date_permalink() ).'">'.esc_html( get_the_date() ).'</a>';
                }
                // Blog Post Meta
                do_action( 'bizino_blog_post_meta' );

                echo '<h2 class="blog-title">'.wp_kses( get_the_title(), $allowhtml ).'</h2>';

                if( get_the_content() ){

                    the_content();
                    // Link Pages
                    bizino_link_pages();
                }

                echo '</div>';

            if( class_exists('ReduxFramework') ) {
                $bizino_post_details_share_options = bizino_opt('bizino_post_details_share_options');
            } else {
                $bizino_post_details_share_options = false;
            }
            
            $bizino_post_tag = get_the_tags();
            
            if( ! empty( $bizino_post_tag ) || ( function_exists( 'bizino_social_sharing_buttons' ) || $bizino_post_details_share_options ) ){
                echo '<div class="share-links clearfix  ">';
                    echo '<div class="row justify-content-between">';
                    
                        if( is_array( $bizino_post_tag ) && ! empty( $bizino_post_tag ) ){
                            if( count( $bizino_post_tag ) > 1 ){
                                $tag_text = __( 'Tags:', 'bizino' );
                            }else{
                                $tag_text = __( 'Tag:', 'bizino' );
                            }
                            echo '<div class="col-md-auto">';
                            echo '<span class="share-links-title">'.$tag_text.'</span>';

                                echo '<div class="tagcloud">';
                                    foreach( $bizino_post_tag as $tags ){
                                        echo '<a href="'.esc_url( get_tag_link( $tags->term_id ) ).'">'.esc_html( $tags->name ).'</a>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }

                        /**
                        *
                        * Hook for Blog Details Share Options
                        *
                        * Hook bizino_blog_details_share_options
                        *
                        * @Hooked bizino_blog_details_share_options_cb 10
                        *
                        */
                        do_action( 'bizino_blog_details_share_options' );

                    echo '</div>';
                echo '</div>';  
            }

        /**
        *
        * Hook for Blog Details Post Navigation Options
        *
        * Hook bizino_blog_details_post_navigation
        *
        * @Hooked bizino_blog_details_post_navigation_cb 10
        *
        */
        //do_action( 'bizino_blog_details_post_navigation' );

        /**
        *
        * Hook for Blog Details Author Bio
        *
        * Hook bizino_blog_details_author_bio
        *
        * @Hooked bizino_blog_details_author_bio_cb 10
        *
        */
        do_action( 'bizino_blog_details_author_bio' );

        /**
        *
        * Hook for Blog Details Comments
        *
        * Hook bizino_blog_details_comments
        *
        * @Hooked bizino_blog_details_comments_cb 10
        *
        */
        do_action( 'bizino_blog_details_comments' );