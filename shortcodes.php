<?php
/*
Plugin Name: WP Shortcodes
Plugin URI: https://github.com/patproct/WP-Shortcodes
Description: This is a simple WordPress plugin with some simple WordPress shortcodes.
Version: 0.1
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

add_action('wp_head', function() { echo 'shortcodes, yeah!'; });
add_action('loop_start', array('IUShortcodes', 'generate_shortcode'));
// add_shortcode("googlemap", "fn_googleMaps");

if ( !class_exists('IUShortcodes') ) {
	/**
	* IU Shortcodes
	*/
	class IUShortcodes {
		$width = 550;
		$height = 315;
		$embed_codes = array(
			'<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed" class="googlemap"></iframe><small class="googlemaplink"><a href="'. $src .'" target="_blank" title="View a larger version of this map">View larger map</a></small>', // Google Maps
			'<iframe src="http://vimeo.com/36684976" width="" height="" frameborder="0"></iframe>'
		);
		
		function generate_shortcode($atts, $content = null) {
			extract(shortcode_atts(array(
				"width" => '425',
				"height" => '550',
				"src" => ''
			), $atts));

			return ($src) ? '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed" class="googlemap"></iframe><small class="googlemaplink"><a href="'. $src .'" target="_blank" title="View a larger version of this map">View larger map</a></small>' : false;
		}
	}
}
?>
