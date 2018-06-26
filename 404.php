<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Evelyn
 */

get_header();
?>

	<div id="primary" class="content-area l-container">
		<main id="main" class="site-main l-container">

			<section class="error-404 not-found l-container--content text-center">
				<header class="page-header ">
					<h1 class="page-title"><?php esc_html_e( 'Oops! 404 error. ', 'evelyn' ); ?></h1>
					<h3 class="subheading"><?php esc_html_e( 'That page can&rsquo;t be found.', 'evelyn' ); ?></h3>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'evelyn' ); ?></p>
					<div>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn__cta btn__raised">Return Home</a>
					</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
