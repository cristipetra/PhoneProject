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
				</tr>
				<tr>
					<td>
						<span class="lbl">Animation speed</span>
						<input type="text" class="input-mini ani-speed" placeholder="500" value="500">
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
						<span class="lbl-1">Arrow display</span>
						<div class="btn-group sl-arrow mb10" data-toggle="buttons-radio">
							<a class="btn btn-mini active" data-val="true">Yes</a>
							<a class="btn btn-mini" data-val="false">No</a>
						</div>
					</td>
					<td>
						<span class="lbl-1">Navigation dots</span>
						<div class="btn-group sl-nav mb10" data-toggle="buttons-radio">
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
		<div class="temp" style="display:none;"><div class="nivo-widget"></div></div>
		<textarea class="codepane"></textarea>
		<div class="previewcode-wrp"></div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){

	function nivojsMain() {
		var maincls = '.nivojs';

		function addblock(){
			var block  = '';
				var url = $(maincls + " .addurl").val();
				if (url != '') {
				block += '\n\t<a href="'+url+'"><img /></a>\n';
				}else{
				block += '\n\t<img />\n';
				};
				block += '';
			return block;
		}
		function updateCode(){
			var w 			= $(maincls + " .sl-w").val();
			var h 			= $(maincls + " .sl-h").val();
			var interval 	= $(maincls + " .interval").val();
			var aniSpeed 	= $(maincls + " .ani-speed").val();
			var arrow 		= $(maincls + " .sl-arrow .active").attr("data-val");
			var nav 		= $(maincls + " .sl-nav .active").attr("data-val");
			var hoveron 	= $(maincls + " .sl-hover .active").attr("data-val");

			$(maincls + ' .temp .nivo-widget').removeAttr('data-width').removeAttr('data-height').removeAttr('data-animSpeed').removeAttr('data-pauseTime').removeAttr('data-directionNav').removeAttr('data-controlNav').removeAttr('data-pauseOnHover');
			$(maincls + ' .temp .nivo-widget').attr({
				'data-width': w,
				'data-height': h,
				'data-pauseTime': interval,
				'data-animSpeed': aniSpeed,
				'data-directionNav': arrow,
				'data-controlNav': nav,
				'data-pauseOnHover': hoveron
			});

			/*$('.masonry .temp .masonry-wrp').removeClass('g2').removeClass('g4').removeClass('g6').removeClass('g8').removeClass('g10');
			$('.masonry .temp .masonry-wrp').addClass($(".gutt .active").attr("data-val"));*/
			var i = 0;
			$(maincls + ' .temp .nivo-widget img').each(function(){
				colorcode = Math.floor(Math.random()*16777215).toString(16);
				$(this).attr('src', 'http://placehold.it/'+w+'x'+h+'/'+colorcode+'/ffffff&text='+w+'x'+h+' - Slide '+i);
			i++; });
		}
		$(window).on("change", maincls + " .page-type", function(){
			$(maincls + " .sl-w").val($(this).val());
		});
		
		$(maincls + " .add-code").click(function(){
			if($(maincls + " .sl-w").val() != '' && $(maincls + " .sl-h").val() != '' && $(maincls + " .ani-speed").val() != '' && $(maincls + " .interval").val() != ''){
				$(maincls + ' .temp .nivo-widget').append(addblock());
				updateCode();
				$(maincls + ' .codepane').val($(maincls + ' .temp').html());	
			}else{
				alert("Enter Width, Height, Animation speed and Interval is require to generate code.");
			}
		});
		$(maincls + " .update-code").click(function(){
			if($(maincls + ' .codepane').val() != ""){
				$(maincls + ' .temp').html($(maincls + ' .codepane').val())
			};
			updateCode();
			//console.log($('.masonry .temp').html());
			$(maincls + ' .codepane').val($(maincls + ' .temp').html());
		});

		$(maincls + " .clear-code").click(function(){
			$(maincls + ' .codepane').val(null);
			$(maincls + ' .temp .nivo-widget').html(null);
		});
		$(maincls + " .preview-code").click(function(event){
			updateCode();
			event.preventDefault();
			$(maincls + ' .previewcode-wrp').prepend('<div class="nivojs-previewcode"><div style="max-width:'+$(maincls + " .sl-w").val()+'px;">' + $(maincls + ' .temp').html() + '</div></div>');
			$(maincls + ' .previewcode-wrp .nivo-widget').addClass('nivojs-temp');
			$(maincls + ' .nivojs-previewcode').dialog({
				title: 'Preview of code',
				close: function (event, ui) {
					$(maincls + ' .nivojs-previewcode').html(null);
					$('.ui-dialog, .nivojs-previewcode').remove();
				},
				open: function( event, ui ) {
					nivojs();
				},
				bgiframe: false,
				width: parseInt($(maincls + " .sl-w").val())+50,
				height: parseInt($(maincls + " .sl-h").val())+60,
				resizable: true,
				modal: false
			});
			
			function nivojs(){
				var newCls = '.nivojs-temp';
				$(newCls).wrap( "<div class='slideshow slider-wrapper'></div>" )
				$(newCls).addClass('nivoSlider');

				$(newCls + ' img').load(function(){
					nivoSet();
				});

				var animSpeed 		= parseInt($(newCls).attr('data-animSpeed'));
				var pauseTime 		= parseInt($(newCls).attr('data-pauseTime'));
				var directionNav 	= eval($(newCls).attr('data-directionNav'));
				var controlNav 		= eval($(newCls).attr('data-controlNav'));
				var pauseOnHover 	= eval($(newCls).attr('data-pauseOnHover'));

				function nivoSet(){
					$(newCls).nivoSlider({
						effect: 'random',
						animSpeed: 		animSpeed,
						pauseTime: 		pauseTime,
						directionNav:	directionNav,
						controlNav: 	controlNav,
						pauseOnHover: 	pauseOnHover
					});
				}
			}
		});
	} nivojsMain();
	

	
});
</script>