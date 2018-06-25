<?php
/**
 * Template part for displaying the header of content
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
		$alignment = 'text-' . get_field('text_alignment');
	} 
	if( get_field('hide_default_header') ) {
		$hidden = true;
	} 
?>
<?php if (has_post_thumbnail()) : ?> 
	<header class="entry-header l-container cover-header <?php if ($hidden) { echo 'd-none '; } ?><?php if (has_post_thumbnail()) { echo 'cover-header__img'; } ?>" 
	style="background: linear-gradient( rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65) ), url( <?php echo the_post_thumbnail_url(); ?>); background-size: cover; background-position: 50% 32%;"
<?php else : ?>
	<header class="entry-header l-container <?php if ($hidden) { echo 'd-none '; } ?><?php if (has_post_thumbnail()) { echo 'cover-header__img'; } ?>" 
	style="background-color: #fff;" 
<?php endif; ?>
>
	<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title ' . $alignment . '" >', '</h1>' );
		else :
			the_title( '<h2 class="entry-title ' . $alignment . '"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
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
</header><!-- .entry-header -->