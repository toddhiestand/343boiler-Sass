<?php get_header() ?>
	<?php get_template_part( 'head'); ?>
	<div  class="wide-container">
		<div class="container">
			<div class="row">
				<div class="page-content col span_16 clr">
					<header>
						<h1>Not Found</h1>
					</header>
					<p>Uh. I think you broke the internet.</p>
					<p>Why don't you do a search?</p>
					<p><?php get_search_form(); ?></p>
				</div>
				<?php get_sidebar()?>
			</div><!-- end row-->
		</div> <!-- end container--> 
	</div>
<?php get_footer() ?>



