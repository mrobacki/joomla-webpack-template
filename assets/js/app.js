// import 'swiper/css';
// import 'swiper/css/navigation';
// import 'swiper/css/pagination';

import 'owl.carousel/dist/assets/owl.carousel.css';

import "../scss/style.scss";
import "../custom.css";

// Frameworks etc.
import $ from "jquery";
import * as bootstrap from 'bootstrap';

// import Swiper from 'swiper';
// import { Navigation, Pagination } from 'swiper/modules';

import 'owl.carousel';

// Scripts
import {init} from "./modules/init.js";
import {openMenu, closeMenu, openClose} from "./modules/mobileMenu.js";
// import {headerSmaller} from "./modules/headerSmaller.js";
// import {test} from "./modules/test.js";

// const swiper = new Swiper('.swiper', {
//   // Optional parameters
//   direction: 'horizontal',
//   loop: true,
//   modules: [Navigation, Pagination],
  

//   // If we need pagination
//   pagination: {
//     el: '.swiper-pagination',
//   },

//   // Navigation arrows
//   navigation: {
//     nextEl: '.swiper-button-next',
//     prevEl: '.swiper-button-prev',
//   },

//   // And if we need scrollbar
//   scrollbar: {
//     el: '.swiper-scrollbar',
//   },
// });



// OWL Carousel
$('.owl-carousel').each(function() {
	
	const itemsCount = $(this).data("items");
	const space = $(this).data("space");
  const center = $(this).data("center");
	const autoPlay = $(this).data("autoplay") && $(this).data("autoplay") == 1 ? true : false;
	const autoWidth = $(this).data("autowidth") && $(this).data("autowidth") == 1 ? true : false;

	$(this).owlCarousel({
		loop: true,
		nav: true,
    navText: [
      '<i class="fas fa-chevron-left"></i>',
      '<i class="fas fa-chevron-right"></i>'
    ],
		dots: false,
		autoplay: autoPlay,
		autoplayTimeout: 3000,
		autoplayHoverPause: false,
		margin: space ? space : 20,
    autoWidth: autoWidth,
    center: center ? true : false,
		responsive: {
			0: {
				items: 1.5
			},
			768: {
				items: 2
			},
			1200: {
				items: itemsCount ? itemsCount : 3
			}
		},
	});

});
