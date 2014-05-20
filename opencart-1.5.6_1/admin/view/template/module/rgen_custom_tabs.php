<style type="text/css">
.ui-dialog-content > div {
	background: transparent;
}
</style>
<div class="row-fluid">
	<div class="span3" style="width:320px; margin-right:-10px;">
		<div class="well well-small side-form">
			<span class="lbl-1">Tabs style <a class="helpbtn helpbtn-small" data-type="img" data-info="view/image/rgen_theme/tab-styles.gif">?</a></span>
			<select class="t-style">
				<option value="">Default style</option>
				<option value="1">Style 1</option>
				<option value="2">Style 2</option>
				<option value="3">Style 3</option>
				<option value="4">Style 4</option>
				<option value="5">Style 5</option>
			</select>

			<span class="lbl-1">Tab alignment</span>
			<div class="btn-group t-align mb10" data-toggle="buttons-radio">
				<a class="btn btn-mini active" data-val="l">Left</a>
				<a class="btn btn-mini" data-val="c">Center</a>
			</div>

			<span class="lbl-1">Tab title</span>
			<input type="text" class="t-title fw-input">

			<span class="lbl-1">Tab content</span>
			<textarea class="t-content fw-input"></textarea>
			
			<a class="btn btn-small btn-success add-code">Add</a>
			<a class="btn btn-small btn-success update-code">Update</a>
			<a class="btn btn-small preview-code btn-info">Preview</a>
			<a class="btn btn-small clear-code">Clear</a>
		</div>
	</div>
	<div class="span9">
		<div class="temp" style="display:none;"><div class="tab-widget"></div></div>
		<textarea class="codepane"></textarea>
		<div class="previewcode-wrp"></div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){

	function slidejsMain() {
		var maincls = '.tabjs';
		function addCode(){
			
			if ($(maincls + " .temp .tab-widget .tbs").length == 0) {
				$(maincls + " .temp .tab-widget").prepend('\n\t<div class="tbs">\n</div>\n');
			};
			var t = $(maincls + " .t-title").val();
			var c = $(maincls + " .t-content").val();
			$(maincls + " .temp .tbs").append('\t\t<a>'+t+'</a>\n');
			$(maincls + " .temp .tab-widget").append('\t<div class="tbs-pane">'+c+'</div>\n');
		}

		function updateCode(){
			if ($(maincls + " .t-style").val() != '') {
				$(maincls + ' .temp .tab-widget').removeAttr('class');
				$(maincls + ' .temp > div').addClass('tab-widget');
				$(maincls + " .temp .tab-widget").addClass('tbs'+$(maincls + " .t-style").val());
			}else{
				$(maincls + ' .temp .tab-widget').removeAttr('class');
				$(maincls + ' .temp > div').addClass('tab-widget');
			};

			if ($(maincls + " .t-align .active").attr('data-val') == 'c') {
				$(maincls + " .temp .tbs").addClass("tbs-c");
			}else{
				$(maincls + " .temp .tbs").removeClass("tbs-c");
			};
		}
		
		$(maincls + " .add-code").click(function(){
			addCode();
			updateCode();
			$(maincls + ' .codepane').val($(maincls + ' .temp').html());
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
			$(maincls + ' .temp .tab-widget').html(null);
		});

		$(maincls + " .preview-code").click(function(event){
			updateCode();
			//updateCode();
			event.preventDefault();
			$(maincls + ' .previewcode-wrp').prepend('<div class="tabjs-previewcode"><div style="max-width:600px;">' + $(maincls + ' .temp').html() + '</div></div>');
			$(maincls + ' .previewcode-wrp .tab-widget').addClass('tabjs-temp');
			$(maincls + ' .tabjs-previewcode').dialog({
				title: 'Preview of code',
				close: function (event, ui) {
					$(maincls + ' .tabjs-previewcode').html(null);
					$('.ui-dialog, .tabjs-previewcode').remove();
				},
				open: function( event, ui ) {
					tabjs();
				},
				bgiframe: false,
				width:700,
				height: 700,
				resizable: true,
				modal: false
			});
			
			function tabjs(){
				var newCls = '.tabjs-temp';

				var T = 0;
				var CT = 0;
				var CP = 0;
				$('.tabjs-temp').each(function(){
					T++
					var createCls = 'cTab'+T;
					$(this).addClass(createCls);
					
					var newCls = '.cTab'+T + ' .tbs a';
					var newClsPane = '.cTab'+ T + ' .tbs-pane';
					
					
					$(newCls).each(function(){
						CT++
						var tabCls = 'cT'+CT;
						$(this).attr('href', '#'+tabCls);
					});
					
					$(newClsPane).each(function(){
						CP++
						var paneCls = 'cT'+CP;
						$(this).attr('id', paneCls);
					});
					$(newCls).tabs();
				});
			};
		});
	} slidejsMain();
	

	
});
</script>