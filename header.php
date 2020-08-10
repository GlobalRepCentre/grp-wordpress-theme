<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Global_Reporting_Program
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'global-reporting-program' ); ?></a>
  
  <span id="intersector" aria-hidden="true"></span>

	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation">
			<button id="nav-button" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="far fa-bars"></i></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
      ?>
      <a class="menu-logo" href="<?php echo get_home_url(); ?>"><img width="90" src="https://globalreportingcentre.org/wp-content/uploads/2020/06/global_reporting_centre_logo.svg" /></a>
    </nav><!-- #site-navigation -->
  </header><!-- #masthead -->
