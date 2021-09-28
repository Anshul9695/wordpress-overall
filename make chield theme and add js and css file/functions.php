<?php

function theme_enqueue_styles(){
    $parent_style='parent-style';
    wp_enqueue_style($parent_style,get_template_directory_uri().'/style.css');
    wp_enqueue_style('child-style',get_stylesheet_directory_uri().'/style.css',array($parent_style));
}
    add_action('wp_enqueue_scripts','theme_enqueue_styles');


    if ( !is_admin() ) { // instruction to only load if it is not the admin area
        // register your script location, dependencies and version
        wp_register_script('custom_script',
            get_bloginfo('stylesheet_directory') . '/validation.js', array('jquery'), '1.0' );
     
        // enqueue the script
        wp_enqueue_script('custom_script');
     }

 //ajex code is here...
 
 
 function blog_scripts() {
    // Register the script
    wp_register_script( 'custom-script', get_stylesheet_directory_uri(). '/js/ajex.js', array('jquery'), false, true );
  
    // Localize the script with new data
    $script_data_array = array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'security' => wp_create_nonce( 'load_states' ),
    );
    wp_localize_script( 'custom-script', 'blog', $script_data_array );
  
    // Enqueued script with localized data.
    wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'blog_scripts' );

add_action('wp_ajax_get_states_by_ajax', 'get_states_by_ajax_callback');
add_action('wp_ajax_nopriv_get_states_by_ajax', 'get_states_by_ajax_callback');

?>