<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Global_Reporting_Program
 */

if ( ! function_exists( 'global_reporting_program_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function global_reporting_program_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
      // If we indicated we want to check for a caption
      if ($caption) : 
        // and the caption exists
        if ( get_the_post_thumbnail_caption() ) : ?>
          <figure>
            <?php the_post_thumbnail(); ?>
            <figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
          </figure>
        <?php else :
          the_post_thumbnail();
        endif;

      else : ?>
        <div class="img-wrapper">
          <?php the_post_thumbnail(); ?>
        </div>
      
      <?php endif; ?>

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;


if ( ! function_exists( 'global_reporting_program_post_thumbnail_caption' ) ) :
  	/**
	 * Displays a post thumbnail's caption
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */

  function global_reporting_program_post_thumbnail_caption() {
		if ( is_attachment() || ! has_post_thumbnail() ) {
			return;
    }

    if ( get_the_post_thumbnail_caption() ) : ?>

      <span><?php the_post_thumbnail_caption(); ?></span>
  
    <?php endif;
  }

endif;

if ( ! function_exists( 'global_reporting_program_page_description' ) ) :
  /**
 * Displays a page's custom page description if it exists
 */
function global_reporting_program_page_description() {
  if ( ! get_field('page_description') ) {
    return;
  } ?>
  <p><?php the_field('page_description'); ?></p>
  <?php }
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
