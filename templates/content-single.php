<?php
/**
 * Output single post content
 */
?>

<article id="post-<?php get_the_ID(); ?>">
    <header class="entry-header">
    <?php
    if (has_post_thumbnail()) {
        echo get_the_post_thumbnail(get_the_ID(), 'bandp-custom-blog-list-thumbnail');
    }
    ?>
    </header>
	<div class="entry-content">
		<h2 class="entry-title"><?php the_title(); ?></h2>

		<?php get_template_part('templates/post', 'meta'); ?>
		<div class="post-excerpt">
			<?php
			the_content();
			?>
		</div>
	</div><!-- .entry-content -->
</article>

