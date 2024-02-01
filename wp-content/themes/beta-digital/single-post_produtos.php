<?php
get_header();
$desktop = ( !wp_is_mobile() ) ? 'single-products__desktop' : '';
$termsProd = get_the_terms(get_the_ID(), 'prod_category');
$termsSize = get_the_terms(get_the_ID(), 'prod-size_category');
$partner = get_field('parceiro', get_the_ID());
$gallery = get_field('galeria_imagem');
$r_menu_testes = get_field('menu_de_testes', get_the_ID());
$menu_testes = get_field('items', $r_menu_testes[0]->ID);
$areas = get_field('area_de_atuacao', $partner[0]->ID);

$swiper_parms = [
    'slidesPerView' => 1,
    'spaceBetween'  => 0,
    'navigation'    => [
        'nextEl' => '.swiper-button-next',
        'prevEl' => '.swiper-button-prev',
    ],
];

function postTerms($terms) {
    if ($terms && !is_wp_error($terms)) {
        
        foreach ($terms as $term) {
            echo '<span>' . esc_html($term->name) . ' </span>';
        }
    }
}

while ( have_posts() ) : the_post();
    ?>
    <main <?php post_class('single-products ' . $desktop) ?>>

        <div class="jump-menu">
            <ul class="jump-menu__list" data-js="scroll-to">
                <li><a href="#caracteristicas">Características</a></li>
                <?php if ($menu_testes): ?><li><a href="#menu-testes">Menu de testes</a></li><?php endif ?>
                <li><a href="#fale-conosco">Fale conosco</a></li>
                <li><a href="#mais-produtos">Mais produtos</a></li>
            </ul>
        </div>

        <article class="single-products__article">
            <div class="single-products__cover" id="caracteristicas">
                <div class="single-products__cover-left">
                    <div>
                    <?php
                        the_title('<h1 class="single-products__title">', '</h1>');
                        ?>
                        <div class="single-products__category">
                        <?php
                        postTerms($termsSize);
                        
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

                        <div class="swiper" data-params=<?php echo wp_json_encode($swiper_parms) ?>>
                            
                            <div class="swiper-wrapper">
                                <?php 
                                    if (has_post_thumbnail()) : ?>
                                        <div class="swiper-slide">
                                            
                                            <figure>
                                                <?php the_post_thumbnail() ?>
                                            </figure>
                                        
                                        </div>
                                        <?php 
                                    endif; 
                                ?>
                                <?php foreach( $gallery as $image ): ?>
                                    <div class="swiper-slide">
                                        <figure>
                                            <?php echo wp_get_attachment_image( $image['ID'], 'large' ); ?>
                                        </figure>
                                    </div>
                                <?php endforeach; ?>
                                
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>

                        </div>

                        
                    </div>

                    <div class="single-products__brand">
                        <figure>
                            <?php echo get_the_post_thumbnail( $partner[0]->ID, 'brand' ); ?>
                        </figure>
                    </div>
                </div>
            </div>

            <div class="single-products__content">
                <div class="bg-square js-scroll slide-from-left"></div>
                <div class="single-products__container js-scroll to-up">
                    <?php the_content() ?>
                </div>
            </div>
            
            <?php if ($menu_testes): ?>
                <div class="single-products__menu-testes" id="menu-testes">
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

        <div class="form-contato" id="fale-conosco">
            <h2 class="form-contato__title">Tem interesse?</h2>
            <p>Envie seus dados abaixo, entraremos em contato o mais breve possível.</p>
            <?php echo do_shortcode('[contact-form-7 id="40f695f" title="Contato"]') ?>
        </div>
        
        <div id="mais-produtos">
        <?php get_template_part('template-parts/products/products-related', null, [
            'post'  => $post,
            'title' => get_the_title()
        ]) ?>
        </div>
        
    </main>

<?php 
endwhile;
get_footer(); ?>