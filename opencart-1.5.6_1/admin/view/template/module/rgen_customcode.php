<div class="tabs-left tabbable" data-theme="tab1" id='customCode'>
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab_cssfile">Add Custom CSS file</a></li>
		<li><a href="#tab_csscode">Add Custom CSS code</a></li>
		<li><a href="#tab_jscode">Add Custom JS code</a></li>
	</ul>
	<div class="tab-content">
		<div id="tab_cssfile" class="tab-pane active">
			<?php 
			$dbKey 	= $RGen_customFile_Status;
			$name	= 'RGen_customFile_Status';
			$id		= 'RGen_customFile_Status';
			?>
			<!-- <span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>
			<br><br>
			<input type="text" class='input-xxlarge' placeholder="Enter your file name" name="RGen_CustomCSS_file" id="RGen_CustomCSS_file" value="<?php echo isset($RGen_CustomCSS_file) && $RGen_CustomCSS_file != '' ? $RGen_CustomCSS_file : "custom.css"; ?>">
			<span class="help-block">
				<ul>
					<li>Add your all custom CSS code into this file ==> <strong>catalog/view/theme/rgen-opencart/stylesheet/custom.css</strong></li>
					<li>Or you can also create and save your own CSS file into this folder ==> <strong>catalog/view/theme/rgen-opencart/stylesheet/</strong><br /></li>
					<li>Than just enter file name in above input text box (Example: "custom.css")</li>
					<li>Do not forgot to take backup of this file once you added your own code. Because this file will overwrite at the time of updating theme with new version.</li>
				</ul>
			</span>
		</div>
		<div id="tab_csscode" class="tab-pane">
			<?php 
			$dbKey 	= $RGen_CustomCSS_Status;
			$name	= 'RGen_CustomCSS_Status';
			$id		= 'RGen_CustomCSS_Status';
			?>
			<!-- <span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span><br><br>
			<textarea placeholder="Enter your CSS code" style="width:90%" cols="100" rows="20" name="RGen_CustomCSS" id="RGen_CustomCSS"><?php echo $RGen_CustomCSS; ?></textarea>
		</div>
		<div id="tab_jscode" class="tab-pane">
			<?php 
			$dbKey 	= $RGen_CustomJS_Status;
			$name	= 'RGen_CustomJS_Status';
			$id		= 'RGen_CustomJS_Status';
			?>
			<!-- <span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span><br><br>
			<textarea placeholder="Enter your JS code" style="width:90%" cols="100" rows="20" name="RGen_CustomJS" id="RGen_CustomJS"><?php echo $RGen_CustomJS; ?></textarea>
		</div>
	</div>
</div>