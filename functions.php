<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style/theme.css', array(), '1.0' );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/script.js', array( 'jquery' ), '1.0');
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');
add_theme_support( 'menus');
?>
