<?php
/**
 * @package snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 * @version 8.0.8
 */

use Framework\Helper;

$eyecatch_position = get_theme_mod( get_post_type() . '-eyecatch' );
?>

<article <?php post_class(); ?>>
	<?php
	if ( 'title-on-page-header' !== $eyecatch_position ) {
		Helper::get_template_part( 'template-parts/content/entry/header/header', get_post_type() );
	}
	?>

	<div class="c-entry__body">
		<?php
		if ( 'content-top' === $eyecatch_position && has_post_thumbnail() ) {
			Helper::get_template_part( 'template-parts/content/eyecatch' );
		}
		?>

		<?php Helper::get_template_part( 'template-parts/content/entry/content/content', get_post_type() ); ?>
	</div>
</article>

<?php
if ( comments_open() || pings_open() || get_comments_number() ) {
	comments_template( '', true );
}
