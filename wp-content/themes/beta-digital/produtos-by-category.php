<?php
get_header();
$cat_name = single_term_title("", false);
$product_cat = get_term_by('name', $cat_name, 'prod_category');
$queried_term = get_queried_object();
$taxonomy = $queried_term->taxonomy;
$prod_names = array();

$categories = get_terms( array(
    'taxonomy' => 'prod_category',
    'parent'   => 0, 
) );

$post_type = get_post_type();
$term_list = get_the_terms($post->ID, 'prod_category');
$termo = [];
$bg = '';
$description  = '';

if ($term_list && !is_wp_error($term_list)) {
    $termo = $term_list[0];
    $bg = (get_field('imagem_de_destaque', $termo)) ? 'style="background-image: url(' . esc_url( get_field('imagem_de_destaque', $termo) ) . ')"' : '';
    $description = $termo->description;
}

?>
<main>
    <div class="archive-products__category-cover" <?php echo $bg ?>>
        <h1 class="archive-products__category-name js-scroll scrolled slide-from-right"><?php echo $cat_name ?></h1>
        <div class="archive-products__category-description scrolled js-scroll slide-from-right"><p><?php echo $description ?></p></div>
    </div>

    <div <?php post_class('archive-products ' . $desktop) ?>>
        <div class="bg-square"></div>
            
        <article class="archive-products__container">
            <div>
            <?php
            if ($product_cat && !is_wp_error($product_cat)) :

                $category_posts = get_posts(array(
                    'post_type' => 'post_produtos',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => $taxonomy,
                            'field' => 'term_id',
                            'terms' => $product_cat->term_id,
                            'include_children' => false, 
                        ),
                    ),
                ));
                if ($category_posts) :
                    
                    $term_slug = single_term_slug();
                    $category_term = get_term_by('slug', $term_slug, 'prod_category');
                    
                    ?>
                    <div class="archive-products__grid">
                        <?php 
                        foreach ($category_posts as $post) : 
                            $term_list = wp_get_post_terms($post->ID, 'category', ['fields' => 'all']);
                            $post_categories = get_the_terms( $post->ID, 'prod_category' );
                            $post_category_ids = array();
                            if(current_user_can('editor')) { 
                                print_r($post_category_ids);
                            } 

                            // if ( $post_categories && !is_wp_error( $post_categories ) ) {
                            //     foreach ( $post_categories as $category ) {
                            //         $post_category_ids[] = $category->term_id;
                            //     }
                            // }

                            // if ( !empty( $post_category_ids ) ) {
                            //     foreach ( $post_category_ids as $category_id ) {
                            //         $child_categories = get_term_children( $category_id, 'prod_category' );
                                    
                            //         if ( !empty( $child_categories ) ) {
                            //             foreach ( $child_categories as $child_category_id ) {
                            //                 if ( in_array( $child_category_id, $post_category_ids ) ) {
                            //                     $isParent = true;
                            //                     break;
                            //                 }
                            //             }
                            //         }
                            //     }
                            // }
                            
                            //$child_categories = get_the_terms($post->ID, 'prod_category');
                            //$child_category_slug = get_permalink($post->ID);
                            //echo '<pre>';
                            //print_r($child_categories);
                            //echo '</pre>';
                            // foreach ($child_categories as $child_category) {
                            //     if ($child_category->parent != 0 && $category_term->parent == 0) {
                            //         $child_category_slug = '?prod_category=' . $child_category->slug;
                            //     }
                            // }

                            get_template_part('template-parts/products/card-products', null, [
                                'title' => $post->post_title,
                                'resume' => $post->post_excerpt,
                                'guid' => $child_category_slug,
                                'ID' => $post->ID
                            ]);

                            // if ($parentPage) {
                            //     array_push($prod_names, array('name'=>$post->post_title, 'id'=>$post->ID));
                            //     get_template_part('template-parts/products/card-products', null, [
                            //         'title' => $post->post_title,
                            //         'resume' => $post->post_excerpt,
                            //         'guid' => $child_category_slug,
                            //         'ID' => $post->ID
                            //     ]);

                            // } else if (!$isParent) {
                            //     array_push($prod_names, array('name'=>$post->post_title, 'id'=>$post->ID));
                            //     get_template_part('template-parts/products/card-products', null, [
                            //         'title' => $post->post_title,
                            //         'resume' => $post->post_excerpt,
                            //         'guid' => $child_category_slug,
                            //         'ID' => $post->ID
                            //     ]);
                            // }
                            
                        endforeach; ?>
                    </div>
                    <?php 
                endif;
            endif;
            ?>
            </div>
            <div class="archive-products__sidebar">
                <ul data-js="product-list">
                    <li data-filter="all" class="active">TODOS</li>
                <?php  
                foreach ($prod_names as $prod_name) :
                    echo '<li data-filter="'. $prod_name['id'].'">' . $prod_name['name'] . '</li>';
                endforeach;
                ?>
                </ul>
            </div>
        </article>
    </div>
</main>

<?php get_footer(); ?>
