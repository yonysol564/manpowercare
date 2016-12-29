
var width = jQuery(window).width();

jQuery(window).load(function(){
	jQuery('body').addClass('pageLoaded');
});

jQuery(document).ready(function($) {
  
  create_home_slider();

  jQuery('.open_menu').click(function(e) {
    jQuery(this).hide(); 
    jQuery('.menu_div').fadeIn();
    jQuery('.close_menu').fadeIn();
  });

  jQuery('.close_menu').click(function(e) {
    jQuery(this).hide(); 
    jQuery('.menu_div').fadeOut();
    jQuery('.open_menu').fadeIn();
  });

  jQuery(".lang_selector").change(function() {
    var url = jQuery(".lang_selector").val();
    location.href = url;
  });


	jQuery(document).foundation();

});


function create_home_slider(){
  home_banner = jQuery(".home_banner");
  home_banner.slick({
    infinite: true,
    speed: 1000,
    autoplay: true,
    autoplaySpeed: 4000,
    slidesToShow: 1,
    slidesToScroll: 1,
    rtl: slider_rtl,
    fade: true,
    focusOnSelect: false,
    arrows: true,
    prevArrow: '<div class="carousel-prev carousel-arr"></div>',
    nextArrow: '<div class="carousel-next carousel-arr"></div>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          arrows:false,
          slidesToShow: 1
        }
      },
      {
        breakpoint: 640,
        settings: {
          arrows:false,
          slidesToShow: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          dots:false,
          arrows:false,
          slidesToShow: 1
        }
      }
    ]
  });
}