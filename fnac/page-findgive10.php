<?php /* Template Name: page-findgive10 */  ?>
<?php
function page_my_scripts(){
	wp_enqueue_style('give10-form', get_stylesheet_directory_uri().'/fnac/css/give10-form.css',array(),'1.0.0');	
	
	wp_enqueue_style('lightbox-give10', get_stylesheet_directory_uri().'/fnac/lightbox2-2.11.1/css/lightbox.min.css',array(),'1.0.0');	
	wp_enqueue_script('lightbox-give10', get_stylesheet_directory_uri().'/fnac/lightbox2-2.11.1/js/lightbox.min.js', array(), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'page_my_scripts' );
?>
<?php get_header(); ?>
<style>        
	.breadcrumb{
		display:none;
	}
	.container-fluid {
		padding-right: 15px;
		padding-left: 15px;
		margin-right: auto;
		margin-left: auto;
	}
	.s-transparent-box{
			background:transparent !important;
		}
	.s-transparent-box h1{
		color: #f266bf !important; 
	}

	.center-column{
		padding-top:0;
	}
	
	.text-color-row-1 p{
		color: #d9ffff !important;
	}
	.text-color-row-2 p{
		color: #001e62 !important;
	}
	#lightboxOverlay{
		z-index: 9999998;
	}	
	#lightbox{
		z-index: 9999999;
	}
	.row.image-gallery-container {
		margin: 20px 0;
	}
	
	.marker{position:relative;}
	@media (min-width:1200px){.marker{z-index:4;}}
	@media (max-width:1199px){.marker{z-index:3;}}
	@media (max-width:991px){.marker{z-index:3;}}
	@media (max-width:767px){.marker{z-index:2;}}
</style>

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5e18f16dedf3400012a4c106&product=inline-share-buttons" async="async"></script>

<div id="primary">		
	<div class="container-fluid">
	<?php 	
	$current_post_id = get_the_ID();
	$parent_id = wp_get_post_parent_id( $current_post_id );
	$post_list = [];
	$isValid = ( isset($_GET['platform']) && isset($_GET['handle']) );
	if( $isValid ) {
	?>
		<?php		
		
		$post_list = get_posts(array(
			'numberposts'	=> -1,
			'post_type'  => 'give10_submissions',
			'meta_key'		=> $_GET['platform'],
			'meta_value'	=> $_GET['handle'],
			'order' => "ASC",
		));		

		if( count($post_list) == 0 ){
			if(substr (  $_GET['handle'], 0 , 1 ) == "@" ){
				$handleTrimmed = str_replace("@", "", $_GET['handle']);		
			}				
			else{
				$handleTrimmed = "@".$_GET['handle'];		
			}			
			$post_list = get_posts(array(
				'numberposts'	=> -1,
				'post_type'  => 'give10_submissions',
				'meta_key'		=> $_GET['platform'],
				'meta_value'	=> $handleTrimmed,
				'order' => "ASC",
			));		
		}
		if( count($post_list) >0 ){
		?>
		<div class="row text-color-row-1" style="background-color: #685bc7 !important;padding:50px 0;color: #d9ffff !important;">
			<div class="col col-12 col-md-8 col-md-push-2 text-left">
				<?php 
				the_field('found_submissions_header', $current_post_id);				
				
			
				
				$counter = 0;
				foreach ( $post_list as $post ) {
					$counter++;
					//echo "<h3>Submission $counter</h3>";
					echo "<p style='font-size: 26px !important;font-weight: bold !important;'>".get_field('info', $post->ID, false)."</p>";
					$gallery = get_field('gallery', $post->ID);
					?>
					<div class="row image-gallery-container">
					<?php
					foreach( $gallery as $image){
						$image_attributes = wp_get_attachment_image_src( $image['id'] , 'medium' );							
						if ( $image_attributes ) { 
						?>
						<div class="col col-xs-6 col-sm-4 col-md-4 col-lg-3 text-center" style="margin-bottom:20px;">
							<a data-title="<a href='<?php echo get_attachment_link( $image['id'] ); ?>' target='_blank'><?php the_field('photo_share_cta', $current_post_id); ?></a>" href="<?php echo wp_get_attachment_image_src( $image['id'] , 'large' )[0]; ?>" data-lightbox="submission-<?php echo $counter ?>">
								<img src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>" />
							</a>
						</div>
						<?php 
						}
					}
					?>
					</div>
					<?php
					/*$form_section = get_field('form_section', $parent_id);
					$info_field_label = $form_section['info_field_label'];
					if( $form_section ){
						echo "<p>We asked: $info_field_label</p>";
						echo "<p>You wrote: ".get_field('info', $post->ID, false)."</p>";
					}*/
					echo "<hr>";	
				}
				the_field('share_cta', $current_post_id);
				?>
				<div style="margin:20px 0;" class="sharethis-inline-share-buttons"></div>
				<?php the_field('after_share_cta', $current_post_id); ?>
			</div>
		</div>	
		<?php			
		}		
	}		
	?>
	
	<?php wp_reset_postdata(); ?>
	
		<div class="row text-color-row-2" style="background-color: #d9ffff !important;padding:50px 0;color: #001e62 !important;">
			<div class="col col-12 col-md-8 col-md-push-2 text-left">
				
				<?php 
				$search_section = get_field('search_section');
				if( $isValid && count($post_list) >0 ){ 
					echo $search_section['found_message'];
				}else if( $isValid && count($post_list) <= 0  ){ 
					echo $search_section['no_matches_message'];
				}else if( !$isValid ){ 
					echo $search_section['default_message'];
				}	
				?>
				<form method="get">
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
	</div>
</div>
<div class="marker"></div>
<script>
jQuery(document).ready(function( $ ) {
	
	function clearLeft(){
		marker = $(".marker").css("z-index");
		containers = $(".image-gallery-container");
		for(i=0; i<containers.length; i++){
			mycontainer = $(containers[i]);
			cols =  mycontainer.find(".col");
			for(j=0; j<cols.length; j++){			
				mycol = $(cols[j]);				
				mycol.css("clear", "none");
				if(j%marker == 0){
					mycol.css("clear", "left");
				}
			}
		}		
	}
	
	$(window).resize(function(){
		clearLeft();
	});

	$(window).load(function(){
		clearLeft();
	});
		
});
</script>
<?php get_footer(); ?>