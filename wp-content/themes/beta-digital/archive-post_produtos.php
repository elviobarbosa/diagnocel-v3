<?php
get_header();

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
<main <?php post_class('archive-products ') ?>>
    <div class="bg-square"></div>
    <article class="archive-products__container">
        <?php
            foreach ( $categories as $category ) {

                if ($category->slug === 'microbiologia') {
                    $microbiologia_id = get_page_by_path('microbiologia')->ID;
                    $microbiologia = get_field('categorias', $microbiologia_id);
                    ?>
                    <h2 class="archive-products__category-name"><?php echo $category->name ?></h2>
                    <div class="microbiologia">
                        <div class="microbiologia__grid">
                        <?php
                            if (have_rows('categorias', $microbiologia_id)) {
                                while (have_rows('categorias', $microbiologia_id)) {
                                    the_row();
                        
                                    get_template_part('template-parts/products/card-microbiologia', null, [
                                        'title'    => get_sub_field('nome_categoria', $microbiologia_id),
                                        'image'    => get_sub_field('imagem', $microbiologia_id),
                                        'guid'     => get_sub_field('link_produto', $microbiologia_id),
                                        'ID'       => $post->ID
                                    ]);
                                }
                            }
                            ?>
                        </div>
                        </div>
                        <?php 
                } else {
                
                    $category_posts = get_posts( array(
                        'post_type'      => 'post_produtos',
                        'posts_per_page' => 4,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'prod_category',
                                'field'    => 'term_id',
                                'terms'    => $category->term_id,
                            ),
                        ),
                    ) );
                    $total = get_term_post_count_by_type( $category->slug, 'prod_category', 'post_produtos' );
                    ?>
                    <div class="archive-products__category-head">
                        <h2 class="archive-products__category-name"><?php echo $category->name ?></h2>
                        <?php
                            if ($total > 4) :
                            ?>
                            <a class="archive-products__category-link" href="<?php echo site_url('/produtos-por-categoria/') . $category->slug ?>">Ver todos <span><?php echo $total ?></span></a>
                            <?php
                            endif;
                        ?>
                    </div>
                    <?php
                    echo '<div class="archive-products__grid">';

                    foreach ( $category_posts as $post ) {
                        get_template_part('template-parts/products/card-products', null, [
                            'title'    => $post->post_title,
                            'resume'   => $post->post_excerpt,
                            'guid'     => get_permalink($post->ID),
                            'ID'       => $post->ID
                        ]);
                    }
                    echo '</div>';
                }
            };       
        ?>
   </article>
</main>

<?php get_footer(); ?>