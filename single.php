<?php get_header(); ?>
		
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- Section -->
	<section id="page-main">
		
		<div class="wrapper">
							
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
		<div class="row">
			
			<div class="column main-column">
			
				<header class="post-header">
					<div class="post-category"><?php the_category(''); ?></div>
					<h1 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
					<div class="post-excerpt"><?php the_excerpt(); ?></div>
				</header>
							
				<div class="column three-fourth" id="post-main">
				
					<?php if ( has_post_thumbnail() ) : ?>
					<div class="post-image">
						<?php the_post_thumbnail( 'big_thumb' ); ?>
					<?php $caption = get_post(get_post_thumbnail_id())->post_excerpt;
						if( $caption !== '' ) { ?>
							<div class="post-image-caption"><?php echo $caption; ?></div>
						<?php
						}
					 ?>
					</div>
					<?php endif; ?>
											
					<div class="row">
						<div class="column three-fourth">
									
							<section class="post-content"><?php the_content(); ?></section>
							
							<?php
							$inspired = get_post_meta(get_the_ID(), 'got_inspired', true);
							// check if the custom field has a value
							if($inspired != '') {
							?>
							<hr>
							<div class="post-content post-extra">
								<h3 class="headline-underlined">Got inspired?</h3>
							<?php
							  echo apply_filters( 'the_content', $inspired );
							?>
							</div>
							<?php
							}
							?>

						</div>
						<div class="column fourth">
							<div class="post-share">
								<a href="<?php echo archetype_share_link( 'twitter' ); ?>" class="twitter" target="_blank"><i class="icon-twitter"></i><div class="share-caption">Tweet me!</div></a>
								<a href="<?php echo archetype_share_link( 'facebook' ); ?>" class="facebook" target="_blank"><i class="icon-facebook"></i><div class="share-caption">Like me!</div></a>
							</div>
						</div>
					</div>
				</div>

				<div class="column fourth" id="post-sidebar">
					<section class="post-meta post-meta-top">
						<?php echo get_avatar( get_the_author_meta('ID'), 60 ); ?>
						<h4><?php the_author(); ?></h4>
						<p><?php the_author_meta( 'description' ); ?></p>
						<hr>
						<?php _e( 'Published', 'archetype' ); ?>
						<span class="date"><?php the_time('F j, Y'); ?></span>
					</section>
					<hr>
					<section class="post-related">
					<h3><?php _e( 'More from the author', 'archetype' ); ?></h3>
					<?php $related_posts = archetype_author_related(); 
					if( !empty( $related_posts ) ) : ?>
					<ul class="sidebar-list">
					<?php foreach( $related_posts as $related_post ) : ?>
							<li<?php if( $post->ID == $related_post->ID ) { echo " class='current'"; } ?>><a href="<?php echo get_permalink( $related_post->ID ) ?>"><?php echo get_the_title( $related_post->ID ); ?></a></li>
					<?php endforeach; ?>
					</ul>
					<?php endif; ?>
					</section>
				</div>
			
			</div>
						
		</div><!-- /Row -->
			
			
			
					
		</article>
		<!-- /Article -->

		</div><!-- /Wrapper -->
		
	</section>
	<!-- /Section -->
	
	<section class="secondary-column">
	
		<div class="wrapper">
			
			<div class="row">
				
				<div class="column main-column">
					
					<div class="row">
						<div class="column half">
							<?php comments_template(); ?>
						</div>
						<div class="column half">
							<h3 class="headline-underlined">Read next</h3>
							<?php $next_post = get_adjacent_post(); ?>
							<?php get_template_part( 'loop', 'postblock' ); ?>					
						</div>
					</div>
				</div>
				
			</div>
		
		</div>
		
	</section>
					
	<?php endwhile; ?>
	
	<?php else: ?>
	
		<!-- Article -->
		<article>
			
			<h1><?php _e( 'Sorry, nothing to display.', 'archetype' ); ?></h1>
			
		</article>
		<!-- /Article -->
	
	<?php endif; ?>
			
			

	

<?php get_footer(); ?>