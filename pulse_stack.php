<?php

/*
 * 
 * @wordpress-plugin
 * Plugin Name:       _ANDYP - Pulse - Menu Stacks - Shortcode
 * Plugin URI:        http://londonparkour.com
 * Description:       <strong>🩳SHORTCODE</strong> | <em>Shortcode [pulse_stack] </em> | Creates a stack of images from parkourpulse.
 * Version:           1.0.0
 * Author:            Andy Pearson
 * Author URI:        https://londonparkour.com
 * Domain Path:       /languages
 */

define( 'ANDYP_PULSE_STACK_PATH', plugins_url( '/', __FILE__ ) );

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                    Register with ANDYP Plugins                          │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/src/acf/andyp_plugin_register.php';


// ┌─────────────────────────────────────────────────────────────────────────┐
// │                         Use composer autoloader                         │
// └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/vendor/autoload.php';


// ┌─────────────────────────────────────────────────────────────────────────┐
// │                        	   Initialise    		                     │
// └─────────────────────────────────────────────────────────────────────────┘
new andyp\pulsestack\initialise;

