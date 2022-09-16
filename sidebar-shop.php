<?php
	// Block direct access
	if( ! defined( 'ABSPATH' ) ){
		exit( );
	}
	/**
	* @Packge 	   : Bizino
	* @Version     : 1.0
	* @Author     : Vecurosoft
    * @Author URI : https://www.vecurosoft.com/
	*
	*/

	if( ! is_active_sidebar( 'bizino-woo-sidebar' ) ){
		return;
	}
?>
<div class="col-lg-4">
	<!-- Sidebar Begin -->
	<aside class="sidebar-area">
		<?php
			dynamic_sidebar( 'bizino-woo-sidebar' );
		?>
	</aside>
	<!-- Sidebar End -->
</div>