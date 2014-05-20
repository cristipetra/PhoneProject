<div class="content-wrapper">
<h4>
	R.Gen Theme sample data
</h4>
<div class="alert" style="color:#f00; border-color:#f00;">
	<p style="font-size:16px; font-weight:bold;">Do not forgot to take backup of store before installing sample data.</p>
	<p>Installation of data will replace your existing settings of theme and all other data including category, products and opencart settings</p>
	<p>Installation process will replace opencart default category and products data.</p>
	<!-- <p>Installing data perform below listed installation processes</p>
	<ul>
		<li>Replace / Install R.Gen Theme settings data</li>
		<li>Replace / Install R.Gen Revolution slider module data</li>
		<li>Replace / Install R.Gen megamenu module data</li>
		<li>Replace / Install R.Gen Custom module data</li>
		<li>Replace / Install R.Gen Custom HTML module data</li>
		<li>Replace / Install sample categories on existing categories</li>
		<li>Assign all opencart default products to categories</li>
		<li>Update Image sizes in settings</li>
		<li>Update Banner module data</li>
		<li>Update Featured module data</li>
		<li>Update Slideshow module data</li>
		<li>Update Category module data</li>
	</ul>
	<p>Installation process does not affect any other data except from above list.</p> -->
	<p>After click on "<strong>Install Data</strong>" please follow below steps</p>
	<ul>
		<li>Go to User > User Group > Top Administrator edit screen</li>
		<li>Click on "<strong>Select all</strong>" link from both sections "<strong>Access Permission:</strong>" and "<strong>Modify Permission:</strong>"</li>
		<li>Click on <strong>Save</strong> button to apply your changes</li>
	</ul>
</div>
<div class="form-horizontal">
	<div class="control-group">
		<label class="control-label">Select data to install</label>
		<div class="controls">
			<?php 
				if(is_dir(DIR_APPLICATION."model/rgen/sampledata/") == 1){
					include "model/rgen/sampledata/rgen_themelist.php";
				}else{
					$demodata = "";
				}
				
				/*$demodata = array(
							'Demo 1'	=> 'demo_01',
							'Demo 2'	=> 'demo_02',
							'Demo 3'	=> 'demo_03',
							'Demo 4'	=> 'demo_04',
							'Demo 5'	=> 'demo_05',
							'Demo 6'	=> 'demo_06',
							'Demo 7'	=> 'demo_07',
							'Demo 8'	=> 'demo_08',
							'Demo 9'	=> 'demo_09',
							'Demo 10'	=> 'demo_10',
							'Demo 11'	=> 'demo_11',
							'Demo 12'	=> 'demo_12',
							'Demo 13'	=> 'demo_13',
							'Demo 14'	=> 'demo_14',
							'Demo 15'	=> 'demo_15',
							'Demo 16'	=> 'demo_16',
							'Demo 17'	=> 'demo_17',
							'Demo 18'	=> 'demo_18'
							);*/
				$ar 	= $demodata;
				//$name	= 'rgen_custom_module' . $module_row . '[status]';
			?>
			<span class='select'>
				<select class="select-data">
					<option value="">Select demo theme to install data</option>
					<?php foreach ($ar as $key => $value) { ?>
						<option value="<?php echo $value; ?>"><?php echo $key; ?></option>
					<?php } ?>
				</select>
			</span>
			<a class="btn btn-success install-data">Install data</a>
		</div>
	</div>
</div>
</div>
<?php if(is_dir(DIR_APPLICATION."model/rgen/sampledata/") == 1){ echo '<input type="hidden" id="dircheck">'; }; ?>
<script type="text/javascript">
$(".select-data").click(function(){
	$('.install-data').attr('data-demo', $(this).val());
	//console.log($(this).val());
});

$(".install-data").click(function(){
	if($("body").find("#permission").length>0){
		permissionCheck();
	}else{
		if ($("#dircheck").length > 0){

			if ($(this).attr('data-demo')) {
				var datasource = $(this).attr('data-demo');
				new Messi(
					'<p>Are you sure you wish to install <strong>"'+$(this).attr('data-demo')+'"</strong> sample data.</p><p style="color:#f00;">Installing sample data will replace all your current data and settings including category and product data.</p>', {
					title: '<strong>"'+$(this).attr('data-demo')+'"</strong> selected', titleClass: 'msg-title', modal: true, modalOpacity: 0.5,
					buttons: [{id: 0, val: 'load', label: 'Install sample data', class: 'btn-small btn-danger'}, {id: 0, val: 'cancel', label: 'Cancel', class: 'btn-small'}],
					callback: function(val) {
						if (val == 'load') {
							$('body').prepend('<div class="saving"><span>Please wait...<span></div>');
							$(".saving").css({height: $("html").height()});

							var url = "index.php?route=module/rgen_theme/installsample&token=<?php echo $token; ?>&datasource=" + datasource;
							//console.log(url);
							$.ajax({
								type: "POST",
								url: url,
								success: function(data) {
									//console.log(data);
									if($("body").find("#permission").length>0){
										$('.saving').addClass('error-msg').find("span").text("<?php echo $this->language->get('error_permission'); ?>").css({backgroundImage:""});
										$('.saving').animate({opacity:1}, 2000, function(){
											$('.saving').animate({opacity:0}, 300, function(){$('.saving').css({display:"none"}); $(".saving").remove();});
										});	
									}else{
										$('.saving').addClass('success-msg').find("span").text("Demo theme sample data installed successfully").css({backgroundImage:""});
										$('.saving').animate({opacity:1}, 1000, function(){
											$('.saving').animate({opacity:0}, 300, function(){$('.saving').css({display:"none"}); $(".saving").remove();});
										});
									}
								}
							});
						};
					}
				});
			} else {
				new Messi('No any sample data selected.', {
					title: 'Alert', titleClass: 'msg-title', modal: true, modalOpacity: 0.5, autoclose: 3000,
					buttons: [{id: 0, val: 'C', label: 'Close', class: 'btn-small'}]
				});
			};
			
		}else{
			new Messi('Sample data not available to install.', {
				title: 'Alert', titleClass: 'msg-title', modal: true, modalOpacity: 0.5, autoclose: 3000,
				buttons: [{id: 0, val: 'C', label: 'Close', class: 'btn-small'}]
			});
		};
	}
});

function permissionCheck(){
	// Loading screen
	$('body').prepend('<div class="saving"><span>Please wait...<span></div>');
	$(".saving").css({height: $("html").height()});
	$('.saving').addClass('error-msg').find("span").text("<?php echo $this->language->get('error_permission'); ?>").css({backgroundImage:""});
	$('.saving').animate({opacity:1}, 2000, function(){
		$('.saving').animate({opacity:0}, 300, function(){$('.saving').css({display:"none"}); $(".saving").remove();});
	});
}

</script>