<?php
	 $logo = get_field('logo','option');
	 $header_phone  = get_field('header_phone', 'option');
	 $phone_small_title= get_field('phone_small_title', 'option');
	 $facebook_img = get_field('facebook_img', 'option');
	 $facebooh_link  = get_field('facebooh_link', 'option');
?>
<!doctype html>
<!--[if lt IE 10]><html lang="he" class="lt10"><![endif]-->
<!--[if gt IE 9]><!-->
<html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
<title><?php wp_title(); ?></title>
<!--[if lt IE 10]>
	<script type='text/javascript'>
		$(document).ready(function(){
			$.get('browsers.html' , function(data){
				$('body').html(data);
			});
		});
	</script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
	<div class="title-bar" data-hide-for="medium">
		<div class="logo_wrap logo_wrap_mobile mobile_only">
	  		<a class="logo_img" href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo($show = 'name'); ?>">
				<div>
					<img src="<?php echo $logo['url']; ?>" title="<?php echo get_bloginfo($show = 'name'); ?>" alt="<?php echo get_bloginfo('name'); ?>">
				</div>
			</a>
		</div>
			<a href="#" class="mobile_only open_menu toggle_btn_menu">
				<img src="<?php echo THEME_DIR; ?>/images/mobile_menu.png" alt="open">	
			</a>
			<a href="#" class="mobile_only close_menu toggle_btn_menu">
				<img src="<?php echo THEME_DIR; ?>/images/mobile_close_menu.png" alt="close">
			</a>
		<div class="title-bar-title"></div>
	</div>
	<div class="top-bar menu_div">
		<div class="top_header clearfix">	
			<div class="row f_row">
				<div class="large-12 column">

					<div class="logo_wrap desktop_only">
				  	<a class="logo_img" href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo($show = 'name'); ?>">
							<div>
								<img src="<?php echo $logo['url']; ?>" title="<?php echo get_bloginfo($show = 'name'); ?>" alt="<?php echo get_bloginfo('name'); ?>">
							</div>
						</a>
					</div>

					<div class="header_phone">
						<a href="tel:<?php echo $header_phone; ?>">
							<div class="phone_num">
								<?php echo $header_phone; ?>
							</div>
							<div class="phone_small_title">
								<?php echo $phone_small_title;  ?>
							</div>
						</a>
					</div>

					<div class="social_wrap">
						<a href="<?php $facebook_link; ?>" target="_blank">
							<img src="<?php echo $facebook_img['url']; ?>" alt="facebook">
						</a>
					</div>
				
					<div class="header_form">
						<form role="search" method="get" action="<?php echo home_url(); ?>" >  
						    <div class="input_div">
						      <input class="form-control input_search" type="search" name="s" id="search" placeholder="<?php _e('Search','carmit'); ?>">
						      <button class="search-submit" type="submit" role="button">
						      		<i class="fa fa-search" aria-hidden="true"></i>
						      </button>
						    </div>
						</form>
					</div>

					<div class="wrap_lang desktop_only">
						<?php icl_post_languages(); ?>
					</div>

				</div>
			</div>
		</div>
		
		<nav>
			<div class="row f_row">
				<div class="large-12 column">
	    			<?php wp_nav_menu( array('theme_location' => 'top_menu','menu_class' => 'top_menu')); ?>
				</div>
			</div>
		</nav>

	</div>	
</header>




