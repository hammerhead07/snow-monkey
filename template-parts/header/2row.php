<?php
/**
 * @package snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 * @version 11.5.0
 *
 * renamed: template-parts/2row-header.php
 */

use Framework\Helper;

$header_content      = get_theme_mod( 'header-content' );
$header_type         = get_theme_mod( 'header-layout' ) . '-header';
$header_alignfull    = get_theme_mod( 'header-alignfull' );
$has_global_nav      = has_nav_menu( 'global-nav' );
$has_drawer_nav      = has_nav_menu( 'drawer-nav' ) || has_nav_menu( 'drawer-sub-nav' );
$has_header_sub_nav  = has_nav_menu( 'header-sub-nav' );
$data_has_global_nav = $has_global_nav ? 'true' : 'false';
$container_class     = $header_alignfull ? 'c-fluid-container' : 'c-container';
?>

<div class="l-<?php echo esc_attr( $header_type ); ?>" data-has-global-nav="<?php echo esc_attr( $data_has_global_nav ); ?>">
	<div class="<?php echo esc_attr( $container_class ); ?>">
		<?php if ( $has_header_sub_nav ) : ?>
			<div class="u-invisible-md-down">
				<?php Helper::get_template_part( 'template-parts/nav/header-sub' ); ?>
			</div>
		<?php endif; ?>

		<div class="l-<?php echo esc_attr( $header_type ); ?>__row">
			<div class="c-row c-row--margin c-row--middle c-row--nowrap">
				<div class="c-row__col c-row__col--auto">
					<?php Helper::get_template_part( 'template-parts/header/site-branding' ); ?>
				</div>

				<?php if ( $header_content ) : ?>
					<div class="c-row__col c-row__col--fit u-invisible-md-down">
						<div class="c-row c-row--right">
							<div class="c-row__col c-row__col--fit">
								<?php
								if ( get_theme_mod( 'header-content' ) ) {
									Helper::get_template_part( 'template-parts/header/content', 'lg' );
								}
								?>
							</div>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( $has_drawer_nav ) : ?>
					<div class="c-row__col c-row__col--fit u-invisible-lg-up">
						<?php Helper::get_template_part( 'template-parts/header/hamburger-btn' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( $has_global_nav ) : ?>
			<div class="l-<?php echo esc_attr( $header_type ); ?>__row u-invisible-md-down">
				<?php
				Helper::get_template_part(
					'template-parts/nav/global',
					null,
					[
						'_vertical'          => false,
						'_gnav-hover-effect' => get_theme_mod( 'gnav-hover-effect' ),
					]
				);
				?>
			</div>
		<?php endif; ?>
	</div>
</div>
