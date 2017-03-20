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
    <h3> <?php the_field('icon'); ?> <?php the_title(); ?></h3>
    <?php the_content(); ?>
</article><!-- #post-## -->
