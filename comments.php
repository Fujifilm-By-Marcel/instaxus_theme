<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Instax
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}


if ( comments_open() ) :
?>

<div id="comments" class="box box-no-advanced comments">

	<div class="container narrow-container">
            <div class="box-heading">
                <h3>JOIN THE CONVERSATION</h3>
                <!-- <p><strong>Please send me instax email updates and promotions</strong></p> -->
            </div>
            
            <div class="box-content">
                <div class="box box-no-advanced" id="reply-block">
                    <?php comment_form(); ?>
                </div>
                <div class="comments-list">
                    <?php
                       wp_list_comments('type=comment&callback=mytheme_comment');
                    ?>
                </div><!-- .comment-list -->

                <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                    <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'logancee' ); ?></h2>
                    <div class="nav-links">

                        <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'logancee' ) ); ?></div>
                        <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'logancee' ) ); ?></div>

                    </div><!-- .nav-links -->
                </nav><!-- #comment-nav-below -->
                <?php endif; // Check for comment navigation. ?>
            </div>

        <?php
            // If comments are closed and there are comments, let's leave a little note, shall we?
            if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
            <p class="no-comments">Sorry comments are closed!</p>
        <?php endif; ?>
        
            
    </div> <!-- container -->
</div><!-- #comments -->

<?php endif; ?>
