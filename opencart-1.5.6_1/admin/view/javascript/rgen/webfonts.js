(function ( $ ) {
	$.fn.webfonts = function(options) {
 		
 		var settings = $.extend({
			defaultfonts: 'view/image/rgen_theme/defaultfonts.json',
			json: 'view/image/rgen_theme/webfonts.json',
			variant_selector: ".google-variants",
			subset_selector: ".google-subsets"
		}, options );
 
		var webfonts_selector = this;
		
		function plugindata() {
			//console.log("This is new caption script ==> " + webfonts_selector.attr("name"));
			var google_data = "";
			var default_data = "";
			$.getJSON(settings.json ,function(google_data){ 
				//console.log(google_data);
				google_data = google_data.items; 
				$.getJSON(settings.defaultfonts ,function(default_data){ 
					default_data = default_data.items;
					//console.log(default_data);
					var data = $.merge(google_data, default_data);
					fontselector(data);
					webfonts_selector.change(function(){
						fontselector(data);
						//console.log($(this).val());
					});
				});
			});
		}

		function fontselector(data){
			//console.log(data);
			var fontval = webfonts_selector.val();
			var font = fontval.replace(/\+/g, " ");
			//console.log(font);
			$.each(data, function(i, data){
				//console.log(data);
				if(data.family == font){
					//console.log(data.kind);
					//console.log(data);
					
					//Set font type "Default font" or "Google font" based on font selection
					webfonts_selector.parent().find('input[type="hidden"]').val(data.kind);

					//Apply variants in select menu based on font selection
					$(settings.variant_selector).find('option').remove();
					var variant_data = '';
					$.each(data.variants, function(i, variants){
						//console.log(variants);
						variant_data +='<option value="' +variants+'">' +variants+ '</option>'; 
					});
					$(variant_data).appendTo(settings.variant_selector + " select");

					// Apply variants value selected in drop down based on db value
					$(settings.variant_selector).find("select option").each(function(){
						//console.log($(this).val());
						if($(this).val() == $(settings.variant_selector).find('input').val()){
							$(this).attr("selected", $(settings.variant_selector).find('input').val());
						}
					});
					

					//Apply subsets in select menu based on font selection
					$(settings.subset_selector).find('option').remove();
					var subset_data = '';
					$.each(data.subsets, function(i, subsets){
						//console.log(subsets);
						subset_data +='<option value="' +subsets+'">' +subsets+ '</option>';   
					});
					$(subset_data).appendTo(settings.subset_selector + " select");

					// Apply subsets value selected in drop down based on db value
					$(settings.subset_selector).find("select option").each(function(){
						//console.log($(this).val());
						if($(this).val() == $(settings.subset_selector).find('input').val()){
							$(this).attr("selected", $(settings.subset_selector).find('input').val());
						}
					});
				}
			});
		}
		
		return plugindata();
	};
}( jQuery ));