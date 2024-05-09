<?php get_header(); ?>
	<?php
		$cat_id = $wp_query->get_queried_object_id();
		$args = array( 'post_type' => 'post', 'posts_per_page' => 10, 'cat' => $cat_id, );
		$my_query = new WP_Query( $args );?>


<section <?php post_class('blog') ?>>
    <div class="container blog__container">
		<div class="blog__posts">
			<h1 class="page-title" style="padding: 0 30px">Diagnews / <span style="color: var(--secondary-color)"><?php single_cat_title()?></span></h1>
		</div>
	
        <div class="">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
			$imgStyle = (has_post_thumbnail()) ? 'blog__article-image' : '';
			?>
				<article id="post-<?php the_ID(); ?>" class="blog__parent">
					<div class="blog__posts">
						<div class="blog__article <?php echo $imgStyle ?>">
							<?php if (has_post_thumbnail()) : ?>
							<figure class="blog__image">
								<a class="blog__link" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail() ?>
								</a>
							</figure>
							<?php endif; ?>

							<div class="blog__content">
								<time 
									class="blog__date" 
									datetime="<?php echo get_the_date( 'Y-d-m' ) ?> <?php the_time( 'H:i:s' ) ?>">
									<?php echo get_the_date( 'j M Y' ) ?>
								</time> 
									<h2 class="blog__title"><a class="blog__link" href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
									<p class="blog__excerpet"><?php echo get_the_excerpt() ?></p>
							</div>
						</div>
					</div>
				</article>
			<?php endwhile; endif; ?>
            
        </div>
		
    </div>
	<?php
	the_posts_pagination( array(
		'prev_text' => __( '<', 'textdomain' ),
		'next_text' => __( '>', 'textdomain' ),
	) );
	?>
</section>

<?php get_footer(); ?>