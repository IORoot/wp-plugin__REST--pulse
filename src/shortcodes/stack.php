<?php

/**
 * Create the class and return results.
 */
function andyp_pulse_stack_callback($atts){

    $stack = new \andyp\pulsestack\REST\stack();

    return $stack->out();
}

add_shortcode( 'andyp_pulse_stack', 'andyp_pulse_stack_callback' );