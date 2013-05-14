<?php
	global $wp_query;
?>
<?php get_header(); ?>

	<section id="page-main">
		
		<div class="wrapper">
			
			<div class="row">
	
				<div class="column main-column center">

				<?php if( !have_posts() ): ?>
				<h1 class="search-title text-center"><?php printf( __( 'Sorry, no results found for %s', 'archetype' ), '<strong>' . get_search_query() . '</strong>' ); ?></h1>
				<?php else : ?>
				<h1 class="search-title text-center"><?php printf( __( '%s result(s) found for %s', 'archetype' ), $wp_query->found_posts, '<strong>' . get_search_query() . '</strong>' ); ?></h1>
				<?php endif; ?>
				<hr>				
				<?php if( have_posts() ): ?>
				
				<?php get_template_part( 'loop' ); ?>
			
				<?php endif; ?>
				</div>
				
			</div>
					
		</div>
	
	</section>
	<!-- /Section -->

<?php get_footer(); ?>