<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="language" content="<?php echo get_locale(); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title(''); ?></title>
	
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>

	<link rel="alternate" type="application/rss+xml" title="<?php echo bloginfo( 'name' ); ?>" href="<?php echo bloginfo( 'rss2_url' ); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" />
    
</body>
</html>
	
	<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
<?php 

	if( is_single() || is_page() )
	{  
		$author = get_userdata( $post->post_author );
	    $image_id = get_post_thumbnail_id( $post->ID );
	    if($image_id) {
	    	$image = wp_get_attachment_image_src( $image_id, array( 300, 300 ), false );
			$image = $image[0];
		}
        
    ?>
	<meta property="og:description" content="<?php echo substr( htmlspecialchars( strip_tags( $post->post_content ) ), 0, 180 ); ?>">
	<meta property="og:title" content="<?php the_title(); ?>">
	<meta property="og:type" content="article">
	<meta property="og:url" content="<?php the_permalink(); ?>">
	<meta property="og:image" content="<?php echo $image; ?>">
	<meta itemprop="image" content="<?php echo $image; ?>">
	<meta property="article:published_time" content="<?php echo date( "c", strtotime( $post->post_date ) ); ?>">
<?php
	}
?>

<?php
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
	
	<header id="page-top">
		<div class="wrapper clearfix">
			<div class="site-title">
				<a class="logo" href="/">Archetype</a>
			</div>
			
			<a class="hidden icon-list" href="javascript:void(0);" id="menu-toggle">Menu</a>
			<div class="site-navigation-wrapper">
				<div class="site-navigation">
				<?php wp_nav_menu( array( 'walker' => new Archetype_Walker_Nav_Menu(), 'theme_location' => 'header-menu' ) ); ?>
				<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</header>

<?php
	
	if( is_front_page() && !is_paged() && get_header_image()) : 
?>
	<section class="blog-tagline">
		
		<div class="blog-header-image" style="background-image: url('<?php echo get_header_image(); ?>')";></div>

	<div class="main-column wrapper">
		<div class="bloginfo-description three-fourth center animated fadeInUp"><?php echo bloginfo( 'description' ); ?></div>
		<div class="text-center animated fadeInUp"><a href="http://github.com/pabloroman/archetype-for-wordpress" class="icon-github button-highlight">View on GitHub</a></div>
	</div>
</section>

<?php endif; ?>
		