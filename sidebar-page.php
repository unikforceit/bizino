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

if (!is_active_sidebar('bizino-page-sidebar')) {
    return;
}
?>

<div class="col-lg-4">
    <div class="page-sidebar">
        <?php
        dynamic_sidebar('bizino-page-sidebar');
        ?>
    </div>
</div>