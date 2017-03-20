<?php
/**
 * badlands Theme Customizer
 *
 * @package badlands
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function badlands_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'badlands_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function badlands_customize_preview_js() {
    wp_enqueue_script( 'badlands_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'badlands_customize_preview_js' );

/**
 * Enqueue the kirki stylesheet.
 */
function badlands_customizer_stylesheet() {
    wp_enqueue_style( 'badlands-kirki-customizer-css', get_template_directory_uri() . '/inc/kirkiassets/css/badlands-kirki-styles.css');
}
add_action( 'customize_controls_print_styles', 'badlands_customizer_stylesheet' );


/**
 * Add the theme configuration
 */
badlands_Kirki::add_config( 'badlands_theme', array(
    'option_type' => 'theme_mod',
    'capability'  => 'edit_theme_options',
) );

/********************************************************************************************************************
 * Add section for Site Layout, settings and controls
 *******************************************************************************************************************/

badlands_kirki::add_section( 'site_layout', array(
    'title'      => esc_attr__( 'Site Layout', 'badlands' ),
    'priority'   => 3,
    'capability' => 'edit_theme_options',
    'description' => __( 'From this panel you control the site layout.', 'badlands' ),
) );

badlands_kirki::add_field( 'badlands', array(
    'type'     => 'text',
    'settings' => 'blog_banner',
    'label'    => __( 'Blog Page Title', 'badlands' ),
    'section'  => 'site_layout',
    'default'  => esc_attr__( 'Blog Banner Title', 'badlands' ),
    'priority' => 10,
    'transport'   => 'postMessage',
) );

/**
 * Add a Field to change the blog layout
 */
badlands_kirki::add_field( 'badlands', array(
    'type'        => 'radio-image',
    'setting'     => 'blog_layout_setting',
    'label'       => __( 'Blog Post Layout', 'badlands' ),
    'description' => __( 'Choose from a left sidebar layout, fullwidth layout, or a right sidebar layout.  Blog Sidebar widgets require to be added for sidebars to be shown', 'badlands' ),
    'section'     => 'site_layout',
    'default'     => 'sidebar-right',
    'priority'    => 10,
    'choices'     => array(
        'sidebar-left' => trailingslashit( get_template_directory_uri() ) . 'inc/kirkiassets/images/2cl.png',
        'no-sidebar' => trailingslashit( get_template_directory_uri() ) . 'inc/kirkiassets/images/1c.png',
        'sidebar-right' => trailingslashit( get_template_directory_uri() ) . 'inc/kirkiassets/images/2cr.png',
    ),
    'transport'   => 'postMessage',

));

/**
 * Add a Field to change the page layout
 */
badlands_kirki::add_field( 'badlands', array(
    'type'        => 'radio-image',
    'setting'     => 'page_layout_setting',
    'label'       => __( 'Page Layout', 'badlands' ),
    'description' => __( 'Choose from a left sidebar layout, fullwidth layout, or a right sidebar layout.  Page Sidebar widgets require to be added for sidebars to be shown', 'badlands' ),
    'section'     => 'site_layout',
    'default'     => 'no-sidebar',
    'priority'    => 10,
    'choices'     => array(
        'sidebar-left' => trailingslashit( get_template_directory_uri() ) . 'inc/kirkiassets/images/2cl.png',
        'no-sidebar' => trailingslashit( get_template_directory_uri() ) . 'inc/kirkiassets/images/1c.png',
        'sidebar-right' => trailingslashit( get_template_directory_uri() ) . 'inc/kirkiassets/images/2cr.png',
    ),
    'transport'   => 'postMessage',

));


/********************************************************************************************************************
 * Add section for Portfolio Layout, settings and controls
 *******************************************************************************************************************/

badlands_kirki::add_section( 'portfolio_layout', array(
    'title'      => esc_attr__( 'Portfolio Layout', 'badlands' ),
    'priority'   => 3,
    'capability' => 'edit_theme_options',
    'description' => __( 'From this panel you control the portfolio layout.', 'badlands' ),
) );

badlands_kirki::add_field( 'badlands', array(
    'type'     => 'text',
    'settings' => 'portfolio_banner',
    'label'    => __( 'Portfolio Page Title', 'badlands' ),
    'section'  => 'portfolio_layout',
    'default'  => esc_attr__( 'Portfolio Banner Title', 'badlands' ),
    'priority' => 10,
    'transport'   => 'postMessage',
) );

badlands_kirki::add_field( 'badlands', array(
    'type'        => 'switch',
    'settings'    => 'portfolio_filter',
    'label'       => __( 'Enable/Disable the Portfolio Filter.', 'badlands' ),
    'section'     => 'portfolio_layout',
    'default'     => '1',
    'priority'    => 10,
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'badlands' ),
        'off' => esc_attr__( 'Disable', 'badlands' ),
    ),
    'transport'   => 'postMessage',
) );

badlands_kirki::add_field( 'badlands', array(
    'type'        => 'radio-image',
    'setting'     => 'portfolio_layout_setting',
    'label'       => __( 'Portfolio Columnm Layout', 'badlands' ),
    'description' => __( 'Choose from a two column, three coumn, or a four column layout.', 'badlands' ),
    'section'     => 'portfolio_layout',
    'default'     => 'portfolio-three-col',
    'priority'    => 10,
    'choices'     => array(
        'portfolio-two-col' => trailingslashit( get_template_directory_uri() ) . 'inc/kirkiassets/images/2-col-portfolio.png',
        'portfolio-three-col' => trailingslashit( get_template_directory_uri() ) . 'inc/kirkiassets/images/3-col-portfolio.png',
        'portfolio-four-col' => trailingslashit( get_template_directory_uri() ) . 'inc/kirkiassets/images/4-col-portfolio.png',
    ),
    'transport'   => 'postMessage',
));

/********************************************************************************************************************
 * Add section for Service Layout, settings and controls
 *******************************************************************************************************************/

badlands_kirki::add_section( 'service_layout', array(
    'title'      => esc_attr__( 'Service Layout', 'badlands' ),
    'priority'   => 3,
    'capability' => 'edit_theme_options',
    'description' => __( 'From this panel you control the services layout.', 'badlands' ),
) );

badlands_kirki::add_field( 'badlands', array(
    'type'     => 'text',
    'settings' => 'service_banner',
    'label'    => __( 'Service Page Title', 'badlands' ),
    'section'  => 'service_layout',
    'default'  => esc_attr__( 'Service Banner Title', 'badlands' ),
    'priority' => 10,
    'transport'   => 'postMessage',
) );
badlands_kirki::add_field( 'badlands', array(
    'type'        => 'radio-image',
    'setting'     => 'service_layout_setting',
    'label'       => __( 'Service Columnm Layout', 'badlands' ),
    'description' => __( 'Choose from a two column, three coumn, or a four column layout.', 'badlands' ),
    'section'     => 'service_layout',
    'default'     => 'service-three-col',
    'priority'    => 10,
    'choices'     => array(
        'service-two-col' => trailingslashit( get_template_directory_uri() ) . 'inc/kirkiassets/images/2-col-portfolio.png',
        'service-three-col' => trailingslashit( get_template_directory_uri() ) . 'inc/kirkiassets/images/3-col-portfolio.png',
        'service-four-col' => trailingslashit( get_template_directory_uri() ) . 'inc/kirkiassets/images/4-col-portfolio.png',
    ),
    'transport'   => 'postMessage',
));
badlands_kirki::add_field( 'badlands', array(
    'type'     => 'text',
    'settings' => 'service_intro_header',
    'label'    => __( 'Service Page Introduction Header', 'badlands' ),
    'section'  => 'service_layout',
    'default'  => esc_attr__( 'Service Page Introduction Header', 'badlands' ),
    'priority' => 10,
    'transport'   => 'postMessage',
) );

badlands_kirki::add_field( 'badlands', array(
    'type'     => 'textarea',
    'settings' => 'service_intro',
    'label'    => __( 'Service Page Introduction', 'badlands' ),
    'section'  => 'service_layout',
    'default'  => esc_attr__( 'Service Page Introduction', 'badlands' ),
    'priority' => 10,
    'transport'   => 'postMessage',
) );
