<?php
    /**
     * The template for the panel header area.
     * Override this template by specifying the path where it is stored (templates_path) in your Redux config.
     *
     * @author      Redux Framework
     * @package     ReduxFramework/Templates
     * @version:    3.5.4.18
     */

    $tip_title = esc_html__( 'Developer Mode Enabled', 'logancee' );

    if ( $this->parent->dev_mode_forced ) {
        $is_debug     = false;
        $is_localhost = false;

        $debug_bit = '';
        if ( Redux_Helpers::isWpDebug() ) {
            $is_debug  = true;
            $debug_bit = esc_html__( 'WP_DEBUG is enabled', 'logancee' );
        }

        $localhost_bit = '';
        if ( Redux_Helpers::isLocalHost() ) {
            $is_localhost  = true;
            $localhost_bit = esc_html__( 'you are working in a localhost environment', 'logancee' );
        }

        $conjunction_bit = '';
        if ( $is_localhost && $is_debug ) {
            $conjunction_bit = ' ' . esc_html__( 'and', 'logancee' ) . ' ';
        }

        $tip_msg = esc_html__( 'This has been automatically enabled because', 'logancee' ) . ' ' . $debug_bit . $conjunction_bit . $localhost_bit . '.';
    } else {
        $tip_msg = esc_html__( 'If you are not a developer, your theme/plugin author shipped with developer mode enabled. Contact them directly to fix it.', 'logancee' );
    }
    
        
    $skins = array();
   
    $logancee_skins_config = json_decode(get_option('logancee_skins_config'), true);

    if($logancee_skins_config){

        foreach($logancee_skins_config['skins'] as $skin => $skin_options){
            $skins[$skin] = $skin;
        }
    } 
    


?>
<div id="redux-header">
    <?php if ( ! empty( $this->parent->args['display_name'] ) ) { ?>
        <div class="display_header">

            <?php if ( isset( $this->parent->args['dev_mode'] ) && $this->parent->args['dev_mode'] ) { ?>
                <div class="redux-dev-mode-notice-container redux-dev-qtip"
                     qtip-title="<?php echo esc_attr( $tip_title ); ?>"
                     qtip-content="<?php echo esc_attr( $tip_msg ); ?>">
                    <span
                        class="redux-dev-mode-notice"><?php esc_html_e( 'Developer Mode Enabled', 'logancee' ); ?></span>
                </div>
            <?php } elseif (isset($this->parent->args['forced_dev_mode_off']) && $this->parent->args['forced_dev_mode_off'] == true ) { ?>
                <?php $tip_title    = 'The "forced_dev_mode_off" argument has been set to true.'; ?>
                <?php $tip_msg      = 'Support options are not available while this argument is enabled.  You will also need to switch this argument to false before deploying your project.  If you are a user of this product and you are seeing this message, please contact the author of this theme/plugin.'; ?>
                <div class="redux-dev-mode-notice-container redux-dev-qtip" 
                     qtip-title="<?php echo esc_attr( $tip_title ); ?>"
                     qtip-content="<?php echo esc_attr( $tip_msg ); ?>">
                    <span
                        class="redux-dev-mode-notice" style="background-color: #FF001D;"><?php esc_html_e( 'FORCED DEV MODE OFF ENABLED', 'logancee' ); ?></span>
                </div>
            
            <?php } ?>

            <h2><?php echo wp_kses_post( $this->parent->args['display_name'] ); ?></h2>

            <?php if ( ! empty( $this->parent->args['display_version'] ) ) { ?>
                <span><?php echo wp_kses_post( $this->parent->args['display_version'] ); ?></span>
            <?php } ?>


        </div>
    <?php } ?>
    
                    
    <div class="skin-manager">
        <div class="active-skin"><?php echo esc_html__('Current skin', 'logancee').':' ?> </div>
        <?php if(!empty($skins)):?>
        <select id="skin-select">
        <?php foreach ($skins as $file => $name):?>
            <option value="<?php echo esc_attr($file)?>" <?php echo esc_attr($logancee_skins_config['active_skin']) == $file ? 'selected' : '' ?>><?php echo esc_html($name) ?></option>
        <?php endforeach; ?>
        </select>
        <div id="activate-skin" class="button button-primary"><?php echo esc_html__('Activate skin', 'logancee') ?> </div>
        <div id="remove-skin" class="button button-cancel"><?php echo esc_html__('Remove skin', 'logancee') ?></div>
        <div id="add-skin" class="button button-primary"><?php echo esc_html__('Add new skin', 'logancee') ?></div>
        <div class="add-skin-area hide">
            <input type="text" id="new_skin_name">
            <div class="button button-primary" id="create-skin"><?php echo esc_html__('Create', 'logancee') ?></div>
        </div>
        <?php endif; ?>
    </div>

    <div class="clear"></div>
</div>

<script>
(function( $ ) {
    'use strict';

    $.redux = $.redux || {};

    $( document ).ready(function() {
        
        $('#add-skin').click(function(){
            $('.add-skin-area').toggleClass('hide');
        })
        
        $('#create-skin').click(function(){
            var skin = $('#new_skin_name').val();
            var overlay = $( document.getElementById( 'redux_ajax_overlay' ) );
            overlay.fadeIn();

            // Add the loading mechanism
            jQuery( '.redux-action_bar .spinner' ).addClass( 'is-active' );

            jQuery( '.redux-action_bar input' ).attr( 'disabled', 'disabled' );
            var $notification_bar = jQuery( document.getElementById( 'redux_notification_bar' ) );
            $notification_bar.slideUp();
            jQuery( '.redux-save-warn' ).slideUp();
            jQuery( '.redux_ajax_save_error' ).slideUp(
                'medium', function() {
                    jQuery( this ).remove();
                }
            );
            
            $.ajax(
            {
                type: "post",
                dataType: "json",
                url: ajaxurl,
                data: {
                    action: "logancee_ajax_skin_create",
                    skin: skin
                },
                error: function( response ) {
                    if ( !window.console ) console = {};
                    console.log = console.log || function( name, data ) {
                    };
                    console.log( redux.ajax.console );
                    console.log( response.responseText );
                    jQuery( '.redux-action_bar input' ).removeAttr( 'disabled' );
                    overlay.fadeOut( 'fast' );
                    jQuery( '.redux-action_bar .spinner' ).removeClass( 'is-active' );
                    alert( redux.ajax.alert );
                },
                success: function( response ) {
                    if ( response.action && response.action == "reload" ) {
                        location.reload( true );
                    } else if ( response.status == "success" ) {
                        jQuery( '.redux-action_bar input' ).removeAttr( 'disabled' );
                        overlay.fadeOut( 'fast' );
                        jQuery( '.redux-action_bar .spinner' ).removeClass( 'is-active' );
                        redux.options = response.options;
                        //redux.defaults = response.defaults;
                        redux.errors = response.errors;
                        redux.warnings = response.warnings;

                        $notification_bar.html( response.notification_bar ).slideDown( 'fast' );
                        if ( response.errors !== null || response.warnings !== null ) {
                            $.redux.notices();
                        }
                        var $save_notice = $( document.getElementById( 'redux_notification_bar' ) ).find( '.saved_notice' );
                        $save_notice.slideDown();
                        $save_notice.delay( 4000 ).slideUp();
                    } else {
                        jQuery( '.redux-action_bar input' ).removeAttr( 'disabled' );
                        jQuery( '.redux-action_bar .spinner' ).removeClass( 'is-active' );
                        overlay.fadeOut( 'fast' );
                        jQuery( '.wrap h2:first' ).parent().append( '<div class="error redux_ajax_save_error" style="display:none;"><p>' + response.status + '</p></div>' );
                        jQuery( '.redux_ajax_save_error' ).slideDown();
                        jQuery( "html, body" ).animate( {scrollTop: 0}, "slow" );
                    }
                }
            }
        );
        })
        
        $('#activate-skin').click(function(){
            var skin = $('#skin-select').val();
            var overlay = $( document.getElementById( 'redux_ajax_overlay' ) );
            overlay.fadeIn();

            // Add the loading mechanism
            jQuery( '.redux-action_bar .spinner' ).addClass( 'is-active' );

            jQuery( '.redux-action_bar input' ).attr( 'disabled', 'disabled' );
            var $notification_bar = jQuery( document.getElementById( 'redux_notification_bar' ) );
            $notification_bar.slideUp();
            jQuery( '.redux-save-warn' ).slideUp();
            jQuery( '.redux_ajax_save_error' ).slideUp(
                'medium', function() {
                    jQuery( this ).remove();
                }
            );
            
            $.ajax(
            {
                type: "post",
                dataType: "json",
                url: ajaxurl,
                data: {
                    action: "logancee_ajax_skin_activate",
                    skin: skin
                },
                error: function( response ) {
                    if ( !window.console ) console = {};
                    console.log = console.log || function( name, data ) {
                    };
                    console.log( redux.ajax.console );
                    console.log( response.responseText );
                    jQuery( '.redux-action_bar input' ).removeAttr( 'disabled' );
                    overlay.fadeOut( 'fast' );
                    jQuery( '.redux-action_bar .spinner' ).removeClass( 'is-active' );
                    alert( redux.ajax.alert );
                },
                success: function( response ) {
                    if ( response.action && response.action == "reload" ) {
                        location.reload( true );
                    } else if ( response.status == "success" ) {
                        jQuery( '.redux-action_bar input' ).removeAttr( 'disabled' );
                        overlay.fadeOut( 'fast' );
                        jQuery( '.redux-action_bar .spinner' ).removeClass( 'is-active' );
                        redux.options = response.options;
                        //redux.defaults = response.defaults;
                        redux.errors = response.errors;
                        redux.warnings = response.warnings;

                        $notification_bar.html( response.notification_bar ).slideDown( 'fast' );
                        if ( response.errors !== null || response.warnings !== null ) {
                            $.redux.notices();
                        }
                        var $save_notice = $( document.getElementById( 'redux_notification_bar' ) ).find( '.saved_notice' );
                        $save_notice.slideDown();
                        $save_notice.delay( 4000 ).slideUp();
                    } else {
                        jQuery( '.redux-action_bar input' ).removeAttr( 'disabled' );
                        jQuery( '.redux-action_bar .spinner' ).removeClass( 'is-active' );
                        overlay.fadeOut( 'fast' );
                        jQuery( '.wrap h2:first' ).parent().append( '<div class="error redux_ajax_save_error" style="display:none;"><p>' + response.status + '</p></div>' );
                        jQuery( '.redux_ajax_save_error' ).slideDown();
                        jQuery( "html, body" ).animate( {scrollTop: 0}, "slow" );
                    }
                }
            }
        );
        })
        
         
        $('#remove-skin').click(function(){
            if(!confirm('<?php echo esc_html__('Are you sure? All data of this skin will be lost', 'logancee');?>')){
                return;
            }
            var skin = $('#skin-select').val();
            var overlay = $( document.getElementById( 'redux_ajax_overlay' ) );
            overlay.fadeIn();

            // Add the loading mechanism
            jQuery( '.redux-action_bar .spinner' ).addClass( 'is-active' );

            jQuery( '.redux-action_bar input' ).attr( 'disabled', 'disabled' );
            var $notification_bar = jQuery( document.getElementById( 'redux_notification_bar' ) );
            $notification_bar.slideUp();
            jQuery( '.redux-save-warn' ).slideUp();
            jQuery( '.redux_ajax_save_error' ).slideUp(
                'medium', function() {
                    jQuery( this ).remove();
                }
            );
            
            $.ajax(
            {
                type: "post",
                dataType: "json",
                url: ajaxurl,
                data: {
                    action: "logancee_ajax_skin_remove",
                    skin: skin
                },
                error: function( response ) {
                    if ( !window.console ) console = {};
                    console.log = console.log || function( name, data ) {
                    };
                    console.log( redux.ajax.console );
                    console.log( response.responseText );
                    jQuery( '.redux-action_bar input' ).removeAttr( 'disabled' );
                    overlay.fadeOut( 'fast' );
                    jQuery( '.redux-action_bar .spinner' ).removeClass( 'is-active' );
                    alert( redux.ajax.alert );
                },
                success: function( response ) {
                    if ( response.action && response.action == "reload" ) {
                        location.reload( true );
                    } else if ( response.status == "success" ) {
                        jQuery( '.redux-action_bar input' ).removeAttr( 'disabled' );
                        overlay.fadeOut( 'fast' );
                        jQuery( '.redux-action_bar .spinner' ).removeClass( 'is-active' );
                        redux.options = response.options;
                        //redux.defaults = response.defaults;
                        redux.errors = response.errors;
                        redux.warnings = response.warnings;

                        $notification_bar.html( response.notification_bar ).slideDown( 'fast' );
                        if ( response.errors !== null || response.warnings !== null ) {
                            $.redux.notices();
                        }
                        var $save_notice = $( document.getElementById( 'redux_notification_bar' ) ).find( '.saved_notice' );
                        $save_notice.slideDown();
                        $save_notice.delay( 4000 ).slideUp();
                    } else {
                        jQuery( '.redux-action_bar input' ).removeAttr( 'disabled' );
                        jQuery( '.redux-action_bar .spinner' ).removeClass( 'is-active' );
                        overlay.fadeOut( 'fast' );
                        jQuery( '.wrap h2:first' ).parent().append( '<div class="error redux_ajax_save_error" style="display:none;"><p>' + response.status + '</p></div>' );
                        jQuery( '.redux_ajax_save_error' ).slideDown();
                        jQuery( "html, body" ).animate( {scrollTop: 0}, "slow" );
                    }
                }
            }
        );
        })
        
    })
})( jQuery );
</script>
