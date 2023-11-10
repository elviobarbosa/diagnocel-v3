<?php
function posttype_servicos() 
{    
    $labels = array(
        'name'                => ( 'Serviços'),
        'singular_name'       => ( 'Serviço'),
        'menu_name'           => ( 'Serviços'),
        'parent_item_colon'   => ( 'Serviços'),
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
    
    register_post_type( 'post_servicos',
        array(
            'show_ui' => true,
            'menu_icon'         => 'dashicons-admin-tools',
            'labels'            => $labels,
            'public'            => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'menu_position'     => 5,
            'has_archive'       => true,
            'hierarchical'      => true,
            'rewrite'           => array('slug' => 'servicos'),
            'supports'          => array( 'title', 'thumbnail', 'editor'),
        )
    );
}

add_action( 'init', 'posttype_servicos' );