
let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');


menu.addEventListener('click', () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});
var swiper = new Swiper(".home-slider", {
  loop:true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

var swiper = new Swiper(".reviews-slider", {
  grabCursor:true,
  loop:true,
  autoHeight:true,
  spaceBetween: 20,
  breakpoints: {
     0: {
       slidesPerView: 1,
     },
     700: {
       slidesPerView: 2,
     },
     1000: {
       slidesPerView: 3,
     },
  },
});



