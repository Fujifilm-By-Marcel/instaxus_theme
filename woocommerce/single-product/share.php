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
    <div class="shortcode shortcode-custom_block ">
        <?php 
        $i = 0;
        if( have_rows('top_video_buttons') ):
        while( have_rows('top_video_buttons') ):    
        the_row();  
        $i++;
        ?>
        <div class="vc_row wpb_row vc_row-fluid">
            <div class="video_popup_trigger_wrap wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="wpb_text_column wpb_content_element ">
                            <div class="wpb_wrapper">
                                <div id="watch-video">
                                    <span class="modal-opener pum-trigger" data-do-default="" style="cursor: pointer;" data-id="myModal-topVideo-<?php echo $i ?>"><?php the_sub_field('button_text'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper"><div class="vc_empty_space" style="height: 18px"><span class="vc_empty_space_inner"></span></div></div></div></div></div>
        <?php 
        endwhile;
        endif;      
        ?>
    </div>
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
</div>


<div class="below-variants">
<div class="col-md-12"> 
            <?php if( get_field('buy_now_text') != "" && get_field('buy_now_iframe_src') != "" ): ?>
            <div class="col-md-4 nopadding">
                <a href="#" id="buy-now" class="modal-opener vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-square blue-cta" data-id="myModal-buynow"><?php the_field('buy_now_text'); ?></a>
            </div>            
            <div id="myModal-buynow" class="modal">
                <div class="modal-content">
                    <div class="close" onclick="closeModal()">
                        <span class="cursor">&times;</span>
                    </div>
                    <div class="wtb-iframe"><iframe loading="lazy" src="<?php the_field('buy_now_iframe_src') ?>" frameborder="0" scrolling="no"></iframe></div>
                </div>
            </div>
            <?php endif ?>
            <?php if( get_field('buy_now_alternate_text') ){  ?>
            <p><?php the_field('buy_now_alternate_text'); ?></p>            
            <?php } ?>
            <div class="row">
                <div class="custom-socials-block">
					<style>
						.spread-the-word{font-weight: 500 !important;padding: 8px 4px;}
						@media (max-width:1000px){
							.spread-the-word{text-align:center;}
						}
					</style>
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