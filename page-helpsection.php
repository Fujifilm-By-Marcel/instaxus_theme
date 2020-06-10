<?php /* Template Name: Help Section Template */ ?>

<?php get_header('smaller'); ?>
<?php
    $logancee_options = logancee_get_options();

    $post_layout = $logancee_options['layout-type-single-post'];
    $blog_layout = $logancee_options['layout-type-blog'];

    $post_layout = (isset($_GET['layout-type-single-post'])) ? $_GET['layout-type-single-post'] : $post_layout;
    $blog_layout = (isset($_GET['layout-type-blog'])) ? $_GET['layout-type-blog'] : $blog_layout;

    $wrap_class = '';
    $post_class = 'post';

    if($logancee_options['blog-article_list_template'] == 'grid_3_columns'){
        $post_class .= ' post-with-3-columns ';
    }

    ?>

	<div id="primary">
		<?php include 'faq-searchform.php'; ?>

		<?php if (get_field('enabled_videos')): ?>
			<div class="bg-dark-grey">
				<div class="container">
					<div class="video-slider">
						<?php  if( have_rows('video_slider') ):

								// loop through the rows of data
							while ( have_rows('video_slider') ) : the_row(); ?>


								<div class="col-md-6">
									<button class="thumbnail-wrap" data-toggle="modal" data-target="#videoPlayer<?php echo $a++; ?>" style="background-image: url(<?php the_sub_field('thumbnail'); ?>);">
										<div class="play-button"><img src="/wp-content/themes/Instax/images/play-button.png" alt=""></div>
										<p class="video-title"><?php the_sub_field('title'); ?></p>
									</button>
								</div>

							<?php endwhile;
							else :
						endif; ?>
					</div>
				</div>
			</div>
			<?php  if( have_rows('video_slider') ):
				// loop through the rows of data
				while ( have_rows('video_slider') ) : the_row(); ?>

				<div class="modal fade video-player" id="videoPlayer<?php echo $b++; ?>" tabindex="-1" role="dialog" aria-labelledby="video" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header border-0">
								<div type="button" class="close" data-dismiss="modal" aria-label="CloseVideo">
									<span aria-hidden="true">X</span>
								</div>
							</div>
							<div class="modal-body">
								<div class="video-banner">
									<iframe class="faq-video" width="560" height="315" src="https://www.youtube.com/embed/<?php the_sub_field('video_source'); ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php endwhile;
				else :
				endif; ?>
		<?php endif; ?>

		<div class="container-fluid faq-tabs">
			<?php echo do_shortcode('[features]'); ?>
		</div>
		<div class="container">
			<?php echo the_content(); ?>
		</div>
		<!--
		<div class="container">
			<h5 class="text-center">NEED MORE HELP?</h5>
			<div class="row">
				<div class="col-md-4 text-center">
					<a href="https://en-gb.facebook.com/instaxHQ/" target="_blank" class="bg-lightgrey hover-dgrey text-dark w-100 p-3 mb-3 mw-300 m-auto d-block">
						<img class="float-left" src="/wp-content/themes/Instax/images/facebook-icon.png" alt="">
						ASK ON FACEBOOK
					</a>
				</div>
				<div class="col-md-4 text-center">
					<a href="https://twitter.com/intent/tweet?text=@instaxHQ" target="_blank" class="bg-lightgrey hover-dgrey text-dark w-100 p-3 mb-3 mw-300 m-auto d-block">
						<img class="float-left" style="margin-top: 2px;" src="/wp-content/themes/Instax/images/twitter-icon.png" alt="">
						TWEET US
					</a>
				</div>
				<div class="col-md-4 text-center">
					<a href="/contact" class="bg-lightgrey hover-dgrey text-dark w-100 p-3 mw-300 m-auto d-block">
						<img class="float-left" style="margin-top: 4px" src="/wp-content/themes/Instax/images/email-icon.png" alt="">
							EMAIL US
					</a>
				</div>
			</div>
		</div>
		-->
	</div><!-- #primary -->
<script>
	// Show the first tab and hide the rest
	jQuery('#tabs-nav li:first-child').addClass('active');
	jQuery('.tab-content').hide();
	jQuery('.tab-content:first').show();

	// Click function
	jQuery('#tabs-nav li').click(function(){
	jQuery('#tabs-nav li').removeClass('active');
	jQuery(this).addClass('active');
	jQuery('.tab-content').hide();
	
	var activeTab = jQuery(this).find('a').attr('href');
	jQuery(activeTab).fadeIn();
	return false;
	});
</script>

<?php get_footer(); ?>