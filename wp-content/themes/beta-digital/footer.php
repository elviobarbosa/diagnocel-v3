<?php
$categories = get_terms( array(
    'taxonomy' => 'prod_category',
    'parent'   => 0, 
) );

$argsSelos = array(
    'post_type'         => 'post_selos',
    'post_status'       => 'publish',
    'posts_per_page'    => -1
);
?>
        <footer id="footer" class="footer">
            <div class="footer__container">
                
                <div class="footer__main">
                    <div class="footer__diagnocel">
                        <img src="<?php echo IMGPATH?>diagnocel.png" alt="Diagnocel">
                        <p>
                            <a href="https://maps.app.goo.gl/nM2pjEZeCTr2WjdA7" target="_blank" alt="Ver localização no Google Maps">R. Duarte Coelho, 399 - F<br>
                            Paupina - Fortaleza-CE</a><br><br>
                            <a href="tel:+558534623600" alt="Ligar">(85) 3462-3600</a>
                        </p>
                    </div>

                    <div class="footer__biocore">
                        <img src="<?php echo IMGPATH?>biocore.png" alt="Biocore">
                        <p>
                            <a href="https://maps.app.goo.gl/nM2pjEZeCTr2WjdA7" target="_blank" alt="Ver localização no Google Maps">R. Duarte Coelho, 399 - F<br>
                            Paupina - Fortaleza-CE</a><br><br>
                            <a href="tel:+558534623600" alt="Ligar">(85) 3462-3600</a>
                        </p>
                    </div>

                    <ul class="footer__termos">
                        <li><h3>Termos e Condições</h3></li>
                        <li><a href="<?php echo site_url('/codigo-de-conduta-e-etica-diagnocel')?>">Código de conduta e ética - Diagnocel</a></li>
                        <li><a href="<?php echo site_url('/codigo-de-conduta-e-etica-biocore')?>">Código de conduta e ética - Biocore</a></li>
                        <li><a href="<?php echo site_url('/politica-de-seguranca-da-informacao-diagnocel')?>">Política de Segurança da Informação – Diagnocel</a></li>
                        <li><a href="<?php echo site_url('/politica-de-seguranca-da-informacao-biocore')?>">Política de Segurança da Informação – Biocore</a></li>
                        <li><a href="<?php echo site_url('/responsabilidade-socioambiental')?>">Responsabilidade socioambiental</a></li>
                        <li><a href="<?php echo site_url('/politica-de-privacidade')?>">Política de privacidade</a></li>
                    </ul>
                </div>

                <ul class="footer__selos">
                    <?php 
                        $post_list = get_posts($argsSelos);

                        foreach ( $post_list as $post ) :
                            setup_postdata($post);
                        ?>
                        <li><img src="<?php echo get_the_post_thumbnail_url($post->ID)?>" alt="<?php echo get_the_title()?>"></li>
                        <?php
                        endforeach;
                        wp_reset_postdata();
                    ?>
                    
                </ul>

            </div>

            
        </footer>

    </body>
    <?php wp_footer() ?>
    <script type="module" src="<?php echo URLTEMA ?>/dist/scripts/frontend-bundle.js"></script>
</html>