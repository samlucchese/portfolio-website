<?php
if ( ! defined( '_S_VERSION' ) ) {
  define( '_S_VERSION', '1.0.0' );
}

function samlucchese_assets() {
  // -----------------------------
  // Base theme CSS
  // -----------------------------
  wp_enqueue_style( 'samlucchese-style', get_stylesheet_uri(), [], _S_VERSION );
  wp_style_add_data( 'samlucchese-style', 'rtl', 'replace' );

  $main_css_rel = '/assets/styles/css/style.css';
  wp_enqueue_style(
	'samlucchese-main-style',
	get_template_directory_uri() . $main_css_rel,
	['samlucchese-style'],
	filemtime( get_template_directory() . $main_css_rel )
  );

  // -----------------------------
  // Remove any Swiper registered by plugins/themes
  // -----------------------------
  wp_dequeue_style('swiper');
  wp_deregister_style('swiper');
  wp_dequeue_script('swiper');
  wp_deregister_script('swiper');

  // =====================================================
  // ✅ Swiper v8 (CURRENTLY ACTIVE)
  // =====================================================
  wp_enqueue_style(
	'swiper8',
	get_template_directory_uri() . '/assets/styles/vendor/swiper-8/swiper-bundle.min.css',
	[],
	'8.4.7'
  );

  wp_enqueue_script(
	'swiper8',
	get_template_directory_uri() . '/assets/scripts/vendor/swiper-8/swiper-bundle.min.js',
	[],
	'8.4.7',
	true
  );

  // =====================================================
  // 🔄 Swiper v12 (SWITCH BACK BY UNCOMMENTING THIS BLOCK)
  // =====================================================
  /*
  wp_enqueue_style(
	'swiper12',
	get_template_directory_uri() . '/assets/styles/vendor/swiper-bundle.min.css',
	[],
	'12.0.2'
  );

  wp_enqueue_script(
	'swiper12',
	get_template_directory_uri() . '/assets/scripts/vendor/swiper-bundle.min.js',
	[],
	'12.0.2',
	true
  );
  */

  // -----------------------------
  // Your custom JS (depends on swiper)
  // -----------------------------
  wp_enqueue_script(
	'samlucchese-custom',
	get_template_directory_uri() . '/assets/scripts/custom.js',
	['jquery','swiper8'], // change to swiper12 if you switch
	filemtime( get_template_directory() . '/assets/scripts/custom.js' ),
	true
  );

  // -----------------------------
  // _s navigation
  // -----------------------------
  wp_enqueue_script(
	'samlucchese-navigation',
	get_template_directory_uri() . '/js/navigation.js',
	[],
	_S_VERSION,
	true
  );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'samlucchese_assets', 99 );
