<?php
/**
 * Naturens Basta functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Naturens_Basta
 * Testing
 */

if ( ! function_exists( 'naturens_basta_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function naturens_basta_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Naturens Basta, use a find and replace
	 * to change 'naturens-basta' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'naturens-basta', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'naturens-basta' ),
        'social' => esc_html__( 'Social', 'naturens-basta' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'naturens_basta_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'naturens_basta_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function naturens_basta_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'naturens_basta_content_width', 640 );
}
add_action( 'after_setup_theme', 'naturens_basta_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function naturens_basta_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'naturens-basta' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'naturens-basta' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Header Search', 'naturens-basta' ),
		'id'            => 'head_search',
		'before_widget' => '<div class="widget-item head_search">',
		'after_widget'  => '</div>',
	) );
}
add_action( 'widgets_init', 'naturens_basta_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function naturens_basta_scripts() {
	wp_enqueue_style( 'naturens-basta-style', get_stylesheet_uri() );

	wp_enqueue_script( 'naturens-basta-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
    
    wp_enqueue_script( 'naturens-basta-show-and-hide', get_template_directory_uri() . '/js/show-and-hide.js', array(), '20151215', true );

	wp_enqueue_script( 'naturens-basta-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'naturens_basta_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**

/**
 * Extend WordPress search to include custom fields
 *
 * http://adambalee.com
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    
    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;
   
    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

// GET TERMS FOR PRODUCT POST FILTER

/*
function getSeason() {
    $terms = get_terms( 'sasong' );
    $x = '<div class="season_search">';
    foreach ( $terms as $term ) {
        $x .= '<button>' . $term->name . '</buttun>';
    }
    $x .= '</div>';
    return $x;
}*/
/*
function getLocation() {
    $terms = get_terms( 'omrade' );
    $x = '<select id="omrade" class="form_btn" name="omrade">';
    $x .= '<option value="" disabled selected hidden>' . $lblLocation . '</option>';
    foreach ( $terms as $term ) {
        $x .= '<option value="' . $term->slug . '">' . $term->name . '</option>';
    }
    $x .= '</select>';
    $x .= '<div class="select_arrow"></div>';
    return $x;
}
*/
function getLocation() {
    $terms = get_terms( 'omrade' );
    echo '<select id="omrade" class="form_btn" name="omrade">';
    echo '<option value="" disabled selected hidden>LOCATION</option>';
    foreach ( $terms as $term ) {
        echo '<option value="' . $term->slug . '"';
        if(isset($_POST["omrade"]) && $_POST["omrade"] == $term->slug ) { echo " selected"; }
        echo '>' . $term->name . '</option>';    
    }
    echo '</select>';
    echo '<div class="select_arrow"></div>';
}

function getCategories() {
    $terms = get_terms( 'aktivitet' );
    $x = '<div class="col-xs-12 checkboxArea">';
    foreach ( $terms as $term ) {
        $x .= '<label class="control control-checkbox">' . $term->name . '<input type="checkbox" id="aktivitet" name="aktivitet[]" value="' . $term->slug . '"/><div class="control_indicator"></div></label>';
    }
    $x .= '</div>';
    return $x;
}
/*
function getHabitat() {
    $terms = get_terms( 'habitat' );
    $x = '<select id="habitat" class="form_btn" name="habitat">';
    $x .= '<option value="" disabled selected hidden>HABITAT</option>';
    foreach ( $terms as $term ) {
        $x .= '<option value="' . $term->slug . '">' . $term->name . '</option>';
    }
    $x .= '</select>';
    $x .= '<div class="select_arrow"></div>';
    return $x;
}*/
function getHabitat() {
    $terms = get_terms( 'habitat' );
    echo '<select id="habitat" class="form_btn" name="habitat">';
    echo '<option value="" disabled selected hidden>HABITAT</option>';
    foreach ( $terms as $term ) {
        echo '<option value="' . $term->slug . '"';
        if(isset($_POST["habitat"]) && $_POST["habitat"] == $term->slug ) { echo " selected"; }
        echo '>' . $term->name . '</option>';    
    }
    echo '</select>';
    echo '<div class="select_arrow"></div>';
}