<?php 
function setup() {
    //limpa do wp_head removendo tags desnecessárias
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'adjacent_posts_rel_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');

    //remove smart quotes
    remove_filter('the_title', 'wptexturize');
    remove_filter('the_content', 'wptexturize');
    remove_filter('the_excerpt', 'wptexturize');
    remove_filter('comment_text', 'wptexturize');
    remove_filter('list_cats', 'wptexturize');
    remove_filter('single_post_title', 'wptexturize');

    add_filter( 'wp_mail_from', 'sender_email' );
    function sender_email( $original_email_address ) {
        $domain = str_replace(['http://', 'https://'], '', get_blog_info('url'));
        return 'noreply@' . $domain;
    }

    add_filter( 'wp_mail_from_name', 'sender_name' );
    function sender_name( $original_email_from ) {
        return get_bloginfo('name');
    }

    // setup
    if (function_exists('acf_add_options_page')) :
        acf_add_options_page();
    endif;

    register_nav_menu('header-menu',__( 'Menu Principal' ));
	
}

function register_custom_image_sizes() {
    if ( ! current_theme_supports( 'post-thumbnails' ) ) {
        add_theme_support( 'post-thumbnails' );
       //add_theme_support( 'main-image' );
        add_theme_support( 'brand' );
        add_theme_support( 'product-thumb' );
       add_theme_support( 'produtct-full' );
    }
    add_image_size( 'brand', 300, 30, false);
    //add_image_size( 'main-image', 1311, 657, true);
    add_image_size( 'main-image-mobile', 350, 263, true);
    add_image_size( 'product-thumb', 300, 220, false);
    add_image_size( 'produtct-full', 510, 510, false);
}
add_action( 'after_setup_theme', 'register_custom_image_sizes' );

function add_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'full-image' => __( 'Custom 1311x657' ),
        //'main-image' => __( 'Custom 1311x657' ),
        'main-image-mobile' => __( 'Custom 350x263' ),
        'product-thumb' => __( 'Custom 300x220' ),
        'produtct-full' => __( 'Custom 510x510' ),
    ) );
}
add_filter( 'image_size_names_choose', 'add_custom_image_sizes' );

add_action( 'init', 'setup' );