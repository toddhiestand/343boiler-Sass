<?php get_header() ?>
	
	<?php get_template_part( 'head'); ?>

<div class="container">

	<div class="row">

		<div class="page-content col span_16 clr">

			<header>
				<h1>Not Found</h1>
			</header>

			<p>Sorry, something is broke or has been moved.</p>
			
			<p>Why dont you do a search?</p>
			<p><?php get_search_form(); ?></p>

		</div>

		<?php get_sidebar()?>

	</div><!-- end row-->

</div> <!-- end container--> 

<?php get_footer() ?>



