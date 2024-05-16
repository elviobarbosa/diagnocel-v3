<?php
namespace App;

class Controllers {
    public static function getProdutosByCategoria($cat_slug) {

        $cat = get_term_by('slug', $cat_slug, 'prod_category');
        print_r($cat);

    }

}