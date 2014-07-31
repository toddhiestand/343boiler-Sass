<?php 
/*
Template Name: Resources Template
*/
	get_header();
	get_template_part( 'head');
	get_template_part( 'inc/title-head'); 
?>
		
	<div class="wide-container">
		<div class="container">
			<div class="row">
				<div class="page-content col span_24">
					<?php the_field('page_intro'); ?>
				</div>
			</div>
			<?php if( have_rows('pdfs') ): ?>
			<div class="row">
				<div class="resources-div span_24">
				<h2>PDFs</h2>
				<?php while( have_rows('pdfs') ): the_row(); ?>
					<?php if( have_rows('pdf_row') ): ?>
						<ul class="span_24 col pdfs">
						<?php while( have_rows('pdf_row') ): the_row();?>
							<li class="col span_6">
								<a href="<?php the_sub_field('document'); ?>">
									<?php the_sub_field('preview_image'); ?>
									<?php the_sub_field('title'); ?>
								</a>
							</li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>
					<?php endwhile; ?>
				</div>
			</div>
			<?php endif;?>
			
			<?php if(get_field('videos')): ?>
			<div class="row">
				<div class="resources-div span_24">
					<h2>Videos</h2>	
					<ul class="videos">
					<?php while(has_sub_field('videos')): ?>
						<li><a href="<?php the_sub_field('document'); ?>"><?php the_sub_field('title'); ?></a></li>
					<?php endwhile; ?>
					</ul>
				</div>
			</div>
			<?php endif; ?>	
			
			<?php if(get_field('graphics')): ?>
				<div class="row">
					<div class="resources-div span_24">
						<h2>Graphics</h2>
						<ul class="graphics col span_24">
						<?php while(has_sub_field('graphics')): ?>
							<li class="col span_6">
								<?php $image = wp_get_attachment_image_src( get_sub_field('image'), 'download-image' ); ?>	
								<a href="<?php echo $image[0]; ?>">
									<p><?php the_sub_field('title'); ?></p>
									<img src="<?php echo $image[0]; ?>" />
								</a>
							</li>
						<?php endwhile; ?>
						</ul>
					</div>
				</div>
			<?php endif; ?>	
			
		</div><!-- end row-->
	</div> <!-- end container-->
</div> 

<?php get_footer() ?>

<script>

	(function($) {
    
  var allPanels = $('.accordion > dd').hide();
    
  $('.accordion > dt > a').click(function() {
    allPanels.slideUp();
    $(this).parent().next().slideDown();
    return false;
  });

})(jQuery);

</script>