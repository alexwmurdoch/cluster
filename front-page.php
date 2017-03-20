<?php
/**
 * The template for displaying custom layout front page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package badlands
 */

get_header(); ?>

<?php if (have_rows('content_blocks')): ?>

    <?php // loop through the rows of data ?>
    <?php while (have_rows('content_blocks')) : the_row(); ?>


        <?php if (get_row_layout() == 'hero_content'): ?>
            <div class="headerwrap" style="background-image:url(<?php the_sub_field('hero_content_image') ?>)">
                <?php the_sub_field('hero_content'); ?>
            </div>
        <?php endif; ?>

        <?php if (get_row_layout() == 'two_column_layout'): ?>
            <section class="front two-column">
                <div class="container wrap-section">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2><?php the_sub_field('banner_title'); ?></h2>
                        </div><!-- col-lg-12 -->
                    </div><!-- row -->
                    <div class="row">
                        <div class="col-lg-6">
                            <?php the_sub_field('left_content'); ?>
                        </div><!-- col-lg-6 -->

                        <div class="col-lg-6">
                            <?php the_sub_field('right_content'); ?>
                        </div><!-- col-lg-6 -->
                    </div><!-- row -->
                </div><!-- container -->
            </section>
        <?php endif; ?>


        <?php if (get_row_layout() == 'slider'): ?>
            <?php $slideraction = get_sub_field('slider_action'); ?>
            <?php if (have_rows('slide')): ?>
                <div id="slider-carousel" class="carousel <?php echo $slideraction['value']; ?>" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators"></ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner fullheight">
                        <?php while (have_rows('slide')): the_row(); ?>
                            <div class="item">
                                <img src="<?php the_sub_field('image'); ?>" alt="">
                                <div class="carousel-caption container">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <?php the_sub_field('content'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#slider-carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#slider-carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>


        <?php if (get_row_layout() == 'divider_content'): ?>
            <section class="section-divider textdivider divider4"
                     style="background-image:url(<?php the_sub_field('divider_image') ?>)">
                <div class="container">
                    <?php the_sub_field('banner_text'); ?>
                </div><!-- container -->
            </section><!-- section -->
        <?php endif; ?>


        <?php if (get_row_layout() == 'editor_column_slider_column'): ?>
            <section class="front text-then-image">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-content col-sm-6 <?php echo(get_sub_field('text_on_left') ? 'textleft' : 'col-sm-push-6'); ?>">
                            <?php the_sub_field('content'); ?>
                        </div>

                        <div class="col-slider col-sm-6 <?php echo(get_sub_field('text_on_left') ? 'textleft' : 'col-sm-pull-6'); ?>">
                            <?php if (have_rows('slide')): ?>
                                <div class="carousel slide half-slider" data-ride="carousel">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <?php $addclass = "active"; ?>
                                        <?php while (have_rows('slide')): the_row(); ?>
                                            <div class="item <?php echo $addclass; ?>">
                                                <?php $addclass = ""; ?>
                                                <img src="<?php the_sub_field('image'); ?>" alt="">
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>


        <?php if (get_row_layout() == 'service_content'): ?>
            <section class="front services">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2><?php the_sub_field('service_title'); ?></h2>

                        </div>
                    </div><!-- /row -->
                    <div class="row">
                        <?php
                        // the query
                        $the_query = new WP_Query(array('post_type' => 'service', 'posts_per_page' => 6)); ?>

                        <?php if ($the_query->have_posts()) : ?>
                            <!-- the loop -->
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <div class="col-lg-4">
                                    <?php get_template_part('template-parts/content-service', get_post_format()); ?>
                                </div>
                            <?php endwhile; ?>
                            <!-- end of the loop -->
                            <?php wp_reset_postdata(); ?>

                        <?php else : ?>
                            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                    </div><!-- row -->
                </div>
            </section>
        <?php endif; ?>

        <?php if (get_row_layout() == 'portfolio_content'): ?>
            <section class="front portfolio">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2><?php the_sub_field('portfolio_title'); ?></h2>
                        </div>
                    </div><!-- /row -->
                    <?php
                    // the query
                    $the_query = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => 6)); ?>

                    <?php
                    if (get_theme_mod('portfolio_filter') == '1') {
                        $terms = get_terms("portfolio_tags");
                        $count = count($terms);
                        echo '<div class="row"><div class="col-lg-12"><ul id="filters" class="list-inline">';
                        echo '<li><button type="button" class="btn btn-link" data-filter="*">' . __('All', 'badlands') . '</button></li>';
                        if ($count > 0) {
                            foreach ($terms as $term) {
                                $termname = strtolower($term->name);
                                $termname = str_replace(' ', '-', $termname);
                                echo '<li><button type="button" class="btn btn-link" data-filter=".' . $termname . '">' . $term->name . '</button></li>';
                            }
                        }
                        echo "</ul></div></div>";
                    }
                    ?>
                    <?php if ($the_query->have_posts()) : ?>
                    <div class="row">
                        <div id="portfolio-items">

                            <!-- the loop -->
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                                <?php
                                $terms = get_the_terms($post->ID, 'portfolio_tags');

                                if ($terms && !is_wp_error($terms)) :
                                    $links = array();

                                    foreach ($terms as $term) {
                                        $links[] = $term->name;
                                    }
                                    $links = str_replace(' ', '-', $links);
                                    $tax = join(" ", $links);
                                else :
                                    $tax = '';
                                endif;
                                ?>
                                <div class="<?php echo get_theme_mod('portfolio_layout_setting', 'portfolio-three-col'); ?> item <?php echo strtolower($tax); ?>">
                                    <div class="grid mask">
                                        <?php get_template_part('template-parts/content-portfolio', get_post_format()); ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <!-- end of the loop -->
                            <?php wp_reset_postdata(); ?>

                            <?php else : ?>
                                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                            <?php endif; ?>

                        </div><!-- row -->
                    </div><!-- .portfolio-items -->
                </div><!-- container -->
            </section>
        <?php endif; ?>


    <?php endwhile; ?>

<?php else : ?>

    <?php // no layouts found ?>

<?php endif; ?>


<?php get_footer(); ?>