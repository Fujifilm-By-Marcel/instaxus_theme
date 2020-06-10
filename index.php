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
        <div class="filter-options categories d-block col-md-12">
            <ul>
                <li><a href="/instazine" id="all">All</a></li>
                <li><a href="/category/for-the-fun-of-it" id="fun">For the Fun of It</a></li>
                <li><a href="/category/for-the-crafters" id="crafters">For the Crafters</a></li>
                <li><a href="/category/for-the-pro" id="pro">For the Pro</a></li>
                
            </ul>
        </div>
    </div>
    <div class="container narrow-container">
        
    <?php if($logancee_options['blog-article_list_template'] != 'logancee'): ?>
        <div class="posts posts-wrap <?php echo esc_attr($wrap_class) ?> <?php echo $logancee_options['blog-article_list_template']; ?> <?php if($logancee_options['blog-article_list_template'] == 'grid' || $logancee_options['blog-article_list_template'] == 'grid_3_columns'): ?> posts-grid <?php endif; ?> <?php if($logancee_options['blog-article_list_template'] == 'grid_3_columns'): ?> posts-3-columns-grid <?php endif; ?> clearfix">

            <?php
            $post_count = 1;
            $prev_post_timestamp = null;
            $prev_post_month = null;
            $first_timeline_loop = false;
            
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $catid = get_cat_ID('Press Articles');
            $args = array(
                'cat' => '-' . $catid,
                'paged' => $paged,
            );
            $the_query = new WP_Query( $args );
            
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
                <div class="photo-postwrap">
                    <div id="post-<?php the_ID(); ?>" <?php post_class($post_class . $classes . ' clearfix'); ?>>
                        <div class="post-content">

                            <?php if(get_the_post_thumbnail_url()):?>
                                <div class="post-media">
                                    <?php the_post_thumbnail(); ?>
                                </div><!-- .post-thumbnail -->
                            <?php endif; ?>

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
                                    <?php echo logancee_excerpt( ); ?>
                                </div>
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
        <div class="posts <?php echo esc_attr($wrap_class) ?>">
            <?php
            $post_count = 1;
            $prev_post_timestamp = null;
            $prev_post_month = null;
            $first_timeline_loop = false;
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $catid = get_cat_ID('Press Articles');
            $args = array(
                'cat' => '-' . $catid
            );
            $the_query = new WP_Query( $args );

            
            while (have_posts()) : the_post();
                $post_timestamp = strtotime($post->post_date);
                $post_month = date('n', $post_timestamp);
                $post_year = get_the_date('o');
                $current_date = get_the_date('o-n');
                $slideshow_type = get_post_meta($post->ID, 'slideshow_type', true);
                $classes = '   postWrapper post';
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
                }
                ?>

                <?php
                $prev_post_timestamp = $post_timestamp;
                $prev_post_month = $post_month;
                $post_count++;
        endwhile; ?>
        </div>
    <?php endif; ?>
    
    <div class="surprise-me green-box text-center">
        <h3>SURPRISE ME</h3>
        <p>Get your daily dose of random and read a<br> 
        blog from our best pick</p>
        
        <div class="vc_btn3-container  standard-cta vc_btn3-center">
            <a href="/?redirect_to=random&cache=120&cat=210" class="green-cta">GO GO</a>
        </div>
    </div>

    <?php logancee_pagination($pages = '', $range = 2); ?>
    
<div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_30 vc_sep_pos_align_center vc_sep_color_black"><span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span><div class="vc_icon_element vc_icon_element-outer vc_icon_element-align-left">
	<div class="vc_icon_element-inner vc_icon_element-color-black vc_icon_element-size-md vc_icon_element-style- vc_icon_element-background-color-grey">
		<img style="margin-top: 10px;" src="/wp-content/themes/Instax/images/Icons/instagram-icon.png" alt="InstaxHQ"></div>
</div>
<span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
</div>

<h3 class="text-center">FOLLOW <a target="_blank" href="https://www.instagram.com/instaxhq/?hl=en">@INSTAXHQ</a> ON INSTAGRAM</h3>

    <?php wp_reset_postdata();  ?>
    <?php wp_reset_query();  ?>
</div>
</div>
<?php echo do_shortcode("[custom_block name='account-instagram-feed']"); ?>

<?php get_footer() ?>
<script>
    jQuery(document).ready(function() {
        jQuery('.filter-trigger').click(function (){
            jQuery('.cameras-options').toggleClass("show");
        });
    });
</script>

