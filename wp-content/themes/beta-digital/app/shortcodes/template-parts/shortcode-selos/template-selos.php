<?php
$content = $args['content'];
$images = $args['images'];
$active = 'active';
$style = 'style="display: block;"';
?>
<div data-js="tabs" class="selos-home__tab-content tab-content">
    <div class="tab">
        <?php 
        for ($i = 0; $i < count($content); $i+=1) : ?>
            <div id="selos-<?php echo $i ?>" class="selos-home__item tabcontent" <?php echo $style?>>
                <div class="selos-home__content"><?php echo $content[$i] ?></div>
            </div>
            <?php
            $style = '';
        endfor 
        ?>
    </div>
</div>

<div data-js="tabs" class="selos-home__nav tab-navigation">
    <?php
    for ($i = 0; $i < count($content); $i+=1) : ?>
        <div data-tab="selos-<?php echo $i?>" class="selos-home__tab tablinks <?php echo $active?>">
            <div class="selos-home__tablink">
                <div>
                    <img src="<?php echo $images[$i]?>">
                </div>
                
            </div>
        </div> 
        <?php
        $active = '';
    endfor
    ?>
</div>