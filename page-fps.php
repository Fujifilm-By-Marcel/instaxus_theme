<?php
/*
Template Name: Page-fps
*/
function page_myfujifilmlegacy_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/fnac/css/materialize-gridonly.css',array(),'1.0.0');	
	wp_enqueue_style('fps-css', get_stylesheet_directory_uri().'/fnac/css/fps.css',array(),'1.0.7');	
}
function page_myfujifilmlegacy_scripts(){
	
}
add_action( 'wp_enqueue_scripts', 'page_myfujifilmlegacy_styles' );
//add_action( 'wp_enqueue_scripts', 'page_myfujifilmlegacy_scripts' );

 get_header(); 
 get_sidebar(); 
 ?>

<style>
 	/* responsive banner */
	@media (min-width:601px){
		.spotlight-text{
			background:url('<?php echo wp_get_attachment_image_url( get_field('desktop_banner'), 'full' ) ?>');
			background-position:center;
			background-repeat:no-repeat;
		}
	}
	@media (max-width:600px){
		.spotlight-text{
			background:url('<?php echo wp_get_attachment_image_url( get_field('mobile_banner'), 'full' ) ?>'), center;
			background-position:center;
			background-repeat:no-repeat;
		}	
	}
	.info-section ol{
		list-style: decimal;
	}
	ol[type='a'] {
	  list-style-type: lower-alpha;
	}
	ol[type='i'] {
	  list-style-type: lower-roman;
	}
	.info-section ul{
    	list-style: disc;
	}
	.info-section ol, .info-section ul{
	    padding-left: 1em;
	    padding-bottom:1em;
	}
	.info-section ol ol, .info-section ul ul{
		padding-bottom:0;
	}
	.info-section ol p, .info-section ul p{
		font-size: 100%;
		margin-bottom:0.625em;
	}	
	.center-column{
		padding-top: 0;
	}
	.breadcrumb{
		display: none;
	}
	.main-content .col-xs-1, .main-content .col-xs-2, .main-content .col-xs-3, .main-content .col-xs-4, .main-content .col-xs-5, .main-content .col-xs-6, .main-content .col-xs-7, .main-content .col-xs-8, .main-content .col-xs-9, .main-content .col-xs-10, .main-content .col-xs-11, .main-content .col-xs-12, .main-content .col-sm-1, .main-content .col-sm-2, .main-content .col-sm-3, .main-content .col-sm-4, .main-content .col-sm-5, .main-content .col-sm-6, .main-content .col-sm-7, .main-content .col-sm-8, .main-content .col-sm-9, .main-content .col-sm-10, .main-content .col-sm-11, .main-content .col-sm-12, .main-content .col-sm-25, .main-content .col-md-1, .main-content .col-md-2, .main-content .col-md-3, .main-content .col-md-4, .main-content .col-md-5, .main-content .col-md-6, .main-content .col-md-7, .main-content .col-md-8, .main-content .col-md-9, .main-content .col-md-10, .main-content .col-md-11, .main-content .col-md-12, .main-content .col-lg-1, .main-content .col-lg-2, .main-content .col-lg-3, .main-content .col-lg-4, .main-content .col-lg-5, .main-content .col-lg-6, .main-content .col-lg-7, .main-content .col-lg-8, .main-content .col-lg-9, .main-content .col-lg-10, .main-content .col-lg-11, .main-content .col-lg-12 {
	padding: 0;
	}
</style>
<section class="main">
	<div class="spotlight-text">
		<div class="container">
			<div class="row">
				<div class="col s12 m6 push-m6">
					<div>			
						<h1><?php the_field('h1') ?></h1>
						<p><?php the_field('spotlight_text') ?></p>					
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php	
	if( have_rows('info_section') ):	 	
	    while ( have_rows('info_section') ) : the_row();
	    	?>	
	    	<section class="info-section" style="background:<?php the_sub_field('background_color') ?>">
				<div class="container">
					<div class="row" style="position:relative;">
						<div class="col s12 m8">
							<h2><span><?php the_sub_field('heading') ?></span></h2>
							<div style="color:<?php the_sub_field('text_color') ?>;"><?php the_sub_field('paragraph') ?></div>
						</div>						
							<?php
							if( have_rows('flexible_content') ):
							    while ( have_rows('flexible_content') ) : the_row();
							        if( get_row_layout() == 'image' ):
									?>
										<div class="col s12 m4">
										<img class="info-img" src="<?php echo wp_get_attachment_image_url( get_sub_field('image'), 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( get_sub_field('image'), 'full' ); ?>" >
										</div>
									<?php
							        elseif( get_row_layout() == 'button' ): 
									?>
										<div class="col s12 m4 push-m8 vertically-center" style="text-align:center;">
											<a href="<?php the_sub_field('button_link') ?>"><div class="button"><?php the_sub_field('button_text') ?></div></a>
										</div>
									<?php
							        endif;
							    endwhile;
							else :
							endif;
							?>
						</div>
					</div>
				</div>	
			</section>
			<?php
	    endwhile;
	else :
	endif;
	?>
	<?php	
	if( have_rows('footer') ):	 	
	    while ( have_rows('footer') ) : the_row();
	    	if (!get_sub_field('hide_section')) { 
	    	?>
	    	<section class="info-section footer-section" style="background:url('<?php 
	    		echo wp_get_attachment_image_url( get_sub_field('background_image'), 'full' ) 
	    		?>')" >
				<div class="container">
					<div class="row">
						<div class="col s12 m6 l8">
							<h2><span><?php the_sub_field('header') ?></span></h2>
							<div class="row">							
								<div class="col s12 m12 l6">
									<ul class="red-checkmark-list">
									<?php 
									$count = count(get_sub_field('bullets'));
									$counter = 0;
									$checkmarkimage = wp_get_attachment_image_url( get_sub_field('checkmark_image'), 'full' );
									if( have_rows('bullets') ):
									    while ( have_rows('bullets') ) : the_row(); $counter++;
									    ?>
										<li class="red-checkmark-bullet"><img src="<?php echo $checkmarkimage ?>"><div><span><?php the_sub_field('text'); ?></span></div></li>
										<?php 
										if($counter == floor($count/2) ){ 
										?>
									</ul>										
								</div>
								<div class="col s12 m12 l6">
									<ul class="red-checkmark-list">
										<?php 
										} 										
									    endwhile;
									else :
									endif;
									?>
									</ul>
								</div>														
							</div>							
						</div>
						<div class="col s12 m6 l4">
							<div class="sidebar-box">						
							<?php if( have_rows('sidebar_box') ): ?>
								<?php while( have_rows('sidebar_box') ): the_row(); ?>
								<h3><span><?php the_sub_field('header'); ?></span></h3>

								<div class="pricebox">
									<label><?php the_sub_field('label_1'); ?></label>
									<p class="price-highlight"><?php the_sub_field('text_1'); ?></p>
								</div>
								<div class="pricebox">
									<label><?php the_sub_field('label_2'); ?></label>
									<p class="price-highlight"><?php the_sub_field('text_2'); ?></p>
								</div>
								<a href="<?php the_sub_field('button_link'); ?>"><div class="button"><?php the_sub_field('button_text'); ?></div></a>
							    <?php endwhile; ?>
							<?php endif; ?>
							</div>
						</div>	
					</div>
				</div>	
			</section>
			<?php 
			}
	    endwhile;
	endif;
	?>
	<?php	
	if( get_field('contact')['header'] ):	 	
	    while ( have_rows('contact') ) : the_row();
	   	?>	
	   	<section class="info-section contact-section">
	   		<div class="container">
				<div class="row">
					<div class="col s12">
						<h2><?php the_sub_field('header'); ?></h2>
						<?php the_sub_field('contact_info'); ?>
					</div>
				</div>
			</div>
	   	</section>
	  	<?php
	    endwhile;
	endif;
	?>

</section>
<?php get_footer(); ?>