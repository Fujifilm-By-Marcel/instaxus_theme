<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//$product = logancee_get_product();
$woocommerce_loop = logancee_get_woocommerce_loop();
$logancee_options = logancee_get_options();
$product = logancee_get_product();

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}


?>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="product-list-img">
            <div class="product-show">
                <?php do_action( 'woocommerce_before_shop_loop_item_list' ); ?>
            </div>
        </div>
    </div>

    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <div class="product-shop">
        <?php
        /**
        * woocommerce_before_shop_loop_item_title hook
         *
         * @hooked woocommerce_show_product_loop_sale_flash - 10
         */
        do_action( 'woocommerce_before_shop_loop_item_title' );
        ?>
        <div class="product-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
        <?php
        /**
        * woocommerce_before_shop_loop_item_title hook
         *
         * @hooked woocommerce_show_product_loop_sale_flash - 10
         */
      //  do_action( 'woocommerce_after_shop_loop_item_title' );
        ?>
        <?php

            /**
             * woocommerce_after_shop_loop_item hook
             *
             * @hooked woocommerce_template_loop_add_to_cart - 10
             */
         //   do_action( 'woocommerce_after_shop_loop_item' );

        ?>
        <?php do_action( 'woocommerce_after_shop_list_loop_item_title' ); ?>

        <?php



            $class = '';
            $wishlist = (in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && $logancee_options['product-addtowishlist-status']);
            $compare = (class_exists( 'YITH_Woocompare_Frontend' ) && $logancee_options['product-addtocompare-status']);
            ?>
            <div class="typo-actions clearfix">
                <div class="addtocart">
                    <?php
                    if ($logancee_options['product-addtocart-status']) {
                        echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                            sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button cart-links %s product_type_%s">%s</a>',
                                esc_url( $product->add_to_cart_url() ),
                                esc_attr( $product->id ),
                                esc_attr( $product->get_sku() ),
                                esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                ($product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button ' : '') . ($product->product_type == 'variable' ? '' : 'ajax_add_to_cart'),
                                esc_attr( $product->product_type ),
                                esc_html( $product->add_to_cart_text() )
                            ),
                            $product );
                    }
                    ?>
                </div>
            <?php
            if ( $wishlist || $compare) {?>
                <div class="addtolist">
                    <div class="add-to-links">
                        <?php
                        // Add Wishlist
                        if ($wishlist) {
                            echo
                                '<div class="wishlist">
                                    ' . do_shortcode('[yith_wcwl_add_to_wishlist]') . '
                                </div>';
                        }

                        // Add Compare
                        if ($compare) {
                            $yith_woocompare = logancee_get_yith_woocompare();
                            echo '<div class="compare">';
                            $yith_woocompare->obj->add_compare_link(false, array('button_or_link' => 'link', 'button_text' => '<i data-toggle="tooltip" data-placement="top"  data-original-title="'. __('Add to compare', 'logancee') .'" aria-hidden="true" class="icon_piechart"></i>'));
                            echo '</div>';
                        }?>
                    </div>
                </div>
                <?php
            }?>
            </div>

        </div>
    </div>

