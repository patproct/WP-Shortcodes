<?php
/*
Plugin Name: WP Shortcodes
Plugin URI: https://github.com/patproct/WP-Shortcodes
Description: This is a simple WordPress plugin with some simple WordPress shortcodes.
Version: 0.1.2
Author: Patrick Proctor
Author URI: http://patrickjproctor.com/
License: GPL2

Copyright (C) 2011 Patrick John Proctor

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

$global_width = '480';
$global_height = '315';
$global_src = '';
$embed_services = array('googlemaps','vimeo','youtube');

function vimeo_shortcode($atts) {
	global $global_width;
	global $global_height;
	extract(shortcode_atts(array(
		"width" => $global_width,
		"height" => $global_height,
		"src" => ''
	), $atts));
	return ($src) ? '<p><iframe src="http://player.vimeo.com/video/'.$src.'" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></p>' : false;
}
function googlemaps_shortcode($atts) {
	global $global_width;
	global $global_height;
	extract(shortcode_atts(array(
		"width" => $global_width,
		"height" => $global_height,
		"src" => ''
	), $atts));
	return ($src) ? '<p><iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&output=embed" class="googlemap"></iframe><small class="googlemaplink"><a href="'. $src .'" target="_blank" title="View a larger version of this map">View larger map</a></small>' : false;
}
function youtube_shortcode($atts) {
	global $global_width;
	global $global_height;
	extract(shortcode_atts(array(
		"width" => $global_width,
		"height" => $global_height,
		"src" => ''
	), $atts));
	// return ($src) ? '<p><iframe src="http://www.youtube.com/embed/'.$src.'?fs=1&feature=oembed" frameborder="0" allowfullscreen></iframe></p>' : false;
	return ($src) ? '<p><iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$src.'" frameborder="0" allowfullscreen></iframe></p>' : false;
}

function print_services() {
	global $embed_services;
	foreach ($embed_services as $embed_service) {
		$function_name = $embed_service.'_shortcode';
		if (function_exists($function_name)) { add_shortcode($embed_service, $function_name); }
	}
}

function theme_styles() {
	// Register the styule like this for a theme:
	// (First the unique name for the style (custom-style) then the src,
	// then dependencies and ver no. and media type)
	wp_register_style( 'maps-sc', plugin_dir_url(__FILE__) . 'maps-sc.css' );
	
	// enqueing:
	wp_enqueue_style( 'maps-sc' );
}

add_action('loop_start', 'print_services');
add_action('wp_enqueue_scripts', 'theme_styles');

add_shortcode("googlemap", "googlemaps_shortcode");
?>
