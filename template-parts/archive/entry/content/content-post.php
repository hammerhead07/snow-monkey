<?php
/**
 * @package snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 * @version 11.6.0
 */

use Framework\Helper;

global $wp_query;

$args = wp_parse_args(
	// phpcs:disable VariableAnalysis.CodeAnalysis.VariableAnalysis.UndefinedVariable
	$args,
	// phpcs:enable
	[
		'_entries_layout' => get_theme_mod( 'post-entries-layout' ),
		'_force_sm_1col'  => get_theme_mod( 'post-entries-layout-sm-1col' ),
	]
);
?>

<?php do_action( 'snow_monkey_before_archive_entry_content' ); ?>

<div class="c-entry__content p-entry-content">
	<?php do_action( 'snow_monkey_prepend_archive_entry_content' ); ?>

	<?php
	Helper::get_template_part(
		'template-parts/archive/archive',
		'post',
		[
			'_entries_layout' => $args['_entries_layout'],
			'_force_sm_1col'  => $args['_force_sm_1col'],
			'_infeed_ads'     => get_option( 'mwt-google-infeed-ads' ),
			'_post_type'      => 'post',
			'_posts_query'    => $wp_query,
		]
	);
	?>

	<?php
	if ( ! empty( $wp_query->max_num_pages ) && $wp_query->max_num_pages >= 2 ) {
		Helper::get_template_part( 'template-parts/archive/pagination' );
	}
	?>

	<?php do_action( 'snow_monkey_append_archive_entry_content' ); ?>
</div>

<?php do_action( 'snow_monkey_after_archive_entry_content' ); ?>
