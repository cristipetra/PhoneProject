<style type="text/css">

</style>
<div class="row-fluid">
	<div class="span3" style="width:320px; margin-right:-10px;">
		<div class="well well-small side-form">
			<span class="lbl-1">Container type <a class="helpbtn helpbtn-small" data-type="img" data-info="view/image/rgen_theme/layout-sizes.png">?</a></span>
			<select class="page-type">
				<option value="700" data-val="700">Normal layout - With column</option>
				<option value="940" data-val="940">Normal layout - column</option>
				<option value="940" data-val="940">Wide layout - With column</option>
				<option value="1180" data-val="1180">Wide layout - Without column</option>
				<option value="custom" data-val="1180">Custom width</option>
			</select>

			<div class="custom-w" style="display:none;">
				<span class="lbl-1">Custom container width</span>
				<input type="text" class="container-w fw-input" value="600">
			</div>

			<span class="lbl-1">Content box style <a class="helpbtn helpbtn-small" data-type="img" data-info="view/image/rgen_theme/contentbox-styles.png">?</a></span>
			<select class="cbox-style">
				<option value="">Default style</option>
				<option value="1">Content box style 1</option>
				<option value="2">Content box style 2</option>
				<option value="3">Content box style 3</option>
				<option value="4">Content box style 4</option>
			</select>

			<span class="lbl-1">Section title</span>
			<input type="text" class="section-hd fw-input" value="">

			<span class="lbl-1">Number of content box in row</span>
			<div class="btn-group bnr-count mb10" data-toggle="buttons-radio">
				<a class="btn btn-mini active" data-val="1">1</a>
				<a class="btn btn-mini" data-val="2">2</a>
				<a class="btn btn-mini" data-val="3">3</a>
				<a class="btn btn-mini" data-val="4">4</a>
				<a class="btn btn-mini" data-val="5">5</a>
				<a class="btn btn-mini" data-val="6">6</a>
			</div>

			<span class="lbl-1">Space after content box</span>
			<div class="btn-group b-space mb10" data-toggle="buttons-radio">
				<a class="btn btn-mini active" data-val="b-10">10</a>
				<a class="btn btn-mini" data-val="b-20">20</a>
				<a class="btn btn-mini" data-val="b-30">30</a>
				<a class="btn btn-mini" data-val="b-40">40</a>
				<a class="btn btn-mini" data-val="b-50">50</a>
				<a class="btn btn-mini" data-val="b-60">60</a>
				<a class="btn btn-mini" data-val="b-70">70</a>
				<a class="btn btn-mini" data-val="b-80">80</a>
			</div>
			

			<table class="subfields">
				<tr>
					<td>
						<span class="lbl-1">Content box title position</span>
						<div class="btn-group hd-pos mb10" data-toggle="buttons-radio">
							<a class="btn btn-mini active" data-val="below">Below image</a>
							<a class="btn btn-mini" data-val="above">Above image</a>
						</div>
					</td>
					<td>
						<span class="lbl-1">Seperator after row</span>
						<div class="btn-group b-sep mb10" data-toggle="buttons-radio">
							<a class="btn btn-mini active" data-val="y">Yes</a>
							<a class="btn btn-mini" data-val="n">No</a>
						</div>
					</td>
				</tr>
			</table>
			
			<span class="lbl-1">Content box title (Optional)</span>
			<input type="text" class="c-box-hd fw-input">
			
			<table class="subfields">
				<tr>
					<td>
						<span class="lbl-1">Image height</span>
						<input type="text" class="bnr-h input-mini" value="160">
					</td>
					<td>
						<span class="lbl-1">Content box image URL (Optional)</span>
						<input type="text" class="c-box-imgurl input-medium" style="width:190px;">
					</td>
				</tr>
			</table>
			

			<span class="lbl-1">Content</span>
			<textarea class="c-box-content fw-input"></textarea>

			<span class="lbl-1">Content box button text</span>
			<input type="text" class="c-box-bttxt fw-input">

			<span class="lbl-1">Content box button URL</span>
			<input type="text" class="c-box-bturl fw-input">
			
			<a class="btn btn-small btn-success add-code">Add</a>
			<a class="btn btn-small btn-success update-code">Update</a>
			<!-- <a class="btn btn-small preview-code btn-info">Preview</a> -->
			<a class="btn btn-small clear-code">Clear</a>
		</div>
	</div>
	<div class="span9">
		<div class="temp" style="height:0px; overflow:hidden;"></div>

		<textarea class="codepane"></textarea>
		<div class="previewcode-wrp"></div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){

	function contentboxMain() {
		var maincls = '.contentboxcode';

		var wrapper =  '<div class="grid-wrp">';
			wrapper += '\n<div class="row">\t</div>\n<div class="mb"></div>';
			wrapper += '\n</div>';

		function addblock(){

			var block  = '\n\t<div class="col">';

				block += '\n\t\t<div class="cbox">';

				var cboxhd = $(maincls+" .c-box-hd").val();
				var cboxcontent = $(maincls+" .c-box-content").val();
				var cboxbtn = $(maincls+" .c-box-bttxt").val();
				var cboxbtnurl = $(maincls+" .c-box-bturl").val();
				var url = $(maincls+" .c-box-imgurl").val();
				
				// CBOX TITLE
				if ($(maincls+" .hd-pos .active").attr('data-val') == "above") {
				if (cboxhd != '') {
				block += '\n\t\t<h2 class="header-4 cbox-hd">'+cboxhd+'</h2>';
				};
				};
				
				// CBOX IMAGE
				if (url != '') {
				block += '\n\t\t<a class="cbox-img" href="'+url+'"></a>';
				}else{
				block += '\n\t\t<span class="cbox-img"></span>';
				};

				// CBOX CONTENT
				block += '\n\t\t<div class="cbox-content">';
				if ($(maincls+" .hd-pos .active").attr('data-val') == "below") {
				if (cboxhd != '') {
				block += '\n\t\t<h2 class="header-4 cbox-hd">'+cboxhd+'</h2>';
				};
				};
				if (cboxcontent != '') {
				block += '\n\t\t'+cboxcontent;
				};
				block += '\n\t\t</div>';

				// CBOX BUTTOM
				if (cboxbtn != '') {
				block += '\n\t\t<div class="btn-bar">';
				block += '\n\t\t<a href="'+cboxbtnurl+'" class="sml-button">'+cboxbtn+'</a>';
				block += '\n\t\t</div>';
				};

				block += '\n\t\t</div>\n';
				block += '\n\t</div>\n';
			return block;
		}
		function containerWidth(){
			if ($(maincls + ' .page-type').val() != "custom"){
				var wrpW = $(maincls + ' .page-type').val();
			}else{
				var wrpW = $(maincls + ' .container-w').val();
			};
			$(maincls + ' .temp').css({ width: wrpW });
			return wrpW;
		}
		function updateCode(){
			$(maincls + ' .temp .grid-wrp').addClass('contentbox'+$(maincls + " .cbox-style").val());
			$(maincls + ' .temp .row').removeAttr('class');
			$(maincls + ' .temp .grid-wrp > div:first').attr('class', 'row col-'+$(maincls + " .bnr-count .active").attr("data-val")+' '+$(maincls + " .b-space .active").attr("data-val"));
			/*$(maincls + ' .temp .row').removeClass('[class^="col-"]').addClass('col-'+$(".bnr-count .active").attr("data-val"));
			$(maincls + ' .temp .row').removeClass('[class^="b-"]').addClass($(".b-space .active").attr("data-val"));*/
			$(maincls + ' .temp').css({ width: containerWidth() });

			var i = 0;
			$(maincls + ' .temp .col').each(function(){
				var w = $(this).find('.cbox-img').width();
				var h = $(maincls + ' .bnr-h').val();
				colorcode = Math.floor(Math.random()*16777215).toString(16);
				$(this).find('.cbox-img').html('<img src="http://placehold.it/'+w+'x'+h+'/'+colorcode+'/ffffff&text='+w+'x'+h+'-'+i+'" />');
			i++; });

			if ($(maincls + " .b-sep .active").attr("data-val") == 'y'){
				$(maincls + ' .temp .mb').addClass('hr');	
			}else{
				$(maincls + ' .temp .mb').removeClass('hr');
			};
			
		}
		$(window).on("change", maincls + ' .page-type', function(){
			if ($(this).val() == "custom") {
				$(maincls + " .custom-w").show();
			}else{
				$(maincls + " .custom-w").hide();
			};
			
		});
		$(maincls + " .add-code").click(function(){
			if($(maincls + ' .temp .row').length == 0){
				$(maincls + ' .temp').html(wrapper);

				var sectionHD = $(maincls+" .section-hd").val();
				if (sectionHD != '') {
				$(".grid-wrp").prepend('\n<h2 class="header-2 cbox-main-hd"><b>'+ sectionHD +'</b></h2>');
				};
			}
			console.log(addblock());
			$(maincls + ' .temp .row').append(addblock());
			updateCode();
			$(maincls + ' .codepane').val($(maincls + ' .temp').html());
		});

		$(maincls + " .clear-code").click(function(){
			$(maincls + ' .codepane').val(null);
			$(maincls + ' .temp').html(null);
		});

		$(maincls + " .update-code").click(function(){
			if($(maincls + ' .codepane').val() != ""){
				$(maincls + ' .temp').html($(maincls + ' .codepane').val())
			};
			updateCode();
			$(maincls + ' .codepane').val($(maincls + ' .temp').html());
		});

		$(maincls + " .preview-code").click(function(event){
			//console.log(parseInt(containerWidth())+50);
			updateCode();
			event.preventDefault();
			$(maincls + ' .previewcode-wrp').prepend('<div class="tabjs-previewcode"><div style="max-width:'+containerWidth()+'px;">' + $(maincls + ' .temp').html() + '</div></div>');
			$(maincls + ' .previewcode-wrp .tab-widget').addClass('tabjs-temp');
			$(maincls + ' .tabjs-previewcode').dialog({
				title: 'Preview of code',
				close: function (event, ui) {
					$(maincls + ' .tabjs-previewcode').html(null);
					$('.ui-dialog, .tabjs-previewcode').remove();
				},
				open: function( event, ui ) {},
				bgiframe: false,
				width: parseInt(containerWidth())+50,
				height: 500,
				resizable: true,
				modal: false
			});
			
		});
	} contentboxMain();
	

	
});
</script>