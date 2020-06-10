<?php

$logancee_options = logancee_get_options();
if($logancee_options['font-status'] == 1 || $logancee_options['color-status'] == 1) { ?>
<style type="text/css">
    
	<?php if($logancee_options['color-status'] == 1) { ?>
		<?php if($logancee_options['color-body_font_text'] != '') { ?>
		body,
		.dropdown-menu,
		textarea, 
		input[type="text"], 
		input[type="password"], 
		input[type="datetime"], 
		input[type="datetime-local"], 
		input[type="date"], 
		input[type="month"], 
		input[type="time"], 
		input[type="week"], 
		input[type="number"], 
		input[type="email"], 
		input[type="url"], 
		input[type="search"], 
		input[type="tel"], 
		input[type="color"], 
		.uneditable-input,
		select,
		.search_form .button-search,
		.search_form .button-search2,
		.product-filter .options .button-group button {
			color: <?php echo esc_html($logancee_options['color-body_font_text']); ?>;
		}
		
		.ui-autocomplete li a {
			color: <?php echo esc_html($logancee_options['color-body_font_text']); ?> !important;
		}
		<?php } ?>
		
		<?php if($logancee_options['color-body_font_links'] != '') { ?>
		a,
		.dropdown-menu a,
        .blog-list-grid h5 a,
        .post .meta > li a
        ul.blog-list-default li h5,
		.vertical ul.megamenu > li > a,
        .post .meta > li a,
		.filter-product .filter-tabs ul > li.active > a,
		.filter-product .filter-tabs ul > li.active > a:hover,
		.filter-product .filter-tabs ul > li.active > a:focus {
			color: <?php echo esc_html($logancee_options['color-body_font_links']); ?>;
		}
		
		@media (max-width: 960px) {
			.responsive ul.megamenu > li > a {
				color: <?php echo esc_html($logancee_options['color-body_font_links']); ?> !important;
			}
		}
		<?php } ?>
		
		<?php if($logancee_options['color-body_font_links_hover'] != '') { ?>
		a:hover,
		.box-category ul li a.active,
		.product-list .actions > div ul,
		.product-info .cart .links a:before,
		.product-grid .product .only-hover ul li a:before,
		.hover-product .only-hover ul li a span,
		.product-list .name-desc .rating-reviews .reviews span,
		.product-list .actions > div ul,
		.main-content .content > ul li:before,
		.list-box li:before,
        .blog-list-grid h5:hover a,
        ul.blog-list-default li h5:hover,
        .blog-list-grid h5 a:hover,
        ul.blog-list-default li h5:hover,
        .post .meta > li a:hover,
		.breadcrumb .container ul li:before,
		ul.megamenu li .sub-menu .content .static-menu .menu ul ul li a:before,
		ul.megamenu li .sub-menu .content .hover-menu a:before,
		.vertical ul.megamenu > li.click:before, 
		.vertical ul.megamenu > li.hover:before,
        .payment_methods .payment_method_paypal a,
        .reset_variations,
        .myaccount_user a,
        header.title .edit,
        .cart-total table tr.shipping td .shipping-calculator-button,
		.category-wall .name a,
        .posts .post .post-cats a,
        .widget_links ul li a:before,
        .widget_pages ul li a:before,
        .widget_categories ul li a:before, 
        .widget_nav_menu ul li a:before {
			color: <?php echo esc_html($logancee_options['color-body_font_links_hover']); ?>;
		}
		
		.product-filter .options .button-group button:hover, 
		.product-filter .options .button-group .active {
			background: <?php echo esc_html($logancee_options['color-body_font_links_hover']); ?>;
		}
		
		@media (max-width: 767px) {
			.responsive ul.megamenu li .sub-menu .content .hover-menu .menu ul li ul li a:before,
			.responsive ul.megamenu li .sub-menu .content .static-menu .menu ul li ul li a:before  {
				color: <?php echo esc_html($logancee_options['color-body_font_links_hover']); ?>;
			}
		}
		<?php } ?>


		<?php if($logancee_options['color-body_price_text'] != '') { ?>
		.compare-info .price-new,
		.product-grid .product .price, 
        .compare-list .price,
		.hover-product .price,
		.product-list .actions > div .price,
		.product-info .price .price-new,
		.product-info .product-center .price > .woocommerce-Price-amount,
		ul.megamenu li .product .price,
		.mini-cart-total td:last-child,
		.cart-total table tr td:last-child,
		.mini-cart-info td.total,
		#quickview .price .price-new,
		#quickview .price > .woocommerce-Price-amount,
		.advanced-grid-products .product .right .price,
        .cart-subtotal .amount,
        .tax-rate .amount,
        .order-total .amount,
        .order_details tfoot td .amount,
        .product-list > div .price-box,
        .woocommerce-checkout-review-order-table tfoot td .amount,
        .woocommerce-variation-price ins{
			color: <?php echo esc_html($logancee_options['color-body_price_text']); ?> !important;
		}
		
		.ui-autocomplete li span.price {
			color: <?php echo esc_html($logancee_options['color-body_price_text']); ?> !important;
		}
		<?php } ?>
		
		<?php if($logancee_options['color-body_background_color'] != '') { ?>
		body {
			background: <?php echo esc_html($logancee_options['color-body_background_color']); ?> !important;
		}
		<?php } ?>




    <?php if($logancee_options['color-top_background_color'] != '') { ?>
    header,
    .sticky-header,
    .sticky-bg.sticky-header,
    .sticky-search .quick-search,
    .sticky-search .quick-search .form-search input.input-text {
        background: <?php echo $logancee_options['color-top_background_color']; ?>;
    }

    .only-sticky-header {
        border: none;
    }

    @media (max-width: 991px) {
        .responsive .megamenu-wrapper {
            background: <?php echo $logancee_options['color-top_background_color']; ?> !important;
        }
    }
    <?php } ?>

    <?php if($logancee_options['color-top_text_color'] != '') { ?>
    .header,
    .sticky-search .quick-search .form-search input#search2 {
        color: <?php echo $logancee_options['color-top_text_color']; ?>;
    }

    <?php } ?>

    <?php if($logancee_options['color-top_links_color'] != '') { ?>
    .header a {
        color: <?php echo $logancee_options['color-top_links_color']; ?>;
    }
    <?php } ?>

    <?php if($logancee_options['color-top_links_hover_color'] != '') { ?>
    .header a:hover {
        color: <?php echo $logancee_options['color-top_links_hover_color']; ?>;
    }
    <?php } ?>

    <?php if($logancee_options['color-top_border_color'] != '') { ?>
    .header-layout-2  header,
    .header-type-9 header
    {
        border-color: <?php echo $logancee_options['color-top_border_color']; ?>;
    }

    @media (max-width: 991px) {
        .responsive .header-layout-2 .is-sticky .logo-sticky {
            border-color: <?php echo $logancee_options['color-top_border_color']; ?>;
        }

        .responsive ul.megamenu > li {
            border-color: <?php echo $logancee_options['color-top_border_color'] ?> !important;
        }
    }
    <?php } ?>

    <?php if($logancee_options['color-top_bar_background_color'] != '') { ?>
    .header-layout-2 .header-top-inner {
        background: <?php echo $logancee_options['color-top_bar_background_color']; ?>;
        border: none;
        padding-left: 20px;
        padding-right: 20px;
    }
    <?php } ?>

    <?php if($logancee_options['color-top_bar_text_color'] != '') { ?>
    .header-layout-2 .header-top-inner {
        color: <?php echo $logancee_options['color-top_bar_text_color']; ?>;
    }
    <?php } ?>

    <?php if($logancee_options['color-top_bar_links_color'] != '') { ?>
    .header-layout-2 .header-top-inner a {
        color: <?php echo $logancee_options['color-top_bar_links_color']; ?>;
    }
    <?php } ?>

    <?php if($logancee_options['color-top_bar_links_hover_color'] != '') { ?>
    .header-layout-2 .header-top-inner a:hover {
        color: <?php echo $logancee_options['color-top_bar_links_hover_color']; ?>;
    }
    <?php } ?>


    <?php if($logancee_options['color-top_search_color'] != '') { ?>
    .sticky-search > i,
    .sticky-search .quick-search .icon_close {
        color: <?php echo $logancee_options['color-top_search_color']; ?>;
    }
    <?php } ?>

    <?php if($logancee_options['color-top_cart_count_background'] != '') { ?>
    .sticky-cart .typo-icon-ajaxcart .typo-cart-label .print {
        background: <?php echo $logancee_options['color-top_cart_count_background']; ?>;
    }
    <?php } ?>


    <?php if($logancee_options['color-top_cart_count_color'] != '') { ?>
    .sticky-cart .typo-icon-ajaxcart .typo-cart-label .print {
        color: <?php echo $logancee_options['color-top_cart_count_color']; ?>;
        font-weight: bold;
    }
    <?php } ?>

    <?php if($logancee_options['color-top_cart_icon_color'] != '') { ?>
    .sticky-cart .typo-icon-ajaxcart .icon-cart i {
        color: <?php echo $logancee_options['color-top_cart_icon_color']; ?>;
    }
    <?php } ?>

    <?php if($logancee_options['color-top_cart_icon_hover_color'] != '') { ?>
    .sticky-cart .typo-icon-ajaxcart .icon-cart i:hover {
        color: <?php echo $logancee_options['color-top_cart_icon_hover_color']; ?>;
    }
    <?php } ?>


    <?php if($logancee_options['color-top_settings_icon_color'] != '') { ?>
    .settings > i,
    .settings > i:hover {
        color: <?php echo $logancee_options['color-top_settings_icon_color']; ?> !important;
    }
    <?php } ?>

    <?php if($logancee_options['color-top_settings_icon_hover_color'] != '') { ?>
    .settings > i:hover {
        color: <?php echo $logancee_options['color-top_settings_icon_hover_color']; ?> !important;
    }
    <?php } ?>

    <?php if($logancee_options['color-menu_links_color'] != '') { ?>
    ul.megamenu > li > a,
    ul.megamenu > li.with-sub-menu > a:after,
    .responsive ul.megamenu > li.with-sub-menu .open-menu,
    .responsive ul.megamenu > li.with-sub-menu .close-menu {
        color: <?php echo $logancee_options['color-menu_links_color']; ?>;
    }

    .megamenuToogle-wrapper .container > div span {
        background: <?php echo $logancee_options['color-menu_links_color']; ?>;
    }
    <?php } ?>

    <?php if($logancee_options['color-menu_links_hover_color'] != '') { ?>
    ul.megamenu > li > a:hover,
    ul.megamenu > li.active > a,
    ul.megamenu > li.home > a,
    ul.megamenu > li:hover > a {
        color: <?php echo $logancee_options['color-menu_links_hover_color']; ?>;
    }
    <?php } ?>

    <?php if($logancee_options['color-breadcrumb_text_color'] != '') { ?>
    .breadcrumb .container h1,
    .breadcrumb .container ul a,
    .breadcrumb .container ul a:hover,
    .breadcrumb .container ul li:before,
    .breadcrumb .container ul li:last-child a,
    .breadcrumb .container ul li:last-child{
        color: <?php echo $logancee_options['color-breadcrumb_text_color']; ?>;
    }
    <?php } ?>


		
		<?php if($logancee_options['color-customfooter_color_text'] != '') { ?>
		.custom-footer .pattern,
		.custom-footer .pattern a,
		ul.contact-us li {
			color: <?php echo esc_html($logancee_options['color-customfooter_color_text']); ?>;
		}
		<?php } ?>
		
		<?php if($logancee_options['color-customfooter_color_heading'] != '') { ?>
		.custom-footer h4 {
			color: <?php echo esc_html($logancee_options['color-customfooter_color_heading']); ?>;
		}
		<?php } ?>
		
		<?php if($logancee_options['color-customfooter_color_icon_heading'] != '') { ?>
		.custom-footer h4 i,
		ul.contact-us li span,
		.custom-footer .tweets li a {
			color: <?php echo esc_html($logancee_options['color-customfooter_color_icon_heading']); ?>;
		}
		<?php } ?>
		
		<?php if($logancee_options['color-customfooter_color_icon_contact_us'] != '') { ?>
		ul.contact-us li i,
		.tweets li:before {
			color: <?php echo esc_html($logancee_options['color-customfooter_color_icon_contact_us']); ?>;
		}
		<?php } ?>
		
		<?php if($logancee_options['color-customfooter_border_color'] != '') { ?>
		.custom-footer h4,
		.custom-footer .background,
		.standard-body .custom-footer .background,
		.fb-like-box,
		ul.contact-us li i {
			border-color: <?php echo esc_html($logancee_options['color-customfooter_border_color']); ?>;
		}
		<?php } ?>
		
		<?php if($logancee_options['color-customfooter_background_color'] != '') { ?>
		.custom-footer .background,
		.standard-body .custom-footer .background {
			background: <?php echo esc_html($logancee_options['color-customfooter_background_color']); ?>;
		}
		
		.custom-footer .pattern {
			background: none;
		}
		<?php } ?>

	<?php } ?>

        
	<?php if($logancee_options['font-status'] == '1') { ?>
		body {
            <?php if($logancee_options['font-body']['font-family'] ):?>
			font-family: <?php echo esc_html($logancee_options['font-body']['font-family']); ?>;
            <?php endif; ?>
            <?php if($logancee_options['font-body']['font-style'] ):?>
			font-style: <?php echo esc_html($logancee_options['font-body']['font-style']); ?>;
            <?php endif; ?>
            <?php if($logancee_options['font-body']['font-size'] ):?>
			font-size: <?php echo esc_html($logancee_options['font-body']['font-size']); ?>;
            <?php endif; ?>
            <?php if($logancee_options['font-body']['font-weight'] ):?>
			font-weight: <?php echo esc_html($logancee_options['font-body']['font-weight']); ?>;
            <?php endif; ?>
            <?php if($logancee_options['font-body']['color'] ):?>
			color: <?php echo esc_html($logancee_options['font-body']['color']); ?>;
            <?php endif; ?>
            <?php if($logancee_options['font-body']['text-align'] ):?>
			text-align: <?php echo esc_html($logancee_options['font-body']['text-align']); ?>;
            <?php endif; ?>
		}
		
		#top-bar .container, 
		#top .header-links li a,
		.sale-badge,
		.product-grid .product .only-hover ul li a,
		.hover-product .only-hover ul li a {
            <?php if($logancee_options['font-body-smaller']['font-family'] ):?>
			font-family: <?php echo esc_html($logancee_options['font-body-smaller']['font-family']); ?>;
            <?php endif; ?>
            <?php if($logancee_options['font-body-smaller']['font-style'] ):?>
			font-style: <?php echo esc_html($logancee_options['font-body-smaller']['font-style']); ?>;
            <?php endif; ?>
            <?php if($logancee_options['font-body-smaller']['font-size'] ):?>
			font-size: <?php echo esc_html($logancee_options['font-body-smaller']['font-size']); ?>;
            <?php endif; ?>
            <?php if($logancee_options['font-body-smaller']['font-weight'] ):?>
			font-weight: <?php echo esc_html($logancee_options['font-body-smaller']['font-weight']); ?>;
            <?php endif; ?>
            <?php if($logancee_options['font-body-smaller']['color'] ):?>
			color: <?php echo esc_html($logancee_options['font-body-smaller']['color']); ?>;
            <?php endif; ?>
            <?php if($logancee_options['font-body-smaller']['text-align'] ):?>
			text-align: <?php echo esc_html($logancee_options['font-body-smaller']['text-align']); ?>;
            <?php endif; ?>
		}
		
		ul.megamenu > li > a strong,
        ul.megamenu > li > a,
        .megamenuToogle-wrapper .container{
            <?php if($logancee_options['font-categories_bar']['font-family'] ):?>
			font-family: <?php echo esc_html($logancee_options['font-categories_bar']['font-family']); ?>;
            <?php endif; ?>
            <?php if($logancee_options['font-categories_bar']['font-style'] ):?>
			font-style: <?php echo esc_html($logancee_options['font-categories_bar']['font-style']); ?>;
            <?php endif; ?>
            <?php if($logancee_options['font-categories_bar']['font-size'] ):?>
			font-size: <?php echo esc_html($logancee_options['font-categories_bar']['font-size']); ?>;
            <?php endif; ?>
            <?php if($logancee_options['font-categories_bar']['font-weight'] ):?>
			font-weight: <?php echo esc_html($logancee_options['font-categories_bar']['font-weight']); ?>;
            <?php endif; ?>
            <?php if($logancee_options['font-categories_bar']['color'] ):?>
			color: <?php echo esc_html($logancee_options['font-categories_bar']['color']); ?>;
            <?php endif; ?>
            <?php if($logancee_options['font-categories_bar']['text-align'] ):?>
			text-align: <?php echo esc_html($logancee_options['font-categories_bar']['text-align']); ?>;
            <?php endif; ?>
		}
		
		
		.box .box-heading,
		.center-column h1, 
		.center-column h2, 
		.center-column h3, 
		.center-column h4, 
		.center-column h5, 
		.center-column h6,
		.products-carousel-overflow .box-heading {
            <?php if($logancee_options['font-headlines']['font-family'] ):?>
			font-family: <?php echo esc_html($logancee_options['font-headlines']['font-family']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-headlines']['font-style'] ):?>
			font-style: <?php echo esc_html($logancee_options['font-headlines']['font-style']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-headlines']['font-size'] ):?>
			font-size: <?php echo esc_html($logancee_options['font-headlines']['font-size']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-headlines']['font-weight'] ):?>
			font-weight: <?php echo esc_html($logancee_options['font-headlines']['font-weight']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-headlines']['color'] ):?>
			color: <?php echo esc_html($logancee_options['font-headlines']['color']); ?>;
            <?php endif; ?>
            <?php if($logancee_options['font-headlines']['text-align'] ):?>
			text-align: <?php echo esc_html($logancee_options['font-headlines']['text-align']); ?> !important;
            <?php endif; ?>
		}
		
		.footer h4,
		.custom-footer h4 {
            <?php if($logancee_options['font-footer_headlines']['font-family'] ):?>
			font-family: <?php echo esc_html($logancee_options['font-footer_headlines']['font-family']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-footer_headlines']['font-style'] ):?>
			font-style: <?php echo esc_html($logancee_options['font-footer_headlines']['font-style']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-footer_headlines']['font-size'] ):?>
			font-size: <?php echo esc_html($logancee_options['font-footer_headlines']['font-size']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-footer_headlines']['font-weight'] ):?>
			font-weight: <?php echo esc_html($logancee_options['font-footer_headlines']['font-weight']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-footer_headlines']['color'] ):?>
			color: <?php echo esc_html($logancee_options['font-footer_headlines']['color']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-footer_headlines']['text-align'] ):?>
			text-align: <?php echo esc_html($logancee_options['font-footer_headlines']['text-align']); ?> !important;
            <?php endif; ?>
		}
		
		.breadcrumb .container h1,
		.breadcrumb .container h1 a {
			<?php if($logancee_options['font-page_name']['font-family'] ):?>
			font-family: <?php echo esc_html($logancee_options['font-page_name']['font-family']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-page_name']['font-style'] ):?>
			font-style: <?php echo esc_html($logancee_options['font-page_name']['font-style']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-page_name']['font-size'] ):?>
			font-size: <?php echo esc_html($logancee_options['font-page_name']['font-size']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-page_name']['font-weight'] ):?>
			font-weight: <?php echo esc_html($logancee_options['font-page_name']['font-weight']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-page_name']['color'] ):?>
			color: <?php echo esc_html($logancee_options['font-page_name']['color']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-page_name']['text-align'] ):?>
			text-align: <?php echo esc_html($logancee_options['font-page_name']['text-align']); ?> !important;
            <?php endif; ?>
		}
		
		.button,
		.btn {
			<?php if($logancee_options['font-button']['font-family'] ):?>
			font-family: <?php echo esc_html($logancee_options['font-button']['font-family']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-button']['font-style'] ):?>
			font-style: <?php echo esc_html($logancee_options['font-button']['font-style']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-button']['font-size'] ):?>
			font-size: <?php echo esc_html($logancee_options['font-button']['font-size']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-button']['font-weight'] ):?>
			font-weight: <?php echo esc_html($logancee_options['font-button']['font-weight']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-button']['color'] ):?>
			color: <?php echo esc_html($logancee_options['font-button']['color']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-button']['text-align'] ):?>
			text-align: <?php echo esc_html($logancee_options['font-button']['text-align']); ?> !important;
            <?php endif; ?>
		}
		
		.product-grid .product .price, 
        .compare-list .price,
		.hover-product .price, 
		.product-list .actions > div .price, 
		.product-info .price .price-new,
		.product-info .product-center .price > .woocommerce-Price-amount,
		ul.megamenu li .product .price,
		.advanced-grid-products .product .right .price {
			<?php if($logancee_options['font-price']['font-family'] ):?>
			font-family: <?php echo esc_html($logancee_options['font-price']['font-family']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price']['font-style'] ):?>
			font-style: <?php echo esc_html($logancee_options['font-price']['font-style']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price']['font-size'] ):?>
			font-size: <?php echo esc_html($logancee_options['font-price']['font-size']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price']['font-weight'] ):?>
			font-weight: <?php echo esc_html($logancee_options['font-price']['font-weight']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price']['color'] ):?>
			color: <?php echo esc_html($logancee_options['font-price']['color']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price']['text-align'] ):?>
			text-align: <?php echo esc_html($logancee_options['font-price']['text-align']); ?> !important;
            <?php endif; ?>
		}
		
		.product-grid .product .price,
        .compare-list .price,
        ul.megamenu li .product .price,
		.advanced-grid-products .product .right .price {
			<?php if($logancee_options['font-price_small']['font-family'] ):?>
			font-family: <?php echo esc_html($logancee_options['font-price_small']['font-family']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price_small']['font-style'] ):?>
			font-style: <?php echo esc_html($logancee_options['font-price_small']['font-style']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price_small']['font-size'] ):?>
			font-size: <?php echo esc_html($logancee_options['font-price_small']['font-size']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price_small']['font-weight'] ):?>
			font-weight: <?php echo esc_html($logancee_options['font-price_small']['font-weight']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price_small']['color'] ):?>
			color: <?php echo esc_html($logancee_options['font-price_small']['color']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price_small']['text-align'] ):?>
			text-align: <?php echo esc_html($logancee_options['font-price_small']['text-align']); ?> !important;
            <?php endif; ?>
		}
		
		.product-info .price .price-new,
		.product-info .product-center .price > .woocommerce-Price-amount {
			<?php if($logancee_options['font-price']['font-family'] ):?>
			font-family: <?php echo esc_html($logancee_options['font-price']['font-family']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price']['font-style'] ):?>
			font-style: <?php echo esc_html($logancee_options['font-price']['font-style']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price']['font-size'] ):?>
			font-size: <?php echo esc_html($logancee_options['font-price']['font-size']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price']['font-weight'] ):?>
			font-weight: <?php echo esc_html($logancee_options['font-price']['font-weight']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price']['color'] ):?>
			color: <?php echo esc_html($logancee_options['font-price']['color']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price']['text-align'] ):?>
			text-align: <?php echo esc_html($logancee_options['font-price']['text-align']); ?> !important;
            <?php endif; ?>
		}
		
		.product-list .actions > div .price {
			<?php if($logancee_options['font-price_medium']['font-family'] ):?>
			font-family: <?php echo esc_html($logancee_options['font-price_medium']['font-family']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price_medium']['font-style'] ):?>
			font-style: <?php echo esc_html($logancee_options['font-price_medium']['font-style']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price_medium']['font-size'] ):?>
			font-size: <?php echo esc_html($logancee_options['font-price_medium']['font-size']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price_medium']['font-weight'] ):?>
			font-weight: <?php echo esc_html($logancee_options['font-price_medium']['font-weight']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price_medium']['color'] ):?>
			color: <?php echo esc_html($logancee_options['font-price_medium']['color']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-price_medium']['text-align'] ):?>
			text-align: <?php echo esc_html($logancee_options['font-price_medium']['text-align']); ?> !important;
            <?php endif; ?>
		}
		
		.price-old,
        .compare-list .price .price-old {
			<?php if($logancee_options['font-old_price']['font-family'] ):?>
			font-family: <?php echo esc_html($logancee_options['font-old_price']['font-family']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-old_price']['font-style'] ):?>
			font-style: <?php echo esc_html($logancee_options['font-old_price']['font-style']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-old_price']['font-size'] ):?>
			font-size: <?php echo esc_html($logancee_options['font-old_price']['font-size']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-old_price']['font-weight'] ):?>
			font-weight: <?php echo esc_html($logancee_options['font-old_price']['font-weight']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-old_price']['color'] ):?>
			color: <?php echo esc_html($logancee_options['font-old_price']['color']); ?> !important;
            <?php endif; ?>
            <?php if($logancee_options['font-old_price']['text-align'] ):?>
			text-align: <?php echo esc_html($logancee_options['font-old_price']['text-align']); ?> !important;
            <?php endif; ?>
		}
	<?php } ?>
</style>
<?php } ?>

<?php if(isset($logancee_options['background-status']) && $logancee_options['background-status'] == 1) { ?>

    <style type="text/css">
        <?php if($logancee_options['background-body_background_background'] == '1') { ?>
        body { background-image:none !important; }
        <?php } ?>
        <?php if($logancee_options['background-body_background_background'] == '2') { ?>
        body {
        <?php if ($logancee_options['background-body_background']['background-color']):?>
            background-color: <?php echo ($logancee_options['background-body_background']['background-color']); ?>;
        <?php endif; ?>
        <?php if ($logancee_options['background-body_background']['background-image']):?>
            background-image:url(<?php echo ($logancee_options['background-body_background']['background-image']); ?>);
        <?php endif; ?>
        <?php if ($logancee_options['background-body_background']['background-repeat']):?>
            background-repeat:<?php echo ($logancee_options['background-body_background']['background-repeat']); ?> !important;
        <?php endif; ?>
        <?php if ($logancee_options['background-body_background']['background-attachment']):?>
            background-attachment:<?php echo ($logancee_options['background-body_background']['background-attachment']); ?> !important;
        <?php endif; ?>
        <?php if ($logancee_options['background-body_background']['background-size']):?>
            background-size:<?php echo ($logancee_options['background-body_background']['background-size']) ?> !important;
        <?php endif; ?>
        }
        <?php } ?>
        <?php if($logancee_options['background-body_background_background'] == '3') { ?>
        body {
            background-image:url(<?php echo ($logancee_options['background-body_background_subtle_patterns']); ?>);
        <?php if ($logancee_options['background-body_background']['background-position']):?>
            background-position:<?php echo ($logancee_options['background-body_background']['background-position']); ?>;
        <?php endif; ?>
        <?php if ($logancee_options['background-body_background']['background-repeat']):?>
            background-repeat:<?php echo ($logancee_options['background-body_background']['background-repeat']); ?> !important;
        <?php endif; ?>
        <?php if ($logancee_options['background-body_background']['background-attachment']):?>
            background-attachment:<?php echo ($logancee_options['background-body_background']['background-attachment']); ?> !important;
        <?php endif; ?>
        <?php if ($logancee_options['background-body_background']['background-size']):?>
            background-size:<?php echo ($logancee_options['background-body_background']['background-size']) ?> !important;
        <?php endif; ?>
        }
        <?php } ?>

        <?php if($logancee_options['background-header_background_background'] == '1') { ?>
        header { background-image:none !important; }
        <?php } ?>
        <?php if($logancee_options['background-header_background_background'] == '2') { ?>
        header {
        <?php if ($logancee_options['background-header_background']['background-color']):?>
            background-color: <?php echo ($logancee_options['background-header_background']['background-color']); ?>;
        <?php endif; ?>
        <?php if ($logancee_options['background-header_background']['background-image']):?>
            background-image:url(<?php echo ($logancee_options['background-header_background']['background-image']); ?>);
        <?php endif; ?>
        <?php if ($logancee_options['background-header_background']['background-repeat']):?>
            background-repeat:<?php echo ($logancee_options['background-header_background']['background-repeat']); ?> !important;
        <?php endif; ?>
        <?php if ($logancee_options['background-header_background']['background-attachment']):?>
            background-attachment:<?php echo ($logancee_options['background-header_background']['background-attachment']); ?> !important;
        <?php endif; ?>
        <?php if ($logancee_options['background-header_background']['background-size']):?>
            background-size:<?php echo ($logancee_options['background-header_background']['background-size']) ?> !important;
        <?php endif; ?>
        }
        <?php } ?>

        <?php if($logancee_options['background-header_background_background'] == '3') { ?>
        header {
            background-image:url(<?php echo ($logancee_options['background-header_background_subtle_patterns']); ?>);
        <?php if ($logancee_options['background-header_background']['background-position']):?>
            background-position:<?php echo ($logancee_options['background-header_background']['background-position']); ?>;
        <?php endif; ?>
        <?php if ($logancee_options['background-header_background']['background-repeat']):?>
            background-repeat:<?php echo ($logancee_options['background-header_background']['background-repeat']); ?> !important;
        <?php endif; ?>
        <?php if ($logancee_options['background-header_background']['background-attachment']):?>
            background-attachment:<?php echo ($logancee_options['background-header_background']['background-attachment']); ?> !important;
        <?php endif; ?>
        <?php if ($logancee_options['background-header_background']['background-size']):?>
            background-size:<?php echo ($logancee_options['background-header_background']['background-size']) ?> !important;
        <?php endif; ?>
        }
        <?php } ?>

        <?php if($logancee_options['background-customfooter_background_background'] == '1') { ?>
        .custom-footer .pattern { background-image:none !important; }
        <?php } ?>
        <?php if($logancee_options['background-customfooter_background_background'] == '2') { ?>
        .custom-footer .pattern {
        <?php if ($logancee_options['background-customfooter_background']['background-color']):?>
            background-color: <?php echo ($logancee_options['background-customfooter_background']['background-color']); ?>;
        <?php endif; ?>
        <?php if ($logancee_options['background-customfooter_background']['background-image']):?>
            background-image:url(<?php echo ($logancee_options['background-customfooter_background']['background-image']); ?>);
        <?php endif; ?>
        <?php if ($logancee_options['background-customfooter_background']['background-repeat']):?>
            background-repeat:<?php echo ($logancee_options['background-customfooter_background']['background-repeat']); ?> !important;
        <?php endif; ?>
        <?php if ($logancee_options['background-customfooter_background']['background-attachment']):?>
            background-attachment:<?php echo ($logancee_options['background-customfooter_background']['background-attachment']); ?> !important;
        <?php endif; ?>
        <?php if ($logancee_options['background-customfooter_background']['background-size']):?>
            background-size:<?php echo ($logancee_options['background-customfooter_background']['background-size']) ?> !important;
        <?php endif; ?>
        }
        <?php } ?>
        <?php if($logancee_options['background-customfooter_background_background'] == '3') { ?>
        .custom-footer .pattern {
            background-image:url(<?php echo ($logancee_options['background-customfooter_background_subtle_patterns']); ?>);
        <?php if ($logancee_options['background-customfooter_background']['background-position']):?>
            background-position:<?php echo ($logancee_options['background-customfooter_background']['background-position']); ?>;
        <?php endif; ?>
        <?php if ($logancee_options['background-customfooter_background']['background-repeat']):?>
            background-repeat:<?php echo ($logancee_options['background-customfooter_background']['background-repeat']); ?> !important;
        <?php endif; ?>
        <?php if ($logancee_options['background-customfooter_background']['background-attachment']):?>
            background-attachment:<?php echo ($logancee_options['background-customfooter_background']['background-attachment']); ?> !important;
        <?php endif; ?>
        <?php if ($logancee_options['background-customfooter_background']['background-size']):?>
            background-size:<?php echo ($logancee_options['background-customfooter_background']['background-size']) ?> !important;
        <?php endif; ?>
        }
        <?php } ?>

        <?php if($logancee_options['background-content_headlines_background_background'] == '1') { ?>
        .box .strip-line,
        .breadcrumb .container .strip-line,
        .products-carousel-overflow .strip-line {
            background-image:none !important;
        }
        <?php } ?>
        <?php if($logancee_options['background-content_headlines_background_background'] == '2') { ?>
        .box .strip-line,
        .breadcrumb .container .strip-line,
        .products-carousel-overflow .strip-line {
        <?php if ($logancee_options['background-content_headlines_background']['background-color']):?>
            background-color: <?php echo ($logancee_options['background-content_headlines_background']['background-color']); ?>;
        <?php endif; ?>
        <?php if ($logancee_options['background-content_headlines_background']['background-image']):?>
            background-image:url(<?php echo ($logancee_options['background-content_headlines_background']['background-image']); ?>);
        <?php endif; ?>
        <?php if ($logancee_options['background-content_headlines_background']['background-position']):?>
            background-position:<?php echo ($logancee_options['background-content_headlines_background']['background-position']); ?>;
        <?php endif; ?>
        <?php if ($logancee_options['background-content_headlines_background']['background-repeat']):?>
            background-repeat:<?php echo ($logancee_options['background-content_headlines_background']['background-repeat']); ?> !important;
        <?php endif; ?>
        <?php if ($logancee_options['background-content_headlines_background']['background-attachment']):?>
            background-attachment:<?php echo ($logancee_options['background-content_headlines_background']['background-attachment']); ?> !important;
        <?php endif; ?>
        <?php if ($logancee_options['background-content_headlines_background']['background-size']):?>
            background-size:<?php echo ($logancee_options['background-content_headlines_background']['background-size']) ?> !important;
        <?php endif; ?>
        }
        <?php } ?>

        <?php if($logancee_options['background-footer_headlines_background_background'] == '1') { ?>
        .footer .strip-line {
            background-image:none !important;
        }
        <?php } ?>
        <?php if($logancee_options['background-footer_headlines_background_background'] == '2') { ?>
        .footer .strip-line {
        <?php if ($logancee_options['background-footer_headlines_background']['background-color']):?>
            background-color: <?php echo ($logancee_options['background-footer_headlines_background']['background-color']); ?>;
        <?php endif; ?>
        <?php if ($logancee_options['background-footer_headlines_background']['background-image']):?>
            background-image:url(<?php echo ($logancee_options['background-footer_headlines_background']['background-image']); ?>);
        <?php endif; ?>
        <?php if ($logancee_options['background-footer_headlines_background']['background-position']):?>
            background-position:<?php echo ($logancee_options['background-footer_headlines_background']['background-position']); ?>;
        <?php endif; ?>
        <?php if ($logancee_options['background-footer_headlines_background']['background-repeat']):?>
            background-repeat:<?php echo ($logancee_options['background-footer_headlines_background']['background-repeat']); ?> !important;
        <?php endif; ?>
        <?php if ($logancee_options['background-footer_headlines_background']['background-attachment']):?>
            background-attachment:<?php echo ($logancee_options['background-footer_headlines_background']['background-attachment']); ?> !important;
        <?php endif; ?>
        <?php if ($logancee_options['background-footer_headlines_background']['background-size']):?>
            background-size:<?php echo ($logancee_options['background-footer_headlines_background']['background-size']) ?> !important;
        <?php endif; ?>
        }
        <?php } ?>
    </style>
<?php } ?>
