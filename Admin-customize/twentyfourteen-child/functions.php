<?php 

function wpt_admin_color_schemes() {
	
	$theme_dir = get_stylesheet_directory_uri();

	wp_admin_css_color( 
		'treehouse', __( 'Treehouse' ),
		$theme_dir . '/admin-colors/treehouse/colors.css',
		array( '#384047', '#5BC67B', '#838cc7', '#ffffff' )
	);
	
}
add_action('admin_init', 'wpt_admin_color_schemes');


function wpt_add_dashboard_widgets() {

  wp_add_dashboard_widget(
                 'wpt_welcome_dashboard_widget', // Widget slug.
                 'Welcome to Your Site!',        // Title.
                 'wpt_dashboard_widget_function' // Display function.
        );  
}
add_action( 'wp_dashboard_setup', 'wpt_add_dashboard_widgets' );


function wpt_dashboard_widget_function() {

  // Display whatever it is you want to show.
  echo "Hello World, I'm a great Dashboard Widget";
} 


function wpt_remove_menus(){
  
  //remove_menu_page( 'index.php' );                  //Dashboard
  //remove_menu_page( 'edit.php' );                   //Posts
  //remove_menu_page( 'upload.php' );                 //Media
  //remove_menu_page( 'edit.php?post_type=page' );    //Pages
  //remove_menu_page( 'edit-comments.php' );          //Comments
  
  //remove_menu_page( 'themes.php' );                 //Appearance
  //remove_menu_page( 'plugins.php' );                //Plugins
  //remove_menu_page( 'users.php' );                  //Users
  //remove_menu_page( 'tools.php' );                  //Tools
  //remove_menu_page( 'options-general.php' );        //Settings
  
}
add_action( 'admin_menu', 'wpt_remove_menus' );


?>