<?php 
$hd 	 	= isset($RGen_custom[$mod_id]['title'][$l_id]) && $RGen_custom[$mod_id]['title'][$l_id] != '' ? "<h2 class='header-2'>".$RGen_custom[$mod_id]['title'][$l_id]."</h2>" : null;
$content 	= isset($RGen_custom[$mod_id]['description'][$l_id]) ? html_entity_decode($RGen_custom[$mod_id]['description'][$l_id], ENT_QUOTES, 'UTF-8') : null;
$cssClass 	= isset($RGen_custom[$mod_id]['class']) && $RGen_custom[$mod_id]['class'] != '' ? ' '.$RGen_custom[$mod_id]['class'] : null; 
$w 			= $RGen_custom[$mod_id]['custWidth'] ? 'width:'.$RGen_custom[$mod_id]['custWidth'].'px;' : null;
$t 			= $RGen_custom[$mod_id]['custTop'] ? 'top:'.$RGen_custom[$mod_id]['custTop'].'px;' : null;
$bgimg 		= $RGen_custom[$mod_id]['custImg'] ? "background-image: url(image/".$RGen_custom[$mod_id]['custImg'].");" : null;
$bgcolor 	= $RGen_custom[$mod_id]['custColor'] ? "background-color: ".$RGen_custom[$mod_id]['custColor'].";" : null;
?>
<div class="<?php echo $RGen_custom[$mod_id]['position'] == 's_left' ? 'custom-left' : 'custom-right'; echo $cssClass; ?>" style="<?php echo $w; echo $t; ?>">
	<span class="icon" style="<?php echo $bgimg; echo $bgcolor; ?>"></span>
	<div class="content">
		<?php echo $hd; echo $content; ?>
	</div>
</div>