<?php
function posttype_parceiros() 
{    
    $labels = array(
        'name'                => ( 'Parceiros'),
        'singular_name'       => ( 'Parceiro'),
        'menu_name'           => ( 'Parceiros'),
        'parent_item_colon'   => ( 'Parceiros'),
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
    
    register_post_type( 'post_parceiros',
        array(
            'show_ui'           => true,
            'menu_icon'         => 'dashicons-groups',
            'labels'            => $labels,
            'public'            => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'menu_position'     => 5,
            'has_archive'       => false,
            'hierarchical'      => false,
            'rewrite'           => array('slug' => 'Parceiros'),
            'supports'          => array( 'title', 'thumbnail'),
        )
    );
}

function start_parceiros() {
    posttype_parceiros();
}

add_action( 'init', 'start_parceiros' );