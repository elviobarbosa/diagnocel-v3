<?php get_header(); ?>

<main <?php post_class('sustentabilidade') ?>>
    <?php the_content();
    $args = array(
        'post_type' => 'post_acoes',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
    ?>

    <div class="sustentabilidade__container">
        <?php   
            the_title('<h2>', '</h2>');
            the_content();
        ?>
    </div>
    <?php
     endwhile;
     else :
         echo 'Não foram encontrados posts.';

     endif;?>
</main>

<?php get_footer(); ?>