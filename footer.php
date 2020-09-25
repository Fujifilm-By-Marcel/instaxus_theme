<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Instax
 */
?>
<!-- Sign up block -->
<?php 
        if ( is_category('Press Articles') or 
            is_page_template($template = 'page-presshub.php') or 
            is_page_template($template = 'page-imagebank.php') or 
            is_tag($tag = array('361', '362', '360')) 
         ):  ?>
       <div class="container">
            <div class="block-color-row row-blue color-white">
                <?php echo do_shortcode('[custom_block name="PH_signup"]'); ?>
            </div>
       </div>
<?php endif; ?>
<!-- // sign up block -->
<!-- Instax FOOTER ================================================== -->
<div class="footer-wrapper desktop-footer">
    <div class="footer-contain container">
        <div class="col-md-6">
            <div class="col-md-6">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer menu 1") ) : ?>
                <?php endif;?>
            </div>
            <div class="col-md-6">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer menu 2") ) : ?>    
                <?php endif;?>
            </div>
        </div>
        <div class="col-md-6 text-right">
            <div class="socials">
            <a href="https://twitter.com/Instax" target="_blank"><img src="/wp-content/themes/Instax/images/twitter-icon.png" alt="Instax Twitter"></a>
            <a href="https://www.instagram.com/fujifilm_instax_northamerica/" target="_blank"><img src="/wp-content/themes/Instax/images/instagram-icon.png" alt="Instax Instagram"></a>
            <a href="https://www.facebook.com/FUJIFILM.INSTAX/" target="_blank"><img src="/wp-content/themes/Instax/images/facebook-icon.png" alt="Instax Facebook"></a>
            <a href="https://www.pinterest.com/INSTAXamericas/" target="_blank"><img src="/wp-content/themes/Instax/images/pinterest-icon.png" alt="Instax Pinterest"></a>
            <a href="https://www.youtube.com/channel/UCCdyBNOeDzw7C0QOZQVoGQA" target="_blank"><img src="/wp-content/themes/Instax/images/youtube-icon.png" alt="Instax Youtube"></a>
            </div>
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer copyright") ) : ?>    
            <?php endif;?>
        </div>
    </div>
</div>
<div class="footer-wrapper mobile-footer">
    <div class="footer-contain">
        <div class="socials">
            <a target="_blank" href="https://twitter.com/instaxHQ"><img src="/wp-content/themes/Instax/images/twitter-icon.png" alt="Instax Twitter"></a>
            <a target="_blank" href="https://www.instagram.com/instaxhq/"><img src="/wp-content/themes/Instax/images/instagram-icon.png" alt="Instax Instagram"></a>
            <a target="_blank" href="https://www.facebook.com/instaxHQ/"><img src="/wp-content/themes/Instax/images/facebook-icon.png" alt="Instax Facebook"></a>
            <a target="_blank" href="https://www.pinterest.co.uk/instaxHQ/"><img src="/wp-content/themes/Instax/images/pinterest-icon.png" alt="Instax Pinterest"></a>
            <a target="_blank" href="https://www.youtube.com/instaxhq"><img src="/wp-content/themes/Instax/images/youtube-icon.png" alt="Instax Youtube"></a>
        </div>
        <div class="col-xs-12">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer menu 1") ) : ?>
            <?php endif;?>
        </div>
        <div class="col-xs-12">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer menu 2") ) : ?>    
            <?php endif;?>
        </div>
        <div class="col-xs-12 text-right">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer copyright") ) : ?>    
            <?php endif;?>
        </div>
    </div>
</div>

<a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>

<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>

<script src="/wp-content/themes/Instax/js/noframework.waypoints.min.js"></script>
<script ></script>
<script type="text/javascript">
    /*
	var waypoint = new Waypoint({
        element: document.getElementById('gifWrap'),
        handler: function(direction) {
            document.getElementById("gifWrap").className = "gifWrap visible slideInRight animated slower";
        }, offset: '50%'
    })
	*/
</script>
<script>
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
</script>     
<?php wp_footer(); ?>
</body>
</html>
