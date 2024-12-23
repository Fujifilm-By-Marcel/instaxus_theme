<?php
    global $wp_query;
    $post_type = $_GET['post_type'];
    if( isset($_GET['s']) && $post_type == 'faqs')   
    {
        get_template_part('search','faqs');
        exit;
    } 
?>
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
    }

    ?>

    <div id="content" role="main">
        <div class="container marginb15">
            <?php if (is_category($category = '297') or is_tag('360','361','362')) { 
                // if press articles category leave empty else show general search box
            }
            else { ?>
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
            <?php } ?>
        </div>

<div class="container narrow-container">
    <?php if (is_category($category = '297') or is_tag('360','361','362')) { 
        include 'press-hub-sidebar.php'; 
    } ?>
    <div class="<?php if (is_category($category = '297') or is_tag('360','361','362')) {?> col-md-9 <?php } ?>">
       
        <?php if($logancee_options['blog-article_list_template'] != 'logancee'): ?>
            <div class="posts posts-wrap <?php echo esc_attr($wrap_class) ?> <?php echo $logancee_options['blog-article_list_template']; ?> <?php if($logancee_options['blog-article_list_template'] == 'grid' || $logancee_options['blog-article_list_template'] == 'grid_3_columns'): ?> posts-grid <?php endif; ?> <?php if($logancee_options['blog-article_list_template'] == 'grid_3_columns'): ?> posts-3-columns-grid <?php endif; ?> clearfix">


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
                        <?php
                        if (($blog_layout == 'left-sidebar' || $blog_layout == 'right-sidebar'))
                            $classes .= ' col-md-6 col-sm-12'.($post_count % 2 == 1?' align-left':' align-right');
                        else
                            $classes .= ' col-sm-6 col-xs-12'.($post_count % 2 == 1?' align-left':' align-right');
                        ?>
                    <?php endif; ?>

                    <div id="post-<?php the_ID(); ?>" <?php post_class($post_class . $classes . ' clearfix'); ?>>
                        <div class="post-content">

                           

                            <div class="post-text">
                                <?php $tags_list = get_the_tag_list( '', esc_html__( '', 'logancee' ) );
                                if ( $tags_list ) {
                                    echo '<div class="tags">';
                                    printf( '<span class="tags-links">' . esc_html__( '%1$s', 'logancee' ) . '</span>', $tags_list ); // WPCS: XSS OK.
                                    echo '</div>';
                                }

                                ?>

                                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <ul class="meta">

                                    <li>
                                    <span class="month">
                                        <?php echo get_the_time('M', get_the_ID()); ?>
                                    </span>
                                        <span class="day">
                                        <?php echo get_the_time('d', get_the_ID()); ?>
                                    </span>
                                        <span class="day">
                                        <?php echo get_the_time('Y', get_the_ID()); ?>
                                    </span>
                                    </li>
                                    <?php if(get_the_author_posts_link()):?>
                                        <li class="post-author">
                                            <?php echo esc_html__('By', 'logancee'); ?> <span><?php the_author_posts_link(); ?></span>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(has_category()):?>
                                        <li class="post-categories">
                                            <?php echo __( 'In', 'logancee' ); ?>: <?php the_category('&nbsp;'); ?>
                                        </li>
                                    <?php endif; ?>
                                </ul>

                                <div class="post-description">
                                    <?php
                                    echo logancee_excerpt( );
                                    ?>
                                </div>
                            </div>

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
            <div class="search-results posts <?php echo esc_attr($wrap_class) ?>">
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
</div>
<?php else : ?>

    <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

<?php get_footer() ?>