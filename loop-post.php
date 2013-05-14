<?php

global $post;

?>

	<!-- Article -->
	<article id="post-<?php the_ID(); ?>" class="row loop-post">
	
	<div class="column third">
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="loop-post-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail( 'medium_thumb' ); ?>
		</a>
	<?php endif; ?>
	</div>
	<div class="column two-third">
		<h2 class="loop-post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<div class="loop-post-byline"><?php the_author(); ?> &mdash; <?php echo get_the_date('F j, Y'); ?></div>
		<div class="loop-post-excerpt">
		<?php archetype_excerpt(); ?>
		</div>
	</div>
	
	</article>
	<!-- /Article -->