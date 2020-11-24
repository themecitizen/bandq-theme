<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays all pages have layout full width.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */

get_header(); ?>

<section class="content-section col">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			the_content();
		endwhile;
	endif;
	?>
</section>
<?php get_footer(); ?>