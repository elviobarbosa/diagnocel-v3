<?php get_header(); ?>

<main <?php post_class('sustentabilidade') ?>>
    <?php the_content() ?>

    <div class="sustentabilidade__container">
        <?php 
        if (function_exists('have_rows') && have_rows('selos')) {
            while (have_rows('selos')) {
                the_row();

                get_template_part('template-parts/institucional/card-selos', null, [
                    'title'     => get_sub_field('nome_selo'),
                    'image'     => get_sub_field('imagem'),
                    'descricao' => get_sub_field('descricao'),
                    'ID'        => $post->ID
                ]);
            }
        }
        ?>
    </div>
</main>

<?php get_footer(); ?>