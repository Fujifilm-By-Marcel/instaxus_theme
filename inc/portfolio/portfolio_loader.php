<?php

class PortfolioLoader {

    public $logancee_template_name;

    public $logancee_start_point;

    public $logancee_options;

    public $logancee_limit;

    public $logancee_cat;

    public function __construct($logancee_options, $logancee_template_name , $logancee_start_point = 1, $logancee_limit = 0, $logancee_cat = '') {
        $this->logancee_options = $logancee_options;
        $this->logancee_template_name = $logancee_template_name;
        if(!$logancee_limit){
            $logancee_limit = $this->logancee_options['portfolio-limit'];
        }
        $this->logancee_limit = $logancee_limit;
        $this->logancee_start_point = $logancee_start_point * $logancee_limit;
        $this->logancee_cat = $logancee_cat;

    }

    public function load_content() {
        $logancee_args = array(
            'post_type' => 'portfolio' ,
            'posts_per_page' => $this->logancee_limit,
            'taxonomy' => 'portfolio-category',
            'offset' => $this->logancee_start_point );

        if($this->logancee_cat){
            $logancee_args['term'] = $this->logancee_cat;
        }

        $logancee_query = new WP_Query( $logancee_args );

        if( $logancee_query->have_posts() ) {
            ?>
            <div class="cbp-loadMore-block">
            <?php
            if( $this->logancee_template_name == 'portfolio-grid-1' ) {
                $logancee_counter = 0;
                while ($logancee_query->have_posts()) : $logancee_query->the_post(); ?>
                    <?php

                    $logancee_counter++;
                    $logancee_category = get_the_terms($post->ID, 'portfolio-category');
                    $logancee_terms = '';
                    for ($logancee_count = 0; $logancee_count < count($logancee_category); $logancee_count++) {
                        $logancee_terms .= esc_attr($logancee_category[$logancee_count]->slug) . ' ';
                    }
                    ?>
                    <div class="portfolio-item masonry-item <?php echo esc_attr($logancee_terms); ?> wrapper-padding"
                         style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'large'); ?>')">
                        <a href="<?php the_permalink(); ?>">
                            <div class="hover-plus">
                                <span class="icon_plus"></span>
                            </div>

                            <div class="hover-text">
                                <h5 class="portfolio-title">
                                    <?php the_title(); ?>
                                </h5>
                                <div class="portfolio-cats">
                                    <?php
                                    for ($logancee_count = 0; $logancee_count < count($logancee_category); $logancee_count++) {
                                        if ($logancee_count != (count($logancee_category) - 1)) {
                                            ?>
                                            <span>
                                                <?php echo esc_attr($logancee_category[$logancee_count]->name) . ', '; ?></span>
                                        <?php } else { ?>
                                            <span>
                                                <?php echo esc_attr($logancee_category[$logancee_count]->name); ?></span>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile;
            } elseif( $this->logancee_template_name == 'portfolio-grid-2' ) {
                $logancee_counter = 0;
                while( $logancee_query->have_posts() ) : $logancee_query->the_post(); ?>
                    <?php

                    $logancee_counter++;
                    $logancee_category = get_the_terms( $post->ID , 'portfolio-category' );
                    $logancee_terms = '';
                    for( $logancee_count = 0 ; $logancee_count < count( $logancee_category ) ; $logancee_count++ ) {
                        $logancee_terms .= esc_attr( $logancee_category[ $logancee_count ]->slug ) . ' ';
                    }
                    ?>
                    <div class="portfolio-item masonry-item <?php echo esc_attr( $logancee_terms ); ?> wrapper-padding" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID , 'large' ); ?>')">
                        <a href="<?php the_permalink(); ?>">
                            <div class="hover-plus">
                                <span class="icon_plus"></span>
                            </div>

                            <div class="hover-text">
                                <h5 class="portfolio-title">
                                    <?php the_title(); ?>
                                </h5>
                                <div class="portfolio-cats">
                                    <?php
                                    for( $logancee_count = 0 ; $logancee_count < count( $logancee_category ) ; $logancee_count++ ) {
                                        if( $logancee_count != ( count( $logancee_category ) - 1 ) ) {
                                            ?>
                                            <span>
                                                <?php echo esc_attr( $logancee_category[ $logancee_count ]->name ) . ', '; ?></span>
                                        <?php } else { ?>
                                            <span>
                                                <?php echo esc_attr( $logancee_category[ $logancee_count ]->name ); ?></span>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile;
            } else if( $this->logancee_template_name == 'portfolio-masonry-1' ) {
                $logancee_counter = 0;
                 while( $logancee_query->have_posts() ) : $logancee_query->the_post(); ?>
                    <?php

                    $logancee_counter++;
                    $logancee_category = get_the_terms( $post->ID , 'portfolio-category' );
                    $logancee_terms = '';
                    for( $logancee_count = 0 ; $logancee_count < count( $logancee_category ) ; $logancee_count++ ) {
                        $logancee_terms .= esc_attr( $logancee_category[ $logancee_count ]->slug ) . ' ';
                    }
                    ?>
                    <div class="masonry-item portfolio-item <?php echo esc_attr( $logancee_terms ); ?> wrapper-padding">
                        <a href="<?php the_permalink(); ?>">
                            <div class="hover-plus">
                                <span class="icon_plus"></span>
                            </div>
                            <img
                                src="<?php echo get_the_post_thumbnail_url( $post->ID , 'large' ); ?>"
                                alt=""
                                "/>
                            <div class="hover-text">
                                <h5 class="portfolio-title">
                                    <?php the_title(); ?>
                                </h5>
                                <div class="portfolio-cats">
                                    <?php
                                    for( $logancee_count = 0 ; $logancee_count < count( $logancee_category ) ; $logancee_count++ ) {
                                        if( $logancee_count != ( count( $logancee_category ) - 1 ) ) {
                                            ?>
                                            <span>
                                                <?php echo esc_attr( $logancee_category[ $logancee_count ]->name ) . ', '; ?></span>
                                        <?php } else { ?>
                                            <span>
                                                <?php echo esc_attr( $logancee_category[ $logancee_count ]->name ); ?></span>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile;
            } else if( $this->logancee_template_name == 'portfolio-masonry-2' ) {
            $logancee_counter = 0;
            while( $logancee_query->have_posts() ) : $logancee_query->the_post(); ?>
            <?php

            $logancee_counter++;
            $logancee_category = get_the_terms( $post->ID , 'portfolio-category' );
            $logancee_terms = '';
            for( $logancee_count = 0 ; $logancee_count < count( $logancee_category ) ; $logancee_count++ ) {
                $logancee_terms .= esc_attr( $logancee_category[ $logancee_count ]->slug ) . ' ';
            }
            ?>
            <div class="masonry-item portfolio-item <?php echo esc_attr( $logancee_terms ); ?> wrapper-padding">
                <a href="<?php the_permalink(); ?>">
                    <div class="hover-plus">
                        <span class="icon_plus"></span>
                    </div>
                    <img
                        src="<?php echo get_the_post_thumbnail_url( $post->ID , 'large' ); ?>"
                        alt=""
                    "/>
                    <div class="hover-text">
                        <h5 class="portfolio-title">
                            <?php the_title(); ?>
                        </h5>
                        <div class="portfolio-cats">
                            <?php
                            for( $logancee_count = 0 ; $logancee_count < count( $logancee_category ) ; $logancee_count++ ) {
                                if( $logancee_count != ( count( $logancee_category ) - 1 ) ) {
                                    ?>
                                    <span>
                                                <?php echo esc_attr( $logancee_category[ $logancee_count ]->name ) . ', '; ?></span>
                                <?php } else { ?>
                                    <span>
                                                <?php echo esc_attr( $logancee_category[ $logancee_count ]->name ); ?></span>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </a>
            </div>
            <?php endwhile;
            } else if( $this->logancee_template_name == 'portfolio-category-1' ) {

                while ($logancee_query->have_posts()) : $logancee_query->the_post();
                    $logancee_category = get_the_terms( $post->ID , 'portfolio-category' );
                    $logancee_terms = '';
                    for( $logancee_count = 0 ; $logancee_count < count( $logancee_category ) ; $logancee_count++ ) {
                        $logancee_terms .= $logancee_category[ $logancee_count ]->slug . ' ';
                    }
                    ?>
                    <div class="portfolio-item <?php echo esc_attr($logancee_terms); ?> <?php if( $logancee_counter % 2 == 0 ) {
                        echo 'inverse';
                    } ?>">
                        <div class="wl-nomalmargin-bottom column-2">
                            <div
                                class="col-md-4 col-sm-6 col-xs-12 wl-sibling-hover-1 <?php if( $logancee_counter % 2 == 0 ) {
                                    echo 'pull-right';
                                } ?>">
                                <div class="wl-height1 wl-full-width">
                                    <?php if( $logancee_counter % 2 != 0 ) { ?>
                                        <div class="style-6-left-text">
                                            <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5>
                                            </a>
                                            <div class="wl-regular-text">
                                                <div class="portfolio-excerpt">
                                                    <?php echo $post->post_excerpt ?>
                                                </div>
                                                <div class="portfolio-cats">
                                                    <?php
                                                    for( $logancee_count = 0 ; $logancee_count < count( $logancee_category ) ; $logancee_count++ ) {
                                                        if( $logancee_count != ( count( $logancee_category ) - 1 ) ) {
                                                            ?>
                                                            <a href="<?php echo get_term_link( $logancee_category[ $logancee_count ]->term_id , 'portfolio-category' ) ?>">
                                                                <?php echo esc_attr($logancee_category[ $logancee_count ]->name) . ', '; ?></a>
                                                        <?php } else { ?>
                                                            <a href="<?php echo get_term_link( $logancee_category[ $logancee_count ]->term_id , 'portfolio-category' ) ?>">
                                                                <?php echo esc_attr($logancee_category[ $logancee_count ]->name); ?></a>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="icon-more left hidden-xs">
                                            <a href="<?php the_permalink(); ?>" data-icon=&#x24;></a>
                                        </div>
                                    <?php } else { ?>

                                        <div class="style-6-left-text text-right">
                                            <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5>
                                            </a>
                                            <div class="wl-regular-text">
                                                <div class="portfolio-excerpt">
                                                    <?php echo $post->post_excerpt ?>
                                                </div>
                                                <div class="portfolio-cats">
                                                    <?php
                                                    for( $logancee_count = 0 ; $logancee_count < count( $logancee_category ) ; $logancee_count++ ) {
                                                        if( $logancee_count != ( count( $logancee_category ) - 1 ) ) {
                                                            ?>
                                                            <a href="<?php echo get_term_link( $logancee_category[ $logancee_count ]->term_id , 'portfolio-category' ); ?>">
                                                                <?php echo esc_attr($logancee_category[ $logancee_count ]->name) . ', '; ?></a>
                                                        <?php } else { ?>
                                                            <a href="<?php echo get_term_link( $logancee_category[ $logancee_count ]->term_id , 'portfolio-category' ); ?>">
                                                                <?php echo esc_attr($logancee_category[ $logancee_count ]->name); ?></a>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="icon-more right hidden-xs">
                                            <a href="<?php the_permalink(); ?>" data-icon=&#x23;></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12 wl-sibling-hover-2">
                                <div
                                    class="<?php echo esc_attr($logancee_relative) . ' ' . esc_attr($logancee_hoverParentClass) . ' ' . esc_attr($logancee_overflow); ?>">
                                    <?php if( $logancee_options[ 'w-portfolio-hover-style' ] == 5 || $logancee_options[ 'w-portfolio-hover-style' ] == 7 || $logancee_options[ 'w-portfolio-hover-style' ] == 9 ) { ?>
                                        <div class="<?php echo esc_attr($logancee_imageStyle); ?> image-height">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'logancee_image_770x570' ); ?></a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="image-height">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'logancee_image_770x570' ); ?></a>
                                        </div>
                                    <?php }  ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php $logancee_counter++; endwhile; ?>

            <?php } ?>

            </div>
        <?php
        wp_reset_postdata();
        }
    }
}
