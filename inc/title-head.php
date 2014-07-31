<div class="wide-container page-header" style="background-image: url(<?php if( get_post_meta($post->ID, "billboard_image", true) ): ?><?php the_field('billboard_image'); ?><?php else: ?><?php the_field('default_page_header', 'option'); ?><?php endif; ?>);">
	<div class="container">
		<div class="row nopadrow">
			<div class="col span_24">
				<header>
					<h2><?php the_title(); ?></h2>
				</header>
			</div>
		</div>
	</div>
</div>