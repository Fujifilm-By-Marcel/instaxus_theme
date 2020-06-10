<?php
$logancee_options = logancee_get_options();
?>

<?php if($logancee_options['layout-page-width'] == 3 && $logancee_options['layout-page-width-custom-value']  > 900): ?>
<style type="text/css">
    .standard-body .full-width .container {
        max-width: <?php echo esc_html($logancee_options['layout-page-width-custom-value']); ?>px;
        <?php if($logancee_options['layout-responsive'] == '0') { ?>
        width: <?php echo esc_html($logancee_options['layout-page-width-custom-value']); ?>px;
        <?php } ?>
    }
    .standard-body .full-width .container .container {
        max-width: none;
    }

    .standard-body .fixed .background,
    .main-fixed {
        max-width: <?php echo esc_html($logancee_options['layout-page-width-custom-value']-40); ?>px;
        <?php if($logancee_options['layout-responsive'] == '0') { ?>
        width: <?php echo esc_html($logancee_options['layout-page-width-custom-value']-40); ?>px;
        <?php } ?>
    }
</style>
<?php endif; ?>

<style type="text/css">
 ul.megamenu  li .sub-menu > .content {
 -webkit-transition: all <?php if($logancee_options['menu-animation-time'] > 0 && $logancee_options['menu-animation-time'] < 5000) { echo esc_html($logancee_options['menu-animation-time']); } else { echo 300; } ?>ms ease-out !important;
 -moz-transition: all <?php if($logancee_options['menu-animation-time'] > 0 && $logancee_options['menu-animation-time'] < 5000) { echo esc_html($logancee_options['menu-animation-time']); } else { echo 300; } ?>ms ease-out !important;
 -o-transition: all <?php if($logancee_options['menu-animation-time'] > 0 && $logancee_options['menu-animation-time'] < 5000) { echo esc_html($logancee_options['menu-animation-time']); } else { echo 300; } ?>ms ease-out !important;
 -ms-transition: all <?php if($logancee_options['menu-animation-time'] > 0 && $logancee_options['menu-animation-time'] < 5000) { echo esc_html($logancee_options['menu-animation-time']); } else { echo 300; } ?>ms ease-out !important;
 transition: all <?php if($logancee_options['menu-animation-time'] > 0 && $logancee_options['menu-animation-time'] < 5000) { echo esc_html($logancee_options['menu-animation-time']); } else { echo 300; } ?>ms ease-out !important;
}
</style>

<?php if($logancee_options['css-status'] == 1):?>
<style type="text/css">
    <?php echo esc_html($logancee_options['css-value']); ?>
</style>
<?php endif; ?>
