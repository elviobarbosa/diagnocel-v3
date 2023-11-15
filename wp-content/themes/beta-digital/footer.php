<?php
$categories = get_terms( array(
    'taxonomy' => 'prod_category',
    'parent'   => 0, 
) );
?>
        <footer id="footer" class="footer">
            <div class="footer__container">
                <div class="footer__left">
                    <h2>Diagnóstico in Vitro</h2>
                    
                    <ul class="footer__categories">
                        <?php
                            foreach ( $categories as $category ) {
                            ?>
                            <li>
                                <a 
                                href="<?php echo $category->slug ?>" 
                                title="Ver produtos por categoria: <?php echo $category->name ?>">
                                <?php echo $category->name ?>
                                </a>
                            </li>

                            <?php
                            }
                        ?>
                    </ul>

                    <ul class="footer__selos">
                        <li><img src="<?php echo IMGPATH ?>selo-plante-arvore.png" alt="Plante uma árvore"></li>
                        <li><img src="<?php echo IMGPATH ?>selo-chico-mendes.png" alt="Instituto Chico Mendes"></li>    
                        <li><img src="<?php echo IMGPATH ?>selo-anvisa.png" alt="Anvisa"></li>

                    </ul>

                </div>

                <div class="footer__right">
                    <div class="footer__diagnocel">
                        <img src="<?php echo IMGPATH?>diagnocel.png" alt="Diagnocel">
                        <p>
                        <a href="tel:+558534623600" alt="Ligar">(85) 3462-3600</a><br>
                        <a href="" alt="Ver localização no Google Maps">R. Duarte Coelho, 399 - F<br>
                        Paupina - Fortaleza-CE<a></p>
                    </div>

                    <div class="footer__biocore">
                        <img src="<?php echo IMGPATH?>biocore.png" alt="Biocore">
                        <p>
                        <a href="tel:+558534623600" alt="Ligar">(85) 3462-3600</a><br>
                        <a href="" alt="Ver localização no Google Maps">R. Duarte Coelho, 399 - F<br>
                        Paupina - Fortaleza-CE<a></p>
                    </div>


                </div>
            </div>

        </footer>

    </body>
    <?php wp_footer() ?>
    <script type="module" src="<?php echo URLTEMA ?>/dist/scripts/frontend-bundle.js"></script>
</html>