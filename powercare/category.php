<?php
    get_header();
    $object = get_queried_object();
    $page_banner  = get_field('page_banner', 'category_' . $object->term_id);
    $cat_subtitle  = get_field('cat_subtitle', 'category_' . $object->term_id);
    $cat_name = get_cat_name( $object->term_id);
    $bag_toyou     = get_field('bag_toyou','option');
?>


    <div class="page_banner" style="background-image: url(<?php echo $page_banner['url']; ?>);">
        <div class="row">
            <div class="large-12 column"> 
                <div class="wrap_title">     
                    <h1>
                        <?php echo $cat_name; ?>
                    </h1>
                </div>
            </div>
        </div>
        <?php get_template_part('inc/breadcrumbs'); ?>
    </div>
    <div class="category_sec">
        <div class="sec_inner">
            <div class="row">
                <div class="large-12 column">
                    <h2>
                        <?php echo $cat_subtitle; ?>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="large-12 column">
                    <div class="wrap_con">
                       <?php echo category_description($object->term_id); ?> 
                    </div>
                </div>
            </div>
            
            <div class="row">
    			<?php while ( have_posts() ) : the_post(); 
    				$post_img =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    			?>
    				<div class="large-4 medium-6 column cat_col end">
                        <a href="<?php echo the_permalink(); ?>" title="">   
                            <div class="category_box" style="background-image: url( <?php echo $post_img; ?> );">
                                <div class="hover_state">
                                    <h4>
                                        <?php the_title(); ?>
                                    </h4>
                                    <div class="cat_con">
                                        <p>
                                        	<?php dynamic_excerpt(230 , $post); ?>
                                        </p>
                                    </div>
                                    <img src="<?php echo THEME_DIR; ?>/images/caret.png" alt="caret">
                                </div>
                            </div>
                        </a>
                    </div>
    			<?php endwhile; // End of the loop.	?>
            </div>
            <div class="row">
            	<div class="large-12 column">
            		<a class="bag_to_you" href="#" title="">
            			<div class="bag_title">
            				<?php echo $bag_toyou; ?>
            			</div>
            			<img src="<?php echo THEME_DIR; ?>/images/caretbig.png" alt="caret">
            		</a>
            	</div>
            </div>
            <div class="wave">
            </div>
        </div>
        <div class="category_wrap">  
            <?php get_template_part('inc/contact', 'form'); ?>
        </div>

    </div>

<?php
get_sidebar();
get_footer();
?>
