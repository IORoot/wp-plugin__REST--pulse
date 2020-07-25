<?php

/**
 * Create the class and return results.
 */
function andyp_pulse_stack_callback($atts){
    
    $a = shortcode_atts( 
        array(
            'cpt' => 'youtube',
            'tax' => 'scrapercategory',
            'term' => 'youtube-curated,instagram-daily-trending',
            'items' => 5,
            'order' => '',
            'orderby' => '',
        ), $atts );

    $stack = new stack($a);

    return $stack->out();
}

add_shortcode( 'andyp_pulse_stack', 'andyp_pulse_stack_callback' );