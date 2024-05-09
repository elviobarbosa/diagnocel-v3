<?php 
get_header();
$cat_name = single_term_title("", false);
$product_cat = get_term_by('name', $cat_name, 'prod_category');
$bg = '';
$description  = '';
$prod_names = array();

if ($term_list && !is_wp_error($term_list)) {
    $termo = $term_list[0];
    $bg = (get_field('imagem_de_destaque', $termo)) ? 'style="background-image: url(' . esc_url( get_field('imagem_de_destaque', $termo) ) . ')"' : '';
    $description = $termo->description;
}

$args = array(
    'post_type' => 'post_produtos',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'prod_category',
            'field' => 'parent',
            'terms' => $product_cat->term_id,
        ),
    ),
);
$posts = get_posts($args);
// if(current_user_can('administrator')) { 
//     echo '<pre>';
//     print_r($posts);
//     echo '</pre>';
// } 
function compare_terms($a, $b) {
    return $a['term_id'] <=> $b['term_id'];
}
?>
<main>
    <div class="archive-products__category-cover" <?php echo $bg ?>>
        <h1 class="archive-products__category-name js-scroll scrolled slide-from-right"><?php echo $cat_name ?></h1>
        <div class="archive-products__category-description scrolled js-scroll slide-from-right"><p><?php echo $description ?></p></div>
    </div>
    <div <?php post_class('archive-products ') ?>>
        <div class="bg-square"></div>
            
        <article class="archive-products__container">
            <div>
                <?php
                if ( have_posts() ) : ?>
                    <div class="archive-products__grid">
                    
                        <?php 
                         $parent_terms_ids = array();
                        while ( have_posts() ) : the_post(); 
                        
                            $post_terms = get_the_terms(get_the_ID(), 'prod_category');  
                            $primary = $post_terms[0];

                            // if(current_user_can('administrator')) { 
                            //                 echo '<pre>';
                            //                 print_r($post_terms);
                            //                 echo 'term id';
                            //                 echo '</pre>';
                            //             } 
                            
                            if ($post_terms && !is_wp_error($post_terms)) {
                                $n = 0;
                                
                                foreach ($post_terms as $term) {
                                    if ($term->parent === $product_cat->term_id && $n == 0):
                                        array_push($parent_terms_ids, array('term_id'=>$term->term_id, 'id'=>get_the_ID()));
                                        
                                        // if(current_user_can('administrator')) { 
                                        //     echo '<pre>';
                                        //     print_r($parent_terms_ids);
                                        //     echo 'term id';
                                        //     echo '</pre>';
                                        // } 
                                   endif;
                                    $n++;
                                }
                                
                            }

                            // if(current_user_can('administrator')) { 
                            //     echo '<pre>';
                            //     print_r($product_cat);
                            //     echo '</pre>';
                            // } 
                            
                            if ($primary->term_id == $product_cat->term_id && count($post_terms) == 1) {
                                array_push($prod_names, array('name'=>get_the_title(), 'id'=>get_the_ID()));
                                get_template_part('template-parts/products/card-products', null, [
                                    'title' => get_the_title(),
                                    'resume' => get_the_excerpt(),
                                    'guid' => get_the_permalink(),
                                    'ID' => get_the_ID()
                                ]);
                                // if(current_user_can('administrator')) { 
                                //     echo '<pre>';
                                //     print_r($prod_names);
                                //     echo '</pre>';
                                // } 
                            }
                        
                        endwhile; 
                        wp_reset_query();
                        
                        $unique_ids = array();

                        foreach ($parent_terms_ids as $item) {
                            
                            $found = false;
                            foreach ($unique_ids as $unique_item) {
                                if ($unique_item['term_id'] == $item['term_id']) {
                                    $found = true;
                                    break;
                                }
                            }
                            
                            if (!$found) {
                                $unique_ids[] = $item;
                            }
                        }
                        
                        foreach ($unique_ids as $term) {
                            $parent_term = get_term($term['term_id'], 'prod_category');
                    
                            if ($parent_term && !is_wp_error($parent_term)) {
                                array_push($prod_names, array('name'=>$parent_term->name, 'id'=>$term['id']));
                                get_template_part('template-parts/products/card-products', null, [
                                    'title' => $parent_term->name,
                                    'resume' => get_the_excerpt($term['id']),
                                    'guid' => '/produtos-por-categoria/' . $parent_term->slug,
                                    'ID' => $term['id']
                                ]);
                                // if(current_user_can('administrator')) { 
                                //     echo '<pre>';
                                //     print_r($prod_names);
                                //     echo '</pre>';
                                // } 
                            }
                            
                        }
                        ?>
                    </div>
                
                        <?php 
                    else : 
                        ?>
                        <p>Nenhum produto encontrado para esta categoria.</p>
                        <?php 
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
<?php
get_footer();
?>
</main>