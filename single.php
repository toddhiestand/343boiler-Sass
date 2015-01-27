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
			<article class="page-content col span_18 clr">
				<div class="row postinfo">
					<p class="col span_20">Posted by <?php the_author_posts_link(); ?> on <strong><?php the_time('F j, Y'); ?></strong></p>
					<p class="meta comments col span_4 alignRight"><a href="<?php comments_link(); ?>" class="comments"><?php comments_number('0 Comments', '1 Comment', '% Comments', 'number'); ?></a></p>
				</div>

				<header>
					<h1><?php the_title(); ?></h1>
				</header>
					<div class="row nopadrow">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="post-content col span_24">
							<?php the_post_thumbnail( 'image-single' ); ?>		
							<?php the_content('Read the rest of this entry &raquo;'); ?>
						</div>
					</div>
					<div class="row nopadrow">
						<footer>
							<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>
							<p class="meta categories">Categories: <?php the_category(',') ?></p>
						</footer>
					</div>
					<div class="row">
						<?php comments_template( '', true ); ?>	
					</div>
				<?php endwhile; else: ?>
				<?php _e('Sorry, no posts matched your criteria.'); ?>
				<?php endif; ?>

			</article>
			<?php get_sidebar()?>
		</div><!-- end row-->
	</div> <!-- end container--> 
</div><!-- end wide container -->

<?php get_footer() ?>