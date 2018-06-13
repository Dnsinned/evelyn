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

<?php dynamic_sidebar( 'footer-1' ); ?>

