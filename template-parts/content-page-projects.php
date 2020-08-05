<?php
/**
 * Template part for the projects page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Program
 */

?>

<header class="screen-reader-text">
  <h1 class="screen-reader-text"><?php the_title(); ?></h1>
</header>

<?php // Query for default (projects) posts

  $args = array( 'post_type' => 'post', 'posts_per_page' => -1 );
  $projects = new WP_Query($args);

  if ($projects->have_posts()) :

    while ($projects->have_posts()) : $projects->the_post();

      $current = $projects->current_post;

      if ($projects->current_post === 0) :

        get_template_part( 'template-parts/sub-templates/project', 'featured' );
      
      else : 

        get_template_part( 'template-parts/sub-templates/project', 'regular' );

      endif;
    
    endwhile;
  
  endif;

?>
