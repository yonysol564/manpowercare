<?php
/**
 * Template Name: HOME page
 */
?>
<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>
<div id="content" class="full-width">

	<?php while ( have_posts() ) : the_post(); ?>
				<div class="home_banner">
			<?php $home_banner = get_field('home_banner'); ?>
			<?php foreach ($home_banner as $banner) { 
				$banner_img  = $banner['home_banner_img'];
				$banner_text = $banner['home_banner_text'];
			?>			
				<div class="inner_banner" style="background-image: url( <?php echo $banner_img['url']; ?> );">
					<div class="abs_banner_div"> 
						<div class="inner_abs">
							<?php echo $banner_text; ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php echo avada_render_rich_snippets_for_pages(); ?>
			<?php echo avada_featured_images_for_pages(); ?>
			

			<div class="post-content">
				<div class="home_content">
					<div class="row f_row">
						<?php the_content(); ?>
					</div>
				</div>
				<?php avada_link_pages(); ?>
			</div>
		<?php /*
			<section class="home_sec home_cat_sec">
				<div class="row f_row">

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
			<div class="row f_row">
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
			*/ ?>


			<?php if ( ! post_password_required( $post->ID ) ) : ?>
				<?php if ( Avada()->settings->get( 'comments_pages' ) ) : ?>
					<?php wp_reset_query(); ?>
					<?php comments_template(); ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	<?php endwhile; ?>
</div>
<?php get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
