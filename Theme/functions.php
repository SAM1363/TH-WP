<?php 

add_theme_support('menus');
add_theme_support('post-thumbnails');

function wpt_excerpt_lenght($lenght) {
  return 16;
}
add_filter('excerpt_lenght', 'wpt_excerpt_lenght', 999);
function regitser_theme_menus(){
  register_nav_menus(
    array(
      'primary-menu' => _( 'Primary Menu')
    )
  );
}
add_action('init', 'register_theme_menus');


function wpt_create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="module-heading">',
		'after_title' => '</h2>'
	));

}

wpt_create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar' );
wpt_create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );


function wpt_theme_style() {
  wp_enqueue_style('foundation_css', get_template_directory_uri() .'/css/foundation.css');
  //wp_enqueue_style('normolize_css', get_template_directory_uri() .'/css/normolize.css');
  wp_enqueue_style('googlefont_css', 'http://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic');
  wp_enqueue_style('main_css', get_template_directory_uri() .'/css/style.css');
}
add_action('wp_enqueue_styles', 'wpt_theme_styles');

function wpt_theme_script(){
  wp_enqueue_scripts('modernizr_js', get_template_directory_uri() .'/js/modernizr.js', '', '', false );
  wp_enqueue_scripts('main_js', get_template_directory_uri() .'/js/app.js', array('jquery', 'foundation_js'), '', true );
  wp_enqueue_scripts('foundation_js', get_template_directory_uri() .'/js/foundation.min.js', array('jquery'), '', true ) ;
}
add_action('wp_enqueue_scripts', 'wpt_theme_js');

?> 

