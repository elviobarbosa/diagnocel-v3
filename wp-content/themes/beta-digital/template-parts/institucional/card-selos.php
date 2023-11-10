
<div class="c-card-selos">
    <div class="c-card-selos__head">
        <div class="c-card-selos__image">
            <figure class="c-card-selos__figure">
                <?php echo wp_get_attachment_image( $args['image'] , 'full');  ?>
            </figure>
        </div>
    </div>

    <div class="c-card-selos__content">
        <h2 class="c-card-selos__name">
            <?php echo $args['title'] ?>
        </h2>
        <div class="c-card-selos__description">
            <?php echo $args['descricao'] ?>
        </div>
        
    </div>

</div>