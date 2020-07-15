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

      endif;
    
    endwhile;
  
  endif; ?>

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
		the_content();

		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'global-reporting-program' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
  <?php endif;

?>
