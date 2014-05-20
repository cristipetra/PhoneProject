<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="view/stylesheet/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/rgenadmin.css" />


<div id="content" class="rgen-revo-settings">
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
				<h2 class="pull-left mod-title">REVOLUTION SLIDER</h2>
				<div class="buttons pull-right">
					<a onclick="location = '<?php echo $create; ?>';" class="btn btn-danger btn-large">Create new slider</a>
					<a onclick="location = '<?php echo $cancel; ?>';" class="btn btn-large">Back</a>
				</div>
			</div>
		</div>
		<form id="form" enctype="multipart/form-data">
		<div class="mod-content">
			<table class="table table-bordered">
				<tr class="table-header">
					<th style="padding-left:15px;">Slider</th>
					<th width="75"></th>
					<th width="50"></th>
				</tr>
				<?php $module_row = 0; ?>
				<?php foreach ($sliderlist as $module) { ?>
				<tr>
					<td style="padding:13px 15px; font-size:16px; font-weight:bold;"><?php echo $module['slidername']; ?></td>
					<td style="text-align:center;"><a onclick="location = '<?php echo $module['edit']; ?>';" class="btn"><i class="icon-edit"></i> Edit</a></td>
					<td style="text-align:center;"><a class='btn btn-danger deleteBtn' data-url="<?php echo $module['delete']; ?>"><i class="icon-remove icon-white"></i></a></td>
				</tr>
				<?php $module_row++; ?>
				<?php } ?>
			</table>
		</div>
		</form>
	</div>
</div>
<script src="view/javascript/rgen/bootstrap.min.js"></script>
<script src="view/javascript/rgen/rgenadmin.js"></script>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript">

function setswitch(){
	$('.switch').click(function(){
	
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

// SAVE BUTTON
$("#saveBtn").click(function(){
	$('body').prepend('<div class="saving"><span>Please wait...<span></div>');
	$(".saving").css({height: $("html").height()});
	if (typeof CKEDITOR != 'undefined'){ for(instance in CKEDITOR.instances){ CKEDITOR.instances[instance].updateElement(); } }
	$.ajax({
		type: "POST",
		url: "index.php?route=module/rgen_revoslider&token=<?php echo $token; ?>",
		data: $('#form input[type=\'text\'], #form input[type=\'checkbox\']:checked, #form input[type=\'radio\']:checked, #form input[type=\'hidden\'], #form select, #form textarea').serializeArray(),
		dataType: "html",
		success: function() {
			//console.log($('#form textarea').val());
			if($("body").find("#permission").length>0){
				$('.saving').addClass('error-msg').find("span").text("<?php echo $this->language->get('error_permission'); ?>").css({backgroundImage:""});
				$('.saving').animate({opacity:1}, 2000, function(){
					$('.saving').animate({opacity:0}, 300, function(){$('.saving').css({display:"none"}); $(".saving").remove();});
				});	
			}else{
				$('.saving').addClass('success-msg').find("span").text("<?php echo $this->language->get('text_success'); ?>").css({backgroundImage:""});
				$('.saving').animate({opacity:1}, 1000, function(){
					$('.saving').animate({opacity:0}, 300, function(){
						$('.saving').css({display:"none"}); $(".saving").remove();
					});
				});
			}
		}
	});
});

// SAVE BUTTON
$(".deleteBtn").click(function(){
	var url = $(this).attr("data-url");
	var deletebtn = $(this);
	$('body').prepend('<div class="saving"><span>Please wait...<span></div>');
	$(".saving").css({height: $("html").height()});
	$.ajax({
		type: "POST",
		url: url,
		success: function() {
			//console.log($('#form textarea').val());
			if($("body").find("#permission").length>0){
				$('.saving').addClass('error-msg').find("span").text("<?php echo $this->language->get('error_permission'); ?>").css({backgroundImage:""});
				$('.saving').animate({opacity:1}, 2000, function(){
					$('.saving').animate({opacity:0}, 300, function(){$('.saving').css({display:"none"}); $(".saving").remove();});
				});	
			}else{
				$('.saving').addClass('success-msg').find("span").text("<?php echo $this->language->get('text_delete'); ?>").css({backgroundImage:""});
				deletebtn.parent().parent().remove();
				$('.saving').animate({opacity:1}, 1000, function(){
					$('.saving').animate({opacity:0}, 300, function(){
						$('.saving').css({display:"none"}); $(".saving").remove();
					});
				});
			}
		}
	});
});

</script>
<?php echo $footer; ?>