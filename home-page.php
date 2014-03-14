<?php
/*
Template Name: Home Page
*/
?>

<?php get_header() ?>
	
<?php get_template_part( 'head'); ?>


<div class="wide-container">
	<div class="container">
		<div class="row">
			<div class="col span_10 centered">
				<h1>A little paralax loving</h1>
				<p>Lorem ipsum dolor sit amet, mea an sonet melius phaedrum, viderer euismod eu quo. Ea sit quod eros nulla, ei est dolore sapientem, qualisque corrumpit ex mel.</p>
			</div>
		</div>
	</div>
</div>

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