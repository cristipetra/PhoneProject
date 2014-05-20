<?php if ($position != 'column_left' && $position != 'column_right'){ ?>
<div class="<?php 
	echo isset($setting['fullB']) && $setting['fullB'] == 'y' ? 'fullblock' : null; 
	echo isset($fullB_class) ? $fullB_class : null;
	?>"<?php 
	echo isset($fullB_settings) ? ' style="'.$fullB_settings.'"' : null; 
	?> id="customhtml-fullB<?php echo $module ?>">
	<div class="fullB-inner">
<?php }?>

<?php 
$hd 	 = isset($RGen_custom[$mod_id]['title'][$l_id]) && $RGen_custom[$mod_id]['title'][$l_id] != '' ? "<h2 class='header-2'>".$RGen_custom[$mod_id]['title'][$l_id]."</h2>" : null;
$content = isset($RGen_custom[$mod_id]['description'][$l_id]) ? html_entity_decode($RGen_custom[$mod_id]['description'][$l_id], ENT_QUOTES, 'UTF-8') : null;
$cssClass = isset($RGen_custom[$mod_id]['class']) && $RGen_custom[$mod_id]['class'] != '' ? ' '.$RGen_custom[$mod_id]['class'] : null; ?>
<div id="prd-aboverel<?php echo $module; ?>" class="prdpg-arl<?php echo $cssClass; ?>">
	<?php echo $hd; ?>
	<div class="custom-data"><?php echo $content; ?></div>
	<b class="clearfix"></b>
</div>

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