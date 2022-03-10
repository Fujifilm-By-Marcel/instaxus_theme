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
<div id="socials-block"></div>
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
        <div class="col-md-6">
            <div class="socials text-right">
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
        <div class="socials text-center" >
            <a href="https://twitter.com/Instax" target="_blank"><img src="/wp-content/themes/Instax/images/twitter-icon.png" alt="Instax Twitter"></a>
            <a href="https://www.instagram.com/fujifilm_instax_northamerica/" target="_blank"><img src="/wp-content/themes/Instax/images/instagram-icon.png" alt="Instax Instagram"></a>
            <a href="https://www.facebook.com/FUJIFILM.INSTAX/" target="_blank"><img src="/wp-content/themes/Instax/images/facebook-icon.png" alt="Instax Facebook"></a>
            <a href="https://www.pinterest.com/INSTAXamericas/" target="_blank"><img src="/wp-content/themes/Instax/images/pinterest-icon.png" alt="Instax Pinterest"></a>
            <a href="https://www.youtube.com/channel/UCCdyBNOeDzw7C0QOZQVoGQA" target="_blank"><img src="/wp-content/themes/Instax/images/youtube-icon.png" alt="Instax Youtube"></a>
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

<!--<script src="/wp-content/themes/Instax/js/noframework.waypoints.min.js"></script>-->
<?php wp_footer(); ?>
</body>
</html>
