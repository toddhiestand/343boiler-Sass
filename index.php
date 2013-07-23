<?php get_header() ?>
	
	<?php get_template_part( 'head'); ?>

<div class="container">

	<div class="row">

		<div class="page-content col span_16 clr">

			<div class="articles-container">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="article">
						<p class="meta date"><?php the_time('F j, Y'); ?></p>
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						<?php the_post_thumbnail( 'image-small' ); ?>		
						<?php wpe_excerpt('wpe_excerptlength_index', 'wpe_excerptmore'); ?>			
						<p class="meta comments"><a href="<?php comments_link(); ?>" class="comments"><?php comments_number('0 Comments', '1 Comment', '% Comments', 'number'); ?></a></p>
					</div>		
				<?php endwhile; else: ?>
				<?php _e('Sorry, no posts matched your criteria.'); ?>
				<?php endif; ?>
			</div><!--end articles container -->

			<div class="pagination">
				<?php
				    global $wp_query;
				    $big = 99999999;
				    echo paginate_links(array(
				        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
				        'format' => '?paged=%#%',
				        'total' => $wp_query->max_num_pages,
				        'current' => max(1, get_query_var('paged')),
				        'show_all' => false,
				        'end_size' => 2,
				        'mid_size' => 3,
				        'prev_next' => true,
				        'prev_text' => 'Prev',
				        'next_text' => 'Next',
				        'type' => 'list'
				    ));
				?>
			</div>

		</div>

		<?php get_sidebar()?>

	</div><!-- end row-->

</div> <!-- end container--> 

<?php get_footer() ?>