<?php
// Template Name: Single Blog

get_header();
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="single-post__main">
        <div class="container">
            <div class="single-post__category">
                <ul>
                <?php
                $post_categories = wp_get_post_categories( get_the_ID() );
                        
                // foreach($post_categories as $c){
                //     $cat = get_category( $c );
                //     echo '<li><a href="'.get_category_link($c).'">'.$cat->name.'</a> <span>/<span> </li>';
                // }
                
                ?>
                </ul>
            </div>
            
            <div class="single-post__container">
                <article>
                    <div class="single-post__header">
                        <h1 class="single-post__title-blog"><?php the_title() ?></h1>
                    </div>

                    <div class="single-post__features">
                        <time 
                            class="single-post__date" 
                            datetime="<?php echo get_the_date( 'Y-d-m' ) ?> <?php the_time( 'H:i:s' ) ?>">
                            <?php echo get_the_date( 'j M Y' ) ?>
                        </time>
                        <div class="single-post__shared">
                            <ul>
                                <li>
                                    <a href="<?php echo shareSocial('facebook') ?>">
                                        <svg class="" viewBox="0 0 22 22">
                                            <use href="<?php echo SVGPATH ?>ico-share-facebook"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo shareSocial('twitter') ?>">
                                        <svg class="" viewBox="0 0 22 22">
                                            <use href="<?php echo SVGPATH ?>ico-share-twitter"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo shareSocial('whatsapp') ?>">
                                        <svg class="" viewBox="0 0 22 22">
                                            <use href="<?php echo SVGPATH ?>ico-share-whatsapp"></use>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
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
    
    get_footer();
    ?>

<?php get_footer(); ?>