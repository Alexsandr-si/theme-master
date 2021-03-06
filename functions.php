<?php
/**
 * master-computerov functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package master-computerov
 */
show_admin_bar( false );

if ( ! function_exists( 'master_computerov_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function master_computerov_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on master-computerov, use a find and replace
		 * to change 'master-computerov' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'master-computerov', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_action('wp_head', function(){ remove_action( 'wp_head', '_wp_render_title_tag', 1 ); }, 0);
        
        add_filter('document_title_parts', function( $parts ){
	       if( isset($parts['site']) ) unset($parts['site']);
	       return $parts;
            });
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary', 'master-computerov' ),
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
		add_theme_support( 'custom-background', apply_filters( 'master_computerov_custom_background_args', array(
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
add_action( 'after_setup_theme', 'master_computerov_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function master_computerov_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'master_computerov_content_width', 640 );
}
add_action( 'after_setup_theme', 'master_computerov_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function master_computerov_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'master-computerov' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'master-computerov' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'master_computerov_widgets_init' );

function add_logo() {

	register_sidebar( array(
		'name'          => 'logo',
		'id'            => 'logo',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

}
add_action('widgets_init', 'add_logo');
/**
 * Enqueue scripts and styles.
 */
function master_computerov_scripts() {
	wp_enqueue_style( 'master-computerov-style', get_stylesheet_uri() );
    
    wp_enqueue_style( 'master-computerov-animate', get_template_directory_uri() . '/libs/animate.css' );
    
    wp_enqueue_style( 'master-computerov-bootstrap', get_template_directory_uri() . '/libs/bootstrap.min.css' );
    
     wp_enqueue_style( 'master-magnific-popup', get_template_directory_uri() . '/libs/magnific-popup.min.css' );
    
    wp_enqueue_style( 'master-computerov-main', get_template_directory_uri() . '/css/main.css' );
    
    wp_enqueue_style( 'master-computerov-fonts', get_template_directory_uri() . '/css/fonts.css' );
    
    wp_enqueue_style( 'master-computerov-media', get_template_directory_uri() . '/css/media.css' );

	wp_enqueue_script( 'master-computerov-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'master-computerov-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    
    wp_enqueue_script( 'master-computerov-jq', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), '20151215', true );
    
    wp_enqueue_script( 'master-computerov-common', get_template_directory_uri() . '/js/common.js', array(), '20151215', true );
    
    wp_enqueue_script( 'master-computerov-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', true );
    
    wp_enqueue_script( 'master-computerov-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'master_computerov_scripts' );

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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

