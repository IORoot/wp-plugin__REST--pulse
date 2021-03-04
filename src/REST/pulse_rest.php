<?php

namespace andyp\pulsestack\REST;

use \WP_REST_Request;


class pulse_rest {

    public $posts;

    public $result;

    public $count    = 5;
    public $order    = 'date';
    public $posttype = 'pulse';
    public $category;
    public $classes  = '';


    public function set_count($count)
    {
        $this->count = $count;
    }

    public function set_order($order)
    {
        $this->order = $order;
    }

    public function set_posttype($posttype)
    {
        $this->posttype = $posttype;
    }

    public function set_classes($classes)
    {
        $this->classes = $classes;
    }

    public function set_category($category)
    {
        $this->category = $category;
    }


    public function run()
    {
        $this->REST_call();
        $this->render();
    }



    /**
     * https://rudrastyh.com/wordpress/rest-api-get-posts.html
     */
    private function REST_call()
    {
        $transient = \get_transient( 'pulserest' );
        if( ! empty( $transient ) ) { return $transient; }

        $category_name = '';
        if (!empty($this->category)){
            $category_name = $this->posttype . '_category';
        }       

        $response = \wp_remote_get( add_query_arg( array(
            'per_page' => $this->count,
            'orderby' => $this->order,
            $category_name => $this->category,
        ), 'https://pulse.londonparkour.com/wp-json/wp/v2/'.$this->posttype ) );

        $this->posts = json_decode( $response['body'] ); // our posts are here

        \set_transient( 'pulserest', json_decode( $this->posts ), DAY_IN_SECONDS );
    }


    public function render()
    {
        if (!isset($this->posts)){
            return;
        }

        $output = '';

        foreach($this->posts as $key => $post )
        {
            $f = new \NumberFormatter("en", \NumberFormatter::SPELLOUT); 
            $id = $f->format($key); // 1 = 'one', 12 = 'twelve'

            $output .= '<a target="_blank" href="https://www.youtube.com/watch?v='.$post->videoId.'" class="image-'.$id.' '.$this->classes.'" style="background-image: url(\''.$post->imageURL.'\');"></a>';

        }

        $this->result = $output;
    }



    public function out()
    {
        return $this->result;
    }

}