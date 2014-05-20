<?php if ($position != 'column_left' && $position != 'column_right'){ ?>
<div class="<?php 
	echo isset($setting['fullB']) && $setting['fullB'] == 'y' ? 'fullblock' : null; 
	echo isset($fullB_class) ? $fullB_class : null;
	?>"<?php 
	echo isset($fullB_settings) ? ' style="'.$fullB_settings.'"' : null; 
	?> id="customhtml-fullB<?php echo $module ?>">
	<div class="fullB-inner">
<?php } ?>


<?php if(isset($RGen_custom[$mod_id]['style'])){ 
	$hd 	 = isset($RGen_custom[$mod_id]['title'][$l_id]) && $RGen_custom[$mod_id]['title'][$l_id] != '' ? "<h2 class='header-1'>".$RGen_custom[$mod_id]['title'][$l_id]."</h2>" : null;
	$content = isset($RGen_custom[$mod_id]['description'][$l_id]) ? html_entity_decode($RGen_custom[$mod_id]['description'][$l_id], ENT_QUOTES, 'UTF-8') : null;
	
	if($RGen_custom[$mod_id]['style'] == 'cust1'){ ?>
	<div class='custom1<?php if(isset($RGen_custom[$mod_id]['class']) && $RGen_custom[$mod_id]['class'] != ''){ ?> <?php echo $RGen_custom[$mod_id]['class']; ?><?php } ?>'>
		<?php echo $hd; echo $content; ?>
	</div>
	<?php } ?>

	<?php if($RGen_custom[$mod_id]['style'] == 'cust2'){ ?>
	<div class='custom2<?php if(isset($RGen_custom[$mod_id]['class']) && $RGen_custom[$mod_id]['class'] != ''){ ?> <?php echo $RGen_custom[$mod_id]['class']; ?><?php } ?>'>
		<?php echo $hd; echo $content; ?>
	</div>
	<?php } ?>

	<?php if($RGen_custom[$mod_id]['style'] == 'cust3'){ ?>
	<div class='custom3<?php if(isset($RGen_custom[$mod_id]['class']) && $RGen_custom[$mod_id]['class'] != ''){ ?> <?php echo $RGen_custom[$mod_id]['class']; ?><?php } ?>'>
		<?php echo $hd; echo $content; ?>
	</div>
	<?php } ?>
<?php } ?>


<?php if ($position != 'column_left' && $position != 'column_right'){ ?>
	<?php if (isset($setting['fullB']) && $setting['fullB'] == 'y') { ?>
	<script>
	jQuery(document).ready(function($) {
		$("#customhtml-fullB<?php echo $module ?>").fullblock({ child: ".fullB-inner" });
	});
	</script>
	<?php } ?>
	</div>
</div>
<?php } ?>