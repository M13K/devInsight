var $ = jQuery;





$( document ).ready(function() {

  $('.item-list').unslider({
    speed: 500, //  The speed to animate each slide (in milliseconds)
    delay: 3000, //  The delay between slide animations (in milliseconds)
    keys: true, //  Enable keyboard (left, right) arrow shortcuts
    dots: true, //  Display dot navigation
    fluid: false, //  Support responsive design. May break non-responsive designs
    autoplay: true, //Add autoplay support
    infinite: true
  });

  $('.our-clients').slick({
  infinite: true,
  arrows: false,
  slidesToShow: 5,
  slidesToScroll: 1,
  autoplay: true,
    responsive: [
    {
      breakpoint: 1000,
      settings: {
      infinite: true,
      arrows: false,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true
      }
    }, {
      breakpoint: 768,
      settings: {
      infinite: true,
      arrows: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true
      }
    },
    {
      breakpoint: 480,
      settings: {
      infinite: true,
      arrows: false,
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplay: true
      }
    }
  ]
  });

});
