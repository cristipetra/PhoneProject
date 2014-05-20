<?php 
$hd 	 = isset($RGen_custom[$mod_id]['title'][$l_id]) && $RGen_custom[$mod_id]['title'][$l_id] != '' ? $RGen_custom[$mod_id]['title'][$l_id] : null;
$content = isset($RGen_custom[$mod_id]['description'][$l_id]) ? html_entity_decode($RGen_custom[$mod_id]['description'][$l_id], ENT_QUOTES, 'UTF-8') : null;
$cssClass = isset($RGen_custom[$mod_id]['class']) && $RGen_custom[$mod_id]['class'] != '' ? ' '.$RGen_custom[$mod_id]['class'] : null; ?>

<?php if ($hd) { ?>
<div class="extra-tb-holder">
<a href="#prd-extb<?php echo $module; ?>" class="<?php echo $cssClass; ?>"><?php echo $hd; ?></a>
</div>
<div id="prd-extb<?php echo $module; ?>" class="tab-content<?php echo $cssClass; ?>">
<div class="scrollPane"><?php echo $content; ?></div>
</div>
<?php } ?>
