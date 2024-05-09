import $ from 'jquery'

export default class SidebarProducts {
    constructor() {
      this.init();
    }

    init() {
      const $menu = $('[data-js="product-list"]');
      const $menuItem = $('[data-js="product-list"] li');
      $menuItem.on('click', function() {
          const filter = $(this).data('filter');
          const lastActive = $('.active', $menu);
          lastActive.removeClass('active');
          $(this).addClass('active');

          if (filter === 'all') {
            $('.product').removeClass('hidden');
            $('.product').removeClass('nodisplay');

          } else {
           
            $('.product').addClass('hidden');
            setTimeout(() => {
              $('.hidden').addClass('nodisplay');
            }, 600)
            
            $('.product[data-id="' + filter + '"]').removeClass('hidden nodisplay');

          }
      });
    }
    
}
