<?php 

add_action('after_setup_theme', function () {
	// Get the colors group from Theme Settings singleton
	$colors = get_the_field('colors');

	// Fallbacks if empty (so editor doesn't break)
	$header_font_color = $colors['header_font_color']     ?? '#005177';
	$body_font_color = $colors['body_font_color']     ?? '#005177';
	$links_font_color = $colors['links_font_color']     ?? '#005177';
	$links_font_color_hover = $colors['links_font_color_hover']     ?? '#005177';
	$primary   = $colors['primary_color']       ?? '#0073aa';
	$primary_color_light   = $colors['primary_color_light']       ?? '#0073aa';
	$primary_color_dark   = $colors['primary_color_dark']       ?? '#0073aa';
	$secondary = $colors['secondary_color']     ?? '#005177';
	$secondary_color_light = $colors['secondary_color_light']     ?? '#005177';
	$secondary_color_dark = $colors['secondary_color_dark']     ?? '#005177';
	$accent_color_1 = $colors['accent_color_1'] ?? '#ffffff';
	$accent_color_2 = $colors['accent_color_2'] ?? '#ffffff';
	$accent_color_3 = $colors['accent_color_3'] ?? '#ffffff';
	$light_accent_color_1 = $colors['light_accent_color_1'] ?? '#ffffff';
	$light_accent_color_2 = $colors['light_accent_color_2'] ?? '#ffffff';
	$light_accent_color_3 = $colors['light_accent_color_3'] ?? '#ffffff';
	
	
	
	add_theme_support('editor-color-palette', [
		[
			'name'  => esc_attr__('Header Font Color', 'themeLangDomain'),
			'slug'  => 'header-font-color',
			'color' => $header_font_color,
		],
		[
			'name'  => esc_attr__('Body Font Color', 'themeLangDomain'),
			'slug'  => 'body-font-color',
			'color' => $body_font_color,
		],
		[
			'name'  => esc_attr__('Links Font Color', 'themeLangDomain'),
			'slug'  => 'links-font-color',
			'color' => $links_font_color,
		],
		[
			'name'  => esc_attr__('Links Font Color Hover', 'themeLangDomain'),
			'slug'  => 'links-font-color-hover',
			'color' => $links_font_color_hover,
		],
		[
			'name'  => esc_attr__('Primary Color', 'themeLangDomain'),
			'slug'  => 'primary-color',
			'color' => $primary,
		],
		[
			'name'  => esc_attr__('Primary Color Light', 'themeLangDomain'),
			'slug'  => 'primary-color-light',
			'color' => $primary_color_light,
		],
		[
			'name'  => esc_attr__('Primary Color Dark', 'themeLangDomain'),
			'slug'  => 'primary-color-dark',
			'color' => $primary_color_dark,
		],
		[
			'name'  => esc_attr__('Secondary Color', 'themeLangDomain'),
			'slug'  => 'secondary-color',
			'color' => $secondary,
		],
		[
			'name'  => esc_attr__('Secondary Color Light', 'themeLangDomain'),
			'slug'  => 'secondary-color-light',
			'color' => $secondary_color_light,
		],
		[
			'name'  => esc_attr__('Secondary Color Dark', 'themeLangDomain'),
			'slug'  => 'secondary-color-dark',
			'color' => $secondary_color_dark,
		],
		[
			'name'  => esc_attr__('Accent Color 1', 'themeLangDomain'),
			'slug'  => 'accent-color-1',
			'color' => $accent_color_1,
		],
		[
			'name'  => esc_attr__('Accent Color 2', 'themeLangDomain'),
			'slug'  => 'accent-color-2',
			'color' => $accent_color_2,
		],
		[
			'name'  => esc_attr__('Accent Color 3', 'themeLangDomain'),
			'slug'  => 'accent-color-3',
			'color' => $accent_color_3,
		],
		[
			'name'  => esc_attr__('Light Accent Color 1', 'themeLangDomain'),
			'slug'  => 'light-accent-color-1',
			'color' => $light_accent_color_1,
		],
		[
			'name'  => esc_attr__('Light Accent Color 2', 'themeLangDomain'),
			'slug'  => 'light-accent-color-2',
			'color' => $light_accent_color_2,
		],
		[
			'name'  => esc_attr__('Light Accent Color 3', 'themeLangDomain'),
			'slug'  => 'light-accent-color-3',
			'color' => $light_accent_color_3,
		],
		[
			'name'  => esc_attr__('Black', 'themeLangDomain'),
			'slug'  => 'black',
			'color' => '#000000',
		],
		[
			'name'  => esc_attr__('White', 'themeLangDomain'),
			'slug'  => 'white',
			'color' => '#ffffff',
		],
	]);
});


// Output ACF colors as CSS variables
add_action('wp_head', function () {
	$colors = get_the_field('colors');
	if (!$colors) return;

	// Define variables (same fallbacks you used above)
	$vars = [
		'header-font-color'       => $colors['header_font_color']       ?? '#005177',
		'body-font-color'         => $colors['body_font_color']         ?? '#005177',
		'links-font-color'        => $colors['links_font_color']        ?? '#005177',
		'links-font-color-hover'  => $colors['links_font_color_hover']  ?? '#005177',
		'primary-color'           => $colors['primary_color']           ?? '#0073aa',
		'primary-color-light'     => $colors['primary_color_light']     ?? '#0073aa',
		'primary-color-dark'      => $colors['primary_color_dark']      ?? '#0073aa',
		'secondary-color'         => $colors['secondary_color']         ?? '#005177',
		'secondary-color-light'   => $colors['secondary_color_light']   ?? '#005177',
		'secondary-color-dark'    => $colors['secondary_color_dark']    ?? '#005177',
		'accent-color-1'          => $colors['accent_color_1']          ?? '#ffffff',
		'accent-color-2'          => $colors['accent_color_2']          ?? '#ffffff',
		'accent-color-3'          => $colors['accent_color_3']          ?? '#ffffff',
		'light-accent-color-1'    => $colors['light_accent_color_1']    ?? '#ffffff',
		'light-accent-color-2'    => $colors['light_accent_color_2']    ?? '#ffffff',
		'light-accent-color-3'    => $colors['light_accent_color_3']    ?? '#ffffff',
	];

	echo "<style>:root {";
	foreach ($vars as $name => $value) {
		echo "--{$name}: {$value};";
	}
	echo "}</style>";
});


add_action('acf/save_post', function ($post_id) {
	// Only run on your Theme Settings post type
	if (get_post_type($post_id) !== 'theme_settings') {
		return;
	}

	$colors = get_field('colors', $post_id);
	if (!$colors) return;

	$scss  = "// Auto-generated SCSS variables from Theme Settings\n";

	$map = [
		'header_font_color'      => 'header-font-color',
		'body_font_color'        => 'body-font-color',
		'links_font_color'       => 'links-font-color',
		'links_font_color_hover' => 'links-font-color-hover',
		'primary_color'          => 'primary-color',
		'primary_color_light'    => 'primary-color-light',
		'primary_color_dark'     => 'primary-color-dark',
		'secondary_color'        => 'secondary-color',
		'secondary_color_light'  => 'secondary-color-light',
		'secondary_color_dark'   => 'secondary-color-dark',
		'accent_color_1'         => 'accent-color-1',
		'accent_color_2'         => 'accent-color-2',
		'accent_color_3'         => 'accent-color-3',
		'light_accent_color_1'   => 'light-accent-color-1',
		'light_accent_color_2'   => 'light-accent-color-2',
		'light_accent_color_3'   => 'light-accent-color-3',
	];

	foreach ($map as $acf_key => $var_name) {
		$value = $colors[$acf_key] ?? '#000000';
		$scss .= "\${$var_name}: {$value};\n";
	}

	// Save to your theme folder (adjust path for your setup)
	$file = get_stylesheet_directory() . '/assets/styles/scss/_acf-variables.scss';
	file_put_contents($file, $scss);
});






?>