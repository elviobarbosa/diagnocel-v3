<?php

function adicionar_filtro_taxonomia_post_produtos() {
    global $typenow;

    if ($typenow == 'post_produtos') {

        $termos = get_terms('prod_category');

        echo '<select name="prod_category_filtro">';
        echo '<option value="">Todas as Categorias</option>';

        foreach ($termos as $termo) {
            $selecionado = (isset($_GET['prod_category_filtro']) && $_GET['prod_category_filtro'] == $termo->slug) ? 'selected="selected"' : '';
            echo '<option value="' . $termo->slug . '" ' . $selecionado . '>' . $termo->name . '</option>';
        }

        echo '</select>';
    }
}

add_action('restrict_manage_posts', 'adicionar_filtro_taxonomia_post_produtos');

function aplicar_filtro_taxonomia_post_produtos($query) {
    global $pagenow;
    $tipo_post = 'post_produtos';

    if ($pagenow == 'edit.php' && isset($_GET['prod_category_filtro']) && $_GET['prod_category_filtro'] != '') {
        $termo_slug = $_GET['prod_category_filtro'];
        $tax_query = array(
            array(
                'taxonomy' => 'prod_category',
                'field' => 'slug',
                'terms' => $termo_slug,
            ),
        );

        $query->set('tax_query', $tax_query);
    }
}

add_action('pre_get_posts', 'aplicar_filtro_taxonomia_post_produtos');
