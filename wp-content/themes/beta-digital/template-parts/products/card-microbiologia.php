
<div class="c-card-products c-card-products--microbiologia">
    <div class="c-card-products__head">
        <div class="c-square-detail"></div>
        <div class="c-card-products__image">
            <a href="<?php echo $args['guid'] ?>" alt="Veja mais detalhes do produto: <?php echo $args['title'] ?>">
                <figure class="c-card-products__figure"><?php echo wp_get_attachment_image( $args['image'] , 'full');  ?> </figure>
            </a>
        </div>
    </div>

    <div class="c-card-products__content">
        <h2 class="c-card-products__name">
            <a href="<?php echo $args['guid'] ?>" alt="Veja mais detalhes do produto: <?php echo $args['title'] ?>"><?php echo $args['title'] ?></a>
        </h2>
        
    </div>

</div>