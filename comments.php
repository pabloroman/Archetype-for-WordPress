<?php

$commenter = wp_get_current_commenter();
$fields =  array(
    'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> ' .
        '<input id="author" name="author" type="text" required value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"></p>',
    'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . '</label> ' .
        '<input id="email" name="email" type="text" required value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"></p>',
);
 
$comments_args = array(
    'fields' 				=>  $fields,
    'title_reply'			=>'	<h3 class="headline-underlined">Leave a comment</h3>',
    'comment_notes_before'	=> false,
    'comment_notes_after'	=> false,
);
 
comment_form( $comments_args );

if( have_comments() ) {
	echo "<hr>";
	
	wp_list_comments( array( 'type' => 'comment', 'style' => 'div', 'avatar_size' => 48, 'callback' => 'archetype_list_comments' ) );
}