<?php 
/*
 * SSR Button template for Gute
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


// Create id attribute allowing for custom "anchor" value.
$id = 'ssr-button-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.

if(get_field('box_color')) {	
	$className = 'content-box-' . get_field('box_color');
} else {
	$className = 'content-box-yellow';
}

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}


// Load URL values . . . . . . . 
if(get_field('destination_page')){
    $post_id = get_field('destination_page'); 
    $destination = get_permalink($post_id);
} 
else if(get_field('external_link')){
    $destination = get_field('external_link'); 
} else {
    $destination = "#";
}

$float = '';

if (get_field('button_type')){
    $type = get_field('button_type');
    if($type == 'previous'){
        $float = 'previous';
        $button_title = "<i class='fa fa-angle-left'></i> Previous";
    }
    else if($type == 'next'){
        $float = 'next';
        $button_title = "<i class='fa fa-angle-right'></i>  Next";
    }
    else if ($type === 'regular' || $type === 'regular-external'){
      $button_title = get_field('button_title');
    } 
} else {
    $button_title = 'Click here';
}
//$text_color = get_field('text_color');

?>


<?php echo "<a id='{$id}' class='lts_button lts_button_sc lts_button_default lt_rounded lt_flat ssr_button {$float}' href='{$destination}'>
            {$button_title}
   </a>";?>