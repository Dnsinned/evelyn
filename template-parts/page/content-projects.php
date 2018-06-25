<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Evelyn
 */

?>

<?php 
	$hidden = false;
	$alignment = 'text-left';
	if( get_field('text_alignment') ) {
		//$alignment = 'text-' . get_field('text_alignment');
	} 
	if( get_field('hide_default_header') ) {
		$hidden = true;
	} 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('l-container'); ?>>
	
	<?php //get_template_part( 'template-parts/partials/content', 'header-cover' ); ?>
	
	<?php if (has_post_thumbnail()) : ?> 
		<header class="entry-header l-container cover-header cover-header__full <?php if ($hidden) { echo 'd-none '; } ?><?php if (has_post_thumbnail()) { echo 'cover-header__img'; } ?>" 
		style="background: linear-gradient( rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65) ), url( <?php echo the_post_thumbnail_url(); ?>); background-size: cover; background-position: 50% 32%;"
	<?php else : ?>
		<header class="entry-header l-container <?php if ($hidden) { echo 'd-none '; } ?><?php if (has_post_thumbnail()) { echo 'cover-header__img'; } ?>" 
		style="background-color: #fff;" 
	<?php endif; ?>
	>
		<div class="entry-header--content">
			<p class="entry-cats font-semibold mt-auto <?php echo $alignment; ?>">
			<?php $categories = get_the_category();
				if ( ! empty( $categories ) ) {
					_e($categories[0]->name);
				} ?>
			</p>
			<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title ' . $alignment . '" >', '</h1>' );
				else :
					the_title( '<h2 class="entry-title ' . $alignment . '"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
			?>
			<?php /*
			$excerpt = '';
			if (has_excerpt()) {
				$excerpt = wp_strip_all_tags(get_the_excerpt(), true );
				echo '<p class="entry-excerpt mt-3 ' . $alignment . '">' .$excerpt. '</p>';
			} */
			?>

			<?php
			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					evelyn_posted_on();
					evelyn_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</div>
	</header><!-- .entry-header -->
	
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
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'evelyn' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer l-container--content">
		<?php evelyn_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
