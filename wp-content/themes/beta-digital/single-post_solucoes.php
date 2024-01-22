<?php
// Template Name: Single Blog

get_header();
?>
<main <?php post_class('single-solucoes ' . $desktop) ?>>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="single-post__main">
            <div class="container">
                
                
                <div class="single-post__container">
                    <article>
                        <div class="single-post__header">
                            <h1 class="single-post__title-blog"><?php the_title() ?></h1>
                        </div>

                        <div class="single-post__body">
                            <div class="single-post__content">
                                <?php the_content() ?>
                            </div>
                        </div>
                </div>
            </div>


            <div class="single-post__share">
                <div class="container">
                    <div class="single-post__container">

                        
                    </div>
                </div>
            </div>
        </div>

        <?php endwhile; endif;
        get_template_part( 'template-parts/blog/more-news', null, array('remove' => get_the_ID()) );
        ?>
    </main>
        <?php
        get_footer();
        ?>

<?php get_footer(); ?>