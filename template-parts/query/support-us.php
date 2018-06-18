<?php 
/**
 * The template for displaying the ways to support us pages
 *
 * @package Evelyn
 */

 /* 
  * Define our query arguments
  * Get the support-us page
  */

$args = array (
  'post_parent' => $support_page_ID, 
  'post_type' => 'page',
  'orderby' => 'menu_order',
  'order'   => 'ASC',
  'posts_per_page' => $show_n 
);

// Place query results in variable 
$support_methods = new WP_Query($args);

// only return any html content if there are any matching queries
if ($support_methods->found_posts) :
  if ($columns == 2) {
    $section_classes = 'l-grid__2';
    $article_classes = 'col-md-6';
  }
  else {
    $section_classes = 'l-grid__3';
    $article_classes = 'col-md-6 col-lg-4';
  }
?>

<section class="row l-grid <?php echo $section_classes; ?> l-grid-gutter l-grid-gutter__slim <?php if (!$show_full_post) { echo 'l-grid__compact '; } ?>l-container--wide l-container__flush">


<?php while ( $support_methods->have_posts() ) : $support_methods->the_post();
  $panel_style = ''; 
  if( !is_paged() ) {
    if ($support_methods->current_post == 0 && (get_post_field( 'post_name', get_post()) == 'donations')) {
      $panel_style = 'bg-light-red';
    } else {
      $panel_style = 'border-grey';
    }
  } 
?>
  <article class="panel l-grid--item <?php echo $article_classes . ' ' . $panel_style; ?>">
    <h3 class="entry-title"><?php the_title(); ?></h3>
    <?php 
      global $more;
      if ($show_full_post) {
        $more = -1;
      }
      else {
        $more = 0;
      }
    ?>
    <?php
      the_content('<div class="wp-block-button alignnone">
        <span class="wp-block-button__link has-text-color has-dark-grey-color has-background has-light-grey-background-color">More Info</span>
      </div>'); 
    ?>
  </article>

<?php endwhile; ?>

  <?php 
  // retrieve a specific page containing the content we want for the more-info bit
  if ($more_info_page) : 
    $page_object = get_page_by_path($more_info_page);
    if ($page_object) :
  ?>

      <article class="panel l-grid--item <?php echo $article_classes; ?> border-grey">
        <h3 class="entry-title"><?php echo $page_object->post_title; ?></h3>
        <?php echo apply_filters('the_content', $page_object->post_content); ?>
      </article>

    <?php endif; ?>
  <?php endif; ?>

</section>

<?php endif; ?>

<?php wp_reset_query(); /* Reset the WordPress loop */ ?>