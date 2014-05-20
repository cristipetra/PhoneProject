$(document).ready(function() {
	/* Search */
	$('.button-search').bind('click', function() {
		url = $('base').attr('href') + 'index.php?route=product/search';
				 
		var search = $('input[name=\'search\']').attr('value');
		
		if (search) {
			url += '&search=' + encodeURIComponent(search);
		}
		
		location = url;
	});
	
	$('#header input[name=\'search\']').bind('keydown', function(e) {
		if (e.keyCode == 13) {
			url = $('base').attr('href') + 'index.php?route=product/search';
			 
			var search = $('input[name=\'search\']').attr('value');
			
			if (search) {
				url += '&search=' + encodeURIComponent(search);
			}
			
			location = url;
		}
	});
	
	$('.success img, .warning img, .attention img, .information img').live('click', function() {
		$('#notification').fadeOut('slow');
		$(this).parent().fadeOut('slow', function() {
			$(this).remove();
		});
	});	
});

function getURLVar(key) {
	var value = [];
	
	var query = String(document.location).split('?');
	
	if (query[1]) {
		var part = query[1].split('&');

		for (i = 0; i < part.length; i++) {
			var data = part[i].split('=');
			
			if (data[0] && data[1]) {
				value[data[0]] = data[1];
			}
		}
		
		if (value[key]) {
			return value[key];
		} else {
			return '';
		}
	}
} 

function addToCart(product_id, quantity) {
	quantity = typeof(quantity) != 'undefined' ? quantity : 1;

	$.ajax({
		url: 'index.php?route=checkout/cart/add',
		type: 'post',
		data: 'product_id=' + product_id + '&quantity=' + quantity,
		dataType: 'json',
		success: function(json) {
			$('.success, .warning, .attention, .information, .error').remove();
			
			if (json['redirect']) {
				location = json['redirect'];
			}
			
			if (json['success']) {
				$('#notification').show();
				$('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');
				alertBox();
				$('.success').fadeIn('slow', function() {
					$('#notification').delay(3000).fadeOut('slow', function(){
						$('#notification > div').remove();		
					});
				});

				$('#cart').load('index.php?route=module/cart #cart > *', function(){
					var getTotal = $('.mini-cart-total').find('tr:last').find('td:last').html();
					$('#cart').find('#cart-total').html(getTotal);
				});

				//$('html, body').animate({ scrollTop: 0 }, 'slow'); 
			}
			if (json['success']) {
				//$('html, body').animate({ scrollTop: 0 }, 'slow');
			}	
		}
	});
}
function addToWishList(product_id) {
	$.ajax({
		url: 'index.php?route=account/wishlist/add',
		type: 'post',
		data: 'product_id=' + product_id,
		dataType: 'json',
		success: function(json) {
			$('.success, .warning, .attention, .information').remove();
						
			if (json['success']) {
				$('#notification').show();
				$('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');
				alertBox();
				$('.success').fadeIn('slow', function() {
					$('#notification').delay(3000).fadeOut('slow', function(){
						$('#notification > div').remove();		
					});
				});
				
				$('#wishlist-total').html(json['total']);
				
				//$('html, body').animate({ scrollTop: 700 }, 'slow');
			}
			if (json['success']) {
				//$('html, body').animate({ scrollTop: 0 }, 'slow');
			}	
		}
	});
}

function addToCompare(product_id) { 
	$.ajax({
		url: 'index.php?route=product/compare/add',
		type: 'post',
		data: 'product_id=' + product_id,
		dataType: 'json',
		success: function(json) {
			$('.success, .warning, .attention, .information').remove();
						
			if (json['success']) {
				$('#notification').show();
				$('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');
				alertBox();
				$('.success').fadeIn('slow', function() {
					$('#notification').delay(3000).fadeOut('slow', function(){
						$('#notification > div').remove();		
					});
				});
				
				$('#compare-total').html(json['total']);
				
				//$('html, body').animate({ scrollTop: 700 }, 'slow'); 
			}
			if (json['success']) {
				//$('html, body').animate({ scrollTop: 0 }, 'slow');
			}	
		}
	});
}


/************************************************************
RGEN THEME SCRIPT */

// Tiny jQuery Plugin by Chris Goodchild
$.fn.exists = function(callback) { var args = [].slice.call(arguments, 1); if (this.length) { callback.call(this, args); } return this; };

$.fn.fullblock = function(options) { 
	var settings = $.extend({
		child: 'div'
	}, options );
	fblock = this;
	function applyBlock(){
		if ($(window).width() > 980) {
			var sideMargin = Math.floor(($('#container').width() - $(fblock).children(settings.child).width())/2);
			$(fblock).css({
				marginLeft: -sideMargin,
				marginRight: -sideMargin
			});

			$(fblock).find(settings.child).css({
				maxWidth: Math.floor($("#content").width()),
				marginLeft: 'auto',
				marginRight: 'auto'
			});
			if ($(fblock).find(settings.child+' > div').length == 1) {
				$(fblock).find(settings.child).addClass('mb0');
			};
		}else{
			$(fblock).find(settings.child).css({
				maxWidth: 'inherit'
			});
		};
	}
	if ($("#column-left").length == 0 && $("#column-right").length == 0) {
		applyBlock();
		$(window).resize(function(){applyBlock();});
	}else{
		$(fblock).removeAttr('style');
		$(fblock).removeAttr('class');
	};
	return this; 
};

function alertBox(){
	$('#notification').css({marginLeft: -$('#notification').outerWidth()/2});
}

// Custom module - category and brands with products style-2
function inOwl_scroll(obj){
	//console.log("In scroll function call");
	$(obj).css({opacity:0});
	$(obj).animate({opacity:1}, 200, function(){
		$(obj + " .row .owl-item").each(function(){
			var owl = $(this).find(".sec-prd");
			owl.owlCarousel({
				singleItem: true,
				navigation : true,
				slideSpeed : 300,
				pagination : false,
				navigationText : ["",""],
				responsive : true,
				touchDrag : false,
				baseClass : 'owl-carousel-in'
			});
			$(".owl-prev").addClass('prev');
			$(".owl-next").addClass('next');
			$(".owl-controls").addClass('carousel-controls');
		});
	});
}
function inOwl_grid(obj){
	//console.log("Grid - In scroll function call");
	$(obj + " .row .col").each(function(){
		var owl = $(this).find(".sec-prd");
		owl.owlCarousel({
			singleItem: true,
			navigation : true,
			slideSpeed : 300,
			pagination : false,
			navigationText : ["",""],
			responsive : true,
			baseClass : 'owl-carousel-in'
		});
		$(".owl-prev").addClass('prev');
		$(".owl-next").addClass('next');
		$(".owl-controls").addClass('carousel-controls');
	});
}
function inOwl_scroll_column(obj){
	//console.log("In scroll function call");
	$(obj).css({opacity:0});
	$(obj).animate({opacity:1}, 200, function(){
		$(obj + " .box-product .owl-item").each(function(){
			var owl = $(this).find(".sec-prd");
			owl.owlCarousel({
				singleItem: true,
				navigation : true,
				slideSpeed : 300,
				pagination : false,
				navigationText : ["",""],
				responsive : true,
				touchDrag : false,
				baseClass : 'owl-carousel-in'
			});
			$(".owl-prev").addClass('prev');
			$(".owl-next").addClass('next');
			$(".owl-controls").addClass('carousel-controls');
		});
	});
}
function inOwl_grid_column(obj){
	//console.log("Grid - In scroll function call");
	$(obj + " .sec-box-wrp1").each(function(){
		var owl = $(this).find(".sec-prd");
		owl.owlCarousel({
			singleItem: true,
			navigation : true,
			slideSpeed : 300,
			pagination : false,
			navigationText : ["",""],
			responsive : true,
			baseClass : 'owl-carousel-in'
		});
		$(".owl-prev").addClass('prev');
		$(".owl-next").addClass('next');
		$(".owl-controls").addClass('carousel-controls');
	});
}

$(document).ready(function() {

	/* CSS CLASS ADDED FOR HOME PAGE */
	$('.store-home').parent().addClass('home-wrapper');
	if($('.store-home').hasClass('full-slideshow') == true){
		$('body').addClass('full-slideshow');
	}
	if($('.store-home').hasClass('wf-full-slideshow') == true){
		$('body').addClass('wf-full-slideshow');
	}
	$('.home-wrapper').exists(function() {
		$('body').addClass('homepage');
	});

	if($('#column-left, #column-right').hasClass('column') == false){
		$('body').addClass('col-n');
	}else{
		$('body').addClass('col-y');
	}
	
	if($('#content').hasClass('full-slideshow') || $('#content').hasClass('medium-slideshow')){
		$('#container').addClass('slideshow-overflow')
	}
	
	$(window).on("mouseover", ".sec-box-wrp .prd", function(){
		$(this).parent().prev().find(".sec-main").css({opacity:0});
		$(this).parent().prev().find(".hov-img").show();
		$(this).parent().prev().find(".hov-img").html("<img src='"+$(this).find("img").attr("src")+"' />");
		/*$(this).find(".hov-img").html("<img src='"+$(this).find("img").attr("src")+"' />");*/
	});
	$(window).on("mouseout", ".sec-box-wrp .prd", function(){
		$(this).parent().prev().find(".sec-main").css({opacity:1});
		$(this).parent().prev().find(".hov-img").hide();
		$(this).parent().prev().find(".hov-img").html("");
	});

	$('#menu > ul > li').bind('mouseover', function() {
		$(this).addClass('active');
	});
	$('#menu > ul > li').bind('mouseout', function() {
		$(this).removeClass('active');
	});

	/*====================================*/

	/* PRODUCT GRIDS */
	function prdGrid(gridBlock) {
		var grdWrp = $('.content-body').outerWidth();
		if (grdWrp >= 1180) {
			$(gridBlock).removeAttr("data-col").attr("data-col", "prd-col5");
		};
		if (grdWrp >= 940 && grdWrp <= 1179) {
			$(gridBlock).removeAttr("data-col").attr("data-col", "prd-col4");
		};
		if (grdWrp >= 700 && grdWrp <= 939) {
			$(gridBlock).removeAttr("data-col").attr("data-col", "prd-col3");
		};
		if (grdWrp >= 530 && grdWrp <= 699) {
			$(gridBlock).removeAttr("data-col").attr("data-col", "prd-col2");
		};	
	}
	$('.product-grid').each(function(){ var gridBlock = this; prdGrid(gridBlock); });
	$('.mod-grid').each(function(){ var gridBlock = this; prdGrid(gridBlock); });
	
	$(window).on("resize", function(){ 
		$('.product-grid').each(function(){ var gridBlock = this; prdGrid(gridBlock); });
		$('.mod-grid').each(function(){ var gridBlock = this; prdGrid(gridBlock); });
	});

	$(".product-filter .display").on("click", 'a', function(){
		$('.product-grid').each(function(){ var gridBlock = this; prdGrid(gridBlock); });
	});
	

	/*====================================*/

	/* NOTIFICATION ADDED IN TO CONTENT AREA */
	$('#notification').prependTo('#content');

	/*====================================*/

	/* CUSTOM FOOTER ADD CLASS */
	$('.custom-footer').find('.column:last').addClass('last');

	/*====================================*/

	/* CATEGORIES */
	$(".box-category .cc").each(function(index, element) {
		//alert($(".box-category .cc").parent().hasClass('cat-active'));
		if($(this).parent().hasClass('cat-active') == true){
			$(this).addClass('open');
			$(this).next().addClass('active');
		}	
	});
	$(".box-category .cc").click(function(){ 
		if($(this).next().is(':visible') == false) {
			$('.box-category .col-subcat').slideUp(300, function(){
				$(this).removeClass('active');
				$('.cc').removeClass('open');
			});
		}
		if($(this).hasClass('open') == true) {
			$(this).next().slideUp(300, function(){
				$(this).removeClass('active');
				$(this).prev().removeClass('open');
			});
		}else{
			$(this).next().slideDown(300, function(){
				$(this).addClass('active');
				$(this).prev().addClass('open');
			});
		}
	});

	/*====================================*/

	/* LOGO WIDTH */
	if ($("body").hasClass("thm-3") || $("#container").hasClass("menu-fw")) {
		$(".navigation-bar").animate({opacity:1}, 300, function(){});
	}else {
		function logo(){
			//$(".navigation-bar").css({opacity:0});
			$(".store-logo").css({width: $("#logo").outerWidth()+40});
			$("#menu").css({width: $(".navigation-bar").outerWidth() - $(".store-logo").outerWidth()});	
			$(".navigation-bar").animate({opacity:1}, 300, function(){});
			
		} logo();
		$(window).resize(function(){
			logo();
		});	
	};

	/*====================================*/

	$("#nav-sticky").sticky({topSpacing:0});

	/*====================================*/

	/* BREADCRUMB */
	$('.breadcrumb').appendTo('#header-wrapper > .wrapper');
	$('.breadcrumb').css({visibility:'visible'});
	/*if($('#container').hasClass('menu-fw')){
		//$('.breadcrumb').appendTo('#menu');
		$('.breadcrumb').appendTo('.navigation-bar .wrapper');
	} else {
		$('.breadcrumb').appendTo('.navigation-bar');
	}
	$('.breadcrumb').css({visibility:'visible'});
	$('.thm-3 .breadcrumb').appendTo('#menu');*/

	/*====================================*/

	/* THEMES SETTINGS */
	if($('body').hasClass('thm-5') || $('body').hasClass('thm-6')){
		pgHd();
		$('.header-1').each(function(){
			if($(this).find('span').length == 0){
				$(this).wrapInner("<span></span>");	
			}
		});
	}
	if($('body').hasClass('thm-7')){ pgHd(); }
	if($('body').hasClass('thm-8') || $('body').hasClass('thm-9')){ pgHd(); }
	function pgHd() {
		if($("body").hasClass('homepage') == false){
			$('.content-body').prepend("<div class='page-heading-wrp'></div>");
		}
		if($(".page-heading-wrp .page-heading").length == 0){
			$('.page-heading').prependTo(".page-heading-wrp");
		}
		if($(".page-heading-wrp .breadcrumb").length == 0){
			$('.breadcrumb').appendTo(".page-heading-wrp");
		}
		if($(".content-body > .product-info").length != 0){
			$('.product-info > .right > .header-1').prependTo(".page-heading-wrp");
			$('.page-heading-wrp .header-1').addClass("page-heading").removeClass('header-1');
		}
	}

	/*====================================*/

	/* AUTO TAB SETUP */
	var T = 0;
	var CT = 0;
	var CP = 0;
	$('.content-tab, .tab-widget').each(function(){
		T++;
		var createCls = 'cTab'+T;
		$(this).addClass(createCls);
		
		var newCls = '.cTab'+T + ' .tbs a';
		var newClsPane = '.cTab'+ T + ' .tbs-pane';
		
		
		$(newCls).each(function(){
			CT++;
			var tabCls = 'cT'+CT;
			$(this).attr('href', '#'+tabCls);
		});
		
		$(newClsPane).each(function(){
			CP++;
			var paneCls = 'cT'+CP;
			$(this).attr('id', paneCls);
		});
		$(newCls).tabs();
	});

	/*====================================*/

	/* Custom Scroll bar setup */
	var srl = 0;
	$('.scrollPane').each(function(){
		
		// SET ID ON ALL SCROLL PANE
		srl++;
		var createCls = 'sp'+srl;
		$(this).addClass(createCls);
		$(this).wrapInner('<div class="dataHolder"></div>');
		
		var newCls = '.sp'+srl;
		// CALLING SCROLL FUNCTION
		$(window).load(function(){
			$(newCls).mCustomScrollbar();
			$(newCls + ' .mCSB_dragger_bar').prepend('<b class="t"></b><b class="b"></b>');
		});
	});

	/*====================================*/

	/* SELECT DROPDOWN MENU	*/
	$('select').each(function(){
		if($(this).parent().hasClass('select') == false){
			$(this).wrap("<span class='select'></span>");
			$(this).addClass('select-menu');
		}
	})

	/*====================================*/

	/* CURRENCY */
	/*$('#currency').hover(
		function(){ $(this).find('ul').css({display:'block'}) },
		function(){ $(this).find('ul').css({display:'none'}) }
	);*/
	
	/* LANGUAGE */
	/*$('#language').hover(
		function(){ $(this).find('ul').css({display:'block'}) },
		function(){ $(this).find('ul').css({display:'none'}) }
	);*/

	/*$('#currency').hover(
		function(){ $(this).find('ul').css({display:'block'}) },
		function(){ $(this).find('ul').css({display:'none'}) }
	);*/
	if ($(window).width() <= 1024) {
		$('#header #currency, #header #language, #header .dd, #header #cart').on("click",function(){
			//$('#header #currency, #header #language, #header .dd').removeClass('active');
			$('#cart').removeClass('active');
			if ($(this).hasClass('active')) {
				$(this).removeClass('active');
			}else {
				$(this).addClass('active');
			};
		});
		$('body *, .top-options *').on("click",function(){
			$('.top-options *').removeClass('active');
		});
		$('.top-options *').on("click",function(){
			$('#cart').removeClass('active');
		});
	};
	
	

	/*====================================*/

	/* CUSTOM STICKY BLOCKS */
	$('.custom-left').each(function(){
		$(this).css({left: -$(this).outerWidth(), display: "block"});
	});
	$('.custom-right').each(function(){
		$(this).css({right: -$(this).outerWidth(), display: "block"});
	});
	$('.custom-left .icon').mouseenter(function(){
		$(this).parent().css({zIndex : 99999});
		$(this).parent().stop().animate({'left' : '0px'});
	});
	$('.custom-left').mouseleave(function(){
		var w = $(this).outerWidth();
		$(this).stop().animate({'left': 0 - w}, function(){$(this).css({zIndex : 9999});});
		
	});
	$('.custom-right .icon').mouseenter(function(){
		$(this).parent().css({zIndex : 99999});
		$(this).parent().stop().animate({'right' : '0px'});
	});
	$('.custom-right').mouseleave(function(){
		var w = $(this).outerWidth();
		$(this).stop().animate({'right': 0 - w}, function(){$(this).css({zIndex : 9999});});
	});

	/*====================================*/

	/* CUSTOM TOP AND BOTTOM BLOCKS */
	$(".tp-wrp.d-close, .ft-wrp.d-close").each(function(){
		var h = $(this).find(".custom-data").outerHeight();
		$(this).find(".custom-data").css({'marginTop' : -h});
		$(this).find(".open").removeClass("open");
	});
	$('.hdl').click(function(){
		var block = "#" + $(this).parent().parent().attr("id");
		var h = $(block).find(".custom-data").outerHeight();
		if($(block).find(".wrapper").hasClass('open') == false){
			$(block).find(".custom-data").stop().animate({'marginTop' : 0}, 500, function(){
				$(block).find(".wrapper").addClass("open");
			});
			if($(block).hasClass("ft-wrp")){
				$('html, body').animate({ scrollTop: $("html").height()+h  }, '500');
			}
		}else {
			$(block).find(".custom-data").stop().animate({'marginTop' : -h},function(){
				$(block).find(".wrapper").removeClass("open");
			});
		}
	});

	/*====================================*/

	// Page scroll back to top
	var offset = 220;
	var duration = 500;
	$(window).scroll(function() {
		if ($(this).scrollTop() > offset) {
			$('.scroll-top').fadeIn(duration);
		} else {
			$('.scroll-top').fadeOut(duration);
		}
	});

	$(window).on('click', '.scroll-top', function(event) {
		event.preventDefault();
		$('html, body').animate({scrollTop: 0}, duration);
		return false;
	});

	/*====================================*/

	/* Mega Menu */
	$('#menu ul > li > a.top-lvl').mouseover(function(e) {
		if($(this).parent().children('.sub-menu').length != 0){
			var submenu = $(this).next('.sub-menu');
			var menu = $('#menu').offset();
			var dropdown = $(submenu).offset();
			i = (dropdown.left + $(submenu).outerWidth()) - (menu.left + $('#menu').outerWidth());
			if (i > 0) {
				$(submenu).css('margin-left', '-' + (i + 5) + 'px');
			}
		}
		// Supportive functions
		equalHeight($('#menu .menu-mega .menu-mg-data'));
		snippetOptions();
		
	});
	$('.sub-menu').parent().addClass("sub");
	$(window).on("mouseover", "#menu ul > li", function(){
		$(this).find('.menu-mega .menu-mg-data:last').addClass("last");
	});

	$(window).on("mouseover", ".menu-sub-list > a, .menu-main", function(){
		$(this).closest(".menu-grid").find(".menu-cat-img").attr({
			"src":$(this).attr("data-catimg"),
			"alt":$(this).attr("title")
		});
	});

	$(window).on("mouseout", ".menu-sub-list > a, .menu-main", function(){
		$(this).closest(".menu-grid").find(".menu-cat-img").attr({
			"src":$(this).closest(".menu-grid").find(".menu-main").attr("data-catimg"),
			"alt":$(this).closest(".menu-grid").find(".menu-main").attr("title")
		});
	});
	
	
	/* Mega Menu */
	if ($.browser.msie) {
		$('body').addClass('oldie');
		$('#menu > ul > li').bind('mouseover', function() {
			$(this).addClass('active');
		});
		$('#menu > ul > li').bind('mouseout', function() {
			$(this).removeClass('active');
		});
	}

	// IE6 & IE7 Fixes
	if ($.browser.msie) {
		if ($.browser.version <= 6) {
			$('#column-left + #column-right + #content, #column-left + #content').css('margin-left', '195px');
			
			$('#column-right + #content').css('margin-right', '195px');
		
			$('.box-category ul li a.active + ul').css('display', 'block');	
		}
		
		if ($.browser.version <= 7) {
			$('#menu > ul > li').bind('mouseover', function() {
				$(this).addClass('active');
			});
				
			$('#menu > ul > li').bind('mouseout', function() {
				$(this).removeClass('active');
			});	
		}
	}
	
	function equalHeight(group) {
		group.each(function() {
			var tallest = 0;
			$(this).find(".menu-grid").each(function() {
				var thisHeight = $(this).height();
				if(thisHeight > tallest) {
					tallest = thisHeight;
				}
			});
			$(this).find(".menu-grid").css({minHeight:tallest});
		});
	}
	function snippetOptions(){
		$("#menu .menu-html .slidesjs-container").each(function() {
			// Get on screen image
			var screenImage = $(this).find('img');

			// Create new offscreen image to test
			var theImage = new Image();
			theImage.src = screenImage.attr("src");

			// Get accurate measurements from that.
			var imageWidth = theImage.width;
			var imageHeight = theImage.height;

			if ($(this).height() == 0){
				console.log(imageHeight);
				$(this).css({height:imageHeight, width:'100%'});
				$(this).find('.slidesjs-control').css({height:$(this).height(), width:'100%'});
			};
		});
	}

	/*====================================*/

	/* IMAGE SLIDER */
	var slide = 0;
	$('.slide-widget').each(function(){

		// SET ID ON ALL OBJECTS
		slide++;
		var createObj = 'sld'+slide;
		$(this).css({opacity:0});
		$(this).attr("id", createObj);
		$(this).addClass(createObj);

		var w 				= parseInt($(this).attr('data-width'));
		var h 				= parseInt($(this).attr('data-height'));
		var interval 		= parseInt($(this).attr('data-interval'));
		var effectVal		= $(this).attr('data-effect') == "slide" ? eval(false) : $(this).attr('data-effect');
		var auto 			= $(this).attr('data-auto') == "true" ? interval : eval(false);
		var pauseOnHover 	= eval($(this).attr('data-pauseOnHover'));
		var navArrows 		= $(this).attr('data-arrows') == "yes" ? eval(true):eval(false);

		$(this).css({maxWidth:w,maxHeight:h});
		//console.log(w+' -- '+h+' -- '+interval+' -- '+effectVal+' -- '+auto+' -- ');

		$("."+createObj).animate({opacity:1}, 100, function(){
			$("."+createObj).owlCarousel({
				navigation : navArrows,
				singleItem:true,
				navigationText : false,
				autoPlay: auto,
				stopOnHover: pauseOnHover,
				transitionStyle : effectVal
			});
		});
	});

	/*====================================*/

	/* NIVO SLIDER */
	var nivo = 0;
	$('.nivo-widget').each(function(){
		// SET ID ON ALL OBJECTS
		nivo++;
		var createCls = 'niv'+nivo;
		$(this).css({opacity:0});
		$(this).addClass(createCls);
		
		var newCls = '.niv'+nivo;

		$(newCls).wrap( "<div class='nivo-widget-wrp'></div>" )
		$(newCls).addClass('nivoSlider');

		var w 				= parseInt($(this).attr('data-width'));
		var h 				= parseInt($(this).attr('data-height'));
		var animSpeed 		= parseInt($(newCls).attr('data-animSpeed'));
		var pauseTime 		= parseInt($(newCls).attr('data-pauseTime'));
		var directionNav 	= eval($(newCls).attr('data-directionNav'));
		var controlNav 		= eval($(newCls).attr('data-controlNav'));
		var pauseOnHover 	= eval($(newCls).attr('data-pauseOnHover'));

		$(this).css({maxWidth:w,maxHeight:h});

		$(newCls).animate({opacity:1}, 100, function(){
			$(newCls).nivoSlider({
				effect: 		'random',
				animSpeed: 		animSpeed,
				pauseTime: 		pauseTime,
				directionNav:	directionNav,
				controlNav: 	controlNav,
				pauseOnHover: 	pauseOnHover
			});
		});

	});

	/*====================================*/

	/* COLLAGE IMAGE GRID BANNERS */
	var clg = 0;
	$('.Collage').each(function(){
		// SET ID ON ALL OBJECTS
		clg++;
		var createCls = 'clg'+clg;
		$(this).addClass(createCls);
		$(this).css({opacity:0});

		var newCls = '.clg'+clg;

		$(newCls).children("div").addClass("Image_Wrapper");
		$(newCls).children("div").css({display:"none"});

		$(window).load(function(){
			$(newCls).animate({opacity:1}, 100, function(){
				$(newCls).find(".Image_Wrapper").css({display:"inline-block"});
				collage();
				$(newCls).collageCaption({
					'background' : "",
					'cssClass' : "clg-caption",
					'opacity' : "1"
				});
			});
		});

		function collage(){
			$(newCls).removeWhitespace().collagePlus(
				{
					'fadeSpeed'     : 1000,
					'targetHeight'  : parseInt($(newCls).attr('row-height')),
					'direction'     : 'vertical',
					'allowPartialLastRow' : false
				}
			);
		}

		var resizeTimer = null;
		$(window).bind('resize', function() {
			$(newCls).find('.Image_Wrapper').css("opacity", 0);
			if (resizeTimer) clearTimeout(resizeTimer);
			resizeTimer = setTimeout(collage, 200);
		});

	});

	/*====================================*/

	/* MASONRY IMAGE GRID */
	var masonry = 0;
	$('.masonry-wrp').each(function(){
		// SET ID ON ALL OBJECTS
		masonry++;
		var createCls = 'mas'+masonry;
		$(this).addClass(createCls);
		$(this).css({opacity:0});
		var newCls = '.mas'+masonry;
		
		$(newCls).wrap('<div class="masonry-container '+$(newCls).attr("data-g")+'wrp"></div>');
		var gutter = $(newCls).attr("data-g");
			gutter = parseInt(gutter.replace("g",""));

		$(newCls).animate({opacity:1}, 100, function(){
			masonrySet();
			$(newCls).collageCaption({
				'background' : "",
				'cssClass' : "masonry-caption",
				'opacity' : "1"
			});
		});

		var resizeTimer = null;
		$(window).on('resize', function() {
			$(newCls).css("opacity", 0);
			$(".ss-container").trigger("ss-destroy");
			if (resizeTimer) clearTimeout(resizeTimer);
			resizeTimer = setTimeout(masonrySet, 100);
			$(newCls).css("opacity", 1);
		});

		function masonrySet(){
			$(newCls).shapeshift({gutterX: gutter, gutterY: gutter, paddingX: 0, paddingY:0, enableDrag: false, minColumns: 8 });
			$(newCls).find(".masonry-item").each(function(){
				$(this).css({maxHeight:$(this).find('.imgblock').outerHeight()});
			});
		}
	});

});