<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Logancee
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function logancee_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'logancee_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function logancee_jetpack_setup
add_action( 'after_setup_theme', 'logancee_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function logancee_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function logancee_infinite_scroll_render
