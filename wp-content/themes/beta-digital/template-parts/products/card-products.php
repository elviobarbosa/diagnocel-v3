<?php
$terms = get_terms( array( 
    'taxonomy' => 'tax_name',
    'parent'   => 0
) );
    $post_cat = get_the_terms( $args['ID'], 'prod-type_category' );
    $cat_list = '';
    $siteURL = site_URL('/produtos/categoria');
    $partner = get_field('parceiro', $args['ID']);
    
    if ($post_cat && !is_wp_error($post_cat)) {
        foreach ($post_cat as $term) {
            if ($term->parent !== 0) {
                $cat_list .= "<a href='{$siteURL}/{$term->slug}' title='{$term->name}' class='c-card-products__category'>{$term->name}</a>";
            }
        }
    }
    $post_terms = join(',', wp_list_pluck($post_cat, 'slug'));
?>
<div class="c-card-products product" data-id="<?php echo $args['ID'] ?>">
    <div class="c-square-detail"></div>
    <div class="c-card-products__head">
        <div class="c-card-products__brand">
            <figure>
                <?php echo get_the_post_thumbnail( $partner[0]->ID, 'brand' ); ?>
            </figure>
           
        </div>

        <div class="c-card-products__image">
            <a href="<?php echo $args['guid'] ?>" alt="Veja mais detalhes do produto: <?php echo $args['title'] ?>">
                <figure class="c-card-products__figure"><?php echo get_the_post_thumbnail( $args['ID'], 'medium' ); ?></figure>
            </a>
        </div>
    </div>

    <div class="c-card-products__content">
        <h2 class="c-card-products__name">
            <a href="<?php echo $args['guid'] ?>" alt="Veja mais detalhes do produto: <?php echo $args['title'] ?>"><?php echo $args['title'] ?></a>
        </h2>
        <!-- <div class="c-card-products__resume">
            <p>
                <a href="<?php echo $args['guid'] ?>" alt="Veja mais detalhes do produto: <?php echo $args['title'] ?>"><?php echo $args['resume'] ?></a>
            </p>
        </div> -->
    </div>

</div>