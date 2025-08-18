<?php
/**
 * The template for displaying the footer.
 */

// ACF: get selected footer for this page/post
$selected_footer = get_field('select_footer'); // returns an ID
$fallback_footer_id = 13;

$footer_id = $selected_footer ? $selected_footer : $fallback_footer_id;

if ($footer_id) :
	$footer_post = get_post($footer_id);
	if ($footer_post) :
		?>
		<footer class="footer">
			<?php echo apply_filters('the_content', $footer_post->post_content); ?>
		</footer>
	<?php
	endif;
endif;

?>

<?php wp_footer(); ?>
</body>
</html>

