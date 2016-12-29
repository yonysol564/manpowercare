<?php
/* Template Name: Home */
get_header();
$home_banner = get_field('home_banner');
?>

<?php while ( have_posts() ) : the_post(); ?>
	<div class="home_wrapper">
		<div class="home_banner">
			<?php foreach ($home_banner as $banner) { 
				$banner_img  = $banner['home_banner_img'];
				$banner_text = $banner['home_banner_text'];
			?>			
				<div class="inner_banner" style="background-image: url( <?php echo $banner_img['url']; ?>);">
					<div class="abs_banner_div">
						<div class="inner_abs">
							<?php echo $banner_text; ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<section class="home_sec home_cat_sec">
			<div class="row">
				<div class="large-4 column home_cat_col">
					<a href="#">
						<div class="home_cat_img" style="background-image: url( <?php echo THEME_DIR . '/images/imgcat1.png'; ?>);">
							<div class="abs_div">
								Physical Activity
							</div>
						</div>
					</a>
				</div>
				<div class="large-4 column home_cat_col">
					<a href="#">
						<div class="home_cat_img" style="background-image: url( <?php echo THEME_DIR . '/images/imgcat2.png'; ?>);">
							<div class="abs_div">
								Diabetes
							</div>
						</div>
					</a>
				</div>
				<div class="large-4 column home_cat_col">
					<a href="#">
						<div class="home_cat_img" style="background-image: url( <?php echo THEME_DIR . '/images/imgcat3.png'; ?>);">
							<div class="abs_div">
								Alzheimer’s
							</div>
						</div>
					</a>
				</div>
			</div>
		</section>

		<section class="home_sec home_services_sec">
			<div class="row">
				<div class="large-9 column">
					<a href="#">
						<div class="home_cat_img">
							<div class="abs_div">
								Diabetes
							</div>
						</div>
					</a>
				</div>
				<div class="large-3 column">
					<div class="wrap_form">
						<?php echo do_shortcode('[contact-form-7 id="48" title="Home Conatct Form"]'); ?>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php endwhile; // End of the loop.?>
<?php
get_sidebar();
get_footer();
?>