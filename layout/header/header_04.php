<!-- HEADER
================================================== -->
<?php $logancee_options = logancee_get_options();?>

<?php if($logancee_options['header-sticky-status']):?>
    <div class="sticky-header is-sticky">
        <div class="wrap">
            <div class="standard-body">
                <div class="full-width">
                    <div class="container"><div style="position: relative">
                            <div class="logo-sticky">
                                <a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>" rel="home">
                                <span>
                                <?php if($logancee_options['layout-logotype']){
                                    echo '<img src="'.$logancee_options['layout-logotype']['url'].'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ) .'"/>';
                                } ?>
                                </span>
                                </a>
                            </div>
                            <div class="sticky-icon-group">
                                <div class="sticky-search">
                                    <i class="icon-magnifier"></i>
                                    <div class="quick-search">
                                        <form class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                            <input id="search2" type="text" name="s" value="" class="input-text" maxlength="128" placeholder="<?php echo __('Search', 'logancee'); ?>" autocomplete="off">
                                            <input type="hidden" name="post_type" value="product" />

                                            <button type="submit" title="Search" class="button-search"><span><i aria-hidden="true" class="icon_search"></i></span></button>
                                        </form>
                                        <i aria-hidden="true" class="icon_close"></i>
                                    </div>
                                </div>

                                <!--<div class="sticky-cart">
                                    <?php //echo logancee_html_minicart(); ?>
                                </div>-->

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
                            <div class="main-menu">
                                <div class="container-megamenu container horizontal">
                                    <?php echo logancee_html_mainmenu() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<header class="header header-layout-4">
    <div class="background-header"></div>
    <div class="slider-header">

            <!-- Top of pages -->
            <div id="top" class="<?php if($logancee_options['layout-header'] == 2) { echo 'fixed'; } else { echo 'full-width'; } ?>">
                <div class="background-top"></div>
                <div class="background">
                    <div class="shadow"></div>
                    <div class="pattern">

                        <div class="container">
                            <div class="sticky-header is-sticky">
                                <div class="logo-sticky">

                                    <a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>" rel="home">
                                    <span>
                                    <?php if($logancee_options['layout-logotype']){
                                        echo '<img src="'.$logancee_options['layout-logotype']['url'].'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ) .'"/>';
                                    } ?>
                                    </span>
                                    </a>
                                </div>

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

                                    <!--<div class="sticky-cart">
                                        <?php //echo logancee_html_minicart(); ?>
                                    </div>-->

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

                                <div class="main-menu">
                                    <?php echo logancee_html_mainmenu() ?><!-- // .megamenu-wrapper -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- // #top -->
        </div><!-- // .slider-header -->

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
</header>


