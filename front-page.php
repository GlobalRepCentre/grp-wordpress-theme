<?php
/**
 * The template for the home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Program
 */

get_header();
?>

<main id="primary" class="site-main">
  <article id="home">
    <header id="cover-image" class="entry-header">
      <?php global_reporting_program_post_thumbnail(); ?>
      <div class="lead">
        <div class="headline">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
          <p><?php bloginfo('description'); ?></p>
        </div>
        <div class="caption">
          <?php global_reporting_program_post_thumbnail_caption(); ?>
        </div>
      </div>
    </header>

    <div class="entry-content">
    <?php
		while ( have_posts() ) :
      the_post();
      
      the_content();
      
    endwhile; ?>
    </div><!-- .entry-content -->
  
  </article>

	</main><!-- #main -->

<?php

get_footer();
