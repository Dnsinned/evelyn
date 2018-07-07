<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Evelyn
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('l-container'); ?>>
	
<?php get_template_part( 'template-parts/partials/content', 'header' ); ?>

	<?php // evelyn_post_thumbnail(); ?>

	<div class="entry-summary l-container--content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer l-container--content">
		<?php evelyn_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
