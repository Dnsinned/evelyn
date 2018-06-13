<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays the homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Evelyn
 */

get_header();
?>

	<div id="primary" class="content-area l-container">
		<main id="main" class="site-main l-container">
			<?php get_template_part( 'template-parts/query/projects'); ?>
		
		<?php 
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/page/content', 'front-page' );

		endwhile; // End of the loop. 
		?> 

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
