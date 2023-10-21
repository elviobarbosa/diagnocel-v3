<?php
function posttype_menu_testes() 
{    
    $labels = array(
        'name'                => ( 'Menu de testes'),
        'singular_name'       => ( 'Menu de teste'),
        'menu_name'           => ( 'Menu de testes'),
        'parent_item_colon'   => ( 'Menu de testes'),
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
    
    register_post_type( 'post_menu_testes',
        array(
            'show_ui' => true,
            'menu_icon'         => 'dashicons-color-picker',
            'labels'            => $labels,
            'public'            => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'menu_position'     => 5,
            'has_archive'       => false,
            'hierarchical'      => false,
            'supports'          => array( 'title'),
        )
    );
}

add_action('init', 'posttype_menu_testes');