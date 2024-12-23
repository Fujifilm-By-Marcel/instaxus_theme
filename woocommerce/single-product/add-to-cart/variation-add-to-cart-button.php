<?php
/**
 * Single variation cart button
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$product = logancee_get_product();
?>
<div class="woocommerce-variation-add-to-cart variations_button">
    <div class="add-to-cart clearfix">
    <div class="quantity">
    <?php
    /**
     * @since 3.0.0.
     */
    do_action( 'woocommerce_before_add_to_cart_quantity' );

    woocommerce_quantity_input( array(
        'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1,
    ) );

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
    <button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
    <input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
    <input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
    <input type="hidden" name="variation_id" class="variation_id" value="0" />
    </div>

</div>
