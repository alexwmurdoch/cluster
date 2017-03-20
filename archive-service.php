<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package diamonddogs
 */

get_header(); ?>

<?php
$bg_url = '';
if (get_header_image()) {
    $bg_url = 'style="' . 'background-image:url(' . get_header_image() . ')"';
} ?>


    <!-- ==== HEADERWRAP ==== -->
    <div class="pagewrap" <?php echo $bg_url; ?>>
        <header class="entry-header">
            <h1 class="entry-title"><?php echo get_theme_mod('service_banner', 'Services Banner Title'); ?></h1>
        </header>
    </div><!-- /headerwrap -->

    <div class="container">
        <div class="row">
            <div id="primary" class="content-area col-md-12">
                <main id="main" class="site-main" role="main">


                    <?php

                    if (have_posts()) : ?>
                        <div class="col-lg-12 ">
                            <h2 class="service-header text-center"><?php echo get_theme_mod('service_intro_header', 'Service Page Introduction Header'); ?></h2>
                            <div class="service-intro text-center"><?php echo get_theme_mod('service_intro', 'Service Page Introduction'); ?></div>
                        </div>

                        <div id="service" class="row">
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="callout <?php echo get_theme_mod('service_layout_setting', 'service-three-col'); ?>">
                                    <?php get_template_part('template-parts/content-service', get_post_format()); ?>
                                </div> <!-- .col-sm-6 .col-md-4-->
                            <?php endwhile; ?>
                        </div><!-- .row -->


                        <!--the_posts_navigation();-->
                        <?php bootstrap_the_posts_pagination(); ?>
                    <?php else : ?>
                        <?php get_template_part('template-parts/content', 'none'); ?>
                    <?php endif; ?>

                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .row -->
    </div><!-- .container -->
<?php

get_footer();
