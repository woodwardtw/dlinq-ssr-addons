<?php 
/*
 * Callout box template for Gute
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


// Create id attribute allowing for custom "anchor" value.
$id = 'callout-box-' . $block['id'];
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
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$content = get_field('box_content', false, false) ?: 'Put your callout box text right here...';
//$text_color = get_field('text_color');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <?php echo $content;?>
</div>