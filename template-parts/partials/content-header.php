<?php
/**
 * Template part for displaying the header of content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Evelyn
 */

?>

<header class="page-header l-container--content">
  <?php
	the_field('text-alignment');
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title" >', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
	?>

	<?php
	if ( 'post' === get_post_type() ) :
		?>
		<div class="entry-meta">
			<?php
			evelyn_posted_on();
			// evelyn_posted_by();
			?>
		</div><!-- .entry-meta -->
	<?php endif; ?>
</header><!-- .entry-header -->