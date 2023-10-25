import $ from 'jquery';
export default class Accordeon {

    constructor() {
        this.selector = '[data-js=accordeon]';
        this.init();
    }

    init() {
        const $accordeon = $(this.selector);
        const $initial = $('.accordeon__group:first-child', $accordeon);
        const $closeItems = $('.accordeon__group:not(:first-child)', $accordeon);
        const $accordeonControl = $('.accordeon-control', $accordeon);
        $initial.addClass('accordeon-opened');
        $accordeonControl.css('cursor', 'pointer');
        const $initialContent = $('.accordeon-content', $initial);
        $initialContent.show( "fast", function() {});
        $('.accordeon-content', $closeItems).hide();
       
        $accordeonControl.each(function() {
            $(this).on('click', () => {
                console.log('click')
                const $parent = $(this).parent($accordeonControl);
                const $accordeonContent = $('.accordeon-content', $parent);

                $parent.toggleClass('accordeon-opened');
                
                if ( $parent.hasClass('accordeon-opened') ) {
                    $accordeonContent.show( "fast", function() {
                        // Animation complete.
                    });
                } else {
                    $accordeonContent.hide( "fast", function() {
                        // Animation complete.
                    });
                }
            })
        });
    }
}
