// BANNER SLIDER
$(".banner-slider").slick({
    dots: false,
    arrows: true,
    autoplay: true,
    speed: 800
});
// BANNER SLIDER
// MARQUEE JS
$(document).ready(function () {
  const $marquee = $('.marquee');
  const content = $marquee.html();

  // Duplicate the content for seamless scrolling
  $marquee.html(`<div class="marquee-content">${content + content}</div>`);
});  
// MARQUEE JS
$(".goToTopBtn a").click(()=>{
  $("html, body").animate({scrollTop: 0}, 100);
  return false;
})