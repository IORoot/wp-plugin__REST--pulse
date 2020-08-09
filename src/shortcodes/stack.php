<?php

/**
 * Create the class and return results.
 */
function andyp_pulse_stack_callback($atts){
    
    wp_register_style( 'andyp_stacks_css', ANDYP_PULSE_STACK_PATH.'src/sass/style.css' );
    wp_enqueue_style( 'andyp_stacks_css' );

    $a = shortcode_atts( 
        array(
            'cpt' => 'youtube',
            'tax' => 'scrapercategory',
            'term' => 'youtube-curated',
            'items' => 5,
            'order' => '',
            'orderby' => '',
        ), $atts );

    $stack = new stack($a);

    return $stack->out();
}

add_shortcode( 'andyp_pulse_stack', 'andyp_pulse_stack_callback' );