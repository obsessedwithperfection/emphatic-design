<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

if ( ! isset( $content_width ) ) {
	$content_width = 600;
}
?>
<div class="container-fluid">
	<div class="row">
		<div id="comments" class=" col-sm-8 comments-area">

			<?php
			// You can start editing here -- including this comment!
			if ( have_comments() ) : ?>
				<h2 class="comments-title">
					<?php
					$comments_number = get_comments_number();
					if ( '1' === $comments_number ) {
						/* translators: %s: post title */
						printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'emphatic-design' ), get_the_title() );
					} else {
						printf(
							/* translators: 1: number of comments, 2: post title */
							_nx(
								'%1$s Reply to &ldquo;%2$s&rdquo;',
								'%1$s Replies to &ldquo;%2$s&rdquo;',
								$comments_number,
								'comments title',
								'emphatic-design'
							),
							number_format_i18n( $comments_number ),
							get_the_title()
						);
					}
					?>
				</h2>

				<ol class="comment-list">
					<?php
						wp_list_comments( array(
							'avatar_size' => 80,
							'style'       => 'ol',
							'short_ping'  => true,
							'reply_text'  => '&nwArr;Reply',
						) );
					?>
				</ol>

				<?php the_comments_pagination( array(
					'prev_text' => '',
					'next_text' => '',
				) );

			endif; // Check for have_comments().

			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

				<p class="no-comments"><?php _e( 'Comments are closed.', 'emphatic-design' ); ?></p>
			<?php
			endif;

			comment_form();
			?>

		</div><!-- #comments -->
	</div>
</div>
