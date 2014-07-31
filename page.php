<?php 
	get_header();
	get_template_part( 'head');
	get_template_part( 'inc/title-head'); 
?>
		
	<div class="wide-container">
		<div class="container">
			<div class="row">
				<div class="page-content col span_18">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content('Read the rest of this entry &raquo;'); ?>
					<?php endwhile; else: ?>
					<?php _e('Sorry, no posts matched your criteria.'); ?>
					<?php endif; ?>
				</div>
				<?php get_sidebar()?>
			</div><!-- end row-->
		</div> <!-- end container-->
	</div> 

<?php get_footer() ?>