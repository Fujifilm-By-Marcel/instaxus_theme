<?php
/**
 * YITH WooCommerce Ajax Search template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Ajax Search
 * @version 1.1.1
 */

if ( !defined( 'YITH_WCAS' ) ) { exit; } // Exit if accessed directly


wp_enqueue_script('yith_wcas_jquery-autocomplete' );

$yith_ajax_searchform_count = logancee_get_yith_ajax_searchform_count();

if (!isset($yith_ajax_searchform_count))
    $yith_ajax_searchform_count = 0;
$yith_ajax_searchform_count++;
?>
<div class="yith-ajaxsearchform-container_<?php echo esc_attr($yith_ajax_searchform_count) ?>">
<form role="search" method="get" id="yith-ajaxsearchform" action="<?php echo esc_url( home_url('/') ) ?>" class="searchform">
    <input class="input-block-level search-query" type="search" value="<?php echo get_search_query() ?>" name="s" id="yith-s_<?php echo esc_attr($yith_ajax_searchform_count) ?>" placeholder="<?php echo esc_html__('Search here', 'logancee'); ?>" autocomplete="off" />
    <div id="yith-searchsubmit" title="<?php echo esc_html__('Search', 'logancee'); ?>" type="submit" class="button-search"></div>

    <input type="hidden" name="post_type" value="product" />
</form>
</div>
<script type="text/javascript">
jQuery(function($){

    $('#yith-s_<?php echo esc_attr($yith_ajax_searchform_count) ?>').autocomplete({
        minChars: <?php echo get_option('yith_wcas_min_chars') * 1; ?>,
        appendTo: '.yith-ajaxsearchform-container_<?php echo esc_attr($yith_ajax_searchform_count) ?>',
        serviceUrl: woocommerce_params.ajax_url + '?action=yith_ajax_search_products',
        onSearchStart: function(){
            $(this).css({
                'background-image': 'url(<?php echo esc_url( get_template_directory_uri() ); ?>/img/loader.gif)',
                'background-repeat': 'no-repeat',
                'background-position': 'center'
            });
        },
        onSearchComplete: function(){
            $(this).css({
                'background-image': 'none',
                'background-repeat': 'no-repeat'
            });
        },
        onSelect: function (suggestion) {
            if( suggestion.id != -1 ) {
                window.location.href = suggestion.url;
            }
        }
    });
});
</script>
