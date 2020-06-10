<!-- HEADER
================================================== -->
<?php $logancee_options = logancee_get_options();?>

<header class="header">
    <div class="background-header"></div>
    <div class="slider-header">
        <!-- Top of pages -->
        <div id="top" class="<?php if($logancee_options['layout-header'] == 2) { echo 'fixed'; } else { echo 'full-width'; } ?>">
            <div class="background-top"></div>
            <div class="background">
                <div class="shadow"></div>
                <div class="pattern">
                    <div class="logo-home">
                        <div class="logo">
                            <a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>" rel="home">
                                <?php if($logancee_options['layout-logotype']){
                                    echo '<img src="'.$logancee_options['layout-logotype']['url'].'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ) .'"/>';
                                } ?>
                            </a>
                        </div>
                    </div>
                    <div id="megamenu" >
                        <?php echo logancee_html_mainmenu() ?><!-- // .megamenu-wrapper -->
                    </div><!-- // #megamenu -->
                    <?php if ( is_active_sidebar( 'top-bar-sidebar' ) ) : ?>
                        <?php dynamic_sidebar( 'top-bar-sidebar' ); ?>
                    <?php endif; ?>

                    <?php if($logancee_options['block-header-top-bar-status'] == 1) { ?>
                        <?php echo html_entity_decode($logancee_options['block-header-top-bar-content']); ?>
                    <?php } ?>


                </div>
            </div>
        </div><!-- // #top -->
    </div><!-- // .slider-header -->
</header>


<div class="sb-topbar sticky-header is-sticky clearfix">
    <div class="overflow">
        <div class="sticky-icon-group">
            <div class="sticky-search">
                <i class="icon-magnifier"></i>
                <div class="quick-search">
                    <form class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input id="search" type="text" name="s" value="" class="input-text" maxlength="128" placeholder="<?php echo __('Search', 'logancee'); ?>" autocomplete="off">
                        <input type="hidden" name="post_type" value="product" />

                        <button type="submit" title="Search" class="button-search">
                            <span><i aria-hidden="true" class="icon_search"></i></span>
                        </button>
                    </form>
                    <i aria-hidden="true" class="icon_close"></i>
                </div>
            </div>

            <div class="sticky-cart">
                <?php echo logancee_html_minicart(); ?>
            </div>

            <div class="settings">
                <i class="icon-settings"></i>
                <div class="settings-inner">
                    <div class="setting-content">
                        <?php if ( logancee_is_plugin_active('woocommerce-multilingual/wpml-woocommerce.php') ): ?>
                        <div class="setting-language">
                            <div class="title"><?php echo __('Select language', 'logancee'); ?></div>
                            <?php echo logancee_lang_switcher() ?>
                        </div>
                        <div class="setting-currency">
                            <div class="title"><?php echo __('Select currency', 'logancee'); ?></div>
                            <?php echo logancee_currency_switcher() ?>
                        </div>
                        <?php endif; ?>

                        <div class="setting-option">
                            <?php echo logancee_html_topmenu() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Slider -->
<div id="slider" class="<?php if($logancee_options['layout-slideshow'] == 1) { echo 'full-width'; } else { echo 'fixed'; } ?>">
    <div class="background-slider"></div>
    <div class="background">
        <div class="shadow"></div>
        <div class="pattern">
            <?php logancee_slideshow(); ?>
        </div>
    </div>
</div>



