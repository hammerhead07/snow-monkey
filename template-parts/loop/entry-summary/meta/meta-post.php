<?php
/**
 * @package snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 * @version 11.4.0
 */

use Framework\Helper;

$public_terms = Helper::get_the_public_terms( get_the_ID() );
?>

<div class="c-entry-summary__meta">
	<ul class="c-meta">
		<li class="c-meta__item c-meta__item--author">
			<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><?php echo esc_html( get_the_author() ); ?>
		</li>
		<li class="c-meta__item c-meta__item--published">
			<?php the_time( get_option( 'date_format' ) ); ?>
		</li>
		<?php if ( $public_terms ) : ?>
			<li class="c-meta__item c-meta__item--categories">
				<?php
				Helper::get_template_part(
					'template-parts/loop/entry-summary/term/term',
					get_post_type(),
					[
						'_terms' => [ $public_terms[0] ],
					]
				);
				?>
			</li>
		<?php endif; ?>
	</ul>
</div>