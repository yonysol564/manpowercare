<?php global $projects , $post; ?>
	<div class="medium-4 column end">
		<div class="main">
			<?php //$counter = 1; ?>
			<div>
				<?php the_post_thumbnail(); ?>
			</div>
			<div>
				<?php echo get_the_title($post->ID); ?>
			</div>
		</div>
	</div>
