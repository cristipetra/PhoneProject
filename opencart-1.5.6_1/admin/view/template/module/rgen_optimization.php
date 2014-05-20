<h4>Optimize theme</h4>
<div class="form-horizontal">
	<div class="control-group">
		<label class="control-label">
			Optimize mobile view
		</label>
		<div class="controls">
			<?php 
				$dbKey 	= $RGen_optimizemob;
				$name	= 'RGen_optimizemob';
				$id		= 'RGen_optimizemob';
			?>
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>
			<div class="help-block">
				Optimize mobile view result display only in mobile devices. It is not display in browser resized view.<br>
				Optimize mobile view disable scrolling script on porducts and convert all product box design into simple HTML structure to load faster
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">
			CSS Compression
		</label>
		<div class="controls">
			<table class="subfields withbdr">
				<tr>
					<td>
						<?php 
							$dbKey 	= isset($RGen_optimize['css']) ? $RGen_optimize['css'] : 0;
							$name	= 'RGen_optimize[css]';
							$id		= 'RGen_optimize[css]';
						?>
						<span class="switch">
							<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
							<label for="<?php echo $id; ?>" class="switch-img"></label>
							<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
						</span>
					</td>
					<td>
						<a class="btn cacheRemove" data-type="removeAll" data-name="css">Clear cached data</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">
			Javascript Compression
		</label>
		<div class="controls">
			<table class="subfields withbdr">
				<tr>
					<td>
						<?php 
							$dbKey 	= isset($RGen_optimize['js']) ? $RGen_optimize['js'] : 0;
							$name	= 'RGen_optimize[js]';
							$id		= 'RGen_optimize[js]';
						?>
						<span class="switch">
							<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
							<label for="<?php echo $id; ?>" class="switch-img"></label>
							<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
						</span>
					</td>
					<td>
						<a class="btn cacheRemove" data-type="removeAll" data-name="js">Clear cached data</a>
					</td>
				</tr>
			</table>
			
		</div>
	</div>
</div>

<h4>Caching R.Gen module data</h4>
<div class="form-horizontal">
	<div class="control-group">
		<label class="control-label">R.Gen Custom HTML module</label>
		<div class="controls">
			<table class="subfields withbdr">
				<tr>
					<td>
						<?php 
							$dbKey 	= isset($RGen_optimize['cache_customhtml']) ? $RGen_optimize['cache_customhtml'] : 0;
							$name	= 'RGen_optimize[cache_customhtml]';
							$id		= 'RGen_optimize[cache_customhtml]';
						?>
						<span class="switch">
							<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
							<label for="<?php echo $id; ?>" class="switch-img"></label>
							<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
						</span>
					</td>
					<td>
						<a class="btn cacheRemove" data-type="removeAll" data-name="/rgen_customhtml">Clear cached data</a>
					</td>
				</tr>
			</table>
			
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">R.Gen Product, Category and Brand Sections module</label>
		<div class="controls">
			<table class="subfields withbdr">
				<tr>
					<td>
						<?php 
							$dbKey 	= isset($RGen_optimize['cache_pcb']) ? $RGen_optimize['cache_pcb'] : 0;
							$name	= 'RGen_optimize[cache_pcb]';
							$id		= 'RGen_optimize[cache_pcb]';
						?>
						<span class="switch">
							<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
							<label for="<?php echo $id; ?>" class="switch-img"></label>
							<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
						</span>
					</td>
					<td>
						<a class="btn cacheRemove" data-type="removeAll" data-name="/rgen_pcb">Clear cached data</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">R.Gen Mega Menu module</label>
		<div class="controls">
			<table class="subfields withbdr">
				<tr>
					<td>
						<?php 
							$dbKey 	= isset($RGen_optimize['cache_mgmenu']) ? $RGen_optimize['cache_mgmenu'] : 0;
							$name	= 'RGen_optimize[cache_mgmenu]';
							$id		= 'RGen_optimize[cache_mgmenu]';
						?>
						<span class="switch">
							<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
							<label for="<?php echo $id; ?>" class="switch-img"></label>
							<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
						</span>
					</td>
					<td>
						<a class="btn cacheRemove" data-type="removeAll" data-name="/rgen_megamenu">Clear cached data</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">R.Gen Revolution Slider module</label>
		<div class="controls">
			<table class="subfields withbdr">
				<tr>
					<td>
						<?php 
							$dbKey 	= isset($RGen_optimize['cache_revo']) ? $RGen_optimize['cache_revo'] : 0;
							$name	= 'RGen_optimize[cache_revo]';
							$id		= 'RGen_optimize[cache_revo]';
						?>
						<span class="switch">
							<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
							<label for="<?php echo $id; ?>" class="switch-img"></label>
							<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
						</span>
					</td>
					<td>
						<a class="btn cacheRemove" data-type="removeAll" data-name="/rgen_revoslider">Clear cached data</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		$(window).on('click', '.cacheRemove', function(event) {
			var removeBtn = this;
			var buttonTxt = $(this).text();
			event.preventDefault();
			if($("body").find("#permission").length>0){
				permissionCheck();
			}else{
				$(removeBtn).text('Please wait...').css({cursor: 'inherit', opacity:0.3});
				$.post('index.php?route=module/rgen_theme/'+$(removeBtn).attr('data-type')+'&token=<?php echo $token; ?>&name='+$(removeBtn).attr('data-name'), function(data) {
					console.log(data);
					$(removeBtn).text(buttonTxt).css({cursor: '', opacity:1});
				});
			}
		});

		
	});
</script>