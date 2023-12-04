import $ from 'jquery';
import Carrosel from './components/carrosel';
import Menu from './components/menu';
import MenuCategories from './components/menu-categories';
import Accordeon from './components/accordeon';
import SquareDetails from './components/square-details';
import InputMasks from './components/input-masks';
import ScrollTo from './components/scroll-to';


function domReady(fn) {
    document.addEventListener("DOMContentLoaded", fn);
    if (document.readyState === "interactive" || document.readyState === "complete" ) {
      new Menu();
      new Carrosel();
      new MenuCategories();
      new Accordeon();
      new SquareDetails();
      new InputMasks();
      new ScrollTo();
    }
}

const init = function() {
  let start = false;
  
  window.addEventListener('mousemove', e => {
    if ( !start ) {
      start = true;
      const url = window.location.host;
      const http = window.location.protocol;
    }
  });

//   window.addEventListener("scroll", (event) => {
//     let scroll = event.currentTarget.scrollY;
//     const url = window.location.host;
//     const http = window.location.protocol;

//     if (scroll > 400 && !scrolling) {

//       const swiper = document.createElement("script");
//       swiper.setAttribute('id', 'swiper')
//       swiper.src = `${http}//${url}/wp-content/themes/girabank/resources/scripts/swiper.js`;
//       document.getElementsByTagName("head")[0].appendChild(swiper);
//       scrolling = true;
      
//       setTimeout(() => {
//         new SwiperJs();
//       }, 500);
//     }
//   });
}

window.onload = function() {
  init();
};

domReady(() => { })
