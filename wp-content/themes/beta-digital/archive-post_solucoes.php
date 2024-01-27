<?php get_header(); ?>

<main <?php post_class('archive-solucoes ' . $desktop) ?>>

    <?php
    
    if (have_posts()) : while (have_posts()) : the_post(); 
        $bg = '';
        $title_white = '';
        if ( has_post_thumbnail() ) {
            $thumbnail_url = get_the_post_thumbnail_url();
            $bg = 'style="background-image: url(' . esc_url( $thumbnail_url ) . ')"';
            $title_white = 'archive-solucoes__title--white';
        }
        $heading = ['<h1 class="archive-solucoes__title '.$title_white.'">', '</h1>'];
    ?>
        <article class="archive-solucoes__container" <?php echo $bg ?>>
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