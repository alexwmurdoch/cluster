<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bay3
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
            <h1 class="entry-title"><?php echo get_theme_mod('blog_banner', 'Blog Banner Title'); ?></h1>
        </header>
    </div><!-- /headerwrap -->



    <div class="container">
    <div class="row">
    <div id="primary" class="content-area <?php echo (is_active_sidebar( 'sidebar-blog') ? get_theme_mod('blog_layout_setting', 'sidebar-right'):'no-sidebar' ); ?>">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;
            /*
             * Replacing the simple previous/next page navigation
             * with bootstrap styled pagination.
             */
            //the_posts_navigation();
            bootstrap_the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('blog');
get_footer();