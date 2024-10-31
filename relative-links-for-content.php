<?php
/*
Plugin Name: Relative links for content
Plugin URI: www.visnevskis.com/blog/relativelinksforcontent/
Description: Makes links in NEWLY SAVED content dynamic (relaive to site directory). Allows content to survive domain or directory change. (Read warning!)
Version: 1.0
Author: Konstantins Visnevskis
Author URI: http://www.visnevskis.com
License: GPL v3

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, version 3.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
Konstantins Visnevskis 2012

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

function editor_home ($content) {
	$hmo = get_option('siteurl');
	$content = str_replace('[home]', $hmo, $content);
	return $content;
}
function editor_home_save ($content) {
	$hmo = get_option('siteurl');
	$content = str_replace('href=\"'.$hmo, 'href=\"[home]', $content);
	$content = str_replace('src=\"'.$hmo, 'src=\"[home]', $content);
	return $content;
}

add_filter('content_save_pre','editor_home_save',99);
add_filter('the_editor_content','editor_home',1);
add_filter('the_content','editor_home',1);
add_filter('the_content_rss','editor_home',1);
add_filter('the_content_feed','editor_home',1);
