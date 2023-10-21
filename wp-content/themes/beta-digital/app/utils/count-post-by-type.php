<?php
function get_term_post_count_by_type($term, $taxonomy, $type){
    $args = array( 
        'posts_per_page' => -1,
        'post_type' => $type, 
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => $term
            )
        )
     );
    $ps = get_posts( $args );
    if (count($ps) > 0){return count($ps);}else{return 0;}
}
?>