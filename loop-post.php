<?php

global $post;
global $i;
?>

	<article id="post-<?php the_ID(); ?>" class="column third loop-post <?php if( $i % 3 == 0 ) { echo "last"; } ?>">
	
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="loop-post-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail( 'medium_thumb' ); ?>
		</a>
	<?php endif; ?>

		<h2 class="loop-post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<div class="loop-post-byline"><?php the_author(); ?> &mdash; <?php echo get_the_date('F j, Y'); ?></div>
		<div class="loop-post-excerpt">
		<?php archetype_excerpt(); ?>
	</div>
	
	</article>