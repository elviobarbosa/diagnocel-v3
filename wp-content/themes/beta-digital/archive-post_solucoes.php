<?php get_header(); ?>

<main <?php post_class('archive-solucoes ' . $desktop) ?>>

    <?php
    $heading = ['<h1 class="archive-solucoes__title">', '</h1>'];
    if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="archive-solucoes__container">
            <div class="archive-solucoes__texts">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title($heading[0], $heading[1]); ?>
                    <svg class="" viewBox="0 0 23 14">
                        <use href="<?php echo SVGPATH ?>arrow-red"></use>
                    </svg>
                </a>
            </div>  
        </article>
        <?php
        $heading = ['<h2 class="archive-solucoes__title">', '</h2>'];
    endwhile; endif;
    ?>
</main>

<?php get_footer(); ?>