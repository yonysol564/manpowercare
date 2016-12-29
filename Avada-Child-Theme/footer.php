<div class="clearfix"></div>
<?php 
	$footer_phone = get_field('footer_phone', 'option');
	$footer_phone_small_title = get_field('footer_phone_small_title', 'option');

	$footer_copy = get_field('copy_right', 'option');
	$copy_right_link = get_field('copy_right_link', 'option');
?>
<footer>
	<div class="footer_menu">
		<div class="row f_row">
			<div class="large-12 column">
				<div class="wrap_menu_col">
					<?php wp_nav_menu( array('theme_location' => 'footer_menu_one','menu_class' => 'footer_menu_ul')); ?>
				</div>
				<div class="wrap_menu_col">
					<?php wp_nav_menu( array('theme_location' => 'footer_menu_two','menu_class' => 'footer_menu_ul')); ?>
				</div>
				<div class="wrap_menu_col">
					<?php wp_nav_menu( array('theme_location' => 'footer_menu_three','menu_class' => 'footer_menu_ul')); ?>
				</div>
				<div class="wrap_menu_col">
					<?php wp_nav_menu( array('theme_location' => 'footer_menu_four','menu_class' => 'footer_menu_ul')); ?>
				</div>
				<div class="wrap_menu_col">
					<?php wp_nav_menu( array('theme_location' => 'footer_menu_five','menu_class' => 'footer_menu_ul')); ?>
				</div>
				<div class="wrap_footer_num">
					<a href="tel:<?php echo $header_phone; ?>">
						<div class="phone_num">
							<?php echo $footer_phone; ?>
						</div>
						<div class="phone_small_title">
							<?php echo $footer_phone_small_title;  ?>
						</div>
					</a>							
				</div>
			</div>
		</div>
	</div>
	<div class="inner_div">
		<a href="<?php echo $copy_right_link ?>" target="_blank">
			<?php echo $footer_copy; ?>
		</a>
	</div>
</footer>
<?php wp_footer(); ?>

<!-- Go to www.addthis.com/dashboard to customize your tools --> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-581596cf85ebe836"></script> 
</body>
</html>
