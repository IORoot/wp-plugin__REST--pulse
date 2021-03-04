<?php

/**
 * Create the class and return results.
 */
function andyp_pulse_rest_callback($atts){

    $pulse = new \andyp\pulsestack\REST\pulse_rest();

    if (isset($atts['count'])){
        $pulse->set_count($atts['count']);
    }
    if (isset($atts['type'])){
        $pulse->set_posttype($atts['type']);
    }
    if (isset($atts['cat'])){
        $pulse->set_category($atts['cat']);
    }
    if (isset($atts['classes'])){
        $pulse->set_classes($atts['classes']);
    }
    if (isset($atts['order'])){
        $pulse->set_order($atts['order']);
    }

    $pulse->run();

    return $pulse->out();
}

add_shortcode( 'andyp_pulse_rest', 'andyp_pulse_rest_callback' );