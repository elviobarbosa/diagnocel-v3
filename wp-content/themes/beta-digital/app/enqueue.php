<?php
//================== STYLES e SCRIPTS ====================

function wpdocs_theme_name_scripts() {

    // wp_enqueue_script( 'frontend-ajax', URLTEMA . '/resources/scripts/agenda.js', array('jquery'), null, true );
    // wp_localize_script(
    //     'frontend-ajax',
    //     'frontend_ajax_object',
    //     array(
    //         'ajaxurl' => admin_url( 'admin-ajax.php' ),
    //         'nonce'   => wp_create_nonce('ajax-nonce')
    //     )
    // );
   
    //styles
    wp_enqueue_style('site-style', get_template_directory_uri() . '/dist/styles/frontend.css?' . rand(), array());
    
    function prefix_add_footer_styles() {
        wp_enqueue_style( 'font-inter', 'https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,300;0,6..12,500;0,6..12,700;0,6..12,800;1,6..12,300;1,6..12,500;1,6..12,700;1,6..12,800&display=swap' );
        wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css' );
        // wp_enqueue_style( 'fancybox-css', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css' );
       
    };
    
    //scripts
    wp_enqueue_script( 'jquery' );
   // wp_enqueue_script('swiper-js', get_template_directory_uri() . '/resources/scripts/frontend/utils/swiper.js', array(), '', true);

    //wp_enqueue_script('fancybox-js', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array(), '', true);
 }
 
 add_action( 'get_footer', 'prefix_add_footer_styles' );
 add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
 
 //================== STYLES e SCRIPTS ====================