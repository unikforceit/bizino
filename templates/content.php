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

    if( $bizino_blog_style == '2' ){
	    do_action( 'bizino_blog_post_content' );
	}else {

        $bizino_display_post_date = bizino_opt('bizino_display_post_date') ? bizino_opt('bizino_display_post_date') : '1';
        $bizino_display_post_comment = bizino_opt('bizino_display_post_comment') ? bizino_opt('bizino_display_post_date') : '1';
        $bizino_excerpt_length = bizino_opt('bizino_blog_postExcerpt') ? bizino_opt('bizino_blog_postExcerpt') : '20';
    ?>
            <?php if (has_post_thumbnail()){?>
                <div class="blog-img">
                    <a href="<?php echo esc_url( get_permalink() );?>"><?php bizino_blog_post_thumb_cb();?></a>
                </div>
            <?php } ?>
            <div class="blog-content">
                <?php
                if( $bizino_display_post_date ){
                    echo '<a class="blog-date" href="'.esc_url( bizino_blog_date_permalink() ).'">';
                    echo esc_html( get_the_date() );
                    echo '</a>';
                }
                ?>
                <div class="blog-meta">
                    <a href="#"><i class="fas fa-user"></i> <?php echo get_the_author_meta('display_name');?></a>
                    <?php
                    if( $bizino_display_post_comment ){
                        if( get_comments_number() == 1 ){
                            $comment_text = __( ' Comment', 'bizino' );
                        }else{
                            $comment_text = __( ' Comments', 'bizino' );
                        }
                        echo '<a href="'.esc_url( get_comments_link( get_the_ID() ) ).'"><i class="fas fa-comment-alt-lines"></i>'.esc_html( get_comments_number() ).''.$comment_text.'</a>';
                    }
                    ?>
                </div>
                <h2 class="blog-title"><a href="<?php echo esc_url( get_permalink() );?>"><?php echo get_the_title();?></a></h2>
               <?php
                    echo bizino_paragraph_tag( array(
                        "text"  => wp_kses( wp_trim_words( get_the_excerpt(), $bizino_excerpt_length, '' ), $allowhtml ),
                        'class' => 'blog-text'
                    ) );
               ?>
            </div>
    <?php }
?>
</div>