<?php
/**
 * Template part for displaying about page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Program
 */

?>

<?php
  // set up the query for project posts to populate stats section
  $args = array( 'post_type' => 'post', 'posts_per_page' => -1 );
  $projects = new WP_Query($args);

  if ($projects->have_posts()) :

    // Get number of projects
    $numProjects = $projects->found_posts;

    // Initialize other counts
    $countriesArray = array();
    $numAwards = 0;

    while ($projects->have_posts()) : $projects->the_post();

      // Push each country to an array
      if ( have_rows('reported_in') ) :
        while( have_rows('reported_in') ) : the_row();
          $countriesArray[] = strtolower(get_sub_field('country'));
        endwhile;

        // Count the countries, ignoring duplicates
        $numUniqueCountries = count(array_unique($countriesArray));

      endif;

      if ( have_rows('awards') ) :
        while( have_rows('awards') ) : the_row();
          $numAwards++;
        endwhile;
      endif;

    endwhile;

  endif;

  wp_reset_postdata();

?>

<article id="post-<?php the_ID(); ?>" class="about-page">
  <header class="entry-header page">
    <div class="container">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      <?php global_reporting_program_page_description(); ?>
    </div>
	</header><!-- .entry-header -->

	<?php global_reporting_program_post_thumbnail(); ?>

	<div class="entry-content">
    <section class="stats">
      <span><span class="number"><?php echo $numProjects; ?></span>Projects</span>
      <span class="stat-label">reported from</span>
      <span><span class="number"><?php echo $numUniqueCountries; ?></span>Countries</span>
      <span class="stat-label">winning &amp;<br>nominated for</span>
      <span><span class="number"><?php echo $numAwards; ?></span>Awards</span>
    </section>
    <section>
      <?php the_content(); ?>
    </section>
    <?php if ( have_rows('faqs') ) : ?>
    <section id="faqs">
      <h2 class="anchor-offset" id="questions">Frequently asked questions</h2>
      <?php while ( have_rows('faqs') ) : the_row(); ?>
        <div class="collapser">
          <div class="title" tabindex="0"><span class="text"><?php the_sub_field('question'); ?></span><span class="plus-minus"><i class="fas fa-plus"></i></span></div>
          <div class="content" style="display: none;">
            <?php the_sub_field('answer'); ?>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </section>
  <?php endif; ?>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
