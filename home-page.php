<?php
/*
Template Name: Home Page
*/
get_header();
get_template_part( 'head'); 
?>

<div class="wide-container home-banner">
	<div class="row nopadrow">
			<img src="<?php the_field("billboard_image"); ?>" alt="<?php bloginfo( 'name' ); ?>" />
	</div>
</div>
<div class="wide-container">
	<div class="container">
		<div class="row actions-row">
			<div class="col span_24 action">
				<?php if(get_field('action_buttons')): ?>
					<ul class="col span_14 centered actions">
						<?php while(has_sub_field('action_buttons')): ?>
							<li class="col span_12">
								<a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('text'); ?></a>
							</li>			
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>	
			</div>
		</div>
		<div class="row">
			<div class="col span_24 triataryAction">
				<?php if(get_field('circle_blocks')): ?>
					<ul class="col span_24 centered">		
						<?php while(has_sub_field('circle_blocks')): ?>
							<li class="col span_8 circleBlocks">
								<div class="block-content" style="background-image: url(<?php the_sub_field('image'); ?>);">
									<a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a>
								</div>
							</li>		
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>	
			</div>
		</div>
		<div class="row">
			<div class="col span_20 secondaryIntro centered">
				<?php the_field("secondary_intro_block"); ?>
			</div>
		</div><!-- end row-->
	</div>
</div>
<div class="wide-container posts">
	<div class="container">	
		<div class="row recentPosts">
			<div class="span_24">
				<?php query_posts('posts_per_page=2');?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article class="article col span_12">
						<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
						<p class="meta date"><?php the_time('F j, Y'); ?></p>
						<?php the_post_thumbnail( 'image-small' ); ?>		
						<p><?php wpe_excerpt('wpe_excerptlength_index', 'wpe_excerptmore'); ?></p>
					</article>	
				<?php endwhile; else: ?>
				<?php _e('Sorry, no posts matched your criteria.'); ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="row nopadrow">
			<div class="col span_24 centered">
				<a href="/blog" class="button">Read More News</a>
			</div>
		</div>

	</div>
</div>
<div class="wide-container quote-container">
	<div class="container">			
		<div class="slider">
			<ul class="slider-quotes">	
				<?php if(get_field('quotes', 'option')): ?>
				<?php while(has_sub_field('quotes', 'option')): ?>	
					<li class="slide">
						<p class="quote"><?php the_sub_field('quote', 'option'); ?></p>
						<p class="author"><?php the_sub_field('author', 'option'); ?></p>
					</li>
				<?php endwhile; ?>
				<?php endif; ?>
			</ul>
			<div class="bx-pager bx-pager-quotes dots">
				<?php
					if ( get_field('quotes', 'option') )
					{
						$count=0;
						while ( has_sub_field('quotes', 'option') )
						{
							echo '<a data-slide-index="'. $count .'" href=""></a> ';
							$count++;
						}
					}
				?>
			</div>
		</div><!-- end slider -->
		<div class="row mailrow">
			<div class="span_24 emailForm centered input_clear">
				<h3>Do you want to change the world with us?</h3>
				<?php gravity_form(2, false, false, false, '', false); ?>
			</div>
		</div>
	</div> <!-- end container--> 
</div>

<?php get_footer() ?>


<script>

	 $('.slider-quotes').bxSlider({
		  pagerCustom: '.bx-pager-quotes',
		  minSlides: 1,
		  maxSlides: 1,
		  moveSlides: 0,
		  slideWidth: 0
	 }); 

</script>
-->