import $ from 'jquery'

export default class SidebarProducts {
    constructor() {
        this.init();
    }

    init() {
        const $menu = $('[data-js="product-list"] li');
        $menu.on('click', function() {
            var filter = $(this).data('filter');
            if (filter === 'all') {
              $('.product').removeClass('hidden');
            } else {
              $('.product').addClass('hidden');
              $('.product[data-id="' + filter + '"]').removeClass('hidden');
            }
        });
    }
    
}
