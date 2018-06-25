<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Evelyn
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer l-container">
		<section class="site-info site-info__resources row l-container--wide l-grid l-grid__4 l-grid-gutter">
			<?php
				$footer_menu_locations = array('footer-1', 'footer-2');
				foreach ($footer_menu_locations as &$location_name) {
					$locations = get_nav_menu_locations();
					$menu_id = $locations[ $location_name ];
					$menu = wp_get_nav_menu_object( $menu_id );
					echo '<nav class="menu-' . $menu->slug . '-container site-info--menu col-sm-6 col-lg-3 l-grid--item">';
					echo '<h5>' . $menu->name . '</h5>';
					wp_nav_menu( array(
						'theme_location'    => $location_name,
						'container'       => '',
					) );
					echo '</nav>';
				}	
			?> <!-- Footer links -->
			<?php get_sidebar('footer'); ?><!-- Footer widgets -->
		</section> <!-- .site-info__resources -->

		<nav class="back-to-top l-container--wide text-center py-3">
			<a class="d-block" href="#">
				<i class="material-icons">arrow_upward</i>
				<p>Back to top</p> 
			</a>
		</nav> <!-- .back-to-top -->

		<section class="site-info site-info__legal row l-container--wide l-grid l-grid__2 l-grid-gutter">
      <p class="small col-md-6 l-grid--item site-info--company">
        The Evelyn Oldfield Unit is a registered charity in England and Wales
        <a href="http://beta.charitycommission.gov.uk/charity-details/?regid=1044681&subid=0">1044681</a> and a company limited by guarantee in England and Wales
        <a href="https://beta.companieshouse.gov.uk/company/02921143">02921143</a>
      </p>
      <div class="small col-md-6 l-grid--item site-info--privacy">
				<?php 
				/* <div>
          <a href="">Terms</a> &amp
          <a href="">Privacy</a>
				</div> */ 
				?>
				<p>&copy Evelyn Oldfield Unit </div>
      </div>
    </section> <!-- .site-info__legal -->
	</footer><!-- #colophon -->
</div><!-- #page -->


<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<?php wp_footer(); ?>

</body>
</html>
