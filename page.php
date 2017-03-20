<?php
/**
 * The template for displaying all pages.
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
<?php
$bg_url = '';
if (get_header_image()) {
    $bg_url = 'style="' . 'background-image:url(' . get_header_image() . ')"';
} ?>



    <!-- ==== HEADERWRAP ==== -->
    <div class="pagewrap" <?php echo $bg_url; ?>>
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header>
    </div><!-- /headerwrap -->


    <div class="container">
    <div class="row">
    <div id="primary" class="content-area <?php echo (is_active_sidebar( 'sidebar-page') ? get_theme_mod('page_layout_setting', 'no-sidebar'):'no-sidebar' ); ?>">
		<main id="main" class="site-main" role="main">


			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('page');
get_footer();