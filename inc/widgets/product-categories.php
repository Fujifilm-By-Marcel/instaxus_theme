<?php
add_action('widgets_init', 'logancee_product_categories_load_widgets');

function logancee_product_categories_load_widgets() {
  if ( class_exists( 'WC_Widget_Product_Categories' ) ) {
    unregister_widget( 'WC_Widget_Product_Categories' );
    register_widget( 'Logancee_WC_Widget_Product_Categories' );
  }
}


class Logancee_WC_Widget_Product_Categories extends WC_Widget_Product_Categories {
    
    
    public function widget( $args, $instance ) {
        $args['before_widget'] = '<div class="widget box box-with-categories"> <div class="box-heading">';
        $args['after_title'] = '
        </div><div class="strip-line"></div>
        <div class="box-content box-category">
        ';
        parent::widget($args, $instance);
    }
	
}
?>
