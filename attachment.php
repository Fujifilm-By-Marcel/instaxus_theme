<?php get_header('attachment') ?>

<?php
$logancee_options = logancee_get_options();

?>

<div id="content" role="main">

    <?php wp_reset_postdata(); ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> class="post">
        <div class="post-entry container">
            <div class="col-md-1 col-md-offset-1">
                <div class="share-wrap text-center">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Single post sidebar") ) : ?>
                    <?php endif;?>
                </div>
            </div>
            <div class="post-content clearfix col-md-8">
                <!--<h1 class="text-center border-bottom"><?php //the_title(); ?></h1>-->        
				<?php $image_size = apply_filters( 'wporg_attachment_size', 'large' ); 
				echo wp_get_attachment_image( get_the_ID(), $image_size ); ?>
				
            </div>
        </div>           
    </div>

    <?php wp_reset_postdata();  ?>

</div>


<?php get_footer() ?>
