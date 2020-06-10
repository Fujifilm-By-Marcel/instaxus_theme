<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header('smaller'); ?>


<div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php include 'faq-searchform.php'; ?>	
			<div class="container">
				<div class="row">
					<div class="col-md-9 mt-3">
						<div class="px-2">
							<?php // The Query
								$args = [
									'posts_per_page' => 1000,
									'post_type'      => 'faqs',
									'post_title_like' => $s
								];
								$loop = new WP_Query($args);
								if ($loop->have_posts()) :
								while ($loop->have_posts()) : $loop->the_post(); ?>
									<div class="entry-content">
										<a href="<?php echo the_permalink(); ?>"><p class="mb-0"><strong><?php the_title(); ?></strong></p></a>
										<div class="tax-terms"><?php
											$terms = the_terms($id, $taxonomy="section", $before = "<div class='faq-section-tag'>", $sep = "", $after="</div>");
											echo $terms;  
										?></div>
										<p class="mb-0"><?php the_content(); ?></p>
									</div>
								<?php endwhile;
								else : ?>
								<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
								<?php
									get_search_form();

							endif; ?>
						</div>
					</div>
					<div class="col-md-3 mt-3">
						<?php include 'faq-sidebar.php'; ?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();?>