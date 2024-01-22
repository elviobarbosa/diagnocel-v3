export default class Tabs {

    constructor() {
        this.selector = '[data-js="tabs"]';
        this.init();
    }

    init() {
        const selectors = document.querySelectorAll(this.selector);
        if (selectors.length > 0) {
            this.start(selectors);
        }
    }

    start(elements) {
        let alturaMaxima = 0;
        setTimeout( () => {
            const tabcontent = document.querySelectorAll('.tabcontent');
            let before = 0;
            
            tabcontent.forEach(tab => {
                alturaMaxima = Math.max(tab.offsetHeight, before);
                before = tab.offsetHeight;
            });

            tabcontent.forEach(elemento => {
                elemento.style.height = `${alturaMaxima}px`;
                elemento.classList.add('hide')
            });
        }, 100)
        
        elements.forEach(el => {
            const tabs = el.querySelectorAll('.tablinks');
            const showTab = (ev) => {
                const { tab } = ev.currentTarget.dataset;
                let i, tabcontent, tablinks;
                tabcontent = document.querySelectorAll('.tabcontent');
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = 'none';
                }
            
                tablinks = el.getElementsByClassName('tablinks');
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(' active', '');
                }
            
                document.getElementById(tab).style.display = "block";
                ev.currentTarget.className += " active";
            }

            tabs.forEach(tab => {
                tab.addEventListener('click', showTab )
            });
        });
    }
}
