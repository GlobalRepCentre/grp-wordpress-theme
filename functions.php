<?php
/**
 * Global Reporting Program functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Global_Reporting_Program
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'global_reporting_program_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function global_reporting_program_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Global Reporting Program, use a find and replace
		 * to change 'global-reporting-program' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'global-reporting-program', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'global-reporting-program' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
    
    // Add theme support to change the Gutenberg editor's styles
    add_theme_support('editor-styles');
    add_editor_style( 'css/editor.css' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'global_reporting_program_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function global_reporting_program_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'global_reporting_program_content_width', 640 );
}
add_action( 'after_setup_theme', 'global_reporting_program_content_width', 0 );


// Setup custom post types for the Syllabus and Ethics Handbook
function grp_custom_posts_init() {

  $labels = array(
    'name'                  => _x( 'Syllabus Sections', 'Post type general name', 'syllabus' ),
    'singular_name'         => _x( 'Syllabus Section', 'Post type singular name', 'syllabus' ),
    'menu_name'             => _x( 'Syllabus', 'Admin Menu text', 'syllabus' ),
    'name_admin_bar'        => _x( 'Syllabus Section', 'Add New on Toolbar', 'syllabus' ),
    'add_new'               => __( 'Add New', 'syllabus' ),
    'add_new_item'          => __( 'Add new section', 'syllabus' ),
    'new_item'              => __( 'New section', 'syllabus' ),
    'edit_item'             => __( 'Edit section', 'syllabus' ),
    'view_item'             => __( 'View section', 'syllabus' ),
    'all_items'             => __( 'Sections', 'syllabus' ),
  );
  $args = array(
    'labels'             => $labels,
    'description'        => 'Syllabus custom post type',
    'menu_icon'          => 'dashicons-text-page',
    'public'             => false,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => false,
    'rewrite'            => false,
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => 20,
    'supports'           => array( 'title', 'editor' ),
    'show_in_rest'       => true
  );
  register_post_type( 'syllabus', $args );
}

add_action( 'init', 'grp_custom_posts_init' );





/**
 * Enqueue scripts and styles.
 */
function global_reporting_program_scripts() {
  wp_enqueue_style('font', 'https://fonts.googleapis.com/css2?family=Gothic+A1:wght@500;800&display=swap');
	wp_enqueue_style( 'global-reporting-program-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_script( 'global-reporting-program-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

  if ( is_front_page() ) {
    wp_enqueue_script( 'global-reporting-program-header-fader', get_template_directory_uri() . '/js/header-fader.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/8a020944ca.js', array(), _S_VERSION, false );
  }
}
add_action( 'wp_enqueue_scripts', 'global_reporting_program_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';