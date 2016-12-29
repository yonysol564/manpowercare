<?php
    get_header();
    $object = get_queried_object();
    $page_banner  = get_field('page_banner');
    $customers_rep  = get_field('customers_rep');
    $category = get_the_category();
    $cat_title = $category[0]->cat_name;
    $single_content = get_field('single_content');
?>

<?php while ( have_posts() ) : the_post(); ?>
    <div class="page_banner" style="background-image: url(<?php echo $page_banner['url']; ?>);">
        <div class="row">
            <div class="large-12 column"> 
                <div class="wrap_title">     
                    <h1>
                        <?php echo $cat_title; ?>
                    </h1>
                </div>
            </div>
        </div>
        <?php get_template_part('inc/breadcrumbs'); ?>
    </div>
    <div class="single_sec cat_single">
        <div class="sec_inner">
            <div class="row">
                <div class="large-12 column">
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                </div>
            </div>
            <?php if ($single_content) { 
                foreach ($single_content as $cont) { ?>
                    <div class="row">
                        <div class="large-12 column">
                          <h3><?php echo $cont['single_content_title']; ?></h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="large-12 column">
                          <div class="single_desc">
                              <?php echo $cont['single_content_desc']; ?>
                          </div>
                        </div>
                    </div>

                    <div class="row images_row">
                        <?php foreach ($cont['single_content_images'] as $images) { ?>
                            <div class="large-4 column col_single_img">
                              <div class="single_img">
                                 <img src="<?php echo $images['single_con_img']['url']; ?> " title="" alt="">
                              </div>
                            </div>
                        <?php } ?>

                    </div>
                <?php } 
           } ?>

            <div class="wave">
            </div>
        </div>
        <div class="wrap_single">
            <?php get_template_part('inc/contact', 'form'); ?>
        </div>
    </div>
<?php endwhile; // End of the loop.?>
<?php
get_sidebar();
get_footer();
?>

