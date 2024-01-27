import $ from 'jquery';
export default class Search {
    constructor() {
        this.init();
    }

    init() {
        const $search = $('#search-input');
        $search.on('click', ()=> {
            $('#menu-header-menu').addClass('search-active');

            const $close = $('#closesearch').on('click', () => {
                $('#menu-header-menu').removeClass('search-active');
            })
        })

    }

    
}
