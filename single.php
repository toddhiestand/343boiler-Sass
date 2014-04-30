<?php get_header() ?>
	
	<?php get_template_part( 'head'); ?>

<div class="wide-container">
	<div class="container">
		<div class="row">
			<article class="page-content col span_16 clr">
				<header>
					<h1><?php the_title(); ?></h1>
				</header>
				
				<p class="meta author">By: <?php the_author_posts_link(); ?></p>
				<p class="meta date"><?php the_time('F j, Y'); ?></p>
				<p class="meta comments"><a href="<?php comments_link(); ?>" class="comments"><?php comments_number('0 Comments', '1 Comment', '% Comments', 'number'); ?></a></p>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php the_post_thumbnail( 'image-single' ); ?>		
						<?php the_content('Read the rest of this entry &raquo;'); ?>
						<footer>
						<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>
						<p class="meta categories">Categories: <?php the_category(',') ?></p>
						</footer>

						<?php comments_template( '', true ); ?>	
					<?php endwhile; else: ?>
					<?php _e('Sorry, no posts matched your criteria.'); ?>
					<?php endif; ?>

			</article>
			<?php get_sidebar()?>
		</div><!-- end row-->
	</div> <!-- end container--> 
</div><!-- end wide container -->

<?php get_footer() ?>