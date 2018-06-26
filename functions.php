<?php
/**
 * V12 Fitness functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package V12_Fitness
 */

if ( ! function_exists( 'v12_fitness_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function v12_fitness_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on V12 Fitness, use a find and replace
		 * to change 'v12-fitness' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'v12-fitness', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'v12-fitness' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'v12_fitness_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'v12_fitness_setup' );

function v12_fitness_add_editor_style() {
	add_editor_style('dist/css/editor-style.css');
}
add_action('admin_init', 'v12_fitness_add_editor_style');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function v12_fitness_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'v12_fitness_content_width', 1140 );
}
add_action( 'after_setup_theme', 'v12_fitness_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function v12_fitness_scripts() {
	wp_enqueue_style('v12-fitness-bootstrap-css', get_template_directory_uri() . '/dist/css/bootstrap.min.css');
	
	wp_enqueue_style('v12-fitness-fontawesome-css', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_style( 'v12-fitness-style', get_stylesheet_uri() );
	
	wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.min.js', false, '', true);
	
	wp_enqueue_script('popper');

	// Not using the underscores navigation options
	// wp_enqueue_script( 'v12-fitness-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_script('v12-fitness-tether', get_template_directory_uri() . '/src/js/tether.min.js', array(), false, true);
	
	wp_enqueue_script('v12-fitness-bootstrap', get_template_directory_uri() . '/src/js/bootstrap.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('v12-fitness-bootstrap-hover', get_template_directory_uri() . '/src/js/bootstrap-hover.js', array('jquery'), false, true);
	
	wp_enqueue_script('v12-fitness-nav-scroll', get_template_directory_uri() . '/src/js/nav-scroll.js', array('jquery'), false, true);

	wp_enqueue_script( 'v12-fitness-skip-link-focus-fix', get_template_directory_uri() . '/src/js/skip-link-focus-fix.js', array(), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'v12_fitness_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Widgets File.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Bootstrap Navwalker File.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
