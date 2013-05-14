<?php get_header(); ?>
	
	<!-- Section -->
	<section id="page-main">
		
		<div class="wrapper">
		
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
		<div class="row">
			
			<div class="column main-column">
				
				<div class="row">
					<div class="column center three-fourth">
					
						<header class="post-header">
							<div class="post-category"><?php the_category(''); ?></div>
							<h1 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
						</header>
							
						<div class="column" id="post-main">				
								
							<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-image"><?php the_post_thumbnail( 'medium_thumb' ); ?></div>
							<?php endif; ?>
			
							<section class="post-excerpt"><?php the_content(); ?></section>
		
						</div>
					
					</div>
				</div>
			
			</div>
						
		</div><!-- /Row -->
			
			
			
					
		</article>
		<!-- /Article -->
		
	<?php endwhile; ?>
	
	<?php else: ?>
	
		<!-- Article -->
		<article>
			
			<h1><?php _e( 'Sorry, nothing to display.', 'archetype' ); ?></h1>
			
		</article>
		<!-- /Article -->
	
	<?php endif; ?>
			
			
		</div><!-- /Wrapper -->
		
	</section>
	<!-- /Section -->
	

<?php get_footer(); ?>