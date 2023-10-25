
<?php
$subtitle = is_singular(array('post_produtos')) ? get_the_title() : "";

function byCat($post, $title, $subtitle) {
    $orig_post = $post;
    global $post;
    $categories = get_the_terms( $post->ID, 'prod-type_category' );
    
    if ($categories) 
    {
        $category_ids = array();
        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
        $args = array(
            'post_type' => 'post_produtos',
            'category__in' => $category_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page'=> 4,
            'ignore_sticky_posts'=>1
        );

        $myposts = get_posts( $args );

        if ( !$myposts ) {
            $args = array(
                'post_type' => 'post_produtos',
                'posts_per_page'=> 4,
                'post__not_in' => array($post->ID),
                'ignore_sticky_posts'=>1
            );
    
            $myposts = get_posts( $args );
        }

        if ( $myposts ) 
        {
            ?>
            <section class="c-products-related">
                <div class="c-products-related__container">
                    <h2 class="c-products-related__title">Mais produtos</h2>
                    <div class="archive-products__grid">
                        <?php
                        foreach ( $myposts as $post ) 
                        {
                            setup_postdata( $post );
                            $id = get_the_ID();
                            get_template_part('template-parts/products/card-products', null, [
                                'title'    => $post->post_title,
                                'resume'   => $post->post_excerpt,
                                'guid'     => $post->guid,
                                'ID'       => $post->ID,
                                'show_cat' => false
                            ]);
                        }
                        ?>
                    </div>
                </div>
            </section>
            <?php
        }
        $post = $orig_post;
        wp_reset_query();
    }
}

byCat($args['post'], $args['title'], $subtitle);
?>
