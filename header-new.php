<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Instax
 */

$logancee_options = logancee_get_options();?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>  class="<?php echo esc_attr($logancee_options['layout-responsive']) == 1 ? 'responsive' : ''; ?> <?php echo logancee_get_active_skin(true); ?>">
<head>
     <meta charset="<?php bloginfo( 'charset' ); ?>">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="p:domain_verify" content="87b814615fa3ed39c584762384daeaaf"/>
     <link rel="profile" href="http://gmpg.org/xfn/11">
     <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
     <link rel="stylesheet" href="/wp-content/themes/Instax/css/main.min.css?v=1.0.3">
     <?php if($logancee_options['layout-favicon']['url'] && (! function_exists( 'has_site_icon' ) || ! has_site_icon())): ?>
     <link rel="shortcut icon" href="<?php echo esc_url($logancee_options['layout-favicon']['url']); ?>" type="image/x-icon" />
     <?php endif; ?>
     <?php wp_head(); ?>

    <script src="https://use.typekit.net/qvi3cfz.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

</head>

<body <?php body_class(logancee_get_body_class()); ?>>

<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>

<?php
    // Get Meta Values
    wp_reset_postdata();
    $logancee_layout = logancee_layout();
    $logancee_sidebar = logancee_sidebar();

?>

   
<div class="<?php if($logancee_options['layout-main'] == 2) { echo 'fixed-body'; } else { echo 'standard-body'; } ?>">
	<div id="main" >           
    	<div class="wrap new-header">
            <div class="standard-body">
                <div class="full-width" style="position: relative;">
                    <div class="container">                    	
                    	<div class="logo-main-menu-container">
	                        <div class="logo">
	                            <a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>" rel="home">	                            
	                            <?php if($logancee_options['layout-logotype']){
	                                echo '<img src="'.$logancee_options['layout-logotype']['url'].'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ) .'"/>';
	                            } ?>	                            
	                            </a>
	                        </div>
	                        <div class="main-menu">
	                            <?php
	                            	$menu = wp_nav_menu(
										array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
                                            'walker' => new WPDocs_Walker_Nav_Menu(),
										)
									);							
							    ?>
	                        </div>  
                            <div class="menu-toggle" onclick="toggleMenu()">
                                <span></span>
                                <span></span>
                                <span></span>                              
                            </div>
	                    </div>
                    </div>
                </div>
            </div>
        </div>   
    
        
          <!-- MAIN CONTENT
          ================================================== -->
          <div class="main-content <?php if($logancee_options['layout-content'] == 1) { echo 'full-width'; } else { echo 'fixed'; } ?><?php if(!is_front_page()):?> inner-page <?php else: ?> home<?php endif;?>">
               <div class="background-content"></div>
               <div class="background">
                    <div class="shadow"></div>
                    <div class="pattern">
                        <?php if ( is_active_sidebar( 'content-top' ) ) : ?>
                        <div class="row">
                            <div class="col-sm-12">
                            <?php dynamic_sidebar( 'content-top' ); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                            <div class="row">
                                <?php if ($logancee_layout == 'left-sidebar' && $logancee_sidebar && is_active_sidebar( $logancee_sidebar )) : ?>
                                <div class="col-md-3 sidebar" id="column-left"><!-- main sidebar -->
                                    <?php dynamic_sidebar( $logancee_sidebar ); ?>
                                </div><!-- end main sidebar -->
                                <?php endif; ?>
                                
                                <div class="<?php if (($logancee_layout == 'left-sidebar' || $logancee_layout == 'right-sidebar') && $logancee_sidebar && is_active_sidebar( $logancee_sidebar )) echo 'col-md-9'; else echo 'col-sm-12 col-md-12'; ?>">
                                     <div <?php if(!is_front_page()):?>class="center-column"<?php endif; ?> <?php if(!is_front_page()):?> id="content" <?php endif; ?>>
                                        <?php if(function_exists('wc_print_notices')):?>
                                        <?php wc_print_notices(); ?>
                                        <?php endif; ?>
