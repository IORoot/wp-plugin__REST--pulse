<?php

namespace andyp\pulsestack;

class initialise {


    public function __construct()
    {

        //  ┌─────────────────────────────────────────────────────────────────────────┐
        //  │                            Add Shortcodes                               │
        //  └─────────────────────────────────────────────────────────────────────────┘
        require __DIR__.'/shortcodes/stack.php';
        require __DIR__.'/shortcodes/pulse_rest.php';

    }

}