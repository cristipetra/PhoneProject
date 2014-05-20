(function($){
$.fn.stylebuilder = function() {

	styObj = this;

	var sty_data 		= styObj.data();
	styObj.data("sty_id", '#'+styObj.attr('id'));

	var css_arr = $([]);
	css_arr.push({
		"cls"		: $(sty_data.sty_id).find('.cls-name').val()
	});
	var css_data = css_arr[0];

	$('[data-toggle="tooltip"], [title]').tooltip();

	// Font selection
	$(sty_data.sty_id).on('click change blur', '.font-selection select', function(){
		var newVal = 	$(sty_data.sty_id).find('.fonts select').val()+','+
						$(sty_data.sty_id).find('.font-var select').val()+','+
						$(sty_data.sty_id).find('.font-sub select').val()+','+
						$(sty_data.sty_id).find('.font-size select').val()+','+
						$(sty_data.sty_id).find('.line-h select').val()+','+
						$(sty_data.sty_id).find('.font-case select').val();
		$(sty_data.sty_id).find('.font-selection .font-data').val(newVal);
		fontDataCSS();
	});

	// Applying font data CSS on preview
	function fontDataCSS() {
		var fontData = $(sty_data.sty_id).find('.font-selection .font-data').val();

		if (fontData) {
			//console.log('function call');
			var fontData_ar = fontData.split(',');
			
			var weight = fontData_ar[1].slice(0,3);
			if(weight != "italic"){
				var fweight = weight;
			}
			if(fontData_ar[1] == "regular"){
				var fweight = 'normal';
			}else if(fontData_ar[1] == "bold"){
				var fweight = 'bold';
			};

			var itl = fontData_ar[1].slice(3,10);
			if(itl == "italic"){
				var fstyle = itl;
			}else if(fontData_ar[1] == "italic"){
				var fstyle = fontData_ar[1];
			}else{
				var fstyle = 'normal';
			};

			if ($(sty_data.sty_id).find('.fonts input[type="hidden"]').val() == 'webfonts#webfont'){
				var fontUrl = '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family='+ fontData_ar[0]+":"+fontData_ar[1]+"&subset="+fontData_ar[2]+'" />';
				var webUrl = '//fonts.googleapis.com/css?family='+ fontData_ar[0]+":"+fontData_ar[1]+"&subset="+fontData_ar[2];
				$(sty_data.sty_id).find('.fonturl-data').val(webUrl);
				$(sty_data.sty_id).find('.cp-preview link').remove();
				$(sty_data.sty_id).find('.cp-preview').prepend(fontUrl);
			}else{
				$(sty_data.sty_id).find('.cp-preview link').remove();
			};

			//$(sty_data.sty_id).find('.cp-preview div span').removeAttr('style');
			$(sty_data.sty_id).find('.cp-preview div span').css({
				fontFamily: fontData_ar[0].replace(/\+/g, " "),
				fontWeight: fweight,
				fontStyle: fstyle,
				fontSize: fontData_ar[3]+'px',
				lineHeight: fontData_ar[4],
				textTransform: fontData_ar[5],
				display: 'inline-block'
			});
		};
	} fontDataCSS();

	function applyFontData() {
		var fontData = $(sty_data.sty_id).find('.font-selection .font-data').val();

		if (fontData) {
			//console.log('function call');
			var fontData_ar = fontData.split(',');

			// Apply all db value to fields
			$(sty_data.sty_id).find('.fonts select option').each(function(){
				if(fontData_ar[0] == $(this).val()){
					$(this).attr('selected', true);
				}
			});
			//console.log($(sty_data.sty_id).find('.fonturl-data').val());
			$(sty_data.sty_id).find('.cp-preview').prepend('<link rel="stylesheet" type="text/css" href="'+ $(sty_data.sty_id).find('.fonturl-data').val() +'" />');
			$(sty_data.sty_id).find('.font-var select').css({opacity:0});
			$(sty_data.sty_id).find('.font-var select').animate({opacity:1},500, function(){
				$(this).find('option').each(function(){
					if(fontData_ar[1] == $(this).val()){
						$(this).attr('selected', 'selected');
					}
				});
			});
			$(sty_data.sty_id).find('.font-sub select').css({opacity:0});
			$(sty_data.sty_id).find('.font-sub select').animate({opacity:1},500, function(){
				$(this).find('option').each(function(){
					if(fontData_ar[2] == $(this).val()){
						$(this).attr('selected', 'selected');
					}
				});
			});
			$(sty_data.sty_id).find('.font-size select option').each(function(){
				if(fontData_ar[3] == $(this).val()){
					$(this).attr('selected', 'selected');
				}
			});
			$(sty_data.sty_id).find('.line-h select option').each(function(){
				if(fontData_ar[4] == $(this).val()){
					$(this).attr('selected', 'selected');
				}
			});
			$(sty_data.sty_id).find('.font-case select option').each(function(){
				if(fontData_ar[5] == $(this).val()){
					$(this).attr('selected', 'selected');
				}
			});
		}
	} applyFontData();


	$(sty_data.sty_id).on('click input change blur', '.other-options input', function(){
		var newVal = 	$(sty_data.sty_id).find('.cp-pdding .t').val()+','+
						$(sty_data.sty_id).find('.cp-pdding .r').val()+','+
						$(sty_data.sty_id).find('.cp-pdding .b').val()+','+
						$(sty_data.sty_id).find('.cp-pdding .l').val()+','+
						$(sty_data.sty_id).find('.cp-radius .t').val()+','+
						$(sty_data.sty_id).find('.cp-radius .r').val()+','+
						$(sty_data.sty_id).find('.cp-radius .b').val()+','+
						$(sty_data.sty_id).find('.cp-radius .l').val();
		$(sty_data.sty_id).find('.other-options .other-data').val(newVal);
		otherDataCSS();
	});

	// Applying other data CSS on preview
	function otherDataCSS() {
		var otherData = $(sty_data.sty_id).find('.other-options .other-data').val();
		if (otherData) {
			var otherData_ar = otherData.split(',');
			//console.log(otherData_ar);
			$(sty_data.sty_id).find('.cp-preview div span').css({
				paddingTop: otherData_ar[0]+'px',
				paddingRight: otherData_ar[1]+'px',
				paddingBottom: otherData_ar[2]+'px',
				paddingLeft: otherData_ar[3]+'px',
				borderTopLeftRadius: otherData_ar[4]+'px',
				borderTopRightRadius: otherData_ar[5]+'px',
				borderBottomRightRadius: otherData_ar[6]+'px',
				borderBottomLeftRadius: otherData_ar[7]+'px'
				//borderRadius: otherData_ar[4]+'px' +' '+ otherData_ar[5]+'px' +' '+ otherData_ar[6]+'px' +' '+ otherData_ar[7]+'px',
			});

			// Apply DB value
			$(sty_data.sty_id).find('.cp-pdding .t').val(otherData_ar[0]);
			$(sty_data.sty_id).find('.cp-pdding .r').val(otherData_ar[1]);
			$(sty_data.sty_id).find('.cp-pdding .b').val(otherData_ar[2]);
			$(sty_data.sty_id).find('.cp-pdding .l').val(otherData_ar[3]);
			$(sty_data.sty_id).find('.cp-radius .t').val(otherData_ar[4]);
			$(sty_data.sty_id).find('.cp-radius .r').val(otherData_ar[5]);
			$(sty_data.sty_id).find('.cp-radius .b').val(otherData_ar[6]);
			$(sty_data.sty_id).find('.cp-radius .l').val(otherData_ar[7]);
		};
	} otherDataCSS();
	
	$(sty_data.sty_id).on('click change blur', '.colors input', function(){
		var newVal = 	$(sty_data.sty_id).find('.f-color .n').val()+'|'+
						$(sty_data.sty_id).find('.f-color .h').val()+'|'+
						$(sty_data.sty_id).find('.b-color .n').val()+'|'+
						$(sty_data.sty_id).find('.b-color .h').val();
		$(sty_data.sty_id).find('.colors .color-data').val(newVal);
		colorDataCSS();
	});

	// Applying color data CSS on preview
	function colorDataCSS() {
		var colorData = $(sty_data.sty_id).find('.colors .color-data').val();
		if (colorData) {
			var colorData_ar = colorData.split('|');
			$(sty_data.sty_id).find('.cp-preview td:first div span').css({
				backgroundColor: colorData_ar[2],
				color: colorData_ar[0]
			});
			$(sty_data.sty_id).find('.cp-preview td:last div span').css({
				backgroundColor: colorData_ar[3],
				color: colorData_ar[1]
			});

			// Apply DB value
			$(sty_data.sty_id).find('.f-color .n').val(colorData_ar[0]);
			$(sty_data.sty_id).find('.f-color .h').val(colorData_ar[1]);
			$(sty_data.sty_id).find('.b-color .n').val(colorData_ar[2]);
			$(sty_data.sty_id).find('.b-color .h').val(colorData_ar[3]);
		};
	} colorDataCSS();


	$(sty_data.sty_id).on('click change blur input', '.font-shadow input', function(){
		var newVal = 	$(sty_data.sty_id).find('.font-shadow .hl').val()+'|'+
						$(sty_data.sty_id).find('.font-shadow .vl').val()+'|'+
						$(sty_data.sty_id).find('.font-shadow .br').val()+'|'+
						$(sty_data.sty_id).find('.font-shadow .s-color').val();
		$(sty_data.sty_id).find('.font-shadow .f-shadow-data').val(newVal);
		fontShadowCSS();
	});

	// Applying text shadow CSS on preview
	function fontShadowCSS() {
		var fontShadow = $(sty_data.sty_id).find('.font-shadow .f-shadow-data').val();
		if (fontShadow) {
			var fontShadow_ar = fontShadow.split('|');
			$(sty_data.sty_id).find('.cp-preview div span').css({
				textShadow: fontShadow_ar[0]+'px' +' '+ fontShadow_ar[1]+'px' +' '+ fontShadow_ar[2]+'px' +' '+ fontShadow_ar[3]
			});

			// Apply DB value
			$(sty_data.sty_id).find('.font-shadow .hl').val(fontShadow_ar[0]);
			$(sty_data.sty_id).find('.font-shadow .vl').val(fontShadow_ar[1]);
			$(sty_data.sty_id).find('.font-shadow .br').val(fontShadow_ar[2]);
			$(sty_data.sty_id).find('.font-shadow .s-color').val(fontShadow_ar[3]);
		};
	} fontShadowCSS();

	$(sty_data.sty_id).on('click change blur input', '.cp-shadow input', function(){
		var newVal = 	$(sty_data.sty_id).find('.cp-shadow .hl').val()+'|'+
						$(sty_data.sty_id).find('.cp-shadow .vl').val()+'|'+
						$(sty_data.sty_id).find('.cp-shadow .br').val()+'|'+
						$(sty_data.sty_id).find('.cp-shadow .spr').val()+'|'+
						$(sty_data.sty_id).find('.cp-shadow .s-color').val();
		$(sty_data.sty_id).find('.cp-shadow .cp-shadow-data').val(newVal);
		cpShadowCSS();
	});

	// Applying text shadow CSS on preview
	function cpShadowCSS() {
		var cpShadow = $(sty_data.sty_id).find('.cp-shadow .cp-shadow-data').val();
		if (cpShadow) {
			var cpShadow_ar = cpShadow.split('|');
			$(sty_data.sty_id).find('.cp-preview div span').css({
				boxShadow: cpShadow_ar[0]+'px' +' '+ cpShadow_ar[1]+'px' +' '+ cpShadow_ar[2]+'px' +' '+ cpShadow_ar[3]+'px' +' '+ cpShadow_ar[4]
			});

			// Apply DB value
			$(sty_data.sty_id).find('.cp-shadow .hl').val(cpShadow_ar[0]);
			$(sty_data.sty_id).find('.cp-shadow .vl').val(cpShadow_ar[1]);
			$(sty_data.sty_id).find('.cp-shadow .br').val(cpShadow_ar[2]);
			$(sty_data.sty_id).find('.cp-shadow .spr').val(cpShadow_ar[3]);
			$(sty_data.sty_id).find('.cp-shadow .s-color').val(cpShadow_ar[4]);
		};
	} cpShadowCSS();

	$(sty_data.sty_id).on('click change blur input', '.cp-bdr input, .cp-bdr select', function(){
		var newVal = 	$(sty_data.sty_id).find('.bdr-w .t').val()+'|'+
						$(sty_data.sty_id).find('.bdr-w .r').val()+'|'+
						$(sty_data.sty_id).find('.bdr-w .b').val()+'|'+
						$(sty_data.sty_id).find('.bdr-w .l').val()+'|'+
						$(sty_data.sty_id).find('.bdr-type select').val()+'|'+
						$(sty_data.sty_id).find('.cp-bdr .bdr-color').val();
		$(sty_data.sty_id).find('.cp-bdr .cp-bdr-data').val(newVal);
		cpBorderCSS();
	});

	// Applying border CSS on preview
	function cpBorderCSS() {
		var cpBdr = $(sty_data.sty_id).find('.cp-bdr .cp-bdr-data').val();
		if (cpBdr) {
			var cpBdr_ar = cpBdr.split('|');
			$(sty_data.sty_id).find('.cp-preview div span').css({
				borderTopWidth: cpBdr_ar[0]+'px',
				borderRightWidth: cpBdr_ar[1]+'px',
				borderBottomWidth: cpBdr_ar[2]+'px',
				borderLeftWidth: cpBdr_ar[3]+'px',
				borderStyle: cpBdr_ar[4],
				borderColor: cpBdr_ar[5]
			});

			// Apply DB value
			$(sty_data.sty_id).find('.bdr-w .t').val(cpBdr_ar[0]);
			$(sty_data.sty_id).find('.bdr-w .r').val(cpBdr_ar[1]);
			$(sty_data.sty_id).find('.bdr-w .b').val(cpBdr_ar[2]);
			$(sty_data.sty_id).find('.bdr-w .l').val(cpBdr_ar[3]);
			$(sty_data.sty_id).find('.cp-bdr .bdr-color').val(cpBdr_ar[5]);
			$(sty_data.sty_id).find('.bdr-type select option').each(function(){
				if(cpBdr_ar[4] == $(this).val()){
					$(this).attr('selected', 'selected');
				}
			});
		};
	} cpBorderCSS();

	// Apply css name
	/*$(sty_data.sty_id).on('blur input','.cls-name',function(){
		$(".style-tabs li").find("a[href='#"+ $(this).attr("data-sty") + "'] b").text($(this).val());
		console.log($(this).val());
	});*/
	// Save generated css to DB
	$(sty_data.sty_id).on('blur input', '.cls-name', function(){
		css_data['cls']	 = $(this).val();
	});
	function storeCSS(){
		var newVal = 	'.'+css_data['cls'] + '{' +
						$(sty_data.sty_id).find('.cp-normal span').attr('style')+'}'+
						'.'+css_data['cls'] + ':hover {' +
						$(sty_data.sty_id).find('.cp-hover span').attr('style')+'}';
		$(sty_data.sty_id).find('.css-data').val(newVal);

		//console.log(newVal);
	} storeCSS();

	$(sty_data.sty_id).on('click change blur input', 'input, select', function(){
		storeCSS();
	});


	return this;
};
})(jQuery);