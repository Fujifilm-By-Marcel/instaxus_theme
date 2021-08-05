<?php
/**
 * Instax functions and definitions.
 *
 * INSTAX UK
 * 
 * @package Instax
 */
// Define Directories
define('logancee_sys_lib', get_template_directory().'/inc'); // Includes

define('logancee_sys_template_dir', get_template_directory()); // Template Directory
define('logancee_sys_template_uri', get_template_directory_uri()); // Template Directory URI
define('logancee_sys_theme_css', logancee_sys_template_uri.'/css'); // CSS URI
define('logancee_sys_theme_js', logancee_sys_template_uri.'/js'); // JS URI
define('logancee_sys_theme_plugins', logancee_sys_template_dir.'/inc/plugins'); // get plugins directory
define('logancee_sys_theme_plugins_uri', logancee_sys_template_uri.'/inc/plugins'); // get plugins uri


$theme = wp_get_theme();
define('logancee_version', $theme->get('Version'));


// Get users country code 
/*
function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}
*/


// Function for Content Type, ReduxFramework


function logancee_get_core_skins(){
    $SKINS_CORE = array('default', 'home_carousel', 'home_fluid_width', 'home_parallax', 'home_presentation',
        'home_boxed_sidebar', 'home_interior', 'home_sunglasses', 'home_jewelry', 'home_boxed_various', 'home_bags',
        'home_shoes', 'home_barber', 'home_cosmetic', 'home_watches');
    return $SKINS_CORE;
}

// Register Navigation Menu
register_nav_menus( array(
    'main_menu' => esc_html__('Main Menu', 'logancee'),
    'top_nav' => esc_html__('Top Navigation', 'logancee'),
    'lang_switcher' => esc_html__('Lang Switcher', 'logancee'),
    'sidebar_menu' => esc_html__('Sidebar Menu', 'logancee'),
));

function logancee_get_theme_menus(){
    return array(
        'main_menu' => esc_html__('Main Menu', 'logancee'),
        'top_nav' => esc_html__('Top Navigation', 'logancee'),
        'lang_switcher' => esc_html__('Lang Switcher', 'logancee'),
        'sidebar_menu' => esc_html__('Sidebar Menu', 'logancee'),
    );
}


function logancee_addAndOverridePanelCSS() {
    wp_enqueue_style(
      'redux-custom-css',
      get_template_directory_uri() . '/admin/css/panel.css',
      array( 'farbtastic' ), // Notice redux-admin-css is removed and the wordpress standard farbtastic is included instead
      time(),
      'all'
    );    
}

add_action( 'redux/page/logancee_options/enqueue', 'logancee_addAndOverridePanelCSS' );

add_action ('redux/options/logancee_options/saved', 'logancee_save_config_file');
add_action ('redux/options/logancee_options/settings/change', 'logancee_save_config_file');
add_action('customize_save_after', 'logancee_save_config_file_customizer', 100);


function logancee_get_active_skin($dash = false){
    $logancee_skins_config = json_decode(get_option('logancee_skins_config'), true);
    return isset($logancee_skins_config['active_skin']) ? ($dash ? str_replace('_', '-', $logancee_skins_config['active_skin']) : $logancee_skins_config['active_skin']) : 'default';
}


function logancee_save_config_file($arg){
    
    $logancee_skins_config = json_decode(get_option('logancee_skins_config'), true);
    $logancee_skins_config['skins'][$logancee_skins_config['active_skin']] = $arg;
    update_option('logancee_skins_config', json_encode($logancee_skins_config));
   
}

function logancee_save_config_file_customizer($arg){
    global $logancee_options; 
    if($logancee_options){
        $logancee_skins_config = json_decode(get_option('logancee_skins_config'), true);
        $logancee_skins_config['skins'][$logancee_skins_config['active_skin']] = $logancee_options;
        update_option('logancee_skins_config', json_encode($logancee_skins_config));
    }
}


add_action ('redux/loaded', 'logancee_load_config_file', 10);
add_action ('redux/loaded', 'logancee_init_conf', 20);

function logancee_load_config_file($logancee){
    global $logancee_options;
        
    global $wp_customize;
    if (! isset( $wp_customize ) && is_admin()) {
    
        $logancee_skins_config = json_decode(get_option('logancee_skins_config'), true);

        $args = $logancee_skins_config['skins'][$logancee_skins_config['active_skin']];
        
        $args['skin-theme'] = $logancee_skins_config['active_skin'];

        $logancee->options = $args;

        $logancee_options = $args;
    }

}


function logancee_init_conf(){
    $logancee_options = logancee_get_options();


    if(isset($logancee_options['productpage-layout']) && $logancee_options['productpage-layout'] == 1) {

        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs');
        add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 15);

        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 15);

        add_filter('woocommerce_product_tabs', 'logancee_remove_product_tabs', 98);

        function logancee_remove_product_tabs($tabs)
        {
            $tabs['description']['title'] = __('Short description', 'logancee');
            $tabs['description']['callback'] = 'logancee_get_short_product_desc';
            return $tabs;

        }

        function logancee_get_short_product_desc()
        {

            $post = logancee_get_post();

            if (!$post->post_excerpt) {
                return;
            }
            echo $post->post_excerpt;
        }

    }
}

add_action( 'wp_ajax_logancee_ajax_skin_activate', 'logancee_skin_activate' );
function logancee_skin_activate() {
    $logancee_skins_config = json_decode(get_option('logancee_skins_config'), true);
    $logancee_skins_config['active_skin'] = $_POST['skin']; 
    update_option('logancee_skins_config', json_encode($logancee_skins_config));
    
    $response = array(
        'status' => 'success',
        'action' => 'reload'
    );
    echo json_encode($response);
    die();
}

add_action( 'wp_ajax_logancee_ajax_skin_create', 'logancee_skin_create' );
function logancee_skin_create() {
    $new_skin = logancee_slugify($_POST['skin']);
    
    $logancee_skins_config = json_decode(get_option('logancee_skins_config'), true);
    $logancee_skins_config['skins'][$new_skin] = array();
    update_option('logancee_skins_config', json_encode($logancee_skins_config));
    
    $response = array(
        'status' => 'success',
        'action' => 'reload'
    );
    echo json_encode($response);
    die();
}

add_action( 'wp_ajax_logancee_ajax_skin_remove', 'logancee_skin_remove' );
function logancee_skin_remove() {
    $skin = $_POST['skin'];
    $logancee_skins_config = json_decode(get_option('logancee_skins_config'), true);
    if($skin != $logancee_skins_config['active_skin']){
        unset($logancee_skins_config['skins'][$skin]);
        update_option('logancee_skins_config', json_encode($logancee_skins_config));
    }else{
        $response = array(
            'status' => 'You cannot remove active skin',
        );
        echo json_encode($response);
        die();
    }
    
    $response = array(
        'status' => 'success',
        'action' => 'reload'
    );
    echo json_encode($response);
    die();
 }

function logancee_redux_remove_demo_link() { 

    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'logancee_redux_remove_demo_link');

 
function logancee_slugify($text)
{ 
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

    // trim
    $text = trim($text, '-');

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    if (empty($text))
    {
      return 'n-a';
    }

    return $text;
}

function logancee_install_predefined_skins(){
    $logancee_skins_config = array(
        'skins' => array(),
        'active_skin' => 'default'
    );
    $skins = logancee_get_core_skins();
    foreach($skins as $skin){
        $config = json_decode(wp_remote_fopen(logancee_sys_template_uri . '/admin/skins/'.$skin .'.json'), true);
        $logancee_skins_config['skins'][$skin] = $config;
    }
    update_option('logancee_skins_config', json_encode($logancee_skins_config)); 
} 

function logancee_layouts() {
    return array(
        "fullwidth" => esc_html__("Full Width", 'logancee'),
        "left-sidebar" => esc_html__("Left Sidebar", 'logancee'),
        "right-sidebar" => esc_html__("Right Sidebar", 'logancee'),
    );
}

function logancee_ct_sidebars() {
    global $wp_registered_sidebars;
    
    $sidebar_options = array();
    if (!empty($wp_registered_sidebars)) {
        foreach ($wp_registered_sidebars as $sidebar) {
            $sidebar_options[$sidebar['id']] = $sidebar['name'];
        }
    };
    
    return $sidebar_options;
}


function logancee_slider_type() {
    return array(
        "custom_block" => esc_html__("Custom Block", 'logancee'),
        "revslider" => esc_html__("Revolution Slider", 'logancee'),

    );
}

function logancee_slider_align() {
    return array(
        "standard" => esc_html__("Standard", 'logancee'),
        "top" => esc_html__("Top", 'logancee'),

    );
}


function logancee_revslider_list() {
    global $wpdb;
    
    $table_name = esc_sql($wpdb->prefix . "revslider_sliders");
    
    $sql_table_name = $wpdb->get_var( $wpdb->prepare(
        "SHOW TABLES LIKE %s",
        $table_name
    ));
    
    if ($sql_table_name == $table_name) {
        $sliders = $wpdb->get_results("SELECT * FROM " . esc_sql($sql_table_name));
        $rev_sliders = array();
        if (!empty($sliders)) {
            foreach($sliders as $slider) {
                $rev_sliders[$slider->alias] = '#'.$slider->id.': '.$slider->title;
            }
        }
        
        return $rev_sliders;
    }
    
    return null;
}   

if ( ! function_exists( 'logancee_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function logancee_setup() {

	/*
	 * Add Redux Framework
	 */
	require get_template_directory() . '/admin/admin-init.php';


	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded title tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'logancee' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );


    // Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'logancee_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) ); 
}

endif; // logancee_setup
add_action( 'after_setup_theme', 'logancee_setup' );


    
// Theme setup
add_action('after_setup_theme', 'logancee_theme_setup');

if ( ! function_exists( 'logancee_theme_setup' ) ) : function logancee_theme_setup(){
    if (function_exists('add_theme_support')) {
        // Default RSS feed links
        add_theme_support('automatic-feed-links');
        // Woocommerce Support
        add_theme_support('woocommerce');
        // Post Formats
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio', 'chat'));
        // Image Size
        add_theme_support('post-thumbnails');


        add_editor_style();
    }
    // Translation
    load_theme_textdomain('logancee', get_stylesheet_directory() . '/languages');
    

    $logancee_skins_config = get_option('logancee_skins_config');
             
    //install predefined skins
    if(!$logancee_skins_config){
        logancee_install_predefined_skins();
    }
    
} endif;

// Location Files
$locale = get_locale();
$locale_file = get_template_directory_uri() . "/languages/$locale.php";
if (is_readable($locale_file) )
    require_once($locale_file);



if ( defined( 'WOOCOMMERCE_VERSION' ) ) {
    if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
        add_filter( 'woocommerce_enqueue_styles', '__return_false' );
    } else {
        define( 'WOOCOMMERCE_USE_CSS', false );
    }
}


// Theme Activation Hook
add_action('admin_init','logancee_theme_activation');

function logancee_theme_activation() {
    global $pagenow;
    if(is_admin() && 'themes.php' == $pagenow && isset($_GET['activated']))
    {
        update_option('shop_catalog_image_size', array('width' => 540, 'height' => '', 0));
        update_option('shop_single_image_size', array('width' => 800, 'height' => '', 0));
        update_option('shop_thumbnail_image_size', array('width' => 128, 'height' => '', 0));


    }
}

require_once(get_template_directory() . '/inc/widgets.php');
require_once(get_template_directory() . '/inc/shortcodes.php');
require_once(get_template_directory() . '/inc/plugins.php');
require_once(get_template_directory() . '/inc/content_types.php');    
require_once(get_template_directory() . '/inc/menu.php');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

function logancee_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'logancee_content_width', 640 );
}
add_action( 'after_setup_theme', 'logancee_content_width', 0 );

/* get global vars */
function logancee_get_options(){
    global $logancee_options;
    if(empty($logancee_options)){
        //logancee_install_predefined_skins();
        $logancee_skins_config = json_decode(get_option('logancee_skins_config'),true);
        $logancee_options = $logancee_skins_config['skins'][$logancee_skins_config['active_skin']];

        $logancee_options['skin-theme'] = $logancee_skins_config['active_skin'];
    }
    return $logancee_options;
}
function logancee_get_product(){
    global $product;
    return $product;
}
function logancee_get_post(){
    global $post;
    return $post;
}
function logancee_get_woocommerce(){
    global $woocomerce;
    return $woocomerce;
}
function logancee_get_woocommerce_loop(){
    global $logancee_woocommerce_loop;
    return $logancee_woocommerce_loop;
}
function logancee_get_yith_woocompare(){
    global $yith_woocompare;
    return $yith_woocompare;
}
function logancee_get_yith_ajax_searchform_count(){
    global $yith_ajax_searchform_count;
    return $yith_ajax_searchform_count;
}
function logancee_get_wp_query(){
    global $wp_query;
    return $wp_query;
}


/**
 * Enqueue scripts and styles.
 */

// FONTS 

function logancee_slug_fonts_url() {
    $fonts_url = '';

    $lato_sans = _x( 'on', 'Lato font: on or off', 'logancee' );
    $montserrat_sans = _x( 'on', 'Montserrat font: on or off', 'logancee' );
    $oswald = _x( 'on', 'Oswald font: on or off', 'logancee' );

    if ('off' !== $lato_sans || 'off' !== $montserrat_sans) {
        $font_families = array();


        if ( 'off' !== $lato_sans ) {
            $font_families[] = 'Lato:800,700,600,500,400,300';
        }
        if ( 'off' !== $montserrat_sans ) {
            $font_families[] = 'Montserrat:800,700,600,500,400,300';
        }
        if ( 'off' !== $oswald ) {
            $font_families[] = 'Oswald:800,700,600,500,400,300';
        }

        $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
}

function logancee_slug_scripts_styles() {
    wp_enqueue_style( 'logancee-fonts', logancee_slug_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'logancee_slug_scripts_styles' );

function logancee_site_icon_url($url, $size, $blog_id) {
    $logancee_options = logancee_get_options();

    if(isset($logancee_options['layout-favicon']) && $logancee_options['layout-favicon']){
        $url = $logancee_options['layout-favicon']['url'];
    }
    return $url;
}
add_filter('get_site_icon_url', 'logancee_site_icon_url', 5, 3);

// Load Admin CSS
function logancee_admin_scripts() {
    wp_enqueue_style('logancee_admin_css', logancee_sys_template_uri .'/admin/css/panel.css', false, logancee_version, 'all');

    // config admin styles
    wp_enqueue_style( 'system-admin', logancee_sys_template_uri . '/admin/css/panel.css' );
}


/*
 * LOAD CSS
 * */
add_action('wp_enqueue_scripts', 'logancee_css');
add_action('admin_enqueue_scripts', 'logancee_admin_scripts');
 
// Load CSS
function logancee_css() {
    $logancee_options = logancee_get_options();

    // bootstrap styles
    wp_enqueue_style( 'bootstrap', logancee_sys_theme_css . '/bootstrap.css' );

    if(is_rtl()) {
        // bootstrap rtl styles
        wp_enqueue_style('bootstrap_rtl', logancee_sys_theme_css . '/bootstrap_rtl.css');
    }

    // flag-icon styles
    wp_enqueue_style( 'flag-icon', logancee_sys_theme_css . '/flag-icon.min.css' );

    // animate styles
    wp_enqueue_style( 'animate', logancee_sys_theme_css . '/animate.css' );

    // eleganticons styles
    wp_enqueue_style( 'eleganticons', logancee_sys_theme_css . '/eleganticons.css' );

    // simple-line-icons styles
    wp_enqueue_style( 'simple-line-icons', logancee_sys_theme_css . '/simple-line-icons.css' );

    // jquery-vegas styles
    wp_enqueue_style( 'jquery-vegas', logancee_sys_theme_css . '/jquery.vegas.css' );

    // jqueryui styles
    wp_enqueue_style( 'jqueryui', logancee_sys_theme_css . '/jquery-ui.min.css' );

    // slider styles
    wp_enqueue_style( 'slider', logancee_sys_theme_css . '/slider.css' );

    // menu styles
    wp_enqueue_style( 'menu', logancee_sys_theme_css . '/menu.css' );

    // yith styles
    wp_enqueue_style( 'yith', logancee_sys_theme_css . '/yith.css' );

    // icheck styles
    wp_enqueue_style( 'icheck', logancee_sys_theme_css . '/icheck.css' );

    // fullPage styles
    wp_enqueue_style( 'fullPage', logancee_sys_theme_css . '/jquery.fullPage.css' );

    // magnific-popup
    wp_enqueue_style( 'magnific-popup', logancee_sys_theme_css . '/magnific-popup.css' );

    // owl.carousel styles
    wp_enqueue_style( 'owl.carousel', logancee_sys_theme_css . '/owl.carousel.css' );

    // filter_product styles
    wp_enqueue_style( 'filter_product', logancee_sys_theme_css . '/filter_product.css' );

    // font-awesome styles
    wp_enqueue_style( 'awesome', logancee_sys_theme_css . '/font-awesome.min.css' );

    // blog styles
    wp_enqueue_style( 'blog', logancee_sys_theme_css . '/blog/blog.css' );

    // blog-articles styles
    wp_enqueue_style( 'blog-article', logancee_sys_theme_css . '/blog/article.css' );

    // logancee styles
    wp_enqueue_style( 'style', logancee_sys_template_uri . '/style.css' );

    // logancee styles
    wp_enqueue_style( 'stylesheet', logancee_sys_theme_css . '/stylesheet.css' );

    // multiscroll styles
    wp_enqueue_style( 'multiscroll', logancee_sys_theme_css . '/jquery.multiscroll.css' );

    // woocommerce styles
    wp_enqueue_style( 'woocommerce', logancee_sys_theme_css . '/woocommerce.css' );

    // responsive styles
    wp_enqueue_style( 'responsive', logancee_sys_theme_css . '/responsive.css' );

    // logancee js composer
    wp_enqueue_style( 'js_composer', logancee_sys_theme_css . '/js_composer.css' );

    // slick
    wp_enqueue_style( 'slick', logancee_sys_theme_css . '/slick.css' );
    // portfolio
    wp_enqueue_style( 'portfolio', logancee_sys_theme_css . '/portfolio.css' );


    if($logancee_options['layout-page-width'] == 1){
        wp_enqueue_style( 'wide-grid', logancee_sys_theme_css . '/wide-grid.css' );
    }
    if($logancee_options['layout-page-width'] == 2){
        wp_enqueue_style( 'standard-grid', logancee_sys_theme_css . '/standard-grid.css' );
    }
    
}

function logancee_print_inline_head() {
    $logancee_options = logancee_get_options();
    ob_start(); 
    ?>
     <!-- JS -->
     <script type="text/javascript">
         var responsive_design = '<?php if($logancee_options['layout-responsive'] == 0) { echo 'no'; } else { echo 'yes'; } ?>';
     </script>
     
    <?php
    require_once(get_template_directory(). '/inc/custom_colors.php');
    require_once(get_template_directory(). '/inc/style_configuration.php');
    
    echo ob_get_clean();
}
add_action( 'wp_head', 'logancee_print_inline_head' );


function logancee_print_inline_footer() {
    $logancee_options = logancee_get_options();
    ob_start(); 
    ?>
    <?php if($logancee_options['product-quickview-status'] == 1) { ?>
    <script type="text/javascript">
        (function($) { 
            $(window).on('load', function(){
                 $('.quickview a').magnificPopup({
                      preloader: true,
                      tLoading: '',
                      type: 'ajax',
                      mainClass: 'quickview',
                      removalDelay: 200,
                      gallery: {
                       enabled: true
                      }
                 });
            });
        })(jQuery)
    </script>
    <?php } ?>



    <?php if($logancee_options['js-status'] == 1):?>
        <script type="text/javascript">
            <?php echo ($logancee_options['js-value']); ?>
        </script>
    <?php endif; ?>
    <?php
    
    echo ob_get_clean();
}
add_action( 'wp_footer', 'logancee_print_inline_footer', PHP_INT_MAX);

/*
 * LOAD JAVASCRIPT
 * */
add_action('wp_enqueue_scripts', 'logancee_scripts');

function logancee_scripts() {    
if (!is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) )) {
    wp_reset_postdata();
    global $wp_scripts; 
    $logancee_options = logancee_get_options();
 
    wp_enqueue_style( 'logancee-style', get_stylesheet_uri() );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}    

    // jquery.easing scripts
    wp_enqueue_script( 'jquery.easing', logancee_sys_theme_js.'/jquery.easing.1.3.js', array(), null, true);    
    
    // bootstrap scripts
    wp_enqueue_script( 'bootstrap', logancee_sys_theme_js.'/bootstrap.min.js', array(), null, true);

    // twitter-bootstrap-hover-dropdown scripts
    wp_enqueue_script( 'twitter-bootstrap-hover-dropdown', logancee_sys_theme_js.'/twitter-bootstrap-hover-dropdown.js', array(), null, true);

    // bootstrap-notify scripts
    wp_enqueue_script( 'bootstrap-notify', logancee_sys_theme_js.'/bootstrap-notify.min.js', array(), null, true);    

    // twitter-bootstrap-hover-dropdown scripts
    wp_enqueue_script( 'twitter-bootstrap-hover-dropdown', logancee_sys_theme_js.'/twitter-bootstrap-hover-dropdown.js', array(), null, true);
    
    // tweetfeed
    wp_enqueue_script( 'tweetfeed', logancee_sys_theme_js.'/tweetfeed.min.js', array(), null, true);

    // owl.carousel
    wp_enqueue_script( 'owl.carousel', logancee_sys_theme_js.'/owl.carousel.min.js', array(), null, true);

    // jquery.magnific-popup
    wp_enqueue_script( 'jquery.magnific-popup', logancee_sys_theme_js.'/jquery.magnific-popup.min.js', array(), null, true);

    // megamenu
    wp_enqueue_script( 'megamenu', logancee_sys_theme_js.'/megamenu.js', array(), null, true);

    // jquery.cookie
    wp_enqueue_script( 'jquery.cookie', logancee_sys_theme_js.'/jquery.cookie.js', array(), null, true);

    // icheck
    wp_enqueue_script( 'icheck', logancee_sys_theme_js.'/icheck.min.js', array(), null, true);

    // jquery.matchHeight
    wp_enqueue_script( 'matchHeight', logancee_sys_theme_js.'/jquery.matchHeight.min.js', array(), null, true);

    // jquery.fullPage
    wp_enqueue_script( 'fullPage', logancee_sys_theme_js.'/jquery.fullPage.min.js', array(), null, true);

    // jquery.multiscroll
    wp_enqueue_script( 'multiscroll', logancee_sys_theme_js.'/jquery.multiscroll.min.js', array(), null, true);

    // jquery.scrolly
    wp_enqueue_script( 'scrolly', logancee_sys_theme_js.'/jquery.scrolly.js', array(), null, true);
    
    // megamenu
    wp_enqueue_script( 'commons', logancee_sys_theme_js.'/common-v2.min.js', array(), null, true);

    // ElevateZoom
    wp_enqueue_script( 'elevatezoom', logancee_sys_theme_js.'/jquery.elevateZoom-3.0.3.min.js', array(), null, true);

    // Masonry
    wp_enqueue_script( 'masonrypkgd', logancee_sys_theme_js.'/masonry.pkgd.min.js', array(), null, true);

    // Slick
    wp_enqueue_script( 'slick', logancee_sys_theme_js.'/slick.min.js', array(), null, true);

    wp_localize_script( 'commons', 'js_logancee_vars', array(
        'email' => esc_html__('Email', 'logancee'),
        'ajax_url' => esc_url(admin_url( 'admin-ajax.php' )),
        'ajax_loader_url' => logancee_sys_template_uri . '/images/ajax-loader@2x.gif',
        'add_to_cart_msg_success' => esc_html__('Product successfully added to your cart.', 'logancee'),
        'add_to_wishlist_msg_success' => esc_html__( 'Product successfully added to your wishlist.','logancee' ) 
    ) );
    
        

    if($logancee_options['product-lazy-load-img'] != 0){
        wp_enqueue_script( 'echo', logancee_sys_theme_js.'/echo.min.js', array(), null, true);
    }

    if($logancee_options['header-sticky-status'] != 0){
        wp_enqueue_script( 'jquery.sticky', logancee_sys_theme_js.'/jquery.sticky.js', array(), null, true);
    }

    if($logancee_options['product-quickview-status'] != 0){
        wp_enqueue_script( 'wc-add-to-cart-variation' );
    }
    
    // Specials countdown
    if($logancee_options['product-countdown-status'] == '1') {

        wp_enqueue_script( 'jquery.plugin', logancee_sys_theme_js.'/jquery.plugin.min.js', array(), null, true);
        
        wp_enqueue_script( 'jquery.countdown', logancee_sys_theme_js.'/jquery.countdown.min.js', array(), null, true);

    }

    // Portfolio
    wp_enqueue_script( 'portfolio', logancee_sys_theme_js.'/portfolio.js', array(), null, true);
    wp_localize_script( 'portfolio' , 'logancee_loadmoreportfolio' , array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );


    // If Portfolio Custom Templates are loaded then load this script with it
    if( is_page_template( 'template-portfolio-col-1.php' ) || is_page_template( 'template-portfolio-col-2.php' ) || is_page_template( 'template-portfolio-col-3.php' ) || is_page_template( 'template-portfolio-masonary-1.php' ) || is_page_template( 'template-portfolio-masonary-2.php' ) || is_page_template( 'template-portfolio-masonary-3.php' ) || is_page_template( 'template-portfolio-masonary-4.php' ) || is_page_template( 'template-portfolio-style-1.php' ) || is_page_template( 'template-portfolio-style-2.php' ) || is_page_template( 'template-portfolio-style-3.php' ) || is_page_template( 'template-portfolio-style-4.php' ) ) {
        wp_localize_script( 'logancee_portfolioloadmoretemplate' , 'logancee_loadmoreportfolio' , array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    }


}  
    
}

// Ajax Responder For Portfolio Load More /
add_action( 'wp_ajax_nopriv_logancee_portfolio_ajaxloader' , 'logancee_portfolio_ajaxloader' );
add_action( 'wp_ajax_logancee_portfolio_ajaxloader' , 'logancee_portfolio_ajaxloader' );

function logancee_portfolio_ajaxloader() {
    $logancee_options = logancee_get_options();

    $logancee_page_template = esc_attr( $_POST[ 'template' ] );
    $logancee_start_point = esc_attr( $_POST[ 'click' ] );
    $logancee_limit = $logancee_options['portfolio-limit'];
    if(isset($_POST['limit'])){
        $logancee_limit = esc_attr( $_POST[ 'limit' ] );
    }    
    $logancee_cat = '';
    if(isset($_POST['category'])){
        $logancee_cat = esc_attr( $_POST[ 'category' ] );
    }

    require_once logancee_sys_template_dir . '/inc/portfolio/portfolio_loader.php';

    $logancee_load_more = new PortfolioLoader($logancee_options, $logancee_page_template , $logancee_start_point , $logancee_limit, $logancee_cat );

    $logancee_load_more->load_content();

    wp_reset_postdata();

    wp_die();
}



/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


add_action('woocommerce_before_main_content', 'logancee_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'logancee_wrapper_end', 10);

function logancee_wrapper_start() {
  echo '<section id="main">';
}

function logancee_wrapper_end() {
  echo '</section>';
}



function logancee_html_topmenu() {

    ob_start(); ?>
    <!-- top navigation -->
    <?php
    if ( has_nav_menu( 'top_nav' ) ) : ?>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'top_nav',
            'menu_class' => 'header-links',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'depth' => 0,
            'fallback_cb' => false,
            'walker' => new wp_bootstrap_navwalker
        ));
        ?>
    <?php else: ?>
        <?php echo wp_kses( 'Define your top navigation in <b>Apperance > Menus</b>', 'logancee', array( 'b' ) ) ?>
    <?php endif; ?>
    <!-- end top navigation -->
    <?php
    return ob_get_clean();
}

function logancee_html_mainmenu() {
    $logancee_options = logancee_get_options();
    ob_start(); ?>
    <!-- top navigation -->
    <div class="container-megamenu container horizontal">
        <div class="megaMenuToggle">
            <div class="megamenuToogle-wrapper">
                <div class="megamenuToogle-pattern">
                    <div class="container">
                        <div><span></span><span></span><span></span></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="megamenu-wrapper">
            <div class="megamenu-pattern">
                <div class="container">
                    <?php
                    if ( has_nav_menu( 'main_menu' ) ) : ?>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main_menu',
                            'menu_class' => 'megamenu ' . $logancee_options['menu-animation-type'],
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'fallback_cb' => false,
                            'walker' => new logancee_main_menuwalker
                        ));
                        ?>
                        <?php if($logancee_options['header-displayinmenu-status']):?>
                            <?php echo logancee_search_form(); ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php echo wp_kses( 'Define your main menu in <b>Apperance > Menus</b>', 'logancee', array( 'b' ) ) ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


    <!-- end top navigation -->
    <?php
    return ob_get_clean();
}

function logancee_sidebar_menu() {

    ob_start(); ?>
        <?php
    if ( has_nav_menu( 'sidebar_menu' ) ) : ?>
    <!-- top navigation -->
    <div class="container-megamenu container vertical">
        <div class="megaMenuToggle">
            <div class="megamenuToogle-wrapper">
                <div class="megamenuToogle-pattern">
                    <div class="container">
                        <div><span></span><span></span><span></span></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="megamenu-wrapper">
            <div class="megamenu-pattern">
                <div class="container">

                <?php
                wp_nav_menu(array(
                    'theme_location' => 'sidebar_menu',
                    'menu_class' => 'megamenu slide ',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'fallback_cb' => false,
                    'walker' => new logancee_main_menuwalker
                ));
                ?>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
         <?php echo wp_kses( 'Define your sidebar menu in <b>Apperance > Menus</b>', 'logancee', array( 'b' ) ) ?>
    <?php endif; ?>
    <!-- end top navigation -->
    <?php
    return ob_get_clean();
}


function logancee_get_allowed_tags(){
    return array(
        'a' => array(
            'href' => array (),
            'title' => array ()),
        'abbr' => array(
            'title' => array ()),
        'acronym' => array(
            'title' => array ()),
        'b' => array(),
        'blockquote' => array(
            'cite' => array ()),
        'cite' => array (),
        'p' => array (),
        'br' => array (),
        'del' => array(
            'datetime' => array ()),
        'em' => array (), 'i' => array (),
        'q' => array(
            'cite' => array ()),
        'strike' => array(),
        'strong' => array(),
    );

}

/*function logancee_html_minicart() {
    global $woocommerce, $logancee_options;


    ob_start();
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :
        $_cartQty = $woocommerce->cart->cart_contents_count;
        ?>
        <div class="block-content cart-content typo-top-cart">
            <div class="typo-maincart">
                <div class="typo-cart">
                    <div class="typo-icon-ajaxcart">
                        <a class="typo-cart-label" href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>">
                            <span class="icon-cart"><i class="icon-handbag icons"></i></span>
                            <span class="print">
                                  <span class="items total_item_ajax">
                                       <span class="qty-cart"><?php echo ($_cartQty > 0) ? $_cartQty : '0' ?></span>
                                       <span><?php esc_html_e('item(s)', 'logancee') ?></span>
                                  </span>

                                  <span>-</span>
                                  <span>
                                       <span class="price total_price_ajax"><span class="total_price"><?php echo WC()->cart->get_cart_total(); ?></span></span>
                                  </span>
                             </span>
                            <span class="icon-dropdown"><i class="fa fa-angle-down"></i></span>
                        </a>
                    </div>
                    <div class="ajaxcart mini-cart-info cart_content"><div class="cart_content_ajax">
                            <div class="ajax-over ajaxcart-scrollbar">
                                <div class="typo-ajax-container">
                                    <?php if ($_cartQty == 0) :?>
                                        <p class="no-items-in-cart"><?php echo esc_html__('No products in the cart.','woocommerce'); ?> </p>
                                    <?php else: ?>
                                        <ul class="clearfix">
                                             <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
                                                <?php
                                                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                                    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                                    $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                                                        $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                                                        $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                                        $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                                        ?>
                                                        <li class="item">
                                                            <a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>"  title="London t-shirt" class="product-image">
                                                                <?php if ( ! $_product->is_visible() ) { ?>
                                                                    <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                                                                <?php } else { ?>
                                                                    <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) ?>
                                                                <?php } ?>
                                                            <span class="qty-count"><?php echo esc_html($cart_item['quantity']); ?>x</span></a>
                                                            <div class="product-details show-grid">
                                                                <p class="product-name clearfix">
                                                                    <a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
                                                                        <?php if ( ! $_product->is_visible() ) : ?>
                                                                            <?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
                                                                        <?php else : ?>
                                                                            <?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
                                                                        <?php endif; ?>
                                                                    </a>
                                                                </p>
                                                                <div class="items clearfix"><span class="price"><?php echo $product_price; ?></span></div>
                                                                <div class="access clearfix">
                                                                    <?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="javascript:;" class="btn-remove deletecart"  title="%s" onclick="cart.remove(%s);" ><i aria-hidden="true" class="icon_close"></i></a>', esc_html__('Remove this item', 'woocommerce'), "'".$cart_item_key."'"  ), $cart_item_key ); ?>
                                                                </div>
                                                            </div>
                                                        </li>
                                                <?php } ?>
                                            <?php } ?>
                                            <?php endif; ?>
                                        </ul>


                                        <p class="subtotal"><span class="title"><?php echo esc_html__('Subtotal', 'woocommerce') ?></span> <span class="price"><?php echo WC()->cart->get_cart_total(); ?></span></p>

                                        <div class="typo-ajax-checkout clearfix">
                                            <a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>" class="button view-cart"><span><?php esc_html_e('Cart', 'woocommerce'); ?></span></a>
                                            <a class="button view-checkout" href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id')); ?>"><span><?php esc_html_e('Checkout', 'woocommerce'); ?></span></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endif;
    
    return ob_get_clean();
}
*/

function logancee_search_form() {
    if ( !class_exists( 'Woocommerce' ) ){
        return;
    }
    ?>
    <div class="search_form"> 
    <?php
        $logancee_options = logancee_get_options();
        if (is_plugin_active( 'yith-woocommerce-ajax-search/init.php' )) {
            $wc_get_template = function_exists('wc_get_template') ? 'wc_get_template' : 'woocommerce_get_template';
            $wc_get_template( 'yith-woocommerce-ajax-search.php', array(), '', YITH_WCAS_DIR . 'templates/' );
        }else{
        get_search_form();
    } ?>
    </div>
    <?php
}


if (!function_exists('logancee_comment')) :
function logancee_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>

    <div <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

        <div class="meta">
            <div class="author">
                <strong><?php echo get_comment_author_link() ?></strong>
                <span class="date">
                    <?php printf(esc_html__('%1$s at %2$s', 'logancee'), get_comment_date(),  get_comment_time()) ?></span>
                </span>
            </div>
            <?php edit_comment_link(esc_html__('Edit', 'logancee'),'  ','') ?> <?php comment_reply_link(array_merge( $args, array('reply_text' => esc_html__('Reply', 'logancee'), 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>
        <div class="text">
            <div class="avatar-wrapper">
                <?php echo get_avatar($comment, 70); ?>
            </div>
            <div class="comment-content">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php echo esc_html__('Your comment is awaiting moderation.', 'logancee') ?></em>
                    <br />
                <?php endif; ?>
                <?php comment_text() ?>
            </div>

        </div>

<?php }
endif;

// Post Comment Form Field
add_filter('comment_form_default_fields', 'logancee_comment_form_default_fields', 10, 1);
add_filter('comment_form_defaults', 'logancee_comment_form_defaults', 10, 1);

if (!function_exists('logancee_comment_form_default_fields')) :
function logancee_comment_form_default_fields($fields) {
 
    $fields['author'] = 
            '<div class="required col-xs-6 padding-left-none">
                <div>'.
                    str_replace(
                        array('<input id="author"'),
                        array('<input id="input-author" placeholder="Name*" class="form-control"'),
                        $fields['author']).
            '</div></div>';
    $fields['email'] = 
            '<div class="required col-xs-6 padding-right-none">
                <div>'.
                    str_replace(
                        array('<input id="email"'),
                        array('<input id="input-email" placeholder="Email*" class="form-control"'),
                        $fields['email']).
            '</div></div>';
  
    return $fields;
}
endif;


if (!function_exists('logancee_comment_form_defaults')) :
function logancee_comment_form_defaults($default) {
    $default['id_form'] = 'form-comment';
    $default['class_form'] = 'form-horizontal';
    $default['comment_field'] = 
            '<div class="form-group required" style="margin-bottom: 0">
                <div class="col-xs-12 comment-input-section">'
                .str_replace(
                        array('<textarea id="comment"'),
                        array('<textarea id="input-comment" class="form-control" placeholder="Comment"'),
                        $default['comment_field']).
            '</div></div>';
    $default['class_submit'] = "button button-large button-comment";
    $default['title_reply_before'] = '<div class="box-heading">';
    $default['title_reply_after'] = '</div><div class="strip-line"></div><div class="clearfix"></div>';
    $default['submit_button'] = '<div class="text-center">' . $default['submit_button']. '</div>';

    return $default;
}
endif;

if (!function_exists('get_related_posts')) :
function get_related_posts($post_id) {
    $query = new WP_Query();

    $args = '';

    $args = wp_parse_args($args, array(
        'showposts' => -1,
        'post__not_in' => array($post_id),
        'ignore_sticky_posts' => 0,
        'category__in' => wp_get_post_categories($post_id)
    ));

    $query = new WP_Query($args);

    return $query;
}
endif;


if (!function_exists('logancee_excerpt')) :
function logancee_excerpt($limit = 45, $more_link = true) {
    $logancee_options = logancee_get_options();

    $custom_excerpt = false;

    $post = get_post(get_the_ID());

    if (has_excerpt()) {
        $content = strip_tags( strip_shortcodes(get_the_excerpt()) );
    } else {
        $content = strip_tags( strip_shortcodes(get_the_content()) );
    }
    
    $content = explode(' ', $content, $limit);
    
    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }

    $content = apply_filters('the_content', $content);
    $content = do_shortcode($content);

    $content = '<div class="entry-excerpt">'.$content.' </div>';
    
    $content.= '<a class="button-more" href="'.esc_url( apply_filters( 'the_permalink', get_permalink() ) ).'">'.esc_html__('Read More', 'logancee').' <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>';
    
    return $content;
}
endif;

if(!function_exists('logancee_pagination')):
function logancee_pagination($pages = '', $range = 2)
{
    global $data;

    $showitems = ($range * 3)+2;

    global $paged;

    if (empty($paged)) $paged = 1;

    if ($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages)
        {
            $pages = 1;
        }
    }

    if (1 != $pages)
    {
        echo "<div class='clearfix'><div class=' pagination-results text-center'>";
        
        echo '<ul class="page-numbers">';
        if ($paged > 1) echo "<li><a class='prev' href='".get_pagenum_link($paged - 1)."'><</a></li>";
        for ($i=1; $i <= $pages; $i++)
        {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
            echo '<li>';
                echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
            echo '</li>';
            }
        }

        if ($paged < $pages) echo "<li><a class='next' href='".get_pagenum_link($paged + 1)."'>></a></li>";
        
        echo "</ul></div></div>\n";
    }
}
endif;

// get attribute from html tag
if (!function_exists('logancee_get_html_attribute')):
function logancee_get_html_attribute($attrib, $tag) {
    $re = '/'.$attrib.'=["\']?([^"\' ]*)["\' ]/is';
    preg_match($re, $tag, $match);

    if ($match) {
        return urldecode($match[1]);
    }
    return false;
}
endif;

// add url parameters
if (!function_exists('logancee_add_url_parameters')):
    function logancee_add_url_parameters($url, $name, $value) {
        $url_data = parse_url(str_replace('#038;', '&', $url));
        if (!isset($url_data["query"]))
            $url_data["query"]="";

        $params = array();
        parse_str($url_data['query'], $params);
        $params[$name] = $value;
        $url_data['query'] = http_build_query($params);
        return esc_attr(str_replace('#038;', '&', logancee_build_url($url_data)));
    }
endif;

// remove url parameters
if (!function_exists('logancee_remove_url_parameters')):
    function logancee_remove_url_parameters($url, $name) {
        $url_data = parse_url(str_replace('#038;', '&', $url));
        if (!isset($url_data["query"]))
            $url_data["query"]="";

        $params = array();
        parse_str($url_data['query'], $params);
        $params[$name] = "";
        $url_data['query'] = http_build_query($params);
        return str_replace('#038;', '&', logancee_build_url($url_data));
    }
endif;

// build url
if (!function_exists('logancee_build_url')):
function logancee_build_url($url_data) {
    $url="";
    if (isset($url_data['host'])) {
        $url .= $url_data['scheme'] . '://';
        if (isset($url_data['user'])) {
            $url .= $url_data['user'];
            if (isset($url_data['pass']))
                $url .= ':' . $url_data['pass'];
            $url .= '@';
        }
        $url .= $url_data['host'];
        if (isset($url_data['port']))
            $url .= ':' . $url_data['port'];
    }
    if (isset($url_data['path']))
        $url .= $url_data['path'];
    if (isset($url_data['query']))
        $url .= '?' . $url_data['query'];
    if (isset($url_data['fragment']))
        $url .= '#' . $url_data['fragment'];

    return $url;
}
endif;

// get breadcrumbs
if (!function_exists('logancee_breadcrumbs')):
function logancee_breadcrumbs() {
    $logancee_options = logancee_get_options();
    global $post, $wp_query, $author;

    $prepend = '';
    $before = '<li>';
    $after = '</li>';
    $home = esc_html__('Home', 'logancee');
    $delimiter = '';

    $shop_page_id = false;
    $shop_page = false;
    $front_page_shop = false;
    if ( defined( 'WOOCOMMERCE_VERSION' ) ) {
        $permalinks   = get_option( 'woocommerce_permalinks' );
        $shop_page_id = wc_get_page_id( 'shop' );
        $shop_page    = get_post( $shop_page_id );
        $front_page_shop = get_option( 'page_on_front' ) == wc_get_page_id( 'shop' );
    }

    // If permalinks contain the shop page in the URI prepend the breadcrumb with shop
    if ( $shop_page_id && $shop_page && strstr( $permalinks['product_base'], '/' . $shop_page->post_name ) && get_option( 'page_on_front' ) != $shop_page_id ) {
        $prepend = $before . '<a href="' . get_permalink( $shop_page ) . '">' . $shop_page->post_title . '</a> ' . $after . $delimiter;
    }

    if ( ( ! is_home() && ! is_front_page() && ! ( is_post_type_archive() && $front_page_shop ) ) || is_paged() ) {
        echo '<ul>';

        if ( ! empty( $home ) ) {
            echo $before . '<a class="home" href="' . apply_filters( 'woocommerce_breadcrumb_home_url', esc_url( home_url( '/' ) ) ) . '">' . $home . '</a>' . $after . $delimiter;
        }

        if ( is_home() ) {

            echo $before . single_post_title('', false) . $after;

        } else if ( is_category() ) {

            $cat_obj = $wp_query->get_queried_object();
            $this_category = get_category( $cat_obj->term_id );

            if ( 0 != $this_category->parent ) {
                $parent_category = get_category( $this_category->parent );
                if ( ( $parents = get_category_parents( $parent_category, TRUE, $after . $delimiter . $before ) ) && ! is_wp_error( $parents ) ) {
                    echo $before . substr( $parents, 0, strlen($parents) - strlen($after . $delimiter . $before) ) . $after . $delimiter;
                }
            }

            echo $before . single_cat_title( '', false ) . $after;

        } elseif ( is_tax('product_cat') || is_tax('portfolio_cat') || is_tax('portfolio_skills') ) {

            echo $prepend;

            $current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

            $ancestors = array_reverse( get_ancestors( $current_term->term_id, get_query_var( 'taxonomy' ) ) );

            foreach ( $ancestors as $ancestor ) {
                $ancestor = get_term( $ancestor, get_query_var( 'taxonomy' ) );

                echo $before . '<a href="' . get_term_link( $ancestor->slug, get_query_var( 'taxonomy' ) ) . '">' . esc_html( $ancestor->name ) . '</a>' . $after . $delimiter;
            }

            echo $before . esc_html( $current_term->name ) . $after;

        } elseif ( is_tax('product_tag') ) {

            $queried_object = $wp_query->get_queried_object();
            echo $prepend . $before . sprintf( esc_html__( 'Products tagged &ldquo;%s&rdquo;', 'woocommerce' ), $queried_object->name ) . $after;

        } elseif ( is_day() ) {

            echo $before . '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $after . $delimiter;
            echo $before . '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $after . $delimiter;
            echo $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {

            echo $before . '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $after . $delimiter;
            echo $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {

            echo $before . get_the_time('Y') . $after;

        } elseif ( is_post_type_archive('product') && get_option('page_on_front') !== $shop_page_id ) {

            $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';

            if ( ! $_name ) {
                $product_post_type = get_post_type_object( 'product' );
                $_name = $product_post_type->labels->singular_name;
            }

            if ( is_search() ) {

                echo $before . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $delimiter . sprintf( esc_html__( 'Search results for &ldquo;%s&rdquo;', 'woocommerce' ), get_search_query() ) . $after;

            } elseif ( is_paged() ) {

                echo $before . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $after;

            } else {

                echo $before . $_name . $after;

            }

        } elseif ( is_single() && ! is_attachment() ) {

            if ( 'product' == get_post_type() ) {

                echo $prepend;

                if ( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
                    $main_term = $terms[0];
                    $ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                    $ancestors = array_reverse( $ancestors );

                    foreach ( $ancestors as $ancestor ) {
                        $ancestor = get_term( $ancestor, 'product_cat' );

                        if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                            echo $before . '<a href="' . get_term_link( $ancestor ) . '">' . $ancestor->name . '</a>' . $after . $delimiter;
                        }
                    }

                    echo $before . '<a href="' . get_term_link( $main_term ) . '">' . $main_term->name . '</a>' . $after . $delimiter;

                }

                echo $before . get_the_title() . $after;

            } elseif ( 'post' != get_post_type() ) {

                $post_type = get_post_type_object( get_post_type() );
                $slug = $post_type->rewrite;
                    echo $before . '<a href="' . get_post_type_archive_link( get_post_type() ) . '">' . $post_type->labels->singular_name . '</a>' . $after . $delimiter;
                echo $before . get_the_title() . $after;

            } else {

                $cat = current( get_the_category() );
                if ( ( $parents = get_category_parents( $cat, TRUE, $after . $delimiter . $before ) ) && ! is_wp_error( $parents ) ) {
                    echo $before . substr( $parents, 0, strlen($parents) - strlen($after . $delimiter . $before) ) . $after . $delimiter;
                }
                echo $before . get_the_title() . $after;

            }

        } elseif ( is_404() ) {

            echo $before . esc_html__( 'Error 404', 'woocommerce' ) . $after;

        } elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' ) {

            $post_type = get_post_type_object( get_post_type() );

            if ( $post_type ) {
                echo $before . $post_type->labels->singular_name . $after;
            }

        } elseif ( is_attachment() ) {

            $parent = get_post( $post->post_parent );
            $cat = get_the_category( $parent->ID );
            if(isset($cat[0])){
                $cat = $cat[0];
            }
            if ( ( $parents = get_category_parents( $cat, TRUE, $after . $delimiter . $before ) ) && ! is_wp_error( $parents ) ) {
                echo $before . substr( $parents, 0, strlen($parents) - strlen($after . $delimiter . $before) ) . $after . $delimiter;
            }
            echo $before . '<a href="' . get_permalink( $parent ) . '">' . $parent->post_title . '</a>' . $after . $delimiter;
            echo $before . get_the_title() . $after;

        } elseif ( is_page() && !$post->post_parent ) {

            echo $before . get_the_title() . $after;

        } elseif ( is_page() && $post->post_parent ) {

            $parent_id  = $post->post_parent;
            $breadcrumbs = array();

            while ( $parent_id ) {
                $page = get_post( $parent_id );
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title( $page->ID ) . '</a>';
                $parent_id  = $page->post_parent;
            }

            $breadcrumbs = array_reverse( $breadcrumbs );

            foreach ( $breadcrumbs as $crumb ) {
                echo $before . $crumb . $after . $delimiter;
            }

            echo $before . get_the_title() . $after;

        } elseif ( is_search() ) {

            echo $before . sprintf( esc_html__( 'Search results for &ldquo;%s&rdquo;', 'woocommerce' ), get_search_query() ) . $after;

        } elseif ( is_tag() ) {

                echo $before . sprintf( esc_html__( 'Posts tagged &ldquo;%s&rdquo;', 'woocommerce' ), single_tag_title( '', false ) ) . $after;

        } elseif ( is_author() ) {

            $userdata = get_userdata($author);
            echo $before . sprintf( esc_html__( 'Author: %s', 'woocommerce' ), $userdata->display_name ) . $after;

        }

        if ( get_query_var( 'paged' ) ) {
            echo ' (' . sprintf( esc_html__( 'Page %d', 'woocommerce' ), get_query_var( 'paged' ) ) . ')';
        }

        echo '</ul>';
    } else {
        if ( is_home() && !is_front_page() ) {
            echo '<ul>';

            if ( ! empty( $home ) ) {
                echo $before . '<a class="home" href="' . apply_filters( 'woocommerce_breadcrumb_home_url', esc_url( home_url( '/' ) ) ) . '">' . $home . '</a>' . $after . $delimiter;

                echo $before . $logancee_options['blog-title'] . $after;
            }

            echo '</ul>';
        }
    }
}
endif;

// Woocommerce Hooks
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 50 );

// Woocommerce Functions
add_action('woocommerce_before_shop_loop', 'logancee_woocommerce_catalog_ordering', 30);
function logancee_woocommerce_catalog_ordering() {
    $logancee_options = logancee_get_options();
    
    $query_string = filter_input(INPUT_SERVER, 'QUERY_STRING', FILTER_SANITIZE_URL);
    parse_str($_SERVER['QUERY_STRING'], $params);

    $query_string = '?'.$query_string;

    // replace it with theme option
 
    $per_page = explode(',', '9,15,30');

    $orderby = !empty($params['product_orderby']) ? $params['product_orderby'] : 'default';
    $order = !empty($params['product_order']) ? $params['product_order'] : 'asc';
    $item_count = !empty($params['product_count']) ? $params['product_count'] : $per_page[0];
    ?>
    <div class="product-filter clearfix">
        <div class="options">
            <div class="button-group display view-mode gridlist-toggle" data-toggle="buttons-radio">
                <button id="grid" <?php if($logancee_options['category-default-list-grid'] == 1) { echo 'class="active"'; } ?> rel="tooltip" title="Grid" onclick="display('grid');"><i class="fa fa-th-large"></i></button>
                <button id="list" <?php if($logancee_options['category-default-list-grid'] != 1) { echo 'class="active"'; } ?> rel="tooltip" title="List" onclick="display('list');"><i class="fa fa-th-list"></i></button>
            </div>
        </div>
        <div class="list-options">
            <div class="sort">
                <?php echo esc_html__('Sort By', 'logancee') ?>:
                <select onchange="location = this.value;">
                        <option <?php if ($orderby == 'default') : ?> selected <?php endif; ?>  value="<?php echo logancee_add_url_parameters($query_string, 'product_orderby', 'default') ?>"><?php echo esc_html__('Default', 'logancee') ?></option>
                        <option <?php if ($orderby == 'popularity') : ?> selected <?php endif; ?>  value="<?php echo logancee_add_url_parameters($query_string, 'product_orderby', 'popularity') ?>"><?php echo esc_html__('Popularity', 'logancee') ?></option>
                        <option <?php if ($orderby == 'rating') : ?> selected <?php endif; ?>  value="<?php echo logancee_add_url_parameters($query_string, 'product_orderby', 'rating') ?>"><?php echo esc_html__('Rating', 'logancee') ?></option>
                        <option <?php if ($orderby == 'date') : ?> selected <?php endif; ?> value="<?php echo logancee_add_url_parameters($query_string, 'product_orderby', 'date') ?>"><?php echo esc_html__('Date', 'logancee') ?></option>
                        <option <?php if ($orderby == 'price') : ?> selected <?php endif; ?>  value="<?php echo logancee_add_url_parameters($query_string, 'product_orderby', 'price') ?>"><?php echo esc_html__('Price', 'logancee') ?></option>
                        <option <?php if ($orderby == 'name') : ?> selected <?php endif; ?>  value="<?php echo logancee_add_url_parameters($query_string, 'product_orderby', 'name') ?>"><?php echo esc_html__('Name', 'logancee') ?></option>
                </select>

                <?php // order ?>
                <?php if($order == 'desc'): ?>
                    <a class="btn-arrow order-desc" href="<?php echo logancee_add_url_parameters($query_string, 'product_order', 'asc') ?>"></a>
                <?php else: ?>
                    <a class="btn-arrow order-asc left" href="<?php echo logancee_add_url_parameters($query_string, 'product_order', 'desc') ?>"></a>
                <?php endif; ?>
            </div>
        </div>


    </div>
        
    <?php
}

// woocommerce ordering args

add_action( 'wp', 'logancee_remove_ordering_args' );

function logancee_remove_ordering_args() {
    remove_filter( 'posts_clauses', 'logancee_order_by_popularity_post_clauses' );
    remove_filter( 'posts_clauses', 'logancee_order_by_rating_post_clauses' );
}

add_action('woocommerce_get_catalog_ordering_args', 'logancee_woocommerce_get_catalog_ordering_args', 20);
function logancee_woocommerce_get_catalog_ordering_args($args) {
    parse_str($_SERVER['QUERY_STRING'], $params);

    $orderby = !empty($params['product_orderby']) ? $params['product_orderby'] : 'default';
    $order = !empty($params['product_order']) ? $params['product_order'] : 'asc';

    switch ($orderby) {
        case 'date':
            $_orderby = 'date';
            $_order = 'desc';
            $_meta_key = '';
            break;
        case 'price':
            $_orderby = 'meta_value_num';
            $_order = 'asc';
            $_meta_key = '_price';
            break;
        case 'popularity':
            $_orderby = 'popularity';
            break;
        case 'rating':
            $_orderby = 'rating';
            break;
        case 'title':
            $_orderby = 'title';
            $_order = 'asc';
            $_meta_key = '';
            break;
        case 'default':
        default:
            $_orderby = 'menu_order title';
            $_order = 'asc';
            $_meta_key = '';
            break;
    }

    switch ($order) {
        case 'desc':
            $_order = 'desc';
            break;
        case 'asc':
        default:
            $_order = 'asc';
            break;
    }

    switch ($_orderby) {
        case 'popularity' :
            $args['meta_key'] = 'total_sales';
            // Sorting handled later though a hook
            add_filter( 'posts_clauses', 'logancee_order_by_popularity_post_clauses' );
            break;
        case 'rating' :
            // Sorting handled later though a hook
            add_filter( 'posts_clauses', 'logancee_order_by_rating_post_clauses' );
            break;
        default:
            break;
    }

    return $args;
}

// Sorting handled later though a hook
function logancee_order_by_popularity_post_clauses( $args ) {
    global $wpdb;

    parse_str($_SERVER['QUERY_STRING'], $params);
    $order = !empty($params['product_order']) ? $params['product_order'] : 'asc';
    $args['orderby'] = "$wpdb->postmeta.meta_value+0 $order, $wpdb->posts.post_date DESC";

    return $args;
}

// Sorting handled later though a hook
function logancee_order_by_rating_post_clauses( $args ) {
    global $wpdb;

    parse_str($_SERVER['QUERY_STRING'], $params);
    $order = !empty($params['product_order']) ? $params['product_order'] : 'asc';
    $args['fields'] .= ", AVG( $wpdb->commentmeta.meta_value ) as average_rating ";
    $args['where'] .= " AND ( $wpdb->commentmeta.meta_key = 'rating' OR $wpdb->commentmeta.meta_key IS null ) ";
    $args['join'] .= "
        LEFT OUTER JOIN $wpdb->comments ON($wpdb->posts.ID = $wpdb->comments.comment_post_ID)
        LEFT JOIN $wpdb->commentmeta ON($wpdb->comments.comment_ID = $wpdb->commentmeta.comment_id)
    ";
    $args['orderby'] = "average_rating $order, $wpdb->posts.post_date DESC";
    $args['groupby'] = "$wpdb->posts.ID";

    return $args;
}

// get product count per page
add_filter('loop_shop_per_page', 'logancee_loop_shop_per_page');
function logancee_loop_shop_per_page() {
    global $logancee_options;
    $logancee_options = logancee_get_options();

    parse_str($_SERVER['QUERY_STRING'], $params);


    $per_page = explode(',', '12,15,30');
    
    if($logancee_options['category-product-per-page'] == 6) { $per_page = explode(',', '18,24,30'); }
    if($logancee_options['category-product-per-page'] == 5) { $per_page = explode(',', '15,25,30'); }    

    $item_count = !empty($params['product_count']) ? $params['product_count'] : $per_page[0];

    return $item_count;
}

// Get Product Thumbnail
add_action('woocommerce_before_shop_loop_item', 'logancee_woocommerce_thumbnail', 10);
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

function logancee_woocommerce_thumbnail() {
    global $product, $woocommerce, $logancee_options;

    $id = get_the_ID();
    $size = 'shop_catalog';

    $gallery = get_post_meta($id, '_product_image_gallery', true);
    $attachment_image = '';
    if ($logancee_options['product-image-effect'] == 1 && !empty($gallery)) {
        $gallery = explode(',', $gallery);
        $first_image_id = $gallery[0];
        $attachment_image = wp_get_attachment_image($first_image_id , $size, false, array('class' => 'swap-image'));
    }
    if ($logancee_options['product-image-effect'] == 2){
        $thumb_image = get_the_post_thumbnail($id , $size, array('class' => 'zoom-image-effect '));
    }else{
        $thumb_image = get_the_post_thumbnail($id , $size);
    }
    
    $class="image";
    
    if ($logancee_options['product-image-effect'] == 1){
        $class .= " image-swap-effect ";
    }

    
    if (!$thumb_image) {
        if ( wc_placeholder_img_src() )
            $thumb_image = wc_placeholder_img( $size );
    }

    
    woocommerce_show_product_loop_sale_flash();
        // show quick view


    echo '<div class="'.$class.'">';
    if ($logancee_options['product-quickview-status']) : ?>
        <div class="quickview">
            <a href="<?php echo esc_url(admin_url( 'admin-ajax.php?action=logancee_product_quickview&context=frontend&pid=' )) ?><?php echo the_ID() ?>"><i aria-hidden="true" class="arrow_expand"></i></a>
        </div>
    <?php endif;
    ?><a href="<?php the_permalink(); ?>"><?php
    echo $attachment_image;
    echo $thumb_image;
    ?></a><?php
    
  
    echo '</div>';
}

add_action('woocommerce_before_shop_loop_item_list', 'logancee_woocommerce_thumbnail_list', 10);

function logancee_woocommerce_thumbnail_list() {
    global $product, $woocommerce, $logancee_options;

    $id = get_the_ID();
    $size = 'shop_catalog';

    $gallery = get_post_meta($id, '_product_image_gallery', true);
    $attachment_image = '';
    if ($logancee_options['product-image-effect'] == 1 && !empty($gallery)) {
        $gallery = explode(',', $gallery);
        $first_image_id = $gallery[0];
        $attachment_image = wp_get_attachment_image($first_image_id , $size, false, array('class' => 'swap-image'));
    }
    if ($logancee_options['product-image-effect'] == 2){
        $thumb_image = get_the_post_thumbnail($id , $size, array('class' => 'zoom-image-effect '));
    }else{
        $thumb_image = get_the_post_thumbnail($id , $size);
    }

    $class="product-image";

    if ($logancee_options['product-image-effect'] == 1){
        $class .= " image-swap-effect ";
    }


    if (!$thumb_image) {
        if ( wc_placeholder_img_src() )
            $thumb_image = wc_placeholder_img( $size );
    }


    woocommerce_show_product_loop_sale_flash();
    // show quick view
    echo '<div class="'.$class.'">';
    ?><a href="<?php the_permalink(); ?>"><?php
    echo '<span class="front margin-image">';
    echo $thumb_image;
    echo '</span>';
    echo '<span class="product-img-additional back margin-image">';
    echo $attachment_image;
    echo '</span>';

    ?></a>
    <div class="category-over product-show-box">
        <div class="main-quickview quickview">
            <?php if ($logancee_options['product-quickview-status']) : ?>
                <a class="btn show-quickview"" href="<?php echo esc_url(admin_url( 'admin-ajax.php?action=logancee_product_quickview&context=frontend&pid=' )) ?><?php echo the_ID() ?>"><i aria-hidden="true" class="arrow_expand"></i></a>
            <?php endif; ?>
        </div>
    </div>
    <?php


    echo '</div>';
}

function logancee_woocommerce_image() {
    global $product, $woocommerce, $logancee_options;

    $id = get_the_ID();
    $size = 'shop_single';

    if ( has_post_thumbnail() ) {
        $image = get_the_post_thumbnail( $id, apply_filters( 'single_product_small_thumbnail_size', $size ) );
    } else {
        $gallery = get_post_meta($id, '_product_image_gallery', true);
        $attachment_image = '';
        if (!empty($gallery)) {
            $gallery = explode(',', $gallery);
            $first_image_id = $gallery[0];
            $image = wp_get_attachment_image($first_image_id , $size, false, array('class' => ''));
        }
    }

    if (!$image)
        $image = wc_placeholder_img_src();

    $class="product-image";

    echo '<span class="'.$class.'">';

    // show images, sale label
    echo $image; logancee_woocommerce_sale();

    echo '</span>';
}


// Get Logancee Meta Values
function logancee_layout() {
    global $wp_query, $logancee_options;

    $layout = isset($logancee_options['layout-type'])? $logancee_options['layout-type']:'fullwidth';
    $layout = (isset($_GET['layout'])) ? $_GET['layout-type-blog'] : $layout;
    $default = logancee_meta_use_default();

    if (is_404()) {
        $layout = 'widewidth';
    } else if (is_category()) {
        $cat = $wp_query->get_queried_object();
        if ($default)
            $layout = $logancee_options['layout-type-blog'];
        else
            $layout = get_metadata('category', $cat->term_id, 'layout', true);
    } else if (is_archive()) {
        if (function_exists('is_shop') && is_shop())  {
            if ($default)
                $layout = $logancee_options['layout-type-woocategory'];
            else
                $layout = get_post_meta(wc_get_page_id( 'shop' ), 'layout', true);
        } else {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if ($term) {

                if ($default) {
                    switch ($term->taxonomy) {
                        case 'product_cat':
                        case 'product_tag':
                            $layout = $logancee_options['layout-type-woocategory'];
                            break;
                        case 'portfolio-category':
                            $layout = $logancee_options['layout-type-portfolio'];
                            break;
                        default:
                            $layout = $logancee_options['layout-type-blog'];
                            break;
                    }
                } else {
                    $layout = get_metadata($term->taxonomy, $term->term_id, 'layout', true);
                }
            }
        }
    } else {
        if (is_singular()) {
            global $post;
            if ($default) {
                switch ($post->post_type) {
                    case 'product':
                        $layout = $logancee_options['layout-type-wooproduct'];
                        break;
                    case 'portfolio':
                        $layout = $logancee_options['layout-type-single-portfolio'];
                        break;
                    case 'post':
                        $layout = $logancee_options['layout-type-single-post'];
                        break;
                }
            } else {
                $layout = get_post_meta(get_the_id(), 'layout', true);
            }
        } else {
            if (!is_home() && is_front_page()) {
                $layout = $logancee_options['layout-type-home'];
            } else if (is_home() && !is_front_page()) {
                $layout = $logancee_options['layout-type-blog'];
                $layout = (isset($_GET['layout-type-blog'])) ? $_GET['layout-type-blog'] : $layout;
            } else if (is_home() || is_front_page()) {
                $layout = $logancee_options['layout-type-home'];
            }
        }
    }
        
    return $layout;
}


function logancee_show_breadcrumbs() {
    global $wp_query, $logancee_options;

    $breadcrumbs = '';

    if (is_category()) {
        $cat = $wp_query->get_queried_object();
        $breadcrumbs = get_metadata('category', $cat->term_id, 'breadcrumbs', true);
    } else if (is_archive()) {
        if (function_exists('is_shop') && is_shop())  {
            $breadcrumbs = get_post_meta(wc_get_page_id( 'shop' ), 'breadcrumbs', true);
        } else {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if ($term) {
                $breadcrumbs = get_metadata($term->taxonomy, $term->term_id, 'breadcrumbs', true);
            }
        }
    } else {
        if (is_singular()) {
            $breadcrumbs = get_post_meta(get_the_id(), 'breadcrumbs', true);
        } else {
            if (!is_home() && is_front_page()) {
                $breadcrumbs = 'breadcrumbs';
            } else if (is_home() && !is_front_page()) {
                $breadcrumbs = 'breadcrumbs';
            } else if (is_home() || is_front_page()) {
                $breadcrumbs = 'breadcrumbs';
            }
        }
    }

    $breadcrumbs = ($breadcrumbs != 'breadcrumbs')?true:false;

    if (is_search()) {
        if (function_exists('is_shop') && is_shop())
            $breadcrumbs = true;
        else
            $breadcrumbs = false;
    }

    if (is_404())
        $breadcrumbs = false;

    return $breadcrumbs;
}

function logancee_get_page_title(){


    if (is_home()) {
        if (get_option('page_for_posts', true)) {
            echo get_the_title(get_option('page_for_posts', true));
        } else {
            _e('Latest Posts', 'logancee');
        }
    } elseif (is_archive()) {
        $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
        if ($term) {
            echo $term->name;
        } elseif (is_post_type_archive()) {
            echo get_queried_object()->labels->name;
        } elseif (is_day()) {
            printf(__('%s articles', 'logancee'), get_the_date());
        } elseif (is_month()) {
            printf(__('%s articles', 'logancee'), get_the_date('F Y'));
        } elseif (is_year()) {
            printf(__('%s articles', 'logancee'), get_the_date('Y'));
        } elseif (is_author()) {
            $author = get_queried_object();
            printf(__('%s\'s articles', 'logancee'), $author->display_name);
        } else {
            single_cat_title();
        }
    } elseif (is_search()) {
        printf(__('Search Results for %s', 'logancee'), get_search_query());
    } elseif (is_404()) {
        _e('Not Found', 'logancee');
    } else {
        the_title();
    }
}

function logancee_get_breadcrumb_bg(){
    global $wp_query, $logancee_options;


    $breadcrumb_background = $logancee_options['layout-breadcrumb-background']['url'] != '' ? $logancee_options['layout-breadcrumb-background']['url']:'';


    if (is_404()) {
        // nothing
    } else if (is_category()) {
        $cat = $wp_query->get_queried_object();
        if(get_metadata('category', $cat->term_id, 'breadcrumb_background', true) != '') {
            $breadcrumb_background = get_metadata('category', $cat->term_id, 'breadcrumb_background', true);
        }elseif ($logancee_options['layout-breadcrumb-background-blog']['url'] != '') {
            $breadcrumb_background = $logancee_options['layout-breadcrumb-background-blog']['url'];
        }
    } else if (is_archive()) {
        if (function_exists('is_shop') && is_shop())  {
            if(get_post_meta(wc_get_page_id('shop'), 'breadcrumb_background', true) != '') {
                $breadcrumb_background = get_post_meta(wc_get_page_id('shop'), 'breadcrumb_background', true);
            }
            if ($logancee_options['layout-breadcrumb-background-woocategory']['url'] != '') {
                $breadcrumb_background = $logancee_options['layout-breadcrumb-background-woocategory']['url'];
            }

        } else {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

            if ($term) {
                if(get_metadata($term->taxonomy, $term->term_id, 'breadcrumb_background', true) != '') {
                    $breadcrumb_background = get_metadata($term->taxonomy, $term->term_id, 'breadcrumb_background', true);
                }
                else{
                    switch ($term->taxonomy) {
                        case 'product_cat':
                        case 'product_tag':
                            if($logancee_options['layout-breadcrumb-background-woocategory']['url'] != '') {
                                $breadcrumb_background = $logancee_options['layout-breadcrumb-background-woocategory']['url'];
                            }
                            break;
                        case 'portfolio-category':
                            if($logancee_options['layout-breadcrumb-background-portfolio']['url'] != '') {
                                $breadcrumb_background = $logancee_options['layout-breadcrumb-background-portfolio']['url'];
                            }
                            break;
                        default:
                            $breadcrumb_background = $logancee_options['layout-breadcrumb-background-blog']['url'];
                            break;
                    }
                }
            }
        }
    } else {
        if (is_singular()) {
            global $post;
            if(get_post_meta(get_the_id(), 'breadcrumb_background', true) != '') {
                $breadcrumb_background = get_post_meta(get_the_id(), 'breadcrumb_background', true);
            } else {
                switch ($post->post_type) {
                    case 'product':
                        if($logancee_options['layout-breadcrumb-background-wooproduct']['url'] != '') {
                            $breadcrumb_background = $logancee_options['layout-breadcrumb-background-wooproduct']['url'];
                        }
                        break;
                    case 'post':
                        if($logancee_options['layout-breadcrumb-background-single-post']['url'] != '') {
                            $breadcrumb_background = $logancee_options['layout-breadcrumb-background-single-post']['url'];
                        }
                        break;
                    case 'portfolio':
                        if($logancee_options['layout-breadcrumb-background-single-portfolio']['url'] != '') {
                            $breadcrumb_background = $logancee_options['layout-breadcrumb-background-single-portfolio']['url'];
                        }
                        break;
                }
            }
        }
    }


     return $breadcrumb_background;
}

function logancee_meta_use_default() {
    global $wp_query;

    $default = '';

    if (is_category()) {
        $cat = $wp_query->get_queried_object();
        $default = get_metadata('category', $cat->term_id, 'default', true);
    } else if (is_archive()) {
        if (function_exists('is_shop') && is_shop())  {
            $default = get_post_meta(wc_get_page_id( 'shop' ), 'default', true);
        } else {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if ($term) {
                $default = get_metadata($term->taxonomy, $term->term_id, 'default', true);
            }
        }
    } else {
        if (is_singular()) {
            global $post;
            if ($post->post_type == 'page') {
                $default = 'default';
            } else {
                $default = get_post_meta(get_the_id(), 'default', true);
            }
        }
    }

    $default = ($default != 'default') ? true:false;

    return $default;
}

function logancee_slideshow_type() {
    global $wp_query, $logancee_options;

    $banner_type = '';

    if (is_category()) {
        $cat = $wp_query->get_queried_object();
        $banner_type = get_metadata('category', $cat->term_id, 'slider_type', true);
    } else if (is_archive()) {
        if (function_exists('is_shop') && is_shop())  {
            $banner_type = get_post_meta(wc_get_page_id( 'shop' ), 'slider_type', true);
        } else {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if ($term) {
                $banner_type = get_metadata($term->taxonomy, $term->term_id, 'slider_type', true);
            }
        }
    } else {
        if (is_singular()) {
            $banner_type = get_post_meta(get_the_id(), 'slider_type', true);
        } else {
            if (!is_home() && is_front_page()) {
                $banner_type = isset($logancee_options['homepage-slideshow-type']) ? $logancee_options['homepage-slideshow-type'] : '';
            } else if (is_home() && !is_front_page()) {
                $banner_type = isset($logancee_options['blog-slideshow-type']) ? $logancee_options['blog-slideshow-type'] : '';
            } else if (is_home() || is_front_page()) {
                $banner_type = isset($logancee_options['homepage-slideshow-type']) ? $logancee_options['homepage-slideshow-type'] : '';
            }
        }
    }

    if (is_search())
        $banner_type = '';

    return $banner_type;
}


function logancee_rev_slider() {
    global $wp_query, $logancee_options;

    $rev_slider = '';

    if (is_category()) {
        $cat = $wp_query->get_queried_object();
        $rev_slider = get_metadata('category', $cat->term_id, 'revslider', true);
    } else if (is_archive()) {

        if (function_exists('is_shop') && is_shop())  {
            $rev_slider = get_post_meta(wc_get_page_id( 'shop' ), 'revslider', true);
        } else {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if ($term) {
                $rev_slider = get_metadata($term->taxonomy, $term->term_id, 'revslider', true);
            }
        }
    } else {
        if (is_singular()) {
            $rev_slider = get_post_meta(get_the_id(), 'revslider', true);
        } else {
            if (!is_home() && is_front_page()) {
                $rev_slider = isset($logancee_options['homepage-slideshow-revslider']) ? $logancee_options['homepage-slideshow-revslider'] : '';
            } else if (is_home() && !is_front_page()) {
                $rev_slider = isset($logancee_options['blog-slideshow-revslider']) ? $logancee_options['blog-slideshow-revslider'] : '';
            } else if (is_home() || is_front_page()) {
                $rev_slider = isset($logancee_options['homepage-slideshow-revslider'] ) ? $logancee_options['homepage-slideshow-revslider'] : '';
            }
        }
    }

    return $rev_slider;
}

function logancee_customblock_slider() {
    global $wp_query, $logancee_options;

    $customblock_slider = '';

    if (is_category()) {
        $cat = $wp_query->get_queried_object();
        $customblock_slider = get_metadata('category', $cat->term_id, 'customblock_slider', true);
    } else if (is_archive()) {
        if (function_exists('is_shop') && is_shop())  {
            $customblock_slider = get_post_meta(wc_get_page_id( 'shop' ), 'customblock_slider', true);
        } else {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if ($term) {
                $customblock_slider = get_metadata($term->taxonomy, $term->term_id, 'customblock_slider', true);
            }
        }
    } else {
        if (is_singular()) {
            $customblock_slider = get_post_meta(get_the_id(), 'customblock_slider', true);
        } else {
            if (!is_home() && is_front_page()) {
                $customblock_slider = $logancee_options['homepage-slideshow-custom_block'];
            } else if (is_home() && !is_front_page()) {
                $customblock_slider = $logancee_options['blog-slideshow-custom_block'];
            } else if (is_home() || is_front_page()) {
                $customblock_slider = $logancee_options['homepage-slideshow-custom_block'];
            }
        }
    }

    return $customblock_slider;
}

function logancee_get_slider_align() {
    global $wp_query, $logancee_options;

    $slider_align = '';

    if (is_category()) {
        $cat = $wp_query->get_queried_object();
        $slider_align = get_metadata('category', $cat->term_id, 'slideralign', true);
    } else if (is_archive()) {
        if (function_exists('is_shop') && is_shop())  {
            $slider_align = get_post_meta(wc_get_page_id( 'shop' ), 'slideralign', true);
        } else {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if ($term) {
                $slider_align = get_metadata($term->taxonomy, $term->term_id, 'slideralign', true);
            }
        }
    } else {
        if (is_singular()) {
            $slider_align = get_post_meta(get_the_id(), 'slideralign', true);
        } 
    }
    return $slider_align;
}

function logancee_get_body_class() {
    global $logancee_options;
    global $post;
    $classes = [];
    $classes[]= 'header-type-'.$logancee_options['header-type'];
    if(logancee_get_slider_align() == 'top'){
        $classes[] = 'slider-align-top';
    }

    if ( isset( $post ) ) {
        $classes[] = esc_attr( $post->post_type . '_' . $post->post_name );
    }
    if (is_single() ) {
        foreach((wp_get_post_terms( $post->ID)) as $term) {
            // add category slug to the $classes array
            $classes[] = esc_attr( $term->slug );
        }
        foreach((wp_get_post_categories( $post->ID, array('fields' => 'slugs'))) as $category) {
            // add category slug to the $classes array
            $classes[] = esc_attr( $category );
        }
    }

    return $classes;
}

function logancee_slideshow() {
    global $wp_query, $logancee_options;
    $slider_type = logancee_slideshow_type();
    $rev_slider = logancee_rev_slider();
    $custom_block_slider = logancee_customblock_slider();
    
    if ($slider_type === 'revslider' && isset($rev_slider)) { ?>
            <?php echo do_shortcode('[rev_slider '.$rev_slider.']'); ?>
    <?php
    }
    if ($slider_type === 'custom_block') { ?>
        <?php echo do_shortcode('[custom_block name="'.$custom_block_slider.'"]') ?>
    <?php
    }
}

function logancee_sidebar() {
    global $wp_query;

    $sidebar = 'blog-sidebar';
    $default = logancee_meta_use_default();


    if (is_404()) {
        $sidebar = '';
    } else if (is_category()) {
        $cat = $wp_query->get_queried_object();
        if ($default)
            $sidebar = 'blog-sidebar';
        else
            $sidebar = get_metadata('category', $cat->term_id, 'sidebar', true);
    } else if (is_archive()) {

        if (function_exists('is_shop') && is_shop())  {
            if ($default)
                $sidebar = 'woocommerce-sidebar';
            else
                $sidebar = get_post_meta(wc_get_page_id( 'shop' ), 'sidebar', true);
        } else {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

            if ($term) {
                if ($default) {
                    switch ($term->taxonomy) {
                        case 'product_cat':
                        case 'product_tag':
                            $sidebar = 'woocommerce-sidebar';
                            break;
                        case 'portfolio-category':
                            $sidebar = 'portfolio-sidebar';
                            break;
                        default:
                            $sidebar = 'blog-sidebar';
                            break;
                    }
                } else {
                    $sidebar = get_metadata($term->taxonomy, $term->term_id, 'sidebar', true);
                }
            }
        }
    } else {
        if (is_singular()) {

            global $post;
            if ($default) {
                switch ($post->post_type) {
                    case 'product':
                        $sidebar = 'woocommerce-product-sidebar';
                        break;
                    case 'portfolio':
                        $sidebar = 'portfolio-sidebar';
                        break;
                    case 'post':
                    default:
                        $sidebar = 'blog-sidebar';
                        break;
                }
            } else {
                $sidebar = get_post_meta(get_the_id(), 'sidebar', true);
            }
        } else {
            if (!is_home() && is_front_page()) {
                $sidebar = 'home-sidebar';
            } else if (is_home() && !is_front_page()) {
                $sidebar = 'blog-sidebar';
            } else if (is_home() || is_front_page()) {
                $sidebar = 'home-sidebar';
            }
        }
    }

    return $sidebar;
}

add_filter('woocommerce_product_categories_widget_args', 'logancee_product_categories_widget_args', 10, 1);

function logancee_product_categories_widget_args($args) {
    $args['walker'] = new Logancee_WC_Product_Cat_List_Walker;
    return $args;
}

add_filter('widget_categories_args', 'logancee_blog_categories_widget_args', 10, 1);

function logancee_blog_categories_widget_args($args) {
    $args['walker'] = new Logancee_WC_Blog_Cat_List_Walker;
    return $args;
}



//custom get price html
add_filter( 'woocommerce_get_price_html', 'logancee_custom_price_html', 100, 2 );
function logancee_custom_price_html( $price, $product ){
    global $post, $logancee_quickview;
    if((is_product() || $logancee_quickview) && $post->ID == $product->id){
        $price_part = explode('</del>', $price);
        if(isset($price_part[1])){
            $price = $price_part[1]. '&nbsp;'.$price_part[0].'</del>';
        }
    }
//
    if(strpos($price, '<ins>') === false){

        if(strpos($price, 'woocommerce-Price-amount')){
            $price = str_replace( '<span class="woocommerce-Price-amount amount">', '<span class="woocommerce-Price-amount price-new">', $price );
        }else{
            $price = str_replace( '<span class="amount">', '<span class="price-new" price>', $price );
        }
    }


    $price = str_replace( '<del>', '<span class="old-price price-old">', $price );
    $price = str_replace( '</del>', '</span>', $price );
    $price = str_replace( '<ins>', '<span class="special-price price-new">', $price );
    $price = str_replace( '</ins>', '</span>', $price );

    
    return $price;
}



remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 15);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 5);


// Add woocommerce actions
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 5 );

add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_rating', 5 );

// Remove woocommerce actions
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

add_action('woocommerce_after_shop_list_loop_item_title', 'woocommerce_template_loop_rating', 5);
add_action('woocommerce_after_shop_list_loop_item_title', 'woocommerce_template_loop_price', 10);
add_action('woocommerce_after_shop_list_loop_item_title', 'woocommerce_template_single_excerpt', 10);


// Remove compare action
if ( get_option('yith_woocompare_compare_button_in_products_list') == 'yes' ) {
    global $yith_woocompare;
    if ($yith_woocompare)
        remove_action( 'woocommerce_after_shop_loop_item', array( $yith_woocompare->obj, 'add_compare_link' ), 20 );
}

if ( get_option('yith_woocompare_compare_button_in_product_page') == 'yes' ) {
    global $yith_woocompare;
    if ($yith_woocompare)
        remove_action( 'woocommerce_single_product_summary', array( $yith_woocompare->obj, 'add_compare_link' ), 35 );
}


// Ajax filter product container
if (logancee_is_plugin_active( 'yith-woocommerce-ajax-search/init.php' )) {
    add_filter( 'yith_wcan_ajax_frontend_classes', 'logancee_yith_wcan_ajax_frontend_classes', 10, 1);
    function logancee_yith_wcan_ajax_frontend_classes($arg) {
        $arg['container'] = '#content #mfilter-content-container .products';
        return $arg;
    }

}

function logancee_is_plugin_active($plugin_path) {
    $active_plugins = get_option( 'active_plugins' );
    if(!$active_plugins) return false;
    $return_var = in_array( $plugin_path, apply_filters( 'active_plugins', $active_plugins ) );
    return $return_var;
}

add_filter( 'woocommerce_before_widget_product_list', 'logancee_before_widget_product_list', 10, 1);
function logancee_before_widget_product_list($arg) {
    return '<div class="product_list_widget products"><div class="box-product"><div class="product-grid">';
}
add_filter( 'woocommerce_after_widget_product_list', 'logancee_after_widget_product_list', 10, 1);
function logancee_after_widget_product_list($arg) {
    return '</div></div></div>';
}

// get ajax cart fragment
add_filter('add_to_cart_fragments', 'logancee_woocommerce_header_add_to_cart_fragment');
function logancee_woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    $_cartQty = WC()->cart->cart_contents_count;

    $fragments['.header .total_item_ajax, .sticky-header .total_item_ajax'] = '<span class="items total_item_ajax"><span class="qty-cart">'. ($_cartQty > 0 ? $_cartQty : '0') .'</span> <span>'. esc_html__('item(s)', 'logancee') .'</span></span>';
    $fragments['.header .total_price, .sticky-header .total_price'] = '<span class="total_price">'. WC()->cart->get_cart_total() . '</span>';

    ob_start();
?>

    <div class="typo-ajax-container">

        <?php if ($_cartQty == 0) :?>
            <p class="no-items-in-cart"><?php echo esc_html__('No products in the cart.','woocommerce'); ?> </p>
        <?php else: ?>
            <ul class="clearfix">
                <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
                    <?php
                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                        $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                            $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                            $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                            $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                            ?>
                            <li class="item">
                                <a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>"  title="London t-shirt" class="product-image">
                                    <?php if ( ! $_product->is_visible() ) { ?>
                                        <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                                    <?php } else { ?>
                                        <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) ?>
                                    <?php } ?>
                                    <span class="qty-count"><?php echo esc_html($cart_item['quantity']); ?>x</span></a>
                                <div class="product-details show-grid">
                                    <p class="product-name clearfix">
                                        <a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
                                            <?php if ( ! $_product->is_visible() ) : ?>
                                                <?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
                                            <?php else : ?>
                                                <?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
                                            <?php endif; ?>
                                        </a>
                                    </p>
                                    <div class="items clearfix"><span class="price"><?php echo $product_price; ?></span></div>
                                    <div class="access clearfix">
                                        <?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="javascript:;" class="btn-remove deletecart"  title="%s" onclick="cart.remove(%s);" ><i aria-hidden="true" class="icon_close"></i></a>', esc_html__('Remove this item', 'woocommerce'), "'".$cart_item_key."'"  ), $cart_item_key ); ?>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    <?php } ?>
                <?php endif; ?>
            </ul>


            <p class="subtotal"><span class="title"><?php echo esc_html__('Subtotal', 'woocommerce') ?></span> <span class="price"><?php echo WC()->cart->get_cart_total(); ?></span></p>

            <div class="typo-ajax-checkout clearfix">
                <a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>" class="button view-cart"><span><?php esc_html_e('Cart', 'woocommerce'); ?></span></a>
                <a class="button view-checkout" href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id')); ?>"><span><?php esc_html_e('Checkout', 'woocommerce'); ?></span></a>
            </div>
        <?php endif; ?>
    </div>

    <?php
    $fragments['.header .cart-content .typo-ajax-container, .sticky-header .cart-content .typo-ajax-container'] = ob_get_clean();

    return $fragments;
}



function logancee_html_topnav() {

    ob_start(); ?>
    <!-- top navigation -->
    <?php
    if ( has_nav_menu( 'top_nav' ) ) : ?>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'top_nav',
            'menu_class' => 'topnav bt-links',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'depth' => 2,
            'fallback_cb' => false,
            'walker' => new wp_bootstrap_navwalker
        ));
        ?>
    <?php else: ?>
         <?php echo wp_kses( 'Define your top navigation in <b>Apperance > Menus</b>', 'logancee', array( 'b' ) ) ?>
    <?php endif; ?>
    <!-- end top navigation -->
    <?php
    return ob_get_clean();
}

function logancee_html_menu() {
    $logancee_options = logancee_get_options();

    $menu_align = $logancee_options['menu-align'];

    ob_start(); ?>
    <!-- main menu -->
    <div id="main-menu" class="mega-menu<?php if ($menu_align == 'right') echo ' menu-right' ?>">
    <?php
    if ( has_nav_menu( 'main_menu' ) ) :
            wp_nav_menu(array(
                'theme_location' => 'main_menu',
                'container' => '',
                'menu_class' => '',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'fallback_cb' => false,
                'walker' => new logancee_top_navwalker
            ));
    else: ?>
         <?php echo wp_kses( 'Define your main menu in <b>Apperance > Menus</b>', 'logancee', array( 'b' ) ) ?>
    <?php endif; ?>
        </div><!-- end main menu -->
    <?php
    return ob_get_clean();
}


function logancee_lang_switcher() {
    $logancee_options = logancee_get_options();
    ob_start();
    if ( has_nav_menu( 'lang_switcher' ) && defined('ICL_LANGUAGE_CODE')) : ?>
        <div class="language_form">
            <div class="language-desktop">
                <div class="language-topbar">
                    <div class="lang-curr">
                        <a class="title"><span class="menu-icon glyphicon flag-icon flag-icon-<?php echo ICL_LANGUAGE_CODE ?>"></span><?php echo ICL_LANGUAGE_NAME ?><i class="fa fa-angle-down"></i></a>
                    </div>

                    <div class="lang-list">

                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'lang_switcher',
                            'container' => '',
                            'menu_class' => 'clearfix',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'depth' => 2,
                            'fallback_cb' => false,
                            'walker' => new wp_bootstrap_navwalker
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div><!-- end lang switcher -->
        <?php elseif ( logancee_is_plugin_active('woocommerce-multilingual/wpml-woocommerce.php') ): ?>
        <div class="language_form">
            <div class="language-desktop">
                <div class="language-topbar">
                    <div class="lang-curr">
                        <a class="title"><span class="menu-icon glyphicon flag-icon flag-icon-<?php echo ICL_LANGUAGE_CODE ?>"></span><?php echo ICL_LANGUAGE_NAME ?><i class="fa fa-angle-down"></i></a>
                    </div>

                    <div class="lang-list">

                        <?php
                        $languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=0&orderby=code&order=desc' );
                        ?>

                        <ul id="menu-lang-switcher-1" class="clearfix">
                            <?php
                            if(1 < count($languages)){
                                foreach($languages as $l){
                                    if(!$l['active']){
                                        echo '<li><a href="'.$l['url'].'"><span class="menu-icon glyphicon flag-icon flag-icon-'.$l['code'].'"></span><span class="menu-label">'.$l['translated_name'].'</span></a></li>';
                                    }
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end lang switcher -->

    <?php endif; ?>
    <?php

    return str_replace('&nbsp;', '', ob_get_clean());
}

function logancee_currency_switcher() {
    ob_start();
    ?>
        <div class="currency_form">
            <div class="currency-topbar">
                <div class="currency-sym">
                    <a class="title"><?php echo get_woocommerce_currency(); ?><i class="fa fa-angle-down"></i></a>
                </div>

                <div class="currency-list">
                    <?php do_action('currency_switcher', array('format' => '<div><span class="sym">%symbol%</span><span class="title">%code%</span></div>', 'switcher_style' => 'wcml-horizontal-list')); ?>
                </div>
            </div>
        </div><!-- end lang switcher -->
    <?php
    return str_replace('&nbsp;', '', ob_get_clean());
}


function logancee_parse_shortcode($tpl){
    $pattern = '/\[.*\]/';
    $new_tpl = preg_replace_callback(
        $pattern,
        function ($matches) {
            return do_shortcode($matches[0]);
        },
        $tpl
    );

    return $new_tpl;

}


// Quick View Html
add_action('wp_ajax_logancee_product_quickview', 'logancee_product_quickview');
add_action('wp_ajax_nopriv_logancee_product_quickview', 'logancee_product_quickview');

function logancee_array2json($arr) {
    if(function_exists('json_encode')) return json_encode($arr); //Lastest versions of PHP already has this functionality.
    $parts = array();
    $is_list = false;

    //Find out if the given array is a numerical array
    $keys = array_keys($arr);
    $max_length = count($arr)-1;
    if(($keys[0] == 0) and ($keys[$max_length] == $max_length)) {//See if the first key is 0 and last key is length - 1
        $is_list = true;
        for($i=0; $i<count($keys); $i++) { //See if each key correspondes to its position
            if($i != $keys[$i]) { //A key fails at position check.
                $is_list = false; //It is an associative array.
                break;
            }
        }
    }

    foreach($arr as $key=>$value) {
        if(is_array($value)) { //Custom handling for arrays
            if($is_list) $parts[] = logancee_array2json($value); /* :RECURSION: */
            else $parts[] = '"' . $key . '":' . logancee_array2json($value); /* :RECURSION: */
        } else {
            $str = '';
            if(!$is_list) $str = '"' . $key . '":';

            //Custom handling for multiple data types
            if(is_numeric($value)) $str .= $value; //Numbers
            elseif($value === false) $str .= 'false'; //The booleans
            elseif($value === true) $str .= 'true';
            else $str .= '"' . addslashes($value) . '"'; //All other things
            // :TODO: Is there any more datatype we should be in the lookout for? (Object?)

            $parts[] = $str;
        }
    }
    $json = implode(',',$parts);

    if($is_list) return '[' . $json . ']';//Return numerical JSON
    return '{' . $json . '}';//Return associative JSON
}

function logancee_product_quickview() {

    global $post, $product, $woocommerce, $wpdb,  $logancee_options, $logancee_quickview;
    $post = get_post($_GET['pid']);
    $product = wc_get_product( $post->ID );
    $attachment_ids = $product->get_gallery_attachment_ids();

    if ( post_password_required() ) {
        echo get_the_password_form();
        die();
        return;
    }

    $logancee_quickview = true;


    $displaytypenumber = 0;
    if (is_plugin_active( 'woocommerce-colororimage-variation-select/woocommerce-colororimage-variation-select.php' ) )
        require_once wcva_plugin_path() . '/includes/wcva_common_functions.php';

    if (function_exists('wcva_return_displaytype_number'))
        $displaytypenumber = wcva_return_displaytype_number($product,$post);

    $goahead = 1;



    ?>
     
    <div class="quickview-wrap single-product">

        <div class="product-info <?php echo isset($logancee_options['productpage-layout']) ? 'product-layout-'.$logancee_options['productpage-layout'] : '' ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row" id="quickview_product">
                    <?php
                        /**
                         * woocommerce_before_single_product_summary hook
                         *
                         * @hooked woocommerce_show_product_sale_flash - 10
                         * @hooked woocommerce_show_product_images - 20
                         */
                        do_action( 'woocommerce_before_single_product_summary' );
                    ?>
                    <?php $product_center_grid = 6; 

                    if ($logancee_options['productpage-image-size'] == 1) {
                        $product_center_grid = 8;
                    }

                    if ($logancee_options['productpage-image-size'] == 3) {
                        $product_center_grid = 4;
                    }
                    ?>

                    <div class="col-sm-<?php echo $product_center_grid; ?> product-center clearfix">

                    <?php
                        /**
                         * woocommerce_single_product_summary hook
                         *
                         * @hooked woocommerce_template_single_title - 5
                         * @hooked woocommerce_template_single_price - 10
                         * @hooked woocommerce_template_single_excerpt - 20
                         * @hooked woocommerce_template_single_add_to_cart - 30
                         * @hooked woocommerce_template_single_meta - 40
                         * @hooked woocommerce_template_single_rating - 45
                         * @hooked woocommerce_template_single_sharing - 50
                         */
                        do_action( 'woocommerce_single_product_summary' );
                    ?>
                    </div>

                    </div>
                </div><!-- .summary -->
            </div>
        </div>


            <script type="text/javascript">
                /* <![CDATA[ */
                <?php
                $suffix               = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
                $assets_path          = str_replace( array( 'http:', 'https:' ), '', WC()->plugin_url() ) . '/assets/';
                $frontend_script_path = $assets_path . 'js/frontend/';
                ?>
                var wc_add_to_cart_params = <?php echo logancee_array2json(apply_filters( 'wc_add_to_cart_params', array(
                    'ajax_url'                => WC()->ajax_url(),
                    'ajax_loader_url'         => apply_filters( 'woocommerce_ajax_loader_url', $assets_path . 'images/ajax-loader@2x.gif' ),
                    'i18n_view_cart'          => esc_attr__( 'View Cart', 'woocommerce' ),
                    'cart_url'                => get_permalink( wc_get_page_id( 'cart' ) ),
                    'is_cart'                 => is_cart(),
                    'cart_redirect_after_add' => get_option( 'woocommerce_cart_redirect_after_add' )
                ) )) ?>;
                var wc_single_product_params = <?php echo logancee_array2json(apply_filters( 'wc_single_product_params', array(
                    'i18n_required_rating_text' => esc_attr__( 'Please select a rating', 'woocommerce' ),
                    'review_rating_required'    => get_option( 'woocommerce_review_rating_required' ),
                ) )) ?>;
                var woocommerce_params = <?php echo logancee_array2json(apply_filters( 'woocommerce_params', array(
                    'ajax_url'        => WC()->ajax_url(),
                    'ajax_loader_url' => apply_filters( 'woocommerce_ajax_loader_url', $assets_path . 'images/ajax-loader@2x.gif' ),
                ) )) ?>;
                var wc_cart_fragments_params = <?php echo logancee_array2json(apply_filters( 'wc_cart_fragments_params', array(
                    'ajax_url'      => WC()->ajax_url(),
                    'fragment_name' => apply_filters( 'woocommerce_cart_fragment_name', 'wc_fragments' )
                ) )) ?>;
                var wc_add_to_cart_variation_params = <?php echo logancee_array2json(apply_filters( 'wc_add_to_cart_variation_params', array(
                    'i18n_no_matching_variations_text' => esc_attr__( 'Sorry, no products matched your selection. Please choose a different combination.', 'woocommerce' ),
                    'i18n_unavailable_text'            => esc_attr__( 'Sorry, this product is unavailable. Please choose a different combination.', 'woocommerce' ),
                ) )) ?>;
                if (window.addthis) {
                    window.addthis = null;
                    for(var i in window) { if(i.match(/^_at/) ) { window[i]=null } }
                }
                jQuery(document).ready(function($) {
                    $( document ).off( 'click', '.plus, .minus');
                    $( document ).off( 'click', '.add_to_cart_button');
                    $.getScript('<?php echo $frontend_script_path . 'add-to-cart' . $suffix . '.js' ?>');
                    $.getScript('<?php echo $frontend_script_path . 'single-product' . $suffix . '.js' ?>');
                    $.getScript('<?php echo $frontend_script_path . 'woocommerce' . $suffix . '.js' ?>');
                    <?php if (($goahead == 1) && ($displaytypenumber > 0)) : ?>
                    $.getScript('<?php echo wcva_PLUGIN_URL . 'js/manage-variation-selection.js' ?>');
                    <?php else : ?>
                    $.getScript('<?php echo $frontend_script_path . 'add-to-cart-variation' . $suffix . '.js' ?>');
                    <?php endif; ?>
                });
                /* ]]> */
            </script>
    </div>

    <?php

    die();
}

// add addthis init option
$options = get_option('addthis_settings');
if ($options) {
    $options['wpfooter'] = true;
    update_option('addthis_settings', $options);
}

// ajax remove item
add_action( 'wp_ajax_logancee_product_remove', 'logancee_ajax_product_remove' );
add_action( 'wp_ajax_nopriv_logancee_product_remove', 'logancee_ajax_product_remove' );
function logancee_ajax_product_remove() {

    $cart = WC()->instance()->cart;
    $cart_id = $_POST['cart_id'];
    $cart_item_id = $cart->find_product_in_cart($cart_id);

    if ($cart_item_id) {
        $cart->set_quantity($cart_item_id, 0);
    }

    $cart_ajax = new WC_AJAX();
    $cart_ajax->get_refreshed_fragments();

    exit();
}

// Notifications
add_filter( 'wc_add_to_cart_message', 'logancee_custom_add_to_cart_message' );

function logancee_custom_add_to_cart_message() {

    global $woocommerce;

    // Output success messages
    if (get_option('woocommerce_cart_redirect_after_add') == 'yes') :

        $return_to = get_permalink(woocommerce_get_page_id('shop')); // Give the url, you want to redirect
        $message = sprintf('%s', $return_to, esc_html__('Continue Shopping &rarr;', 'logancee'), esc_html__('Product successfully added to your cart.', 'logancee'));

    else :
        $message = sprintf('%s', esc_html__('Product successfully added to your cart.', 'logancee'));
    endif;

    return $message;

}


function my_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<div class="container"><div class="col-xs-12"><form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    ' . __( "To view this protected post, enter the password below:", 'logancee' ) . '
    <div class=""><label for="' . $label . '">' . __( "Password:", 'logancee' ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" style="margin: 0 10px;border:1px solid #ccc !important;" />&nbsp;<input type="submit" class="btn" name="Submit" value="' . esc_attr__( "Submit", 'logancee' ) . '" /></div>
    </form></div></div>
    ';
        return $o;
    
}
add_filter( 'the_password_form', 'my_password_form' );

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer menu 1',
    'before_widget' => '<div class = "footermenu1">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer menu 2',
    'before_widget' => '<div class = "footermenu2">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer copyright',
    'before_widget' => '<div class="footer-logo">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Single post sidebar',
    'before_widget' => '<div class = "singlepostsidebar">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);
if ( function_exists('register_sidebar') )
register_sidebar(array(
  'name' => 'Press Hub Archive',
  'before_widget' => '<div class = "press-hub-archive">',
  'after_widget' => '</div>',
  'before_title' => '<h3>',
  'after_title' => '</h3>',
)
);

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// excerpt length
function custom_excerpt_length( $length ) {
        return 35;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// make the search return posts not products
function filter_search($query) {
    if ($query->is_search) {
    $query->set('post_type', array('post', 'page'));
    };
    return $query;
};
add_filter('pre_get_posts', 'filter_search');


/**
 * Plugin Name: Embed UR Google Drive Folder w the unique URL ID
 * Plugin URI: http://bionicteaching.com
 * Description: Allows an embed of the Google Drive Folder via the unique ID
 * Version: .9
 * Author: Tom Woodward
 * Author URI: http://bionicteaching.com
 * License: A "Slug" license name e.g. GPL2
 */

 /*   2014  PLUGIN_AUTHOR_NAME  (email : bionicteaching@gmail.com)

 	This program is free software; you can redistribute it and/or modify
 	it under the terms of the GNU General Public License, version 2, as 
 	published by the Free Software Foundation.

 	This program is distributed in the hope that it will be useful,
 	but WITHOUT ANY WARRANTY; without even the implied warranty of
 	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 	GNU General Public License for more details.

 	You should have received a copy of the GNU General Public License
 	along with this program; if not, write to the Free Software
 	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

//[gdrive][/gdrive]

function gdrive_shortcode( $atts, $content = null ) {
	return '<iframe loading="lazy" src="https://drive.google.com/embeddedfolderview?id=' . $content . '#grid" frameborder="0" width="100%" height="300px" scrolling="auto"></iframe>';
}
add_shortcode( 'gdrive', 'gdrive_shortcode' );

// Remove protected from title of password protected pages
function the_title_trim($title) {

	$title = attribute_escape($title);

	$findthese = array(
		'#Protected:#'
	);

	$replacewith = array(
		'', // What to replace "Protected:" with
		'' // What to replace "Private:" with
	);

	$title = preg_replace($findthese, $replacewith, $title);
	return $title;
}
add_filter('the_title', 'the_title_trim');


// remove instax theme menu from top admin bar
function shapeSpace_remove_toolbar_menu() {
	
	global $wp_admin_bar;
	
	$wp_admin_bar->remove_menu('logancee_options_options');
	
}
add_action('wp_before_admin_bar_render', 'shapeSpace_remove_toolbar_menu', 999);

// Display posts from category
function wpb_postsbycategory() {
    // the query
    $the_query = new WP_Query( array( 'category_name' => 'press-articles', 'posts_per_page' => 10 ) ); 
     
    // The Loop
    if ( $the_query->have_posts() ) {
        $string .= '<div class="postsbycategory widget_recent_entries presshub-postwrap">';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
                if ( has_post_thumbnail() ) {
                $string .= '<div class="photo-postwrap postWrapper" style="background-image: url('. get_the_post_thumbnail_url() . ');">';
                $string .= '
                <a href="' . get_the_permalink() .'" rel="bookmark">
                    <div class="post-title-box">
                        <div>
                            <div class="title-blog">
                                <h2>'. get_the_title() .'</h2>
                                <p>'. get_the_date('d/m/Y') .'</p>
                            </div>
                        </div>
                    </div>
                </a>
                </div>';
                } else { 
                // if no featured image is found
                $string .= '<li><a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a></li>';
                }
                }
        } else {
        // no posts found
        }
    $string .= '</div>';
     
    return $string;
     
    /* Restore original Post Data */
    wp_reset_postdata();
    }
    // Add a shortcode
    add_shortcode('categoryposts', 'wpb_postsbycategory');
     
    // Enable shortcodes in text widgets
    add_filter('widget_text', 'do_shortcode');

// random post link
add_action('init','random_add_rewrite');
function random_add_rewrite() {
    global $wp;
    $wp->add_query_var('random');
    add_rewrite_rule('random/?$', 'index.php?random=1', 'top');
}

add_action('template_redirect','random_template');
function random_template() {
    if (get_query_var('random') == 1) {
        $arguments = array('orderby' => 'rand', 'numberposts' => 1, 'category' => '210');
        $posts = get_posts( $arguments );
        foreach($posts as $post) {
            $link = get_permalink($post);
        }
        wp_redirect($link,307);
        exit;
    }
}
/**
 * Redirection Plugin Editor access
 */
add_filter( 'redirection_role', 'redirection_to_editor' );
function redirection_to_editor() {
    return 'edit_pages';
}

// Remove press hub articles from instazine loop
function exclude_category_home( $query ) {
if ( $query->is_home ) {
$query->set( 'cat', '-297' );
}
return $query;
}

add_filter( 'pre_get_posts', 'exclude_category_home' );

// Shortcode for features tab 
function benefits_func( $atts ){

    // acf variables
    $rows = get_field('benefits'); 
    $row_count = count($rows);
   
    if($rows) {
        echo '<dl class="responsive-tabs" id="first-tab">';
            foreach($rows as $row) {
                echo '<dt style="background-color:' . $row['background_color'] . '" class="text-color' . $row['text_color'] . ' tab-width-' . $row_count . ' nav-tab arrow-indicator">
                       
                            ' . $row['tab_name'] . '
                       
                     </dt>';
                echo '<dd>
                        <div style="background-color:' . $row['background_color'] . '" class="tab-content-area image-mobile-'. $row['image_position'] .'">
                            <div class="col-md-3 col-lg-4 col-lg-offset-2 padt30-mob">
                                <div class="content-wrap text-color' . $row['text_color'] . '">
                                    <h3>' . $row['tagline'] . '</h3>
                                    <p>' . $row['main_copy'] .'</p>
                                </div>
                            </div> 
                            <div class="col-md-6 col-lg-offset-1 image-mobile-'. $row['image_position'] .'"> 
                            
                                <img src="' . $row['feature_images'] .'"'; ?>
                                    <?php
                                        if ($row['image_position'])  :
                                            echo 'class="floatright"'; 
                                        endif; 
                                    ?>
                                <?php echo ' />

                            </div>
                            <a href="#first-tab" class="close-tab mobile-only"><img src="/wp-content/themes/Instax/images/close-icon.png"/></a>
                        </div>
                </dd>';
            }
        echo '</dl>';
    }
}
add_shortcode( 'features', 'benefits_func' ); 


// Shortcode for questions accordion 
function accordion_func( $atts ){

    // acf variables
    $rows = get_field('question'); 
   
    if($rows) {
        echo '<dl class="accordion faq">';
            foreach($rows as $row) {
                echo '<dt class="question-wrap" style="background-color:' . $row['background_color'] . '" class="text-color' . $row['text_color'] . '">
                            <p class="close-accordion">&times;</p>
                            ' . $row['question_label'] . '
                       
                     </dt>';
                echo '<dd class="question-answer" style="background-color:' . $row['background_color'] . '">
                        <div>
                            <div class="col-md-12 padt30-mob">
                                <div class="content-wrap text-color' . $row['text_color'] . '">
                                    <p>' . $row['question_answer'] .'</p>
                                </div>
                            </div> 
                        </div>
                    </dd>';
            }
        echo '</dl>';
    }
}
add_shortcode( 'questions-expander', 'accordion_func' ); 

// Shortcode for animated gif
function animated_gif($feats){
    

    echo '<div class="gifWrap" id="gifWrap">
        <div class="gifFrame" id="gifFrame" style="background-image: url(/wp-content/themes/Instax/images/sq20_skateboard.gif);">
            <!--<div class="gifContent">
                <img id="gifContent" src="/wp-content/themes/Instax/images/sq20_screen.gif"/>
            </div>-->
        </div>
       
    </div>';


}
add_shortcode( 'SQ20-feature', 'animated_gif' ); 


//shortcode for buy now and retailers section
function bn_retailers($set){
    echo '<div class="height-slide float-left d-block w-100">
    <div class="retail-wrap"> 
        <div class="col-md-7 nopadding">
            <a href="';the_field('buy_now');
            echo '" target="_blank" id="buynowid-';
            strtolower(str_replace(' ', '', the_title('', '', false)));
            echo '" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-square blue-cta">BUY NOW</a>
        </div>
        <div class="col-md-5 nopadding">
            <div class="retailer-wrap">
                <div class="bg-wrap">
                    <div class="row">
                        <div class="container">
                            <div class="vertical-slider">';
                            if( have_rows('retailers') ): 
                                echo '<ul class="slides">';
                                    $rows = get_field('retailers');
                                    shuffle( $rows );
                                    while( have_rows('retailers') ): the_row(); 
                                        // vars
                                        $image = get_sub_field('retailer_logo');

                                        echo '<li>
                                        <div class="vertical-caption">
                                              <img src="';
                                                echo $image['url'];
                                                echo'" alt="';
                                                echo $image['alt'];
                                                echo '" />';
                                        echo '</div>
                                        </li>';
                            endwhile; echo '</ul>'; endif; echo '</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
       echo '<div class="expand-content non-product"><div class="container"><p class="text-center">Available at:</p>';
       if( have_rows('retailers') ): while( have_rows('retailers') ): the_row(); 
           $image = get_sub_field('retailer_logo');
           $link = get_sub_field('retailer_link');
               echo '<div class="col-xs-6">';
                   if( $link ): 
                       echo '<a href="';
                       echo $link;
                       echo '" target="_blank" id="retailerid-';
                       echo $link;
                       echo '">';
                   endif; 
                           echo '<img src="';
                           echo $image['url']; 
                           echo '" alt="';
                           echo $image['alt'];
                           echo '" />';
                   if( $link ): 
                       echo '</a>';
                   endif; 
               echo '</div>';
       endwhile; endif;
        echo '</div></div></div></div>';
}
add_shortcode( 'buy_now_retailers', 'bn_retailers' ); 
// Custom post type - FAQS

function register_faq_entities() {
    $faq_args = array(
      'public' => true,
      'label'  => 'FAQs',
      'rewrite' => array( 'slug' => 'faqs' ),
      'taxonomies' => array( 'section' )
    );
    register_post_type( 'faqs', $faq_args );

    $taxonomy_args = array(
      'labels' => array( 'name' => 'FAQ Sections' ),
      'show_ui' => true,
      'show_tagcloud' => false,
      'rewrite' => array( 'slug' => 'faqs' )
    );
    register_taxonomy( 'section', array( 'faqs' ), $taxonomy_args );
}

add_action( 'init', 'register_faq_entities' );

add_filter( 'posts_where', 'title_like_posts_where', 10, 2 );
function title_like_posts_where( $where, $wp_query ) {
    global $wpdb;
    if ( $post_title_like = $wp_query->get( 'post_title_like' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
    }
    return $where;
}
// Reorganising the layout of comments

function mytheme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
     <div <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
         <div id="comment-<?php comment_ID(); ?>">
             <div class="comment-avatar col-xs-1 text-center">
             <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
             </div>
             <?php if ($comment->comment_approved == '0') : ?>
                 <em><?php _e('Your comment is awaiting moderation.') ?></em>
                 <br />
             <?php endif; ?>
 
             <div class="comment-meta commentmetadata col-xs-11">
                 <?php printf(__('<cite class="comment-author">%s</cite> <span class="says">says on</span>'), get_comment_author_link()) ?>
                 <a class="comment-post-time" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
                     <?php printf(__('%1$s'), get_comment_date()) ?>
                 </a> <?php edit_comment_link(__('(Edit)'),'  ','') ?>
                 <?php comment_text() ?>
             </div>
         </div>
     </div>
 <?php }
 

//unset( $_COOKIE[$v_username] );
//setcookie( $v_username, '', time() - ( 15 * 60 ) );



/*
function ns_google_tag_manager_head() { ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TKDLHLM');</script>
<!-- End Google Tag Manager -->
  <?php
  }
  
add_action( 'wp_head', 'ns_google_tag_manager_head', 10 );
*/
/*
function ns_google_analytics() { ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145684397-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-145684397-1');
		</script>
  <?php
  }
  
add_action( 'wp_head', 'ns_google_analytics', 10 );
*/
/*
function ns_facebook_pixel() { ?>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '957675440961709');
  fbq('track', 'PageView');
  fbq('dataProcessingOptions', ['LDU'], 0, 0);
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=957675440961709&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
  <?php
  }  
add_action( 'wp_head', 'ns_facebook_pixel', 10 );
*/
?>
<?php
add_action( 'wp_footer', 'custom_popup_js', 1000 );
function custom_popup_js() { ?>
    <script type="text/javascript">   
        // Open the Modal
        function openModal(myElement) {
            jQuery("#"+myElement).css("display","block");
        }
        // Close the Modal
        function closeModal(isVideo) {
            (function($) {
                $(".modal").css("display","none");
                if(isVideo){  
                    $('.resp-iframe').each(function(){
                        this.src = this.src;
                    });       
                }
            })( jQuery );
        }
        //onclick for video opener
        (function ($, document) {
            $(document).ready(function () {
                $(".modal-opener").click(function(){
                    if( $(this).data('id') != undefined ){
                        openModal($(this).data('id'));
                    } else {
                        openModal("myModal-"+$(this).attr('id'));
                    }
                    return false;
                });
            });
        }(jQuery, document));
        //open modal when hash is found
        (function ($, document) {
            $(document).ready(function () {
                var hash = window.location.hash,
                    selector = $(hash);
                if (selector.length) {
                    selector.click();
                    selector.find(".pum-trigger").click();
                }
            });
        }(jQuery, document));
    </script><?php
}
/**
 * Disable the emoji's
 */
function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
 if ( 'dns-prefetch' == $relation_type ) {
 /** This filter is documented in wp-includes/formatting.php */
 $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

$urls = array_diff( $urls, array( $emoji_svg_url ) );
 }

return $urls;
}
function load_cookieconsent_assets(){
    wp_enqueue_style('cookie-consent', get_stylesheet_directory_uri().'/fnac/cookie-consent/cookieconsent.min.css', false, NULL, 'all');
    wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/fnac/cookie-consent/cookieconsent.min.js', array(), '1.0.1', true);
} 
add_action( 'wp_enqueue_scripts', 'load_cookieconsent_assets' );

add_action( 'wp_print_footer_scripts', 'cookieconsent_init');
function cookieconsent_init() { ?>
    <script type="text/javascript">
    window.addEventListener("load", function(){
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#464c50",
                    "text": "#ffffff"
                },
                "button": {
                    "background": "#04cbf4",
                    "text": "#ffffff"
                }
            },
            "theme": "block",
            "type": "informational",
            "content": {
                message: '<span id="cookieconsent:desc" class="cc-message">Cookies are important to the proper functioning of a site. To improve your experience, we use cookies to collect statistics to optimise site functionality, and deliver content tailored to your interest.<br> By continuing to use this website site you are giving us your consent to do this. For more information you can read our</span>',
                link: 'Privacy Policy',
                href: '/privacy-policy'
            }
        });
    });
    </script><?php
}
function google_site_verification() { 
    if( get_current_blog_id() == 1){
    ?>
    <meta name="google-site-verification" content="PTlsQfxOhZXDVoJwmvXSVlJ2ijFiFiDbzYVfN3abffA" />
    <?php
    }
}  
add_action( 'wp_head', 'google_site_verification', 10 );

//film carousel
function my_carousel() { ?>
    <?php if( have_rows('film_carousel') ) { ?>        
        <div class="owl-carousel film-carousel owl-theme" style="display: none;">
            <?php while( have_rows('film_carousel') ) : the_row(); ?>
            <div class="item"><img style="width:auto;margin:auto;" src="<?php echo get_sub_field('image')['url'] ?>" alt="" width="<?php echo get_sub_field('image')['width'] ?>" height="<?php echo get_sub_field('image')['height'] ?>"></div>
            <?php endwhile; ?>
        </div>        
        <script type="text/javascript">
            jQuery(window).ready(function( $ ) {
                $('.owl-carousel.film-carousel').owlCarousel({
                    loop:true,
                    margin:10,
                    nav:false,
                    autoplay:true,
                    lazyLoad:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:5
                        }
                    }
                });
                $('.owl-carousel.film-carousel').show();
            });
        </script>
    <?php } 
}
add_shortcode( 'my_carousel', 'my_carousel' );



function include_carousel_scripts(){
    if( have_rows('film_carousel') ) { 
        wp_enqueue_style('owl-car', get_stylesheet_directory_uri().'/fnac/OwlCarousel2-2.3.4/assets/owl.carousel.min.css',array(),'1.0.0'); 
        wp_enqueue_style('owl-car-theme', get_stylesheet_directory_uri().'/fnac/OwlCarousel2-2.3.4/assets/owl.theme.default.css',array(),'1.0.0');  
        wp_enqueue_script('owl-car-script', get_stylesheet_directory_uri().'/fnac/OwlCarousel2-2.3.4/owl.carousel.min.js', array(), '1.0.0', true);
    }
}
add_action( 'wp_enqueue_scripts', 'include_carousel_scripts' );