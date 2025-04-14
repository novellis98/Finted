
  AOS.init();

import {gsap} from "gsap";


gsap.to(".roll",{
    duration: 1,
    
    rotation:360,
  
    
});

  gsap.set(".flair", {xPercent: -50, yPercent: -50});

let xTo = gsap.quickTo(".flair", "x", {duration: 0.6, ease: "power3"}),
    yTo = gsap.quickTo(".flair", "y", {duration: 0.6, ease: "power3"});

window.addEventListener("mousemove", e => {
  xTo(e.clientX);
  yTo(e.clientY);
});

// GALLERY SLIDER LOGIC START
$(document).ready(function() {
    $("#lightSlider").lightSlider({
        item: 3,
        autoWidth: false,
        slideMove: 1, // slidemove will be 1 if loop is true
        slideMargin: 10,
 
        addClass: '',
        mode: "slide",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
        easing: 'linear', //'for jquery animation',////
 
        speed: 400, //ms'
        auto: false,
        loop: false,
        slideEndAnimation: true,
        pause: 2000,
 
        keyPress: false,
        controls: true,
        prevHtml: '',
        nextHtml: '',
 
        rtl:false,
        adaptiveHeight:false,
 
        vertical:false,
        verticalHeight:500,
        vThumbWidth:100,
 
        thumbItem:10,
        pager: true,
        gallery: false,
        galleryMargin: 5,
        thumbMargin: 5,
        currentPagerPosition: 'middle',
 
        enableTouch:true,
        enableDrag:true,
        freeMove:true,
        swipeThreshold: 40,
 
        responsive : [],
 
        onBeforeStart: function (el) {},
        onSliderLoad: function (el) {},
        onBeforeSlide: function (el) {},
        onAfterSlide: function (el) {},
        onBeforeNextSlide: function (el) {},
        onBeforePrevSlide: function (el) {}
    });
});

// GALLERY SLIDER LOGIC END


// LOGOUT LOGIC START

document.addEventListener('DOMContentLoaded', () => {
  const logoutButton = document.querySelector('.logoutButton');

  const logoutButtonStates = {
    'default': {
      '--transform-figure': 'none',
      '--transform-arm1': 'none',
      '--transform-wrist1': 'none',
      '--transform-arm2': 'none',
      '--transform-wrist2': 'none',
      '--transform-leg1': 'none',
      '--transform-calf1': 'none',
      '--transform-leg2': 'none',
      '--transform-calf2': 'none',
      '--figure-duration': '300',
      '--walking-duration': '300',
    },
    'walking1': {
      '--transform-figure': 'translateX(-1px)',
      '--transform-arm1': 'rotate(-25deg)',
      '--transform-wrist1': 'rotate(-8deg)',
      '--transform-arm2': 'rotate(40deg)',
      '--transform-wrist2': 'rotate(8deg)',
      '--transform-leg1': 'rotate(-20deg)',
      '--transform-calf1': 'rotate(6deg)',
      '--transform-leg2': 'rotate(20deg)',
      '--transform-calf2': 'rotate(-10deg)',
      '--figure-duration': '300',
      '--walking-duration': '300',
    },
    'walking2': {
      '--transform-figure': 'translateX(1px)',
      '--transform-arm1': 'rotate(30deg)',
      '--transform-wrist1': 'rotate(-5deg)',
      '--transform-arm2': 'rotate(-25deg)',
      '--transform-wrist2': 'rotate(5deg)',
      '--transform-leg1': 'rotate(15deg)',
      '--transform-calf1': 'rotate(-4deg)',
      '--transform-leg2': 'rotate(-22deg)',
      '--transform-calf2': 'rotate(8deg)',
      '--figure-duration': '300',
      '--walking-duration': '300',
    }
  };

  const applyStyles = (styles) => {
    Object.entries(styles).forEach(([prop, val]) => {
      logoutButton.style.setProperty(prop, val);
    });
  };

  const logoutSequence = async () => {
    logoutButton.classList.add('clicked');

    for (let i = 0; i < 4; i++) {
      const step = i % 2 === 0 ? 'walking1' : 'walking2';
      applyStyles(logoutButtonStates[step]);
      await new Promise(r => setTimeout(r, 300));
    }

    logoutButton.classList.add('door-slammed');
    await new Promise(r => setTimeout(r, 250));

    logoutButton.classList.add('falling');

    setTimeout(() => {
      logoutButton.closest('form').submit();
    }, 800);
  };

  logoutButton.addEventListener('click', (e) => {
    e.preventDefault();
    logoutSequence();
  });
});



// LOGOUT LOGIC END

// cookiessssssss




// cookies end 