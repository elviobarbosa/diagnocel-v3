<?php 

$cat_name = single_term_title("", false);
$product_cat = get_term_by('name', $cat_name, 'prod_category');
print_r($product_cat);
$post_type = get_post_type();
$term_list = get_the_terms($post->ID, 'prod_category');
print_r($term_list);
$bg = '';
$description  = '';
$prod_names = array();

if ($term_list && !is_wp_error($term_list)) {
    $termo = $term_list[0];
    $bg = (get_field('imagem_de_destaque', $termo)) ? 'style="background-image: url(' . esc_url( get_field('imagem_de_destaque', $termo) ) . ')"' : '';
    $description = $termo->description;
}

function remove_ascendents($terms, $term_id) {
    $terms_to_keep = array();
    $find_descendants = function($terms, $term_id, &$terms_to_keep) use (&$find_descendants) {
        foreach ($terms as $term) {
            if ($term->parent == $term_id) {
                $terms_to_keep[] = $term->term_id;
                $find_descendants($terms, $term->term_id, $terms_to_keep);
            }
        }
    };
    
    $terms_to_keep[] = $term_id;
    $find_descendants($terms, $term_id, $terms_to_keep);
    
    $filtered_terms = array_filter($terms, function($term) use ($terms_to_keep) {
        return in_array($term->term_id, $terms_to_keep);
    });
    
    return $filtered_terms;
}

?>

<?php
get_header();
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
                <div class="archive-products__grid">
                    <?php
                    while ( have_posts() ) : the_post(); 
                        $post_terms = get_the_terms(get_the_ID(), 'prod_category');
                        //print_r($post_terms);
                        

                        if ($post_terms) {
                            
                            $product_cat_term_id = $post_terms[0]->term_id;
                            //printf('<pre>%s</pre>', print_r($post_terms, true));
                            $filtered_terms = remove_ascendents($post_terms, $product_cat_term_id);
                            
                            foreach ($filtered_terms as $term) {
                        
                                if (($term->term_taxonomy_id === $product_cat->term_id && $term->parent !== $product_cat->term_id) && get_the_title() !== $product_cat->name) 
                                {
                                    array_push($prod_names, array('name'=>get_the_title(), 'id'=>get_the_ID()));
                                    get_template_part('template-parts/products/card-products', null, [
                                        'title' => get_the_title(),
                                        'resume' => get_the_excerpt(),
                                        'guid' => get_the_permalink(),
                                        'ID' => get_the_ID()
                                    ]);
                                }                                

                                if ($term->parent == $product_cat->term_id) {
                                    array_push($prod_names, array('name'=>get_the_title(), 'id'=>get_the_ID()));

                                    $children = count(get_term_children($term->term_id, 'prod_category'));
                                    if ($children > 0) {
                                        $link = '/produtos-por-categoria/' . $term->slug;
                                    } else {
                                        $link = get_the_permalink();
                                    }

                                    get_template_part('template-parts/products/card-products', null, [
                                        'title' => get_the_title(),
                                        'resume' => get_the_excerpt(),
                                        'guid' => $link,
                                        'ID' => get_the_ID()
                                    ]);
                                }            
                            }
                        }
                    
                    endwhile;
                    ?>
                </div>
                
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