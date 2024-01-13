<?php get_header(); 

$items = Array(
    [
    "ico" => "ico-denuncia",
    "name" => "Denúncia"
    ],
    [
    "ico" => "ico-solicitacao",
    "name" => "Solicitação"
    ],
    [
    "ico" => "ico-elogio",
    "name" => "Elogio"
    ],
    [
    "ico" => "ico-reclamacao",
    "name" => "Reclamação"
    ],
);
?>

<main <?php post_class('contato') ?>>
    <h1 class="page-title contato__title">Fale conosco</h1>
    
    <div class="contato__tabs-container">
        <div data-js="tabs" class="contato__tabs">
            <?php 
            for ($i = 0; $i < count($items); $i+=1) : ?>
                <div data-tab="contato-<?php echo $i?>" class="contato__tab tablinks">
                    <div  class=" contato__tablink">
                        <div>
                            <img src="<?php echo IMGPATH ?><?php echo $items[$i]["ico"]?>.png" alt="Faça uma denúncia">
                        </div>
                        <div class="contato__text">
                            <h3><?php echo $items[$i]["name"]?></h3>
                            
                            <div class="contato__svg">
                                <svg viewBox="0 0 23 14">  
                                    <use href="<?php echo SVGPATH ?>arrow-red"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
            endfor ?>
        </div>

        <div data-js="tabs" class="contato__tab-content">
            <div class="tab">
                <div id="contato-0" class="tabcontent">
                    <?php echo do_shortcode('[contact-form-7 id="2b31fcc" title="Denuncia"]') ?>
                    <?php 
                    get_template_part('template-parts/contato/endereco', null);
                    ?>
                </div>
                <div id="contato-1" data-tab="contato-2" class="tabcontent">
                    <?php echo do_shortcode('[contact-form-7 id="e08b92a" title="Solicitacao"]') ?>
                    <?php 
                    get_template_part('template-parts/contato/endereco', null);
                    ?>
                </div>
                <div id="contato-2" data-tab="contato-3" class="tabcontent">
                    <?php echo do_shortcode('[contact-form-7 id="2eab9f0" title="Elogio"]') ?>
                    <?php 
                    get_template_part('template-parts/contato/endereco', null);
                    ?>
                </div>
                <div id="contato-3" data-tab="contato-4" class="tabcontent">
                    <?php echo do_shortcode('[contact-form-7 id="09c174b" title="Reclamacao"]') ?>
                    <?php 
                    get_template_part('template-parts/contato/endereco', null);
                    ?>
                </div>
            </div>
        </div>

        
    </div>

    
     
</main>

<?php get_footer(); ?>