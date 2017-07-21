<?php
    
/**
 * @package Find Your State Representatives
 */
/*
Plugin Name: Find Your Representatives
Plugin URI: https://wordpress.org/plugins/find-your-reps/
Description: This plugin finds your state representatives by street address and returns their 
names, photos, websites, email addresses and district and capitol office addresses. The plugin uses 
state representative data from openstates.org's API. The use of openstate.org's API requires a key 
from the Sunlight Foundation. A key can be acquired by registering at http://sunlightfoundation.com/api/accounts/register/. 
The key must be entered on the plugin's settings page.
Author: Kathleen Malone
Author Email: kathleenfmalone@gmail.com
Version: 1.2
Author URI: https://profiles.wordpress.org/kathleenfmalone/
*/

if (is_admin() ) {
    
    require_once( plugin_dir_path(__FILE__).'/includes/admin.php');
}

function fyr_scripts_method() {
		global $post;
	if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'fyr_find_state_reps') ) {
	wp_enqueue_script(
		'fyr_find_state_reps_script',
		plugins_url( '/js/fyr-find-state-reps.js' , __FILE__ ), false
	);

    wp_enqueue_script('googleapis', 
        'https://maps.googleapis.com/maps/api/js?sensor=false', false
    );
    wp_enqueue_script('googlegeocode', 
    'http://maps.googleapis.com/maps/api/geocode/output?json', false 
    );

    wp_enqueue_script( 'jquery' );

    fyr_define_javascript_vars();
    }
}

function fyr_define_javascript_vars() {

   //this function assigns the plugin option values to variables available in the javascript file, fyr-find-state-reps.js
   $fyr_plugin_options = get_option('fyr_plugin_options'); 
   wp_localize_script( 'fyr_find_state_reps_script', 'fyr_plugin_options_for_javascript', $fyr_plugin_options );
    
}

function fyr_styles_method() {
		global $post;	
	if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'fyr_find_state_reps') ) {
	
	$theme_file = get_stylesheet_directory() . '/fyr.css';
	$plugin_file = plugin_dir_path(__FILE__) . 'css/fyr.css';

	if ( @file_exists($theme_file) ) { // if fyr.css exists in theme directory use it
		wp_enqueue_style( 'fyr_find_state_reps_style', get_stylesheet_directory_uri() . "/fyr.css" );
	} elseif ( @file_exists($plugin_file) ) { // if custom fyr.css not in theme directory then use plugin version
		wp_enqueue_style( 'fyr_find_state_reps_style', plugins_url( 'css/fyr.css', __FILE__ ) );
	}
	}
}

function fyr_shortcode_find_state_reps(){

 ?>
        
<div class="fyr-wrap">

    <div id="fyr_find_reps">

        <h3 class="fyr-intro-message">Enter your address and we will find your state representatives. </h3><br>

        <form action="#" onsubmit="return fyr_get_state_rep_data(this);">
        
        <table>
        <tr><td>Street Address</td><td> <input id="fyr_street_address" type="text"></td></tr>
        <tr><td>City</td><td> <input id="fyr_city" type="text"></td></tr>
        <tr><td>State</td><td> <input id="fyr_state" type="text"></td></tr>
        <tr><td>Zipcode</td><td> <input id="fyr_zipcode" type="text"></td></tr>
        </table>

        <input class="fyr-submit-button" type="submit" value="Find" name="submit" />
        </form> 

    </div>

     <div id="fyr_map_canvas"></div>

</div>
        


<?php  
    
}
add_action( 'wp_enqueue_scripts', 'fyr_scripts_method' );
add_action( 'wp_enqueue_scripts', 'fyr_styles_method' );
add_shortcode('fyr_find_state_reps', 'fyr_shortcode_find_state_reps');


?>