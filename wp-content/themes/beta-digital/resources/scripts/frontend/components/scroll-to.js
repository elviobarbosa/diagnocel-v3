import $ from 'jquery';

export default class ScrollTo {

    constructor() {
        const $selectors = $('[data-js=scroll-to]');
        if ( !$selectors ) return;
        this.init($selectors);
    }

    init(el) {        
        el.each(function(index, element) {
            const $links = $('a', el);
            $links.each(function(index, link) {
                $(link).on('click', () => {
                    const selected = $(this).attr('href');
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $(selected).offset().top - 100
                    }, 1500);
                })
            });
           
        });

    }

}
