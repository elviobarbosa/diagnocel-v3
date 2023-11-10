<?php get_header(); ?>

<main <?php post_class('microbiologia') ?>>
    <?php the_title('<h1 class="archive-products__category-name">','</h1>'); ?>

    <div class="microbiologia__grid">
        <?php 
        
        if (function_exists('have_rows') && have_rows('categorias')) {
            while (have_rows('categorias')) {
                the_row();
    
                get_template_part('template-parts/products/card-microbiologia', null, [
                    'title'    => get_sub_field('nome_categoria'),
                    'image'    => get_sub_field('imagem'),
                    'guid'     => get_sub_field('link_produto'),
                    'ID'       => $post->ID
                ]);
            }
        }
        ?>
    </div>
    <div class="bg-square"></div>
</main>

<?php get_footer(); ?>