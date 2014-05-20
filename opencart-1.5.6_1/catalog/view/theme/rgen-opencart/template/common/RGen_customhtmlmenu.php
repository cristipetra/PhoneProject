<?php 
$l_id = $this->config->get('config_language_id');
$RGen_menu_item = $this->document->RGen_HtmlMenu;
$RGen_htmlmenu_mod = $this->document->RGen_HtmlMenuMod;

if ($this->config->get('RGen_menuhtml_status') == 1) { ?>
<?php if (isset($RGen_menu_item[$l_id])) { ?>
<li>
	<?php if ($RGen_menu_item[$l_id]['name']) { ?>
	<a class="top-lvl"><?php echo $RGen_menu_item[$l_id]['name']; ?></a>
	<div class="sub-menu menu-html-wrp">
		<div class="menu-html">
		<?php echo htmlspecialchars_decode($RGen_menu_item[$l_id]['htmldata'], ENT_QUOTES ); ?>
		</div>
	</div>
	<?php } ?>
</li>
<?php } ?>
<?php 
if ($RGen_htmlmenu_mod) { 
foreach ($RGen_htmlmenu_mod[$l_id]['RGen_HtmlMenuMod'] as $item) { ?>
<li>
	<a class="top-lvl"><?php echo $item['name']; ?></a>
	<div class="sub-menu menu-html-wrp">
		<div class="menu-html">
		<?php echo htmlspecialchars_decode($item['htmldata'], ENT_QUOTES ); ?>
		</div>
	</div>
</li>
<?php } } ?>
<?php } ?>