<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package diamonddogs
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">


        <?php $slider = get_field('slider_images'); ?>

        <?php if ($slider)  : ?>
            <div class="portfolio-featured">
                <div id="portfolio-carousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">

                        <?php
                        $index = 0;
                        foreach ($slider as $image) {
                            $slider_img = $image['url'];
                            echo '<li data-target="#portfolio-carousel" data-slide-to="' . $index . '"></li>';
                            $index++;
                        } ?>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">

                        <?php
                        foreach ($slider as $image) {
                            $slider_img = $image['url'];
                            echo '<div class="item">';
                            echo '<img src="' . $slider_img . '">';
                            echo '</div>';
                        } ?>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#portfolio-carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#portfolio-carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <! --/Carousel -->
            </div>
        <?php endif; ?>




        <?php if (has_post_thumbnail() && (empty($slider))) { ?>
            <figure clas="featured-image">
                <?php
                $thumb_id = get_post_thumbnail_id();
                $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                if ($thumb_id) {
                    if (is_single()) {
                        echo "<img src='" . $thumb_url[0] . "' class='img-responsive' >";
                    } else {
                        echo "<a href='" . esc_url(get_permalink()) . "'><img src='" . $thumb_url[0] . "' class='img-responsive'></a>";
                    }
                } ?>
            </figure>
        <?php } ?>


    </header><!-- .entry-header -->

    <div class="entry-content">
        <div class="row">
            <?php if (get_field('right_sidebar'))  : ?>
                <div class="col-lg-8">
                    <?php the_content(); ?>
                </div>
                <div class="col-lg-4">
                    <?php the_field('right_sidebar'); ?>
                </div>
            <?php else  : ?>
                <div class="col-lg-12">
                    <?php the_content(); ?>
                </div>
            <?php endif; ?>
        </div>

        <?php
        bootstrap_wp_link_pages(array(
            'before' => '<ul class="pagination">',
            'after' => '</ul>',
        ));
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php badlands_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->