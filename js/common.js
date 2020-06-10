(function($) {
    "use strict";


    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && responsive_design == 'yes' && $(window).width() < 768) {
        var i = 0;
        var produkty = [];

        $( ".box-product .carousel .item" ).each(function() {
            $( this ).find( ".product-grid .row > div" ).each(function() {
                if(i > 1) {
                    produkty.push($(this).html());
                }

                i++;
            });
            for ( var s = i-3; s >= 0; s--, s-- ) {
                var html = "<div class='item'><div class='product-grid'><div class='row'>";
                if (produkty[s-1] != undefined) {
                    html += "<div class='col-xs-6'>" + produkty[s-1] + "</div>";
                } else {
                    html += "<div class='col-xs-6'>" + produkty[s+1] + "</div>";
                }

                if (produkty[s] != undefined) {
                    html += "<div class='col-xs-6'>" + produkty[s] + "</div>";
                } else {
                    html += "<div class='col-xs-6'>" + produkty[s+1] + "</div>";
                }
                html += "</div></div></div>";

                $( this ).after( html );
            }

            produkty = [];
            i = 0;
        });
    }

    var socialTab = $('.tab-open');
    var socialWrap = $('.social-tab-wrapper');

    socialTab.click(function (){
        socialWrap.toggleClass('pull-tab-down');
    });

    var accords = jQuery('.accordion > dd'),
	 accordsheading = jQuery('.accordion > dt');

    accords.hide();

    jQuery('.accordion > dt').click(function()
    {
        if( jQuery(this).hasClass('active') )
        {
            accords.slideUp();
            accordsheading.removeClass('active');
        }
        else
        {
            accordsheading.removeClass('active');
            accords.slideUp();
            jQuery(this).next().slideDown();
            jQuery(this).addClass('active');
        }
        
        return false;
    });

    if($('#widget-facebook').length > 0){
        
        (function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
        
        $(".facebook_right").hover(function() {            
            $(".facebook_right").stop(true, false).animate({right: "0"}, 800, 'easeOutQuint');        
        }, function() {            
            $(".facebook_right").stop(true, false).animate({right: "-308"}, 800, 'easeInQuint');        
        }, 1000);    

        $(".facebook_left").hover(function() {            
            $(".facebook_left").stop(true, false).animate({left: "0"}, 800, 'easeOutQuint');        
        }, function() {            
            $(".facebook_left").stop(true, false).animate({left: "-308"}, 800, 'easeInQuint');        
        }, 1000);      
    }
    
    if($('#widget-twitter').length > 0){
        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
        $(".twitter_right").hover(function() {            
            $(".twitter_right").stop(true, false).animate({right: "0"}, 800, 'easeOutQuint');        
        }, function() {            
            $(".twitter_right").stop(true, false).animate({right: "-250"}, 800, 'easeInQuint');        
        }, 1000);

        $(".twitter_left").hover(function() {            
            $(".twitter_left").stop(true, false).animate({left: "0"}, 800, 'easeOutQuint');        
        }, function() {            
            $(".twitter_left").stop(true, false).animate({left: "-250"}, 800, 'easeInQuint');        
        }, 1000);     
    }
    
    if($('#widget-custom-content').length > 0){
        $(".custom_right").hover(function() {            
            $(".custom_right").stop(true, false).animate({right: "0"}, 800, 'easeOutQuint');        
        }, function() {            
            $(".custom_right").stop(true, false).animate({right: "-250"}, 800, 'easeInQuint');        
        }, 1000);    

        $(".custom_left").hover(function() {            
            $(".custom_left").stop(true, false).animate({left: "0"}, 800, 'easeOutQuint');        
        }, function() {            
            $(".custom_left").stop(true, false).animate({left: "-250"}, 800, 'easeInQuint');        
        }, 1000);    
    }

    // Twitter custom_footer
    if( $('.twitter-feed').length > 0) {
        var config = {
            "likes": {"screenName": $('.twitter-feed').data('id')},
            "domId": 'twitterFeed',
            "dataOnly": false,
            "maxTweets": $('.twitter-feed').data('max-tweets'),
        };
        twitterFetcher.fetch(config);
    }

    $(document).ready(function() {
        if($('#popup').length > 0) {
            var show_after = parseInt('750', 20);
            var autoclose_after = parseInt('', 20);
            if ($.cookie('popup-disabled') != '1') {
                setTimeout(function () {
                    $.magnificPopup.open({
                        items: {
                            src: '#popup',
                            type: 'inline'
                        },
                        tLoading: '',
                        mainClass: 'popup-module mfp-with-zoom popup-type',
                        removalDelay: 200,
                    });

                    if (autoclose_after > 0) {
                        setTimeout(function () {
                            $.magnificPopup.close();
                        }, autoclose_after);
                    }
                }, show_after);
            }

            if ($('#popup').hasClass('onlyonce')) {
                $.cookie('popup-disabled', '1', {expires: 30, path: '/'});
            }

            $('#discheck').change(function () {
                if ($(this).prop('checked')) {
                    $.cookie('popup-disabled', '1', {expires: 30, path: '/'});
                } else {
                    $.removeCookie('popup-disabled');
                }
            })
        }

    });



    $(document).ready(function() {
        // Highlight any found errors
        $('.text-danger').each(function() {
            var element = $(this).parent().parent();

            if (element.hasClass('form-group')) {
                element.addClass('has-error');
            }
        });
        
        if($('.posts').length > 0 && $('.posts').hasClass('posts-grid')){
            var $grid = $('.posts').masonry({
               itemSelector: '.post',
            })
        }

        /* Search */
        $('.button-search').bind('click', function() {
            var url = $('base').attr('href') + 'index.php?route=product/search';

            var search = $('header input[name=\'search\']').val();

            if (search) {
                url += '&search=' + encodeURIComponent(search);
            }

            window.location = url;
        });

        $('header input[name=\'search\']').bind('keydown', function(e) {
            if (e.keyCode == 13) {
                var url = $('base').attr('href') + 'index.php?route=product/search';

                var search = $('header input[name=\'search\']').val();

                if (search) {
                    url += '&search=' + encodeURIComponent(search);
                }

                window.location = url;
            }
        });

        // $(window).scroll(function(){
        //     if ($(this).scrollTop() > 300) {
        //         $('.scrollup').fadeIn();
        //     } else {
        //         $('.scrollup').fadeOut();
        //     }
        // }); 

        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });

        /* Search MegaMenu */
        $('.button-search2').bind('click', function() {
            var url = $('base').attr('href') + 'index.php?route=product/search';

            var search = $('.container-megamenu input[name=\'search2\']').val();

            if (search) {
                url += '&search=' + encodeURIComponent(search);
            }

            window.location = url;
        });

        $('.container-megamenu input[name=\'search2\']').bind('keydown', function(e) {
            if (e.keyCode == 13) {
                var url = $('base').attr('href') + 'index.php?route=product/search';

                var search = $('.container-megamenu input[name=\'search2\']').val();

                if (search) {
                    url += '&search=' + encodeURIComponent(search);
                }

                var location = url;
            }
        });


        // tooltips on hover
        $('[data-toggle=\'tooltip\']').tooltip({container: 'body'});

        // Makes tooltips work on ajax generated content
        $(document).ajaxStop(function() {
            $('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
        });

        // $(window).scroll(function(){
        //     if ($(this).scrollTop() > 300) {
        //         $('.scrollup').fadeIn();
        //     } else {
        //         $('.scrollup').fadeOut();
        //     }
        // });

        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });

        /* Search MegaMenu */
        $('.button-search2').bind('click', function() {
            var url = $('base').attr('href') + 'index.php?route=product/search';

            var search = $('.container-megamenu input[name=\'search2\']').val();

            if (search) {
                url += '&search=' + encodeURIComponent(search);
            }

            window.location = url;
        });

        $('.container-megamenu input[name=\'search2\']').bind('keydown', function(e) {
            if (e.keyCode == 13) {
                var url = $('base').attr('href') + 'index.php?route=product/search';

                var search = $('.container-megamenu input[name=\'search2\']').val();

                if (search) {
                    url += '&search=' + encodeURIComponent(search);
                }

                window.location = url;
            }
        });

        /* Quantity buttons */
        $('body').on('click', '#q_up', function(){
            var q_val_up=parseInt($("input#quantity_wanted").val());

            var step = 1;
            var stepAttr = parseInt($("input#quantity_wanted").attr('step'));
            if(stepAttr){
                step = stepAttr
            }

            var max = 99999;
            var maxAttr = parseInt($("input#quantity_wanted").attr('max'));
            if(maxAttr){
                max = maxAttr
            }

            if(isNaN(q_val_up)  || (q_val_up+step) > max) {
                q_val_up=max;
            }

            if((q_val_up+step) <= max) {
                $("input#quantity_wanted").val(q_val_up+step).keyup();
            }else{
                $("input#quantity_wanted").val(max).keyup();
            }


            $( this ).parent( '.quantity' ).parent().find( '.add_to_cart_button' ).attr( 'data-quantity', $( this ).parent('.quantity').find('.qty ').val() );
            return false;
        });

        $('body').on('click', '#q_down', function(){
            var q_val_up=parseInt($("input#quantity_wanted").val());

            var step = 1;
            var stepAttr = parseInt($("input#quantity_wanted").attr('step'));
            if(stepAttr){
                step = stepAttr
            }

            var min = 0;
            var minAttr = parseInt($("input#quantity_wanted").attr('min'));
            if(minAttr){
                min = minAttr
            }

            if(isNaN(q_val_up) || (q_val_up-step) < min) {
                q_val_up=min;
            }

            if((q_val_up-step) > min) {
                $("input#quantity_wanted").val(q_val_up-step).keyup();
            }else{
                $("input#quantity_wanted").val(min).keyup();
            }


            $( this ).parent( '.quantity' ).parent().find( '.add_to_cart_button' ).attr( 'data-quantity', $( this ).parent('.quantity').find('.qty ').val() );
            return false;
        });


        $( document ).on( 'change', '.quantity .qty', function() {
            $( this ).parent( '.quantity' ).parent().find( '.add_to_cart_button' ).attr( 'data-quantity', $( this ).val() );
        });

        // tooltips on hover
        $('[data-toggle=\'tooltip\']').tooltip({container: 'body'});

        // Makes tooltips work on ajax generated content
        $(document).ajaxStop(function() {
            $('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
        });

        FixedTop();

        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        };

        // if(getUrlParameter('s') || getUrlParameter('s') == ''){
        //     $('html, body').animate({
        //         scrollTop: $(".main-content").offset().top
        //     }, 500);
        // }

        $('.wpcf7-form-control-wrap.dob').hover(function(){
            $('.wpcf7-form-control-wrap.dob:before').hide();
        });

        $('.sticky-search > i').bind('click', function() {
            $(".sticky-header").addClass("sticky-bg");
            $("body").addClass("with-sticky-bg");
            $(".sticky-header .quick-search").addClass("showing");
            setTimeout(function (){
                $(".sticky-header .quick-search input[type='text']").focus();
            }, 500)
        });

        $('.sticky-search .quick-search .icon_close').bind('click', function() {
            $(".sticky-header").removeClass("sticky-bg");
            $("body").removeClass("with-sticky-bg");
            $(".sticky-header .quick-search").removeClass("showing");
        });

        $( ".filter-trigger.by-category" ).click(function() {
            $( ".filter-options.by-category" ).slideToggle( "slow", function() {
              // Animation complete.
            });
        });
        $( ".filter-trigger.by-date" ).click(function() {
            $( ".filter-options.by-date" ).slideToggle( "slow", function() {
              // Animation complete.
            });
        });
        //$('.blog .category-press').remove();

         // Feature tabs
         $.fn.responsiveTabs = function() {

            return this.each(function() {
            var el = $(this),
                tabs = el.find('dt'),
                content = el.find('dd'),
                placeholder = $('<div class="responsive-tabs-placeholder"></div>').insertAfter(el);



               
        
            tabs.on('click', function() {
                var tab = $(this);
        
                tabs.not(tab).removeClass('active turn-arrow');
                tab.toggleClass('active turn-arrow');

                var viewportWidth = $(window).width();
                if (viewportWidth < 768) {
                   
                
                   var otherTabs = tabs.not(tab);
                   otherTabs.each(function (i) {
                    var otherTabContent = $(this).next().find('.tab-content-area');
                    otherTabContent.slideUp();
                   });
                   
                }
                if (viewportWidth < 768) {

                    var tabContentArea = tab.next().find('.tab-content-area');
                 
                    
                    var isActive = tab.hasClass('active');
                    if (isActive) {
                        tabContentArea.slideDown(400, function(tabsLoaded) {
                          // get tab load property
                          var tabLoaded = $('body').attr('tabloaded');
                          // only scroll to position if page has been ran
                          if (tabLoaded) {
                            // Glide complete
                            $("html,body").animate({
                              scrollTop: tab.offset().top,
                              duration: 1200
                            });
                          }
                          // set tab loaded property to true after first run
                          $('body').attr('tabloaded', true);
                        });
                      }  else {
                        tabContentArea.slideUp(400);
                    }

                    tabContentArea.find('.close-tab').click(function (){
                        tabs.removeClass('active turn-arrow');
                        tabContentArea.slideUp(400);
                    });
                }

                placeholder.html( tab.next().html() );


            });
        
            tabs.filter(':first').trigger('click');

           

            $(window).resize(function () {
                var viewportWidth = $(window).width();
                if (viewportWidth < 600) {
                        $(".view").removeClass("view view-portfolio").addClass("gallery-mobile");
                }
            });
            });
        
        }
        
        $('.responsive-tabs').responsiveTabs();

        // Smooth scrolling for anchors in the responsive tabs
        $('.responsive-tabs a[href*="#"], .spec-expander  a[href*="#"], .spec-close  img')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
            && 
            location.hostname == this.hostname
        ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 1000, function() {
                // Callback after animation
                // Must change focus!
                var $target = $(target);
                $target.focus();
                if ($target.is(":focus")) { // Checking if the target was focused
                return false;
                } else {
                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                $target.focus(); // Set focus again
                };
            });
            }
        }
        });
    // END feature tabs

    // Active filter button
    if(document.URL.indexOf("/instazine") >= 0){ 
        $('#all').addClass('active');
    }
    else if(document.URL.indexOf("/category/for-the-fun-of-it") >= 0){
        $('#fun').addClass('active');
    }
    else if(document.URL.indexOf("/category/for-the-crafters") >= 0){
        $('#crafters').addClass('active');
    }
    else if(document.URL.indexOf("/category/for-the-pro/") >= 0){
        $('#pro').addClass('active');
    }
    else {
        // leave it alooooone
    }

    // spec closer
        var specClose = $('.spec-close');

        specClose.addClass('hide'); 

        $('.spec-expander .vc_tta-panel a').click(function(){
            specClose.toggleClass('hide');
        });

        specClose.click(function () {
            $('.spec-expander .vc_tta-panel').removeClass('vc_active');
            specClose.toggleClass('hide');

            $("html, body").animate({ scrollTop: $("#first-tab").offset().top }, 1500);
            return false;

        });

        // Close redirect popup 
        $('.close-redirect').click(function(){
            $('.redirect-overlay').removeClass('show');
        });

        // add placeholder to date field in join us form
        $(".mc4wp-form-fields #dob_input").after("<span class='dummy-placeholder'>Birthday</span>");

        $(".dummy-placeholder").click(function() {
            $(".dummy-placeholder").hide();
        });

        $('.vertical-slider').click(function (){
            $('.expand-content').toggleClass('show');
        });
        $('.vertical-slider').click(function (){
            $('.height-slide').toggleClass('full');
        });
        $('.close-content').click(function (){
            $('.expand-content').removeClass('show');
        });

        // video slider - faqs
        $('.video-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            prevArrow: '<button type="button" class="faq-prev faq-videos-arrow">❮</button>',
            nextArrow: '<button type="button" class="faq-next faq-videos-arrow">❯</button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                    slidesToShow: 2,
                    dots: true,
                    arrows: false,
                    }
                },
                {
                    breakpoint: 768,
                        settings: {
                        slidesToShow: 1,
                        dots: true,
                        arrows: true,
                    }
                },
            ] 
        });

        $(".popup-gallery a").attr("data-rel", "prettyPhoto[product-gallery]");
        
        /*
        var lastItem = $('.menu-instax-main-nav-container .megamenu li:last-child');
        var joinUstrig = '<div class="popmake-2202  menu-trigger pum-trigger" data-do-default="" style="cursor: pointer;">Join Us</div>';
        
        lastItem.append(joinUstrig);
        */

        $(".box-home-watches .owl-carousel").trigger('owl.jumpTo', 2)

    });
    // Go back button
    function goBack() {
        window.history.back();
    }

    // Cart add remove functions	
    window.cart = {
        'add': function(product_id, quantity) {
            $.ajax({
                url: 'index.php?route=checkout/cart/add',
                type: 'post',
                data: 'product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
                dataType: 'json',
                success: function(json) {			
                    if (json['redirect']) {
                        window.location = json['redirect'];
                    }

                    if (json['success']) {
                         $.notify({
                            message: json['success'],
                            target: '_blank'
                         },{
                            // settings
                            element: 'body',
                            position: null,
                            type: "info",
                            allow_dismiss: true,
                            newest_on_top: false,
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            offset: 20,
                            spacing: 10,
                            z_index: 2031,
                            delay: 5000,
                            timer: 1000,
                            url_target: '_blank',
                            mouse_over: null,
                            animate: {
                                enter: 'animated fadeInDown',
                                exit: 'animated fadeOutUp'
                            },
                            onShow: null,
                            onShown: null,
                            onClose: null,
                            onClosed: null,
                            icon_type: 'class',
                            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-success" role="alert">' +
                                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                                '<span data-notify="message"><i class="fa fa-check-circle"></i>&nbsp; {2}</span>' +
                                '<div class="progress" data-notify="progressbar">' +
                                    '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                                '</div>' +
                                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            '</div>' 
                         });

                        $('#cart_block #cart_content').load('index.php?route=common/cart/info #cart_content_ajax');
                        $('#cart-total').html(json['total']);
                    }
                }
            });
        },
        'update': function(key, quantity) {
            $.ajax({
                url: 'index.php?route=checkout/cart/edit',
                type: 'post',
                data: 'key=' + key + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
                dataType: 'json',
                success: function(json) {
                    if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
                        window.location = 'index.php?route=checkout/cart';
                    } else {
                        $('#cart_block #cart_content').load('index.php?route=common/cart/info #cart_content_ajax');
                        $('#cart-total').html(json['total']);
                    }			
                }
            });			
        },
        'remove': function(key) {
                var cart_id = key;

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: js_logancee_vars.ajax_url,
                    data: { action: "logancee_product_remove",
                        cart_id: cart_id
                    },success: function( response ) {
                        var fragments = response.fragments;
                        var cart_hash = response.cart_hash;

                        if ( fragments ) {
                            $.each(fragments, function(key, value) {
                                $(key).replaceWith(value);
                            });
                        }

                    }
                });
                return false;
        }
    }


        $(document).on('adding_to_cart', function(event, data){

            $.notify({
                message: js_logancee_vars.add_to_cart_msg_success,
                target: '_blank'
             },{
                // settings
                element: 'body',
                position: null,
                type: "info",
                allow_dismiss: true,
                newest_on_top: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 2031,
                delay: 3000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-success" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="message"><i class="fa fa-check-circle"></i>&nbsp; {2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>' 
             });

        })
        $(document).on('added_to_wishlist', function(event, data){
            var add = $.notify({
                message: js_logancee_vars.add_to_wishlist_msg_success,
                target: '_blank'
             },{
                // settings
                element: 'body',
                position: null,
                type: "info",
                allow_dismiss: true,
                newest_on_top: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 2031,
                delay: 3000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-success" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="message"><i class="fa fa-check-circle"></i>&nbsp; {2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>' 
             });

        })



    function openPopup(module_id, product_id) {
         product_id = product_id || undefined;
         $.magnificPopup.open({
              items: {
                   src: 'index.php?route=module/popup/show&module_id=' + module_id + (product_id ? '&product_id=' + product_id : '')
              },
              mainClass: 'popup-module mfp-with-zoom',
              type: 'ajax',
              removalDelay: 200
         });
    }
})(jQuery);

(function($) {
    "use strict";
    $(window).resize(function() {
        FixedTop();
    });
})(jQuery);

(function($) {
    "use strict";
    $(window).scroll(function() {
        FixedTop();
    });
})(jQuery);

function FixedTop() {
    "use strict";
    (function($) {
        if($('header').length > 0){
            if ($(window).width() >= 1160 && $(window).scrollTop() > $('header').position().top + $('header').height() ) {
                $('.sticky-header').addClass('fixed-header');
            } else {
                $('.sticky-header').removeClass('fixed-header');
            }
        }
    })(jQuery);
}


(function($) {
    "use strict";
    function HomeSidebarVarious() {
        var height_two = $("header .slider-header").height()+100;
        if($(window).height() > height_two) {
            $("body").addClass("with-fixed");
        } else {
            $("body").removeClass("with-fixed");
        }
    }


    $(window).resize(function() {
        HomeSidebarVarious();
    });
})(jQuery);


function display(view) {
    if (view == 'list') {
        (function($) {
            $('.product-grid').removeClass("active");
            $('.product-list').addClass("active");

            $('.display').html('<button id="grid" rel="tooltip" title="Grid" onclick="display(\'grid\');"><i class="fa fa-th-large"></i></button> <button class="active" id="list" rel="tooltip" title="List" onclick="display(\'list\');"><i class="fa fa-th-list"></i></button>');

            localStorage.setItem('display', 'list');
        })(jQuery);
    } else {
        (function($) {
            $('.product-grid').addClass("active");
            $('.product-list').removeClass("active");

            $('.display').html('<button class="active" id="grid" rel="tooltip" title="Grid" onclick="display(\'grid\');"><i class="fa fa-th-large"></i></button> <button id="list" rel="tooltip" title="List" onclick="display(\'list\');"><i class="fa fa-th-list"></i></button>');

            localStorage.setItem('display', 'grid');
        })(jQuery);
    }
}