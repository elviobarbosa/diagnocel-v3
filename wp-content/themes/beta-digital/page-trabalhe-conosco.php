<?php get_header(); ?>

<main <?php post_class('contato') ?>>
    
    
    <div class="contato__tabs-container">
        <h1 class="page-title contato__title">Trabalhe conosco</h1>
        
            
            <?php 
            echo do_shortcode('[contact-form-7 id="3e0cb72" title="Trabalhe conosco"]');
            ?>
            

    </div>
</main>

<?php get_footer(); ?>