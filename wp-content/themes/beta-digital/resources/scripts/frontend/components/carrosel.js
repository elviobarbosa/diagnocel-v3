import { Swiper, Pagination} from 'swiper';
Swiper.use([ Pagination ])
export default class Carrosel {
    constructor() {
        this.selector = '.swiper';
        this.init();
    }

    init() {
        const sliders = document.querySelectorAll(this.selector);
        if (!sliders) return;
        this.initSwiper(sliders);
    }

    initSwiper(sliders) {
        
        let i = 1;
        sliders.forEach((sliderEl) => {
            const swiperClass = `js-swiper-${i}`;
            const params = (sliderEl.dataset.params) ? JSON.parse(sliderEl.dataset.params) : {};
            
            sliderEl.classList.add(swiperClass);
            console.log(params)
            sliders = [
                ...sliders,
                new Swiper(`.${swiperClass}`, {
                    ...params,
                }),
            ];
            console.log(sliders)
            i++;
        });
    }
}
