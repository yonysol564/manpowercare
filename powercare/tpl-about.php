<?php
/* Template Name: About */
	get_header();
	?>
	
<?php while ( have_posts() ) : the_post(); ?>
	<div class="wrapper about_wrapper">
		<div class="inner_wrapper">
			<div class="mobile_only about_mobile_wrap">
				<div class="row">
					<div class="large-12 column">
						<h1>
							<?php the_title(); ?>
						</h1>
					</div>
				</div>
				<div class="row">
					<div class="small-8 column">
						<div class="wrap_con">
							<?php the_content(); ?>
						</div>
					</div>
					<div class="small-4 column img_col">
						<?php the_post_thumbnail();  ?>
					</div>
				</div>
			</div>

			<div class="desktop_only">
				<div class="row">
					<div class="large-3 column img_col">
						<?php the_post_thumbnail();  ?>
					</div>

					<div class="large-9 column">
						<h1>
							<?php the_title(); ?>
						</h1>
						<div class="wrap_con">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; // End of the loop.?>

<?php
get_sidebar();
get_footer();
?>
