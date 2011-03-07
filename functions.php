<?php
/** 
 * functions.php
 * 
 * This file includes a change to $content_width, a stub for theme set up and a fix for
 * the alignments of Twenty Ten Five image captions.
 * 
 * delete ~ to uncomment blocks!
 * 
 * @since Twenty Ten 5.r 0.0
 */

/* SET UP  *~/

add_action('after_setup_theme', 'twenty_till_noon_setup'); 
function twenty_till_noon_setup(){

	// DO THEME SET UP STUFF	

}

/* END SET UP */

/* FIX TWENTY TEN FIVE CAPTION IMAGE ALIGNMENTS */

/**
 * FIXED The TwentyTen Five Caption shortcode.
 * added by Richard Shepherd to include HTML5 goodness
 * FIXED by C. Scott Asbach to align caption images properly
 *
 * The supported attributes for the shortcode are 'id', 'align', 'width', and
 * 'caption'.
 *
 * @since Twenty Ten 5.r
 */
add_action('init', 'fix_ttf_shortcodes');
function fix_ttf_shortcodes(){
	remove_shortcode('twentyten_img_caption_shortcode');
	remove_shortcode('twentyten_img_caption_shortcode');
	add_shortcode('wp_caption', 'fixed_twentyten_img_caption_shortcode');
	add_shortcode('caption', 'fixed_twentyten_img_caption_shortcode');
}
function fixed_twentyten_img_caption_shortcode($attr, $content = null) {

	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));

	if ( 1 > (int) $width || empty($caption) )
		return $content;


if ( $id ) $idtag = 'id="' . esc_attr($id) . '" ';
$align = 'class="' . esc_attr($align) . '" ';

  return '<figure ' . $idtag . $align . 'aria-describedby="figcaption_' . $id . '" style="width: ' . (10 + (int) $width) . 'px">' 
  . do_shortcode( $content ) . '<figcaption id="figcaption_' . $id . '">' . $caption . '</figcaption></figure>';
}

/* END FIX TWENTY TEN FIVE CAPTION IMAGE ALIGNMENTS */

/**
 * END OF FILE functions.php
 */