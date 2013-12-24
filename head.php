</head>

<body <?php body_class(); ?>>

<div class="wide-container header-wide">

	<div class="container row">
	
		<div class="row">
	
			<div class="siteid col span_10">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>		
			</div>
	
			<div class="nav col span_14">
				<?php wp_nav_menu( array( 'theme_location' => 'utility-menu' ) ); ?>
				<!-- The href attribute is used to load external HTML content into your panel -->
			</div>
	
		</div> <!-- end row -->
	
	</div><!-- end container -->

</div>