<?php
/**
 * Woocommerce Compare page
 *
 * @author Your Inspiration Themes
 * @package YITH Woocommerce Compare
 * @version 1.1.4
 */

// remove the style of woocommerce
if( defined('WOOCOMMERCE_USE_CSS') && WOOCOMMERCE_USE_CSS ) wp_dequeue_style('woocommerce_frontend_styles');

$is_iframe = (bool)( isset( $_REQUEST['iframe'] ) && $_REQUEST['iframe'] );
$logancee_options = logancee_get_options();

wp_enqueue_script( 'jquery-fixedheadertable', YITH_WOOCOMPARE_ASSETS_URL . '/js/jquery.dataTables.min.js', array('jquery'), '1.3', true );
wp_enqueue_script( 'jquery-fixedcolumns', YITH_WOOCOMPARE_ASSETS_URL . '/js/FixedColumns.min.js', array('jquery', 'jquery-fixedheadertable'), '1.3', true );

    wp_enqueue_style( 'compare-style', $this->stylesheet_url());
    wp_enqueue_style( 'colorbox', YITH_WOOCOMPARE_URL . 'assets/css/colorbox.css');
    wp_enqueue_style( 'dataTables', YITH_WOOCOMPARE_URL . 'assets/css/jquery.dataTables.css');
    wp_enqueue_style( 'bootstrap', logancee_sys_theme_css . '/bootstrap.css');
    wp_enqueue_style( 'animate', logancee_sys_theme_css . '/animate.css');
    wp_enqueue_style( 'responsive', logancee_sys_theme_css . '/responsive.css');
    wp_enqueue_style( 'stylesheet', logancee_sys_theme_css . '/stylesheet.css');
    wp_enqueue_style( 'woocommerce', logancee_sys_theme_css . '/woocommerce.css');
    wp_enqueue_style( 'logancee-fonts', logancee_slug_fonts_url(), array(), null );




$widths = array();
foreach( $products as $product ) $widths[] = '{ "sWidth": "205px", resizeable:true }';

$table_text = get_option( 'yith_woocompare_table_text' );
do_action ( 'wpml_register_single_string', 'Plugins', 'plugin_yit_compare_table_text', $table_text );
$localized_table_text = apply_filters ( 'wpml_translate_single_string', $table_text, 'Plugins', 'plugin_yit_compare_table_text' );

?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if gt IE 9]>
<html class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if !IE]>
<html <?php language_attributes() ?>>
<![endif]-->

<!-- START HEAD -->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php _e( 'Product Comparison', 'yith-woocommerce-compare' ) ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <?php wp_head() ?>

    <?php do_action( 'yith_woocompare_popup_head' ) ?>

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" />
    <link rel="stylesheet" href="<?php echo $this->stylesheet_url() ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo YITH_WOOCOMPARE_URL ?>assets/css/colorbox.css"/>
    <link rel="stylesheet" href="<?php echo YITH_WOOCOMPARE_URL ?>assets/css/jquery.dataTables.css"/>

    <style type="text/css">
        body.loading {
            background: url("<?php echo YITH_WOOCOMPARE_URL ?>assets/images/colorbox/loading.gif") no-repeat scroll center center transparent;
        }
    </style>
</head>
<!-- END HEAD -->

<?php $product = logancee_get_product(); ?>

<!-- START BODY -->
<body <?php body_class('woocommerce') ?>>

<h1 class="compare-title">
    <?php echo $localized_table_text ?>
    <?php if ( ! $is_iframe ) : ?><a class="close" href="#"><?php _e( 'Close window [X]', 'yith-woocommerce-compare' ) ?></a><?php endif; ?>
</h1>

<?php do_action( 'yith_woocompare_before_main_table' ); ?>

<table class="compare-list" cellpadding="0" cellspacing="0"<?php if ( empty( $products ) ) echo ' style="width:100%"' ?>>
    <thead>
    <tr>
        <th>&nbsp;</th>
        <?php foreach( $products as $product_id => $product ) : ?>
            <td></td>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>&nbsp;</th>
        <?php foreach( $products as $product_id => $product ) : ?>
            <td></td>
        <?php endforeach; ?>
    </tr>
    </tfoot>
    <tbody>

    <?php if ( empty( $products ) ) : ?>

        <tr class="no-products">
            <td><?php _e( 'No products added in the compare table.', 'yith-woocommerce-compare' ) ?></td>
        </tr>

    <?php else : ?>


        <?php foreach ( $fields as $field => $name ) : ?>

            <tr class="<?php echo $field ?>">

                <th>
                    <?php echo $name ?>
                    <?php if ( $field == 'image' ) echo '<div class="fixed-th"></div>'; ?>
                </th>

                <?php
                $index = 0;
                foreach( $products as $product_id => $product ) :
                    $product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id; ?>
                    <td class="<?php echo $product_class; ?>"><?php
                        switch( $field ) {

                            case 'image':
                                echo '<div class="image-wrap">' . wp_get_attachment_image( $product->fields[$field], 'yith-woocompare-image' ) . '</div>';
                                break;

                            case 'add-to-cart':
                                woocommerce_template_loop_add_to_cart();
                                break;

                            default:
                                echo empty( $product->fields[$field] ) ? '&nbsp;' : $product->fields[$field];
                                break;
                        }
                        ?>
                    </td>
                    <?php
                    ++$index;
                endforeach; ?>

            </tr>

        <?php endforeach; ?>

        <?php if ( $repeat_price == 'yes' && isset( $fields['price'] ) ) : ?>
            <tr class="price repeated">
                <th><?php echo $fields['price'] ?></th>

                <?php
                $index = 0;
                foreach( $products as $product_id => $product ) :
                    $product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id ?>
                    <td class="<?php echo $product_class ?>"><?php echo $product->fields['price'] ?></td>
                    <?php
                    ++$index;
                endforeach; ?>

            </tr>
        <?php endif; ?>

        <?php if ( $repeat_add_to_cart == 'yes' && isset( $fields['add-to-cart'] ) ) : ?>
            <tr class="add-to-cart repeated">
                <th><?php echo $fields['add-to-cart'] ?></th>

                <?php
                $index = 0;
                foreach( $products as $product_id => $product ) :
                    $product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id ?>
                    <td class="<?php echo $product_class ?>">
                        <?php woocommerce_template_loop_add_to_cart(); ?>
                    </td>
                    <?php
                    ++$index;
                endforeach; ?>

            </tr>
        <?php endif; ?>

    <?php endif; ?>
    <tr class="remove">
        <th>&nbsp;</th>
        <?php
        $index = 0;
        foreach( $products as $product_id => $product ) :
            $product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id ?>
            <td class="<?php echo $product_class; ?>">
                <a href="<?php echo add_query_arg( 'redirect', 'view', $this->remove_product_url( $product_id ) ) ?>" data-product_id="<?php echo $product_id; ?>"><?php _e( 'Remove', 'yith-woocommerce-compare' ) ?> <span class="remove">x</span></a>
            </td>
            <?php
            ++$index;
        endforeach;
        ?>
    </tr>
    </tbody>
</table>

<?php do_action( 'yith_woocompare_after_main_table' ); ?>

<?php if( wp_script_is( 'responsive-theme', 'enqueued' ) ) wp_dequeue_script( 'responsive-theme' ) ?><?php if( wp_script_is( 'responsive-theme', 'enqueued' ) ) wp_dequeue_script( 'responsive-theme' ) ?>
<?php print_footer_scripts(); ?>

<script type="text/javascript">

    jQuery(document).ready(function($){
        <?php if ( $is_iframe ) : ?>$('a').attr('target', '_parent');<?php endif; ?>

        var oTable;
        $('body').on( 'yith_woocompare_render_table', function(){
            if( $( window ).width() > 767 ) {
                oTable = $('table.compare-list').dataTable( {
                    "sScrollX": "100%",
                    //"sScrollXInner": "150%",
                    "bScrollInfinite": true,
                    "bScrollCollapse": true,
                    "bPaginate": false,
                    "bSort": false,
                    "bInfo": false,
                    "bFilter": false,
                    "bAutoWidth": false
                } );

                new FixedColumns( oTable );
                $('<table class="compare-list" />').insertAfter( $('h1') ).hide();
            }
        }).trigger('yith_woocompare_render_table');

        // add to cart
        var button_clicked,
            redirect_to_cart = false;

        $(document).on('click', 'a.add_to_cart_button', function(){
            button_clicked = $(this);
            button_clicked.block({message: null, overlayCSS: {background: '#fff url(' + woocommerce_params.ajax_loader_url + ') no-repeat center', backgroundSize: '16px 16px', opacity: 0.6}});
        });

        // close colorbox if redirect to cart is active after add to cart
        $('body').on( 'adding_to_cart', function ( $thisbutton, data ) {
            if( wc_add_to_cart_params.cart_redirect_after_add == 'yes' ) {
                wc_add_to_cart_params.cart_redirect_after_add = 'no';
                redirect_to_cart = true;
            }
        });

        // remove add to cart button after added
        $('body').on('added_to_cart', function( ev, fragments, cart_hash, button ){


            if( redirect_to_cart == true ) {
                // redirect
                parent.window.location = wc_add_to_cart_params.cart_url;
                return;
            }

            button_clicked.hide();

            <?php if ( $is_iframe ) : ?>
            $('a').attr('target', '_parent');

            // Replace fragments
            if ( fragments ) {
                $.each(fragments, function(key, value) {
                    $(key, window.parent.document).replaceWith(value);
                });
            }
            <?php endif; ?>
        });

        // close window
        $(document).on( 'click', 'a.close', function(e){
            e.preventDefault();
            window.close();
        });

        $(window).on( 'yith_woocompare_product_removed', function(){
            if( $( window ).width() > 767 ) {
                oTable.fnDestroy(true);
            }
            $('body').trigger('yith_woocompare_render_table');
        });

    });

</script>

</body>
</html>
