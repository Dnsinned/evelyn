<?php 
/**
 * The template for displaying the ways to people posts
 *
 * @package Evelyn
 */

 /* 
  * Define our query arguments
  */

$args = array (
  'post_type' => 'people',
  'tax_query' => array(
		array(
			'taxonomy' => 'role',
			'field'    => 'slug',
			'terms'    => $people_role,
		),
	),
  'orderby' => 'menu_order',
  'order'   => 'ASC',
  'posts_per_page' => $show_n 
);

// Place query results in variable 
$people = new WP_Query($args);

// only return any html content if there are any matching queries
if ($people->found_posts) :

  if ($style == 'profile') : 
    
    // Profile style
    echo '';
    while ( $people->have_posts() ) : $people->the_post(); ?> 

      <article class="media profile">
        <?php if (has_post_thumbnail()) : ?>
          <img class="mr-3 profile--photo" src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?> profile photo">
        <?php elseif ($align_profile) : ?> 
          <div class="mr-3 profile--photo"></div>
        <?php endif; ?>
        <div class="media-body">
          <?php the_title('<h4 class="profile--name mt-0 mb-2">', '</h4>'); ?>
          <?php if (get_field('positions')) { ?>
            <div class="profile--position f-metasub "><?php the_field('positions'); ?></div>
          <?php } ?>
          <div class="profile--bio">
            <?php the_content(); ?>
          </div>
        </div>
      </article>

    <?php endwhile; ?>
    <!--</section>-->

  <?php else : 

    // List style
    echo '<ul class="list-group">';
    while ( $people->have_posts() ) : $people->the_post(); ?> 

      <li class="list-group-item d-flex flex-row-sm justify-content-between">
        <span class="profile--name"><?php echo esc_html( get_the_title() ); ?></span>
        <?php if (get_field('positions')) { ?>
        <span class="profile--position f-metasub"><?php the_field('positions'); ?></span>
        <?php } ?>
        
      </li>

    <?php endwhile; ?>
    </ul>

  <?php endif; // Check style ?>

<?php endif; // If any results ?>
  
<?php wp_reset_query(); /* Reset the WordPress loop */ ?>