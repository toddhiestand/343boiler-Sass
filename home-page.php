<?php
/*
Template Name: Home Page
*/
get_header() ?>
	
<?php get_template_part( 'head'); ?>

<div class="wide-container">
	<div class="container">
		<div class="row">
			<div class="page-content col span_16">
				<header>
					<h1><?php the_title(); ?></h1>
				</header>
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

<!-- some js we might use
<script>
	$(function(){
		$.stellar({
			horizontalScrolling: false,
			verticalOffset: 200
		});
	});

	 $('.slider-name').bxSlider({
		  pagerCustom: '.bx-pager-name',
		  minSlides: 1,
		  maxSlides: 1,
		  moveSlides: 0,
		  slideWidth: 0
	 }); 

</script>
-->