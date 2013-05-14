<?php get_header(); ?>
	
	<section id="page-main">
		
		<div class="wrapper">

			<div class="row">
	
				<div class="column main-column">
					
					<?php if( is_paged() ) : ?>
					<h1 class="text-center"><?php _e( 'Archive', 'archetype' ); ?></h1>
					<hr>
					<?php elseif( is_category() ) : ?>
					<h1 class="text-center"><?php single_cat_title(); ?></h1>
					<hr>
										
					<?php endif; ?>		

				<div class="row">

					<?php get_template_part( 'loop' ); ?>

				</div>
				
				</div>
			</div>						
		</div>
	
	</section>
	<!-- /Section -->

<?php get_footer(); ?>