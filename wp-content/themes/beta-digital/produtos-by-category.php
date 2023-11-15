<?php
get_header();
$cat_name = single_term_title("", false);
$product_cat = get_term_by('name', $cat_name, 'prod_category');
$queried_term = get_queried_object();
$taxonomy = $queried_term->taxonomy;

$post_size_categories = get_terms(array(
    'taxonomy' => 'prod-size_category',
    'hide_empty' => false,
));

$categories = get_terms( array(
    'taxonomy' => 'prod_category',
    'parent'   => 0, 
) );

?>

<div class="prod-category" data-js="menu-prod-category">
    <?php
    get_template_part('template-parts/products/menu-categories', null, [
        'categories' => $categories
    ]);
    ?>
</div>
<main <?php post_class('archive-products ' . $desktop) ?>>
    <div class="bg-square"></div>
    <h1 class="archive-products__category-name"><?php echo $cat_name ?></h1>
    <article class="archive-products__container">
        <?php
        if ($product_cat && !is_wp_error($product_cat)) :
            //foreach ($post_size_categories as $post_size_category) :

                $category_posts = get_posts(array(
                    'post_type' => 'post_produtos',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => $taxonomy,
                            'field' => 'term_id',
                            'terms' => $product_cat->term_id,
                        ),
                        // array(
                        //     'taxonomy' => 'prod-size_category',
                        //     'field' => 'term_id',
                        //     'terms' => $post_size_category->term_id,
                        // ),
                    ),
                ));
                if ($category_posts) :
                    ?>
                    <!-- <div class="archive-products__category-head">
                        <h2 class="archive-products__subcategory-name"><?php echo $post_size_category->name ?></h2>
                    </div> -->
                    <div class="archive-products__grid">
                        <?php foreach ($category_posts as $post) : ?>
                            <?php
                            get_template_part('template-parts/products/card-products', null, [
                                'title' => $post->post_title,
                                'resume' => $post->post_excerpt,
                                'guid' => get_permalink($post->ID),
                                'ID' => $post->ID
                            ]);
                            ?>
                        <?php endforeach; ?>
                    </div>
                    <?php 
                endif;
            //endforeach;
        endif;
        ?>
    </article>
</main>

<?php get_footer(); ?>
