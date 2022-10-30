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

    if( !empty( bizino_pagination() ) ) :
?>
<!-- Post Pagination -->
<div class="vs-pagination">
    <ul>
        <?php
            $prev 	= '<i class="fal fa-angle-double-left"></i>';
            $next 	= '<i class="fal fa-angle-double-right"></i>';
            // previous
            if( get_previous_posts_link() ){
                echo '<li>';
                previous_posts_link( $prev );
                echo '</li>';
            }

            echo bizino_pagination();

            // next
            if( get_next_posts_link() ){
                echo '<li>';
                next_posts_link( $next );
                echo '</li>';
            }
        ?>
    </ul>
</div>
<!-- End of Post Pagination -->
<?php 
    endif;