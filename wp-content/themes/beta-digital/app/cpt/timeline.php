<?php
function posttype_timeline() 
{    
    $labels = array(
        'name'                => ( 'Timeline'),
        'singular_name'       => ( 'Timeline'),
        'menu_name'           => ( 'Timeline'),
        'parent_item_colon'   => ( 'Timeline'),
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
    
    register_post_type( 'post_timeline',
        array(
            'show_ui'           => true,
            'menu_icon'         => 'dashicons-groups',
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

add_action( 'init', 'posttype_timeline' );