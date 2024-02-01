<?php get_header(); ?>

<main <?php post_class('archive-servicos ' . $desktop) ?>>

    <?php
    $heading = ['<h1 class="archive-servicos__title">', '</h1>'];
    if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="archive-servicos__container">
            <div class="archive-servicos__texts js-scroll slide-from-left">
                <?php the_title($heading[0], $heading[1]); ?>
                <div class="archive-servicos__content">
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="archive-servicos__thumbnail-container">
                <div class="square-details">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="archive-servicos__thumbnail js-scroll slide-from-right">
                    <figure class="archive-servicos__figure"><?php the_post_thumbnail('large') ?></figure>
                </div>
            </div>
        </article>
        <?php
        $heading = ['<h2 class="archive-servicos__title">', '</h2>'];
    endwhile; endif;
    ?>
</main>

<?php get_footer(); ?>