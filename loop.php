<div class="row loop">

	<?php 
	$i = 0;
	if (have_posts()): while (have_posts()) : the_post(); ?>
		
		<?php 
			if( $i == 0 ) :
				get_template_part( 'loop', 'post' );
			else :
				get_template_part( 'loop', 'post' );
			endif;
		$i++;
		endwhile; ?>

<div class="row">
	<!-- Pagination -->
	<div id="pagination">
		<?php archetype_pagination(); ?>
	</div>
</div>
		
	<?php else: ?>
			
	<?php endif; ?>
</div>