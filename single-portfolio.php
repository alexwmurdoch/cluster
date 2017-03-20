<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package diamonddogs
 */

get_header(); ?>
<?php
$bg_url ='';
if (get_header_image()) {
    $bg_url = 'style="' . 'background-image:url(' . get_header_image() . ')"';
}?>

    <!-- ==== HEADERWRAP ==== -->
    <div class="pagewrap" <?php echo $bg_url; ?>>
        <header class="entry-header">
            <?php the_title( '<h1>', '</h1>' ); ?>
        </header>
    </div><!-- /headerwrap -->

    <div class="container">
    <div class="row">
    <div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single-portfolio' );

            bootstrap_the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();