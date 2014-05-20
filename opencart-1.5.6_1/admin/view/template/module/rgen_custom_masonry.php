<style type="text/css">
.ui-dialog-content > div {
	background:rgba(0,0,0,0.06);
}
</style>
<div class="alert alert-block">12 Possible blocks in row</div>
<div class="row-fluid">
	<div class="span3" style="width:320px; margin-right:-10px;">
		<div class="well well-small side-form">
			<span class="lbl-1">Page type <a class="helpbtn helpbtn-small" data-type="img" data-info="view/image/rgen_theme/layout-sizes.png">?</a></span>
			<div class="page-type mb10" data-toggle="buttons-radio">
				<a class="btn btn-mini active" data-val="700" data-col="withcol">With column</a>
				<a class="btn btn-mini" data-val="940" data-col="">Without column</a><br>
				<a class="btn btn-mini" data-val="940" data-col="withcol">Wide - With column</a>
				<a class="btn btn-mini" data-val="1180" data-col="">Wide - Without column</a>
			</div>

			<table class="subfields">
				<tr>
					<td>
						<span class="lbl-1">Block width</span>
						<div class="btn-group ms-w mb10" data-toggle="buttons-radio">
							<a class="btn btn-mini active" data-val="1">1</a>
							<a class="btn btn-mini" data-val="2">2</a>
							<a class="btn btn-mini" data-val="3">3</a>
							<a class="btn btn-mini" data-val="4">4</a>
							<a class="btn btn-mini" data-val="5">5</a>
							<a class="btn btn-mini" data-val="6">6</a>
							<a class="btn btn-mini" data-val="7">7</a>
							<a class="btn btn-mini" data-val="8">8</a>
						</div>
						<span class="lbl-1">Block height</span>
						<div class="btn-group ms-h mb10" data-toggle="buttons-radio">
							<a class="btn btn-mini active" data-val="1">1</a>
							<a class="btn btn-mini" data-val="2">2</a>
							<a class="btn btn-mini" data-val="3">3</a>
							<a class="btn btn-mini" data-val="4">4</a>
							<a class="btn btn-mini" data-val="5">5</a>
							<a class="btn btn-mini" data-val="6">6</a>
							<a class="btn btn-mini" data-val="7">7</a>
							<a class="btn btn-mini" data-val="8">8</a>
						</div>
					</td>
					
				</tr>
			</table>

			<span class="lbl-1">Gutter between blocks <a class="helpbtn helpbtn-small" data-type="img" data-info="view/image/rgen_theme/masonry-help1.png">?</a></span>
			<div class="btn-group gutt mb10" data-toggle="buttons-radio">
				<a class="btn btn-mini active" data-val="g1">1px</a>
				<a class="btn btn-mini" data-val="g2">2px</a>
				<a class="btn btn-mini" data-val="g4">4px</a>
				<a class="btn btn-mini" data-val="g6">6px</a>
				<a class="btn btn-mini" data-val="g8">8px</a>
				<a class="btn btn-mini" data-val="g10">10px</a>
				<a class="btn btn-mini" data-val="g15">15px</a>
				<a class="btn btn-mini" data-val="g20">20px</a>
			</div>

			<span class="lbl-1">Full URL(Optional)</span>
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
		<div class="temp" style="display:none;"><div class="masonry-wrp"></div></div>
		<textarea class="codepane"></textarea>
		<div class="previewcode-wrp"></div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	function masonryMain() {
		var maincls = '.masonry';
		$('.masonry [title]').tooltip();

		function addblock(){
			var w = $(maincls + " .ms-w .active").attr("data-val");
			var h = $(maincls + " .ms-h .active").attr("data-val");
			
			var cphd = $(maincls + " .cphd").val();
			var cptext = $(maincls + " .cptext").val();
			var btntext = $(maincls + " .btntext").val();
			var btnurl = $(maincls + " .btnurl").val();
			if (cphd != ''){ var cp1  = "<h4 class='mcp-title'>"+cphd+"</h4>"; }else{ var cp1  = ""; }
			if (cptext != ''){ var cp2  = "<div class='mcp-content'>"+cptext+"</div>"; }else{ var cp2  = ""; }
			if (btnurl != ''){ var cp3  = "<a class='mcp-button' href='"+btnurl+"'>"+btntext+"</a>"; }else{ var cp3  = ""; }

			if (cphd != '' || cptext != '' || btnurl != ''){
				var setcaption = 'data-caption="'+cp1+cp2+cp3+'"';
			}else{
				var setcaption = '';
			};
			if (w != 1) { var colspan = " data-ss-colspan='"+w+"'"; }else{ var colspan = ""; };
			if (h != 1) { var rowspan = " data-ss-rowspan='"+h+"'"; }else{ var rowspan = ""; };

			var block  = '\n\t<div'+rowspan+colspan+' class="masonry-item" '+setcaption+'>';
				var url = $(".masonry .addurl").val();
				if (url != '') {
				block += '\n\t<a class="imgblock" href="'+url+'"></a>';
				}else{
				block += '\n\t<span class="imgblock"></span>';
				};
				block += '\n\t</div>\n';
			return block;
		}
		function updateCode(){
			//$(maincls + ' .temp .masonry-wrp').find('.masonry-item:first').addClass('grid-sizer');
			$(maincls + ' .temp .masonry-wrp').removeClass('withcol').addClass($(".page-type .active").attr("data-col"));
			$(maincls + ' .temp .masonry-wrp').removeClass('g1').removeClass('g2').removeClass('g4').removeClass('g6').removeClass('g8').removeClass('g10').removeClass('g15').removeClass('g20');
			$(maincls + ' .temp .masonry-wrp').addClass($(".gutt .active").attr("data-val")).attr("data-g",$(".gutt .active").attr("data-val"));
			var i = 0;
			$(maincls + ' .temp .masonry-item').each(function(){
				colorcode = Math.floor(Math.random()*16777215).toString(16);
				$(this).find('.imgblock').html('<img src="http://placehold.it/'+$(this).outerWidth()+'x'+$(this).outerHeight()+'/'+colorcode+'/ffffff&text='+$(this).outerWidth()+'x'+$(this).outerHeight()+'-'+i+'" />');
			i++; });
		}

		$(maincls + " .add-code").click(function(){
			$(maincls + ' .temp .masonry-wrp').append(addblock());
			updateCode();
			$(maincls + ' .codepane').val($('.masonry .temp').html());
		});
		$(maincls + " .update-code").click(function(){
			if($(maincls + ' .codepane').val() != ""){
				$(maincls + ' .temp').html($(maincls + ' .codepane').val())
			};
			updateCode();
			$(maincls + ' .codepane').val($('.masonry .temp').html());
		});

		$(maincls + " .clear-code").click(function(){
			$(maincls + ' .codepane').val(null);
			$(maincls + ' .temp .masonry-wrp').html(null);
		});

		$(window).on("click", maincls + " .page-type .btn", function(){
			if($(this).text() == "Wide - Without column" || $(this).text() == "Wide - With column"){
				$(maincls + " .temp").addClass("wide-ly");
			}else{
				$(maincls + " .temp").removeClass("wide-ly");
			}
		});

		$(maincls + " .preview-code").click(function(event){
			event.preventDefault();
			$(maincls + ' .previewcode-wrp').prepend('<div class="masonry-previewcode"><div class="'+$(maincls + " .temp").attr("class")+'" style="max-width:'+$(".page-type .active").attr("data-val")+'px;">' + $('.masonry .temp').html() + '</div></div>');
			$(maincls + ' .previewcode-wrp .masonry-wrp').addClass('masonry-temp');
			$(maincls + ' .masonry-previewcode').dialog({
				title: 'Preview of code',
				close: function (event, ui) {
					$(maincls + ' .masonry-previewcode').html(null);
					$('.ui-dialog, .masonry-previewcode').remove();
				},
				open: function( event, ui ) {
					masonry();
				},
				bgiframe: false,
				width: parseInt($(".page-type .active").attr("data-val"))+50,
				height: 600,
				resizable: true,
				modal: false
			});
			
			function masonry(){

				var newCls = '.masonry-temp';
				$(newCls).css({opacity:0});
				$(newCls).wrap('<div class="masonry-container '+$(newCls).attr("data-g")+'wrp"></div>');
				var gutter = $(newCls).attr("data-g");
					gutter = parseInt(gutter.replace("g",""));

				$(newCls).animate({opacity:1}, 100, function(){
					masonrySet();
					$(newCls).collageCaption({
						'background' : "",
						'cssClass' : "masonry-caption",
						'opacity' : "1"
					});
				});

				var resizeTimer = null;
				$(window).on('resize', function() {
					$(newCls).css("opacity", 0);
					$(".ss-container").trigger("ss-destroy");
					if (resizeTimer) clearTimeout(resizeTimer);
					resizeTimer = setTimeout(masonrySet, 100);
					$(newCls).css("opacity", 1);
				});

				function masonrySet(){
					$(newCls).shapeshift({gutterX: gutter, gutterY: gutter, paddingX: 0, paddingY:0, enableDrag: false, minColumns: 5 });
				}
			}
		});
	}
	masonryMain();

	
});
</script>