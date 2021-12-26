/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'),
      navToggle = document.getElementById('nav-toggle'),
      navClose = document.getElementById('nav-close')

/*===== MENU SHOW =====*/
/* Validate if constant exists */
if(navToggle){
    navToggle.addEventListener('click', () =>{
        navMenu.classList.add('show-menu')
    })
}

/*===== MENU HIDDEN =====*/
/* Validate if constant exists */
if(navClose){
    navClose.addEventListener('click', () =>{
        navMenu.classList.remove('show-menu')
    })
}

/*=============== REMOVE MENU MOBILE ===============*/
const navLink = document.querySelectorAll('.nav__link')

function linkAction(){
    const navMenu = document.getElementById('nav-menu')
    // When we click on each nav__link, we remove the show-menu class
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

/*=============== CHANGE BACKGROUND HEADER ===============*/
function scrollHeader(){
    const header = document.getElementById('header')
    // When the scroll is greater than 50 viewport height, add the scroll-header class to the header tag
    if(this.scrollY >= 50) header.classList.add('scroll-header'); else header.classList.remove('scroll-header')
}
window.addEventListener('scroll', scrollHeader)

// ==new swiper
let swiper = new Swiper(".new-swiper", {
    spaceBetween: 24,
    loop: 'true',
    slidesPerView: 'auto',
    centeredSlider: true,
    pagination: {
      el: ".swiper-pagination",
      dynamicBullets: true
    },
    breakpoints: {
        992: {
          spaceBetween: 80,
        },
      },
  });
// show scroll up
  function scrollUp(){
    const scrollUp = document.getElementById('scroll-up');
    // When the scroll is higher than 350 viewport height, add the show-scroll class to the a tag with the scroll-top class
    if(this.scrollY >= 350) scrollUp.classList.add('show-scroll'); else scrollUp.classList.remove('show-scroll')
  }
  window.addEventListener('scroll', scrollUp)

  
/* SCROLL REVEAL */

const sr = ScrollReveal({
  origin: 'top',
  distance: '60px',
  duration: 2500,
  delay: 400,
  //reset: true
})

sr.reveal('.home__img, .new__container, .footer__container')
sr.reveal('.home__data', {delay: 500})
sr.reveal('.giving__content, .gift__card', {interval: 100})
sr.reveal('.celebrate__data, .footer__img1', {origin: 'left'})
sr.reveal('.celebrate__img, .footer__img2', {origin: 'right'})

