
import 'slick-carousel';

$(function() {

    $('.next-slick').click(function(e){
      e.preventDefault();
      $(this).parent().parent().find('.is-carousel-custom-nav').slick('slickNext');
    });
    $('.prev-slick').click(function(e){
      e.preventDefault();
      $(this).parent().parent().find('.is-carousel-custom-nav').slick('slickNext');
    });
    
    $('.is-carousel-default').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });


      $('.is-carousel-custom-nav').on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
        //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
        var $status = $('.is-carousel-custom-nav').parent().find('.slick-custom-navigation__number');
        var i = (currentSlide ? currentSlide : 0) + 1;
        $status.text(i + '/' + slick.slideCount);
      });

      $('.is-carousel-custom-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        customPaging: function (slider, i) {
          //FYI just have a look at the object to find available information
          //press f12 to access the console in most browsers
          //you could also debug or look in the source
          console.log(slider);
          return  (i + 1) + '/' + slider.slideCount;
        },
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              arrows: false,
              dots: false
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              arrows: false,
              dots: false
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });
      
});