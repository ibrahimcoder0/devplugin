
(function ($) {
	"use strict";

	var pagination = {
		el: '.tp-courses-chef-dot',
		clickable: true,
	}
	console.log(Boolean($('.tp-classes-active').data('pagination')))

	var mt_courses_slider = new Swiper('.tp-classes-active', {
		slidesPerView: 3,
		spaceBetween: 27,
		loop: Boolean($('.tp-classes-active').data('loop')),
		autoplay: {
			delay: Number($('.tp-classes-active').data('autoplay')),
		},
		pagination: Boolean($('.tp-classes-active').data('pagination'))? pagination : false,
        navigation: {
			nextEl: ".tp-testimonial-next",
			prevEl: ".tp-testimonial-prev",
		},
		breakpoints: {
			'1400': {
				slidesPerView: 3,
			},
			'1200': {
				slidesPerView: 3,
			},
			'992': {
				slidesPerView: 2,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});


})(jQuery);