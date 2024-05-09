<?php
get_header();

if ( has_post_thumbnail() ) {
    $thumbnail_url = get_the_post_thumbnail_url();
    $bg = 'style="background-image: url(' . esc_url( $thumbnail_url ) . ')"';
}
?>
<main <?php post_class('single-solucoes ' . $desktop) ?>>
    <div class="single-solucoes__header" <?php echo $bg ?>>
        <h1 class="single-solucoes__title-blog"><?php the_title() ?></h1>
    </div>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="single-solucoes__main">
            <div class="container">
                
                <div class="single-solucoes__container">
                    <article>
                        <div class="single-solucoes__body">
                            <div class="single-solucoes__content">
                                <?php the_content() ?>
                            </div>
                        </div>
                </div>
            </div>

        </div>

        <?php endwhile; endif;?>
    </main>
        <?php
        get_footer();
        ?>

<?php get_footer(); ?>