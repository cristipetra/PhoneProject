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

			<span class="lbl-1">Number of banners in row</span>
			<div class="btn-group bnr-count mb10" data-toggle="buttons-radio">
				<a class="btn btn-mini active" data-val="1">1</a>
				<a class="btn btn-mini" data-val="2">2</a>
				<a class="btn btn-mini" data-val="3">3</a>
				<a class="btn btn-mini" data-val="4">4</a>
				<a class="btn btn-mini" data-val="5">5</a>
				<a class="btn btn-mini" data-val="6">6</a>
				<a class="btn btn-mini" data-val="7">7</a>
				<a class="btn btn-mini" data-val="8">8</a>
				<a class="btn btn-mini" data-val="9">9</a>
				<a class="btn btn-mini" data-val="10">10</a>
			</div>

			<span class="lbl-1">Space after banner row container</span>
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

			<span class="lbl-1">Banner height</span>
			<input type="text" class="bnr-h fw-input" value="160">

			<span class="lbl-1">Seperator after banner row</span>
			<div class="btn-group b-sep mb10" data-toggle="buttons-radio">
				<a class="btn btn-mini active" data-val="y">Yes</a>
				<a class="btn btn-mini" data-val="n">No</a>
			</div>
			
			<span class="lbl-1">Banner URL (Optional)</span>
			<input type="text" class="addurl fw-input">
			
			<a class="btn btn-small btn-success add-code">Add</a>
			<a class="btn btn-small btn-success update-code">Update</a>
			<a class="btn btn-small preview-code btn-info">Preview</a>
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

	function bannersMain() {
		var maincls = '.bannergrid';

		var wrapper =  '<div class="banner-grid">';
			wrapper += '\n<div class="row">\t</div>\n<div class="mb"></div>';
			wrapper += '\n</div>';

		function addblock(){
			var block  = '\n\t<div class="col">';
				var url = $(maincls+" .addurl").val();
				if (url != '') {
				block += '\n\t<a class="bnr" href="'+url+'"></a>';
				}else{
				block += '\n\t<span class="bnr"></span>';
				};
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
			$(maincls + ' .temp .row').removeAttr('class');
			$(maincls + ' .temp .banner-grid > div:first').attr('class', 'row col-'+$(".bnr-count .active").attr("data-val")+' '+$(".b-space .active").attr("data-val"));
			/*$(maincls + ' .temp .row').removeClass('[class^="col-"]').addClass('col-'+$(".bnr-count .active").attr("data-val"));
			$(maincls + ' .temp .row').removeClass('[class^="b-"]').addClass($(".b-space .active").attr("data-val"));*/
			$(maincls + ' .temp').css({ width: containerWidth() });

			var i = 0;
			$(maincls + ' .temp .col').each(function(){
				var w = $(this).find('.bnr').width();
				var h = $('.bnr-h').val();
				colorcode = Math.floor(Math.random()*16777215).toString(16);
				$(this).find('.bnr').html('<img src="http://placehold.it/'+w+'x'+h+'/'+colorcode+'/ffffff&text='+w+'x'+h+'-'+i+'" />');
			i++; });

			if ($(".b-sep .active").attr("data-val") == 'y'){
				$(maincls + ' .temp .mb').addClass('hr');	
			}else{
				$(maincls + ' .temp .mb').removeClass('hr');
			};
			
		}
		$(window).on("change", maincls + ' .page-type', function(){
			if ($(this).val() == "custom") {
				$(".custom-w").show();
			}else{
				$(".custom-w").hide();
			};
			
		});
		$(maincls + " .add-code").click(function(){
			if ($(".bnr-count .active").attr("data-val")) {
				if($(maincls + ' .temp .row').length == 0){
					$(maincls + ' .temp').html(wrapper);
				}
				$(maincls + ' .temp .row').append(addblock());
				updateCode();
				$(maincls + ' .codepane').val($(maincls + ' .temp').html());
			};
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
	} bannersMain();
	

	
});
</script>