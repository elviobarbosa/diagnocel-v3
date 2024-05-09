<?php

// function single_term_slug( $prefix = '', $display = false ) {
//     $term = get_queried_object();
//     if ( !$term )
//     return;
//     if ( is_category() )
//         $term_slug = apply_filters( 'single_cat_slug', $term->slug );
//     elseif ( is_tag() )
//         $term_slug = apply_filters( 'single_tag_slug', $term->slug );
//     elseif ( is_tax() )
//         $term_slug = apply_filters( 'single_term_slug', $term->slug );
//     else
//         return;
//     if ( empty( $term_slug ) )
//         return;
//     if ( $display )
//         echo $prefix . $term_slug;
//     else
//         return $term_slug;
//}