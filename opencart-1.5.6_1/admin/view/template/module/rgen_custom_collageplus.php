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
						<span class="lbl">Image width</span>
						<input type="text" class="input-mini cl-w" value="300">
					</td>
					<td>
						<span class="lbl">Image height</span>
						<input type="text" class="input-mini cl-h" value="200">
					</td>
				</tr>
				<tr>
					<td>
						<span class="lbl">Row height</span>
						<input type="text" class="input-mini row-h" placeholder="200" value="200">
					</td>
					<td>
						<span class="lbl">Space between images</span>
						<input type="text" class="input-mini pad" placeholder="10" value="10">
					</td>
				</tr>
			</table>

			<span class="lbl-1">Slide URL(Optional)</span>
			<input type="text" class="addurl fw-input">

			<span class="lbl-1">Caption title</span>
			<input type="text" class="cphd input-small fw-input">

			<span class="lbl-1">Caption text</span>
			<input type="text" class="cptext fw-input">

			<table class="subfields">
				<tr>
					<td>
						<span class="lbl">Button text</span>
						<input type="text" class="btntext input-small" style="width:60px;">
					</td>
					<td>
						<span class="lbl-1">Button URL</span>
						<input type="text" class="btnurl" style="width:190px;">
					</td>
				</tr>
			</table>

			<a class="btn btn-small btn-success add-code">Add</a>
			<a class="btn btn-small btn-success update-code">Update</a>
			<a class="btn btn-small preview-code btn-info">Preview</a>
			<a class="btn btn-small clear-code">Clear</a>
		</div>
	</div>
	<div class="span9">
		<div class="temp" style="display:none;"><div class="Collage"></div></div>
		<textarea class="codepane"></textarea>
		<div class="previewcode-wrp"></div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){

	function collagejsMain() {
		var maincls = '.collageplusjs';

		function addblock(){
			var count		= $(maincls + ' .temp .Collage > div').length + 1;
			var w 			= $(maincls + " .cl-w").val();
			var h 			= $(maincls + " .cl-h").val();

			var cphd = $(maincls + " .cphd").val();
			var cptext = $(maincls + " .cptext").val();
			var btntext = $(maincls + " .btntext").val();
			var btnurl = $(maincls + " .btnurl").val();
			if (cphd != ''){ var cp1  = "<h4 class='clg-title'>"+cphd+"</h4>"; }else{ var cp1  = ""; }
			if (cptext != ''){ var cp2  = "<div class='clg-content'>"+cptext+"</div>"; }else{ var cp2  = ""; }
			if (btnurl != ''){ var cp3  = "<a class='clg-button' href='"+btnurl+"'>"+btntext+"</a>"; }else{ var cp3  = ""; }

			if (cphd != '' || cptext != '' || btnurl != ''){
				var setcaption = 'data-caption="'+cp1+cp2+cp3+'"';
			}else{
				var setcaption = '';
			};
			
			colorcode = Math.floor(Math.random()*16777215).toString(16);

			var block  = '\n\t<div '+setcaption+'>';
				var url = $(maincls + " .addurl").val();
				if (url != '') {
				block += '\n\t<a href="'+url+'"><img src="http://placehold.it/'+w+'x'+h+'/'+colorcode+'/ffffff&text='+w+'x'+h+' - Slide '+count+'" /></a>';
				}else{
				block += '\n\t<img src="http://placehold.it/'+w+'x'+h+'/'+colorcode+'/ffffff&text='+w+'x'+h+' - Slide '+count+'" />';
				};
				block += '\n\t</div>\n';
			return block;
			
		}
		function updateCode(){
			var w 			= $(maincls + " .cl-w").val();
			var h 			= $(maincls + " .cl-h").val();
			var rowH 		= $(maincls + " .row-h").val();
			var pad 		= $(maincls + " .pad").val();
			
			$(maincls + ' .temp .Collage').removeAttr('row-height').removeAttr('data-padding');
			$(maincls + ' .temp .Collage').attr({
				'row-height': rowH,
				'data-padding': pad
			});
			$(maincls + ' .temp .Collage').css({
				padding: pad+'px',
				marginLeft: -pad+'px',
				marginRight: -pad+'px'
			});

		}
		
		$(maincls + " .add-code").click(function(){
			if($(maincls + " .cl-w").val() != '' && $(maincls + " .cl-h").val() != '' && $(maincls + " .row-h").val() != ''){
				$(maincls + ' .temp .Collage').append(addblock());
				updateCode();
				$(maincls + ' .codepane').val($(maincls + ' .temp').html());	
			}else{
				alert("Enter Width, Height, and Row height is require to generate code.");
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
			$(maincls + ' .temp .Collage').html(null);
			var i = 0;
		});
		$(maincls + " .preview-code").click(function(event){
			updateCode();
			event.preventDefault();
			$(maincls + ' .previewcode-wrp').prepend('<div class="collagejs-previewcode"><div style="max-width:'+$(maincls + " .page-type").val()+'px;">' + $(maincls + ' .temp').html() + '</div></div>');
			$(maincls + ' .previewcode-wrp .Collage').addClass('collagejs-temp');
			$(maincls + ' .collagejs-previewcode').dialog({
				title: 'Preview of code',
				close: function (event, ui) {
					$(maincls + ' .collagejs-previewcode').html(null);
					$('.ui-dialog, .collagejs-previewcode').remove();
				},
				open: function( event, ui ) {
					collagejs();
				},
				bgiframe: false,
				width: parseInt($(maincls + " .page-type").val())+50,
				height: 600,
				resizable: true,
				modal: false
			});
			
			function collagejs(){
				var newCls = '.collagejs-temp';
				$(newCls).children("div").addClass("Image_Wrapper");
				$(newCls).children("div").css({display:"none"});

				$(newCls).find(".Image_Wrapper").css({display:"inline-block"});
				collage();
				$(newCls).collageCaption({
					'background' : "",
					'cssClass' : "clg-caption",
					'opacity' : "1"
				});

				function collage(){
					console.log(parseInt($(newCls).attr('row-height')));
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
			}
		});
	} collagejsMain();
	

	
});
</script>