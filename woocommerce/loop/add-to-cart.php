<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$logancee_options = logancee_get_options();

$flag = true;
if (!isset($product)) { 
    $flag = false;
    $product = logancee_get_product();
}

$class = '';
$wishlist = (in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && $logancee_options['product-addtowishlist-status']);
$compare = (class_exists( 'YITH_Woocompare_Frontend' ) && $logancee_options['product-addtocompare-status']);

if ( $wishlist || $compare || $logancee_options['product-addtocart-status']) : ?>
    <div class="typo-actions clearfix">
        <div class="addtocart">
        <?php
        if ($logancee_options['product-addtocart-status']) {
            echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button cart-links %s product_type_%s">%s</a>',
                    esc_url( $product->add_to_cart_url() ),
                    esc_attr( $product->get_id() ),
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
                    if ($compare && !$flag) {
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
<?php endif; ?>
