<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$product = logancee_get_product();
$post = logancee_get_post();
$woocommerce = logancee_get_woocommerce();
$logancee_options = logancee_get_options();

$attachment_ids = $product->get_gallery_attachment_ids();

$image_count = 0;

if ( has_post_thumbnail() ) {
    $image_count++;
}

		foreach ( $attachment_ids as $attachment_id ) {
    $image_link = wp_get_attachment_url( $attachment_id );
    if ( ! $image_link )
        continue;
    $image_count++;
}

if ( $image_count ) {


	?>
    <?php if ($logancee_options['productpage-image-additional'] != 1): ?>
    <div class="thumbnails thumbnails-left clearfix">
        <ul>
    <?php else: ?>
    <div class="overflow-thumbnails-carousel">
        <div class="thumbnails thumbnails-carousel owl-carousel">
    <?php endif; ?>

            <?php

            if ( has_post_thumbnail() ) {

                $image_link = wp_get_attachment_url( get_post_thumbnail_id() );

                if ( $image_link ) {
                    $classes = array();
                    $classes[] =  'zoom' ;

                    $image = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
                    $image_class = esc_attr( implode( ' ', $classes ) );
                    $image_title = esc_attr( get_the_title( get_post_thumbnail_id() ) );

                    if ($logancee_options['productpage-image-additional'] != 1){

                        echo '<li><p>';

                        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html',
                            sprintf( '<a href="%s" class="%s" data-image="%s" data-zoom-image="%s" rel="prettyPhoto[product-gallery]">%s</a>',
                                $image_link, $image_class, $image_link, $image_link, $image ),
                            get_post_thumbnail_id(), $post->ID, $image_class );

                        echo '</p></li>';
                    }else{

                        echo '<div class="item">';

                            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html',
                            sprintf( '<a href="%s" class="%s" data-image="%s" data-zoom-image="%s" rel="prettyPhoto[product-gallery]">%s</a>',
                                $image_link,$image_class, $image_link, $image_link, $image ),
                            get_post_thumbnail_id(), $post->ID, $image_class );

                        echo '</div>';
                    }
                }

			}

		    foreach ( $attachment_ids as $attachment_id ) {

			    $image_link = wp_get_attachment_url( $attachment_id );

			    if ( ! $image_link )
				continue;

                $classes = array();
                $classes[] =  'zoom' ;

			    $image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
			    $image_class = esc_attr( implode( ' ', $classes ) );
			    $image_title = get_post_field( 'post_title', $attachment_id );

                if ($logancee_options['productpage-image-additional'] != 1){

                    echo '<li><p>';

                    echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" class="%s" data-image="%s" data-zoom-image="%s" rel="prettyPhoto[product-gallery]">%s</a>', $image_link, $image_class, $image_link, $image_link, $image ), $attachment_id, $post->ID, $image_class );

                    echo '</p></li>';
                }else{

                    echo '<div class="item">';

                    echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" class="%s" data-image="%s" data-zoom-image="%s" rel="prettyPhoto[product-gallery]">%s</a>', $image_link, $image_class, $image_link, $image_link, $image ), $attachment_id, $post->ID, $image_class );

                    echo '</div>';
		}
		    }

	        ?>

    <?php if ($logancee_options['productpage-image-additional'] != 1): ?>
        </ul>
    </div>
    <?php else: ?>
        </div>
    </div>
    <?php endif; ?>
	<?php
}

?>


<script type="text/javascript">
     (function($) {
          $(document).ready(function() {
            $(".thumbnails-carousel").owlCarousel({
                autoPlay: 6000, //Set AutoPlay to 3 seconds
                navigation: true,
                navigationText: ['', ''],
                itemsCustom : [
                  [0, 4],
                  [450, 5],
                  [550, 6],
                  [768, 3],
                  [1200, 4]
                ],
                <?php if(is_rtl()): ?>
                direction: 'rtl'
                <?php endif; ?>
            });
          });
     })(jQuery)
</script>
