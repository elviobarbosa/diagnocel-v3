<?php
function posttype_solucoes() 
{    
    $labels = array(
        'name'                => ( 'Soluções inteligentes'),
        'singular_name'       => ( 'Soluções inteligentes'),
        'menu_name'           => ( 'Soluções inteligentes'),
        'parent_item_colon'   => ( 'Soluções inteligentes'),
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
    
    register_post_type( 'post_solucoes',
        array(
            'show_ui' => true,
            'menu_icon'         => 'dashicons-randomize',
            'labels'            => $labels,
            'public'            => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'menu_position'     => 5,
            'show_in_rest'      => true,
            'has_archive'       => true,
            'hierarchical'      => false,
            'rewrite'           => array('slug' => 'solucoes-inteligentes'),
            'supports'          => array( 'title', 'thumbnail', 'editor', 'excerpt'),
        )
    );
}

add_action( 'init', 'posttype_solucoes' );