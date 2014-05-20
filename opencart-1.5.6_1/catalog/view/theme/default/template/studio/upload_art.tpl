<style type="text/css">
ul.upload_art_ul {
	list-style: none; 
	padding: 0; 
	margin: 10px 0; 
	overflow: auto;
	max-height: 280px;
}
	
ul.upload_art_ul li > div {
	cursor: pointer;
}
ul.upload_art_ul li > div > div {
	width: 24px; 
	height:24px; 
	display: block;
	margin: 5px;
}

#art_upload_step_3 div.ui-state-highlight {
 background: none #00FF00;
 border: 1px solid #008A00;
}
</style>
<div id="dialog_art_upload"style="width:900px;">
	<div id="art_upload_step_1">
		<h3><?php echo $heading_title; ?></h3>
		<p><?php echo $text_copyright; ?><p>
		<div style="margin: 20px; text-align: right;">
			<a class="button" onclick="$('#art_upload_step_1').hide(); $('#art_upload_step_2').show();  "><?php echo $button_agree; ?></a>
			<a class="button" onclick="closePopUp(); "><?php echo $button_cancel; ?></a>
		</div>
	</div>
	<div id="art_upload_step_2" style='display:none; '>
		<h3><?php echo $heading_title; ?></h3>
		<p><?php echo $text_browse; ?></p>
		<div style="margin: 20px; text-align: right;">
			<input id="image_file_upload" name="image_file_upload" type="file" />
		</div>
	</div>
	<div id="art_upload_step_3" style='display:none; '>
		<h3><?php echo $heading_title; ?></h3>
		<div style="position:absolute; top: 0px; right: 0px; padding: 20px; text-align: right;">
			<a class="button" onclick="studioAddBitmap($('#upload_art_id_bitmap').val(), $('#upload_art_source').val(), getSelectedColors(), getHiddenColors()); closePopUp(); "><?php echo $button_apply; ?></a>
			<a class="button" onclick="$('#art_upload_step_3').hide(); $('#art_upload_step_2').show(); "><?php echo $button_change_image; ?></a>
			<a class="button" onclick="closePopUp(); "><?php echo $button_cancel; ?></a>
		</div>
		<?php echo $text_select_colors; ?><br />
		<input type="hidden" value="" id="upload_art_id_bitmap" /> 
		<input type="hidden" value="" id="upload_art_source" />
		<div style="float:left;">
			<div id="upload_art_thumb" />
		</div>
		<div style="float:right; width: 390px;">
			<div style="margin-bottom: 25px;">
				<div style="padding: 5px 0px; "><?php echo $text_background; ?></div>
				<a class="button" id="button_remove_color" onclick="removeSelectedColor() "><?php echo $button_remove_color; ?></a>
				<a class="button" id="button_cancel_remove_color" onclick="cancelRemove()"><?php echo $button_cancel_remove_color; ?></a>
				<input type="hidden" id="selected_color_to_remove" value="" />
				<span id="span_remove" style="display: inline-block; width:40px; height: 30px; border: solid 1px #000; vertical-align: top;  ">&nbsp;</span>
			</div>
			<div><?php echo $text_below_colors; ?></div>
			<ul class="upload_art_ul">
			<?php foreach ($colors as $color_detail) { ?>
				<li style="float:left; margin: 5px;"><div class="ui-wdget-content ui-corner-all ui-state-default " onclick="$(this).toggleClass('ui-state-highlight')"><div class="ui-wdget-content ui-corner-all" style="background-color: #<?php echo $color_detail['hexa'] ?>; " title="<?php echo $color_detail['name'] ?>" color="<?php echo $color_detail['id_design_color'] ?>" /></div></li>
			<?php } ?>
			</ul> 
		</div>
		
		
	</div>

</div>

<script type="text/javascript"><!--
function initStep3() {
	$("#button_remove_color").show();
	$("#button_cancel_remove_color").hide();
	$("#selected_color_to_remove").val('');
	$("#span_remove").css("background-color", "");
	$("#span_remove").text("N/A");

}
function removeSelectedColor() {
	swfobject.getObjectById("eyeDropper").removeColor($('#selected_color_to_remove').val());
	$("#button_remove_color").hide();
	$("#button_cancel_remove_color").show();
}
function cancelRemove() {
	swfobject.getObjectById('eyeDropper').cancelLastRemove();
	initStep3();
}
function onColorSelected(color) {
	$('#selected_color_to_remove').val(color);
	var hex = Number(color).toString(16);
	while (hex.length < 6) {
        hex = "0" + hex;
    }
	$("#span_remove").css("background-color", "#" +hex);	
	$("#span_remove").text("");
}
function getSelectedColors() {
	var colors = new Array();
	$('ul.upload_art_ul').find('div.ui-state-highlight').each(function (i) {
		colors.push($(this).children('div').attr('color'));		
	});
	return colors;
}
function getHiddenColors() {
	var colors = new Array();
	if($("#selected_color_to_remove").val()!="") {
		colors.push($("#selected_color_to_remove").val());
	}
	return colors;
}
function onEyeDropperReady() {
	centerPopUp();
	swfobject.getObjectById("eyeDropper").setSource($('#upload_art_source').val());
}


$(document).ready(function() {

	// For version detection, set to min. required Flash Player version, or 0 (or 0.0.0), for no version detection. 
	var swfVersionStr = "10.0.0";
	// To use express install, set to playerProductInstall.swf, otherwise the empty string. 
	var xiSwfUrlStr = "catalog/view/javascript/swfobject/playerProductInstall.swf";
	var flashvars = {};
	var params = {};
	params.quality = "high";
	params.allowscriptaccess = "sameDomain";
	params.allowfullscreen = "true";
	params.wmode = "transparent";
	params.scale = "noscale";
	var attributes = {};
	attributes.id = "eyeDropper";
	attributes.name = "eyeDropper";
	swfobject.embedSWF(
			"catalog/view/theme/default/template/studio/EyeDropper.swf", "upload_art_thumb", 
			"500", "460", 
			swfVersionStr, xiSwfUrlStr, 
			flashvars, params, attributes);

   $('.button').button();

   $('#image_file_upload').uploadify({
		'uploader'  : 'catalog/view/javascript/uploadify/uploadify.swf',
		'script'    : 'index.php?route=studio/upload_art/upload_image',
		'cancelImg' : 'catalog/view/javascript/uploadify/cancel.png',
		'scriptData'  : {session_id: "<?php echo session_id(); ?>"},
		'buttonText': '<?php echo $button_upload; ?>',
		'auto'      : true,
		'fileDataName' : 'file',
		'method'      : 'POST',
		'fileExt'     : '*.jpg;*.png;*.gif',
		'fileDesc'    : 'Image Files',
		'onComplete'  : function(event, ID, fileObj, response, data) {
			var obj = jQuery.parseJSON( response );
			if(!obj.error) {
				initStep3();
				$('#upload_art_id_bitmap').val(obj.id_bitmap); 
				$('#upload_art_source').val(obj.file_original);
				$('#art_upload_step_2').hide(); 
				$('#art_upload_step_3').show();
				if(swfobject.getObjectById("eyeDropper")) {
					onEyeDropperReady();
				}

				
				//studioAddBitmap(obj.id_bitmap, obj.file_original);
				//closePopUp();

			} else {
				alert(obj.error);
			}
		},
		'onError'     : function (event,ID,fileObj,errorObj) {
		  alert(errorObj.type + ' Error: ' + errorObj.info);
		}
	});


});

//--></script> 