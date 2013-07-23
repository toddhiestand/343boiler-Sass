<!doctype html>  

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>

		<!-- mobile meta (hooray!) -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- This is the theme's stylesheet, delete it at your own peril! -->
		<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet" type="text/css" />

		<!-- This is the theme's responsive framework stylesheet, delete it at your own peril! -->
		<link href="<?php bloginfo('template_directory'); ?>/css/responsive-gs-24col.css" rel="stylesheet" type="text/css" />

		<?php wp_head(); ?>