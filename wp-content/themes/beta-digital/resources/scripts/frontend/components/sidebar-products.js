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
          } else {
           // $('.product').addClass('hide');
            //$('.product[data-id="' + filter + '"]').removeClass('hide');
            //$('.product:not([data-id=' + filter + '])').addClass('hidden');
            $('.product').addClass('hidden');
            $('.product[data-id="' + filter + '"]').removeClass('hidden');
            //$('.product').addClass('hide');
            // $('.hidden').fadeOut(()=> {
             
            // })
            
            
          }
      });
    }
    
}
