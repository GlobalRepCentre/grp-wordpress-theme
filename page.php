<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Program
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
      the_post();
      
      if ( is_page('projects') ) :

        get_template_part( 'template-parts/content', 'page-projects' );   

      elseif ( is_page('fellows') || is_page('faculty-staff-and-board') ) :

        get_template_part( 'template-parts/content', 'page-people' );
      
      elseif ( is_page('about') ) :

        get_template_part( 'template-parts/content', 'page-about' );       
        
      else :

        get_template_part( 'template-parts/content', 'page' );
        
      endif;    

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
