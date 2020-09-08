<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Program
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header page">
    <div class="container">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      <?php global_reporting_program_page_description(); ?>
    </div>
	</header><!-- .entry-header -->

	<?php global_reporting_program_post_thumbnail(); ?>

	<div class="entry-content default">
    <section>
		  <?php the_content(); ?>
    </section
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
