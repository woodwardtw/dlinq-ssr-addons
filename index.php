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


add_action('acf/init', 'ssr_callout_box_init_block_types');
function ssr_callout_box_init_block_types() {

    // Check function exists.
    if( function_exists('ssr_callout_box_init_block_types') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'callout_box',
            'title'             => __('Callout Box'),
            'description'       => __('Add a callout box.'),
            'render_template'   => 'template-parts/blocks/boxes/callout-box.php',
            'category'          => 'callout',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'box', 'callout' ),
            'mode' => 'preview',
            'render_template' => plugin_dir_path( __FILE__ ) . 'template-parts/blocks/boxes/callout-box.php',
            'enqueue_style' => plugin_dir_url( __FILE__ ) . 'template-parts/blocks/boxes/boxes.css',

        ));
    }
}



add_filter( 'the_content', 'dlinq_add_arrows', 1 );
 
function dlinq_add_arrows( $content ) {
    global $post;
    $id = $post->ID;
    // var_dump($id);
    // var_dump(is_singular());
    // Check if we're inside the main loop in a single Post.
    if ( is_singular()) {
        $arrows = '';
        $nav = get_field('navigation', $id);
        $previous = $nav['previous'];
        $next = $nav['next'];
        if($previous){
          $arrows .= "<div class='col2 shortcol' data-width='' style='min-height: 88px;'>
                        <p></p>
                        <div style='text-align: left;'>
                           <a class='lts_button lts_button_sc lts_button_default lt_rounded lt_flat' style='background:#54b3a4;color:#ffffff;border-color:#54b3a4;' href='{$previous}'>
                                 <i class='fa fa-angle-left'></i> 
                                    Previous
                           </a>
                        </div>
                        <p></p>
                     </div>";
        }
        if($next){
            $arrows .= "<div class='col2 shortcol' data-width='' style='min-height: 88px;'>
                           <p></p>
                           <div style='text-align: right;'>
                              <a class='lts_button lts_button_sc lts_button_default lt_rounded lt_flat' style='background:#54b3a4;color:#ffffff;border-color:#54b3a4;' href='{$next}'>
                                    <i class='fa fa-angle-right'></i> 
                                       Next
                              </a>
                           </div>
                           <p></p>
                        </div>";
        }
        return $content . $arrows;
    }
 
    return $content;
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