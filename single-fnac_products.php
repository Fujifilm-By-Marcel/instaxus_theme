<?php 

function page_my_scripts(){
	wp_enqueue_style('owl-car', get_stylesheet_directory_uri().'/fnac/OwlCarousel2-2.3.4/assets/owl.carousel.min.css',array(),'1.0.0');	
	wp_enqueue_style('owl-car-theme', get_stylesheet_directory_uri().'/fnac/OwlCarousel2-2.3.4/assets/owl.theme.default.css',array(),'1.0.0');	
	wp_enqueue_script('owl-car-script', get_stylesheet_directory_uri().'/fnac/OwlCarousel2-2.3.4/owl.carousel.min.js', array(), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'page_my_scripts' );
get_header();

?>

<?php
$logancee_options = logancee_get_options();



function printVariations(){
	if( have_rows('product_variations') ): $i = 0; ?>
		<div class="product-images">
		<?php while( have_rows('product_variations') ) : the_row(); $i++; ?>
			<div class="product-variation" data-id="<?php echo $i ?>" style="<?php if($i!=1) echo "display:none;"; ?> max-width: min(450px,100%);margin: auto;text-align:center">
	        	<?php printVariationImages(); ?>
	    	</div>
	    <?php endwhile; ?>
	    </div>
	<?php endif; 
}


function printVariationImages(){
	$product_images = get_sub_field('product_images');
	//echo "<pre>";
	//print_r($product_images[0]['image']);
	//echo "</pre>";

	$j = 0;
	foreach( $product_images as $image) {
		$j++;
		$image = $image['image'];
		?>
		<img style="<?php if($j!=1) echo "display:none;"; ?>" class="product-image" data-id="<?php echo $j; ?>" src="<?php echo $image['url'] ?>" alt="" width="<?php echo $image['width'] ?>" height="<?php echo $image['height'] ?>">
		<?php
	}
	echo "<div style='clear:both'></div>";
	$j = 0;
	echo "<div class='products-carousel owl-carousel owl-theme' >";
	foreach( $product_images as $image) {
		$j++;
		$sizes = $image['image']['sizes'];
		?>
		<img style="max-width: min(60px,100%);display:inline-block;" class="product-thumb" data-id="<?php echo $j; ?>" src="<?php echo $sizes['thumbnail'] ?>" alt="" width="<?php echo $sizes['thumbnail-width'] ?>" height="<?php echo $sizes['thumbnail-height'] ?>">
		<?php
	}
	echo "</div>";
}

function printColorVariationSelector(){
	if( have_rows('product_variations') ): $i = 0; ?>
		<div class="color-variation-selectors">
		<?php while( have_rows('product_variations') ) : the_row(); $i++; ?>
			<div class="color-variation-selector" data-id="<?php echo $i ?>" style="background-color:<?php the_sub_field("color"); ?>"></div>
	    <?php endwhile; ?>
	    </div>
	<?php endif; 
}
?>

<style>
/* Fix h1 styles */
.product-info .product-name {
	font-size:30px !important;	
	border-bottom:0;
	margin-bottom:0 !important;
}


.product-thumb{
	cursor: pointer;
}

.products-carousel.owl-carousel .owl-item {
    width: 80px !important;
}
.products-carousel.owl-carousel .owl-item .item {
    margin: 10px !important;
}

.color-variation-selectors{
	margin: 30px 15px 35px;
	overflow:hidden;
}
.color-variation-selector{
	width:30px;
	height:30px;
	float:left;
	margin-right:5px;
	cursor: pointer;
}

.product-center .vc_btn3.vc_btn3-size-md{
	font-size: 18px !important;
    padding: 16px !important;
    width: 100%;
    height: 60px;
}

.owl-stage{
	min-width:100%;
}

.product-info .product-image{
	overflow:hidden;
}
.owl-carousel{
	margin-top:none;
}
</style>


<div id="content" role="main">
    <?php wp_reset_postdata(); ?>
    <?php if (have_posts()) : the_post(); ?>


    <div class="container">
	    <div class="product-info product-layout-0">
	    	<div class="row">
	    		<div class="col-md-12">

	    			<!-- Product Gallery -->
	    			<div class="col-md-6 product-center clearfix">	    				
	    				<?php printVariations(); ?>	    				
	    			</div>
				    <div class="col-md-6 product-center clearfix">
					    <h1 class="product-name desktop-only"><?php the_title(); ?></h1>
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


						<h1 class="product-name mobile-only"><?php the_title(); ?></h1>
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


						<!-- Color variation selection -->
						<?php printColorVariationSelector(); ?>

							
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div style="clear:both;"></div>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> class="post">
    	<div class="container">
    		<div class="product-content-wrapper">
    			<div class="product-content">
    		        <?php the_content(); ?>         
    			</div>
    		</div>
    	</div>
    </div>
    <?php wp_reset_postdata();  ?>
    <?php endif; ?>
</div>
<script>
	jQuery(document).ready(function( $ ) {
		$('.product-thumb').click(function(){
			var variation = $($(this).closest('.product-variation'));
			variation.find('.product-image').hide();
			variation.find('.product-image[data-id='+$(this).data('id')+']').css('display','block');
			
			
		});	

		$('.color-variation-selector').click(function(){
			$('.product-variation').hide();
			$('.product-images').find('.product-variation[data-id='+$(this).data('id')+']').css('display','block');
			window.dispatchEvent(new Event('resize'));
			
		});	


		var $product_owl = $('.products-carousel.owl-carousel').owlCarousel({
			loop:false,
			nav:false,
			autoplay:false,
			lazyLoad:true,
			dots:false,
			items:5,
		});	
	});
</script>
<?php get_footer() ?>
