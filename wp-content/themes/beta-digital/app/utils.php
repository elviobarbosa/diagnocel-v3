<?php
/**
 * Load Utils.
 *
 * 
 */

$theme_dir = get_template_directory();
$scan_dir = $theme_dir . '/app/utils/';
$files = scandir($scan_dir);

foreach ($files as &$file) {
    if ( is_file( $scan_dir . $file ) ):
        require_once $scan_dir . $file;
    endif;
}


//GET SVG FILE
function the_SVG($file) {
	echo get_the_SVG($file);
}

function get_the_SVG($file) {
	$stream_opts = [
	    "ssl" => [
	        "verify_peer"=>false,
	        "verify_peer_name"=>false,
	    ]
	];  

	return file_get_contents(SVGPATH . $file . ".svg",false, stream_context_create($stream_opts));
}

function getExcerpt($agLimit, $agID, $agSource = null){
    $excerpt = $agSource == "content" ? get_the_content($agID) : get_the_excerpt($agID);
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $agLimit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'...';
    return $excerpt;
}

function printf_array($format, $arr)
{
    return call_user_func_array('printf', array_merge((array)$format, $arr));
}

function get_image_by_post_id($post_id) {
    $post_thumbnail_id = get_post_thumbnail_id($post_id);
    return $post_thumbnail_id ;
}

function get_my_postthumbnail($post_thumbnail_id, $image_sizes, $view_port, $default) {
    $images;
    $view;

    for ($i = 0; $i < count($image_sizes); $i++) {
        $images = wp_get_attachment_image_src($post_thumbnail_id, $image_sizes[$i]);
        $view .= '<source srcset="'. $images[0] .'" media="(max-width: '. $view_port[$i] . 'px)">';
    }
    $full = wp_get_attachment_image_src($post_thumbnail_id, $default);

    $attachment = get_post( $post_thumbnail_id );
    $alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
    $caption = $attachment->post_excerpt;
    $description = $attachment->post_content;
    $title = $attachment->post_title;
    $default = '<img srcset="'.$full[0].'" align="top" width="'.$full[1].'" height="'.$full[2].'" alt="'.$alt.'" caption="'.$caption.'" description="'.$description.'" title="'.$title.'">';
    $output = '<picture>' . $view . $default . '</picture>';
    return $output;
}

function my_postthumbnail($post_thumbnail_id, $image_sizes, $view_port, $default) {
    echo get_my_postthumbnail($post_thumbnail_id, $image_sizes, $view_port, $default);
}

// SOCIAL SHARE
function shareSocial($network) {
    switch ($network) {
        case "facebook":
            $url = "https://www.facebook.com/sharer/sharer.php?u=" . get_permalink();
            break;
        case "twitter":
            $url = "https://twitter.com/share?text=" . get_the_title() . "&amp;url=" . get_permalink();
            break;
        case "linkedin":
            $url = "https://www.linkedin.com/cws/share?url=" . get_permalink();
            break;
        case "whatsapp":
            $url = "https://api.whatsapp.com/send?text=" . get_permalink();
            break;
        case "telegram":
            $url = "https://telegram.me/share/url?url=" . get_permalink();
            break;
        
    }
    return $url .'" onClick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600\');return false;';
}

// CONTACT FORM
add_filter( 'shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3 );
 
function custom_shortcode_atts_wpcf7_filter( $out, $pairs, $atts ) {
  $my_attr = 'produto';
 
  if ( isset( $atts[$my_attr] ) ) {
    $out[$my_attr] = $atts[$my_attr];
  }
 
  return $out;
}

