<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
//
$logancee_options = logancee_get_options();
?>
<div class="container">
    <div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>">

        <div class="product-info <?php echo isset($logancee_options['productpage-layout']) ? 'product-layout-'.$logancee_options['productpage-layout'] : '' ?> ">
            <div class="row">
                <div class="col-md-<?php if($logancee_options['block-product-status']) { echo 9; } else { echo 12; } ?>">
                    <div class="row" id="quickview_product">
                    <?php
                        /**
                        * woocommerce_before_single_product_summary hook
                        *
                        * @hooked woocommerce_show_product_sale_flash - 10
                        * @hooked woocommerce_show_product_images - 20
                        */
                        do_action( 'woocommerce_before_single_product_summary' );
                    ?>
                    <?php $product_center_grid = 6; 
                
                    if ($logancee_options['productpage-image-size'] == 1) {
                        $product_center_grid = 6;
                    }

                    if ($logancee_options['productpage-image-size'] == 3) {
                        $product_center_grid = 6;
                    }
                    ?>
                        
                    <div class="col-md-<?php echo $product_center_grid; ?> product-center clearfix">
                    <?php
                        /**
                        * woocommerce_single_product_summary hook
                        *
                        * @hooked woocommerce_template_single_title - 5
                        * @hooked woocommerce_template_single_price - 10
                        * @hooked woocommerce_template_single_excerpt - 20
                        * @hooked woocommerce_template_single_add_to_cart - 30
                        * @hooked woocommerce_template_single_meta - 40
                        * @hooked woocommerce_template_single_rating - 45
                        * @hooked woocommerce_template_single_sharing - 50
                        */
                        do_action( 'woocommerce_single_product_summary' );

                    ?>
                    </div>
                        
                    </div>
                </div><!-- .summary -->
                
                <div class="col-sm-3">
                    <?php if($logancee_options['block-product-status'] == 1) { ?>
                <div class="product-block">
                    <?php if($logancee_options['block-product-heading'] != '') { ?>
                    <h4 class="title-block"><?php echo $logancee_options['block-product-heading'] ?></h4>
                    <div class="strip-line"></div>
                    <?php } ?>
                    <div class="block-content">
                        <?php echo html_entity_decode($logancee_options['block-product-content']); ?>
                    </div>
                </div>
                <?php } ?>

                </div>
                
            </div>
        </div>

        <?php if($logancee_options['productpage-layout'] == 1):?>
            <div class="product-desc-layout-center">
                <?php  wc_get_template( 'single-product/tabs/description.php' ); ?>
            </div>

        <?php endif; ?>
        <?php
            /**
            * woocommerce_after_single_product_summary hook
            *
            * @hooked woocommerce_output_product_data_tabs - 10
            * @hooked woocommerce_upsell_display - 15
            * @hooked woocommerce_output_related_products - 20
            */
            do_action( 'woocommerce_after_single_product_summary' );
        ?>

        <meta itemprop="url" content="<?php the_permalink(); ?>" />

    </div><!-- #product-<?php the_ID(); ?> -->
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
