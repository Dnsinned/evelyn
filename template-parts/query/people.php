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
  'post_type' => 'people',
  'category_name'   => $people_role,
  'orderby' => 'menu_order',
  'order'   => 'ASC',
  'posts_per_page' => $show_n 
);

// Place query results in variable 
$people = new WP_Query($args);

// only return any html content if there are any matching queries
if ($support_methods->found_posts) :

// Output html content
echo '<section class="row l-grid l-grid__3 l-grid__compact l-grid-gutter l-grid-gutter__slim l-container--wide l-container__flush">';
while ( $people->have_posts() ) : $people->the_post();
?> 

  <article class="panel panel__dark l-grid--item col-sm-6 col-lg-4" style="background: linear-gradient( rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65) ), url( <?php echo the_post_thumbnail_url(); ?>); background-size: cover;">
  <h4 class="entry-title">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php //echo $people->current_post . ' '; ?><?php the_title(); ?></a>
  </h4>

  <?php the_content(); ?>

  </article>

<?php endwhile; ?>

</section>
  
<?php wp_reset_query(); /* Reset the WordPress loop */ ?>