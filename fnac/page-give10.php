<?php /* Template Name: page-give10 */  

set_time_limit(300);
function page_my_scripts(){
	wp_enqueue_style('owl-car', get_stylesheet_directory_uri().'/fnac/OwlCarousel2-2.3.4/assets/owl.carousel.min.css',array(),'1.0.0');	
	wp_enqueue_style('owl-car-theme', get_stylesheet_directory_uri().'/fnac/OwlCarousel2-2.3.4/assets/owl.theme.default.css',array(),'1.0.0');	
	wp_enqueue_script('owl-car-script', get_stylesheet_directory_uri().'/fnac/OwlCarousel2-2.3.4/owl.carousel.min.js', array(), '1.0.0', true);
	
	wp_enqueue_script('jquery-validate', get_stylesheet_directory_uri().'/fnac/jquery-validation-1.19.1/jquery.validate.min.js', array(), '1.0.0', true);
	wp_enqueue_script('jquery-validate-additional', get_stylesheet_directory_uri().'/fnac/jquery-validation-1.19.1/additional-methods.min.js', array(), '1.0.0', true);
	
	wp_enqueue_style('lightbox-give10', get_stylesheet_directory_uri().'/fnac/lightbox2-2.11.1/css/lightbox.min.css',array(),'1.0.0');	
	wp_enqueue_script('lightbox-give10', get_stylesheet_directory_uri().'/fnac/lightbox2-2.11.1/js/lightbox.min.js', array(), '1.0.0', true);
	
	wp_enqueue_style('give10-form', get_stylesheet_directory_uri().'/fnac/css/give10-form.css',array(),'1.0.6');	
}
add_action( 'wp_enqueue_scripts', 'page_my_scripts' );
get_header(); ?>

<style>
	.s-transparent-box{
		background:transparent !important;
		position: relative;
		top: -50px;
	}
	.s-transparent-box h1{
		color: #f266bf !important; 
	}

	.s-transparent-box p{
		color:#001e62  !important;
	}

	.center-column{
		padding-top:0;
	}
	.container-fluid {
		padding-right: 15px;
		padding-left: 15px;
		margin-right: auto;
		margin-left: auto;
	}

	.background.featured-image{
		background-color:#ffd841;

	}

	.social-float-left {
		float: left;
		margin-right: 10px;
	}

	.videoWrapper {
		position: relative;
		padding-bottom: 56.25%; /* 16:9 */
		padding-top: 25px;
		height: 0;
	}
	.videoWrapper iframe {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}
	.colors-row-1, .colors-row-1 p{
		color: #fff !important;
	}

	.owl-carousel .owl-stage {
	  display: flex;
	  align-items: center;
	}

	.marker{z-index:0;position:relative;}
	@media (max-width:1199px){
		.marker{z-index:1;}
	}


	.owl-prev span, .owl-next span{
		color:black;
	}

	.loader{
		background-color:#fff;
		width:100%;
		height:100%;
		z-index:9999999999;
		text-align:center;	
		position:fixed;
		top:0;
	}
	.loader .loadinginfo{
		margin:auto;
		top:50%;
		transform:translateY(-50%);
		position:relative;
	}	
	#lightboxOverlay{
		z-index: 9999998;
	}	
	#lightbox{
		z-index: 9999999;
	}
	
	#title-page{
		font-size: 50px !important;
	}
	.tagline{
		font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
		font-size: 35px;
		font-weight: bold;
	}
	
	.anchor-div{
		position:relative;
		top:-170px;
	}	
	@media (max-width:1159px){
		.anchor-div{
			position:relative;
			top:-80px;
		}	
	}
	
	.owl-theme .owl-nav{
		margin-top: 0;
	}
	
	.owl-theme .owl-prev, .owl-theme .owl-next{
		position: absolute;
		top: 50%;
		transform: translateY(-50%);
		margin:0 !important;
	}
	
	.owl-theme .owl-prev svg, .owl-theme .owl-next svg{
		padding: 10px;
	}
	
	.owl-theme .owl-prev{
		left:0;
	}
	.owl-theme .owl-next{
		right:0;
	}
	
	.owl-theme .owl-nav [class*='owl-']:hover {
		background: none;		
	}
	
	.owl-theme .owl-prev svg:hover{
		background:rgba(0,0,0,.75)
	}

	.owl-theme .owl-next svg:hover{
		background:rgba(0,0,0,.75)
	}
	.input-container label{
		display: inline;
	}

</style>

<div class="loader">
	<div class="loadinginfo">
		<img src="<?php echo get_stylesheet_directory_uri().'/fnac/img/ajax-loader.gif' ?>" >
		<p><?php the_field('processing_text'); ?></p>
	</div>
</div>

<div id="primary">		
	<div class="container-fluid">
		<?php if( have_rows('section_1') ): ?>
		<?php while( have_rows('section_1') ): the_row(); ?>
		<div class="row colors-row-1" style="background-color: #001e62 !important;padding:50px 0;">
			<div class="col-12 col-md-8 col-lg-6 col-md-push-2 col-lg-push-0 text-left" style="margin:10px 0 20px; overflow:hidden;">
				
				<div class="center-vertically" style="position:relative;">				
				<div>
				
				<div style="margin-bottom:20px;">
					<h2 class="mgt-header-block-title text-font-weight-default"><?php the_sub_field('header') ?></h2>
					<?php the_sub_field('text') ?>
				</div>
				
				<?php if( have_rows('social') ): ?>
				<?php while( have_rows('social') ): the_row(); ?>
				<div class="wpb_single_image wpb_content_element vc_align_center   social-float-left">					
				<figure class="wpb_wrapper vc_figure">
				<a href="<?php the_sub_field('link') ?>" target="_blank" class="vc_single_image-wrapper   vc_box_border_grey"><img width="40" height="41" src="<?php the_sub_field('image') ?>" class="vc_single_image-img attachment-full" title="<?php the_sub_field('title') ?>"></a>
				</figure>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
				
				</div>
				</div>

			</div>
			<?php if( have_rows('video') ): ?>
			<?php while( have_rows('video') ): the_row(); ?>
			<div class="col-12 col-md-8 col-lg-6 col-md-push-2 col-lg-push-0 text-center">
				
				<div class="videoWrapper"><iframe loading="lazy" title="<?php the_sub_field('title'); ?>" src="<?php the_sub_field('src'); ?>" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen=""></iframe></div>
				
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
			
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		
		
		<?php
		$searchSection = get_field('search_section');		
		$args = array( 'post_type' => 'give10_submissions');
		$loop = new WP_Query( $args );
		if ($loop->have_posts() ):
		?>	
		<div class="row" style="background-color: #685bc7 !important;padding:50px 0;color: #d9ffff !important;">
			<div class="col col-12 col-md-8 col-md-push-2 text-left">
				<?php echo $searchSection['main_header'] ?>			
				<div style="background: rgba(0,0,0,.5);">
					<div class="owl-carousel owl-theme" style="margin:20px 0">
						<?
						while ( $loop->have_posts() ) : $loop->the_post();						
							$theGallery = get_field('gallery', get_the_ID());
							foreach( $theGallery as $value){			
								$image_attributes = wp_get_attachment_image_src( $value['id'] , 'medium' );							
								if ( $image_attributes ) { 
								?>
								<a href="<?php echo wp_get_attachment_image_src( $value['id'] , 'large' )[0]; ?>" data-lightbox="submissions">
									<div style="width:<?php echo $image_attributes[1]; ?>px">
										<img class="owl-lazy" data-src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>" />
									</div>
								</a>
								<?php 
								}
							}
						endwhile;
						?>				
					</div>				
				</div>
				<?php echo $searchSection['search_box_header'] ?>
				<form action="<?php echo $searchSection['search_page'] ?>" method="get">
					<div class="input-container">
						<label for="platform">Search by</label><br />
						<select name="platform" id="platform">
							<option value="instagram">Instagram Handle</option>
							<option value="twitter">Twitter Handle</option>
						</select>
					</div>
					<div class="input-container">
						<label for="handle">Handle</label><br />
						<input type="text" id="handle" name="handle" required>
					</div>
					<div class="input-container">
						<input type="submit" />
					</div>
				</form>
			</div>
		</div>
		<?php endif; ?>
		
				
		
		<?php 
		wp_reset_query();
		if( have_rows('form_section') ): ?>
		<?php while( have_rows('form_section') ): the_row(); ?>
		<div class="row" style="background-color: #d9ffff !important;padding:50px 0;color: #000 !important;">
			<div id="give10form" class="anchor-div"></div>
			<div class="col col-12 col-md-8 col-md-push-2 text-left">
				<h2><?php the_sub_field('header') ?></h2>
				<?php include 'give10-form.php' ?>
				<?php outputGive10Form(); ?>
				
				<div class="give10form"></div>
			</div>
		</div>		
		<?php endwhile; ?>
		<?php endif; ?>
		
		
		
		
		
	</div><!-- #container -->
</div><!-- #primary -->
<div class="marker"></div>
<script>
jQuery(document).ready(function( $ ) {
		
	setInterval(function() {
	   $(".loadinginfo").html("<p><?php echo get_field('processing_failed_text'); ?></p>");
	}, 300000);

	$.ajax({
		url: "<?php echo get_stylesheet_directory_uri() ?>/fnac/give10-form.php",
		cache: false
	}).done(function( html ) {
		$( ".give10form" ).append( html );
	});

	
	function verticallyCenter(){
		thediv = $('.center-vertically');
		thechild = $(thediv.children()[0]);
		theparent = thediv.parent();
		thechildheight = thechild.height();
		theparentheight = theparent.height();
		thenextheight = theparent.next().height();
		themarker = $(".marker").css("z-index"); //themarker is 1 when less than 1200px
		
		//console.log("theparent: "+theparentheight);
		//console.log("thenextheight: "+thenextheight);
		//console.log("themarker: "+themarker);
		
		if( thechildheight <=  thenextheight && themarker != "1" ){			
			thediv.css("position","relative");
			thechild.css("position","absolute");
			thechild.css("top","50%");
			thechild.css("transform","translateY(-50%)");
			
			thediv.css("height", thenextheight);
		}
		else{			
			thediv.removeAttr("style")
			thechild.removeAttr("style")			
		}
	}
	
	$(window).resize(function(){
			verticallyCenter();
	});

	$(window).load(function(){
			verticallyCenter();
	});
		
	$('.owl-carousel').owlCarousel({
		loop:true,
		center: true,
		nav:true,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		lazyLoad:true,
		dots:false,
		autoWidth:true,
		margin:10,
		items:5,
		navText : ['<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 41 55"><path fill="none" fill-rule="evenodd" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="5" d="M37.564 3L3 29.865l34.564 22.326"></path></svg>','<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 41 55"><path fill="none" fill-rule="evenodd" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="5" d="M3 52.191l34.564-26.865L3 3"></path></svg>'],
		responsive:{
			0:{
				items:1
			},
			600:{
				items:3
			},
			1000:{
				items:5
			}
		}
	});
	
});

</script>
<?php get_footer(); ?>