<?php get_header(); ?>
<?php
	$page_banner = get_field('page_banner');
	$read_more = get_field('read_more','option');
?>


<div class="page_banner faq_banner">
    <div class="row">
        <div class="large-12 column">
            <div class="inner_banner" style="background-image: url( <?php echo THEME_DIR . '/images/pagebanner.png'; ?>);">
                <div class="wrap_h1">
                    <h1 class="head"><?php _e('Search','neurotech'); ?></h1>
                </div>
            </div>
        </div>
    </div>    
</div>


<?php get_template_part('inc/breadcrumbs'); ?>
<div class="wrap_page">

	<section class="search_sec about_con_sec">
		<div class="row">
			<div class="large-12 column">
				<div class="to_div">
				<h1>
					<span><?php _e('Search Results','neurotech'); ?></span>
				</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="search_results">	
			<div role="main" class="row">
				<div class="large-12 column col_head">
					<h4>
					<?php if (is_rtl()) {
						echo sprintf( __( '%s תוצאות עבור ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query();
					} else {
					 	echo sprintf( __( '%s Results For ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); 
					} ?>
					</h4>
				</div>
				<div class="large-12 column border_row">
					<div class="border_con">
						
					</div>
				</div>
				<div class="large-12 column results_div">
				  <ul>
					<?php while(have_posts()): the_post(); ?>
						    <li>
						    	<h3 href="<?php the_permalink(); ?>"><?php the_title(); ?></h3>
								<div class="search_desc">
									<?php dynamic_excerpt(400, $post) ?>
								</div>
								<a href="<?php the_permalink(); ?>"><?php echo $read_more; ?></a></a>
								<div class="clearfix"></div>
						    </li>	
					<?php endwhile; ?>
				  </ul>
				</div>	  
				<?php get_template_part('pagination'); ?>

				<div class="large-12 column pagination_col">	
					<div class="pagination_div">
						<?php 
							my_pagination();		
						?>
					</div>
				</div>
			</div>
	</section>
</div>
<?php get_footer(); ?>
