<?php get_header() ?>

<?php
$logancee_options = logancee_get_options();

?>

<div id="content" role="main">

    <?php wp_reset_postdata(); ?>
    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

    <?php if (have_posts()) : the_post(); ?>
    <?php
    $slideshow_type = get_post_meta($post->ID, 'slideshow_type', true);
    ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> class="post">
        <div class="post-entry container">

            <!-- //======================================================================================= -->
            <!-- //===============================  PRESS HUB SINGLE TEMPLATE ============================ -->

            <?php if (in_category('Press Articles')) {?> <!-- check if the post is in the press articles category -->
              
             <?php include 'press-hub-sidebar.php'; ?> <!-- get press hub sidebar -->
             
             <div class="post-content clearfix col-md-9">
                 <h1 class="text-center border-bottom"><?php the_title(); ?></h1>
 
                 <?php the_content(); ?> <!-- display the post -->
 
                 <?php wp_link_pages(array(
                     'before'    =>  '<div class=" pagination-results pagination-post text-center">',
                     'after'     =>  '</div>',
                     'link_before'   =>  '<span>',
                     'link_after'    =>  '</span>'
                 )); ?>
 
                 <?php if( get_field('show_the_kit') ): ?>
                     <div class="the-kit-section">
                         <h3>THE KIT</h3>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="kit-image">
                                     <a href="<?php the_field('buy_now_link_1'); ?>"><img src="<?php the_field('first_product_image'); ?>"/></a>
                                 </div>
                                 <h4><?php the_field('product_name_1'); ?></h4>
                                 <a href="<?php the_field('buy_now_link_1'); ?>" target="_blank" class="buy-now-cta text-center">BUY NOW</a>
                             </div>
                             <div class="col-md-6">
                                 <?php if( get_field('product_name_2') ): ?>
                                     <div class="kit-image">
                                         <a href="<?php the_field('buy_now_link_2'); ?>"><img src="<?php the_field('second_product_image'); ?>"/></a>
                                     </div>
                                     <h4><?php the_field('product_name_2'); ?></h4>
                                     <a href="<?php the_field('buy_now_link_2'); ?>" target="_blank" class="buy-now-cta text-center">BUY NOW</a>
                                 <?php endif; ?>
                             </div>
                         </div>
                     </div>
                 <?php endif; ?>
 
                 <?php if( get_field('show_second_row') ): ?>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="kit-image">
                                 <a href="<?php the_field('buy_now_link_3'); ?>"><img src="<?php the_field('product_image_3'); ?>"/></a>
                             </div>
                             <h4><?php the_field('product_name_3'); ?></h4>
                             <a href="<?php the_field('buy_now_link_3'); ?>" class="buy-now-cta text-center">BUY NOW</a>
                         </div>
                         <div class="col-md-6">
                             <?php if( get_field('product_name_4') ): ?>
                                 <div class="kit-image">
                                     <a href="<?php the_field('buy_now_link_4'); ?>"><img src="<?php the_field('product_image_4'); ?>"/></a>
                                 </div>
                                 <h4><?php the_field('product_name_4'); ?></h4>
                                 <a href="<?php the_field('buy_now_link_4'); ?>" class="buy-now-cta text-center">BUY NOW</a>
                             <?php endif; ?>
                         </div>
                     </div>
                 <?php endif; ?>
             </div>
            
             <?php wp_reset_postdata(); ?>
            <?php }
            else { ?>
            <!-- //======================================================================================= -->
            <!-- //===============================  INSTAZINE SINGLE TEMPLATE ============================ -->
                <div class="col-md-1 col-md-offset-1">
                <!-- <div class="share-link-wrap col-xs-6 col-md-12">
                    <a href="#" class="share-trigger">
                        <div class="twitter-block">
                           <img src="/wp-content/uploads/2017/08/twitter-mobile.png" alt="">
                        </div>
                    </a>
                </div>  
                <div class="share-link-wrap col-xs-6 col-md-12">
                    <a href="#" class="share-trigger">
                        <div class="facebook-block">
                           <img src="/wp-content/uploads/2017/08/facebook-mobile.png" alt="">
                        </div>
                    </a>
                </div>   -->
                <div class="share-wrap text-center">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Single post sidebar") ) : ?>
                    <?php endif;?>
                </div>
                <!-- <div class="comments-link-wrap col-xs-6 col-md-12">
                    <a href="#comments">
                        <div class="comments-block">
                            <p>COMMENT</p>
                        </div>
                    </a>
                </div> -->
            </div>
            <div class="post-content clearfix col-md-8">
                <h1 class="text-center border-bottom"><?php the_title(); ?></h1>

                <?php the_content(); ?>

                <?php wp_link_pages(array(
                    'before'    =>  '<div class=" pagination-results pagination-post text-center">',
                    'after'     =>  '</div>',
                    'link_before'   =>  '<span>',
                    'link_after'    =>  '</span>'
                )); ?>

                <?php if( get_field('show_the_kit') ): ?>
                    <div class="the-kit-section">
                        <h3>THE KIT</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="kit-image">
                                    <a href="<?php the_field('buy_now_link_1'); ?>"><img src="<?php the_field('first_product_image'); ?>"/></a>
                                </div>
                                <h4><?php the_field('product_name_1'); ?></h4>
                                <a href="<?php the_field('buy_now_link_1'); ?>" target="_blank" class="buy-now-cta text-center">BUY NOW</a>
                            </div>
                            <div class="col-md-6">
                                <?php if( get_field('product_name_2') ): ?>
                                    <div class="kit-image">
                                        <a href="<?php the_field('buy_now_link_2'); ?>"><img src="<?php the_field('second_product_image'); ?>"/></a>
                                    </div>
                                    <h4><?php the_field('product_name_2'); ?></h4>
                                    <a href="<?php the_field('buy_now_link_2'); ?>" target="_blank" class="buy-now-cta text-center">BUY NOW</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if( get_field('show_second_row') ): ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="kit-image">
                                <a href="<?php the_field('buy_now_link_3'); ?>"><img src="<?php the_field('product_image_3'); ?>"/></a>
                            </div>
                            <h4><?php the_field('product_name_3'); ?></h4>
                            <a href="<?php the_field('buy_now_link_3'); ?>" class="buy-now-cta text-center">BUY NOW</a>
                        </div>
                        <div class="col-md-6">
                            <?php if( get_field('product_name_4') ): ?>
                                <div class="kit-image">
                                    <a href="<?php the_field('buy_now_link_4'); ?>"><img src="<?php the_field('product_image_4'); ?>"/></a>
                                </div>
                                <h4><?php the_field('product_name_4'); ?></h4>
                                <a href="<?php the_field('buy_now_link_4'); ?>" class="buy-now-cta text-center">BUY NOW</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
 
            
            </div>
            <div class="col-md-2 clearfix">
			<!--
                <div class='join-us-cta orange-box sidebar'>
                    <h3>JOIN US AND NEVER<br> MISS A POST AGAIN</h3>
                    <p>All the offers and other cool stuff straight to your inbox</p>
                    <a class='orange-cta popmake-2202 pum-trigger' href='#'>EVERYTHING INSTAX</a>
                </div>
			-->
                <!-- <div class="category-menu text-center">
                    <h4 class="border-bottom">CATEGORIES</h4>
                    <ul><?php wp_list_categories(); ?></ul>
                </div> -->
                <!--<div class="tags-list">
                    <?php $tags_list = get_the_tag_list( ' ', esc_html__( ' ', 'logancee' ) );
                    if ( $tags_list ) {
                        echo '<div class="single-post-tags">';
                        printf( '<span>' . esc_html__( '%1$s ' , 'logancee' ) . '</span> ', $tags_list ); // WPCS: XSS OK.
                        echo '</div>';
                    }
                    ?>-->
                </div>
            </div>
            <?php wp_reset_postdata(); ?>

            <?php } ?>
           
        </div>
        
        <div class="comments-wrap">
            <?php // don't show comments on the press hub articles
                if ( in_category('297') or has_tag('360', '361', '362') ) {
                    // empty 
                } 
                else {
                    comments_template();
                }
            ?> 
        </div>
		<!--
        <div class="container">
            <div class="related-posts">
                <h3>RELATED POSTS</h3>
                
                <?php
                $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
                if( $related ) foreach( $related as $post ) {
                setup_postdata($post); ?>
                    <div class="col-md-4 text-center">
                        <a href="<?php the_permalink(); ?>">
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                            <div class="photo-postwrap" style="background-image: url(<?php echo $image[0]; ?>);">    
                                <div class="post-title-box">
                                    <div>
                                        <div class="title-blog"><h4><?php the_title(); ?></h4></div>
                                    </div>
                                </div>  
                            </div> 
                        </a>
                    </div>
                <?php }
                
                
                ?>
            </div>
        </div>
		-->

        <?php 
        if (in_category('297')) { ?>
        <div class="row-blue color-white">
           <div class="container">
           <?php  echo do_shortcode("[custom_block name='ph_signup']"); ?>
           </div>
        </div>
        <?php }
        ?>

        <?php wp_reset_postdata();  ?>

    </div>

    <?php endif; ?>
</div>

<?php get_footer() ?>
