(function($){
$.fn.slidebuilder = function() {
	
	slide 				= this;
	var builder 		= this.find(".slide-container");
	var sl_data 		= slide.data();
	slide.data("sl_id", '#'+slide.attr('id'));
	var sl_id			= $(sl_data.sl_id);
	/*var main_delay 		= $('.main-delay').data();*/

	$('[data-toggle="tooltip"], [title]').tooltip();

	// Create main array to store informations
	var sl_arr = $([]);
	sl_arr.push({
		"sl_delay"		: slide.find('.slide-delay input[type="text"]').val(),
		"main_delay"	: $('.main-delay input[type="text"]').val()
	});
	var sl = sl_arr[0];

	// Status switch function
	function setswitch(){
		$(sl_data.sl_id).on("click", ".switch",function(){
			var id = $(this).find('input[type="checkbox"]').attr('id');
			var name = $(this).find('input[type="checkbox"]').attr('name');
			if ($(this).find('input[type="checkbox"]').is(':checked')) {
				$(this).find('input[type="hidden"]').remove();
			} else {
				$(this).append('<input type="hidden" name="' + name + '" value="0">');
			} 
		});
	}
	setswitch();

	/* Delay functions
	*****************************************/
	// Updating main delay
	$('.main-delay').on("click change", 'input[type="text"]', function(){
		sl['main_delay'] = $(this).val();

		dataDelay();
		sliderObj = $(sl_data.sl_id).find('.caption-tab .timeline');
		cpTimeLine(sliderObj);
		return false;
	})

	// Updating slide delay
	$(sl_data.sl_id).on("click change", '.slide-delay input[type="text"]', function(){
		sl['sl_delay'] = $(this).val();
		
		dataDelay();
		sliderObj = $(sl_data.sl_id).find('.caption-tab .timeline');
		cpTimeLine(sliderObj);
		return false;
	})

	$('.revo-main-tabs > .nav-tabs a').click(function(){
		if($(this).attr('href') == '#revo_slides') {
			//$(".slide-tab a[href='"+sl['sl_active']+"']").click();
			dataDelay();
		}
	});
	/******************************************/


	/* Caption tabs
	*****************************************/
	$(sl_data.sl_id).on('click', '.caption-tab', function(){
		
		// Reset data
		$(sl_data.sl_id).find('.caption-pane').hide().removeClass('active');
		$(sl_data.sl_id).find('.caption-tab').removeClass('active');
		
		// Setup data
		$(this).addClass('active');
		$($(this).attr('data-id')).addClass('active');
		$($(this).attr('data-id')).show();

		// Set active caption into array
		sl['cp_active'] = $(this).attr('data-id');

		if ($(sl['cp_active']).find('.cp-type').hasClass('active') == false){
			$(sl['cp_active']).find('.caption-type label:first input').click();
			//console.log($(sl['cp_active']).find('.caption-type label:first input').click());
		}else{
			sl['cp_type_active'] = '#'+$(sl['cp_active']).find('.active.cp-type').attr('id');
		}

		// Apply caption data from DB
		applyPosition();
		applyCpSpeed();
		applyCpAnimation();
		applyCpVideoOptions();
		applyCaptionLink();
	});
	$(sl_data.sl_id).find('.caption-tab').filter(':first').click();
	/******************************************/

	// Inner tabs use in language and common data 
	$(sl_data.sl_id).on('click','.in-tab .btn',function(){
		$(this).parent().find('.btn').removeClass('active');
		$(this).addClass('active');

		$(this).parent().next().find('div[data-tbpn]').hide();
		$(this).parent().next().find('div[data-tbpn="'+ $(this).attr('data-tb') +'"]').show();
	});
	

	// Caption type tabs
	$(sl_data.sl_id).on('click', '.caption-type input[type="radio"]', function(){
		$(sl['cp_active']).find('.cp-type').hide().removeClass('active');
		$(sl['cp_active']).find('.cp-type[data-cptype="'+ $(this).val() +'"]').show().addClass('active');
		
		// Set active caption type into array
		sl['cp_type_active'] = '#'+$(sl['cp_active']).find('.cp-type[data-cptype="'+ $(this).val() +'"]').attr('id');
		cpTypeDisabled();
	});
	
	// Slide image tabs
	/*$(sl_data.sl_id).on('click', '.slide-img-type-tab > .btn-group input[type="radio"]', function(){
		$(sl['cp_active']).find('.slide-img-type-pane').hide().removeClass('active');
		$(sl['cp_active']).find('.slide-img-type-pane[data-slimg="'+ $(this).val() +'"]').show().addClass('active');
		if($(this).val() == 'multi-l'){
			$('.slide-img-type-pane.active').find(".lng-tabs .btn:first").click();
		}
	});*/
	// Caption type tabs : Text 
	/*$(sl_data.sl_id).on('click', '.text-type-tab > .btn-group input[type="radio"]', function(){
		$(sl['cp_type_active']).find('.text-type-pane').hide().removeClass('active');
		$(sl['cp_type_active']).find('.text-type-pane[data-text="'+ $(this).val() +'"]').show().addClass('active');
		if($(this).val() == 'multi-l'){
			$('.text-type-pane.active').find(".lng-tabs .btn:first").click();
		}
	});*/
	// Caption type tabs : Image
	/*$(sl_data.sl_id).on('click', '.img-type-tab > .btn-group input[type="radio"]', function(){
		$(sl['cp_type_active']).find('.img-type-pane').hide().removeClass('active');
		$(sl['cp_type_active']).find('.img-type-pane[data-img="'+ $(this).val() +'"]').show().addClass('active');
		if($(this).val() == 'multi-l'){
			$('.img-type-pane.active').find(".lng-tabs .btn:first").click();
		}
	});*/
	// Caption type tabs : Image
	/*$(sl_data.sl_id).on('click', '.video-type-tab > .btn-group input[type="radio"]', function(){
		$(sl['cp_type_active']).find('.video-type-pane').hide().removeClass('active');
		$(sl['cp_type_active']).find('.video-type-pane[data-video="'+ $(this).val() +'"]').show().addClass('active');
		if($(this).val() == 'multi-l'){
			$('.video-type-pane.active').find(".lng-tabs .btn:first").click();
		}
	});*/

	// Language tabs
	/*function lngTab(){
		$(sl_data.sl_id).on('click', '.lng-tabs .btn', function(){
			$(this).parent().find('.btn').removeClass('active');
			$(this).addClass('active');
			$(this).parent().parent().find('.lng-tab-pane').hide().removeClass('active');
			$(this).parent().parent().find('.lng-tab-pane[data-pane="'+ $(this).attr('data-tab') +'"]').show().addClass('active');
		});
	} lngTab();
	$(sl_data.sl_id).find(".lng-tabs").each(function(){
		$(this).find(".btn:first").click();
	});*/

	// Position type 
	$(sl_data.sl_id).on('click', '.position-type > .btn-group input[type="radio"]', function(){
		$(sl['cp_active']).find('.position-type table.subfields').hide().removeClass('active');
		$(sl['cp_active']).find('.position-type table.subfields[data-position="'+ $(this).val() +'"]').show().addClass('active');
	});

	$(sl_data.sl_id).on('change click', '.position-type input[type="text"], .position-type .btn-group input[type="radio"]', function(){
		var posType = $(sl['cp_active']).find('.position-type > .btn-group .active input[type="radio"]').val();
		if (posType == 'absolute') {
			var postion = 	posType+','+
							$(sl['cp_active']).find('.position-type .drag-pos-abs input[type="text"].d-x').val()+','+
							$(sl['cp_active']).find('.position-type .drag-pos-abs input[type="text"].d-y').val();
			$(sl['cp_active']).find('.position-type .cp-ps-data').val(postion);
		} else if(posType == 'offset'){
			var postion = 	posType+','+
							$(sl['cp_active']).find('.position-type .drag-pos-off td:first-child .active input[type="radio"]').val()+','+
							$(sl['cp_active']).find('.position-type .drag-pos-off td:last-child .active input[type="radio"]').val()+','+
							$(sl['cp_active']).find('.position-type .drag-pos-off input[type="text"].d-x').val()+','+
							$(sl['cp_active']).find('.position-type .drag-pos-off input[type="text"].d-y').val();
			$(sl['cp_active']).find('.position-type .cp-ps-data').val(postion);
		}
		//console.log(postion);
	});

	// Caption status
	function cpStatus(){
		$(sl_data.sl_id).on("click", ".cp-status",function (){
			//console.log($(this).length);
			if($(this).hasClass('disabled')){
				$(this).removeClass("disabled");
				$(this).children("i").removeClass("icon-eye-close");
				$(this).children("input").val(1);
				//return false;
			}else{
				$(this).addClass("disabled");
				$(this).children("i").addClass("icon-eye-close");
				$(this).children("input").val(0);
				//return false;
			}
		});
	} cpStatus();

	// Slide captions sortable
	function cpSortable() {
		$(sl_data.sl_id).find('.caption-list').sortable({
			items: "li:not(.main-slide)",
			handle: ".btn-sort",
			start: function(event, ui) {
				var start_pos = ui.item.index();
				ui.item.data('start_pos', start_pos);
				//console.log(ui.item.html());
				//console.log(ui.placeholder);
			},
			update: function(event, ui) {
				var start_pos = ui.item.data('start_pos');
				var end_pos = $(ui.item).index();
				var sortedIDs = $(this).sortable( "toArray" );
				//console.log(sortedIDs);
				
				var sort = 0
				$(sl_data.sl_id).find('.caption-list > li').each(function(){
					$(this).attr("id", sort);
					$(this).find(".cp-sort").val(sort);
				sort++; });

			},
			create: function(event, ui) {
				/*var sort = 0
				builder.find('.caption-list > li').each(function(){
					$(this).attr("id", sort);
					$(this).find(".cp-sort").val(sort);
				sort++; });*/
			}
		});
	} cpSortable();

	// Caption display start and end times
	$(sl_data.sl_id).on("click input change blur", '.cp-start, .cp-end', function(){
		
		if ($('.caption-list li[data-id="'+sl['cp_active']+'"] .cp-start').val()) {
			var cStart = $('.caption-list li[data-id="'+sl['cp_active']+'"] .cp-start').val();
		}else{
			var cStart = '';
		};
		if ($('.caption-list li[data-id="'+sl['cp_active']+'"] .cp-end').val()) {
			if (cStart == '') {
				var cEnd = '';
				$('.caption-list li[data-id="'+sl['cp_active']+'"] .cp-end').val(null)
			}else{
				var cEnd = $('.caption-list li[data-id="'+sl['cp_active']+'"] .cp-end').val();
			};
		}else{
			var cEnd = '';
		};

		var newVal = 	sl['cp_active']+','+cStart+','+cEnd;
		//console.log(newVal);
		$('.caption-list li[data-id="'+sl['cp_active']+'"] .cp-display').val(newVal);
	});
	

	// Slide image options
	$(sl_data.sl_id).on("click change", '.bg-option-wrp select', function(){
		var newVal = $(sl['cp_active']).find('.bgr').val()+','+
					 $(sl['cp_active']).find('.bgf').val()+','+
					 $(sl['cp_active']).find('.bgp').val();
		$(sl['cp_active']).find('.bg-option-wrp .bg-options').val(newVal);
		//console.log(newVal);
	});

	$(sl_data.sl_id).on("input change", '.cp-smd input[type="text"]', function(){
		var newVal = $(sl['cp_active']).find('.cp-smd .slot').val()+','+
					 $(sl['cp_active']).find('.cp-smd .speed').val()+','+
					 $(sl['cp_active']).find('.cp-smd .delay').val();
		$(sl['cp_active']).find('.cp-slot-speed-delay').val(newVal);
	});

	// Caption speed
	$(sl_data.sl_id).on("input change", 'input[type="text"]', function(){
		var newVal = $(sl['cp_active']).find('.cp-speed .start-speed').val()+','+$(sl['cp_active']).find('.cp-speed .end-speed').val();
		$(sl['cp_active']).find('.cp-speed-data').val(newVal);
	});

	// Caption animation
	$(sl_data.sl_id).on("click change", '.cp-animation select', function(){
		var newVal = $(sl['cp_active']).find('.cp-animation .in-ani').val()+','+
					 $(sl['cp_active']).find('.cp-animation .in-es').val()+','+
					 $(sl['cp_active']).find('.cp-animation .out-ani').val()+','+
					 $(sl['cp_active']).find('.cp-animation .out-es').val();
		$(sl['cp_active']).find('.cp-animation .cp-animation-data').val(newVal);
		//console.log(newVal);
	});

	$(sl_data.sl_id).on("click", '.video-options input[type="radio"]', function(){
		var newVal = $(sl['cp_active']).find('.video-options .v-fl .active input[type="radio"]').val()+','+
					 $(sl['cp_active']).find('.video-options .v-auto .active input[type="radio"]').val()+','+
					 $(sl['cp_active']).find('.video-options .v-next .active input[type="radio"]').val();
		$(sl['cp_active']).find('.video-options .cp-video-options').val(newVal);
		//console.log(newVal);
	});

	$(sl_data.sl_id).on("input click", '.sld-link-input, .sld-link-open input[type="radio"]', function(){
		var newVal = $(sl['cp_active']).find('.sld-link-input').val()+','+
					 $(sl['cp_active']).find('.sld-link-open .active input[type="radio"]').val();
		$(sl['cp_active']).find('.sld-link .sld-link-data').val(newVal);
	});

	$(sl_data.sl_id).on("input click", '.cp-link-input, .cp-link-open input[type="radio"]', function(){
		var newVal = $(sl['cp_active']).find('.cp-link-input').val()+','+
					 $(sl['cp_active']).find('.cp-link-open .active input[type="radio"]').val();
		$(sl['cp_active']).find('.cp-link .cp-link-data').val(newVal);
		//console.log(newVal);
	});
	
	// Set link open on slide
	function applyLink(){
		var sld_link = $(sl['cp_active']).find('.sld-link-data').val();
		if (sld_link) {
			var sld_link_ar = sld_link.split(',');
			$(sl['cp_active']).find('.sld-link .sld-link-input').val(sld_link_ar[0]);
			$(sl['cp_active']).find('.sld-link .sld-link-open input[type="radio"]').attr('checked', false).parent().removeClass('active');
			$(sl['cp_active']).find('.sld-link .sld-link-open input[type="radio"]').each(function(){
				if($(this).val() == sld_link_ar[1]){
					$(this).attr('checked', true).parent().addClass('active');
				};
			});
		};
	}

	// Set Bg Options
	function applyBgOptions(){
		var bg_options = $(sl['cp_active']).find('.bg-option-wrp .bg-options').val();
		if (bg_options) {
			var bg_options_ar = bg_options.split(',');
			$(sl['cp_active']).find('.bg-option-wrp .bgr option').each(function(){
				if($(this).val() == bg_options_ar[0]){
					$(this).attr('selected', 'selected');
				};
			});
			$(sl['cp_active']).find('.bg-option-wrp .bgf option').each(function(){
				if($(this).val() == bg_options_ar[1]){
					$(this).attr('selected', 'selected');
				};
			});
			$(sl['cp_active']).find('.bg-option-wrp .bgp option').each(function(){
				if($(this).val() == bg_options_ar[2]){
					//console.log($(this).val());
					$(this).attr('selected', 'selected');
				};
			});

		};
	}


	// Set slot speed and delay
	function applySlotSpeedDelay(){
		var slot_speed_delay = $(sl['cp_active']).find('.cp-slot-speed-delay').val();
		if (slot_speed_delay) {
			var slot_speed_delay_ar = slot_speed_delay.split(',');
			$(sl['cp_active']).find('.cp-smd .slot').val(slot_speed_delay_ar[0]).end().find('.cp-smd .speed').val(slot_speed_delay_ar[1]).end().find('.cp-smd .delay').val(slot_speed_delay_ar[2]).end();	
			sl['sl_delay'] = slot_speed_delay_ar[2];
		};
	}

	// Start and end time set
	function applyStartEndTime(){
		$(sl_data.sl_id).find('.caption-list li').each(function(){
			var start_end = $(this).find('.cp-display').val();
			if(start_end){
				var start_end_ar = start_end.split(',');
				$(this).find('.cp-start').val(start_end_ar[1]).end().find('.cp-end').val(start_end_ar[2]).end();
				//console.log(start_end);
			}
		});
	}

	// Caption position set
	function applyPosition(){
		var cp_ps_data = $(sl['cp_active']).find('.position-type .cp-ps-data').val();
		if(cp_ps_data){
			//console.log(cp_ps_data);
			var cp_ps_data_ar = cp_ps_data.split(',');
			$(sl['cp_active']).find('.position-type > .btn-group input[type="radio"]').attr('checked', '').parent().removeClass('active');
			$(sl['cp_active']).find('.position-type .subfields').hide().removeClass('active');
			if(cp_ps_data_ar[0] == 'absolute'){
				$(sl['cp_active']).find('.position-type .drag-pos-abs').show().addClass('active');
				$(sl['cp_active']).find('.position-type > .btn-group input[value="absolute"]').attr('checked', 'checked').parent().addClass('active');
				$(sl['cp_active']).find('.position-type .drag-pos-abs input[type="text"].d-x').val(cp_ps_data_ar[1]);
				$(sl['cp_active']).find('.position-type .drag-pos-abs input[type="text"].d-y').val(cp_ps_data_ar[2]);
			}else{
				$(sl['cp_active']).find('.position-type .drag-pos-off').show().addClass('active');
				$(sl['cp_active']).find('.position-type > .btn-group input[value="offset"]').attr('checked', 'checked').parent().addClass('active');
				$(sl['cp_active']).find('.position-type .drag-pos-off td input[type="radio"]').attr('checked', '').parent().removeClass('active');
				$(sl['cp_active']).find('.position-type .drag-pos-off td:first-child input[type="radio"]').each(function(){
					if($(this).val() == cp_ps_data_ar[1]){
						$(this).attr('checked', 'checked').parent().addClass('active');
					};
				});
				$(sl['cp_active']).find('.position-type .drag-pos-off td:last-child input[type="radio"]').each(function(){
					if($(this).val() == cp_ps_data_ar[2]){
						$(this).attr('checked', 'checked').parent().addClass('active');
					};
				});
				$(sl['cp_active']).find('.position-type .drag-pos-off input[type="text"].d-x').val(cp_ps_data_ar[3]);
				$(sl['cp_active']).find('.position-type .drag-pos-off input[type="text"].d-y').val(cp_ps_data_ar[4]);
			}
		}
	}

	// Caption speed set
	function applyCpSpeed(){
		var cp_speed = $(sl['cp_active']).find('.cp-speed .cp-speed-data').val();
		if(cp_speed){
			var cp_speed_ar = cp_speed.split(',');
			$(sl['cp_active']).find('.cp-speed .start-speed').val(cp_speed_ar[0]).end().find('.cp-speed .end-speed').val(cp_speed_ar[1]).end();
		}
	}

	// Caption animation set
	function applyCpAnimation(){
		var cp_animation = $(sl['cp_active']).find('.cp-animation .cp-animation-data').val();
		if(cp_animation){
			var cp_animation_ar = cp_animation.split(',');
			$(sl['cp_active']).find('.cp-animation .in-ani option').each(function(){
				if($(this).val() == cp_animation_ar[0]){
					$(this).attr('selected', 'selected');
				};
			});
			$(sl['cp_active']).find('.cp-animation .in-es option').each(function(){
				if($(this).val() == cp_animation_ar[1]){
					$(this).attr('selected', 'selected');
				};
			});
			$(sl['cp_active']).find('.cp-animation .out-ani option').each(function(){
				if($(this).val() == cp_animation_ar[2]){
					$(this).attr('selected', 'selected');
				};
			});
			$(sl['cp_active']).find('.cp-animation .out-es option').each(function(){
				if($(this).val() == cp_animation_ar[3]){
					$(this).attr('selected', 'selected');
				};
			});
		}
	}

	// Caption video options set
	function applyCpVideoOptions(){
		var cp_video_options = $(sl['cp_active']).find('.video-options .cp-video-options').val();
		if(cp_video_options){
			var cp_video_options_ar = cp_video_options.split(',');
			//$(sl['cp_active']).find('.position-type > .btn-group input[type="radio"]').attr('checked', '').parent().removeClass('active');
			$(sl['cp_active']).find('.video-options .v-fl input').each(function(){
				if($(this).val() == cp_video_options_ar[0]){
					$(sl['cp_active']).find('.video-options .v-fl input').attr('checked','').parent().removeClass('active');
					$(this).attr('checked', 'checked').parent().addClass('active');
				};
			});
			$(sl['cp_active']).find('.video-options .v-auto input').each(function(){
				if($(this).val() == cp_video_options_ar[1]){
					$(sl['cp_active']).find('.video-options .v-auto input').attr('checked','').parent().removeClass('active');
					$(this).attr('checked', 'checked').parent().addClass('active');
				};
			});
			$(sl['cp_active']).find('.video-options .v-next input').each(function(){
				if($(this).val() == cp_video_options_ar[2]){
					$(sl['cp_active']).find('.video-options .v-next input').attr('checked','').parent().removeClass('active');
					$(this).attr('checked', 'checked').parent().addClass('active');
				};
			});
		}
	}

	// Set link open on captions
	function applyCaptionLink(){
		var cp_link = $(sl['cp_active']).find('.cp-link .cp-link-data').val();
		if (cp_link) {
			var cp_link_ar = cp_link.split(',');
			//console.log(cp_link_ar);
			$(sl['cp_active']).find('.cp-link .cp-link-input').val(cp_link_ar[0]);
			$(sl['cp_active']).find('.cp-link .cp-link-open input[type="radio"]').attr('checked', false).parent().removeClass('active');
			$(sl['cp_active']).find('.cp-link .cp-link-open input[type="radio"]').each(function(){
				if($(this).val() == cp_link_ar[1]){
					$(this).attr('checked', true).parent().addClass('active');
				};
			});
		};
	}
	
	// Slide tab click function
	$('.revo_slides').on('click', '.slide-tab a', function(){
		sl['sl_active'] = $(this).attr("href");
		applyBgOptions();
		applySlotSpeedDelay();
		applyStartEndTime();
		applyPosition();
		applyCpSpeed();
		applyCpAnimation();
		applyCpVideoOptions();
		applyLink();
		applyCaptionLink();

	});
	applyBgOptions();
	applySlotSpeedDelay();
	applyStartEndTime();
	applyPosition();
	applyCpSpeed();
	applyCpAnimation();
	applyCpVideoOptions();
	applyLink();
	applyCaptionLink();

	// Delay update function
	function dataDelay() {
		sl['sl_delay'] = $(sl_data.sl_id).find('.slide-delay input[type="text"]').val();
		//sl['sl_active'] = $('.revo_slides').find('.slide-tab:first a').attr("href");
		var sl_delay = parseInt(sl['sl_delay']);
		var main_delay = parseInt(sl['main_delay']);
		//console.log(sl);
		if (sl_delay >= main_delay){
			$(sl_data.sl_id).find('.timeline').attr('data-delay', sl_delay);
		}else{
			$(sl_data.sl_id).find('.timeline').attr('data-delay', main_delay);
		}
	} dataDelay();

	// Slider and Caption name inputs
	function cpName(){
		$(sl_data.sl_id).on('input focus', '.cp-nameinput input[type="text"]',function(){
			$("li[data-id="+ sl['cp_active'] +"] .cp-name").text($(this).val());
		});
	} cpName();
	$(sl_data.sl_id).on("input", ".slide-title > input",function(){
		$(sl['cp_active']).find("h4").text($(this).val());
		$("li[data-id="+ sl['cp_active'] +"] .cp-name").text($(this).val());
	});

	// Caption delete
	$(sl_data.sl_id).on("click", '.cp-delete', function(){
		$($(this).parent().attr("data-id")).remove();
		$(this).parent().remove();
		//console.log(sl['cp_active']);
		prevTab();
	});
	function prevTab(){
		$('.caption-tab[data-id="'+sl['cp_active']+'"]').click();
	}


	function cpTimeLine(sliderObj) {
		//console.log('function call');
		$('.revo_slides').prepend('<div class="slide-loading"></div>');
		var totalTimeline = sliderObj.length;

		var i = 0;
		sliderObj.each(function(){
			if($(this).hasClass('ui-slider-range') == false){
				sliderObj = $(this);
				sliderObj.rangeSlider({
					bounds:{
						min: 0, 
						max: parseInt(sliderObj.attr('data-delay'))
					},
					arrows:false
				});
				var startTime = $(sliderObj).parent().find('.cp-start').val();
				var endTime = $(sliderObj).parent().find('.cp-end').val();
				sliderObj.rangeSlider("values", startTime, endTime);
				
				sliderObj.on("valuesChanging", function(e, data){
					$(data['label'][0]).parent().find('.cp-start').val(Math.round(data.values.min));
					$(data['label'][0]).parent().find('.cp-end').val(Math.round(data.values.max));

					var newVal = $(data['label'][0]).parent().attr('data-id')+','+Math.round(data.values.min)+','+Math.round(data.values.max);
					$(data['label'][0]).parent().find('.cp-display').val(newVal);
				});

				sliderObj.on("valuesChanged", function(e, data){
					var range = $(this);
					$(data['label'][0]).parent().find('.cp-start').bind('change' ,function(){
						if ($(this).next().val() == 0 || $(this).next().val() == '') {
							range.rangeSlider("values", $(this).val(), parseInt($(data['label'][0]).attr('data-delay')));
							$(this).next().val(parseInt($(data['label'][0]).attr('data-delay')));
						}else{
							range.rangeSlider("min", $(this).val());
						};
					});
					$(data['label'][0]).parent().find('.cp-end').bind('change' ,function(){
						range.rangeSlider("max", $(this).val());
					});
				});
			}
			i++;
		});
		if (i == totalTimeline) {
			$('.revo_slides .slide-loading').animate({opacity:0}, 1000, function(){
				$(this).remove();
			});
		};
	}
	sliderObj = $(".slide-config .timeline");
	cpTimeLine(sliderObj);

	//console.log(sl_data.sl_id);
	// Adding new captions
	$(sl_data.sl_id).on("click", ".slide-config .add-caption",function(){
		addCaption(sl_id, builder);
		dataDelay();

		sliderObj = $(sl_data.sl_id).find('.caption-tab .timeline');
		cpTimeLine(sliderObj);
		$('[data-toggle="tooltip"], [title]').tooltip();
		$('[data-toggle="tooltip"], [title]').hover(
			function(){},
			function(){ $(this).tooltip('hide'); }
		);
	});

	// Disabling inactive caption type
	function cpTypeDisabled(){
		$('.cp-type :input').attr('disabled', true);
		$('.cp-type.active :input').attr('disabled', false);
	} cpTypeDisabled();
	
	return this;
};
})(jQuery);
