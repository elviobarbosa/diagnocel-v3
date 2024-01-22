<?php

function selos() {
    $argsQuery = array(
        'post_type'         => 'post_selos',
        'post_status'       => 'publish',
        'posts_per_page'    => -1
    );
    $post_list = get_posts($argsQuery);
    $content = [];
    $images = [];
    $result = '';

    foreach ( $post_list as $post ) :
        setup_postdata($post);
        array_push($content, get_the_content($post->ID));
        array_push($images,  get_the_post_thumbnail_url($post->ID));
    endforeach;
    wp_reset_postdata();
    ob_start();
    get_template_part('app/shortcodes/template-parts/shortcode-selos/template-selos', null, [
        'images'   => $images,
        'content' => $content
    ]);
    $template_content = ob_get_clean();
    $result .= $template_content;
    
    $file_path = get_template_directory() . '/app/shortcodes/template-parts/shortcode-selos/template-selos.php';

    return $result;
}
add_shortcode('selos', 'selos');