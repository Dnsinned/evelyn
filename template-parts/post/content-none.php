<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Evelyn
 */

?>

<section class="no-results not-found l-container">
	<header class="page-header l-container--wide">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'evelyn' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content l-container--wide">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'evelyn' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'evelyn' ); ?></p>
      <div>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mb-3 btn btn__cta btn__raised">Return Home</a>
      </div>
      <?php
			// get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'evelyn' ); ?></p>
      <div>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mb-3 btn btn__cta btn__raised">Return Home</a>
      </div>
      <?php
			//get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
