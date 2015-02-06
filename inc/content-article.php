<article class="article">
	<p class="meta date"><?php the_time('F j, Y'); ?></p>
	<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
	<?php the_post_thumbnail( 'image-small' ); ?>		
	<?php wpe_excerpt('wpe_excerptlength_index', 'wpe_excerptmore'); ?>			
	<p class="meta comments"><a href="<?php comments_link(); ?>" class="comments"><?php comments_number('0 Comments', '1 Comment', '% Comments', 'number'); ?></a></p>
</article>	