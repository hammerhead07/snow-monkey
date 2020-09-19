<?php
/**
 * @package snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 * @version 11.3.3
 */

use Inc2734\WP_Customizer_Framework\Framework;
use Framework\Helper;

if ( ! is_customize_preview() ) {
	return;
}

$custom_post_types = Helper::get_custom_post_types();

foreach ( $custom_post_types as $custom_post_type ) {
	$custom_post_type_object = get_post_type_object( $custom_post_type );

	Framework::section(
		'design-' . $custom_post_type . '-archive',
		[
			'title'           => sprintf(
				/* translators: 1: Custom post type name */
				__( '%1$s archive page settings', 'snow-monkey' ),
				$custom_post_type_object->label
			),
			'priority'        => 130,
			'active_callback' => function() use ( $custom_post_type_object ) {
				return is_post_type_archive( $custom_post_type_object->name );
			},
		]
	);
}