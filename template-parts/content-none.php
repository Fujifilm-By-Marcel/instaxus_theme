<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Instax
 */

?>

<section class="no-results not-found">

	<div class="page-content container">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<div class="narrow-container">
				<p><?php printf( wp_kses( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'logancee', array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
			</div>
		<!-- check if page is in the press hub category or is one of the press hub tags -->
		<?php elseif ( is_category($category = '297') or is_tag($tag = array('361','362','360')) or is_tag($tag = array('Printers articles', 'Film articles', 'Cameras articles'))  ): {  ?> 
			<?php include 'wp-content/themes/Instax/press-hub-sidebar.php'; ?>
			<div class="col-md-9">
				<p><?php esc_html_e( 'Sorry, but nothing in the Press Hub matched your search terms. Please try again.', 'logancee' ); ?></p>
				<!-- <div class="no-results-container">
					<div class="col-md-12">
						<form method="get" class="searchform" id="search form" action="/">	
							<div>
								<input type="text" value="" placeholder="SEARCH ARTICLES" name="s" id="s" />
								<input type="hidden" value="297" name="cat" id="scat" />
								
								<div class="press-search-wrap">
									<input type="submit" id="search_submit" name="Search" value=""/>
									<div class="press-submit fa fa-search"></div>
								</div>
							</div>
						</form>
					</div>
				</div> -->
			</div>
		<?php }
		else : ?>
			<div class="narrow-container">
				<p class="text-center"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'logancee' ); ?></p>
				<?php get_search_form(); ?>
			</div>
			

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
