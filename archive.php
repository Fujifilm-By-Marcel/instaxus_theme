<?php get_header('instazine') ?>

<?php if ( have_posts() ) : ?>

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
    }   ?>

    <div id="content" role="main">
        
        <?php if (in_category('Press Articles')) { ?> <!-- if press hub, wrap in container -->
            <div class="container">
        <?php } ?>


        <!-- If press hub show press hub filter in sidebar-->
        <?php if (in_category('Press Articles') or is_category('297')) { ?>
            <?php include 'press-hub-sidebar.php'; ?> <!-- get press hub sidebar -->
        <? } 
        else { ?> <!-- show normal filter and search bar layout -->
            <div class="container marginb15">
                <div class="col-md-6 categorypage">
                    <?php add_shortcode('wpbsearch', 'get_search_form'); ?>
                    <?php echo do_shortcode("[wpbsearch]"); ?>
                </div>
                <div class="col-md-6 clearboth margint15">
                    <div class="filter-trigger-wrapper">
                        <div class="filter-trigger">FILTER</div>
                    </div>
                </div>    
                        
                <div class="filter-options col-md-12">
                    <ul>
                        <li class="product-links"><a href="/tag/mini-9/">Mini 9</a></li>
                        <li class="product-links"><a href="/tag/mini-70/">Mini 70</a></li>
                        <li class="product-links"><a href="/tag/mini-90/">Mini 90</a></li>
                        <li class="product-links"><a href="/tag/wide-300/">Wide 300</a></li>
                        <li class="product-links"><a href="/tag/square-sq10/">SQUARE SQ10</a></li>
                        <li class="product-links"><a href="/tag/share-sp-2/">Share SP-2</a></li>
                    </ul>
                </div>
                <div class="filter-options categories d-block col-md-12">
                    <ul>
                        <li><a href="/instazine" id="all">All</a></li>
                        <li><a href="/category/for-the-fun-of-it" id="fun">For the Fun of It</a></li>
                        <li><a href="/category/for-the-crafters" id="crafters">For the Crafters</a></li>
                        <li><a href="/category/for-the-pro" id="pro">For the Pro</a></li>
                        
                    </ul>
                </div>
            </div>
        <? } ?>


        <?php if (in_category('Press Articles') or is_category('297')) { ?>
            <div class="col-md-9"> <!-- if press hub sidebar layout -->
        <? } 
        else { ?>
            <div class="container narrow-container"> <!-- else posts full width in narrow container -->
        <? } ?>
        <?php if($logancee_options['blog-article_list_template'] != 'logancee'): ?>
        <div class="container posts posts-wrap <?php echo esc_attr($wrap_class) ?> <?php echo $logancee_options['blog-article_list_template']; ?> <?php if($logancee_options['blog-article_list_template'] == 'grid' || $logancee_options['blog-article_list_template'] == 'grid_3_columns'): ?> posts-grid <?php endif; ?> <?php if($logancee_options['blog-article_list_template'] == 'grid_3_columns'): ?> posts-3-columns-grid <?php endif; ?> clearfix">


            <?php
            $post_count = 1;
            $prev_post_timestamp = null;
            $prev_post_month = null;
            $first_timeline_loop = false;
            while (have_posts()) : the_post();
                $post_timestamp = strtotime($post->post_date);
                $post_month = date('n', $post_timestamp);
                $post_year = get_the_date('o');
                $current_date = get_the_date('o-n');
                $slideshow_type = get_post_meta($post->ID, 'slideshow_type', true);
                $classes = ' post-item';
                ?>

                <?php if ($post_layout == 'grid') : ?>
                <?php
                if (($blog_layout == 'left-sidebar' || $blog_layout == 'right-sidebar'))
                    $classes .= ' col-md-6 col-sm-12';
                else
                    $classes .= ' col-md-4 col-sm-6 col-xs-12';
                ?>
                <?php endif; ?>

                <?php if ($post_layout == 'timeline') : ?>
                <?php if (($blog_layout == 'left-sidebar' || $blog_layout == 'right-sidebar'))
                    $classes .= ' col-md-6 col-sm-12'.($post_count % 2 == 1?' align-left':' align-right');
                else
                    $classes .= ' col-sm-6 col-xs-12'.($post_count % 2 == 1?' align-left':' align-right'); ?>
                <?php endif; ?>

                <div id="post-<?php the_ID(); ?>" <?php post_class($post_class . $classes . ' clearfix'); ?>>
                    <div class="post-content">
                    <a href="<?php the_permalink(); ?>">
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                        <div class="photo-postwrap" style="background-image: url(<?php echo $image[0]; ?>);">    
                            <div class="post-title-box">
                                <div>
                                    <div class="title-blog"><h2><?php the_title(); ?></h2></div>
                                    <div class="postContent">
                                        <p><?php the_field('custom_post_excerpt'); ?></p>
                                    </div>
                                </div>
                            </div>  
                        </div> 
                    </a>

                    </div>

                </div>

            <?php
            $prev_post_timestamp = $post_timestamp;
            $prev_post_month = $post_month;
            $post_count++;
            endwhile;
            ?>
        </div>
        <?php else: ?>
            <div class="posts <?php echo esc_attr($wrap_class) ?>">
                <?php
                $post_count = 1;
                $prev_post_timestamp = null;
                $prev_post_month = null;
                $first_timeline_loop = false;
                while (have_posts()) : the_post();
                    $post_timestamp = strtotime($post->post_date);
                    $post_month = date('n', $post_timestamp);
                    $post_year = get_the_date('o');
                    $current_date = get_the_date('o-n');
                    $slideshow_type = get_post_meta($post->ID, 'slideshow_type', true);
                    $classes = '  postWrapper post ';
                    ?>

                    <div <?php post_class($post_class . $classes); ?>>
                        <a href="<?php the_permalink(); ?>">
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                            <div class="photo-postwrap" style="background-image: url(<?php echo $image[0]; ?>);">    
                                <div class="post-title-box">
                                   <div>
                                        <div class="title-blog"><h2><?php the_title(); ?></h2></div>
                                        <div class="postContent">
                                            <p><?php the_field('custom_post_excerpt'); ?></p>
                                        </div>
                                   </div>
                                </div>  
                            </div> 
                        </a>
                    </div>
                    <?php if( $wp_query->current_post == 1 ) { 
                        echo "<div class='join-us-cta orange-box'><h3>JOIN US AND NEVER<br> MISS A POST AGAIN</h3><p>All the offers and other cool stuff<br> straight to your inbox</p><a class='orange-cta popmake-2202 pum-trigger' href='#'>EVERYTHING INSTAX</a></div>";
                    } ?>
                    <?php
                    $prev_post_timestamp = $post_timestamp;
                    $prev_post_month = $post_month;
                    $post_count++;
                endwhile; ?>
            </div>
        <?php endif; ?>


        <?php logancee_pagination($pages = '', $range = 2); ?>
        <?php wp_reset_postdata(); ?>
        </div>
    </div>

<?php else : ?>

    <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>
</div>
<?php if (in_category('Press Articles') or is_category('297')) { ?>
    </div>
<?php } ?>
<?php get_footer() ?>
<script>
    jQuery(document).ready(function() {
        jQuery('.filter-trigger').click(function (){
            jQuery('.cameras-options').toggleClass("show");
        });
    });
</script>
