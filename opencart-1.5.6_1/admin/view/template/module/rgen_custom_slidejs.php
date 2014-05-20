<style type="text/css">
.previewcode > div {
	background:rgba(0,0,0,0.06);
}
</style>
<div class="row-fluid">
	<div class="span3" style="width:320px; margin-right:-10px;">
		<div class="well well-small side-form">
			<span class="lbl-1">Page type <a class="helpbtn helpbtn-small" data-type="img" data-info="view/image/rgen_theme/layout-sizes.png">?</a></span>
			<select class="page-type">
				<option value="700" data-val="700">Normal layout - With column</option>
				<option value="940" data-val="940">Normal layout - column</option>
				<option value="940" data-val="940">Wide layout - With column</option>
				<option value="1180" data-val="1180">Wide layout - Without column</option>
			</select>
			
			<span class="lbl-1">Effect</span>
			<select class="sl-effect">
				<option value="slide">Slide</option>
				<option value="fade">Fade</option>
				<option value="backSlide">Back slide</option>
				<option value="goDown">Go down</option>
				<option value="fadeUp">Fade up</option>
			</select>

			<table class="subfields">
				<tr>
					<td>
						<span class="lbl">Width</span>
						<input type="text" class="input-mini sl-w" value="300">
					</td>
					<td>
						<span class="lbl">Height</span>
						<input type="text" class="input-mini sl-h" value="200">
					</td>
					<td>
						<span class="lbl">Interval</span>
						<input type="text" class="input-mini interval" placeholder="2000" value="2000">
					</td>
				</tr>
			</table>

			<table class="subfields">
				<tr>
					<td>
						<span class="lbl-1">Auto play</span>
						<div class="btn-group sl-auto mb10" data-toggle="buttons-radio">
							<a class="btn btn-mini active" data-val="true">Yes</a>
							<a class="btn btn-mini" data-val="false">No</a>
						</div>
					</td>
					<td>
						<span class="lbl-1">Pause on hover</span>
						<div class="btn-group sl-hover mb10" data-toggle="buttons-radio">
							<a class="btn btn-mini active" data-val="true">Yes</a>
							<a class="btn btn-mini" data-val="false">No</a>
						</div>
					</td>
				</tr>
			</table>

			<span class="lbl-1">Slide URL(Optional)</span>
			<input type="text" class="addurl fw-input">

			<a class="btn btn-small btn-success add-code">Add</a>
			<a class="btn btn-small btn-success update-code">Update</a>
			<a class="btn btn-small preview-code btn-info">Preview</a>
			<a class="btn btn-small clear-code">Clear</a>
		</div>
	</div>
	<div class="span9">
		<div class="temp" style="display:none;"><div class="slide-widget"></div></div>
		<textarea class="codepane"></textarea>
		<div class="previewcode-wrp"></div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){

	function slidejsMain() {
		var maincls = '.slidejs';

		function addblock(){
			var block  = '\n\t<div class="slide">';
				var url = $(maincls + " .addurl").val();
				if (url != '') {
				block += '\n\t<a href="'+url+'"><img /></a>';
				}else{
				block += '\n\t<img />';
				};
				block += '\n\t</div>\n';
			$(maincls + ' .temp .slide-widget').append(block);
		}
		function updateCode(){
			var w 			= $(maincls + " .sl-w").val();
			var h 			= $(maincls + " .sl-h").val();
			var interval 	= $(maincls + " .interval").val();
			var auto 		= $(maincls + " .sl-auto .active").attr("data-val");
			var hoveron 	= $(maincls + " .sl-hover .active").attr("data-val");
			var effect 		= $(maincls + " .sl-effect").val();
			
			$(maincls + ' .temp .slide-widget').removeAttr('data-width').removeAttr('data-height').removeAttr('data-interval').removeAttr('data-auto').removeAttr('data-effect').removeAttr('data-pauseOnHover');
			$(maincls + ' .temp .slide-widget').attr({
				'data-width': w,
				'data-height': h,
				'data-interval': interval,
				'data-auto': auto,
				'data-effect': effect,
				'data-pauseOnHover': hoveron
			});

			var i = 0;
			$(maincls + ' .temp .slide').each(function(){
				colorcode = Math.floor(Math.random()*16777215).toString(16);
				$(this).find('img').attr('src', 'http://placehold.it/'+w+'x'+h+'/'+colorcode+'/ffffff&text='+w+'x'+h+' - Slide '+i);
			i++; });
		}
		$(window).on("change", maincls + " .page-type", function(){
			$(maincls + " .sl-w").val($(this).val());
		});
		
		$(maincls + " .add-code").click(function(){
			if($(maincls + " .sl-w").val() != '' && $(maincls + " .sl-h").val() != ''){
				addblock();
				updateCode();
				$(maincls + ' .codepane').val($(maincls + ' .temp').html());
			}else{
				alert("Enter width and height to generate code.");
			}
			
		});
		$(maincls + " .update-code").click(function(){
			if($(maincls + ' .codepane').val() != ""){
				$(maincls + ' .temp').html($(maincls + ' .codepane').val())
			};
			updateCode();
			$(maincls + ' .codepane').val($(maincls + ' .temp').html());
		});

		$(maincls + " .clear-code").click(function(){
			$(maincls + ' .codepane').val(null);
			$(maincls + ' .temp .slide-widget').html(null);
		});
		$(maincls + " .preview-code").click(function(event){
			updateCode();
			event.preventDefault();
			$(maincls + ' .previewcode-wrp').prepend('<div class="slidjs-previewcode"><div style="max-width:'+$(maincls + " .sl-w").val()+'px;">' + $(maincls + ' .temp').html() + '</div></div>');
			$(maincls + ' .previewcode-wrp .slide-widget').addClass('slidejs-temp');
			$(maincls + ' .slidjs-previewcode').dialog({
				title: 'Preview of code',
				close: function (event, ui) {
					$(maincls + ' .slidjs-previewcode').html(null);
					$('.ui-dialog, .slidjs-previewcode').remove();
				},
				open: function( event, ui ) {
					sldjs();
				},
				bgiframe: false,
				width: parseInt($(maincls + " .sl-w").val())+50,
				height: parseInt($(maincls + " .sl-h").val())+60,
				resizable: true,
				modal: false
			});
			
			function sldjs(){
				var createObj = '.slidejs-temp';

				$(createObj).css({opacity:0});

				var w 				= parseInt($(createObj).attr('data-width'));
				var h 				= parseInt($(createObj).attr('data-height'));
				var interval 		= parseInt($(createObj).attr('data-interval'));
				var effectVal		= $(createObj).attr('data-effect') == "slide" ? eval(false) : $(createObj).attr('data-effect');
				var auto 			= $(createObj).attr('data-auto') == "true" ? interval : eval(false);
				var pauseOnHover 	= eval($(createObj).attr('data-pauseOnHover'));

				$(createObj).css({maxWidth:w,maxHeight:h});
				//console.log(w+' -- '+h+' -- '+interval+' -- '+effectVal+' -- '+auto+' -- ');

				$(createObj).animate({opacity:1}, 100, function(){
					$(createObj).owlCarousel({
						navigation : false,
						singleItem:true,
						navigationText : false,
						autoPlay: auto,
						stopOnHover: pauseOnHover,
						transitionStyle : effectVal
					});
				});
			}
		});
	} slidejsMain();
	

	
});
</script>