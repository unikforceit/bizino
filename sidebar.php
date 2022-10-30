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

if ( ! is_active_sidebar( 'bizino-blog-sidebar' ) ) {
    return;
}
?>

<div class="col-lg-4">
    <aside class="sidebar-area">
	    <?php dynamic_sidebar( 'bizino-blog-sidebar' ); ?>
	</aside>
</div>