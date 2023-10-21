<?php
get_header();
//$desktop = ( !wp_is_mobile() ) ? 'single-products__desktop' : '';

$categories = get_terms( array(
    'taxonomy' => 'prod_category',
    'parent'   => 0, 
) );

?>
<?php //get_template_part('template-parts/components/cta') ?>
<?php //get_template_part('template-parts/products/contact') ?>
<div class="prod-category" data-js="menu-prod-category">
    <?php
    // if (wp_is_mobile()) {
    //     get_template_part('template-parts/products/dropdown-filter');
    // } else {
            get_template_part('template-parts/products/menu-categories', null, [
            'categories' => $categories
            ]);
    // }
    ?>
</div>
<main <?php post_class('archive-products ' . $desktop) ?>>
    <div class="bg-square"></div>
    <article class="archive-products__container">
        <?php
            foreach ( $categories as $category ) {
                
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
                        if ( $total > 4) :
                        ?>
                        <a class="archive-products__category-link" href="<?php echo $category->slug ?>">Ver todos <span><?php echo $total ?></span></a>
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
        ?>
   </article>
</main>

<?php get_footer(); ?>