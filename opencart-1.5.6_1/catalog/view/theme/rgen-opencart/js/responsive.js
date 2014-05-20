
// FUNCTION FOR SLIDE SHOW PRODUCTS
function slideshowPrd() {
	//$("#slidshow-box .owl-carousel").destroy();
	if ($(".slidshowPrd").length == 0) {
		$('.slidshow-prd').animate({ opacity:0,right:0}, 300, function(){
			if ($("#slidshow-box .owl-carousel .owl-wrapper-outer").length > 0) {
				$("#slidshow-box .owl-carousel").data('owlCarousel').destroy();
			};

			//SLIDE SHOW PRODUCT MOVE TO CONTENT AREA
			var slidshowPrd = $('.slidshow-prd').find('.box-product').html();
			$('.content-body').prepend('<div style="opacity:0;" class="box list-carousel slidshowPrd"><div class="box-heading header-1">' + $('.slidshow-prd').find('.box-heading').html() + '</div><div class="box-product owl-carousel">' + slidshowPrd + '</div><div class="clearfix hr"></div></div>');
			$('.slidshow-prd').remove();
			
			var obj = '.slidshowPrd';
			$(obj+ " .owl-carousel").owlCarousel({
				itemsCustom : [ [0, 1], [420, 2], [600, 3], [768, 4], [980, 5] ],
				navigation : true,
				navigationText : ["",""],
				responsiveBaseWidth: obj
			});
			$(obj+" .owl-prev").addClass('prev');
			$(obj+" .owl-next").addClass('next');
			$(obj+" .owl-controls").addClass('carousel-controls');

			$('.slidshowPrd').animate({ opacity:1}, 500, function(){});
			
		});
	};
}
function slideshowPrdBack() {
	$('.slidshowPrd').animate({ opacity:0, height:0 }, 300, function(){
		if ($(".slidshowPrd .owl-carousel .owl-wrapper-outer").length > 0) {
			$(".slidshowPrd .owl-carousel").data('owlCarousel').destroy();
		};
		// SLIDESHOW PRODUCT MOVE BACK TO ON SLIDESHOW
		var slidshowPrd = $('.slidshowPrd').find('.box-product').html();

		if ($('.revo-slideshow-wrapper').hasClass('prdonrevo')){
			$('#content .revo-prdonslide').prepend('<div style="opacity:0; right:0px" class="box slidshow-prd list-carousel" id="slidshow-box"><div class="box-heading header-1">' + $('.slidshowPrd').find('.box-heading').html() + '</div><div class="box-product owl-carousel">' + slidshowPrd + '</div><div class="clearfix hr"></div></div>');
		}else{
			if($('#content').hasClass('w-full-slideshow')){
				$('#content .slideshow-wrapper:first').prepend('<div style="opacity:0; right:0px" class="box slidshow-prd list-carousel" id="slidshow-box"><div class="box-heading header-1">' + $('.slidshowPrd').find('.box-heading').html() + '</div><div class="box-product owl-carousel">' + slidshowPrd + '</div><div class="clearfix hr"></div></div>');
			} else {
				$('#content .slideshow:first').prepend('<div style="opacity:0; right:0px" class="box slidshow-prd list-carousel" id="slidshow-box"><div class="box-heading header-1">' + $('.slidshowPrd').find('.box-heading').html() + '</div><div class="box-product owl-carousel">' + slidshowPrd + '</div><div class="clearfix hr"></div></div>');
			}
		};
		$('.slidshowPrd').remove();
		
		var obj = '#slidshow-box';
		$(obj+ " .owl-carousel").owlCarousel({
			items:2,
			navigation : true,
			navigationText : ["",""],
			responsive:false
		});
		$(obj+" .owl-prev").addClass('prev');
		$(obj+" .owl-next").addClass('next');
		$(obj+" .owl-controls").addClass('carousel-controls');


		if ($('.revo-slideshow-wrapper').hasClass('prdonrevo')){
			$('.slidshow-prd').animate({ opacity:1 }, 500, function(){});
		}else{
			if($('#content').hasClass('w-full-slideshow')){
				$('.slidshow-prd').animate({ opacity:1 }, 500, function(){});
			} else {
				$('.slidshow-prd').animate({ right:70, opacity:1 }, 500, function(){});
			}
		};
	});
}
function bnrOnSlide(){
	$('.banner-onslide').prependTo('.content-body');
}
function bnrOnSlideBack(){
	$('.banner-onslide').appendTo('.slideshow-wrapper');
}

function productInfo() {
	/*$('.prdimage-wrapper .image a').click(function(){
		$(this).colorbox({ overlayClose: true, opacity: 0.5 });	
	});*/
	$('.product-info .header-1').prependTo('.prdinfo-wrapper');
	$('.prdinfo-wrapper > .header-1').addClass('page-heading');

}
function productInfoBack() {
	$('.prdinfo-wrapper > .page-heading').prependTo('.prdoptions-wrapper');
	$('.prdoptions-wrapper > .header-1').removeClass('page-heading');
}
function logoAction() {
	$('.store-logo').css({opacity:0});
	//$('.store-logo').prependTo('#header-wrapper');	
	if ($('#header-wrapper').hasClass('head1') == true){
		if ($(".logo-place").length == 0){
			$('#header').prepend('<div class="logo-place"></div>');
		};
		$('.store-logo').prependTo('.logo-place');
	}else{
		$('.store-logo, .store-logo1').prependTo('#header-wrapper');
	};
	$('.store-logo').animate({opacity:1}, 400);
}
function logoActionBack() {
	$('.store-logo').css({opacity:0});
	$('.store-logo').prependTo('.navigation-bar');
	$('.store-logo').animate({opacity:1}, 400);
	if ($('#header-wrapper').hasClass('head1') == true){
		$('.logo-place').remove();
	}else{
		$('.store-logo1').prependTo('#header');
	};
	
}
function additionalImgScroll(){
	$('.image-additional').exists(function() {
		$('.th-b .image-additional').carouFredSel({
			prev: '.thumb-wrapper .carousel-controls .prev',
			next: '.thumb-wrapper .carousel-controls .next',
			width: 381,
			auto: false,
			scroll: 1,
			items : 3,
			swipe:{onTouch: true},
			circular:false,
			infinite:false
		});
		$('.th-l .image-additional').carouFredSel({
			prev: '.thumb-wrapper .carousel-controls .prev',
			next: '.thumb-wrapper .carousel-controls .next',
			width: 131,
			auto: false,
			direction: 'up',
			scroll: 1,
			items : 3,
			swipe:{onTouch: true},
			circular:false,
			infinite:false
		});
	});
	
}
function customFootHeigh(group) {
	group.each(function() {
		var tallest = 0;
		$(this).find(".column").each(function() {
			var thisHeight = $(this).height();
			if(thisHeight > tallest) {
				tallest = thisHeight;
			}
		});
		$(this).find(".column").css({minHeight:tallest});
	});
}

function mobMenu(){
	$('#menu').addClass('mob-menu');
	$('#menu.mob-menu > span').addClass('mob-submenu');
	
	//$('.menu-html-wrp').parent().css({display:'none'});

	function arrows(){
		$('#menu.mob-menu .mc').each(function(){
			$(this).css({height:$(this).next('a').outerHeight()-2});
			//alert($(this).children('.mc:before').css({border:'1px solid #000'}));
			$(this).children('.mc:before').css({background:'#000'});
		});
	}
	$('#menu.mob-menu .mc').each(function(){
		$(this).css({height:$(this).next('a').outerHeight()-2});
	});
	
	if($('#menu.mob-menu > ul li').children('.sub-menu').length > 0){
		$('#menu.mob-menu > ul li').children('.sub-menu').parent().addClass('m-close');
		
		if($('#menu.mob-menu > ul li').children('.mc').length == 0){
			$('.m-close').prepend('<b class="mc"></b>');
		}
		$('.m-close > .mc').die('click').click(function(){
			if($(this).parent().children('.sub-menu').hasClass('m-open') == true){
				$(this).parent().children('.sub-menu').removeClass('m-open');
				$(this).removeClass('mo');
			}else{
				$(this).parent().children('.sub-menu').addClass('m-open');
				$(this).addClass('mo');
				arrows();
			}
		});
	}
	$('#menu.mob-menu > .mob-submenu').die('click').click(function(){
		if($(this).parent().children('.menu-data').is(':visible') == true){
			$(this).parent().children('.menu-data').removeClass('m-open');
		}else{
			$(this).parent().children('.menu-data').addClass('m-open');
		}
		arrows();
		$("#menu.mob-menu .menu-badge b").each(function(){
			$(this).css({marginTop:-$(this).outerHeight()/2});
		});
	});
}
function mobMenuReset(){
	$('#menu').removeClass('mob-menu');
	$('#menu > span').removeClass('mob-submenu');
	$('#menu .menu-data, #menu .sub-menu').removeClass('m-open');
	$('#menu .m-close').removeClass('m-close');
	$('#menu .mo').removeClass('mo');
	$('#menu .mc').remove();
	$('.menu-html-wrp').parent().css({display:''});

}


/*==============================================*/

$(document).ready(function(e) {
	/*#############################################################
	Desktop standard 960 and up
	*/
	enquire.register("only screen and (min-width: 980px)", {
		match : function() {
			slideshowPrdBack();
			productInfoBack();
			additionalImgScroll();
			//customFootHeigh();
			customFootHeigh($('.custom-footer'));
			mobMenuReset();
			bnrOnSlideBack();
			logoActionBack();

			if ($("div[data-head='lg-c']").length == 1) {
				$("div[data-head='lg-c']").addClass('head-c');
			};
			
			$('.full-slideshow .slideshow').css({marginTop:-$('#header-wrapper').outerHeight()});
			$('.beside-slideshow').css({minHeight: $('.banner-beside').outerHeight()});
			
			$(".refine-scroll").animate({opacity:1}, 50, function(){
				if($('.refine-scroll li').length < 5){
					$(".refine-scroll ul").trigger("destroy");
				}
			});
		}
	
	/*#############################################################
	Tablet Portrait size to standard 980
	*/
	}).register("only screen and (min-width: 768px) and (max-width: 979px)", {
		match : function() {
			slideshowPrd();
			productInfo();
			additionalImgScroll();
			customFootHeigh($('.custom-footer'));
			mobMenuReset();
			bnrOnSlide();
			
			if ($("div[data-head='lg-c']").length == 1) {
				$("div[data-head='lg-c']").removeClass('head-c');
			};
			
			$('.custom-footer #aboutus-content').removeAttr('style');
			
			$('.full-slideshow .slideshow').removeAttr('style');
			
			// Logo action
			$('.store-logo').css({opacity:0});
			if ($('#header-wrapper').hasClass('head1') == true){
				if ($(".logo-place").length == 0){
					$('#header').prepend('<div class="logo-place"></div>');
				};
				$('.store-logo').prependTo('.logo-place');
			}else{
				$('.store-logo').prependTo('#header');
			};
			$('.store-logo').animate({opacity:1}, 400);
			/*=========================================*/
			
			$(".refine-scroll").animate({opacity:1}, 50, function(){
				if($('.refine-scroll li').length < 5){
					$(".refine-scroll ul").trigger("destroy");
				}
			});
			
		}
	
	/*#############################################################
	Mobile Landscape Size to Tablet Portrait
	*/
	}).register("only screen and (min-width: 200px) and (max-width: 767px)", {
		match : function() {
			mobMenu();
			logoAction();
			slideshowPrd();
			productInfo();
			bnrOnSlide();
			
			if ($("div[data-head='lg-c']").length == 1) {
				$("div[data-head='lg-c']").removeClass('head-c');
			};

			$('.full-slideshow .slideshow').removeAttr('style');
			$('.custom-footer .column').removeAttr('style');
			
			$('#footer .column h3').click(function(){
				if($(this).next('ul').hasClass('active') == false){
					$(this).next('ul').slideDown(500, function(){
						$(this).addClass('active');
					});
				}else {
					$(this).next('ul').slideUp(500, function(){
						$(this).removeClass('active');
					});
				}
			});
			
			$(".image-additional").animate({opacity:1}, 50, function(){
				$(".image-additional").trigger("destroy");
				$(".image-additional").removeAttr('style');
			});
			$(".product-info .price").prependTo('.prdoptions-wrapper');
			//$(".thumb-wrapper").appendTo('.prdimage-wrapper');
			
			$(".refine-scroll").animate({opacity:1}, 50, function(){
				if($('.refine-scroll li').length > 2){
					$('.refine-scroll > ul').carouFredSel({
						responsive: true,
						prev: '.refine-scroll .carousel-controls .prev',
						next: '.refine-scroll .carousel-controls .next',
						width: '100%',
						auto:false,
						scroll: 1,
						items: {visible: {min: 1,max: 5}},
						swipe:{onTouch: true},
						circular:false,
						infinite:false
					});
				}
			});
			//$('.thm-3 .breadcrumb').appendTo('.navigation-bar');
		},
		unmatch : function() {
			$(".prdoptions-wrapper .price").prependTo('.product-info > .prdoptions-wrapper > .r');
		}
		
	}).listen();
	
	// Category grids 
	if ($(".cat-grid").length > 0 && $(".cat-grid").parent().hasClass("column") == false){
		$(".cat-grid").each(function(){
			var gridObj = "#"+$(this).attr("id");
			enquire.register("only screen and (min-width: 1200px)", {
				match : function() { 
					$(gridObj+" .row .clearfix").remove();
					$(gridObj+" .row").attr("data-col", "7");
					$(gridObj+" .row .col:nth-child(7n)").after('<b class="clearfix"></b>');
				}
			}).register("only screen and (min-width: 980px) and (max-width: 1199px)", {
				match : function() { 
					$(gridObj+" .row .clearfix").remove();
					$(gridObj+" .row").attr("data-col", "6");
					$(gridObj+" .row .col:nth-child(6n)").after('<b class="clearfix"></b>');
				}
			}).register("only screen and (min-width: 768px) and (max-width: 979px)", {
				match : function() { 
					$(gridObj+" .row .clearfix").remove();
					$(gridObj+" .row").attr("data-col", "5");
					$(gridObj+" .row .col:nth-child(5n)").after('<b class="clearfix"></b>');
				}
			}).register("only screen and (min-width: 600px) and (max-width: 767px)", {
				match : function() { 
					$(gridObj+" .row .clearfix").remove();
					$(gridObj+" .row").attr("data-col", "4");
					$(gridObj+" .row .col:nth-child(4n)").after('<b class="clearfix"></b>');
				}
			}).register("only screen and (min-width: 420px) and (max-width: 599px)", {
				match : function() { 
					$(gridObj+" .row .clearfix").remove();
					$(gridObj+" .row").attr("data-col", "3");
					$(gridObj+" .row .col:nth-child(3n)").after('<b class="clearfix"></b>');
				}
			}).register("only screen and (min-width: 200px) and (max-width: 419px)", {
				match : function() { 
					$(gridObj+" .row .clearfix").remove();
					$(gridObj+" .row").attr("data-col", "2");
					$(gridObj+" .row .col:nth-child(2n)").after('<b class="clearfix"></b>');
				}
			}).listen();
		});
	};

	// Selected category grid case
	if ($(".sel-cat-grid").length > 0 && $(".sel-cat-grid").parent().hasClass("column") == false){
		$(".sel-cat-grid").each(function(){
			if ($(this).hasClass("prd-y") == false) {
				console.log($(".sel-cat-grid").length);
				var gridObj = "#"+$(this).attr("id");
				enquire.register("only screen and (min-width: 1200px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "7");
						$(gridObj+" .row .col:nth-child(7n)").after('<b class="clearfix"></b>');
					}
				}).register("only screen and (min-width: 980px) and (max-width: 1199px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "6");
						$(gridObj+" .row .col:nth-child(6n)").after('<b class="clearfix"></b>');
					}
				}).register("only screen and (min-width: 768px) and (max-width: 979px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "5");
						$(gridObj+" .row .col:nth-child(5n)").after('<b class="clearfix"></b>');
					}
				}).register("only screen and (min-width: 600px) and (max-width: 767px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "4");
						$(gridObj+" .row .col:nth-child(4n)").after('<b class="clearfix"></b>');
					}
				}).register("only screen and (min-width: 420px) and (max-width: 599px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "3");
						$(gridObj+" .row .col:nth-child(3n)").after('<b class="clearfix"></b>');
					}
				}).register("only screen and (min-width: 200px) and (max-width: 419px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "2");
						$(gridObj+" .row .col:nth-child(2n)").after('<b class="clearfix"></b>');
					}
				}).listen();
			};
		});
	};

	// Selected category with product style 1
	if ($(".selcat-prdsec-style1").length > 0 && $(".selcat-prdsec-style1").parent().hasClass("column") == false){
		$(".selcat-prdsec-style1").each(function(){
			if ($(this).hasClass("sel-cat-grid")) {
				var gridObj = "#"+$(this).attr("id");
				enquire.register("only screen and (min-width: 1200px)", {
					match : function() {
						$(gridObj+" .row .clearfix").remove();
						if ($("body").hasClass("col-y")) {
							$(gridObj+" .row").attr("data-col", "2");
							$(gridObj+" .row .col:nth-child(2n)").after('<b class="clearfix hr"></b>');
						}else{
							$(gridObj+" .row").attr("data-col", "3");
							$(gridObj+" .row .col:nth-child(3n)").after('<b class="clearfix hr"></b>');
						};
					}
				}).register("only screen and (min-width: 980px) and (max-width: 1199px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "2");
						$(gridObj+" .row .col:nth-child(2n)").after('<b class="clearfix hr"></b>');
					}
				}).register("only screen and (min-width: 768px) and (max-width: 979px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "2");
						$(gridObj+" .row .col:nth-child(2n)").after('<b class="clearfix hr"></b>');
					}
				}).register("only screen and (min-width: 200px) and (max-width: 767px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "1");
						$(gridObj+" .row .col:nth-child(1n)").after('<b class="clearfix hr"></b>');
					}
				}).listen();
			};
		});
	}

	// Selected category with product style 2
	if ($(".selcat-prdsec-style2").length > 0 && $(".selcat-prdsec-style2").parent().hasClass("column") == false){
		$(".selcat-prdsec-style2").each(function(){
			if ($(this).hasClass("sel-cat-grid")) {
				var gridObj = "#"+$(this).attr("id");
				enquire.register("only screen and (min-width: 1200px)", {
					match : function() {
						$(gridObj+" .row .clearfix").remove();
						if ($("body").hasClass("col-y")) {
							$(gridObj+" .row").attr("data-col", "3");
							$(gridObj+" .row .col:nth-child(3n)").after('<b class="clearfix hr"></b>');
						}else{
							$(gridObj+" .row").attr("data-col", "4");
							$(gridObj+" .row .col:nth-child(4n)").after('<b class="clearfix hr"></b>');
						};
					}
				}).register("only screen and (min-width: 980px) and (max-width: 1199px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						if ($("body").hasClass("col-y")) {
							$(gridObj+" .row").attr("data-col", "2");
							$(gridObj+" .row .col:nth-child(2n)").after('<b class="clearfix hr"></b>');
						}else{
							$(gridObj+" .row").attr("data-col", "3");
							$(gridObj+" .row .col:nth-child(3n)").after('<b class="clearfix hr"></b>');
						};
					}
				}).register("only screen and (min-width: 768px) and (max-width: 979px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "2");
						$(gridObj+" .row .col:nth-child(2n)").after('<b class="clearfix hr"></b>');
					}
				}).register("only screen and (min-width: 200px) and (max-width: 767px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "1");
						$(gridObj+" .row .col:nth-child(1n)").after('<b class="clearfix hr"></b>');
					}
				}).listen();
			};
		});
	}


	// Selected brands grid 
	if ($(".brand-grid").length > 0 && $(".brand-grid").parent().hasClass("column") == false){
		$(".brand-grid").each(function(){
			if ($(this).hasClass("prd-y") == false) {
				var gridObj = "#"+$(this).attr("id");
				enquire.register("only screen and (min-width: 1200px)", {
					match : function() {
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "8");
						$(gridObj+" .row .col:nth-child(8n)").after('<b class="clearfix"></b>');
					}
				}).register("only screen and (min-width: 980px) and (max-width: 1199px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "7");
						$(gridObj+" .row .col:nth-child(7n)").after('<b class="clearfix"></b>');
					}
				}).register("only screen and (min-width: 768px) and (max-width: 979px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "6");
						$(gridObj+" .row .col:nth-child(6n)").after('<b class="clearfix"></b>');
					}
				}).register("only screen and (min-width: 600px) and (max-width: 767px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "4");
						$(gridObj+" .row .col:nth-child(4n)").after('<b class="clearfix"></b>');
					}
				}).register("only screen and (min-width: 420px) and (max-width: 599px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "3");
						$(gridObj+" .row .col:nth-child(3n)").after('<b class="clearfix"></b>');
					}
				}).register("only screen and (min-width: 200px) and (max-width: 419px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "3");
						$(gridObj+" .row .col:nth-child(3n)").after('<b class="clearfix"></b>');
					}
				}).listen();
			};
		});
	}

	// Selected brand with product style 1 
	if ($(".brand-prdsec-style1").length > 0 && $(".brand-prdsec-style1").parent().hasClass("column") == false){
		$(".brand-prdsec-style1").each(function(){
			if ($(this).hasClass("brand-grid")) {
				var gridObj = "#"+$(this).attr("id");
				enquire.register("only screen and (min-width: 1200px)", {
					match : function() {
						$(gridObj+" .row .clearfix").remove();
						if ($("body").hasClass("col-y")) {
							$(gridObj+" .row").attr("data-col", "3");
							$(gridObj+" .row .col:nth-child(3n)").after('<b class="clearfix hr"></b>');
						}else{
							$(gridObj+" .row").attr("data-col", "4");
							$(gridObj+" .row .col:nth-child(4n)").after('<b class="clearfix hr"></b>');
						};
					}
				}).register("only screen and (min-width: 980px) and (max-width: 1199px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						if ($("body").hasClass("col-y")) {
							$(gridObj+" .row").attr("data-col", "2");
							$(gridObj+" .row .col:nth-child(2n)").after('<b class="clearfix hr"></b>');
						}else{
							$(gridObj+" .row").attr("data-col", "3");
							$(gridObj+" .row .col:nth-child(3n)").after('<b class="clearfix hr"></b>');
						};
					}
				}).register("only screen and (min-width: 768px) and (max-width: 979px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "2");
						$(gridObj+" .row .col:nth-child(2n)").after('<b class="clearfix hr"></b>');
					}
				}).register("only screen and (min-width: 200px) and (max-width: 767px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "1");
					}
				}).listen();
			};
		});
	}

	// Selected brands with product style 2
	if ($(".brand-prdsec-style2").length > 0 && $(".brand-prdsec-style2").parent().hasClass("column") == false){
		$(".brand-prdsec-style2").each(function(){
			if ($(this).hasClass("brand-grid")) {
				var gridObj = "#"+$(this).attr("id");
				enquire.register("only screen and (min-width: 1200px)", {
					match : function() {
						$(gridObj+" .row .clearfix").remove();
						if ($("body").hasClass("col-y")) {
							$(gridObj+" .row").attr("data-col", "3");
							$(gridObj+" .row .col:nth-child(3n)").after('<b class="clearfix hr"></b>');
						}else{
							$(gridObj+" .row").attr("data-col", "4");
							$(gridObj+" .row .col:nth-child(4n)").after('<b class="clearfix hr"></b>');
						};
					}
				}).register("only screen and (min-width: 980px) and (max-width: 1199px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						if ($("body").hasClass("col-y")) {
							$(gridObj+" .row").attr("data-col", "2");
							$(gridObj+" .row .col:nth-child(2n)").after('<b class="clearfix hr"></b>');
						}else{
							$(gridObj+" .row").attr("data-col", "3");
							$(gridObj+" .row .col:nth-child(3n)").after('<b class="clearfix hr"></b>');
						};
					}
				}).register("only screen and (min-width: 768px) and (max-width: 979px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "2");
						$(gridObj+" .row .col:nth-child(2n)").after('<b class="clearfix hr"></b>');
					}
				}).register("only screen and (min-width: 200px) and (max-width: 767px)", {
					match : function() { 
						$(gridObj+" .row .clearfix").remove();
						$(gridObj+" .row").attr("data-col", "1");
						$(gridObj+" .row .col:nth-child(1n)").after('<b class="clearfix hr"></b>');
					}
				}).listen();
			};
		});
	}


});