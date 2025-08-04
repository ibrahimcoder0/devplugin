

(function ($) {
	"use strict";

	////////////////////////////////////////////////////
	// 01. Common Js
	$("[data-background").each(function () {
		$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
	});

	////////////////////////////////////////////////////
	// 02. Swiper Js
	const slider4swiper = new Swiper('.tp-slider-4-active', {
		// Optional parameters
		speed: 1000,
		loop: true,
		slidesPerView: 1,
		autoplay: true,
		effect: 'fade',
		breakpoints: {
			'1600': {
				slidesPerView: 1,
			},
			'1400': {
				slidesPerView: 1,
			},
			'1200': {
				slidesPerView: 1,
			},
			'992': {
				slidesPerView: 1,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},

			a11y: false,
		},
		// Navigation arrows
		navigation: {
			nextEl: '.slider-prev',
			prevEl: '.slider-next',
		},
	});
	////////////////////////////////////////////////////
	// 03. Swiper Js

	var pagination = {
		el: ".tp-slider-dots",
		clickable: true,
	}

	var navigation = {
		nextEl: '.slider-prev',
		prevEl: '.slider-next',
	}

	const slider3swiper = new Swiper('.tp-slider-3-active', {
		// Optional parameters
		loop: Boolean($('.tp-slider-3-active').data('loop')),
		slidesPerView: 1,
		autoplay: {
			delay: Number($('.tp-slider-3-active').data('autoplay')),
		},
		effect: 'fade',
		breakpoints: {
			'1600': {
				slidesPerView: 1,
			},
			'1400': {
				slidesPerView: 1,
			},
			'1200': {
				slidesPerView: 1,
			},
			'992': {
				slidesPerView: 1,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},

			a11y: false,
		},
		// Navigation arrows
		navigation: Boolean($('.tp-slider-3-active').data('arrow')) ? navigation : false,
		pagination: Boolean($('.tp-slider-3-active').data('pagination')) ? pagination : false,
	});
	////////////////////////////////////////////////////
	// 04. Swiper Js
	const slider2swiper = new Swiper('.tp-slider-2-active', {
		// Optional parameters
		speed: 1000,
		loop: true,
		slidesPerView: 1,
		autoplay: true,
		effect: 'fade',
		breakpoints: {
			'1600': {
				slidesPerView: 1,
			},
			'1400': {
				slidesPerView: 1,
			},
			'1200': {
				slidesPerView: 1,
			},
			'992': {
				slidesPerView: 1,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},

			a11y: false,
		},
		// Navigation arrows
		navigation: {
			nextEl: '.slider-prev',
			prevEl: '.slider-next',
		},
		pagination: {
			el: ".tp-slider-dots",
			clickable: true,
		},
	});
	////////////////////////////////////////////////////
	// 05. Swiper Js
	const sliderswiper = new Swiper('.tp-slider-active', {
		// Optional parameters
		speed: 1000,
		loop: true,
		slidesPerView: 1,
		autoplay: true,
		effect: 'fade',
		breakpoints: {
			'1600': {
				slidesPerView: 1,
			},
			'1400': {
				slidesPerView: 1,
			},
			'1200': {
				slidesPerView: 1,
			},
			'992': {
				slidesPerView: 1,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},

			a11y: false,
		},
		// Navigation arrows
		navigation: {
			nextEl: '.slider-prev',
			prevEl: '.slider-next',
		},
	});

	////////////////////////////////////////////////////
	// 06. Swiper Js
	var slider = new Swiper('.tp-slider', {
		speed: 1000,
		slidesPerView: 1,
		loop: true,
		autoplay: true,
		effect: 'fade',
		breakpoints: {
			'1400': {
				slidesPerView: 1,
			},
			'1200': {
				slidesPerView: 1,
			},
			'992': {
				slidesPerView: 1,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},

		a11y: false,
	});


})(jQuery);