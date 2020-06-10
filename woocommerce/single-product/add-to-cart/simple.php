<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$product = logancee_get_product();
$logancee_options = logancee_get_options();


if ( ! $product->is_purchasable() ) {
	return;
}

?>

<?php if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" method="post" enctype='multipart/form-data'>
	 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
        <div class="add-to-cart clearfix">
            <?php
            /**
             * @since 3.0.0.
             */
            do_action( 'woocommerce_before_add_to_cart_quantity' );
            ?>
            <div class="quantity">
                <?php

                if ( ! $product->is_sold_individually() ) {
                    woocommerce_quantity_input( array(
                        'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                        'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                        'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
                    ) );
                }

                ?>
                <a href="#" id="q_up"><i class="fa fa-plus"></i></a>
                <a href="#" id="q_down"><i class="fa fa-minus"></i></a>
            </div>
            <?php
            /**
             * @since 3.0.0.
             */
            do_action( 'woocommerce_after_add_to_cart_quantity' );
            ?>

            <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

            <button id="button-cart" type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
        </div>
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>


		<?php
		$wishlist = (in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && $logancee_options['product-addtowishlist-status']);
		$compare = (class_exists( 'YITH_Woocompare_Frontend' ) && $logancee_options['product-addtocompare-status']);
		if ( $wishlist || $compare) {?>
			<div class="links">
				<?php
				// Add Wishlist
				if ($wishlist) {
					echo
						'<div class="wishlist">
                            ' . do_shortcode('[yith_wcwl_add_to_wishlist mode="test"]') . '
                       </div>';
				}

				// Add Compare
				if ($compare) {
					$yith_woocompare = logancee_get_yith_woocompare();
					$yith_woocompare->obj->add_compare_link(false, array('button_or_link' => 'link', 'button_text' => __('Add to compare', 'logancee')));
				}?>
		</div>
		<?php
		}?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>

