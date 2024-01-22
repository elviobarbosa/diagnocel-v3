<?php
function posttype_selos() 
{    
    $labels = array(
        'name'                => ( 'Selos e certificados'),
        'singular_name'       => ( 'Selos e certificados'),
        'menu_name'           => ( 'Selos e certificados'),
        'parent_item_colon'   => ( 'Selos e certificados'),
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
    
    register_post_type( 'post_selos',
        array(
            'show_ui'           => true,
            'menu_icon'         => 'dashicons-awards',
            'labels'            => $labels,
            'public'            => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'menu_position'     => 5,
            'show_in_rest'      => true,
            'has_archive'       => false,
            'hierarchical'      => false,
            'supports'          => array( 'title', 'editor', 'thumbnail'),
        )
    );
}

add_action( 'init', 'posttype_selos' );