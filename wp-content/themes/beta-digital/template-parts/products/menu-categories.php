
<ul class="menu-categories">
<?php
    foreach ( $args['categories'] as $category ) {
    ?>
    <li>
        <a 
        href="<?php echo site_url('/produtos-por-categoria/') . $category->slug ?>" 
        title="Ver produtos por categoria: <?php echo $category->name ?>">
        <?php echo $category->name ?>
        </a>
    </li>

    <?php
    }
?>
</ul>

<div class="menu-categories__more">
    <span>+ categorias</span>
    <ul class="menu-categories__submenu"></ul>
</div>
