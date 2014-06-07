<div class="sidebar col span_8">	

	<?php
	  if($post->post_parent)
	  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
	  else
	  $children = wp_list_pages("depth=1&title_li=&child_of=".$post->ID."&echo=0");
	  if ($children) { ?>
	  	<section class="subpages">
		  <ul>
			  <?php echo $children; ?>
		  </ul>
	  	</section>	
  	<?php } ?>

	<?php if ( !function_exists('dynamic_sidebar')
		|| !dynamic_sidebar(pagesidebar) ) : ?>
	<?php endif; ?>

</div><!-- end sidebar-->