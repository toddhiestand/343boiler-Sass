<?php get_header() ?>
	
	<?php get_template_part( 'head'); ?>

<div class="container">

	<div class="row">

		<div class="page-content col span_16 clr">

			<?php get_template_part( 'inc/loop'); ?>

		</div>

		<?php get_sidebar()?>

	</div><!-- end row-->

</div> <!-- end container--> 

<?php get_footer() ?>