<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Evelyn
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('l-container'); ?>>
	
	<?php get_template_part( 'template-parts/partials/content', 'header' ); ?>

	<?php // evelyn_post_thumbnail(); ?>

	<div class="entry-content l-container">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'evelyn' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links l-container--wide">' . esc_html__( 'Pages:', 'evelyn' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer l-container--wide">
		<?php evelyn_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
