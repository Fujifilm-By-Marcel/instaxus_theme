<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
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
	exit; // Exit if accessed directly
} 


$post = logancee_get_post();

if ( ! $post->post_excerpt ) {
	return;
}

?>
<div itemprop="description" class="description desktop-only desc std">
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


<?php 
$i = 0;
if( have_rows('top_video_buttons') ):
while( have_rows('top_video_buttons') ):	
the_row();	
$i++;
?>
<div id="myModal-topVideo-<?php echo $i ?>" class="modal">
    <div class="modal-content">
        <div class="close" onclick="closeModal(true)">
            <span class="cursor">&times;</span>
        </div>
        <div class="resp-container">
        	<iframe loading="lazy" class="resp-iframe" src="<?php the_sub_field('iframe_src') ?>" width="640" height="360" frameborder="0" allowfullscreen="true" allow="autoplay; fullscreen"></iframe>
    	</div>
    </div>
</div>
<?php 
endwhile;
endif;		
?>