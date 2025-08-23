<?php
/**
 * Global Styles: inject typography variables into :root
 */

add_action('wp_head', function () {
	// Fetch the Theme Settings singleton post
	$settings = get_posts([
		'post_type'      => 'theme_settings',
		'posts_per_page' => 1,
	]);
	if (!$settings) return;

	// Pull typography group
	$typography = get_field('typography', $settings[0]->ID);
	if (!$typography) return;
	?>
	
	
	
	<style>
		:root {
			/* Typography */
			--global-font-family: <?php echo ($typography['custom_body_font_family']); ?>;
			--global-header-font-family: <?php echo ($typography['custom_header_font_family']); ?>;
		}
	</style>
	
	
	<?php
});
