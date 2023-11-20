<?php 
function setup() {
    add_filter( 'wp_mail_from', 'sender_custom_email' );
    function sender_custom_email( $original_email_address ) {
        $domain = str_replace(['http://', 'https://'], '', get_blog_info('url'));
        return 'noreply@' . $domain;
    }

    add_filter( 'wp_mail_from_name', 'sender_custom_name' );
    function sender_custom_name( $original_email_from ) {
        return get_bloginfo('name');
    }

    if (function_exists('acf_add_options_page')) :
        acf_add_options_page();
    endif;

    register_nav_menu('header-menu',__( 'Menu Principal' ));
	
}

function register_custom_image_sizes() {
    if ( ! current_theme_supports( 'post-thumbnails' ) ) {
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'brand' );
        add_theme_support( 'product-thumb' );
        add_theme_support( 'product-full' );
    }
    add_image_size( 'brand', 300, 30, false);
    add_image_size( 'main-image-mobile', 350, 263, true);
    add_image_size( 'product-thumb', 300, 220, false);
    add_image_size( 'produtct-full', 510, 510, false);
}
add_action( 'after_setup_theme', 'register_custom_image_sizes' );

function add_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'full-image' => __( 'Custom 1311x657' ),
        'main-image-mobile' => __( 'Custom 350x263' ),
        'product-thumb' => __( 'Custom 300x220' ),
        'produtct-full' => __( 'Custom 510x510' ),
    ) );
}
add_filter( 'image_size_names_choose', 'add_custom_image_sizes' );

function add_custom_body_class($classes) {
    $page_slugs = ['biocore', 'sustentabilidade', 'diagnocel'];
    foreach ($page_slugs as $slug) {
        if (is_page($slug)) {
            $classes[] = 'page-' . $slug;
        }
    }
    return $classes;
}

add_filter('body_class', 'add_custom_body_class');

add_filter(
    'wpseo_breadcrumb_links',
    function ( $links ) {
        if ( sizeof( $links ) > 1 ) {
            array_pop( $links );
        }
        return $links;
    }
);

function custom_taxonomy_template( $template ) {
    $term = get_queried_object();

    if ( isset( $term->taxonomy ) && ( $term->taxonomy == 'prod_category' ) ) {
        return get_template_directory() . '/produtos-by-category.php'; 
    }

    return $template;
}
add_filter( 'template_include', 'custom_taxonomy_template' );

function add_submenu_prod_cat($items, $args) {
    $menu_locations = get_nav_menu_locations();

    if ($args->theme_location == 'header-menu' && isset($menu_locations['header-menu'])) {
        foreach ($items as $item) {
            if ($item->title === 'Produtos') {
                $terms = get_terms('prod_category');
                $submenu_items = [];


                if (!empty($terms)) {
                    $item->classes[] = 'menu-item-has-children';
                    foreach ($terms as $term) {
                        $submenu_item = array (
                            'title'            => $term->name,
                            'menu_item_parent' => $item->ID,
                            'ID'               => $term->term_id,
                            'db_id'            => count($submenu_items) + 1,
                            'url'              => get_term_link($term)
                        );

                        $items[] = (object) $submenu_item;
                        
                    }
                }
            }
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'add_submenu_prod_cat', 10, 2);
