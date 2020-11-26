/* ===================================================================

	Author       	: Incognito Themes
	Template Name	: Beam - Creative One Page Parallax Template
	Version      	: 1.0

	* ================================================================= */

/* ===== LOADER OVERLAY ===== */

jQuery(function ($) {
	"use strict";
	jQuery(document).ready(function ($) {
		/* ===== jQuery Varibles ===== */
		mainSlider();
		ContentSlider();
		testimonialSlider();
		testimonialSliderTwo();
		clientSlider();
		blogGridSlider();
		teamSlider();
		parallaxEffect();
		parallaxBackground();

		/* ===== PRELOADER  ===== */
		$(function () {
			$("#loader-overlay").delay(500).fadeOut();
			$(".loader").delay(1000).fadeOut("slow");

			$(window).trigger("scroll");
			$(window).trigger("resize");

			if (window.location.hash) {
				var hash_offset = $(window.location.hash).offset().top;
				$("html, body").animate({
					scrollTop: hash_offset,
				});
			}
		});

		function msieversion() {
			var ua = window.navigator.userAgent;
			var msie = ua.indexOf("MSIE ");

			if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
				// If Internet Explorer, return version number
				alert(parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))));
			} // If another browser, return 0
			else {
				alert("otherbrowser");
			}

			return false;
		}

		/* ===== COUNTERS  ===== */

		$(".counter").counterUp({
			delay: 20,
			time: 4000,
		});

		/* ===== SKILLS BAR ===== */

		$(".skillbar").skillBars({
			from: 0,
			speed: 4000,
			interval: 100,
			decimals: 0,
		});

		/* ===== PIE CHARTS  ===== */

		$(function () {
			$(".chart-01").easyPieChart({
				easing: "easeOutBounce",
				barColor: "#212121",
				trackColor: "#eeeeee",
				scaleColor: false,
				scaleLength: 2,
				size: 150, //110
				animate: {
					duration: 2000,
					enabled: true,
				},
				onStep: function (from, to, percent) {
					$(this.el).find(".percent").text(Math.round(percent));
				},
			});

			$(".chart-02").easyPieChart({
				easing: "easeOutCirc",
				barColor: "#ffffff",
				trackColor: "#212121",
				scaleColor: false,
				scaleLength: 2,
				size: 120, //110
				animate: {
					duration: 2000,
					enabled: true,
				},
				onStep: function (from, to, percent) {
					$(this.el).find(".percent").text(Math.round(percent));
				},
			});

			$(".chart-03").easyPieChart({
				easing: "easeInQuad",
				barColor: "#56ab2f",
				trackColor: "#212121",
				scaleColor: false,
				scaleLength: 2,
				size: 140, //110
				animate: {
					duration: 2000,
					enabled: true,
				},
				onStep: function (from, to, percent) {
					$(this.el).find(".percent").text(Math.round(percent));
				},
			});
		});

		/* ===== COUNTDOWN ===== */

		if ($(".countdown").length > 0) {
			$(".countdown").countdown({
				date: "21 dec 2018 12:00:00",
				format: "on",
			});
		}

		/* ===== Parallax Stellar ===== */

		var isMobile = {
			Android: function () {
				return navigator.userAgent.match(/Android/i);
			},
			BlackBerry: function () {
				return navigator.userAgent.match(/BlackBerry/i);
			},
			iOS: function () {
				return navigator.userAgent.match(/iPhone|iPad|iPod/i);
			},
			Opera: function () {
				return navigator.userAgent.match(/Opera Mini/i);
			},
			Windows: function () {
				return navigator.userAgent.match(/IEMobile/i);
			},
			any: function () {
				return (
					isMobile.Android() ||
					isMobile.BlackBerry() ||
					isMobile.iOS() ||
					isMobile.Opera() ||
					isMobile.Windows()
				);
			},
		};

		jQuery(window).stellar({
			horizontalScrolling: false,
			hideDistantElements: true,
			verticalScrolling: !isMobile.any(),
			scrollProperty: "scroll",
			responsive: true,
		});

		/* ===== SLICK SLIDERS ===== */

		/* ~~~ Hero Half Slider ~~~ */
		function mainSlider() {
			$(".default-slider").slick({
				dots: true,
				infinite: true,
				centerMode: true,
				autoplay: true,
				autoplaySpeed: 7000,
				slidesToShow: 1,
				slidesToScroll: 1,
				centerPadding: "0",
				responsive: [
					{
						breakpoint: 480,
						settings: {
							arrows: false,
						},
					},
				],
			});
		}

		/* ~~~ Content Slider ~~~ */
		function ContentSlider() {
			$(".text-content-slider").slick({
				dots: true,
				infinite: true,
				centerMode: true,
				autoplay: true,
				autoplaySpeed: 7000,
				fade: true,
				cssEase: "linear",
				slidesToShow: 1,
				slidesToScroll: 1,
				centerPadding: "0",
				responsive: [
					{
						breakpoint: 480,
						settings: {
							arrows: false,
						},
					},
				],
			});
		}

		/* ~~~ Testimonials Slider ~~~ */
		function testimonialSlider() {
			$(".testimonial").slick({
				dots: true,
				infinite: true,
				centerMode: true,
				slidesToShow: 3,
				slidesToScroll: 3,
				centerPadding: "0",
				responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 3,
							infinite: true,
						},
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2,
						},
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
						},
					},
				],
			});
		}

		/* ~~~ Testimonial Slider 2 ~~~ */
		function testimonialSliderTwo() {
			$(".testimonial-style-2").slick({
				dots: true,
				infinite: true,
				centerMode: true,
				autoplay: true,
				autoplaySpeed: 7000,
				slidesToShow: 1,
				slidesToScroll: 1,
				centerPadding: "0",
				responsive: [
					{
						breakpoint: 480,
						settings: {
							arrows: false,
						},
					},
				],
			});
		}

		/* ~~~ Client Slider ~~~ */
		function clientSlider() {
			$(".client-slider").slick({
				slidesToShow: 5,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 5000,
				dots: false,
				prevArrow: false,
				nextArrow: false,
				responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 3,
							infinite: true,
						},
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2,
						},
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
						},
					},
				],
			});
		}

		/* ~~~ Team Slider ~~~ */
		function teamSlider() {
			$(".team-slider").slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 4000,
				dots: false,
				prevArrow: false,
				nextArrow: false,
				responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 3,
							infinite: true,
						},
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2,
						},
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
						},
					},
				],
			});
		}

		/* ===== ONE PAGE SCROLLER ===== */

		$("a.page-scroll").on("click", function (event) {
			var $anchor = $(this);
			$("html, body")
				.stop()
				.animate(
					{
						scrollTop: $($anchor.attr("href")).offset().top - 50,
					},
					1000,
					"easeInOutExpo"
				);
			event.preventDefault();
		});

		$(window).on("scroll", function () {
			var scrollTop = $(window).scrollTop();
			if (scrollTop > 34) {
				$(".nav-scrollspy-onepage").addClass("fixed-menu");
			} else {
				$(".nav-scrollspy-onepage").removeClass("fixed-menu");
			}
		});

		/* ===== FIT VIDEOS ===== */
		$(".fit-videos").fitVids();

		/* ===== PARALLAX EFFECTS===== */
		function parallaxEffect() {
			$(".parallax-effect").parallax();
		}

		function parallaxBackground() {
			$(".parallax-bg").parallaxBackground();
		}

		/* ~~~ Blog Grid Slider ~~~ */
		function blogGridSlider() {
			$(".blog-grid-slider").slick({
				dots: false,
				infinite: true,
				centerMode: true,
				autoplay: true,
				autoplaySpeed: 5000,
				slidesToShow: 1,
				slidesToScroll: 1,
				centerPadding: "0",
			});
		}

		/* ===== SEARCH OVERLAY ===== */

		var wHeight = window.innerHeight;
		//search bar middle alignment
		$("#fullscreen-searchform").css("top", wHeight / 2);
		//reform search bar
		jQuery(window).resize(function () {
			wHeight = window.innerHeight;
			$("#fullscreen-searchform").css("top", wHeight / 2);
		});
		// Search
		$("#search-button").on("click", function () {
			$("div.fullscreen-search-overlay").addClass(
				"fullscreen-search-overlay-show"
			);
		});
		$("a.fullscreen-close").on("click", function () {
			$("div.fullscreen-search-overlay").removeClass(
				"fullscreen-search-overlay-show"
			);
		});

		/* ===== CONTACT FORM ===== */

		$(function () {
			$("#contact-form").validator();

			$("#contact-form").on("submit", function (e) {
				if (!e.isDefaultPrevented()) {
					var url = "assets/php/contact.php";
					$.ajax({
						type: "POST",
						url: url,
						data: $(this).serialize(),
						success: function (data) {
							var messageAlert = data.class;
							var messageText = data.message;

							var alertBox =
								'<div class="' +
								messageAlert +
								' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
								messageText +
								"</div>";
							if (messageAlert && messageText) {
								$("#contact-form").find(".messages").html(alertBox);
								$("#contact-form")[0].reset();
							}
						},
					});
					return false;
				}
			});
		});

		$(window).on("load", function () {
			var wow = new WOW({
				offset: 100,
				mobile: false,
			});
			wow.init();

			$(".btn-amazing")
				.on("mouseenter", function (e) {
					var parentOffset = $(this).offset(),
						relX = e.pageX - parentOffset.left,
						relY = e.pageY - parentOffset.top;
					$(this).find("span").css({ top: relY, left: relX });
				})
				.on("mouseout", function (e) {
					var parentOffset = $(this).offset(),
						relX = e.pageX - parentOffset.left,
						relY = e.pageY - parentOffset.top;
					$(this).find("span").css({ top: relY, left: relX });
				});

			$("#portfolio-gallery").cubeportfolio({
				filters: "#portfolio-gallery-filter",
				layoutMode: "grid",
				defaultFilter: "*",
				animationType: "frontRow",
				gapHorizontal: 0,
				gapVertical: 0,
				gridAdjustment: "",
				mediaQueries: [
					{
						width: 1500,
						cols: 5,
					},
					{
						width: 1100,
						cols: 4,
					},
					{
						width: 800,
						cols: 3,
					},
					{
						width: 480,
						cols: 2,
					},
					{
						width: 320,
						cols: 1,
					},
				],
				caption: "overlayBottomAlong",
				displayType: "bottomToTop",
				displayTypeSpeed: 300,

				// lightbox
				lightboxDelegate: ".cbp-lightbox",
				lightboxGallery: true,
				lightboxTitleSrc: "data-title",
				lightboxCounter:
					'<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
			});

			$("#js-grid-masonry-projects").cubeportfolio({
				filters: "#js-filters-masonry-projects",
				layoutMode: "grid",
				defaultFilter: "*",
				animationType: "foldLeft",
				gapHorizontal: 0,
				gapVertical: 0,
				gridAdjustment: "",
				mediaQueries: [
					{
						width: 1500,
						cols: 5,
					},
					{
						width: 1100,
						cols: 4,
					},
					{
						width: 800,
						cols: 3,
					},
					{
						width: 480,
						cols: 2,
					},
					{
						width: 320,
						cols: 1,
					},
				],
				caption: "zoom",
				displayType: "fadeIn",
				displayTypeSpeed: 100,

				// lightbox
				lightboxDelegate: ".cbp-lightbox",
				lightboxGallery: true,
				lightboxTitleSrc: "data-title",
				lightboxCounter:
					'<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
			});
		});

		/* === MAGNIFIC POPUP === */

		$(".magnific-lightbox").magnificPopup({
			type: "image",
			mainClass: "mfp-fade",
			removalDelay: 160,
			fixedContentPos: false,
			// other options
		});

		$(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
			disableOn: 700,
			type: "iframe",
			mainClass: "mfp-fade",
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false,
		});
	});

	/* ===== BACK TO TOP  ===== */

	$(window).on("scroll", function (e) {
		if ($(this).scrollTop() >= 50) {
			$("#return-to-top").fadeIn(200);
		} else {
			$("#return-to-top").fadeOut(200);
		}
	});

	$("#return-to-top").on("click", function (e) {
		$("body,html").animate(
			{
				scrollTop: 0,
			},
			500
		);
	});

	/* ===== GOOGLE MAPS  ===== */

	/* ~~~ Default Map ~~~ */
	if ($("#myMap").length > 0) {
		var $latitude = 42.008315,
			$longitude = -88.163807,
			$map_zoom = 12,
			$marker_url = "assets/images/pin.png",
			style = [
				{
					featureType: "all",
					elementType: "geometry.fill",
					stylers: [{ weight: "2.00" }],
				},
				{
					featureType: "all",
					elementType: "geometry.stroke",
					stylers: [{ color: "#9c9c9c" }],
				},
				{
					featureType: "all",
					elementType: "labels.text",
					stylers: [{ visibility: "on" }],
				},
				{
					featureType: "landscape",
					elementType: "all",
					stylers: [{ color: "#f2f2f2" }],
				},
				{
					featureType: "landscape",
					elementType: "geometry.fill",
					stylers: [{ color: "#ffffff" }],
				},
				{
					featureType: "landscape.man_made",
					elementType: "geometry.fill",
					stylers: [{ color: "#ffffff" }],
				},
				{
					featureType: "poi",
					elementType: "all",
					stylers: [{ visibility: "on" }],
				},
				{
					featureType: "road",
					elementType: "all",
					stylers: [{ saturation: -100 }, { lightness: 45 }],
				},
				{
					featureType: "road",
					elementType: "geometry.fill",
					stylers: [{ color: "#eeeeee" }],
				},
				{
					featureType: "road",
					elementType: "labels.text.fill",
					stylers: [{ color: "#7b7b7b" }],
				},
				{
					featureType: "road",
					elementType: "labels.text.stroke",
					stylers: [{ color: "#ffffff" }],
				},
				{
					featureType: "road.highway",
					elementType: "all",
					stylers: [{ visibility: "simplified" }],
				},
				{
					featureType: "road.arterial",
					elementType: "labels.icon",
					stylers: [{ visibility: "on" }],
				},
				{
					featureType: "transit",
					elementType: "all",
					stylers: [{ visibility: "on" }],
				},
				{
					featureType: "water",
					elementType: "all",
					stylers: [{ color: "#46bcec" }, { visibility: "on" }],
				},
				{
					featureType: "water",
					elementType: "geometry.fill",
					stylers: [{ color: "#c8d7d4" }],
				},
				{
					featureType: "water",
					elementType: "labels.text.fill",
					stylers: [{ color: "#070707" }],
				},
				{
					featureType: "water",
					elementType: "labels.text.stroke",
					stylers: [{ color: "#ffffff" }],
				},
			],
			map_options = {
				center: new google.maps.LatLng($latitude, $longitude),
				zoom: $map_zoom,
				panControl: !0,
				zoomControl: !0,
				mapTypeControl: !0,
				streetViewControl: !0,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				scrollwheel: !1,
				styles: style,
			},
			map = new google.maps.Map(document.getElementById("myMap"), map_options),
			marker = new google.maps.Marker({
				position: new google.maps.LatLng($latitude, $longitude),
				map: map,
				visible: !0,
				icon: $marker_url,
			}),
			contentString = '<div id="mapcontent"><p>Grandy Studio</p></div>',
			infowindow = new google.maps.InfoWindow({
				maxWidth: 320,
				content: contentString,
			});
		google.maps.event.addListener(marker, "click", function () {
			infowindow.open(map, marker);
		});
	}

	/* ~~~ Dark Style Map ~~~ */
	if ($("#map-style-2").length > 0) {
		var $latitude = 42.008315,
			$longitude = -88.163807,
			$map_zoom = 12,
			$marker_url = "assets/images/pin.png",
			style = [
				{ elementType: "geometry", stylers: [{ color: "#212121" }] },
				{ elementType: "labels.icon", stylers: [{ visibility: "off" }] },
				{ elementType: "labels.text.fill", stylers: [{ color: "#757575" }] },
				{ elementType: "labels.text.stroke", stylers: [{ color: "#212121" }] },
				{
					featureType: "administrative",
					elementType: "geometry",
					stylers: [{ color: "#757575" }],
				},
				{
					featureType: "administrative.country",
					elementType: "labels.text.fill",
					stylers: [{ color: "#9e9e9e" }],
				},
				{
					featureType: "administrative.land_parcel",
					stylers: [{ visibility: "off" }],
				},
				{
					featureType: "administrative.locality",
					elementType: "labels.text.fill",
					stylers: [{ color: "#bdbdbd" }],
				},
				{
					featureType: "poi",
					elementType: "labels.text.fill",
					stylers: [{ color: "#757575" }],
				},
				{
					featureType: "poi.park",
					elementType: "geometry",
					stylers: [{ color: "#181818" }],
				},
				{
					featureType: "poi.park",
					elementType: "labels.text.fill",
					stylers: [{ color: "#616161" }],
				},
				{
					featureType: "poi.park",
					elementType: "labels.text.stroke",
					stylers: [{ color: "#1b1b1b" }],
				},
				{
					featureType: "road",
					elementType: "geometry.fill",
					stylers: [{ color: "#2c2c2c" }],
				},
				{
					featureType: "road",
					elementType: "labels.text.fill",
					stylers: [{ color: "#8a8a8a" }],
				},
				{
					featureType: "road.arterial",
					elementType: "geometry",
					stylers: [{ color: "#373737" }],
				},
				{
					featureType: "road.highway",
					elementType: "geometry",
					stylers: [{ color: "#3c3c3c" }],
				},
				{
					featureType: "road.highway.controlled_access",
					elementType: "geometry",
					stylers: [{ color: "#4e4e4e" }],
				},
				{
					featureType: "road.local",
					elementType: "labels.text.fill",
					stylers: [{ color: "#616161" }],
				},
				{
					featureType: "transit",
					elementType: "labels.text.fill",
					stylers: [{ color: "#757575" }],
				},
				{
					featureType: "water",
					elementType: "geometry",
					stylers: [{ color: "#000000" }],
				},
				{
					featureType: "water",
					elementType: "labels.text.fill",
					stylers: [{ color: "#3d3d3d" }],
				},
			],
			map_options = {
				center: new google.maps.LatLng($latitude, $longitude),
				zoom: $map_zoom,
				panControl: !0,
				zoomControl: !0,
				mapTypeControl: !0,
				streetViewControl: !0,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				scrollwheel: !1,
				styles: style,
			},
			map = new google.maps.Map(
				document.getElementById("map-style-2"),
				map_options
			),
			marker = new google.maps.Marker({
				position: new google.maps.LatLng($latitude, $longitude),
				map: map,
				visible: !0,
				icon: $marker_url,
			}),
			infowindow = new google.maps.InfoWindow({
				maxWidth: 320,
				content: contentString,
			});
		google.maps.event.addListener(marker, "click", function () {
			infowindow.open(map, marker);
		});
	}

	/* ~~~ Light Style Map ~~~ */
	if ($("#map-style-3").length > 0) {
		var $latitude = 42.008315,
			$longitude = -88.163807,
			$map_zoom = 12,
			$marker_url = "assets/images/pin.png",
			style = [
				{ elementType: "geometry", stylers: [{ color: "#f5f5f5" }] },
				{ elementType: "labels.icon", stylers: [{ visibility: "off" }] },
				{ elementType: "labels.text.fill", stylers: [{ color: "#616161" }] },
				{ elementType: "labels.text.stroke", stylers: [{ color: "#f5f5f5" }] },
				{
					featureType: "administrative.land_parcel",
					elementType: "labels.text.fill",
					stylers: [{ color: "#bdbdbd" }],
				},
				{
					featureType: "poi",
					elementType: "geometry",
					stylers: [{ color: "#eeeeee" }],
				},
				{
					featureType: "poi",
					elementType: "labels.text.fill",
					stylers: [{ color: "#757575" }],
				},
				{
					featureType: "poi.park",
					elementType: "geometry",
					stylers: [{ color: "#e5e5e5" }],
				},
				{
					featureType: "poi.park",
					elementType: "labels.text.fill",
					stylers: [{ color: "#9e9e9e" }],
				},
				{
					featureType: "road",
					elementType: "geometry",
					stylers: [{ color: "#ffffff" }],
				},
				{
					featureType: "road.arterial",
					elementType: "labels.text.fill",
					stylers: [{ color: "#757575" }],
				},
				{
					featureType: "road.highway",
					elementType: "geometry",
					stylers: [{ color: "#dadada" }],
				},
				{
					featureType: "road.highway",
					elementType: "labels.text.fill",
					stylers: [{ color: "#616161" }],
				},
				{
					featureType: "road.local",
					elementType: "labels.text.fill",
					stylers: [{ color: "#9e9e9e" }],
				},
				{
					featureType: "transit.line",
					elementType: "geometry",
					stylers: [{ color: "#e5e5e5" }],
				},
				{
					featureType: "transit.station",
					elementType: "geometry",
					stylers: [{ color: "#eeeeee" }],
				},
				{
					featureType: "water",
					elementType: "geometry",
					stylers: [{ color: "#c9c9c9" }],
				},
				{
					featureType: "water",
					elementType: "labels.text.fill",
					stylers: [{ color: "#9e9e9e" }],
				},
			],
			map_options = {
				center: new google.maps.LatLng($latitude, $longitude),
				zoom: $map_zoom,
				panControl: !0,
				zoomControl: !0,
				mapTypeControl: !0,
				streetViewControl: !0,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				scrollwheel: !1,
				styles: style,
			},
			map = new google.maps.Map(
				document.getElementById("map-style-3"),
				map_options
			),
			marker = new google.maps.Marker({
				position: new google.maps.LatLng($latitude, $longitude),
				map: map,
				visible: !0,
				icon: $marker_url,
			}),
			infowindow = new google.maps.InfoWindow({
				maxWidth: 320,
				content: contentString,
			});
		google.maps.event.addListener(marker, "click", function () {
			infowindow.open(map, marker);
		});
	}
});
// 
function initMostCont(id) {
	if (jQuery("#" + id + ".item").length > 0) {
		jQuery
			.when(
				jQuery("#" + id).flexImages({
					rowHeight: layout_height,
				})
			)
			.then(function () {
				jQuery(".flex-images .item").css("border", "1px solid #e5e5e5");
			});
		jQuery(window).trigger("resize");
	}
}
/*End Jquery*/
