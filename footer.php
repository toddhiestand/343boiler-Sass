		<div class="wide-container footer-wide">
			<div class="container">
				<div class="row">
					<div class="col span_24 baseline">
						<div class="col span_8">
							<?php if ( !function_exists('dynamic_sidebar')
								|| !dynamic_sidebar(footerone) ) : ?>
							<?php endif; ?>
						</div>
						<div class="col span_4">
							<?php if ( !function_exists('dynamic_sidebar')
								|| !dynamic_sidebar(footertwo) ) : ?>
							<?php endif; ?>
						</div>
						<div class="col span_4">
							<?php if ( !function_exists('dynamic_sidebar')
								|| !dynamic_sidebar(footerthree) ) : ?>
							<?php endif; ?>
						</div>
						<div class="col span_8">
							<?php if ( !function_exists('dynamic_sidebar')
								|| !dynamic_sidebar(footerfour) ) : ?>
							<?php endif; ?>
							<?php if(get_field('social_links', 'option')): ?>
								<ul class="social-menu ss-icon">
									<?php while(has_sub_field('social_links', 'option')): ?>
										<li>
											<a href="<?php the_sub_field('account_link', 'option'); ?>"><?php the_sub_field('platform_name', 'option'); ?></a>
										</li>			
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="row">				
					<div class="footer">
						<p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?></p>
					</div>
				</div>
			</div>
		</div>
	<?php wp_footer(); ?>
	</body>
</html>