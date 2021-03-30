<?php

function add_theme_scripts()


{
  wp_enqueue_style('style', get_stylesheet_uri());

  wp_enqueue_style('style-css', get_template_directory_uri() . "/css/styles.css", array(), '1.1', 'all');

  wp_enqueue_script('js-jquery', get_template_directory_uri() . "/assets/mail/jqBootstrapValidation.js", array('jquery'), 1.1, true);

  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . "/assets/lib/bootstrap/js/bootstrap.bundle.min.js", array('jquery'), 1.1, true);

  wp_enqueue_script('contact-js', get_template_directory_uri() . "/assets/mail/contact_me.js", array('jquery'), 1.1, true);

  wp_enqueue_script('script-js', get_template_directory_uri() . "/js/scripts.js", array('jquery'), 1.1, true);
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

add_theme_support('widgets');

register_sidebar(array(
  'name' => 'Footer  1',
  'id' => 'footer-1',
  'description' => 'Appears in the footer area',
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
));
register_sidebar(array(
  'name' => 'Footer 2',
  'id' => 'footer-2',
  'description' => 'Appears in the footer area',
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
));

register_nav_menus(array(
  'main_menu' => 'Top Menu',

));
function service_setup_post_type()
{
  $args = array(
    'public'    => true,
    'label'     => __('Services', 'textdomain'),
    'menu_icon' => 'dashicons-book',
    
  );
  register_post_type('service', $args);
}
add_action('init', 'service_setup_post_type');

function register_navwalker()
{
  require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

add_theme_support('post-thumbnails');
add_post_type_support( 'service', 'thumbnail' );
add_theme_support( 'custom-logo' );

function agency_custom_logo_setup() {
  $defaults = array(
      'height'               => 100,
      'width'                => 400,
      'flex-height'          => true,
      'flex-width'           => true,
      'header-text'          => array( 'site-title', 'site-description' ),
      'unlink-homepage-logo' => true, 
  );

  add_theme_support( 'custom-logo', $defaults );
}

add_action( 'after_setup_theme', 'agency_custom_logo_setup' );

function for_shortcode()
{


  add_shortcode('company', 'agency');
}
function agency()
{
?>

  <header class="masthead">
    <div class="container">
      <div class="masthead-subheading">Welcome To Our Studio!</div>
      <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
      <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
    </div>
  </header>

<?php


}
add_action('init', 'for_shortcode');
