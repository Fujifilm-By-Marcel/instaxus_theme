<?php

defined( 'ABSPATH' ) or die( 'You cannot access this script directly' );

add_action( 'admin_init', 'logancee_import' );


function logancee_import() {
    global $wpdb;
    if ( current_user_can( 'administrator' ) && isset( $_GET['import_sample_content'] ) ) {



        $logancee_skins_config = json_decode(get_option('logancee_skins_config'), true);

        if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true); // we are loading importers

        if ( ! class_exists( 'WP_Importer' ) ) { // if main importer class doesn't exist
            $wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
            include $wp_importer;
        }

        if ( ! class_exists('WP_Import') ) { // if WP importer doesn't exist
            $wp_import = logancee_sys_theme_plugins.'/importer/wordpress-importer.php';
            if(!function_exists('wordpress_importer_init') && file_exists($wp_import)){
                include $wp_import;
            }else{
                wp_redirect( 'admin.php?page=logancee_options_options&import_success=false' );
            }

        }



        if ( class_exists( 'WP_Importer' ) && class_exists( 'WP_Import' ) ) { // check for main import class and wp import class

            $importer = new WP_Import();

            $theme_xml = logancee_sys_theme_plugins.'/importer/sample_data/'.$logancee_skins_config['active_skin'].'/sample_data.xml';
            $importer->fetch_attachments = true;
            ob_start();
            $importer->import($theme_xml);
            ob_end_clean();


            // Set woocommerce pages
            $woopages = array(
                'woocommerce_shop_page_id' => 'Shop',
                'woocommerce_cart_page_id' => 'Cart',
                'woocommerce_checkout_page_id' => 'Checkout',
                'woocommerce_pay_page_id' => 'Checkout &#8594; Pay',
                'woocommerce_thanks_page_id' => 'Order Received',
                'woocommerce_myaccount_page_id' => 'My Account',
                'woocommerce_edit_address_page_id' => 'Edit My Address',
                'woocommerce_view_order_page_id' => 'View Order',
                'woocommerce_change_password_page_id' => 'Change Password',
                'woocommerce_logout_page_id' => 'Logout',
                'woocommerce_lost_password_page_id' => 'Lost Password'
            );
            foreach ($woopages as $woo_page_name => $woo_page_title) {
                $woopage = get_page_by_title( $woo_page_title );
                if (isset($woopage) && $woopage->ID) {
                    update_option($woo_page_name, $woopage->ID); // Front Page
                }
            }


            // We no longer need to install pages
            delete_option( '_wc_needs_pages' );
            delete_transient( '_wc_activation_redirect' );

            // Flush rules after install
            flush_rewrite_rules();

            // Set imported menus to registered theme locations
            $locations = get_theme_mod( 'nav_menu_locations' ); // registered menu locations in theme
            $locations = logancee_get_theme_menus();

            $menus = wp_get_nav_menus(); // registered menus

            if ($menus) {
                foreach($menus as $menu) { // assign menus to theme locations
                    if( $menu->slug == 'main-menu' && $logancee_skins_config['active_skin'] != 'sport') {
                        $locations['main_menu'] = $menu->term_id;
                    } else if( $menu->slug == 'top-nav'  &&  $logancee_skins_config['active_skin'] != 'sport') {
                        $locations['top_nav'] = $menu->term_id;
                    } else if( $menu->slug == 'lang-switcher' ) {
                        $locations['lang_switcher'] = $menu->term_id;
                    }else if($menu->slug == 'top-nav' &&  $logancee_skins_config['active_skin'] == 'sport'){
                        $locations['main_menu'] = $menu->term_id;
                    }
                }
            }

            set_theme_mod( 'nav_menu_locations', $locations ); // set menus to locations

            // Add widgets
            $widgets_json = logancee_sys_theme_plugins_uri.'/importer/sample_data/'.$logancee_skins_config['active_skin'].'/widget_data.json';
            $widgets_json = wp_remote_get( $widgets_json );
            $widget_data = $widgets_json['body'];
            $import_widgets = logancee_import_widget_data( $widget_data );


            // home page as started page
            $home = get_page_by_title( 'Home' );

            if ($home->ID){
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front',  $home->ID);
            }
            $posts_page = get_page_by_title( 'Blog' );

            if (isset($posts_page->ID) && $posts_page->ID) {
                update_option('page_for_posts', $posts_page->ID); // Blog Page
            }

            // finally redirect to success pageimport_success=true
            wp_redirect( 'admin.php?page=logancee_options_options&import_success=true' );
        }
    }
}

// Parsing Widgets Function
// Reference: http://wordpress.org/plugins/widget-settings-importexport/
function logancee_import_widget_data( $widget_data ) {
    $json_data = $widget_data;
    $json_data = json_decode( $json_data, true );

    $sidebar_data = $json_data[0];
    $widget_data = $json_data[1];


    foreach ( $widget_data as $widget_data_title => $widget_data_value ) {
        $widgets[ $widget_data_title ] = '';
        foreach( $widget_data_value as $widget_data_key => $widget_data_array ) {
            if( is_int( $widget_data_key ) ) {
                $widgets[$widget_data_title][$widget_data_key] = 'on';
            }
        }
    }
    unset($widgets[""]);

    foreach ( $sidebar_data as $title => $sidebar ) {
        $count = count( $sidebar );
        for ( $i = 0; $i < $count; $i++ ) {
            $widget = array( );
            $widget['type'] = trim( substr( $sidebar[$i], 0, strrpos( $sidebar[$i], '-' ) ) );
            $widget['type-index'] = trim( substr( $sidebar[$i], strrpos( $sidebar[$i], '-' ) + 1 ) );
            if ( !isset( $widgets[$widget['type']][$widget['type-index']] ) ) {
                unset( $sidebar_data[$title][$i] );
            }
        }
        $sidebar_data[$title] = array_values( $sidebar_data[$title] );
    }

    foreach ( $widgets as $widget_title => $widget_value ) {
        foreach ( $widget_value as $widget_key => $widget_value ) {
            $widgets[$widget_title][$widget_key] = $widget_data[$widget_title][$widget_key];
        }
    }

    $sidebar_data = array( array_filter( $sidebar_data ), $widgets );
    logancee_parse_import_data( $sidebar_data );
}

function logancee_parse_import_data( $import_array ) {
    global $wp_registered_sidebars;


    // remove default widgets
    update_option('widget_search', array());
    update_option('widget_categories', array());
    update_option('widget_recent-posts', array());
    update_option('widget_recent-comments', array());
    update_option('widget_archives', array());
    update_option('widget_meta', array());

    $sidebars_data = $import_array[0];
    $widget_data = $import_array[1];
    $current_sidebars = get_option( 'sidebars_widgets' );
    $new_widgets = array( );



    foreach ( $sidebars_data as $import_sidebar => $import_widgets ) :

        foreach ( $import_widgets as $import_widget ) :
            //if the sidebar exists
            if ( isset( $wp_registered_sidebars[$import_sidebar] ) ) :
                $title = trim( substr( $import_widget, 0, strrpos( $import_widget, '-' ) ) );
                $index = trim( substr( $import_widget, strrpos( $import_widget, '-' ) + 1 ) );
                $current_widget_data = get_option( 'widget_' . $title );
                $new_widget_name = logancee_get_new_widget_name( $title, $index );
                $new_index = trim( substr( $new_widget_name, strrpos( $new_widget_name, '-' ) + 1 ) );

                if ( !empty( $new_widgets[ $title ] ) && is_array( $new_widgets[$title] ) ) {
                    while ( array_key_exists( $new_index, $new_widgets[$title] ) ) {
                        $new_index++;
                    }
                }
                $current_sidebars[$import_sidebar][] = $title . '-' . $new_index;
                if ( array_key_exists( $title, $new_widgets ) ) {
                    $new_widgets[$title][$new_index] = $widget_data[$title][$index];
                    $multiwidget = $new_widgets[$title]['_multiwidget'];
                    unset( $new_widgets[$title]['_multiwidget'] );
                    $new_widgets[$title]['_multiwidget'] = $multiwidget;
                } else {
                    $current_widget_data[$new_index] = $widget_data[$title][$index];
                    $current_multiwidget = (isset($current_widget_data['_multiwidget']))?$current_widget_data['_multiwidget']:'';
                    $new_multiwidget = isset($widget_data[$title]['_multiwidget']) ? $widget_data[$title]['_multiwidget'] : false;
                    $multiwidget = ($current_multiwidget != $new_multiwidget) ? $current_multiwidget : 1;
                    unset( $current_widget_data['_multiwidget'] );
                    $current_widget_data['_multiwidget'] = $multiwidget;
                    $new_widgets[$title] = $current_widget_data;
                }

            endif;
        endforeach;
    endforeach;


    if ( isset( $new_widgets ) && isset( $current_sidebars ) ) {
        update_option( 'sidebars_widgets', $current_sidebars );

        foreach ( $new_widgets as $title => $content ){

            // Logancee ONLY
            if($title == 'footer_menu'){
                if(!empty($content))
                {
                    foreach ($content as &$item){
                        if($item['title'] == 'INFORMATION'){
                            $term = get_term_by('name', 'Footer I', 'nav_menu');
                            $item['nav_menu'] = $term->term_id;
                        }
                        if($item['title'] == 'MY ACCOUNT'){
                            $term = get_term_by('name', 'Footer II', 'nav_menu');
                            $item['nav_menu'] = $term->term_id;
                        }
                    }
                }
            }
            if($title == 'sidebar_menu'){
                if(!empty($content))
                {
                    foreach ($content as &$item){
                        if($item['title'] == 'Categories'){
                            $term = get_term_by('name', 'Sidebar menu', 'nav_menu');
                            $item['nav_menu'] = $term->term_id;
                        }
                    }
                }
            }

            // END LOGANCEE ONLY


            update_option( 'widget_' . $title, $content );
        }

        return true;
    }

    return false;
}

function logancee_get_new_widget_name( $widget_name, $widget_index ) {
    $current_sidebars = get_option( 'sidebars_widgets' );
    $all_widget_array = array( );
    foreach ( $current_sidebars as $sidebar => $widgets ) {
        if ( !empty( $widgets ) && is_array( $widgets ) && $sidebar != 'wp_inactive_widgets' ) {
            foreach ( $widgets as $widget ) {
                $all_widget_array[] = $widget;
            }
        }
    }
    while ( in_array( $widget_name . '-' . $widget_index, $all_widget_array ) ) {
        $widget_index++;
    }
    $new_widget_name = $widget_name . '-' . $widget_index;
    return $new_widget_name;
}

?>
