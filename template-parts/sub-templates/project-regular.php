<?php
/**
 * Template part for regular projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Program
 */

?>

<?php //custom fields
$year = get_field('project_year');
$url = get_field('project_link');

?>

<article class="project regular">
  <header class="entry-header">
    <?php global_reporting_program_post_thumbnail(); ?>
    <div class="caption"><?php global_reporting_program_post_thumbnail_caption(); ?></div>
  </header>
  <section class="info-box">
    <div class="overview">
      <?php if ( $year ) : ?><span class="year"><?php the_field('project_year'); ?></span><?php endif; ?>
      <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
      <?php if ( have_rows('partner_logos') ) : 
        while( have_rows('partner_logos') ) : the_row(); 
          $img = get_sub_field('logo'); ?>
          <img class="logo" src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
        <?php endwhile; ?>
      <?php endif; ?>
      <div>
        <?php the_content(); ?>
      </div>
      <a class="button filled" href="<?php if ( $url ) : echo esc_url( $url ); else : the_permalink(); endif; ?>">View project</a>
    </div>
    <div class="location-awards">
      <?php if ( have_rows('reported_in') ) : ?>
        <span class="list-label">Reported in</span>
        <?php while( have_rows('reported_in') ) : the_row(); ?><span class="list-item"><?php the_sub_field('country'); ?></span><?php endwhile;
      endif; ?>
      <?php if ( have_rows('awards') ) : ?>
        <br>
        <span class="list-label">Awards</span>
        <?php while( have_rows('awards') ) : the_row(); ?><span class="list-item"><?php the_sub_field('award'); ?></span><?php endwhile;
      endif; ?>
    </div>
  </section>
</article>