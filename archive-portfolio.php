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
            <h1 class="entry-title"><?php echo get_theme_mod('portfolio_banner', 'Portfolio Banner Title'); ?></h1>
        </header>
    </div><!-- /headerwrap -->

    <div class="container">
        <div class="row">
            <div id="primary" class="content-area col-md-12">
                <main id="main" class="site-main" role="main">


                    <?php
                    if (get_theme_mod('portfolio_filter') == '1') {
                        $terms = get_terms("portfolio_tags");
                        $count = count($terms);
                        echo '<ul id="filters" class="list-inline">';
                        echo '<li><button type="button" class="btn btn-link" data-filter="*">' . __('All', 'badlands') . '</button></li>';
                        if ($count > 0) {
                            foreach ($terms as $term) {
                                $termname = strtolower($term->name);
                                $termname = str_replace(' ', '-', $termname);
                                echo '<li><button type="button" class="btn btn-link" data-filter=".' . $termname . '">' . $term->name . '</button></li>';
                            }
                        }
                        echo "</ul>";
                    }
                    ?>

                    <?php
                    if (have_posts()) : ?>

                        <div class="row">
                            <div id="portfolio-items">
                                <?php while (have_posts()) : the_post(); ?>

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
                                    </div> <!-- .col-sm-6 .col-md-portfolio column variable-->
                                <?php endwhile; ?>
                            </div><!-- .portfolio-items -->
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
