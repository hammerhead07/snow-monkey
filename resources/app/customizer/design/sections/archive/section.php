<?php
/**
 * @package snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Framework;

if ( ! is_customize_preview() ) {
	return;
}

Framework::section(
	'design-archive',
	[
		'title'           => __( 'Archive pages settings', 'snow-monkey' ),
		'description'     => __( 'By the type of page displayed on the preview screen on the right side of the screen, the display setting items switched.', 'snow-monkey' ) . __( 'Currently archive page settings is displayed.', 'snow-monkey' ),
		'priority'        => 110,
		'active_callback' => function() {
			if ( class_exists( '\woocommerce' ) && is_woocommerce() ) {
				return false;
			}
			return ( is_home() || is_search() || ( is_archive() && ! is_post_type_archive() ) );
		},
	]
);
