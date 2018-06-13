<?php 
/**
 * The template for displaying all project posts
 *
 * @package Evelyn
 */

 /* 
  * Define our query arguments
  * Want project posts that haven't been archived
  */
$args = array (
  'post_type' => 'projects',
  'category__not_in' => 'archive'
);

// Place query results in variable 
$projects = new WP_Query($args);

// Output html content
echo '<section class="row l-grid l-grid__3 l-grid-gutter l-grid-gutter__slim l-container--wide l-container__flush">';
while ( $projects->have_posts() ) : $projects->the_post();
  $featured_image = get_the_post_thumbnail_url(get_the_ID());
  ?> 
  <article class="panel panel__dark l-grid--item col-sm-6 col-lg-4 has-background-dim" style="background: linear-gradient( rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65) ), url( <?php echo $featured_image; ?>); background-size: cover;">
  <h4 class="entry-title">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
  </h4>
  <?php
  $excerpt = '';
  if (has_excerpt()) {
      $excerpt = wp_strip_all_tags(get_the_excerpt(), true );
      echo '<p class="entry-excerpt">' .$excerpt. '</p>';
  }
  ?>
  </article>
<?php 
  endwhile;
  echo '</section>';
  // Reset the WordPress loop
  wp_reset_query();
?>