<?php
/**
 * Template part for the single featured project
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

<article class="project featured">
  <header id="cover-project" class="entry-header">
    <?php global_reporting_program_post_thumbnail(); ?>
    <div class="caption"><?php global_reporting_program_post_thumbnail_caption(); ?></div>
  </header>
  <section class="info-box">
    <div class="overview">
      <div>
        <?php if ( $year ) : ?><span class="year"><?php the_field('project_year'); ?></span><?php endif; ?>
        <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
        <?php if ( have_rows('partner_logos') ) : ?>
          <div class="logos-container">
          <?php while( have_rows('partner_logos') ) : the_row(); 
            $img = get_sub_field('logo'); ?>
            <img class="logo" src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
          <?php endwhile; ?>
          </div>
        <?php endif; ?>
        <a class="button filled" href="<?php if ( $url ) : echo esc_url( $url ); else : the_permalink(); endif; ?>">View project</a>
      </div>
      <div>
        <?php the_content(); ?>
      </div>
    </div>
    <div class="location-awards">
      <div>
        <?php if ( have_rows('reported_in') ) : ?>
          <span class="list-label">Reported in</span>
          <?php while( have_rows('reported_in') ) : the_row(); ?><span class="list-item"><?php the_sub_field('country'); ?></span><?php endwhile;
        endif; ?>
      </div>
      <div>
        <?php if ( have_rows('awards') ) : ?>
          <span class="list-label">Awards</span>
          <?php while( have_rows('awards') ) : the_row(); ?><span class="list-item"><?php the_sub_field('award'); ?></span><?php endwhile;
        endif; ?>
      </div>
    </div>
  </section>
</article>