<?php
/**
 * fitcoach functions and definitions
 *
 * @package fitcoach
 */
 
 
/**
 * register the theme update
 */ 
require 'theme-updates/theme-update-checker.php';
$MyThemeUpdateChecker = new ThemeUpdateChecker(
'fitcoach', //Theme slug. Usually the same as the name of its directory.
'http://modernthemes.net/updates/?action=get_metadata&slug=fitcoach' //Metadata URL.
);


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'fitcoach_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fitcoach_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on fitcoach, use a find and replace
	 * to change 'fitcoach' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'fitcoach', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'class-image', 400, 200, array( 'center', 'center' ) );
	add_image_size( 'home-blog-image', 600, 300, array( 'center', 'center' ) );
	add_image_size( 'class-schedule', 600, 300, array( 'center', 'center' ) ); 

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'fitcoach' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	));

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );
	 */ 

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fitcoach_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // fitcoach_setup
add_action( 'after_setup_theme', 'fitcoach_setup' );

/**
 * Load Google Fonts.
 */
function load_fonts() {
            wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Oswald:400,300,700');
            wp_enqueue_style( 'googleFonts');
        }
    
    add_action('wp_print_styles', 'load_fonts'); 
	
/**
* Register and load font awesome CSS files using a CDN.
*
* @link http://www.bootstrapcdn.com/#fontawesome
* @author FAT Media 
*/
	
add_action( 'wp_enqueue_scripts', 'fitcoach_enqueue_awesome' );

function fitcoach_enqueue_awesome() {
wp_enqueue_style( 'fitcoach-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), '4.5.0' );  
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function fitcoach_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'fitcoach' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Class Sidebar', 'fitcoach' ),
		'id'            => 'sidebar-class',
		'description'   => __( 'This sidebar will appear on each individual class post.', 'fitcoach' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	//Register the sidebar widgets   
	register_widget( 'fitcoach_Video_Widget' );
	register_widget( 'fitcoach_Contact_Info' ); 
	
}
add_action( 'widgets_init', 'fitcoach_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fitcoach_scripts() {
	wp_enqueue_style( 'fitcoach-style', get_stylesheet_uri() );
	
	$headings_font = esc_html(get_theme_mod('headings_fonts'));
	$body_font = esc_html(get_theme_mod('body_fonts')); 
	
	if( $headings_font ) {
		wp_enqueue_style( 'fitcoach-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );	
	} else {
		wp_enqueue_style( 'fitcoach-oswald', '//fonts.googleapis.com/css?family=Oswald:400,300,700');  
	}	
	if( $body_font ) {
		wp_enqueue_style( 'fitcoach-body-fonts', '//fonts.googleapis.com/css?family='. $body_font );	
	} else {
		wp_enqueue_style( 'fitcoach-oswald-body', '//fonts.googleapis.com/css?family=Oswald:400,300,700');
	} 
	
	if ( file_exists( get_stylesheet_directory_uri() . '/inc/my_style.css' ) ) {
	wp_enqueue_style( 'fitcoach-mystyle', get_stylesheet_directory_uri() . '/inc/my_style.css', array(), false, false );
	} 
	
	if ( is_admin() ) {
    wp_enqueue_style( 'fitcoach-codemirror', get_stylesheet_directory_uri() . '/css/codemirror.css', array(), '1.0' ); 
	}

	wp_enqueue_script( 'fitcoach-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'fitcoach-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'fitcoach-slider', get_template_directory_uri() . '/js/jquery.sequence-min.js', array('jquery'), false, false );
	wp_enqueue_script( 'fitcoach-background-size', get_template_directory_uri() . '/js/jquery.backgroundSize.js', array('jquery'), false, true );
	wp_enqueue_script( 'fitcoach-codemirrorJS', get_template_directory_uri() . '/js/codemirror.js', array(), false, true);
	wp_enqueue_script( 'fitcoach-cssJS', get_template_directory_uri() . '/js/css.js', array(), false, true);
	wp_enqueue_script( 'fitcoach-placeholder', get_template_directory_uri() . '/js/jquery.placeholder.js', array('jquery'), false, true);
 	wp_enqueue_script( 'fitcoach-placeholdertext', get_template_directory_uri() . '/js/placeholdertext.js', array('jquery'), false, true);
	wp_enqueue_script( 'fitcoach-validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'), false, true);
	wp_enqueue_script( 'fitcoach-verify', get_template_directory_uri() . '/js/verify.js', array('jquery'), false, true); 
	wp_enqueue_script( 'fitcoach-scripts', get_template_directory_uri() . '/js/fitcoach.scripts.js', array(), false, true );
   
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if ( is_front_page() ) {
		wp_enqueue_script( 'fitcoach-sequence', get_template_directory_uri() . '/js/sequence.scripts.js', array(), false, true );
	}
}
add_action( 'wp_enqueue_scripts', 'fitcoach_scripts' );

/**
 * Load html5shiv
 */
function fitcoach_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'fitcoach_html5shiv' );  

/**
 * Change the excerpt length
 */
function fitcoach_excerpt_length( $length ) {
	
	$excerpt = get_theme_mod('exc_length', '30'); 
	return $excerpt; 

}

add_filter( 'excerpt_length', 'fitcoach_excerpt_length', 999 ); 

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
 * Include additional custom admin panel features. 
 */
require get_template_directory() . '/panel/functions-admin.php';
require get_template_directory() . '/panel/theme-admin_page.php'; 

/**
 * Google Fonts  
 */
require get_template_directory() . '/inc/gfonts.php';  

/**
 * Include additional custom features.
 */
require get_template_directory() . '/inc/my-custom-css.php';
require get_template_directory() . '/inc/socialicons.php';

/**
 * register your custom widgets
 */ 
require get_template_directory() . "/widgets/contact-info.php";
require get_template_directory() . "/widgets/video-widget.php";
require get_template_directory() . '/widgets/contact-form-widget.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Slider Post Type.
 */
function slider_post_type() { 

	$labels = array(
		'name'                => _x( 'Slider', 'Post Type General Name', 'fitcoach' ),
		'singular_name'       => _x( 'Slide', 'Post Type Singular Name', 'fitcoach' ),
		'menu_name'           => __( 'Slides', 'fitcoach' ),
		'parent_item_colon'   => __( 'Parent Item:', 'fitcoach' ),
		'all_items'           => __( 'All Slides', 'fitcoach' ),
		'view_item'           => __( 'View Slides', 'fitcoach' ),
		'add_new_item'        => __( 'Add New Slide', 'fitcoach' ),
		'add_new'             => __( 'Add New', 'fitcoach' ),
		'edit_item'           => __( 'Edit Slide', 'fitcoach' ),
		'update_item'         => __( 'Update Slide', 'fitcoach' ),
		'search_items'        => __( 'Search Slides', 'fitcoach' ),
		'not_found'           => __( 'Not found', 'fitcoach' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fitcoach' ),
	);
	$args = array(
		'label'               => __( 'slides', 'fitcoach' ),
		'description'         => __( 'Add a slide to your schedule.', 'fitcoach' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'taxonomies'          => array( 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'slider', $args );

}

// Hook into the 'init' action
add_action( 'init', 'slider_post_type', 0 );		
								
function slider_metaboxes( $meta_boxes ) {
    $prefix = '_sr_'; // Prefix for all fields
    $meta_boxes['slider_metabox'] = array(
        'id' => 'slider_metabox',
        'title' => 'Slide Settings',
        'pages' => array('slider'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
		
           	array(
    			'name' => __( 'Slide Description', 'fitcoach' ),
    			'id' => $prefix . 'slide_description',
    			'type' => 'text'
			),
			
			array(
   				'name' => __( 'URL', 'fitcoach' ),
    			'desc' => __( 'Enter the URL you would like to link to.', 'fitcoach' ), 
    			'id'   => $prefix . 'slider_url',
    			'type' => 'text_url',
    			'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
				), 
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'slider_metaboxes' );	

/**
 * Classes Post Type.
 */
function class_post_type() {

	$labels = array(
		'name'                => _x( 'Classes', 'Post Type General Name', 'fitcoach' ),
		'singular_name'       => _x( 'Class', 'Post Type Singular Name', 'fitcoach' ),
		'menu_name'           => __( 'Classes', 'fitcoach' ),
		'parent_item_colon'   => __( 'Parent Item:', 'fitcoach' ),
		'all_items'           => __( 'All Classes', 'fitcoach' ),
		'view_item'           => __( 'View Class', 'fitcoach' ),
		'add_new_item'        => __( 'Add New Class', 'fitcoach' ), 
		'add_new'             => __( 'Add New', 'fitcoach' ),
		'edit_item'           => __( 'Edit Class', 'fitcoach' ),
		'update_item'         => __( 'Update Class', 'fitcoach' ),
		'search_items'        => __( 'Search Classes', 'fitcoach' ),
		'not_found'           => __( 'Not found', 'fitcoach' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fitcoach' ),
	);
	$args = array(
		'label'               => __( 'classes', 'fitcoach' ),
		'description'         => __( 'Add a class to your schedule.', 'fitcoach' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'taxonomies'          => array( 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'classes', $args );

}

// Hook into the 'init' action
add_action( 'init', 'class_post_type', 0 );		
								
				

function class_metaboxes( $meta_boxes ) {
    $prefix = '_fc_'; // Prefix for all fields
    $meta_boxes['test_metabox'] = array(
        'id' => 'class_information',
        'title' => 'Class Information',
        'pages' => array('classes'), // post type
        'context' => 'normal', 
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
			
			array(
    			'name' => __( 'Description of Class', 'fitcoach' ),
    			'id' => $prefix . 'class_description',
    			'type' => 'textarea'
			),
			
			array(
    			'name' => __( 'Date of Class', 'fitcoach' ),
    			'id' => $prefix . 'class_date',
    			'type' => 'text_date'
			),
			
			array(
    			'name' => __( 'Day (For Weekly Classes)', 'fitcoach' ), 
    			'id' => $prefix . 'class_day', 
    			'type' => 'text'
			), 
			
			array(
    			'name' => __( 'Time of Class', 'fitcoach' ),
    			'id' => $prefix . 'class_time',
    			'type' => 'text'
			),
			
            array(
                'name' => __( 'Cost of Class', 'fitcoach' ),
                'id' => $prefix . 'class_cost',
                'type' => 'text_money'
            ),
			
            array(
                'name' => 'Location (Full Address)',
                'id' => $prefix . 'class_address',
                'type' => 'text'
            ),
			
            array(
                'name' => __( 'Google Map Link', 'fitcoach' ),
				'desc' => __( 'Enter the embed URL of a custom google map.<br />You can generate it <a href="https://www.google.com/maps/">here</a>. For instructions, click <a href="https://support.google.com/maps/answer/3544418?hl=en">here</a>.', 'fitcoach' ),
                'id' => $prefix . 'class_map',
                'type' => 'textarea_code'
            ),
		
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'class_metaboxes' ); 

// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'cmb/init.php' );
    }
}