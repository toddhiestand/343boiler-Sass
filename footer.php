		<div class="wide-container footer-wide">
		
			<div class="container">
			
				<div class="row">
			
					<div class="footer">
			
						<nav id="footer">
							<?php wp_nav_menu( array( 'theme_location' => 'utility-menu' ) ); ?>
						</nav>
			
						<p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> | <?php $options = get_option('clean_theme_options'); echo $options['footer_address']; ?></p>
			
					</div><!-- end footer -->	
			
				</div><!-- end row -->
			
			</div><!-- end container -->
		
		</div>
		
		

	<?php wp_footer(); ?>
	
	</body>

</html>

<!-- Just some parallax awesomeness -->
<script>
$(function(){
	$.stellar({
		horizontalScrolling: false,
		verticalOffset: 200
	});
});
</script>


<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.slidepanel.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/jquery.slidepanel.css">

<script type="text/javascript">
      $(document).ready(function(){
          $('[data-slidepanel]').slidepanel({
              orientation: 'left',
              mode: 'push'
          });
      });
</script>