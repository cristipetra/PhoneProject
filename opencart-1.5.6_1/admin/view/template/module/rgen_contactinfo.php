<h4>Footer contact info</h4>
<div class="form-horizontal ft-contacts">

	<div class="control-group">
		<label class="control-label">Contact status</label>
		<div class="controls">
			<?php 
			$dbKey 	= $FT_Contact_status;
			$name	= 'FT_Contact_status';
			$id		= 'FT_Contact_status';
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

		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Phone No.</label>
		<div class="controls">
			<?php 
			$dbKey 	= $FT_Contact_phStatus;
			$name	= 'FT_Contact_phStatus';
			$id		= 'FT_Contact_phStatus';
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

			<?php 
			$dbKey 			= $FT_Contact_ph;
			$name			= 'FT_Contact_ph';
			$id				= 'FT_Contact_ph';
			$placeholder	= 'Enter phone no.';
			?>
			<input type="text" class="input-medium" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
			<?php 
			$dbKey 			= $FT_Contact_ph1;
			$name			= 'FT_Contact_ph1';
			$id				= 'FT_Contact_ph1';
			$placeholder	= 'Enter phone no.';
			?>
			<input type="text" class="input-medium" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Phone No.</label>
		<div class="controls">
			<?php 
			$dbKey 	= $FT_Contact_faxStatus;
			$name	= 'FT_Contact_faxStatus';
			$id		= 'FT_Contact_faxStatus';
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

			<?php 
			$dbKey 			= $FT_Contact_fax;
			$name			= 'FT_Contact_fax';
			$id				= 'FT_Contact_fax';
			$placeholder	= 'Enter fax no.';
			?>
			<input type="text" class="input-medium" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
			<?php 
			$dbKey 			= $FT_Contact_fax1;
			$name			= 'FT_Contact_fax1';
			$id				= 'FT_Contact_fax1';
			$placeholder	= 'Enter fax no.';
			?>
			<input type="text" class="input-medium" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Email</label>
		<div class="controls">
			<?php 
			$dbKey 	= $FT_Contact_emailStatus;
			$name	= 'FT_Contact_emailStatus';
			$id		= 'FT_Contact_emailStatus';
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

			<?php 
			$dbKey 			= $FT_Contact_email;
			$name			= 'FT_Contact_email';
			$id				= 'FT_Contact_email';
			$placeholder	= 'Enter email address';
			?>
			<input type="text" class="input-medium" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>

</div>