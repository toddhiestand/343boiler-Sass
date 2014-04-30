
<div class="slider">
	<div class="bx-pager-causes bx-pager mobilehide">
		<?php
			if ( get_field('rotator','option') )
			{
				$count=0;
				while ( has_sub_field('rotator','option') )
				{
					echo '<a class="arrow" data-slide-index="'. $count .'" href=""> ' . get_sub_field('slide__title') . '</a> ';
					$count++;
				}
			}
		?>
	</div>
	<ul class="slides">	
		<?php if(get_field('rotator')): ?>
		<?php while(has_sub_field('rotator')): ?>	
			<li class="slide">
				<div class="row">
					<?php the_sub_field('slide_image'); ?>
				</div>
			</li>
		<?php endwhile; ?>
		<?php endif; ?>
	</ul>
	<div class="bx-pager dots">
		<?php
			if ( get_field('rotator') )
			{
				$count=0;
				while ( has_sub_field('rotator') )
				{
					echo '<a data-slide-index="'. $count .'" href=""></a> ';
					$count++;
				}
			}
		?>
	</div>
</div><!-- end slider -->		
			