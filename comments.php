<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WPF Start Theme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h3 class="comment-result">
			<span><?php printf( '%s', number_format_i18n( get_comments_number() ) ); ?></span> <?php esc_html_e( 'Comments ', 'wpf_domain' );?>
		</h3>

		<div class="comment-list">
			<?php
			wp_list_comments( array(
				'style' => 'div',
				'short_ping'  => true,
				'avatar_size'	=> 100,
				'callback'		=>	'wpfunc_comments',
			) );
			?>
		</div><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'wpf_domain' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'wpf_domain' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'wpf_domain' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
			<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wpf_domain' ); ?></p>
		<?php
	endif;

	$args = array(
		'title_reply'   => esc_html__( 'Leave A Comment', 'wpf_domain' ),
		'label_submit'  => esc_html__( 'Send message', 'wpf_domain' ),
		'comment_notes_before'	=>	'',
		'comment_notes_after'	=>	'',
		'class_submit'	=>	'btn-main',
		'fields'               => array(
			'author' => '<div class="row"><div class="form-group col-md-6">' . '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_attr__( 'Name', 'wpf_domain' ) . '" aria-required="true" required/></div>',
			'email'	=>	'<div class="form-group col-md-6">' . '<input id="email" name="email" class="form-control" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_attr__( 'Email', 'wpf_domain' ) . '" aria-required="true" required /></div></div>',
			'comment_field'	=>	'<div class="row"><div class="col-md-12 form-group"><textarea id="comment" rows="6" class="form-control" name="comment" placeholder="' . esc_attr__( 'Message', 'wpf_domain' ) . '" aria-required="true"></textarea></div></div>',
		),
		'comment_field'	=>	'<div class="row"><div class="col-md-12 form-group"><textarea id="comment" rows="6" class="form-control" name="comment" placeholder="' . esc_attr__( 'Message', 'wpf_domain' ) . '" aria-required="true"></textarea></div></div>',
	);
	if ( ! is_user_logged_in() )
	{
		$args['comment_field'] = '';
	}

	?>

	<div class="form-comment"><?php comment_form( $args );?></div>
</div><!-- #comments -->