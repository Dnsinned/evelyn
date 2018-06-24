<?php
/**
 * The sidebar containing the footer widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Evelyn
 */

if ( ! is_active_sidebar( 'social-1' ) ) {
	return;
}
?>

<?php dynamic_sidebar( 'social-1' ); ?>

