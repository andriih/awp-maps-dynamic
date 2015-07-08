<?php


/*
Plugin Name: AWP Google мапи динамічні
Description: AWP Google мапи динамічні
Plugin URI: http://#
Author: Andrew
Author URI: http://#
Version: 1.0
License: GPL2
Text Domain: Text Domain
Domain Path: Domain Path
*/

add_filter('the_content', 'awp_dymaminmap' );
add_action('wp_enqueue_scripts', 'awp_scripts_styles' );
function awp_dymaminmap ($content)
{
	return $content= '<div id="map-canvas" style="width: 300px; height:400px"></div>';
}

function  awp_scripts_styles ()
{
		wp_register_script('awp_maps_google' , 'https://maps.googleapis.com/maps/api/js?sensor=false');
		wp_register_script( 'awp_dymaminmap', plugins_url('awp-maps-dynamic.js', __FILE__ ) );

		wp_enqueue_script('awp_maps_google' );
		wp_enqueue_script('awp_dymaminmap' );
}

?>