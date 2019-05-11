<?php

/*
 *	Plugin Name: Official Treehouse Badges Plugin
 *	Plugin URI: http://wptreehouse.com/wptreehouse-badges-plugin/
 *	Description: Provides both widgets and shortcodes to help you display your Treehouse profile badges on your website.  The official Treehouse badges plugin.
 *	Version: 1.0
 *	Author: Zac Gordon
 *	Author URI: http://wp.zacgordon.com
 *	License: GPL2
 *
*/

/* add a link to my plugin admin menu */

function my_menu(){
  /* use add_options_page function,  */
  /* add_option_page($page_title, $menu_title, $capability, $menu_slug, $function ) */
}
add_option_page(
  'my_super_plugin',
  'the_menu',
  'mana_geoptions',
  'my_super_option_page'
);
add_action('admin_menu', 'my_menu');

function my_super_option_page(){
  if(!current_user_can('manage_options')){
    wp_die('sorry no access');
  }
  echo '<p>welcome to my website</p>';
}
?>
<!-- for widjets -->
<?php

	class My_Plugin_Widget extends WP_Widget {
		
		function my_plugin_widget() {
			parent::__construct( false, 'My Plugin Widget' );
		}

		function widget( $args, $instance ) {
			extract( $args );
			$title = apply_filters( 'widget_title' , $instance['title'] );
      $num_courses = $instance['num_courses'];

      require( 'inc/widget-front-end.php' );

		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
      $instance['num_courses'] = strip_tags($new_instance['num_courses']);

			return $instance;
		}

		function form( $instance ) {
			$title = esc_attr($instance['title']);
			$num_courses = esc_attr($instance['num_courses']);


			require( 'inc/widget-fields.php' );
		}

	}

	function my_plugin_register_widgets() {
		register_widget( 'My_Plugin_Widget' );
	}

	add_action( 'widgets_init', 'my_plugin_register_widgets' );

?>

<!-- short code for plugin -->
<?php
  function my_plugin_shortcode ($atts , $content= null ) { 
	global $post;
   extract(shortcode_atts( array(
        'num_courses' => '4'
      ), $atts));
    };
	ob_start();
  	require('inc/front-end.php');
	$content=ob_get_clean();
  add_shortcode('my_plugin_shortcode_name', 'my_plugin_shortcode');
?>



<?php
function my_plugin_enable_ajax() {
?>

    <script>
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';  
    </script>
<?php
}


function my_plugin_frontend_scripts(){
  
wp_enqueue_style('my_plugin_frontend_css', plugins_url('my-plugin/css/front-end.css'));
wp_enqueue_script( 'my_plugin_frontend_js', plugins_url( 'my-plugin/js/front-end.js' ), array('jquery'), '', true );
}
add_action('wp_enqueue_scripts', 'my_plugin_frontend_scripts');
add_action( 'wp_head', 'my_plugin_enable_ajax' );

?>