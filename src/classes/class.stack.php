<?php

class stack {

    public $cpt;

    public $taxonomy;

    public $term;

    public $items;

    public $orderby = '';

    public $order = 'ASC';

    public $result;

    public function __construct($attributes)
    {
        $this->set_attributes($attributes);
        $this->get_pulse_posts();
        $this->render();
    }


    public function set_attributes($attributes)
    {
        $this->cpt = $attributes['cpt'];
        $this->taxonomy = $attributes['tax'];
        $this->term = $attributes['term'];
        $this->items = $attributes['items'];
        $this->orderby = $attributes['orderby'];
        $this->order = $attributes['order'];
    }


    public function get_pulse_posts()
    {

        $args = [
            'numberposts'   => $this->items,
            'post_type'		=> $this->cpt,
            'orderby' 		=> $this->orderby, 
            'order' 		=> $this->order,
            'tax_query'     => $this->get_tax_queries()
        ];


        $this->result = get_posts($args);

        return;
    }





    public function get_tax_queries()
    {

        $output = [];

        $term_array = str_getcsv($this->term);

        if (!isset($term_array)){

            $output = [
                [
                    'taxonomy' => $this->taxonomy,
                    'field' => 'slug',
                    'terms' => $this->term
                ],
            ];

            return $output;
        }


        $output["relation"] = "OR";

        foreach ($term_array as $key => $option)
        {
            $output[] = 
                [
                    'taxonomy' => $this->taxonomy,
                    'field' => 'slug',
                    'terms' => $option
                ];
        }

        return $output;
    }




    public function render()
    {
        if (!isset($this->result))
        {
            return;
        }

        $output = '<div class="animated-stack stack">';

        foreach($this->result as $key => $post )
        {
            $image_url = get_the_post_thumbnail_url($post, 'medium');
            $text = $this->get_meta_text($post->ID);

            $output .= '<div class="stack__item stack__item-'.$key.'">';
                $output .= '<div class="stack__image" style="background-image: url(\''.$image_url.'\');" ></div>';
                $output .= '<div class="stack__text">'.$text.'</div>';
            $output .= '</div>';
        }

        $output .= '</div>';

        $this->result = $output;
    }

    public function get_meta_text($post_id)
    {
        $output = '';

        $meta = get_post_meta($post_id);

        // YouTube
        if (array_key_exists('channelTitle', $meta))
        {
            $output = '<i class="stack__icon mdi mdi-youtube-tv"></i> ';
            $output .= $meta['channelTitle'][0];
        }
        
        // Instagram
        if (array_key_exists('username', $meta))
        {
            $output = '<i class="stack__icon mdi mdi-instagram"></i> ';
            $output .= $meta['username'][0];
        }

        return $output;
    }


    public function out()
    {
        return $this->result;
    }

}