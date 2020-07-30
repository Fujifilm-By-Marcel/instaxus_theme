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
<meta name="google-site-verification" content="NJh6IjFPXIEFgzvGKHEczqNWu3zvuYlCZ1RPeDroOQY" />


     <meta charset="<?php bloginfo( 'charset' ); ?>">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="p:domain_verify" content="87b814615fa3ed39c584762384daeaaf"/>
     <link rel="profile" href="http://gmpg.org/xfn/11">
     <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
     <link rel="stylesheet" href="/wp-content/themes/Instax/css/main.min.css?v=1.0.2">
     <?php if($logancee_options['layout-favicon']['url'] && (! function_exists( 'has_site_icon' ) || ! has_site_icon())): ?>
     <link rel="shortcut icon" href="<?php echo esc_url($logancee_options['layout-favicon']['url']); ?>" type="image/x-icon" />
     <?php endif; ?>
     <?php wp_head(); ?>

    <script src="https://use.typekit.net/qvi3cfz.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

</head>

<body <?php body_class(logancee_get_body_class()); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKDLHLM"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php
    // Get Meta Values
    wp_reset_postdata();
    $logancee_layout = logancee_layout();
    $logancee_sidebar = logancee_sidebar();

?>


<?php if($logancee_options['widget-facebook-status']) { ?>
<div id="widget-facebook" class="facebook_<?php if($logancee_options['widget-facebook-position'] == 1) { echo 'left'; } else { echo 'right'; } ?> hidden-xs hidden-sm">
	<div class="facebook-icon"></div>
	<div class="facebook-content">
		<div class="fb-like-box fb_iframe_widget" profile_id="<?php echo esc_html($logancee_options['widget-facebook-id']); ?>" data-colorscheme="light" data-height="370" data-connections="16" ></div>
	</div>
</div>
<?php } ?>

<?php if($logancee_options['widget-twitter-status']) { ?>
<div id="widget-twitter" class="twitter_<?php if($logancee_options['widget-twitter-position'] == 1) { echo 'left'; } else { echo 'right'; } ?> hidden-xs hidden-sm">
	<div class="twitter-icon"></div>
	<div class="twitter-content" id="widget-twitter-content">
		<a class="twitter-timeline"  href="https://twitter.com/<?php echo esc_html($logancee_options['widget-twitter-username']); ?>"  data-tweet-limit="<?php echo esc_html($logancee_options['widget-twitter-limit']); ?>" >Tweets by @<?php echo esc_html($logancee_options['widget-twitter-username']); ?></a>
 </div>
</div>
<?php } ?>

<?php if($logancee_options['widget-custom-status']) { ?>
<div id="widget-custom-content" class="custom_<?php if($logancee_options['widget-custom-position'] == 1) { echo 'left'; } else { echo 'right'; } ?> hidden-xs hidden-sm">
	<div class="custom-icon"></div>
	<div class="custom-content">
		<?php $custom_content = $logancee_options['widget-custom-content']; ?>
		<?php if(isset($custom_content)) echo html_entity_decode($custom_content); ?>
	</div>
</div>
<?php } ?>

<?php if($logancee_options['block-popup-status']) { ?>
    <?php if (!$logancee_options['block-popup-only-homepage'] || ( $logancee_options['block-popup-only-homepage'] && is_front_page())):?>
    <div id="popup" class="popup popup-newsletter mfp-hide <?php echo $logancee_options['block-popup-showonlyonce'] ? ' onlyonce' : ''; ?>" style="max-width: <?php echo $logancee_options['block-popup-width']; ?>">
    <?php if ($logancee_options['block-popup-custom_block'] != '') { ?>
    <?php echo do_shortcode('[custom_block name="'.$logancee_options['block-popup-custom_block'].'"]') ?>
    <?php
    }?>
    <?php echo logancee_parse_shortcode(html_entity_decode($logancee_options['block-popup-content'])); ?>
    </div>
    <?php endif; ?>
<?php } ?>
<?php if ( is_active_sidebar( 'top-page-sidebar' ) ) : ?>
    <?php dynamic_sidebar( 'top-page-sidebar' ); ?>
<?php endif; ?>
    
<div class="<?php if($logancee_options['layout-main'] == 2) { echo 'fixed-body'; } else { echo 'standard-body'; } ?>">
	<div id="main" class="<?php if($logancee_options['layout-main'] == 2) { echo 'main-fixed'; } ?>">


        <?php
        switch($logancee_options['header-type']){
      
        default:
            include get_template_directory() .'/layout/header/header_03.php';
            break;
        }
		?>


        
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
