<?php
// Theme Functions

/* Remove Admin Bar from Frontend */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar(){
  show_admin_bar(false);
}

if (function_exists('add_theme_support')){
  // Add Menu Support
  add_theme_support('menus');

  // Add Thumbnail Theme Support
  add_theme_support('post-thumbnails');
  add_image_size('large', 700, '', true);  		// Large Thumbnail
  add_image_size('medium', 250, '', true); 		// Medium Thumbnail
  add_image_size('small', 125, '', true);  		// Small Thumbnail
  add_image_size('custom-size', 700, 200, true);  // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

  // Enables post and comment RSS feed links to head
  add_theme_support('automatic-feed-links');
}

add_action('after_setup_theme', 'wpt_setup');
if(!function_exists('wpt_setup')):
  function wpt_setup() {
    register_nav_menu('primary', __('Primary Navigation', 'wptmenu'));
  }
endif;

function wpt_register_js(){
  if( !is_admin()){
    wp_deregister_script('jquery');

		wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.3.1.min.js', 'jquery', '', true);
    wp_enqueue_script('jquery.popper.min', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', 'jquery', '', true);
    wp_enqueue_script('jquery.bootstrap.min', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', 'jquery', '', true);
    wp_enqueue_script('aos.min', '//unpkg.com/aos@next/dist/aos.js', 'jquery', '', true);
    wp_enqueue_script('fontawesome_cdn.min', '//kit.fontawesome.com/0af1bf54c5.js', 'jquery', '', true);
    wp_enqueue_script('swiper.min', '//unpkg.com/swiper@8/swiper-bundle.min.js', 'jquery', '', true);
		wp_enqueue_script(
     	'jquery.extras.min',
     	get_template_directory_uri() . '/assets/js/main.min.js?v='.filemtime(get_template_directory() . '/assets/js/main.min.js'),
      array('jquery'),
      filemtime(get_template_directory(). '/assets/js/main.min.js'),
    	true
    );
  }
}

function wpt_register_css(){
	wp_enqueue_style('bootstrap.min', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
  wp_enqueue_style('aos.min', '//unpkg.com/aos@next/dist/aos.css');
  wp_enqueue_style('swiper.min', '//unpkg.com/swiper@8/swiper-bundle.min.css');
  wp_enqueue_style(
    'main.min',
    get_template_directory_uri() . '/assets/css/main.min.css?v='.filemtime(get_template_directory().'/assets/css/main.min.css'),
    'all'
  );
}
add_action('init','wpt_register_js');
add_action('wp_enqueue_scripts', 'wpt_register_css');

// Custom Post Types
add_action('init','create_post_type');
function create_post_type(){
  register_post_type('projects', array(
	  'label' => __('Projects'),
    'singular_label' => __('Project'),
    'public' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'hierarchical' => true,
    'rewrite' => array('slug' => 'projects'),
    'supports' => array('title','author','excerpt','thumbnail','order','page-attributes','editor'),
    'menu_position' => 16,
    'has_archive' => true,
    'menu_icon' => 'dashicons-admin-home'
  ));
}

// Add Class to Images posted on pages
function add_responsive_class($content){
  $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
  $document = new DOMDocument();
  libxml_use_internal_errors(true);
  $document->loadHTML(utf8_decode($content));

  $imgs = $document->getElementsByTagName('img');
  foreach($imgs as $img){
    $existing_class = $img->getAttribute('class');
    $img->setAttribute('class', 'img-fluid ' . $existing_class);
  }
  $html = $document->saveHTML();
	      return $html;
}
add_filter('the_content', 'add_responsive_class');

?>
