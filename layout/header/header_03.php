<!-- HEADER
================================================== -->
<?php $logancee_options = logancee_get_options();?>

<?php if($logancee_options['header-sticky-status']):?>

   

    <div class="sticky-header is-sticky hide-until-fixed">
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

                               
<header class="header header-layout-3">
    <div class="background-header"></div>
    <div class="slider-header">
            <div class="rainbow-bar"><!--
                <div class="rainbow-block blue"></div>
                <div class="rainbow-block orange"></div>
                <div class="rainbow-block green"></div>

                <div class="rainbow-block middleblock"></div>

                <div class="rainbow-block pink"></div>
                <div class="rainbow-block yellow"></div>
                <div class="rainbow-block grey"></div>-->
                <!--<div class="social-tab-wrapper">
                    <div class="social-tab-expanded tab-open">
                        <div class="socials">
                            <a target="_blank" href="https://twitter.com/Instax"><img src="/wp-content/themes/Instax/images/twitter-icon.png" alt="Instax Twitter"></a>
                            <a target="_blank" href="https://www.instagram.com/fujifilm_instax_northamerica/"><img src="/wp-content/themes/Instax/images/instagram-icon.png" alt="Instax Instagram"></a>
                            <a target="_blank" href="https://www.facebook.com/FUJIFILM.INSTAX/"><img src="/wp-content/themes/Instax/images/facebook-icon.png" alt="Instax Facebook"></a>
                            <a target="_blank" href="https://www.pinterest.com/INSTAXamericas/"><img src="/wp-content/themes/Instax/images/pinterest-icon.png" alt="Instax Pinterest"></a>
                            <a target="_blank" href="https://www.youtube.com/channel/UCCdyBNOeDzw7C0QOZQVoGQA"><img src="/wp-content/themes/Instax/images/youtube-icon.png" alt="Instax Youtube"></a>
                        </div>
                    </div>
                    <div class="social-tab tab-open">
                        <p>EXPLORE SOCIAL</p>
                    </div>
                </div>-->
            </div>

            
            <!-- Top of pages -->
            <div id="top" class="<?php if($logancee_options['layout-header'] == 2) { echo 'fixed'; } else { echo 'full-width'; } ?>">
                <div class="background-top"></div>
                <div class="background"> 
                    <div class="shadow"></div>
                    <div class="pattern">

                        <div class="container">
                            <div class="mobile-header full-width">
                                <div class="mobile-menu-top">
                                     <div class="col-xs-12">
                                        <div class="logo-sticky">
                                            <a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>" rel="home">
                                            <span>
                                            <?php if($logancee_options['layout-logotype']){
                                                echo '<img src="'.$logancee_options['layout-logotype']['url'].'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ) .'"/>';
                                            } ?>
                                            </span>
                                            </a>
                                        </div>										
                                    </div>
                                </div>
                                <div class="col-xs-12 mobile-mega-menu">
                                    <div class="main-menu">
                                        <div class="container-megamenu container horizontal">
                                            <?php echo logancee_html_mainmenu() ?>                                           
                                        </div>
                                    </div>
                                </div>
								
                            </div>
                            <div align="right">
                                    <?php if ( 4 == get_current_blog_id() ) {
                                        echo '<div class="utility">

                                            <div id="languageSelector">
                        
                                                <div class="selectList OneLinkHide">
                                                    <ul>
                                                        <li class="stay" >English</li>                                     
                                                        <li><a href="http://fr.instaxcanada.ca/index.html">Français</a></li>
                                                    </ul>
                                                </div>
                                
                                                <div class="selectList OneLinkShow OneLinkKeepLinks">
                                                    <ul>
                                                        <li><a href="http://www.instaxcanada.ca/index.html">English</a></li>                                        
                                                        <li class="stay">Français</li>                                        
                                                    </ul>
                                                </div>        
                                            </div> 
                                            </div>';
                                    } ?>
                                </div>
                            <div class="sticky-header is-sticky desktop-header always-show">
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


