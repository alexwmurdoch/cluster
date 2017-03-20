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
    <figure class="portfolio-content">
        <?php if (has_post_thumbnail()) { ?>
            <?php
            $thumb_id = get_post_thumbnail_id();
            $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
            if ($thumb_id) {
                echo "<img src='" . $thumb_url[0] . "' class='img-responsive'>";
            } ?>
            <figcaption class="portfolio-overlay">

                <h5><?php the_title(); ?></h5>
                <a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
            </figcaption>
        <?php } ?>
    </figure>
</article><!-- #post-## -->
