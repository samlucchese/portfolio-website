<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package samlucchese
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
	
	<?php // Register site fonts currently loading from /assets/fonts/ testing performance via local vs external request    
	$typography = get_the_field('typography'); // returns the whole group as an array
	
	if (!empty($typography['custom_font_link'])): ?>
	  <link rel="preload" href="<?php echo esc_url($typography['custom_font_link']); ?>" as="style" onload="this.rel='stylesheet'">
	  <noscript><link rel="stylesheet" href="<?php echo esc_url($typography['custom_font_link']); ?>"></noscript>
	<?php endif; ?>

	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
	
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'samlucchese' ); ?></a>
	
	<header class="site-header">
		<div class="nav-wrap">
			<div class="site-branding">
				<?php if ( get_the_field('logo') ) : 
					$logo = get_the_field('logo'); ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="site-logo" src="<?php echo $logo['url']; ?>"></a>
				<?php else : ?>
				  <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
				<?php endif; ?>
			</div><!-- .site-branding -->
			
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'samlucchese' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->


