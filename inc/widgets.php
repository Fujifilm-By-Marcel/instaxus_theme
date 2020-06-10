<?php

// Widgets
require(get_template_directory() . '/inc/widgets/categories.php');
require(get_template_directory() . '/inc/widgets/sidebar-menu-widget.php');
require(get_template_directory() . '/inc/widgets/footer-menu-widget.php');
require(get_template_directory() . '/inc/widgets/custom-block-widget.php');
if ( class_exists( 'Woocommerce' ) ) {
    require(get_template_directory() . '/inc/widgets/product-categories.php');
    require(get_template_directory() . '/inc/widgets/product-top-rated.php');
    require(get_template_directory() . '/inc/widgets/product-recently-viewed.php');
}


?>
