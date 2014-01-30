</head>

<body <?php body_class(); ?>>

<div class="wide-container header-wide">

	<div class="container row">
	
		<div class="row">
	
			<div class="siteid col span_8">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<!-- Comment out the site description unless we want it <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2> -->
			</div>
	
			<div class="nav col span_16">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
				<!-- The href attribute is used to load external HTML content into your panel -->
			</div>
	
		</div> <!-- end row -->
	
	</div><!-- end container -->

</div>