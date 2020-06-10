<?php /* Template Name: Press Hub Template */ ?>

<?php get_header(); ?>
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
		<div class="container">
				<?php include 'press-hub-sidebar.php'; ?> <!-- get press hub sidebar -->
				<div class="col-md-9">
					<div class="posts press-posts-wrap posts-wrap <?php echo esc_attr($wrap_class) ?> <?php echo $logancee_options['blog-article_list_template']; ?> <?php if($logancee_options['blog-article_list_template'] == 'grid' || $logancee_options['blog-article_list_template'] == 'grid_3_columns'): ?> posts-grid <?php endif; ?> <?php if($logancee_options['blog-article_list_template'] == 'grid_3_columns'): ?> posts-3-columns-grid <?php endif; ?> clearfix">
					

					<?php 
					$big = 999999999; // need an unlikely integer
					$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
					$args = array(
						'cat' => '297',
						'posts_per_page' => 3,
						'paged' => $paged
					);
					$latestnews_query = new WP_Query( $args );

					if ( $latestnews_query->have_posts() ) : 
					
						while ( $latestnews_query->have_posts() ) : $latestnews_query->the_post();
						
					?>
						
						<div class="postWrapper post">
							<a href="<?php the_permalink(); ?>">
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
								<div class="photo-postwrap" style="background-image: url(<?php echo $image[0]; ?>);">    
									<div class="post-title-box">
										<div>
											<div class="title-blog"><h2><?php the_title(); ?></h2></div>
											<div class="postContent">
												<p><?php the_time('d/m/Y'); ?></p>
											</div>
										</div>
									</div>  
								</div> 
							</a>
						</div>
							
					<?php 
					
					endwhile; ?>
					<div class="pagination-results press-pagination">
						<?php 
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'prev_text'          => __('<'),
								'next_text'          => __('>'),
								'total' => $latestnews_query->max_num_pages
							) );
						?>
					</div>
					
					<?php else : ?>
					<p class="projects-error"><?php esc_html_e( 'Sorry, we\'re having trouble loading posts at the moment...' ); ?></p> 
					<?php endif; ?>
					
					

				  <?php wp_reset_postdata();  ?>
    				<?php wp_reset_query();  ?>

					</div>
				</div>
		</div><!-- container -->
		<div class="press-hub-sign-up container">
			<?php 

			while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
				<?php endwhile; // End of the loop. ?>
		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>
