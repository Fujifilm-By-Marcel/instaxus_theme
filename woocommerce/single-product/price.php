<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$product = logancee_get_product();
if ( $product->is_type( 'variable' ) ) {
	// this is a variable product, so let's ensure $product is set up correctly
  
	// force the product to sync with its variations
	$product->sync( $product->id );
	// update $product with the synced product
	$pf = new WC_Product_Factory();
	$product = $pf->get_product( $product->id );
	// update utility variables used in the variable.php template
	$available_variations = $product->get_available_variations();
	$attributes = $product->get_variation_attributes();
  }

?>
<p class="price"><?php echo $product->get_price_html(); ?></p>
