import $ from 'jquery'

export default class MenuCategories {
    constructor() {
        this.selector = '[data-js="menu-prod-category"]';

        if (!this.selector) return;

        this.init();
    }

    init() {
        const $container = $('.prod-category');
        const $menuCategories = $('.menu-categories');
        const $submenu = $('.menu-categories__submenu');
        const $lastItem = $container.find('.menu-categories__more');

        function moveItemsToSubmenu() {
            const menuWidth = $menuCategories.width() - $lastItem.outerWidth();
            let itemsWidth = 0;
            let $itemsToMove = $(); 

            $submenu.children().appendTo($menuCategories);

            $menuCategories.find('li').each(function() {
                itemsWidth += $(this).outerWidth(true);
                if (itemsWidth > menuWidth) {
                    $itemsToMove = $itemsToMove.add(this);
                }
            });

            if ($itemsToMove.length > 0) {
                $lastItem.show()
                $submenu.append($itemsToMove);
            } else {
                $lastItem.hide()
            }
        }

        moveItemsToSubmenu();

        window.addEventListener('scroll', () => {
            console.log(window.pageYOffset,  $container[0].offsetTop);
            if (window.pageYOffset > $container[0].offsetTop - 100) {
                $container.addClass('prod-category__fixed');
            } else {
                $container.removeClass('prod-category__fixed');
            }
        })

        $(window).on('resize', moveItemsToSubmenu);
    }
    
}
