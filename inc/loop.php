<div class="articles-container">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="article">
			<p class="meta date"><?php the_time('F j, Y'); ?></p>
			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			<?php the_post_thumbnail( 'image-small' ); ?>		
			<?php wpe_excerpt('wpe_excerptlength_index', 'wpe_excerptmore'); ?>			
			<p class="meta comments"><a href="<?php comments_link(); ?>" class="comments"><?php comments_number('0 Comments', '1 Comment', '% Comments', 'number'); ?></a></p>
		</div>		
	<?php endwhile; else: ?>
	<?php _e('Sorry, no posts matched your criteria.'); ?>
	<?php endif; ?>
</div><!--end articles container -->

<nav class="post-navigation">
	<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
	<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
</nav>	