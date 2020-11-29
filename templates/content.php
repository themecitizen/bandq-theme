<?php
/**
 * Template part for displaying posts.
 */

$has_thumbnail = '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($has_thumbnail); ?>>
	<header class="entry-header">
			<?php
            if (has_post_thumbnail()) {
				echo get_the_post_thumbnail(get_the_ID(), 'bandp-custom-blog-list-thumbnail');
            }
            ?>
		</header><!-- .entry-header -->

	<div class="entry-content">
		<h2 class="entry-title">
			<?php
			$post_url = get_the_permalink();
            ?>
			<a href="<?php echo esc_url($post_url); ?>"><?php the_title(); ?></a>
		</h2>

		<?php get_template_part('templates/post', 'meta'); ?>
		<div class="post-excerpt">
			<?php
			the_excerpt();
			?>
		</div>
		
		<div class="post-info">
			<div class="d-flex justify-content-between align-items-center">
				<a class="post-detail" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'osaas'); ?></a>
			</div>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
