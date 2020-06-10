<?php get_header() ?>

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

    <div id="content" role="main">
    <div class="container marginb15">
        <!--<div class="tag-menu-wrapper">
                <ul class="tag-menu">
                   <?php wp_list_categories(); ?>
                </ul>
        </div>-->
        <div class="col-sm-6">
            <?php add_shortcode('wpbsearch', 'get_search_form'); ?>
            <?php echo do_shortcode("[wpbsearch]"); ?>
        </div>
       <div class="col-sm-6">
           <div class="filter-trigger-wrapper">
               <div class="filter-trigger">FILTER</div>
           </div>
       </div>             
        <div class="filter-options cameras-options col-md-12">
            <ul>
                <li class="product-links"><a href="/tag/mini-9/">Mini 9</a></li>
                <li class="product-links"><a href="/tag/mini-70/">Mini 70</a></li>
                <li class="product-links"><a href="/tag/mini-90/">Mini 90</a></li>
                <li class="product-links"><a href="/tag/wide-300/">Wide 300</a></li>
                <li class="product-links"><a href="/tag/square-sq10/">SQUARE SQ10</a></li>
                <li class="product-links"><a href="/tag/share-sp-2/">Share SP-2</a></li>
            </ul>
        </div>
        <!-- <div class="filter-options categories d-block col-md-12">
            <ul>
                <li><a href="/category/for-the-pro">For the Pro</a></li>
                <li><a href="/category/for-the-lucky">For the Lucky</a></li>
                <li><a href="/category/for-the-crafters">For the Crafters</a></li>
                <li><a href="/category/for-the-fun-of-it">For the Fun of it</a></li>
            </ul>
        </div> -->
    </div>
    <div class="container">
        <?php 
            // The Query
            $args = array(
                'post_type' => array(                   //(string / array) - use post types. Retrieves posts by Post Types, default value is 'post';
                    'post',                         // - a post.
                    'page',                         // - a page.
                    'revision',                     // - a revision.
                    'attachment',                   // - an attachment. The default WP_Query sets 'post_status'=>'published', but atchments default to 'post_status'=>'inherit' so you'll need to set the status to 'inherit' or 'any'.
                    'faqs             ',                 // - Custom Post Types (e.g. movies)
                    ),
            );
            $the_query = new WP_Query( $args );

            // The Loop
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post(); ?>
                    <a href="<?php echo the_permalink(); ?>">
                        <p><strong><?php the_title(); ?></strong></p>
                        <p><?php the_content(); ?></p>
                    </a>
                <?php }
            } else {
                // no posts found
            }
        ?>
    </div>
    

    <?php logancee_pagination($pages = '', $range = 2); ?>
    

    <?php wp_reset_postdata();  ?>
    <?php wp_reset_query();  ?>
</div>
</div>

<?php get_footer() ?>
<script>
    jQuery(document).ready(function() {
        jQuery('.filter-trigger').click(function (){
            jQuery('.cameras-options').toggleClass("show");
        });
    });
</script>

