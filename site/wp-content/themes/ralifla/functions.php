<?php

// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
	$content_width = 990;


// Register Theme Features
function ralifla_features()  {

	// Add theme support for Post Formats
	add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat' ) );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );

	 // Set custom thumbnail dimensions
	set_post_thumbnail_size( 360, 220, true );

	// Add theme support for Custom Background
	$background_args = array(
		'default-color'          => '#fafafa',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-background', $background_args );
}
add_action( 'after_setup_theme', 'ralifla_features' );


// Register Menu
function ralifla_menus() {
  register_nav_menus(
    array(
      'header' => __( 'Principal Menu' ),
    )
  );
}
add_action( 'init', 'ralifla_menus' );


// Register Widgets Area
if (function_exists('register_sidebar')) {

  register_sidebar( array(
    'name'          => 'Blog',
    'id'            => 'r-blog',
    'description'   => 'Espaço lateral do blog',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="entry-widget-title">',
    'after_title'   => '</h5>',
  ) );

  register_sidebar( array(
    'name'          => 'Footer 1',
    'id'            => 'r-footer-1',
    'description'   => 'Menu Insititucional.',
    'before_widget' => '<div id="%1$s" class="widget-footer col-3">',
    'after_widget'  => '</div>',
    'before_title'  => '<h6 class="footer-widget-title">',
    'after_title'   => '</h6>',
  ) );

    register_sidebar( array(
    'name'          => 'Footer 2',
    'id'            => 'r-footer-2',
    'description'   => 'Menu Dúvidas.',
    'before_widget' => '<div id="%1$s" class="widget-footer col-3">',
    'after_widget'  => '</div>',
    'before_title'  => '<h6 class="footer-widget-title">',
    'after_title'   => '</h6>',
  ) );

  register_sidebar( array(
    'name'          => 'Footer 3',
    'id'            => 'r-footer-3',
    'description'   => 'Contatos.',
    'before_widget' => '<div id="%1$s" class="widget-footer col-3">',
    'after_widget'  => '</div>',
    'before_title'  => '<h6 class="footer-widget-title">',
    'after_title'   => '</h6>',
  ) );

  register_sidebar( array(
    'name'          => 'Footer 4',
    'id'            => 'r-footer-4',
    'description'   => 'Palavra do presidente.',
    'before_widget' => '<div id="%1$s" class="widget-footer col-3">',
    'after_widget'  => '</div>',
    'before_title'  => '<h6 class="footer-widget-title">',
    'after_title'   => '</h6>',
  ) );

}
add_action( 'widgets_init', 'register_sidebar');


// Register Style
function ralifla_styles() {
	wp_enqueue_style( 'ralifla', get_stylesheet_uri(), false);
	wp_deregister_style( 'login' );
	wp_register_style( 'login', '', false, '0.0.1' );
	wp_enqueue_style( 'login' );
}

function ralifla_script() {
  wp_enqueue_script('jquery'); 
  wp_enqueue_script('masonry');

  wp_enqueue_script('validatejs', 'https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js', array( 'jquery', 'addtionaljs' ), '', true);
  wp_enqueue_script('addtionaljs', 'https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js', array( 'jquery' ), '', true);
  wp_enqueue_script('maskedinputjs', get_template_directory_uri() . '/js/maskedinput.min.js', array( 'jquery' ), '', true);

  wp_enqueue_script('formjs', get_template_directory_uri() . '/js/cadastro.js', array( 'jquery', 'validatejs' ), '', true);
	wp_enqueue_script('raliflajs', get_template_directory_uri() . '/js/ralifla.js', array( 'jquery' ), '', true);
    
  wp_enqueue_script('fontawesome','//use.fontawesome.com/3eb69dd99b.js', '', '', false);
}

add_action( 'wp_enqueue_scripts', 'ralifla_styles' );
add_action( 'wp_enqueue_scripts', 'ralifla_script' );




//Excerpt Posts Lenght
function ralifla_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'ralifla_excerpt_length', 999 );


//Pagination
function wp_pagination() { 
  global $wp_query;

  $big = 999999999; 
 
  echo paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'prev_next'          => true,
    'prev_text'          => __('<i class="fa fa-chevron-left" aria-hidden="true"></i>'),
    'next_text'          => __('<i class="fa fa-chevron-right" aria-hidden="true"></i>'),
    'current' => max( 1, get_query_var('paged') ),
    'total' => $wp_query->max_num_pages,
  ) );
}

// Remove pages from search
add_filter( 'pre_get_posts', 'bg_search_exclude' );
function bg_search_exclude($query) {
  if ($query->is_search) {
    $query->set('post_type', array('page', 'post'));
    $query->set('cat', '-5');
    $query->set('post__not_in', array(111));
  }
  return $query;
}

// Copyright
function ralifla_copyright() {
	global $wpdb;
	
	$copyright_dates = $wpdb->get_results("
		SELECT
			YEAR(min(post_date_gmt)) AS firstdate,
			YEAR(max(post_date_gmt)) AS lastdate
		FROM
			$wpdb->posts
		WHERE
			post_status = 'publish'
	");
	
	$output = '';
	
	if($copyright_dates) {
		$copyright = "&copy; 1985-" . $copyright_dates[0]->firstdate;
	
		if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
			$copyright .= '-' . $copyright_dates[0]->lastdate;
		}
	
		$output = $copyright;
	}
	
	return $output;
}

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
?>