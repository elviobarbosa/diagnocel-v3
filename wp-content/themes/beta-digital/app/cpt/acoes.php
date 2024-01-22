<?php
function posttype_acoes() 
{    
    $labels = array(
        'name'                => ( 'Ações sustentáveis'),
        'singular_name'       => ( 'Ações sustentáveis'),
        'menu_name'           => ( 'Ações sustentáveis'),
        'parent_item_colon'   => ( 'Ações sustentáveis'),
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
    
    register_post_type( 'post_acoes',
        array(
            'show_ui'           => true,
            'menu_icon'         => 'dashicons-palmtree',
            'labels'            => $labels,
            'public'            => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'menu_position'     => 5,
            'show_in_rest'      => true,
            'has_archive'       => true,
            'hierarchical'      => false,
            'supports'          => array( 'title', 'thumbnail', 'editor'),
        )
    );
}

add_action( 'init', 'posttype_acoes' );