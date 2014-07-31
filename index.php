<?php 
	get_header();
	get_template_part( 'head');
?>
	
<div class="wide-container page-header" style="background-image: url(<?php if( get_post_meta($post->ID, "billboard_image", true) ): ?><?php the_field('billboard_image'); ?><?php else: ?><?php the_field('default_page_header', 'option'); ?><?php endif; ?>);">
	<div class="container">
		<div class="row nopadrow">
			<div class="col span_24">
				<header>
					<h2>Blog</h2>
				</header>
			</div>
		</div>
	</div>
</div>	

<div class="wide-container">
	<div class="container">
		<div class="row">
			<div class="page-content col span_18">
				<div class="articles-container">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php get_template_part( 'inc/content', 'article' ); ?>
					<?php endwhile; else: ?>
					<?php _e('Sorry, no posts matched your criteria.'); ?>
					<?php endif; ?>
				</div><!--end articles container -->
				<?php get_template_part( 'inc/feature', 'pagination' ); ?>
			</div>
			<?php get_sidebar()?>
		</div><!-- end row-->
	</div> <!-- end container--> 
</div>

<?php get_footer() ?>