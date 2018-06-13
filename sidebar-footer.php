<?php
/**
 * The sidebar containing the footer widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Evelyn
 */

if ( ! is_active_sidebar( 'footer-1' ) ) {
	return;
}
?>

<aside id="footer-widget-area" class="site-info--contact widget-area footer-widgets col-md-12 col-lg-6">
	<div class="row">
		<?php dynamic_sidebar( 'footer-1' ); ?>
	</div>
</aside><!-- #secondary -->
