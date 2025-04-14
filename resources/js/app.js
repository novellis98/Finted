import './bootstrap';
import 'bootstrap';
import './main.js';
import "aos/dist/aos.js";
import "gsap/dist/gsap.min.js";

import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules';






document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper('.swiper-container', {
        modules: [Navigation, Pagination, Autoplay],
        loop: true,
        autoplay: { delay: 3000 },
        pagination: { el: '.swiper-pagination', clickable: true },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    });
});