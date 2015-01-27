<article class="article">
	<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
	<p class="meta date"><?php the_time('F j, Y'); ?></p>
	<?php the_post_thumbnail( 'image-small' ); ?>		
	<p><?php wpe_excerpt('wpe_excerptlength_index', 'wpe_excerptmore'); ?></p>
</article>	