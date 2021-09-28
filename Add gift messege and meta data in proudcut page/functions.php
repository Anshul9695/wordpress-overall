<?php

function theme_enqueue_styles(){
    $parent_style='parent-style';
    wp_enqueue_style($parent_style,get_template_directory_uri().'/style.css');
    wp_enqueue_style('child-style',get_stylesheet_directory_uri().'/style.css',array($parent_style));
}
    add_action('wp_enqueue_scripts','theme_enqueue_styles');




#add custom field
function create_custom_field() {
    $args = array(
    'id' => 'custom_field_title',
    'label' => __( 'Gift Message', 'custom' ),
    'class' => 'custom-field',
    'desc_tip' => true,
    'description' => __( 'Enter the title of your custom text field.', 'ctwc' ),
    );
    woocommerce_wp_textarea_input( $args );
   }
   add_action( 'woocommerce_product_options_general_product_data', 'create_custom_field' );
     

   //save meta data in database whitch is show in the wp_postmeta table
   function save_custom_field( $post_id ) {
    $product = wc_get_product( $post_id );
    $title = isset( $_POST['custom_field_title'] ) ? $_POST['custom_field_title'] : '';
    $product->update_meta_data( 'custom_field_title', sanitize_text_field( $title ) );
    $product->save();
   }
   add_action( 'woocommerce_process_product_meta', 'save_custom_field' );

   //display field
    function display_custom_field() {
    global $post;
    // Check for the custom field value
    $product = wc_get_product( $post->ID );
    $title = $product->get_meta( 'custom_field_title' );
   
   }
   add_action( 'woocommerce_before_add_to_cart_button', 'display_custom_field' );
   
   //create new tab
    function custom_product_tab( $tabs ) {
   
       $tabs['custom_tab'] = array(
           'title'    => __( 'Gift message', 'textdomain' ),
           'callback' => 'custom_tab_content',
           'priority' => 50,
       );
   
       return $tabs;
   
   }
   add_filter( 'woocommerce_product_tabs', 'custom_product_tab' );
   
   /**
    * Function that displays output for the shipping tab.
    */
   function custom_tab_content( $slug, $tab ) {
   
       global $post;
    // Check for the custom field value
    $product = wc_get_product( $post->ID );
    $title = $product->get_meta( 'custom_field_title' );
    if( $title ) {
    // Only display our field if we've got a value for the field title
    echo(
    //'<div class="cfwc-custom-field-wrapper"><label for="cfwc-title-field">%s</label><input type="text" id="cfwc-title-field" name="cfwc-title-field" value=""></div>',
    esc_html( $title )
    );
    }
   }
   add_action( 'woocommerce_before_add_to_cart_button', 'display_custom_field' );





// ADD COUMEND IN ALL PRDUCT   ITS SHOW IN THE ALL PRODUCTS LIKE TITLE SKU AND FEATURE 
add_filter( 'manage_edit-product_columns', 'admin_add_in_promo', 15 );
function admin_add_in_promo($columns){
   $columns['Gift Message'] = __( 'Gift Message'); 
   return $columns;
}

// show data in gift message column
add_action( 'manage_posts_custom_column', 'admin_show_get_message');
function admin_show_get_message( $column) {
  global $post;
    if ( $column == 'Gift Message' ) {
        if( function_exists('get_product') ){
          $product = get_product( $post->ID);
           $title = $product->get_meta( 'custom_field_title' );
        echo "$title";
        }
    }
}

?>