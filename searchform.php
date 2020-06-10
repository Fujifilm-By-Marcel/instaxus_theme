<?php
$logancee_options = logancee_get_options();
?>
<form class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>/" method="get">
    <div class="button-search"></div>
    <input name="s" id="s" type="text" value="" placeholder="<?php echo esc_html__('Search here', 'logancee'); ?>" autocomplete="off" />
    <input type="hidden" name="post_type" value="product" />
    <span class="button-wrap"><button class="btn btn-special" title="<?php echo esc_html__('Search', 'logancee'); ?>" type="submit"><span class="fa fa-search"></span></button></span>
</form>
