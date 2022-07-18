<?php 
/*
Plugin Name: DLINQ SSR Addons
Plugin URI:  https://github.com/
Description: To make life more pleasant for humans
Version:     1.0
Author:      DLINQ
Author URI:  https://dlinq.middcreate.net
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: my-toolset

*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action('wp_enqueue_scripts', 'dlinq_ssr_load_scripts');

function dlinq_ssr_load_scripts() {                           
    $deps = array('jquery');
    $version= '1.0.1'; 
    $in_footer = true;    
    wp_enqueue_script('ssr-main-js', plugin_dir_url( __FILE__) . 'js/dlinq-ssr-main.js', $deps, $version, $in_footer); 
    wp_enqueue_style( 'ssr-plugin-styles', plugin_dir_url( __FILE__) . 'css/dlinq-ssr-main.css', array(), '1.2');

}


//Add callout box Guten block
add_action('acf/init', 'ssr_callout_box_init_block_types');
function ssr_callout_box_init_block_types() {

    // Check function exists.
    if( function_exists('ssr_callout_box_init_block_types') ) {

        // register block.
        acf_register_block_type(array(
            'name'              => 'callout_box',
            'title'             => __('Callout Box'),
            'description'       => __('Add a callout box.'),
            'render_template'   => 'template-parts/blocks/boxes/callout-box.php',
            'category'          => 'design',
            'icon'              => '<svg height="100px" width="100px"  fill="#1f9f8b" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><g><path fill="#1f9f8b" d="M16,0H4C1.8,0,0,1.8,0,4v8c0,2.2,1.8,4,4,4v4l8.4-4H16c2.2,0,4-1.8,4-4V4C20,1.8,18.2,0,16,0z M18,12   c0,1.1-0.9,2-2,2h-4l-6,2.8V14H4c-1.1,0-2-0.9-2-2V4c0-1.1,0.9-2,2-2h12c1.1,0,2,0.9,2,2V12z"></path><polygon fill="#1f9f8b" points="9,8.6 6.4,6 5,7.4 9,11.4 15,5.4 13.6,4  "></polygon></g></svg>',
            'keywords'          => array( 'box', 'callout', 'ssr' ),
            'mode' => 'preview',
            'render_template' => plugin_dir_path( __FILE__ ) . 'template-parts/blocks/boxes/callout-box.php',
            'enqueue_style' => plugin_dir_url( __FILE__ ) . 'template-parts/blocks/boxes/boxes.css',

        ));
    }
}

add_action('acf/init', 'ssr_button_init_block_types');
function ssr_button_init_block_types() {

    // Check function exists.
    if( function_exists('ssr_button_init_block_types') ) {

        // register block.
        acf_register_block_type(array(
            'name'              => 'ssr_button',
            'title'             => __('SSR Button'),
            'description'       => __('Add an SSR button.'),
            'render_template'   => 'template-parts/blocks/buttons/ssr-buttons.php',
            'category'          => 'design',
            'icon'              => '<svg height="100px" width="100px"  fill="#1f9f8b" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256" x="0px" y="0px"><path d="M222.515 149.913l-55.347-38.195c-1.664-1.152-3.507-1.741-5.351-1.741-2.458 0-4.787 1.075-6.375 2.918-1.69 1.971-2.381 4.608-1.946 7.424l10.496 66.432c0.743 4.633 4.557 7.987 9.088 7.987 1.792 0 3.584-0.537 5.171-1.511l11.443-7.194 7.194 11.443c1.894 2.995 5.12 4.787 8.679 4.787 1.92 0 3.815-0.537 5.453-1.561l3.712-2.329c2.304-1.459 3.917-3.738 4.531-6.4s0.128-5.401-1.305-7.731l-7.194-11.443 11.443-7.194c2.765-1.741 4.429-4.608 4.506-7.731s-1.511-6.119-4.198-7.962zM218.112 159.053l-15.769 9.933c-1.203 0.743-1.561 2.329-0.793 3.533l9.933 15.769c0.743 1.203 0.384 2.791-0.793 3.533l-3.712 2.329c-0.461 0.281-0.922 0.41-1.408 0.41-0.845 0-1.69-0.435-2.176-1.203l-9.933-15.769c-0.487-0.768-1.331-1.203-2.176-1.203-0.461 0-0.947 0.128-1.357 0.384l-15.769 9.933c-0.358 0.231-0.743 0.333-1.075 0.333-0.743 0-1.357-0.537-1.485-1.511l-10.496-66.432c-0.154-0.947 0.154-1.459 0.717-1.459 0.281 0 0.614 0.128 0.999 0.384l55.347 38.221c1.152 0.793 1.126 2.073-0.051 2.816z" fill="#1f9f8b"></path><path d="M48.538 151.68c-0.691 0-1.306-0.281-1.818-0.743-0.486-0.487-0.742-1.101-0.742-1.817v-75.853c0-0.717 0.282-1.331 0.742-1.817 0.486-0.487 1.101-0.743 1.818-0.743h137.216c0.691 0 1.305 0.281 1.817 0.743 0.487 0.487 0.743 1.101 0.743 1.817v43.904l10.24 7.014v-50.918c-0.025-7.066-5.734-12.775-12.8-12.8h-137.216c-7.066 0.026-12.775 5.734-12.8 12.8v75.853c0.026 7.065 5.734 12.774 12.8 12.8h104.013l-1.613-10.24h-102.4z" fill="#1f9f8b"></path></svg>',
            'keywords'          => array( 'button', 'ssr' ),
            'mode' => 'preview',
            'render_template' => plugin_dir_path( __FILE__ ) . 'template-parts/blocks/buttons/ssr-buttons.php',
            'enqueue_style' => plugin_dir_url( __FILE__ ) . 'template-parts/blocks/buttons/ssr-buttons.css',
        ));
    }
}



//add tags and categories to pages
function ssr_add_categories_to_pages() {
   register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'ssr_add_categories_to_pages' );

function ssr_add_tags_to_pages() {
   register_taxonomy_for_object_type( 'post_tag', 'page' );
}
add_action( 'init', 'ssr_add_tags_to_pages' );


add_action('admin_init', 'wpse51831_init');
function wpse51831_init()
{
    if(!current_user_can('edit_posts')) 
    {
        wp_redirect(home_url());
        exit();
    }
}

add_filter('show_admin_bar', 'wpse51831_hide_admin_bar');
/*
 * hide the admin bar for `subscribers`
 *
 * @uses current_user_can
 * @return boolean
 */
function wpse51831_hide_admin_bar($bool)
{
    if(!current_user_can('edit_posts'))
    {
        $bool = false;
    }
    return $bool;
}


//duplicate content via filter based on ACF assignation 
add_filter( 'the_content', 'ssr_duplicate_content', 1);

function ssr_duplicate_content($content){
    $post_id = get_the_ID();
    if (get_field('duplicate_content', $post_id)){
        $source_id = get_field('duplicate_content', $post_id);
        $source_post = get_post($source_id); // specific post
        $source_content = $source_post->post_content;
        return $source_content;
    }
    else {
        return $content;
    }
}


add_filter( 'the_content', 'ssr_bottom_nav', 1);

function ssr_bottom_nav($content){
    $html = '';
    $true = FALSE;
    $post_id = get_the_ID();
    if (get_field('previous', $post_id)){  
        $true = TRUE; 
        $prev = get_field('previous', $post_id);  
        $html .= "<a class='lts_button lts_button_sc lts_button_default lt_rounded lt_flat ssr_button previous' href='{$prev}'><i class='fa fa-angle-left'></i> Previous
   </a>";   
    }
    if (get_field('module', $post_id)){ 
        $true = TRUE;  
        $mod = get_field('module', $post_id);           
        $html .= "<a class='lts_button lts_button_sc lts_button_default lt_rounded lt_flat ssr_button module' href='{$mod}'></i> Next Module </a>";          
    } 
    if (get_field('next', $post_id)){        
        $true = TRUE; 
        $next = get_field('next', $post_id);            
        $html .= "<a class='lts_button lts_button_sc lts_button_default lt_rounded lt_flat ssr_button next' href='{$next}'></i>Next <i class='fa fa-angle-right'></i>
   </a>";     
    } 
    if($true === TRUE){
        return $content . "<div id='ssr-b-nav'>{$html}</div>";
    } else {
        return $content;
    }   
}




//LOGGER -- like frogger but more useful

if ( ! function_exists('write_log')) {
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}



  //print("<pre>".print_r($a,true)."</pre>");

   //save acf json
      add_filter('acf/settings/save_json', 'dlinq_ssr_load_scripts_json_save_point');
       
      function dlinq_ssr_load_scripts_json_save_point( $path ) {
          
          // update path
          $path = plugin_dir_path(__FILE__) . '/acf-json'; //replace w get_stylesheet_directory() for theme
          
          
          // return
          return $path;
          
      }


      // load acf json
      add_filter('acf/settings/load_json', 'dlinq_ssr_load_scripts_json_load_point');

      function dlinq_ssr_load_scripts_json_load_point( $paths ) {
          
          // remove original path (optional)
          unset($paths[0]);
          
          
          // append path
          $paths[] = plugin_dir_path(__FILE__)  . '/acf-json';//replace w get_stylesheet_directory() for theme
          
          
          // return
          return $paths;
          
      }