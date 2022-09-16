<?php
/**
 * @Packge     : Bizino
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

echo '<!-- Single Post -->';
?>
<div <?php post_class(); ?>>
<?php
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
	if( class_exists('ReduxFramework') ) {
        $bizino_blog_style = bizino_opt('bizino_blog_style');
    } else {
    	$bizino_blog_style = '1';
    }

    if( $bizino_blog_style == '1' ){
	    do_action( 'bizino_blog_post_content' );
	}else{

        $bizino_display_post_date  	= bizino_opt('bizino_display_post_date') ?  bizino_opt('bizino_display_post_date') : '1';
        $bizino_display_post_comment   = bizino_opt('bizino_display_post_comment') ?  bizino_opt('bizino_display_post_date') : '1';
        $bizino_excerpt_length   		= bizino_opt('bizino_blog_postExcerpt') ?  bizino_opt('bizino_blog_postExcerpt') : '20';

		echo '<div class="row justify-content-between gx-xl-0">';
			echo '<div class="col-lg-6 col-xl-5 align-self-center order-1 order-lg-0">';
				echo '<div class="blog-content">';
					echo '<div class="meta-box">';
						
		                if( $bizino_display_post_date ){
		                    echo '<a href="'.esc_url( bizino_blog_date_permalink() ).'"><i class="fal fa-calendar-alt"></i>';
		                        echo esc_html( get_the_date() );
		                    echo '</a>';
		                }
		                if( $bizino_display_post_comment ){
		                    if( get_comments_number() == 1 ){
		                        $comment_text = __( ' Comment', 'bizino' );
		                    }else{
		                        $comment_text = __( ' Comments', 'bizino' );
		                    }
		                    echo '<a href="'.esc_url( get_comments_link( get_the_ID() ) ).'"><i class="far fa-comments"></i>'.esc_html( get_comments_number() ).''.$comment_text.'</a>';
		                }
					echo '</div>';
					echo '<h2 class="blog-title fw-semibold"><a href="'.esc_url( get_permalink() ).'">'.get_the_title().'</a></h2>';
					echo bizino_paragraph_tag( array(
                            "text"  => wp_kses( wp_trim_words( get_the_excerpt(), $bizino_excerpt_length, '' ), $allowhtml ),
                            'class' => 'blog-text'
                        ) );
					echo '<a href="'.esc_url( get_permalink() ).'" class="icon-btn"><i class="fas fa-chevron-right"></i></a>';
				echo '</div>';
			echo '</div>';
			echo '<div class="col-lg-6 order-0 order-lg-1">';
				bizino_blog_post_thumb_cb();
			echo '</div>';
		echo '</div>';
	}

echo '</div>';
echo '<!-- End Single Post -->';