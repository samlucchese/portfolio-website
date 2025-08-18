<?php 



function projects_cpt() {
	register_post_type('project', [
		'labels' => [
			'name' => 'Projects',
			'singular_name' => 'Project',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New Project',
			'edit_item' => 'Edit Project',
			'new_item' => 'New Project',
			'view_item' => 'View Project',
			'search_items' => 'Search Projects',
			'not_found' => 'No projects found',
		],
		'description' => 'Projects to showcase work in your portfolio.',
		'public' => true,
		'has_archive' => true,
		'rewrite' => ['slug' => 'projects'],
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-portfolio',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
	]);
}
add_action('init', 'projects_cpt');


// Main parent post type for layout templates
function cbd_layouts_templates() {
	register_post_type('cbd_layout_template', array(
		'labels' => array(
			'name'               => __('CBD Layouts and Templates', 'samlucchese'),
			'singular_name'      => __('CBD Layout or Template', 'samlucchese'),
			'all_items'          => __('All CBD Layouts and Templates', 'samlucchese'),
			'add_new'            => __('Add CBD Layout or Template', 'samlucchese'),
			'add_new_item'       => __('Add New CBD Layout or Template', 'samlucchese'),
			'edit_item'          => __('Edit CBD Layout or Template', 'samlucchese'),
			'new_item'           => __('New CBD Layout or Template', 'samlucchese'),
			'view_item'          => __('View CBD Layout or Template', 'samlucchese'),
			'search_items'       => __('Search CBD Layouts and Templates', 'samlucchese'),
			'not_found'          => __('No layouts found.', 'samlucchese'),
			'not_found_in_trash' => __('Nothing found in Trash.', 'samlucchese'),
		),
		'description'           => __('Reusable layout sections like footers, heroes, sidebars.', 'samlucchese'),
		'public'                => false,
		'publicly_queryable'    => false,
		'exclude_from_search'   => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'query_var'             => false,
		'menu_position'         => 8,
		'menu_icon'             => 'dashicons-category',
		'rewrite'               => false,
		'has_archive'           => false,
		'capability_type'       => 'post',
		'capabilities'          => array('create_posts' => 'do_not_allow'),
		'hierarchical'          => false,
		'show_in_rest'          => true,
		'supports'              => array('title', 'editor', 'revisions', 'custom-fields'),
	));
}
add_action('init', 'cbd_layouts_templates');


// Sub-type: Footer Templates
function footer() {
	register_post_type('footer', array(
		'labels' => array(
			'name'               => __('Footers', 'samlucchese'),
			'singular_name'      => __('Footer Template', 'samlucchese'),
			'all_items'          => __('All Footer Templates', 'samlucchese'),
			'add_new'            => __('Add Footer Template', 'samlucchese'),
			'add_new_item'       => __('Add New Footer Template', 'samlucchese'),
			'edit_item'          => __('Edit Footer Template', 'samlucchese'),
			'new_item'           => __('New Footer Template', 'samlucchese'),
			'view_item'          => __('View Footer Template', 'samlucchese'),
			'search_items'       => __('Search Footer Templates', 'samlucchese'),
			'not_found'          => __('No footers found.', 'samlucchese'),
			'not_found_in_trash' => __('Nothing found in Trash.', 'samlucchese'),
		),
		'description'         => __('Custom footer layouts for reuse.', 'samlucchese'),
		'public'              => false,
		'publicly_queryable'  => false,
		'exclude_from_search' => true,
		'show_ui'             => true,
		'show_in_menu'        => 'edit.php?post_type=cbd_layout_template',
		'query_var'           => false,
		'menu_icon'           => 'dashicons-table-row-after',
		'rewrite'             => false,
		'has_archive'         => false,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'show_in_rest'        => true,
		'supports'            => array('title', 'editor', 'revisions', 'custom-fields'),
	));
}
add_action('init', 'footer');


// Sub-type: Sidebar Templates
function sidebar() {
	register_post_type('sidebar', array(
		'labels' => array(
			'name'               => __('Sidebars', 'samlucchese'),
			'singular_name'      => __('Sidebar Template', 'samlucchese'),
			'all_items'          => __('All Sidebar Templates', 'samlucchese'),
			'add_new'            => __('Add Sidebar Template', 'samlucchese'),
			'add_new_item'       => __('Add New Sidebar Template', 'samlucchese'),
			'edit_item'          => __('Edit Sidebar Template', 'samlucchese'),
			'new_item'           => __('New Sidebar Template', 'samlucchese'),
			'view_item'          => __('View Sidebar Template', 'samlucchese'),
			'search_items'       => __('Search Sidebar Templates', 'samlucchese'),
			'not_found'          => __('No sidebars found.', 'samlucchese'),
			'not_found_in_trash' => __('Nothing found in Trash.', 'samlucchese'),
		),
		'description'         => __('Reusable sidebar sections.', 'samlucchese'),
		'public'              => false,
		'publicly_queryable'  => false,
		'exclude_from_search' => true,
		'show_ui'             => true,
		'show_in_menu'        => 'edit.php?post_type=cbd_layout_template',
		'query_var'           => false,
		'menu_icon'           => 'dashicons-align-left',
		'rewrite'             => false,
		'has_archive'         => false,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'show_in_rest'        => true,
		'supports'            => array('title', 'editor', 'revisions', 'custom-fields'),
	));
}
add_action('init', 'sidebar');


// Sub-type: Hello Bar Templates
function hello_bar() {
	register_post_type('hello_bar', array(
		'labels' => array(
			'name'               => __('Hello Bars', 'samlucchese'),
			'singular_name'      => __('Hello Bar Template', 'samlucchese'),
			'all_items'          => __('All Hello Bar Templates', 'samlucchese'),
			'add_new'            => __('Add Hello Bar Template', 'samlucchese'),
			'add_new_item'       => __('Add New Hello Bar Template', 'samlucchese'),
			'edit_item'          => __('Edit Hello Bar Template', 'samlucchese'),
			'new_item'           => __('New Hello Bar Template', 'samlucchese'),
			'view_item'          => __('View Hello Bar Template', 'samlucchese'),
			'search_items'       => __('Search Hello Bar Templates', 'samlucchese'),
			'not_found'          => __('No hello bars found.', 'samlucchese'),
			'not_found_in_trash' => __('Nothing found in Trash.', 'samlucchese'),
		),
		'description'         => __('Reusable Hello Bars (sitewide banners).', 'samlucchese'),
		'public'              => false,
		'publicly_queryable'  => false,
		'exclude_from_search' => true,
		'show_ui'             => true,
		'show_in_menu'        => 'edit.php?post_type=cbd_layout_template',
		'query_var'           => false,
		'menu_icon'           => 'dashicons-megaphone',
		'rewrite'             => false,
		'has_archive'         => false,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'show_in_rest'        => true,
		'supports'            => array('title', 'editor', 'revisions', 'custom-fields'),
	));
}
add_action('init', 'hello_bar');


?>