<?php
get_header();

$argsCat = array(
	'hide_title_if_empty' => true,
)
?>

<section class="search__container" >

    <h1 class="search__title-page">Você pesquisou por: <span><?php echo get_search_query(); ?></span></h1>

    <div class="">
        <div class="search__posts">
			<?php if ( have_posts() ) { while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" class="search__article">
					<?php if (has_post_thumbnail()) : ?>
					<figure class="search__image">
						<a class="search__link" href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail() ?>
						</a>
					</figure>
					<?php else: ?>
						<div class="no-image"></div>
					<?php endif; ?>

					<div class="search__content">
						<time 
							class="search__date" 
							datetime="<?php echo get_the_date( 'Y-d-m' ) ?> <?php the_time( 'H:i:s' ) ?>">
							<?php echo get_the_date( 'j M Y' ) ?>
						</time> 
						<a class="search__link" href="<?php the_permalink(); ?>">
							<h2 class="search__title"><?php the_title() ?></h2>
							<p class="search__excerpet"><?php echo getExcerpt(200, $post->ID) ?></p>
						</a>
					</div>
				</article>
			<?php endwhile; 
			} else { ?>
			<h2>Não há nenhum resultado pra sua busca.</h2>
			<?php }; ?>            
        </div>

    </div>
	<?php
	the_posts_pagination( array(
		'prev_text' => __( '<', 'textdomain' ),
		'next_text' => __( '>', 'textdomain' ),
	) );
	?>
</section>

<?php
get_footer();
?>