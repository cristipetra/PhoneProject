<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="view/stylesheet/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/rgenadmin.css" />

<style type="text/css">
@font-face {
font-family: 'rgenregular';
src: url('../catalog/view/theme/rgen-opencart/image/rgen/icons/rgen-webfont.eot');
src: url('../catalog/view/theme/rgen-opencart/image/rgen/icons/rgen-webfont.eot?#iefix') format('embedded-opentype'),
	 url('../catalog/view/theme/rgen-opencart/image/rgen/icons/rgen-webfont.woff') format('woff'),
	 url('../catalog/view/theme/rgen-opencart/image/rgen/icons/rgen-webfont.ttf') format('truetype'),
	 url('../catalog/view/theme/rgen-opencart/image/rgen/icons/rgen-webfont.svg#rgenregular') format('svg');
font-weight: normal;
font-style: normal;
}
.blockMsg { top: 15% !important; background: url(view/image/rgen_theme/ajax-loader.gif) no-repeat center 25px;  }
.rgen-sd-td-mod #main-tabs .brand { width: 140px; }
.rgen-sd-td-mod [data-theme="tab1"].tabs-left > .nav-tabs { width: 190px; }
.rgen-sd-td-mod #module-add { width: 130px; }
</style>
<script type="text/javascript" src="../catalog/view/theme/rgen-opencart/js/plugins.js"></script>
<?php if(!$checkPermission){ ?>
<input type="hidden" id="permission" val="demo">
<?php } ?>

<div class="content-wrp">
<div id="content" class="rgen-megamenu-mod rgen-sd-td-mod" style="opacity:0">
	<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
	</div>
	<?php if ($error_warning) { ?>
	<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
	<div class="box" id="main-wrapper">
		<!-- MAIN TABS START -->
		<div class="navbar" id='main-tabs'>
			<div class="navbar-inner">
				<span class="brand">R.Gen Theme<b><?php if (isset($version)) { echo $version; }else{ echo $ver; } ?></b></span>
				<ul class="nav">
					<li class="active"><a href="#main-tb-1">MEGA MENU</a></li>
				</ul>
				<div class="buttons pull-right" style="margin-top: 7px; margin-right: -5px;">
					<span style="margin-top: 7px; margin-right: 10px; vertical-align: middle; display: inline-block; font-weight: bold;">Mega menu status</span>
					<?php 
						$megamenuStatus =  $this->config->get('rgen_megamenu_status');
						$dbKey 	= isset($megamenuStatus) ? $megamenuStatus : '0';
						$name	= 'rgen_megamenu_status[rgen_megamenu_status]';
						$id		= 'rgen_megamenu_status';
					?>
					<span class="switch megamenu-status" style="margin-right:15px; margin-top: 7px;">
						<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
						<label for="<?php echo $id; ?>" class="switch-img"></label>
						<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
					</span>
					<a onclick="location = '<?php echo $cancel; ?>';" class="btn">Back</a>
				</div>
			</div>
		</div>

		<form id="form" enctype="multipart/form-data">
			<div class='tab-content main-panes'>
				<div id="main-tb-1" class="tab-pane active">
					<div class="tabs-left tabbable main-sd-tb-wrp" data-theme="tab1">
						<a class='btn btn-success btn-large create-btn' id="module-add"><i class="icon-plus icon-white"></i> <?php echo $button_add_module; ?></a>
						<ul id="main-sd-tb" class="nav nav-tabs">
							<?php $i = 0; foreach ($modules as $module) { ?>
							<li class="tab-module">
								<span class='btn btn-danger btn-mini mod-remove' data-mod="<?php echo $module['mod_id']; ?>">&times;</span>
								<a data-tab="#tab-module" data-id="<?php echo $module['mod_id']; ?>" data-url="index.php?route=module/rgen_megamenu/getmodule&token=<?php echo $token; ?>&mod_name=<?php echo $module['mod_id']; ?>">
									<?php if(isset($module['menu_name']) && $module['menu_name'] != "") { ?>
									<b><?php echo $module['menu_name']; ?></b>
									<?php } else { ?>
									<b>Menu item <?php echo $i; ?></b>
									<?php } ?>
								</a>
							</li>
							<?php $i++; } ?>
						</ul>
						<div class="tab-content mod-wrp" style="min-height:800px;">
							<?php //echo "<pre style='color:;'>" . print_r($rgen_customprds, TRUE) . "</pre>"; ?>
							<div id="mod-data"></div>
							<div id="mod-create"></div>
						</div>
					</div>
				</div>
			</div>
		</form>
		
	</div>
</div>
</div>

<!-- Clone data -->
<table style="display:none;">
	<tbody class="menuitem-clone">
		<tr class="menuitem-clone menuitem-data">
			<td>
				<?php foreach ($languages as $language) { ?>
				<?php $placeholder	= $language['name'] . ' - Enter name';?>
				<input data-clone="name<?php echo $language['language_id'] ?>" type="text" style="background:url(view/image/flags/<?php echo $language['image']; ?>) no-repeat 225px 8px; padding-right: 40px;" placeholder="<?php echo $placeholder; ?>" name="" value=""><br>
				<?php } ?>
			</td>
			<td>
				<input data-clone="url" type="text" placeholder="URL" name="" value="">
			</td>
			<td class="tc">
				<?php $ar 	= array( 'Yes' => 'y', 'No' => 'n'); ?>
				<div class="btn-group mr10" data-toggle="buttons-radio">
					<?php foreach ($ar as $key => $value) { ?>
						<?php ($value ==  'n') ? $selected = ' active' : $selected=''; ?>
						<label for=""  type="button" class="btn-small btn<?php echo $selected; ?>">
							<input data-clone="open" type="radio" id="" name="" value="<?php echo $value; ?>" <?php if ($value == 'n') { ?>checked="checked"<?php }?>>
							<?php echo $key; ?>
						</label>
					<?php } ?>
				</div>
			</td>
			<td class="tc">
				<a class="btn btn-danger menuitem-remove btn-mini"><i class="icon-remove icon-white"></i></a>
			</td>
		</tr>
	</tbody>

	<tbody>
		<tr class="level1-clone level1-data l2">
			<td>
				<?php foreach ($languages as $language) { ?>
				<?php $placeholder	= $language['name'] . ' - Enter name'; ?>
				<input data-clone="level1_name<?php echo $language['language_id'] ?>" type="text" style="background:url(view/image/flags/<?php echo $language['image']; ?>) no-repeat 225px 8px #fff; padding-right: 40px;" placeholder="<?php echo $placeholder; ?>" value=""><br>
				<?php } ?>
			</td>
			<td>
				<input data-clone="level1_url" type="text" placeholder="URL" value="">
			</td>
			<td class="tc">
				<?php $ar 	= array( 'Yes' => 'y', 'No' => 'n'); ?>
				<div class="btn-group" data-toggle="buttons-radio">
					<?php foreach ($ar as $key => $value) { ?>
						<?php ($value ==  'n') ? $selected = ' active' : $selected=''; ?>
						<label for=""  type="button" class="btn-small btn<?php echo $selected; ?>">
							<input data-clone="level1_open" type="radio" value="<?php echo $value; ?>" <?php if ($value == 'n') { ?>checked="checked"<?php }?>>
							<?php echo $key; ?>
						</label>
					<?php } ?>
				</div>
			</td>
			<td class="tc"><a class="btn level1-remove btn-mini"><i class="icon-remove"></i></a></td>
			<td class="tc"></td>
		</tr>
		<tr class="submenu-clone l1">
			<td>
				<?php foreach ($languages as $language) { ?>
				<?php $placeholder	= $language['name'] . ' - Enter name';
				?><input data-clone="sub_name<?php echo $language['language_id'] ?>" type="text" style="background:url(view/image/flags/<?php echo $language['image']; ?>) no-repeat 225px 8px #fff; padding-right: 40px;" placeholder="<?php echo $placeholder; ?>" name="" value=""><br>
				<?php } ?>
			</td>
			<td>
				<input data-clone="sub_url" type="text" placeholder="URL">
			</td>
			<td class="tc">
				<?php $ar 	= array( 'Yes' => 'y', 'No' => 'n'); ?>
				<div class="btn-group" data-toggle="buttons-radio">
					<?php foreach ($ar as $key => $value) { ?>
						<?php ($value ==  'n') ? $selected = ' active' : $selected=''; ?>
						<label type="button" class="btn-small btn<?php echo $selected; ?>">
							<input data-clone="sub_open" type="radio" value="<?php echo $value; ?>" <?php if ($value == 'n') { ?>checked="checked"<?php }?>>
							<?php echo $key; ?>
						</label>
					<?php } ?>
				</div>
			</td>
			<td class="tc">
				<a class="btn btn-success level1-add btn-mini"><i class="icon-plus icon-white"></i></a>
			</td>
			<td class="tc">
				<a class="btn btn-danger submenu-remove btn-mini"><i class="icon-remove icon-white"></i></a>
			</td>
		</tr>
	</tbody>
</table>
<script src="view/javascript/rgen/bootstrap.min.js"></script>
<script src="view/javascript/rgen/rgenadmin.js"></script>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script>
<script src="view/javascript/rgen/jquery.blockUI.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	
	$(window).on("change", ".menuTypes select", function() {
		$(".menu-container").hide();
		$("#"+$(this).val()).show();
		$('.mod-data-wrp').attr('data-menu', $(this).val());
		//console.log($(this).find('option:selected').text());
		$(".menu-title").text($(this).find('option:selected').text());
	});

	/*	Menu items
	*******************************/
	$(window).off( "click", "#menu_items .menuitem-add");
	$(window).on("click", "#menu_items .menuitem-add", function(){
		var mainNode = $(".mod-data-wrp").attr("data-node");
		var menuitem = $('#menu_items tbody tr').last().attr("id") ? $('#menu_items tbody tr').last().attr("id") : "menuitem-0";
			menuitem = parseInt(menuitem.replace("menuitem-",""));
			menuitem++;
			
		// Create clone
		if ($('#menu_items tbody tr').length > 0) {
			var menuitemClone = $("#menu_items tbody tr:first").html();
		}else{
			var menuitemClone = $('.menuitem-clone').html();
		};
		$("#menu_items tbody").append('<tr id="menuitem-'+menuitem+'" class="menuitem-data">'+menuitemClone+'</tr>');
		// Reset data
		$('#menuitem-'+menuitem+' input[type=\'text\'], #menuitem-'+menuitem+' input[type=\'hidden\'], #menuitem-'+menuitem+' select').val('');
		$('#menuitem-'+menuitem+' input[value=\'n\']').attr('checked', true).parent().addClass('active').prev().removeClass('active');
		
		<?php foreach ($languages as $language) { ?>
		$('#menu_items #menuitem-'+menuitem+' [data-clone="name<?php echo $language['language_id'] ?>"]').attr("name", mainNode+'[menuitems]['+menuitem+'][name][<?php echo $language['language_id'] ?>]');
		<?php } ?>
		$('#menu_items #menuitem-'+menuitem+' [data-clone="url"]').attr("name", mainNode+'[menuitems]['+menuitem+'][url]');
		$('#menu_items #menuitem-'+menuitem+' [data-clone="open"]').attr("name", mainNode+'[menuitems]['+menuitem+'][open]');
	});
	
	$(window).off( "click", "#menu_items .menuitem-remove");
	$(window).on("click", "#menu_items .menuitem-remove", function(){
		if ($("#menu_items tbody > tr").length > 1) {
			$(this).closest(".menuitem-data").remove();
		};
	});

	/*	Drop down
	*******************************/
	$(window).off( "click", "#dropdown .submenu-add");
	$(window).on("click", "#dropdown .submenu-add", function(){
		var mainNode = $(".mod-data-wrp").attr("data-node");
		var i = $('#dropdown .submenu-data').last().attr("id") ? $('#dropdown .submenu-data').last().attr("id") : 'submenu-0';
			i = parseInt(i.replace("submenu-",""));
			i++;
			
		// Create clone
		if ($('#dropdown .submenu-data').length > 0) {
			var submenuClone = $("#dropdown .submenu-data > tr:first").html();
		}else{
			var submenuClone = $('.submenu-clone').html();
		};
		$("#dropdown .table").append('<tbody class="submenu-data" id="submenu-'+i+'" data-subid="'+i+'"><tr class="l1">'+submenuClone+'</tr></tbody>');

		// Reset data
		$('#submenu-'+i+' input[type=\'text\'], #submenu-'+i+' input[type=\'hidden\'], #submenu-'+i+' select').val('');
		$('#submenu-'+i+' input[value=\'n\']').attr('checked', true).parent().addClass('active').prev().removeClass('active');

		<?php foreach ($languages as $language) { ?>
		$('#submenu-'+i+' [data-clone="sub_name<?php echo $language['language_id'] ?>"]').attr("name", mainNode+'[dropdown][submenu]['+i+'][name][<?php echo $language['language_id'] ?>]');
		<?php } ?>
		$('#submenu-'+i+' [data-clone="sub_url"]').attr("name", mainNode+'[dropdown][submenu]['+i+'][url]');
		$('#submenu-'+i+' [data-clone="sub_open"]').attr("name", mainNode+'[dropdown][submenu]['+i+'][open]');
		$('#submenu-'+i+' .btn-group [value="y"]').attr("id",'dd_submenu_open'+i+'y').parent().attr("for",'dd_submenu_open'+i+'y');
		$('#submenu-'+i+' .btn-group [value="n"]').attr("id",'dd_submenu_open'+i+'n').parent().attr("for",'dd_submenu_open'+i+'n');
	});
	$(window).off( "click", "#dropdown .submenu-remove");
	$(window).on("click", "#dropdown .submenu-remove", function(){
		$(this).closest(".submenu-data").remove();
	});

	$(window).off( "click", "#dropdown .level1-add");
	$(window).on("click", "#dropdown .level1-add", function(){
		var mainNode = $(".mod-data-wrp").attr("data-node");
		var parentID = $(this).closest(".submenu-data").attr("id");
		var subid = parseInt($('#'+parentID).attr("data-subid") ? $('#'+parentID).attr("data-subid") : 0);
		var levelid = parseInt($('#'+parentID+' .level1-data').last().attr("data-levelid") ? $('#'+parentID+' .level1-data').last().attr("data-levelid") : 0);
			levelid++;
			j = "submenu-"+subid+"-level1-"+levelid;
		
		if ($('#'+parentID+' .level1-data').length > 0) {
			var level1Clone = $('#'+parentID+' .level1-data').first().html();
		}else{
			var level1Clone = $('.level1-clone').html();
		};
		$('#'+parentID).append('<tr id="'+j+'" data-levelid="'+levelid+'" class="level1-data l2">'+level1Clone+'</tr>');

		// Reset data
		$('#'+parentID+' #'+j+' input[type=\'text\'], #'+parentID+' #'+j+' input[type=\'hidden\'], #'+parentID+' #'+j+' select').val('');
		$('#'+parentID+' #'+j+' input[value=\'n\']').attr('checked', true).parent().addClass('active').prev().removeClass('active');
		//$('#'+parentID+' #'+j+' input[value=\'n\']').attr('checked', true).parent().addClass('active').prev().removeClass('active');

		<?php foreach ($languages as $language) { ?>
		$('#'+parentID+' #'+j+' [data-clone="level1_name<?php echo $language['language_id'] ?>"]').attr("name", mainNode+'[dropdown][submenu]['+subid+'][level1]['+levelid+'][name][<?php echo $language['language_id'] ?>]');
		<?php } ?>
		$('#'+parentID+' #'+j+' [data-clone="level1_url"]').attr("name", mainNode+'[dropdown][submenu]['+subid+'][level1]['+levelid+'][url]');
		$('#'+parentID+' #'+j+' [data-clone="level1_open"]').attr("name", mainNode+'[dropdown][submenu]['+subid+'][level1]['+levelid+'][open]');
		$('#'+parentID+' #'+j+' .btn-group [value="y"]').attr("id",'dd_level1_open'+subid+levelid+'y').parent().attr("for",'dd_level1_open'+subid+levelid+'y');
		$('#'+parentID+' #'+j+' .btn-group [value="n"]').attr("id",'dd_level1_open'+subid+levelid+'n').parent().attr("for",'dd_level1_open'+subid+levelid+'n');
	});
	$(window).off( "click", "#dropdown .level1-remove");
	$(window).on("click", "#dropdown .level1-remove", function(){
		$(this).closest(".level1-data").remove();
	});

	


});
</script>


<script type="text/javascript"><!--
$('.content-wrp').block({
	css: { 
		top: '10%',
		border: 'none', 
		padding: '50px 20px 20px 20px', 
		backgroundColor: '#000', 
		'-webkit-border-radius': '10px', 
		'-moz-border-radius': '10px', 
		opacity: 0.7, 
		color: '#fff',
		fontSize: '16px',
		fontWeight: "bold"
	},
	overlayCSS:{ backgroundColor: '#000', opacity: 1 },
	message: 'Loading...' 
});
//$('body').prepend('<div class="loading">Loading...</div>');
$(document).ready(function(){
	$('#content').css({display:'block'});
	$('#content').animate({opacity: 1}, 2000, function(){ $('.content-wrp').unblock(); });
});

/*	Delete module case
*******************************/
$(window).on("click", ".mod-remove", function(){
	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		blockSection();
		var mod_id = $(this).attr("data-mod");
		$(this).parent().remove();
		//console.log(mod_id);

		$.post("index.php?route=module/rgen_megamenu/delete&token=<?php echo $token; ?>&mod_name="+mod_id, function(data) {
			if ($("#main-sd-tb li").length > 0) {
				//$("#main-sd-tb li:last a").click();
				$('.main-panes').unblock();
				$("#main-sd-tb li:first a").click();
			} else {
				$.post("index.php?route=module/rgen_megamenu/save&token=<?php echo $token; ?>&mod_status=0", function(data){ 
					location.reload();
					//$('#mod-data').html('');
				});
			};
		});
	}
});

/* Create new
*******************************/
$(window).on("click", "#module-add", function(){
	blockSection();
	$.post("index.php?route=module/rgen_megamenu/add&token=<?php echo $token; ?>", function(data) {
		$("#main-sd-tb li").removeClass('active');
		$('#mod-data').html(data);
		colorpicker();
		$('.main-panes').unblock();
	});
});

/* Edit module
*******************************/
$(window).on("click", "#main-sd-tb a", function(){

	if($("body").find("#permission").length>0){
		//permissionCheck();
	}else{
		var saveURL = $('#mod-data .save-url').val();
		save(saveURL);
	}

	var url = $(this).attr("data-url");
	var mod_id = $(this).attr("data-id");

	$("#mod-create").hide();
	$("#mod-data").show();
	
	//var tabpane = $(this).attr("href");
	//console.log($(this).attr("data-url"));
	$("#main-sd-tb li").removeClass("active");
	$(this).parent().addClass("active");
	blockSection();

	$.post(url, function(data) {
		//console.log(data);
		$("#mod-data").html(data);
		$(".menu-title").text($('.menuTypes select option:selected').text());
		colorpicker();
		$('.main-panes').unblock();
	});
});
$("#main-sd-tb .tab-module:first-child a").click();

function save(saveURL){
	var menutypeData = '#'+$('.mod-data-wrp').attr('data-menu');
	//console.log(menutypeData);
	if (typeof CKEDITOR != 'undefined'){ for(instance in CKEDITOR.instances){ CKEDITOR.instances[instance].updateElement(); } }
	$.ajax({
		type: "POST",
		url: saveURL,
		data: $('.common-data input[type=\'text\'], .common-data input[type=\'checkbox\']:checked, .common-data input[type=\'radio\']:checked, .common-data input[type=\'hidden\'], .common-data select, '+menutypeData+' input[type=\'text\'], '+menutypeData+' input[type=\'checkbox\']:checked, '+menutypeData+' input[type=\'radio\']:checked, '+menutypeData+' input[type=\'hidden\'], '+menutypeData+' select, '+menutypeData+' textarea, .megamenu-status input[type=\'checkbox\']:checked, .megamenu-status input[type=\'hidden\']').serializeArray(),
		success: function(data) {
			clearCache();
			//console.log(data);
			//console.log(saveURL);
			if(saveURL){
				var modName = saveURL.split('mod_name=');
				if (modName[1]) {
					var msg = "<?php echo $this->language->get('text_success'); ?>";
					successMsg(msg);
				}else{
					var msg = "<?php echo $this->language->get('text_success'); ?> Page will refresh after module data saved.";
					$('.saving').addClass('success-msg').find("span").text(msg).css({backgroundImage:""});
					location.reload();
				};
			}
			
		}
	});
}
$(window).on("click", "#saveBtn", function(){
	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		$('body').prepend('<div class="saving"><span>Please wait...<span></div>');
		$(".saving").css({height: $("html").height()});
		var saveURL = $('#mod-data .save-url').val();
		save(saveURL);
	}
});


function setswitch(){
	$(window).on("click",".switch",function(){
		var id = $(this).find('input[type="checkbox"]').attr('id');
		var name = $(this).find('input[type="checkbox"]').attr('name');

		if ($(this).find('input[type="checkbox"]').is(':checked')) {
			$(this).find('input[type="hidden"]').remove();
		} else {
		    $(this).append('<input type="hidden" name="' + name + '" value="0">');
		} 
	});
}
setswitch();


function clearCache(){
	$.post('index.php?route=module/rgen_megamenu/clearCache&token=<?php echo $token; ?>&name=/rgen_megamenu', function(data) { console.log(data); });
}

function permissionCheck(){
	// Loading screen
	$('body').prepend('<div class="saving"><span>Please wait...<span></div>');
	$(".saving").css({height: $("html").height()});
	$('.saving').addClass('error-msg').find("span").text("<?php echo $this->language->get('error_permission'); ?>").css({backgroundImage:""});
	$('.saving').animate({opacity:1}, 2000, function(){
		$('.saving').animate({opacity:0}, 300, function(){$('.saving').css({display:"none"}); $(".saving").remove();});
	});
}

function successMsg(msg){
	// Loading screen
	$('.saving').addClass('success-msg').find("span").text(msg).css({backgroundImage:""});
	$('.saving').animate({opacity:1}, 500, function(){
		$('.saving').animate({opacity:0}, 300, function(){$('.saving').css({display:"none"}); $(".saving").remove();});
	});
}

function blockSection(){
	$('.main-panes').block({
		css: { 
			top: '10%',
			border: 'none', 
			padding: '50px 20px 20px 20px', 
			backgroundColor: '#333', 
			'-webkit-border-radius': '10px', 
			'-moz-border-radius': '10px', 
			opacity: 0.7, 
			color: '#fff',
			fontSize: '16px',
			fontWeight: "bold"
		},
		overlayCSS:{ backgroundColor: '#fff', opacity: 0.8 },
		message: 'Just a moment...' 
	});
}
function colorpicker(){
	$('.hex').each(function(index, element) {
		$(this).colorpicker({
			hsv:false,
			altField:$(this),
			showNoneButton:true,
			altProperties: 'background-color'
		});	
		$(this).click(function(){
			$('.ui-colorpicker').css({top:$(this).offset().top + 25});
		});
		
		if($(this).val() == ''){
			$(this).css({backgroundColor:"#fff"});
		}else{
			$(this).css({backgroundColor:"#"+$(this).val()});
		}
	});
	$('.rgb').each(function(index, element) {

		$(this).colorpicker({
			hsv:false,
			alpha:true,
			colorFormat: ['RGBA'],
			showNoneButton:true,
			select: function(event, color) {
						$(this).val(color.formatted);
					}
		});
		
		$(this).click(function(){
			$('.ui-colorpicker').css({top:$(this).offset().top + 25});
		});
	});
}
//--></script> 
<?php echo $footer; ?>