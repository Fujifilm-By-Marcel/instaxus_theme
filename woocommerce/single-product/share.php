<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/share.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_share' ); // Sharing plugins can hook into here ?>


<?php
$post = logancee_get_post();

if ( ! $post->post_excerpt ) {
	return;
}

?>
<h2 class="product-name mobile-only"><?php the_title(); ?></h2>
<div itemprop="description" class="description mobile-only desc std">
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
</div>

<div class="below-variants">
<div class="col-md-12"> 
    <?php 
    if( get_field('wtb_class') != "" ){
        $buynowid = strtolower(str_replace(' ', '', get_field('wtb_class')));
    }
    else{
        $buynowid = strtolower(str_replace(' ', '', get_the_title('', '', false)));
    }
    ?>
            <div class="col-md-4 nopadding">
                <a href="#" id="buy-now" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-square blue-cta wtb-pop-up-buynowid-<?php echo $buynowid; ?>">BUY NOW</a>
            </div>
            <div class="row">
                <div class="custom-socials-block">
					<style>
						.spread-the-word{font-weight: 500 !important;padding: 8px 4px;}
						@media (max-width:1000px){
							.spread-the-word{text-align:center;}
						}
					</style>
                    <!--<div class="col-md-12">
                        <p class="spread-the-word">Spread the word</p>
                    </div>-->
                    <div class="col-md-12">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Single post sidebar") ) : ?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.5.0/jquery.flexslider-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettyPhoto/3.1.6/js/jquery.prettyPhoto.js"></script>
<script>
jQuery(document).ready(function(e) {
    jQuery('.vertical-slider').flexslider({
		animation: "slide",
		direction: "vertical", 
		controlNav: false, 
		directionNav: false,
		useCSS: false,
		slideshow: true,
		slideshowSpeed: 1400,
		randomize: true,
	});
	
	jQuery().mousemove(function(e){
        var parentOffset = $(this).parent().offset();
        var relativeXPosition = (e.pageX - parentOffset.left); //offset -> method allows you to retrieve the current position of an element 'relative' to the document
        var relativeYPosition = (e.pageY - parentOffset.top);
        $("#header2").html("<p><strong>X-Position: </strong>"+relativeXPosition+" | <strong>Y-Position: </strong>"+relativeYPosition+"</p>")
    }).mouseout(function(){
        $("#header2").html("<p><strong>X-Position: </strong>"+relativeXPosition+" | <strong>Y-Position: </strong>"+relativeYPosition+"</p>")
    });
});

</script>
</div>