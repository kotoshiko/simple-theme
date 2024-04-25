<?php

function enqueue_amuse_styles() {
    wp_enqueue_style('amuse-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'enqueue_amuse_styles');

function amuse_script() {

    wp_enqueue_script('amuse-script', get_template_directory_uri() .'/js/script.js', array('jquery'), '1.0', true);
    $home_page_id = get_option('page_on_front');
    $txt_per_less = get_field('price_per_lesson', $home_page_id);
    $txt_per_period = get_field('price_per_month', $home_page_id);

    $inline_script = "let txtPerLess = '" . esc_js($txt_per_less) . "';";
    $inline_script .= "let txtPerPeriod = '" . esc_js($txt_per_period) . "';";

    wp_add_inline_script('amuse-script', $inline_script, 'before');

}
add_action('wp_enqueue_scripts', 'amuse_script');

function amuse_theme_setup() {
    add_theme_support( 'menus' );
    register_nav_menus(array(
        'primary-menu' => esc_html__('Primary Menu', 'amuse'),
        'secondary-menu' => esc_html__('Secondary Menu','amuse'),
    ));
}
add_action('after_setup_theme', 'amuse_theme_setup');

// Copying content when creating a translation with Polylang
function amuse_editor_content( $content ) {
// Polylang sets the 'from_post' parameter
    if ( isset( $_GET['from_post'] ) ) {
        $my_post = get_post( $_GET['from_post'] );
        if ( $my_post )
            return $my_post->post_content;
    }
    return $content;
}
add_filter( 'default_content', 'amuse_editor_content' );
// Copying content when creating a translation with Polylang
function amuse_editor_title( $title ) {
// Polylang sets the 'from_post' parameter
    if ( isset( $_GET['from_post'] ) ) {
        $my_post = get_post( $_GET['from_post'] );
        if ( $my_post )
            return $my_post->post_title;
    }
    return $title;
}
add_filter( 'default_title', 'amuse_editor_title' );

