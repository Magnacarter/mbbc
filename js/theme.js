jQuery( document ).ready(function($) {

	//Google Map
	var map;
	var directionsService;

	function initialize() {
		// Instantiate a directions service.
		directionsService = new google.maps.DirectionsService();

		var mapCanvas1  = document.getElementById( 'map-footer' );
		var mapCenter   = new google.maps.LatLng( 30.273979, -97.744722 );
		var mapOptions  = {
			scrollwheel: false,
			navigationControl: false,
			mapTypeControl: false,
			scaleControl: false,
			draggable: false,
			zoom: 17,
			center: mapCenter,
			mapTypeId: 'roadmap'
		};

		var map  = new google.maps.Map( mapCanvas1, mapOptions );

		var markers = [
			[
				30.273979,
				-97.744722,
				'http://s12751.p44.sites.pressdns.com/wp-content/themes/mbfc-theme/images/map-icon.png',
			]
		];

		var marker, i;
		var bound = new google.maps.LatLngBounds();

		for( i = 0; i < markers.length; i++ ) {
			var cwMapImage = markers[i][2];
			bound.extend( new google.maps.LatLng( markers[i][0], markers[i][1] ) );
			marker = new google.maps.Marker({
				position: new google.maps.LatLng( markers[i][0], markers[i][1] ),
				map: map,
				icon: cwMapImage,
			});
		}

	}
	google.maps.event.addDomListener( window, 'load', initialize );

	//Remove empty paragraphs in the content
	$('.inner-wrapper p:empty').hide();

	//Front page PA section : switch descriptions
	var trigger      = $( '.active-trigger' );
	var pa1D         = $( '.pa-1-active-description' );
	var pa2D         = $( '.pa-2-active-description' );
	var pa3D         = $( '.pa-3-active-description' );
	var descriptions = [ pa1D, pa2D, pa3D ];
	var active       = $( '.cws-active' );
	var inactive     = $( '.cws-inactive' );

	$( '.active-trigger' ).click( function(e) {
		e.preventDefault();
		var parent = $( this ).parent().parent().attr( 'id' );
		var arrayLength = descriptions.length;
		var parentClass = $( this ).parent().parent().attr( 'class' );

		active.hide();
		inactive.show();

		if( parentClass == 'cws-active' ) {
			$( this ).parent().parent().hide();
			$( this ).parent().parent().parent().find( '.cws-inactive' ).show();

			console.log( $(this).parent().parent().parent() );
		}

		if( parentClass == 'cws-inactive' ) {
			$( this ).parent().parent().hide();
			$( this ).parent().parent().parent().find( '.cws-active' ).show();

			console.log( $(this).parent().parent().parent() );
		}

		for( var i = 0; i < arrayLength; i++ ) {
			( descriptions[i] ).hide();
		}

		if( parent == 'pa-1-inactive' ) {
			pa1D.show();
		}

		if( parent == 'pa-2-inactive' ) {
			pa2D.show();
		}

		if( parent == 'pa-3-inactive' ) {
			pa3D.show();
		}
	});

	//Sticky Nav
	$( window ).scroll(function() {
		var $width      = $( window ).width();
		var nav         = $( '#nav' );

		if ( $( this ).scrollTop() > 150 ) {

			nav.css({ "position": "fixed", "top": "0", "width": "100%" });

		}

		if ( $( this ).scrollTop() === 0 ) {

			nav.css({ "position": "relative", });

		}
	});

	$('#menu-main-nav').find('li').addClass('parent');

	//triangle caret animate
    $( '#menu-main-nav:first > li' ).mouseover(function() {
		var pos   = $( this )[0].offsetLeft;
		var arrow = $( '#arrow' );
		var nav   = $( 'nav li' );
		var width = $( window ).width();

		if( width > 767 ) {
			arrow.show();

			pos = pos + Math.floor( ( ( $( this ).css( 'width' ).replace( 'px', '' ) * 1) / 2 ) );
			pos = pos - Math.floor( ($( '#arrow' ).css( 'width' ).replace( 'px', '' ) * 1) / 1.9 );

			// Reset all colors
			$( 'nav li a' ).css( 'color', '' );

			// Animte the arrow
			arrow.stop().animate({
				'margin-left': pos + 'px'
			}, 200);
		}
	});

	//FAQ Plugin JS
	var anchor = $( '.qa-faq-anchor' );

	anchor.click( function() {
		$( this ).toggleClass( 'faq-open' );
	});

	//Initialize Bootstrap tooltips
	$( function () {
		$('[data-toggle="tooltip"]').tooltip()
	});

	//Contact Form in Banner
	var input         = ( '.contact-form.collapsed-form .form-control' );
	var formField     = ( '.contact-form.collapsed-form' );
	var collapseBlock = ( '.collapse-block' );

	$( input ).keypress(function() {
		$( this ).closest( formField ).find( collapseBlock ).slideDown();
	});

	//Slick for frontpage team
	$( '.team-slider' ).slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		infinite: true,
		prevArrow: '<span class="left-arrow"></span>',
		nextArrow: '<span class="next-arrow"></span>',
		appendArrows: '.custom-arrows',
		responsive: [
			{
			  breakpoint: 1275,
			  settings: {
			    slidesToShow: 4,
			    slidesToScroll: 4,
			    infinite: true,
			  }
			},
			{
			  breakpoint: 1055,
			  settings: {
			    slidesToShow: 3,
			    slidesToScroll: 3,
			    infinite: true,
			  }
			},
			{
			  breakpoint: 841,
			  settings: {
			    slidesToShow: 2,
			    slidesToScroll: 2
			  }
			},
			{
			  breakpoint: 661,
			  settings: {
			    slidesToShow: 1,
			    slidesToScroll: 1
			  }
			}
		]
	});

		//Slick for sidebar team
	$( '.sidebar-team' ).slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		infinite: true,
		prevArrow: '<span class="left-arrow"></span>',
		nextArrow: '<span class="next-arrow"></span>',
		appendArrows: '.custom-arrows',
	});

	//Slick for legal services page
	$( '.content-slider' ).slick({
		dots: true,
		autoplay: true,
		infinite: true,
		prevArrow: '<span class="left-arrow"></span>',
		nextArrow: '<span class="next-arrow"></span>',
		appendArrows: '.custom-arrows',
		appendDots: '.custom-dots',
	});

	//View video to lightbox via the 'watch video' button.
	var watch     = $( 'a.video-trigger' );
	var body      = $( 'body' );
	var container = $( '#video-container' );
	var x         = $( '.x-banner' );
	var video     = $( '#video' );
	var videoURL  = video.prop('src');

	watch.click( function(e) {
		e.preventDefault();
		x.show();
		body.append( '<div id="video-wrap"></div>' );
		$( '#video-wrap' ).show();
		container.fadeIn();
		videoURL += "?rel=0&autoplay=1";
		video.prop( 'src',videoURL );
		$( 'html, body' ).animate( {
			scrollTop: container.offset().top -110
		}, 1000);
	});
	x.click( function() {
		$( '#video-wrap' ).fadeOut( 800 );
		container.fadeOut( 600 );
		x.fadeOut( 500 );
		videoURL = videoURL.replace( "?rel=0&autoplay=1", "" );
		video.prop( 'src', '' );
		video.prop( 'src', videoURL );
	});

	var watchTwo     = $( 'a.video-trigger-two' );
	var videoTwo     = $( '#video2' );
	var videoURLTwo  = videoTwo.prop('src');
	var containerTwo = $( '#video-container-two' );
	var xTwo         = $( '.x-front-page' );

	watchTwo.click( function(e) {
		e.preventDefault();
		xTwo.show();
		body.append( '<div id="video-wrap"></div>' );
		$( '#video-wrap' ).show();
		containerTwo.fadeIn();
		videoURLTwo += "?rel=0&autoplay=1";
		videoTwo.prop( 'src',videoURLTwo );
		$( 'html, body' ).animate( {
			scrollTop: containerTwo.offset().top -110
		}, 1000);
	});
	xTwo.click( function() {
		$( '#video-wrap' ).fadeOut( 800 );
		containerTwo.fadeOut( 600 );
		x.fadeOut( 500 );
		videoURLTwo = videoURLTwo.replace( "?rel=0&autoplay=1", "" );
		videoTwo.prop( 'src', '' );
		videoTwo.prop( 'src', videoURLTwo );
	});

	var watchThree     = $( 'a.video-trigger-three' );
	var videoThree     = $( '#video3' );
	var videoURLThree  = videoThree.prop('src');
	var containerThree = $( '#video-container-three' );
	var xThree         = $( '.x-sidebar' );

	watchThree.click( function(e) {
		e.preventDefault();
		xThree.show();
		body.append( '<div id="video-wrap"></div>' );
		$( '#video-wrap' ).show();
		containerThree.fadeIn();
		videoURLThree += "?rel=0&autoplay=1";
		console.log( videoURLThree );
		videoThree.prop( 'src',videoURLThree );
		$( 'html, body' ).animate( {
			scrollTop: containerThree.offset().top -110
		}, 1000);
	});
	xThree.click( function() {
		$( '#video-wrap' ).fadeOut( 800 );
		containerThree.fadeOut( 600 );
		x.fadeOut( 500 );
		videoURLThree = videoURLThree.replace( "?rel=0&autoplay=1", "" );
		console.log( videoURLThree );
		videoThree.prop( 'src', '' );
		videoThree.prop( 'src', videoURLThree );
	});

});

