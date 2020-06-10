<?php

/**
 * TGM Init Class
 */
include_once ('class-tgm-plugin-activation.php');

function logancee_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        
        
        array(
            'name'                     => esc_html__('Redux Framework', 'logancee'),
            'slug'                     => 'redux-framework',
            'required'                 => true
        ),

        array(
            'name'			           => esc_html__('WPBakery Visual Composer', 'logancee'),
            'slug'			           => 'js_composer',
            'source'			       => 'http://cleventhemes.net/logancee/woocommerce/plugins/js_composer.zip',
            'required'			       => true
        ),

        array(
            'name'                     => esc_html__('Easy Bootstrap Shortcodes', 'logancee'),
            'slug'                     => 'easy-bootstrap-shortcodes',
            'required'                 => true
        ),

        array(
            'name'                     => esc_html__('Revolution Slider', 'logancee'),
            'slug'                     => 'revslider',
            'source'                   => 'http://cleventhemes.net/logancee/woocommerce/plugins/revslider.zip',
            'required'                 => false
        ),
        
        
        array(
            'name'                     => esc_html__('Logancee Extra', 'logancee'),
            'slug'                     => 'logancee-extra',
            'source'			    => 'http://cleventhemes.net/logancee/woocommerce/plugins/logancee-extra.zip',
            'required'                 => true
        ),
        
        array(
            'name'                     => esc_html__('WordPress Importer', 'logancee'),
            'slug'                     => 'wordpress-importer',
            'required'                 => true
        ),
        array(
            'name'                     => esc_html__('Subscribe2', 'logancee'),
            'slug'                     => 'subscribe2',
            'required'                 => false
        ),
        array(
            'name'                     => esc_html__('Contact Form Maker', 'logancee'),
            'slug'                     => 'contact-form-maker',
            'required'                 => false
        ),
        array(
            'name'                     => esc_html__('Instagram Feed WD', 'logancee'),
            'slug'                     => 'wd-instagram-feed',
            'required'                 => false
        ),
        array(
            'name'                     => esc_html__('Woocommerce', 'logancee'),
            'slug'                     => 'woocommerce',
            'required'                 => true
        ),
        array(
            'name'                     => esc_html__('Yith Woocommerce Wishlist', 'logancee'),
            'slug'                     => 'yith-woocommerce-wishlist',
            'required'                 => false
        ),
        array(
            'name'                     => esc_html__('Yith Woocommerce Compare', 'logancee'),
            'slug'                     => 'yith-woocommerce-compare',
            'required'                 => false
        ),
        array(
            'name'                     => esc_html__('Yith Woocommerce Ajax Navigation', 'logancee'),
            'slug'                     => 'yith-woocommerce-ajax-navigation',
            'required'                 => false
        ),
        array(
            'name'                     => esc_html__('Yith Woocommerce Ajax Search', 'logancee'),
            'slug'                     => 'yith-woocommerce-ajax-search',
            'required'                 => false
        ),
    );


    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'               => 'logancee',             // Text domain - likely want to be the same as your theme.
        'default_path'         => '',                             // Default absolute path to pre-packaged plugins
        'menu'                 => 'install-required-plugins',     // Menu slug
        'has_notices'          => true,                           // Show admin notices or not
        'is_automatic'        => false,                           // Automatically activate plugins after installation or not
        'message'             => '',                            // Message to output right before the plugins table
        'strings'              => array(
            'page_title'                                   => esc_html__( 'Install Required Plugins', 'logancee' ),
            'menu_title'                                   => esc_html__( 'Install Plugins', 'logancee' ),
            'installing'                                   => esc_html__( 'Installing Plugin: %s', 'logancee' ), // %1$s = plugin name
            'oops'                                         => esc_html__( 'Something went wrong with the plugin API.', 'logancee' ),
            'notice_can_install_required'                 => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'logancee' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'logancee' ), // %1$s = plugin name(s)
            'notice_cannot_install'                      => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'logancee' ), // %1$s = plugin name(s)
            'notice_can_activate_required'                => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'logancee' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'            => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'logancee' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                     => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'logancee' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                         => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'logancee' ), // %1$s = plugin name(s)
            'notice_cannot_update'                         => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'logancee'  ), // %1$s = plugin name(s)
            'install_link'                                   => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'logancee' ),
            'activate_link'                               => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'logancee' ),
            'return'                                       => esc_html__( 'Return to Required Plugins Installer', 'logancee' ),
            'plugin_activated'                             => esc_html__( 'Plugin activated successfully.', 'logancee' ),
            'complete'                                     => esc_html__( 'All plugins installed and activated successfully. %s', 'logancee' ), // %1$s = dashboard link
            'nag_type'                                    => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );

    tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'logancee_register_required_plugins' );
