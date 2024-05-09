export default class Menu {
    constructor() {
        this.selector = '.js-menu';
        this.classes = {
            navContainer: '.nav-container',
        };
        this.init();
    }

    init() {
        const menu = document.querySelector(this.selector);
        const menuContainer = document.querySelector(this.classes.navContainer);
        const jumpMenu = document.querySelector('.jump-menu');

        if (!menu) return;

        menu.addEventListener('click', e => {
            e.preventDefault();
            const target = e.currentTarget;
            const navMenu = document.querySelector('.js-nav-menu');
            menuContainer.classList.toggle('active');
            target.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > menuContainer.offsetTop + 150) {
                if (menuContainer) menuContainer.classList.add('fixed');
                if (jumpMenu) jumpMenu.classList.add('jump-fixed')
                document.body.style.marginBlockStart = `${menuContainer.clientHeight / 10}rem`;
            } else {
                if (menuContainer) menuContainer.classList.remove('fixed');
                if(jumpMenu) jumpMenu.classList.remove('jump-fixed')
                document.body.style.marginBlockStart = '0rem';
            }
        })
    }
}
