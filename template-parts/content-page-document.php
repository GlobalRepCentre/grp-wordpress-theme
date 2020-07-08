<?php
/**
 * Template part for displaying syllabus page content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Program
 */

?>

<article id="syllabus" class="document">
  <div class="header-nav">
    <header class="entry-header">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      <?php	the_content(); ?>
    </header>
    <?php
    // Query for syllabus posts
    $post_slug = $post->post_name;
    $args = array( 'post_type' => $post_slug, 'posts_per_page' => -1 );
    $sections = new WP_Query($args);

    if ($sections->have_posts()) : ?>
      <nav>
        <ul>
          <?php while ($sections->have_posts()) : $sections->the_post(); ?>
            <?php $title = get_the_title(); ?>
            <li><a class="doc-nav" href="#<?php echo sanitize_title($title); ?>"><?php echo $title; ?></a></li>
          <?php endwhile; ?>
        </ul>
      </nav>
    <?php endif; ?>
  </div>
	<div class="entry-content">
    <?php $sections->rewind_posts();
    if ($sections->have_posts()) : ?>
      <?php while ($sections->have_posts()) : $sections->the_post(); ?>
        <?php $title = get_the_title(); ?>
        <section id="<?php echo sanitize_title($title); ?>">
          <header><h2 class="section"><?php echo $title; ?></h2></header>
          <div><?php the_content(); ?></div>
        </section>
      <?php endwhile; ?>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
	</div>
</article>
