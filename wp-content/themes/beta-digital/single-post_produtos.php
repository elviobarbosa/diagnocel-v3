<?php
get_header();
$desktop = ( !wp_is_mobile() ) ? 'single-products__desktop' : '';
$termsProd = get_the_terms(get_the_ID(), 'prod_category');
$termsSize = get_the_terms(get_the_ID(), 'prod-size_category');
$partner = get_field('parceiro', get_the_ID());
$r_menu_testes = get_field('menu_de_testes', get_the_ID());
$menu_testes = get_field('items', $r_menu_testes[0]->ID);
$areas = get_field('area_de_atuacao', $partner[0]->ID);

function postTerms($terms) {
    if ($terms && !is_wp_error($terms)) {
        
        foreach ($terms as $term) {
            echo '<span>' . esc_html($term->name) . ' / </span>';
        }
    }
}

while ( have_posts() ) : the_post();
    ?>
    <main <?php post_class('single-products ' . $desktop) ?>>

        <article class="single-products__article">
            <div class="single-products__cover">
                <div class="single-products__cover-left">
                    <div>
                    <?php
                        the_title('<h1 class="single-products__title">', '</h1>');
                        ?>
                        <div class="single-products__category">
                        <?php
                        postTerms($termsSize);
                        postTerms($termsProd);
                    ?>
                        </div>
                    </div>

                    <div class="single-products__resume">
                        <?php the_excerpt() ?>
                    </div>

                    <div class="single-products__atuacao">
                        Áreas de atuação: 
                        <?php 
                        $area = implode(", ", $areas);
                        echo $area;
                        ?>
                    </div>
                </div>
                <div class="single-products__cover-right">
                    <div class="single-products__image">
                        <?php if (has_post_thumbnail()) : ?>
                            <figure>
                                <?php the_post_thumbnail() ?>
                            </figure>
                        <?php endif; ?>
                    </div>

                    <div class="single-products__brand">
                        <figure>
                            <?php echo get_the_post_thumbnail( $partner[0]->ID, 'brand' ); ?>
                        </figure>
                    </div>
                </div>
            </div>

            <div class="single-products__content">
                <div class="bg-square"></div>
                <div class="single-products__container">
                    <?php the_content() ?>
                </div>
            </div>
            
            <?php if ($menu_testes): ?>
                <div class="single-products__menu-testes">
                    <h2>Menu de testes</h2>
                    
                    <div class="c-accordeon" data-js="accordeon">
                    <?php
                    foreach ($menu_testes as $menu) :
                    ?>
                        
                        <div class="c-accordeon__group accordeon__group">
                            <div class="c-accordeon__control accordeon-control">
                                <h3 class="c-accordeon__title">
                                    <?php echo $menu['nome_do_item'] ?>
                                </h3>
                                <div class="c-accordeon__arrow">
                                    <svg class="" viewBox="0 0 14 8">
                                        <use href="<?php echo SVGPATH ?>arrow-down"></use>
                                    </svg>
                                </div>
                            </div>

                            <div class="c-accordeon__content accordeon-content">
                                <?php echo $menu['descricao_do_item'] ?>
                            </div>
                        </div>
                    
                    <?php
                    endforeach;
                    ?>
                    </div>
                    
                </div>
            <?php endif ?>
            
        </article>

        <div class="form-contato">
            <h2 class="form-contato__title">Fale conosco</h2>
            <?php echo do_shortcode('[contact-form-7 id="40f695f" title="Contato"]') ?>
        </div>
        
        <?php get_template_part('template-parts/products/products-related', null, [
            'post'  => $post,
            'title' => get_the_title()
        ]) ?>
        
    </main>

<?php 
endwhile;
get_footer(); ?>