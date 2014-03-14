<?php get_header() ?>
	
	<?php get_template_part( 'head'); ?>

<div class="wide-container">
	<div class="container">
		<div class="row">
			<div class="page-content col span_16">
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