<?php get_header('smaller'); // FAQ - single post ?>


<div id="content" role="main">

    <?php wp_reset_postdata(); ?>
    
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> class="post">
        <div class="post-entry container">
            
            <div class="col-md-9 mt-3">
                <div class="post-content clearfix">
                    
                    <h1 class="text-center border-bottom"><?php the_title(); ?></h1>
				
                   <div> <?php the_content(); ?> <!-- display the post --></div>
              
                    <?php wp_link_pages(array(
                        'before'    =>  '<div class=" pagination-results pagination-post text-center">',
                        'after'     =>  '</div>',
                        'link_before'   =>  '<span>',
                        'link_after'    =>  '</span>'
                    )); ?>
    
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <div class="related-posts bg-lightgrey d-none faq-related">
                  
                    <h4>MORE FROM <?php
                        $terms = the_terms($id, $taxonomy="section", $before = "<div class='text-uppercase color-black d-inline'>", $sep = "", $after="</div>");
                        echo $terms;
                        wp_reset_postdata(); 
                    ?></h4>
                    <!-- Pull related posts by category -->
                    <ul class="related-links">
                    <?php // The Query
                    $section = $post_slug=$post->post_name;
 
                    //$tags = wp_get_post_tags($post->ID);
                    
                    //$first_tag = $tags[0]->term_id;
               
							$args = [
                                'post__not_in' => array($post->ID),
								'posts_per_page' => 3,
								'post_type' => 'faqs',
								'tax_query' => array(  
                                    'taxonomy' => 'section',
                                    'field' => 'term_id',                   
                                    'terms' => $section,        
								),
							];
							$related_questions = new WP_Query($args);
							if ($related_questions->have_posts()) :
							while ($related_questions->have_posts()) : $related_questions->the_post() ?>
								<li>
                                    <a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
                                </li>
							<?php endwhile;
							else : ?>
							<p><?php _e( 'Sorry, we\'re having trouble loading questions at the moment. Please try again later.', 'twentyseventeen' ); ?></p>
							<?php
                            wp_reset_postdata(); 
                        endif; 
                    ?>
                    </ul>
                </div>
               <div class="float-left width100">
                <?php include 'faq-sidebar.php'; ?>
               </div>
            </div>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
</div>

<?php get_footer() ?>