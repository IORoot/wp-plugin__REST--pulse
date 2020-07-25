<?php

/*
 * 
 * @wordpress-plugin
 * Plugin Name:       _ANDYP - Pulse Stacks - Shortcode
 * Plugin URI:        http://londonparkour.com
 * Description:       <strong>🩳SHORTCODE</strong> | <em>Shortcode [pulse_stack] </em> | Creates a stack of images from parkourpulse.
 * Version:           1.0.0
 * Author:            Andy Pearson
 * Author URI:        https://londonparkour.com
 * Domain Path:       /languages
 */

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                            Enqueue the CSS                              │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/src/inc/enqueue_scripts.php';

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                              The Classes                                │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/src/classes/class.stack.php';

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                            The Shortcodes                               │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/src/shortcodes/stack.php';