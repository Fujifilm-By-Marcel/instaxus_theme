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

<header class="header">
    <div class="background-header"></div>
    <div class="slider-header">
        <!-- Top Bar -->
        <div id="top-bar" class="<?php if($logancee_options['layout-top-bar'] == 2) { echo 'fixed'; } else { echo 'full-width'; } ?>">
            <div class="background-top-bar"></div>
            <div class="background">
                <div class="shadow"></div>
                <div class="pattern">
                    <div class="container">
                        <div class="header-top-inner">
                            <div class="row">
                                <div class="hidden-xs col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <?php if ( logancee_is_plugin_active('woocommerce-multilingual/wpml-woocommerce.php') ): ?>
                                    <?php echo logancee_lang_switcher() ?>
                                    <span class="delimiter"></span>
                                    <?php echo logancee_currency_switcher() ?>
                                    <?php endif; ?>

                                </div>

                                <div class="top-bar-wrap hidden-xs col-xs-4 col-sm-5 col-md-4 col-lg-6">
                                    <div class="top-bar">
                                        <div class="inner-top-bar">
                                            <?php if ( is_user_logged_in() ) : ?>
                                                <?php
                                                global $current_user;

                                                wp_get_current_user();
                                                ?>
                                                <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>
                                                    <div class="hidden-xs login-topbar">
                                                        <a href="<?php echo wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ) ?>" class="nav-top-link"><span><?php esc_html_e('Log Out', 'logancee'); ?></span></a>
                                                    </div>
                                                    <div class="hidden-xs register-topbar">
                                                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="nav-top-link"><span><?php esc_html_e('My Account','logancee'); ?></span></a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="hidden-xs register-topbar">
                                                        <a href="<?php echo wp_logout_url( esc_url( home_url( '/' ) ) ) ?>" class="nav-top-link"><span><?php esc_html_e('Log Out', 'logancee'); ?></span></a>
                                                    </div>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>
                                                    <div class="hidden-xs login-topbar">
                                                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="nav-top-link"><span><?php esc_html_e('Login', 'logancee'); ?></span></a>
                                                    </div>
                                                    <div class="hidden-xs register-topbar">
                                                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="nav-top-link"><span><?php esc_html_e('Register', 'logancee'); ?></span></a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="hidden-xs login-topbar">
                                                        <a href="<?php echo wp_login_url( esc_url( home_url( '/' ) ) ); ?>" class="nav-top-link"><span><?php esc_html_e('Login', 'logancee'); ?></span></a>
                                                    </div>
                                                    <div class="hidden-xs register-topbar">
                                                        <a href="<?php echo wp_registration_url(); ?>" class="nav-top-link"><span><?php esc_html_e('Register', 'logancee'); ?></span></a>
                                                    </div>
                                                <?php endif; ?>

                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="social-topbar col-xs-10 col-sm-3 col-md-4 col-lg-3">
                                    <?php if ( is_active_sidebar( 'top-bar-sidebar' ) ) : ?>
                                        <?php dynamic_sidebar( 'top-bar-sidebar' ); ?>
                                    <?php endif; ?>
                                    <?php if($logancee_options['block-header-top-bar-status'] == 1) { ?>
                                        <?php echo html_entity_decode($logancee_options['block-header-top-bar-content']); ?>
                                    <?php } ?>
                                </div>


                                <div class="settings-topbar visible-xs-block col-xs-2">
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
                    </div>
                </div>
            </div>
        </div>

        <!-- Top of pages -->
        <div id="top" class="<?php if($logancee_options['layout-header'] == 2) { echo 'fixed'; } else { echo 'full-width'; } ?>">
            <div class="background-top"></div>
            <div class="background">
                <div class="shadow"></div>
                <div class="pattern">
                    <div class="container">
                        <div class="header-inner">
                            <div class="row">
                                <div class="col-xs-3 col-sm-4 col-md-4 col-lg-4">
                                    <div class="top-seach">
                                        <div class="quick-search">
                                            <form class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                                <input id="search" type="text" name="s" value="" class="input-text" maxlength="128" placeholder="<?php echo __('Search', 'logancee'); ?>" autocomplete="off">
                                                <input type="hidden" name="post_type" value="product" />

                                                <button type="submit" title="Search" class="button-search">
                                                    <span><i aria-hidden="true" class="icon_search"></i></span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                                    <div class="logo-home">
                                        <div class="logo">
                                            <a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>" rel="home">
                                                <?php if($logancee_options['layout-logotype']){
                                                    echo '<img src="'.$logancee_options['layout-logotype']['url'].'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ) .'"/>';
                                                } ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-3 col-sm-4 col-md-4 col-lg-4">
                                    <?php echo logancee_html_minicart(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="megamenu" >
                        <?php echo logancee_html_mainmenu() ?><!-- // .megamenu-wrapper -->
                    </div><!-- // #megamenu -->
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


