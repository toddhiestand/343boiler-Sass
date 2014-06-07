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
		<link href="<?php bloginfo('template_directory'); ?>/stylesheets/theme.css" rel="stylesheet" type="text/css" />

		<!-- This is the theme's responsive framework stylesheet, delete it at your own peril! -->
		<link href="<?php bloginfo('template_directory'); ?>/css/responsive-gs-24col.css" rel="stylesheet" type="text/css" />

		<!-- theme.js -->
		<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/theme.js'></script>

		<!-- add open graph -->
		<?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?>

			<!-- if page is content page -->
			<?php if (is_single()) { ?>
				<meta property="og:url" content="<?php the_permalink() ?>"/>
				<meta property="og:title" content="<?php single_post_title(''); ?>" />
				<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
				<meta property="og:type" content="article" />
				<meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); }?>" />

			<!-- if page is others -->
			<?php } else { ?>
				<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
				<meta property="og:description" content="<?php bloginfo('description'); ?>" />
				<meta property="og:type" content="website" />
				<meta property="og:image" content="<?php bloginfo('template_directory'); ?>/images/fb-logo.png" /> <?php } ?>

		<?php wp_head(); ?>