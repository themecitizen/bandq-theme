<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPF Start Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<?php do_action( 'wptext_before_header' ) ?>

	<?php
	$header_class[] = 'site-header';
	$header_class = apply_filters( 'wptext_header_class', $header_class );
	?>

	<header id="masthead" class="<?php echo implode( ' ', $header_class ); ?>" role="banner">
		<?php do_action( 'wptext_header' ); ?>
	</header><!-- #masthead -->

	<?php do_action( 'wptext_after_header' ) ?>

	<div id="content" class="site-content">

		<?php do_action( 'wptext_before_content' ); ?>