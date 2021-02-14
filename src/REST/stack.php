<?php

namespace andyp\pulsestack\REST;

use \WP_REST_Request;


class stack {

    public $posts;

    public $result;


    public function __construct()
    {
        $this->REST_call();
        $this->render();
    }



    /**
     * https://rudrastyh.com/wordpress/rest-api-get-posts.html
     */
    private function REST_call()
    {
        $transient = \get_transient( 'pulsestack' );
        if( ! empty( $transient ) ) {
            return $transient;
        }

        $response = \wp_remote_get( add_query_arg( array(
            'per_page' => 5,
            'pulse_category' => 4
        ), 'https://pulse.londonparkour.com/wp-json/wp/v2/pulse' ) );

        $this->posts = json_decode( $response['body'] ); // our posts are here

        \set_transient( 'pulsestack', json_decode( $this->posts ), DAY_IN_SECONDS );
    }






    public function render()
    {
        if (!isset($this->posts)){
            return;
        }

        $output = '<div class="animated-stack stack">';

        foreach($this->posts as $key => $post )
        {
            $output .= '<div class="stack__item stack__item-'.$key.'">';
                $output .= '<div class="stack__image" style="background-image: url(\''.$post->imageURL.'\');" ></div>';
                $output .= '<div class="stack__text"><i class="stack__icon mdi mdi-youtube-tv"></i>'.$post->channelTitle.'</div>';
            $output .= '</div>';
        }

        $output .= '</div>';

        $this->result = $output;
    }



    public function out()
    {
        return $this->result;
    }

}