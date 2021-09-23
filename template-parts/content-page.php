<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Instax
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'logancee' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php 
	if( have_rows('modals') ):
	while( have_rows('modals') ):	
	the_row();	
	?>
	<div id="myModal-<?php echo the_sub_field('modal_id') ?>" class="modal">
	    <div class="modal-content">
	        <div class="close" onclick="closeModal(true)">
	            <span class="cursor">&times;</span>
	        </div>
	        <?php if( get_current_blog_id() == 1 ){ ?>
	        	<div class="wtb-iframe">
	        		<iframe loading="lazy" data-src="<?php the_sub_field('iframe_src') ?>" frameborder="0" scrolling="no"></iframe>
	        	</div>
	        <?php } else { ?>
	        	<div class="wtb-iframe">
	        		<iframe loading="lazy" src="<?php the_sub_field('iframe_src') ?>" frameborder="0" scrolling="no"></iframe>
	        	</div>
	        <?php } ?>
	    </div>
	</div>
	<?php 
	endwhile;
	endif;		
	?>

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'logancee' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

