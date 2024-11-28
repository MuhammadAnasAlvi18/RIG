// BANNER SLIDER
$(".banner-slider").slick({
    dots: false,
    arrows: false,
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
// HAMBURGER 
$(".header-burger img").click(()=> {
  $(".header-mobile").addClass("open");
})
$(".header-close-btn img").click(()=> {
  $(".header-mobile").removeClass("open");
})
// HAMBURGER
// FILE UPLOAD
$("#attachment").change((e)=>{
  const file = e.target.files[0];
  const fileName = file.name;
  $(".upload-file-name").text(fileName);
})