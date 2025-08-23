<?php 

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title'  => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'  => false
	));
}

function setup_theme_colors() {
	add_theme_support('editor-color-palette', array(
		array(
			'name'  => __('Primary', 'samlucchese'),
			'slug'  => 'primary',
			'color' => '#0055ff',
		),
		array(
			'name'  => __('Secondary', 'samlucchese'),
			'slug'  => 'secondary',
			'color' => '#ff4081',
		),
		array(
			'name'  => __('Light Gray', 'samlucchese'),
			'slug'  => 'light-gray',
			'color' => '#eeeeee',
		),
	));
}
add_action('after_setup_theme', 'setup_theme_colors');
