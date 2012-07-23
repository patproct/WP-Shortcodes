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

function vimeo_shortcode($atts) {
	extract(shortcode_atts(array(
		"width" => '550',
		"height" => '315',
		"src" => ''
	), $atts));

	return '<iframe src="http://player.vimeo.com/video/'.$src.'?color=ffffff" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
	// return '<iframe src="'.$src.'" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe>';
}
add_shortcode('vimeo', 'vimeo_shortcode');
?>
