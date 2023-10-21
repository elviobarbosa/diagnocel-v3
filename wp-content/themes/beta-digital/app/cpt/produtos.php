<?php
function posttype_produtos() 
{    
    $labels = array(
        'name'                => ( 'Produtos'),
        'singular_name'       => ( 'Produto'),
        'menu_name'           => ( 'Produtos'),
        'parent_item_colon'   => ( 'Produtos'),
        'all_items'           => ( 'All'),
        'view_item'           => ( 'View'),
        'add_new_item'        => ( 'Add new'),
        'add_new'             => ( 'Add new'),
        'edit_item'           => ( 'Edit'),
        'update_item'         => ( 'Update'),
        'search_items'        => ( 'Search'),
        'not_found'           => ( 'Not found'),
        'not_found_in_trash'  => ( 'Not found')
            );
    
    register_post_type( 'post_produtos',
        array(
            'show_ui' => true,
            'menu_icon'         => 'dashicons-products',
            'labels'            => $labels,
            'public'            => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'menu_position'     => 5,
            'taxonomies'        => ['prod_category', 'prod-size_category'],
            'has_archive'       => true,
            'hierarchical'      => true,
            'rewrite'           => array('slug' => 'produtos'),
            'supports'          => array( 'title', 'thumbnail', 'editor', 'excerpt'),
        )
    );
}

function product_category() {
    register_taxonomy(
        'prod-size_category',
        'post_produtos',
        array(
            'label' => __( 'Tipo de porte' ),
            'hierarchical' => true,
            'show_in_rest' => true,
        )
    );

    register_taxonomy(
        'prod_category',
        'post_produtos',
        array(
            'label' => __( 'Categoria do Produto' ),
            'rewrite' => array( 'slug' => 'produtos-por-categoria', 'with_front' => false ),
            'hierarchical' => true,
            'show_in_rest' => true,
        )
    );
}

function start_prod() {
    posttype_produtos();
    product_category();
}
add_action( 'init', 'start_prod' );