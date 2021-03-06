<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WPF Start Theme
 */

get_header(); ?>

	<div id="primary" class="content-area col">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :
			
			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h2 class="blog-page-title">Blog</h2>
					<div class="sub-title">To learn more insights about the real estate market and how it works, take a look at our blog</div>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'templates/content', get_post_format() );

			endwhile;

			?>
			<div class="bottom-toolbar d-flex justify-content-center">
				<?php bandp_numeric_pagination(); ?>
			</div>
		<?php
			wp_reset_postdata();

		else :

			get_template_part( 'templates/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
