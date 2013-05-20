<?php global $i; ?>
<div class="row loop">

	<?php 
	$i = 1;
	if (have_posts()): while (have_posts()) : the_post(); ?>
		
		<?php 
			get_template_part( 'loop', 'post' );
			$i++;
		endwhile; ?>
		
	<?php else: ?>
			
	<?php endif; ?>
</div>

<div class="row">
	<!-- Pagination -->
	<div id="pagination">
		<?php archetype_pagination(); ?>
	</div>
</div>