<?php /* Template Name: Help Subpage Template */ ?>

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
<?php 
    $section = $post_slug=$post->post_name;
?>
	<div id="primary">
		<?php include 'faq-searchform.php'; ?>
		
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="mt-3"><?php the_title(); ?></h2>
				
				</div>
			</div>
			<div class="row">
				<div class="col-md-9 mt-3">
					<div class="faq-category-wrap">
						<?php // The Query
							$args = [
								'posts_per_page' => 1000,
								'post_type'      => 'faqs',
								'order' => 'ASC',
								'tax_query' => array(  
									'relation' => 'AND',   
									  array(
										'taxonomy' => 'section',
										'field' => 'slug',                   
										'terms' => $section,  
										'include_children' => true,     
										'operator' => 'IN'         
									  ),  
									),
								];
							$loop = new WP_Query($args);
							if ($loop->have_posts()) :
							while ($loop->have_posts()) : $loop->the_post() ?>
								<div class="entry-content">
										<a href="<?php echo the_permalink(); ?>"><p class="mb-0"><strong><?php the_title(); ?></strong></p></a>
										<p class="mb-0"><?php the_content(); ?></p>
								</div>
							<?php endwhile;
							else : ?>
							<p><?php _e( 'Sorry, we\'re having trouble loading questions at the moment. Please try again later.', 'twentyseventeen' ); ?></p>
							<?php

						endif; ?>
					</div>
				</div>
				<div class="col-md-3 mt-3">
					<div class="px-2">
						<?php include 'faq-sidebar.php'; ?>
					</div>
				</div>
			</div>
		</div>
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