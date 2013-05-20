<?php

remove_action( 'wp_head', 'wp_generator' );

// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
	$content_width = 1020;

// Register Theme Features
function archetype_theme_features()  {

	// Add theme support for Custom Header
	$header_args = array(
		'default-image'          => '',
		'width'                  => 1020,
		'height'                 => 300,
		'flex-width'             => false,
		'flex-height'            => true,
		'random-default'         => false,
		'header-text'            => true,
		'default-text-color'     => '#ffffff',
		'uploads'                => true,

	);
	add_theme_support( 'custom-header', $header_args );
	
	if ( function_exists('register_sidebar') ) {
		register_sidebar();
	}
	
	register_nav_menu('header-menu',__( 'Header Menu' ));
}

// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'archetype_theme_features' );

// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'big_thumb', 1000, 500, true );
	add_image_size( 'medium_thumb', 400, 200, true );
	add_image_size( 'square_thumb', 150, 150, true );
	add_image_size( 'small_thumb', 120, 60, true );
}

load_theme_textdomain( 'archetype', get_template_directory() . '/languages' );

add_action( 'wp_enqueue_scripts', 'archetype_scripts_styles' );
function archetype_scripts_styles() {

	global $wp_styles;
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'archetype-style', get_stylesheet_uri() );
	wp_enqueue_style( 'archetype-icons', get_template_directory_uri().'/css/ss-pika.css' );
	wp_enqueue_style( 'archetype-animate', get_template_directory_uri() . '/css/animate.css' );
}

add_action( 'pre_get_posts', 'archetype_posts_per_page' );
function archetype_posts_per_page( $wp_query ) {
	set_query_var( 'posts_per_page', 15 );
}

add_filter( 'excerpt_length', 'archetype_excerpt_length', 999 );
function archetype_excerpt_length( $length ) {
	return 30;
}

add_filter( 'excerpt_more', 'archetype_excerpt_more' );
function new_excerpt_more( $more ) {
	return '&hellip;';
}

add_filter( 'previous_post_link', 'archetype_previous_post_link', 10, 2 );
function archetype_previous_post_link( $format, $link ) {
	echo str_replace( "<a href", "<a class='icon-chevron-left' href", $format );
}	

add_filter( 'next_post_link', 'archetype_next_post_link', 10, 2 );
function archetype_next_post_link( $format, $link ) {
	echo str_replace( "<a href", "<a class='icon-chevron-right' href", $format );
}

function archetype_excerpt()
{
    global $post;
    $output = get_the_excerpt();
    $output = apply_filters( 'wptexturize', $output );
    $output = apply_filters( 'convert_chars', $output );
    $output = '<p>' . $output . '</p>';
    echo $output;
}


function archetype_summary()
{
	global $post;
	$content = apply_filters( 'the_content', get_the_content() );
	$content = str_replace( ']]>', ']]&gt;', $content );
	$content = explode( "</p>", $content );
	echo $content[0];	
}


function archetype_list_comments( $comment, $args, $depth ) {
    ?>
    <div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
	
	<div class="comment-author vcard">
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<strong><?php echo get_comment_author_link() ?></strong> 
		<div class="comment-meta commentmetadata">
		<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
				/* translators: 1: date, 2: time */
				printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
		| <?php comment_reply_link(array_merge( $args, array( 'add_below' => false, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
	</div>
	
	<div class="comment-text">
	<?php comment_text() ?>
	</div>

	
    <?php	
}


function archetype_pagination( $pages = '', $range = 4 ) {

	global $paged;
	$showitems = ( $range * 2 )+1;
	if( empty( $paged ) ) $paged = 1;
	
	if( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if( !$pages ) {
			$pages = 1;
		}
	}
	
	if( 1 != $pages ) {
		echo '<div class="loop-pagination clearfix">';
		echo '<span class="small">'.__( 'Archive', 'archetype' ).'</span>';

		if( $paged > 1 && $showitems < $pages ) echo "<a href='".get_pagenum_link( $paged - 1 )."'>&laquo; ".__('Newer articles', 'archetype' )."</a>";
		for( $i=1; $i <= $pages; $i++ )
		{
			if(1 != $pages &&( !( $i >= $paged+$range+1 || $i <= $paged-$range-1 ) || $pages <= $showitems ) )
			{
				echo ( $paged == $i )? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link( $i )."' class='inactive' >".$i."</a>";
			}
		}
		if ( $paged < $pages && $showitems < $pages ) echo "<a href='".get_pagenum_link( $paged + 1 )."'>".__('Older articles', 'archetype')." &raquo;</a>";
		echo "</div>";
	}
}


function archetype_first_category() {

	global $post;
	$category = get_the_category();
	if( $category[0] ) {
		echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . $category[0]->name . '" ' . '>' . $category[0]->name.'</a> ';
	}
}


function archetype_author_related() {
	
	global $post, $authordata;
	$posts = get_posts( array( 'author' => $authordata->ID, 'post__not_in' => array( $post->ID ) ) );
	return $posts;
}


function archetype_share_link( $network ) {
	
	global $post;
	switch( $network ) {
		case 'twitter':
			return "https://twitter.com/intent/tweet?text=".the_title_attribute( 'echo=0' )."&url=".get_permalink()."&via=pabloroman";
		break;
		
		case 'facebook':
			return "https://www.facebook.com/sharer/sharer.php?u=".get_permalink();
		break;
	}
}

class Archetype_Walker_Nav_Menu extends Walker {
    var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
    function start_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
    function end_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes = in_array( 'current-menu-item', $classes ) ? array( 'menu-item current-menu-item' ) : array('menu-item');
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="' . esc_attr( $class_names ) . '"' : '';
        
        $id = apply_filters( 'nav_menu_item_id', '', $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
        $output .= $indent . '<li' . $id . $value . $class_names .'>';
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .' class="icon-'.strtolower($item->title).'">';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    function end_el(&$output, $item, $depth) {
        $output .= "</li>\n";
    }
}

// Include admin-only functions
if( is_admin() ) {
	include( dirname(__FILE__).'/functions-admin.php' );
}