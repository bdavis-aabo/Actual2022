$(document).ready(function(){
	// Navigation Functions
	$('.nav-btn').click(function(){
		$(this).toggleClass('open');
		$('.navigation').toggleClass('is-visible');
	});
});

// init homepage slides
var swiper = new Swiper('.homepageSlides',{
	slidesPerView: 1,
	direction: 'vertical',
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},
	slidesPerView: 1,
	autoHeight: true,
});

var swiper = new Swiper('.mobileSlides', {
	slidesPerView: 1,
	direction: 'horizontal',
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},
	autoHeight: true,
});
