import $ from 'jquery'
export default class SquareDetails {
    constructor() {
        this.selectors = ['.js-square-details', '.institucional__cover .wp-block-media-text__media', '.sustentabilidade__cover .wp-block-media-text__media'];
        this.init();
    }

    init() {
        this.selectors.forEach((selector) => {
            const elements = document.querySelectorAll(selector);

            if (elements.length > 0) {
                this.adicionarSquareDetails(elements);
            }
        });
    }

    adicionarSquareDetails(containers) {
        console.log('squale');
        containers.forEach((container) => {
            const squareDetails = $('<div>').addClass('square-details');

            for (let i = 1; i <= 3; i++) {
                var childDiv = $('<div>').addClass('child-div');
                squareDetails.append(childDiv);
            }

            container.appendChild(squareDetails[0]);
        });
    }
}
