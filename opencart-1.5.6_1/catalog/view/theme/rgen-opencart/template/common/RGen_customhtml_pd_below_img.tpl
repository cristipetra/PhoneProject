<?php 
$hd 	 = isset($RGen_custom[$mod_id]['title'][$l_id]) && $RGen_custom[$mod_id]['title'][$l_id] != '' ? "<h2 class='header-2'>".$RGen_custom[$mod_id]['title'][$l_id]."</h2>" : null;
$content = isset($RGen_custom[$mod_id]['description'][$l_id]) ? html_entity_decode($RGen_custom[$mod_id]['description'][$l_id], ENT_QUOTES, 'UTF-8') : null;
$cssClass = isset($RGen_custom[$mod_id]['class']) && $RGen_custom[$mod_id]['class'] != '' ? ' '.$RGen_custom[$mod_id]['class'] : null; ?>
<div id="prd-belowimg<?php echo $module; ?>" class="prdpg-bimg<?php echo $cssClass; ?>">
	<?php echo $hd; ?>
	<div class="custom-data"><?php echo $content; ?></div>
	<b class="clearfix"></b>
</div>