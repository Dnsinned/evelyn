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
  'orderby' => 'menu_order',
  'order'   => 'ASC'
);
if ($show_archives) {
  $args['category__in'] = $archive_id;
}
else {
  $args['category__not_in'] =  $archive_id;
}


// Place query results in variable 
$projects = new WP_Query($args);

/*
echo '<h3 class="l-container--wide">Found Posts:';
_e($projects->found_posts);
echo '</h3>';
echo '<h3 class="l-container--wide">Post Count:';
_e($projects->post_count);
echo '</h3>';
*/

// Output html content
echo '<section class="row l-grid l-grid__3 l-grid__compact l-grid-gutter l-grid-gutter__slim l-container--wide l-container__flush">';
while ( $projects->have_posts() ) : $projects->the_post();
?> 
  <?php if (has_post_thumbnail()) : ?>
  <article class="panel panel__dark panel__link l-grid--item col-sm-6 col-lg-4" style="background: linear-gradient( rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65) ), url( <?php echo the_post_thumbnail_url(); ?>); background-size: cover;">
  <?php else : ?>
  <article class="panel panel__link border-grey l-grid--item col-sm-6 col-lg-4">
  <?php endif; ?>

    <a href="<?php the_permalink(); ?>">
      
      <p class="entry-cats"><?php $categories = get_the_category();
      if ( ! empty( $categories ) ) {
        foreach ($categories as $key => $curr_cat) {
          if ($key > 0) {
            _e(' | ' . $curr_cat->name);
          } else {
            _e($curr_cat->name);
          }
        }
      } ?></p>
      
      <h4 class="entry-title mt-auto mb-2" title="<?php the_title_attribute(); ?>"><?php //echo $projects->current_post . ' '; ?><?php the_title(); ?></h4>

      <?php
      $excerpt = '';
      if (has_excerpt()) {
          $excerpt = wp_strip_all_tags(get_the_excerpt(), true );
          echo '<p class="entry-excerpt">' .$excerpt. '</p>';
      }
      ?>
    
      <div class="panel--icon justify-content-end">
        <i class="material-icons panel--forward">
          arrow_forward
        </i>
      </div>
    </a>  
  </article>
  
<?php endwhile; ?>

</section>
  
<?php wp_reset_query(); /* Reset the WordPress loop */ ?>