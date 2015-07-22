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

add_shortcode('map' , 'awp_dymaminmap' );

$awp_maps_array = array();

function awp_dymaminmap ($atts)

{
	global $awp_maps_array;
	
	$atts = shortcode_atts( 
		array(
				'cords1' => 50.6338664,
				'cords2' => 30.9158387,
				'zoom'   =>8
			), $atts , 'map'
	);
	
	extract($atts);
	print_r($atts); 	
	$awp_maps_array = array(
		'zoom' => $zoom,
		'cords1' => $cords1,
		'cords2' => $cords2
	);
	add_action('wp_footer', 'awp_scripts_styles' );

	return '<div id="map-canvas" style="width:300px; height:300px;"></div>';
}



function  awp_scripts_styles ()

{
		global $awp_maps_array;
		wp_register_script('awp_maps_google' , 'https://maps.googleapis.com/maps/api/js?sensor=false');
		wp_register_script( 'awp_dymaminmap', plugins_url('awp-maps-dynamic.js', __FILE__ ) );

		wp_enqueue_script('awp_maps_google' );
		wp_enqueue_script('awp_dymaminmap' );

		wp_localize_script('awp_dymaminmap' ,  'awpobj' , $awp_maps_array);
}

?>