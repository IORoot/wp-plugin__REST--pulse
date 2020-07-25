<?php

/**
 * Register the Chips CSS for use.
 * 
 */
function register_stacks() {
    
    wp_register_style( 'andyp_stacks_css', '/wp-content/plugins/andyp_pulse_stack/src/sass/style.css' );
    wp_enqueue_style( 'andyp_stacks_css' );
}

/**
 * This says 'encode' but we're only registering.
 */
add_action( 'wp_enqueue_scripts', 'register_stacks' );