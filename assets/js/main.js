$(document).ready(function(){
	// Hire Pupop Show
	$(document).on('click','.btn-hire', function(){
	    $('.hire-popup').addClass('hire-popup-active');
	});
	// Hire Popup Hide
	$(document).on('click','.form-cancel', function(){
	    $('.hire-popup').removeClass('hire-popup-active');
	});
});
// Slick Slider For Testimonial Section
$('.testimonial-slider').slick({
    autoplay: true,
    slidesToShow: 2,
    slideToScroll: 1,
    responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
    ]
});