<?php 
/**
 * Enqueue scripts and styles.
 */
function samlucchese_scripts() {
	wp_enqueue_style( 'samlucchese-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'samlucchese-style', 'rtl', 'replace' );

	wp_enqueue_script( 'samlucchese-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'samlucchese_scripts' );


function samlucchese_enqueue_styles() {
	wp_enqueue_style(
		'samlucchese-main-style',
		get_template_directory_uri() . '/assets/styles/css/style.css',
		[],
		filemtime(get_template_directory() . '/assets/styles/css/style.css')
	);
}
add_action('wp_enqueue_scripts', 'samlucchese_enqueue_styles');


 
 
