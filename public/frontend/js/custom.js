(function ($, window, Typist) {
    
	/*---------owl-carousel------------*/
	
	
	$('.slider-banner').owlCarousel({
		loop:true,
		margin:10,
		responsiveClass:true,
		autoplayTimeout: 5000,
		autoplay:true,
		smartSpeed: 2500,
		autoplayHoverPause:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:1,
				nav:true
			},
			1000:{
				items:1,
				nav:true
			}
		}
	});
	
	/*-------tooltip---------*/
	
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	});
	
/*--------------ASO.JS---------------*/
	
/*AOS.init();
 
$(window).on('load', function() {
	AOS.refresh();
});*/
	
/*------------hover-dropdown------------*/


$(document).ready(function () {
	$(".dropdown").hover(function () {
		var dropdownMenu = $(this).children(".dropdown-menu");
		if (dropdownMenu.is(":visible")) {
			dropdownMenu.parent().toggleClass("open");
		}
	});
});     

/*---------------deal of the day------------------*/

$('.deal-of-day').owlCarousel({
	loop:true,
	margin:10,
	responsiveClass:true,
	autoplayTimeout: 8000,
	autoplay:true,
	smartSpeed: 1500,
	autoplayHoverPause:true,
	responsive:{
		0:{
			items:1,
			nav:true
		},
		600:{
			items:2,
			nav:true
		},
		1000:{
			items:4,
			nav:true
		}
	}
});

/*-------------*/

function change_image(image){

	var container = document.getElementById("main-image");
	
	container.src = image.src;
	}
	
	document.addEventListener("DOMContentLoaded", function(event) {
	
	
	});

/*-------------RangeSlider----------------*/

/*$(".js-range-slider").ionRangeSlider({
	type: "double",
	grid: false,
	min: 0,
	max: 1000,
	from: 200,
	to: 500,
});*/

})(jQuery, window);