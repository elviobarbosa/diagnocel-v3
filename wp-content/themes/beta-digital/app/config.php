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

function custom_color_theme() {
    
    $oldColorPalette = current( (array) get_theme_support( 'editor-color-palette' ) );
    if (false === $oldColorPalette && class_exists('WP_Theme_JSON_Resolver')) {
        $settings = WP_Theme_JSON_Resolver::get_core_data()->get_settings();
        if (isset($settings['color']['palette']['default'])) {
            $oldColorPalette = $settings['color']['palette']['default'];
        }
    }

    $newColorPalette = [
        [
            'name' => esc_attr__('Primary color', 'betaGutemberg'),
            'slug' => 'primary-color',
            'color' => '#2F3188',
        ],
        [
            'name' => esc_attr__('Secondary color', 'betaGutemberg'),
            'slug' => 'secondary-color',
            'color' => '#D83731',
        ],
        [
            'name' => esc_attr__('Light blue', 'betaGutemberg'),
            'slug' => 'light-blue',
            'color' => '#AEC0FA',
        ],
        [
            'name' => esc_attr__('Green', 'betaGutemberg'),
            'slug' => 'green',
            'color' => '#4B8B89',
        ],
        [
            'name' => esc_attr__('Citzen', 'betaGutemberg'),
            'slug' => 'citzen',
            'color' => '#EAEDF0',
        ],
        [
            'name' => esc_attr__('Grey 500', 'betaGutemberg'),
            'slug' => 'grey-500',
            'color' => '#676767',
        ],
        [
            'name' => esc_attr__('Grey 200', 'betaGutemberg'),
            'slug' => 'grey-200',
            'color' => '#A2A2A2',
        ],
        [
            'name' => esc_attr__('Grey 100', 'betaGutemberg'),
            'slug' => 'grey-100',
            'color' => '#EFEFEF',
        ],
        [
            'name' => esc_attr__('Light green', 'betaGutemberg'),
            'slug' => 'light-green',
            'color' => '#CADBDA',
        ]
    ];
   
    // Merge the old and new color palettes
    if (!empty($oldColorPalette)) {
        $newColorPalette = array_merge($oldColorPalette, $newColorPalette);
    }
    // Apply the color palette containing the original colors and 2 new colors:
    add_theme_support( 'editor-color-palette', $newColorPalette);
}
add_action( 'after_setup_theme', 'custom_color_theme' );

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

            if ($item->title === 'Busca') {
                $item->classes[] = 'search-menu-item';
                $item->title = '';
                ob_start();
                get_search_form();
                $search_form = ob_get_clean();

                $item->title .= $search_form;
            }
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'add_submenu_prod_cat', 10, 2);

function remove_cpt_search($query) {

    if (is_admin() || !$query->is_main_query() || !is_search())
        return;

    $remove_cpts = array('post_parceiros', 'post_menu_testes', 'post_selos', 'post_timeline'); 
    if ($query->get('post_type') && in_array($query->get('post_type'), $remove_cpts)) {
        $query->set('post_type', '');
    }
}
add_action('pre_get_posts', 'remove_cpt_search');
