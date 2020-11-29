<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPF Start Theme
 */

?>
		<?php
		if(is_home() || is_singular('post')) {
			?>
					</div><!-- end .row -->
				</div><!-- end .container -->
			<?php
		}
		?>
	</div><!-- #content -->
<?php
$footer_type = apply_filters('bandq_footer_type', array(
	'site-footer'
));
?>
<footer id="site-footer" class="<?php echo implode(' ', $footer_type) ?>">
	<?php do_action('bandq_footer') ?>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>