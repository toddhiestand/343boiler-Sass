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

	<?php wp_footer(); ?>
	
	</body>

</html>