<?php
/**
 * @package snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 * @version 9.0.0
 */

use Inc2734\WP_Custom_CSS_To_Editor;
use Framework\Helper;

/**
 * Custom CSS apply to editor
 */
new WP_Custom_CSS_To_Editor\Bootstrap();

/**
 * Support editor styles
 *
 * @return void
 */
add_action(
	'after_setup_theme',
	function() {
		add_theme_support( 'editor-styles' );
		$stylesheet = [ 'assets/css/editor-style.min.css' ];
		add_editor_style( $stylesheet );
	}
);

/**
 * Support align-wide
 *
 * @var void
 */
add_action(
	'after_setup_theme',
	function() {
		add_theme_support( 'align-wide' );
	}
);

/**
 * Deregister wp-block-library-theme
 *
 * @var void
 */
add_action(
	'enqueue_block_editor_assets',
	function() {
		wp_deregister_style( 'wp-block-library-theme' );
		wp_register_style( 'wp-block-library-theme', null, [], 1 );
	}
);

/**
 * Color palette
 *
 * @var void
 */
add_action(
	'after_setup_theme',
	function() {
		add_theme_support(
			'editor-color-palette',
			Helper::get_color_palette()
		);
	}
);
