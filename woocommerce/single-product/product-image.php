<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 3.5.1
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

$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . $placeholder,
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );

if ( has_post_thumbnail() ) {
    $image_count++;
}

foreach ( $attachment_ids as $attachment_id ) {
    $image_link = wp_get_attachment_url( $attachment_id );
    if ( ! $image_link )
        continue;
    $image_count++;
}

?>
<div  style="overflow:hidden; height: 0; width: 0;">
<div class="woocommerce-product-gallery"></div>
</div>

<div class="woocommerce-product-gallery__wrapper">
 <?php if($logancee_options['productpage-image-zoom'] != 2) { ?>
            <script type="text/javascript">
                 (function($) {
                     $(document).ready(function(){
                          if($(window).width() > 992) {
                             <?php if($logancee_options['productpage-image-zoom'] == 1) { ?>
                                 $('#image').elevateZoom({
                                     zoomType: "inner",
                                     cursor: "crosshair",
                                     zoomWindowFadeIn: 500,
                                     zoomWindowFadeOut: 750
                                 });
                             <?php } else if($logancee_options['productpage-image-zoom'] == 0) { ?>
                                 $('#image').elevateZoom({
                                     zoomWindowFadeIn: 500,
                                     zoomWindowFadeOut: 500,
                                     zoomWindowOffetx: 20,
                                     zoomWindowOffety: -1,
                                     cursor: "crosshair",
                                     lensFadeIn: 500,
                                     lensFadeOut: 500,

                                 });
                              <?php } else if($logancee_options['productpage-image-zoom'] == 3) { ?>
                                $('#image').elevateZoom({
                                     zoomWindowFadeIn: 500,
                                     zoomWindowFadeOut: 500,
                                     zoomWindowOffetx: 20,
                                     zoomWindowOffety: -1,
                                     cursor: "crosshair",
                                     lensFadeIn: 500,
                                     lensFadeOut: 500,
                                     zoomType				: "lens",
                                     lensShape : "round",
                                 });
                             <?php } ?>

                             var z_index = 0;
                              $('.thumbnails a, .thumbnails-carousel a').click(function(e) {
                                 $(this).attr('data-rel', '#')
                                 $('.thumbnails, .thumbnails-carousel').find('a[href="'+$('#ex1').attr('href') +'"]').attr('data-rel', 'prettyPhoto[product-gallery]')

                                  var smallImage = $(this).attr('data-image');
                                  var largeImage = $(this).attr('data-zoom-image');
                                 var ez =   $('#image').data('elevateZoom');
                                 $('#image').attr('srcset', '')
                                 $('#ex1').attr('href', largeImage);
                                  if(typeof ez !== 'undefined'){
                                      ez.swaptheimage(smallImage, largeImage);
                                  }
                                 z_index = $(this).index('.thumbnails a, .thumbnails-carousel a');

                                 return false;
                             });

                         }
                     });


                })(jQuery)
            </script>
            <?php } ?>
            <script type="text/javascript">
                (function($) {
                    $(document).ready(function(){
                        $( ".single_variation_wrap" ).on( "show_variation", function ( event, variation ) {
                            var image = variation.image;
                            var smallImage = image.thumb_src;
                            var largeImage = image.src;

                            $('#ex1').attr('href', largeImage);
                            $('#ex1 img').attr('srcset', image.srcset);
                            $('#ex1 img').attr('src', largeImage);

                            var ez =   $('#image').data('elevateZoom');
                            console.log(ez);
                            if(typeof ez != 'undefined'){
                                ez.swaptheimage(smallImage, largeImage);
                            }
                            
                            setTimeout(function () {
                            var additionalImages = [];
                            var $additionalImages = $('.woocommerce-product-gallery--with-images .woocommerce-product-gallery__wrapper figure');
                            $additionalImages.each(function(e, value) {
                                additionalImages.push({
                                    src: $(value).children('img').attr('src'),
                                    thumb: $(value).attr('data-thumb')
                                })
                            });

                            var thumbnailHtml = '<div class="thumbnails thumbnails-carousel owl-carousel">';
                            for (var i = 0; i < additionalImages.length; i++) {
                                thumbnailHtml += '<div class="item"><a href="' + additionalImages[i].src + '" class="zoom" data-image="' + additionalImages[i].src + '" data-zoom-image="' + additionalImages[i].src + '" rel="prettyPhoto[product-gallery]" data-rel="prettyPhoto[product-gallery]">' + '<img src="' + additionalImages[i].thumb + '" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"></a></div>';
                            }
                            thumbnailHtml += '</div>';
                            console.log(thumbnailHtml);
                            
                            $('.overflow-thumbnails-carousel').html(thumbnailHtml);
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
                            
                            $('.thumbnails a').click(function (e) {
                                e.preventDefault();
                                $this = $(this);
                                console.log($this);
                                console.log('foo');
                                console.log($this.attr('href'));
                                var largeImage = $this.attr('href');
                                //$('#ex1 img').attr('srcset', image.srcset);
                                $('#ex1').attr('href', largeImage);
                                $('#ex1 img').attr('srcset', '');
                                $('#ex1 img').attr('src', largeImage);
                            });

                            $('.thumbnails a, .thumbnails-carousel a').click(function(e) {
                                 $(this).attr('data-rel', '#')
                                 $('.thumbnails, .thumbnails-carousel').find('a[href="'+$('#ex1').attr('href') +'"]').attr('data-rel', 'prettyPhoto[product-gallery]')

                                  var smallImage = $(this).attr('data-image');
                                  var largeImage = $(this).attr('data-zoom-image');
                                 var ez =   $('#image').data('elevateZoom');
                                 $('#image').attr('srcset', '')
                                 $('#ex1').attr('href', largeImage);
                                  if(typeof ez !== 'undefined'){
                                      ez.swaptheimage(smallImage, largeImage);
                                  }
                                 z_index = $(this).index('.thumbnails a, .thumbnails-carousel a');

                                 return false;
                             });
                            
                        $('.popup-gallery a').prettyPhoto();
                        $('.thumbnails a, .thumbnails-carousel a').unbind('click.prettyphoto');
                        $('.thumbnails, .thumbnails-carousel').find('a[href="' + $('#ex1').attr('href') + '"]').attr('rel', '#');
                            }, 2500);
                        } );
                    });

                    $(window).load(function(){
                        $('.popup-gallery a').prettyPhoto();
                        $('.thumbnails a, .thumbnails-carousel a').unbind('click.prettyphoto');
                        $('.thumbnails, .thumbnails-carousel').find('a[href="' + $('#ex1').attr('href') + '"]').attr('rel', '#')
                    });

                })(jQuery)
            </script>


            <?php $image_grid = 6;

            if ($logancee_options['productpage-image-size'] == 1) {
                $image_grid = 4;
            }

            if ($logancee_options['productpage-image-size'] == 3) {
                $image_grid = 8;
            }
            ?>
            <div class="col-md-6 images ">
                <div class="row popup-gallery woocommerce-product-gallery__image">

	<?php
		if ( has_post_thumbnail() ) {

                $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'shop_single', false);
                list($src, $width, $height) = $image;

                $image_ratio = ($width == 0) ? 1 : $height / $width;
                if ($image_ratio == 0)
                    $image_ratio = 1;

                $image_title         = esc_attr( get_the_title( get_post_thumbnail_id() ) );
                $image_link          = wp_get_attachment_url( get_post_thumbnail_id() );
                $image               = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
                    'title' => $image_title,
                    'id' => 'image',

                    'class' => 'attachment-shop_single wp-post-image product-image-' . $product->id,
                    'data-zoom-image' => $image_link,
			) );




                ?>
                        <?php if (($logancee_options['productpage-image-zoom'] != 2) && $logancee_options['productpage-image-additional'] == 2) { ?>
                            <div class="col-sm-2">
                                <?php do_action( 'woocommerce_product_thumbnails' ); ?>
                          </div>
			      	    <?php } ?>

				      <div class="woocommerce-product-gallery__image--placeholder col-sm-<?php if($logancee_options[ 'productpage-image-additional' ] != 1) { echo 10; } else { echo 12; } ?>">
				      	<?php if ($image) { ?>
					      <div class="product-image images <?php if($logancee_options[ 'productpage-image-zoom'] != 2) { if($logancee_options[ 'productpage-image-zoom' ] == 1) { echo 'inner-cloud-zoom'; } else { echo 'cloud-zoom'; } } ?>">

                            <?php $class = ($logancee_options['productpage-image-zoom'] == 2) ? 'popup-image' : 'open-popup-image'; ?>
                            <?php  echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a  id="ex1" href="%s" itemprop="image" rel="prettyPhoto[product-gallery]" class=" zoom woocommerce-main-image '.$class.'" >%s</a>', $image_link, $image ), $post->ID ); ?>
                          </div>
					  	 <?php } else { ?>
					  	 <div class="product-image  images">
					  	 	 <?php  echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), esc_html__( 'Placeholder', 'woocommerce' ) ), $post->ID ); ?>
					  	 </div>
					  	 <?php } ?>
				      </div>
                        <?php if (($logancee_options['productpage-image-zoom'] != 2) && $logancee_options['productpage-image-additional'] == 3) { ?>
                            <div class="col-sm-2">
                                <?php do_action( 'woocommerce_product_thumbnails' ); ?>
                            </div>
                        <?php } ?>

                <?php

		} else {

                echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), esc_html__( 'Placeholder', 'woocommerce' ) ), $post->ID );

		}
        ?>

            <?php if ($logancee_options['productpage-image-zoom'] != 2 && $logancee_options['productpage-image-additional'] == 1):?>
            <div class="col-sm-12">
                <?php do_action( 'woocommerce_product_thumbnails' ); ?>
            </div>
            <?php endif; ?>
            </div>
        </div>
</div>