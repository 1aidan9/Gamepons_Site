<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Atheus
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

<div class="post-comment" id="comments">
	<?php
	if ( have_comments() ) :
		?>
        <h6 class="comments-title">
			<?php
			$anchor_comment_count = get_comments_number();
			if ( '1' === $anchor_comment_count ) {
				printf(
				/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;',  'atheus' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
				/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $anchor_comment_count, 'comments title',  'atheus' ) ),
					number_format_i18n( $anchor_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
        </h6><!-- .comments-title -->

        <ol class="comments comment-list">
			<?php wp_list_comments( array( 'callback' => 'atheus_bootstrap_comment' ) ); ?>
        </ol>

		<?php
		the_comments_navigation();
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.',  'atheus' ); ?></p>
		<?php
		endif;
		?>
	<?php endif; ?>

    <div class="comment-form">
		<?php
		ob_start();
		$commenter = wp_get_current_commenter();

		$req = true;
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$comments_arg = array(
			'form'	=> array(
				'class' => 'form-horizontal'
			),
			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' 				=> '<div class="form-group col-md-6 col-12">' . '<label for="author"><span>' . esc_html__( 'Name',  'atheus' ) . '</span></label> ' .
				                           '<input id="author" name="author" type="text" value="" size="30"' . $aria_req . ' />'.
				                           '<div id="field1" class="text-danger"></div>' . '</div>',
				'email'					=> '<div class="form-group col-md-6 col-12">' .'<label for="email"><span>' . esc_html__( 'Email',  'atheus' ) . '</span></label> ' .
				                              '<input id="email" name="email"type="text" value="" size="30"' . $aria_req . ' />'.
				                              '<div id="field2" class="text-danger"></div>' . '</div>',
				'url'					=> '')),
			'comment_field'			=> '<div class="form-group col-md-12 col-12">' . '<label for="comment"><span>' . esc_html__( 'Comment',  'atheus' ) . '</span></label>' .
			                              '<textarea id="comment" name="comment" rows="3" aria-required="true"></textarea><div id="field3" class="text-danger"></div>' . '</div>',
			'comment_notes_after' 	=> '',
			'class_submit'			=> '',
			'class_form'        => 'row',
			'title_reply_before'   => '<h6 id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</h6>',
			'must_log_in'          => '<div class="col-md-12"><p class="must-log-in">' .
			                          sprintf(
				                          __( 'You must be <a href="%s">logged in</a> to post a comment.',  'atheus' ),
				                          wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
			                          ) . '</p></div>',
			/** This filter is documented in wp-includes/link-template.php */
			'logged_in_as'         => '<div class="col-md-12"><p class="logged-in-as">' .
			                          sprintf(
				                          __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="%4$s">%5$s</a>',  'atheus' ),
				                          admin_url( 'profile.php' ),
				                          $user_identity,
				                          wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ),
                                          esc_html__( 'Log out of this account',  'atheus' ),
                                          esc_html__( 'Log out?',  'atheus' )
			                          ) . '</p></div>',
			'comment_notes_before' => '<div class="col-md-12"><p class="comment-notes"><span id="email-notes">' . esc_html__( 'Your email address will not be published.',  'atheus' ) . '</span></p></div>',
			'label_submit'         => esc_html__( 'Submit',  'atheus' ),
			'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
			'submit_field'         => '<div class="form-group col-12">%1$s %2$s</div>',
		);
		comment_form($comments_arg);
		echo str_replace('id="commentform"','id="commentform" name="commentForm" onsubmit="return validateForm();"',ob_get_clean());
		?>
    </div>
    <!-- end comment-form -->
</div>
<!-- end post-comment -->