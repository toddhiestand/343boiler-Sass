</head>

<body <?php body_class(); ?>>

<div class="wide-container id-wide">
	<div class="container">
		<div class="row nopadrow">
			<div class="col span_18">
				<div class="col span_5 hope">
					<a href="http://www.showhope.org">Show Hope</a>
				</div>
				<div class="col span_19">
					<p class="showhope">Restoring the hope of a family to orphans in distress.</p>
				</div>
			</div>
			<div class="col span_6 searchForm mobilehide">
				    <form class="headSearch" action="/" method="get">
					    <fieldset>
					        <input type="text" name="s" placeholder="Search the Site" id="search" value="<?php the_search_query(); ?>" />
					        <input type="image" src="<?php bloginfo('template_directory'); ?>/images/magnify.png" name="search" alt="Search" class="button" />
					    </fieldset>
					</form>
			</div>
		</div>
	</div>
</div>

<div class="wide-container header-wide">
	<div class="container">
		<div class="row">
			<div class="siteid col span_6">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<!-- Comment out the site description unless we want it <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2> -->
			</div>
			<div class="nav col span_18">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
				<!-- The href attribute is used to load external HTML content into your panel -->
			</div>
		</div> <!-- end row -->
	</div><!-- end container -->
</div>