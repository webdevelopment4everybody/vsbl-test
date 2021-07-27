<?php
	// Style CSS
	function style_enqueue() {

        wp_enqueue_style( 'swiper-bundle-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');

        wp_enqueue_style('main-css',get_template_directory_uri().'/assets/style/main.css');

	}
    add_action( 'wp_enqueue_scripts', 'style_enqueue',80 );

    //add bootstrap css
    function bootstrapstyle() {

        wp_register_style('bootstrap', get_template_directory_uri() . '/assets/style/bootstrap.min.css', array(), false, 'all');

        wp_enqueue_style('bootstrap');

    }
    add_action('wp_enqueue_scripts', 'bootstrapstyle');

    //add javascript
    function load_scripts() {
    
        wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), true, 'all');

        wp_enqueue_script( 'swiper-bundle-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), true, 'all');
  
        wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', '', 1, true);
      
    }
    add_action('wp_enqueue_scripts', 'load_scripts');

    //add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types; 
} 
add_action('upload_mimes', 'add_file_types_to_uploads');