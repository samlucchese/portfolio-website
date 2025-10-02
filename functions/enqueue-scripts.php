<?php
/**
 * Enqueue scripts and styles.
 */
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function samlucchese_assets() {

	// Core theme stylesheet (style.css)
	wp_enqueue_style( 'samlucchese-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'samlucchese-style', 'rtl', 'replace' );

	// Compiled theme CSS
	$main_css_rel = '/assets/styles/css/style.css';
	wp_enqueue_style(
		'samlucchese-main-style',
		get_template_directory_uri() . $main_css_rel,
		array( 'samlucchese-style' ),
		filemtime( get_template_directory() . $main_css_rel )
	);

	// _s navigation (existing)
	wp_enqueue_script(
		'samlucchese-navigation',
		get_template_directory_uri() . '/js/navigation.js',
		array(),
		_S_VERSION,
		true
	);
	
	// Swiper CSS
	wp_enqueue_style(
	  'swiper',
	  get_template_directory_uri() . '/assets/styles/vendor/swiper-bundle.min.css',
	  [],
	  filemtime(get_template_directory() . '/assets/styles/vendor/swiper-bundle.min.css')
	);
	
	// Swiper JS (global window.Swiper)
	wp_enqueue_script(
	  'swiper',
	  get_template_directory_uri() . '/assets/scripts/vendor/swiper-bundle.min.js',
	  [],
	  filemtime(get_template_directory() . '/assets/scripts/vendor/swiper-bundle.min.js'),
	  true
	);
	
	// Your script AFTER jQuery + Swiper
	wp_enqueue_script(
	  'samlucchese-custom',
	  get_template_directory_uri() . '/assets/scripts/custom.js',
	  ['jquery','swiper'],
	  filemtime(get_template_directory() . '/assets/scripts/custom.js'),
	  true
	);

	// Comment reply if needed
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// functions.php
	add_action('wp_enqueue_scripts', function () {
	  // --- Swiper v8 (CSS + JS) ---
	  wp_enqueue_style(
		'swiper',
		get_template_directory_uri() . '/assets/scripts/vendor/swiper-8/swiper-bundle.min.css',
		[],
		'8.4.7'
	  );
	
	
	//swiper v8
	  wp_enqueue_script(
		'swiper',
		get_template_directory_uri() . '/assets/scripts/vendor/swiper-8/swiper-bundle.min.js',
		[],
		'8.4.7',
		true
	  );
	
	  // Your init must depend on 'swiper'
	  wp_enqueue_script(
		'theme-custom',
		get_template_directory_uri() . '/assets/scripts/custom.js',
		['swiper', 'jquery'],
		filemtime(get_template_directory() . '/assets/scripts/custom.js'),
		true
	  );
	});
	
	
	
}
add_action( 'wp_enqueue_scripts', 'samlucchese_assets', 20 );
