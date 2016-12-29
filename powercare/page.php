<?php
    get_header();
    $contact_form  = get_field('page_contactform');
?>

<?php while ( have_posts() ) : the_post(); ?>
    <?php // get_template_part('inc/page', 'banner'); ?>
    <?php $page_banner = get_field('page_banner'); ?>
    <div class="page_banner defpage_banner">
        <div class="row">
            <div class="large-12 column">
                <div class="inner_banner" style="background-image: url(  <?php echo $page_banner['url']; ?> );">
                    <div class="wrap_h1">
                        <h1 class="head"><?php  the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <?php get_template_part('inc/breadcrumbs'); ?>
    <section class="page_sec">
        <div class="inner_about">

            <div class="row">
                <div class="large-12 column">
                    <div class="about_con">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="large-12 column">
                    <div class="wrap_form page_wrap_form">
                       <?php echo do_shortcode($contact_form); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; // End of the loop.?>
<?php
get_sidebar();
get_footer();
?>
