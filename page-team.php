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
							
							<hr>
							
							<div class="row">
								<div class="column third">
									<h2>Linda Hoevenaren</h2>
									<p>Linda is co-founder of Ikigai magazine. After finishing medical school and working as senior editor for Global Medicine Magazine, she is currently working as a resident in a children&rsquo;s hospital in The Hague, the Netherlands.</p>

									<p><a class="icon-mail" href="mailto:linda@ikigai-magazine.com">linda@ikigai-magazine.com</a>
								</div>
								
								<div class="column third">
									<h2>Ragna Boerma</h2>

									<p>Ragna is co-founder of Ikigai magazine. She is a medical doctor, based in Amsterdam, The Netherlands. Currently, she is doing a PhD at the University of Amsterdam in the field of pediatrics and global health.</p>

									<p><a class="icon-mail" href="ragna@ikigai-magazine.com">ragna@ikigai-magazine.com</a></p>
								</div>
								
								<div class="column third">
									<h2>Pablo Rom&aacute;n</h2>
								 	<p>Pablo comes from Spain, is web developer and designer and he works in Amsterdam at <a href="http://thenextweb.com">The Next Web</a>. He's responsible of all things technical and visual on Ikigai magainze.</p>
								 	
								 	<p><a class="icon-mail" href="http://pabloroman.es">http://pabloroman.es</a></p>
								</div>
							</div>
							
							
							
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