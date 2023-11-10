<?php
function timeline() {
    $argsQuery = array(
        'post_type'         => 'post_timeline',
        'post_status'       => 'publish',
        'posts_per_page'    => -1
    );
    $post_list = get_posts($argsQuery);
    $data = [
        'slidesPerView' => 'auto',
        'spaceBetween'  => '30px',
        'pagination' => [
            'el' => '.swiper-pagination',
            'clickable' => true
        ]
    ];
    $result = '<div class="swiper timeline" data-params=\''. wp_json_encode( $data )  .'\'>';
    $result .= '<div class="swiper-wrapper timeline__wrapper">';
    foreach ( $post_list as $post ) :
        setup_postdata($post);
        $postContent = get_the_content($post->ID);
        $postYear = get_field('ano', ($post->ID));
        $result .= '<div class="swiper-slide timeline__slider">';
        $result .= '<div class="timeline__year">'. $postYear .'</div>';
        $result .= '<div class="timeline__content">' . $postContent .'</div>';
        $result .= '</div>';
    endforeach;
    wp_reset_postdata();
    
    $result .= '</div><div class="swiper-pagination"></div></div>';

    // for ($i = 1; $i < 5; $i++) {
    //     $opacity -= 0.15;
    //     $position -= 10;
    //     $decorator .= '<div class="partners-slide__decorator" style="opacity:' .$opacity. '; transform: translate('.abs($position).'px, '.$position.'px) skewY(10deg)"></div>';
    // }
    // $result = '<div class="partners-slide">';
    // $result .= '<div class="partners-slide__container" data-js="slick" data-slick=\''. wp_json_encode( $slickdata )  .'\'>';
    // foreach ( $post_list as $post ) :
    //     $result .= '<div class="partners-slide__item">'.get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'alignleft' ) ).'</div>';
    // endforeach;
    // $result .= '</div>';
    // $result .= $decorator;
    // $result .= '</div>';
    return $result;
}
add_shortcode('timeline', 'timeline');