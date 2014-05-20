<?php if ($this->config->get('RGen_customMenu_status') == 1 && $this->config->get('RGen_menu1_item') != '') { ?>
<li>
	<a <?php if($this->config->get('RGen_menu1_item_url') != '') { ?>href="<?php echo $this->config->get('RGen_menu1_item_url'); ?>"<?php } ?> title="<?php echo $this->config->get('RGen_menu1_item'); ?>" class="top-lvl"><?php echo $this->config->get('RGen_menu1_item'); ?></a>
	<?php if ($this->config->get('RGen_subMenu1_item1') != '') { ?>
	<div class="sub-menu">
		<ul>
			<li><a <?php if ($this->config->get('RGen_subMenu1_item_url1') != '') { ?>href="<?php echo $this->config->get('RGen_subMenu1_item_url1'); ?>"<?php } ?> class="sub-lvl"><?php echo $this->config->get('RGen_subMenu1_item1'); ?></a></li>
			
			<?php if ($this->config->get('RGen_subMenu1_item2') != '') { ?>
			<li><a <?php if ($this->config->get('RGen_subMenu1_item_url2') != '') { ?>href="<?php echo $this->config->get('RGen_subMenu1_item_url2'); ?>"<?php } ?> class="sub-lvl"><?php echo $this->config->get('RGen_subMenu1_item2'); ?></a></li>
			
			<?php }if ($this->config->get('RGen_subMenu1_item3') != ''){ ?>
			<li><a <?php if ($this->config->get('RGen_subMenu1_item_url3') != '') { ?>href="<?php echo $this->config->get('RGen_subMenu1_item_url3'); ?>"<?php } ?> class="sub-lvl"><?php echo $this->config->get('RGen_subMenu1_item3'); ?></a></li>
			
			<?php }if ($this->config->get('RGen_subMenu1_item4') != ''){ ?>
			<li><a <?php if ($this->config->get('RGen_subMenu1_item_url4') != '') { ?>href="<?php echo $this->config->get('RGen_subMenu1_item_url4'); ?>"<?php } ?> class="sub-lvl"><?php echo $this->config->get('RGen_subMenu1_item4'); ?></a></li>
			
			<?php }if ($this->config->get('RGen_subMenu1_item5') != ''){ ?>
			<li><a <?php if ($this->config->get('RGen_subMenu1_item_url5') != '') { ?>href="<?php echo $this->config->get('RGen_subMenu1_item_url5'); ?>"<?php } ?> class="sub-lvl"><?php echo $this->config->get('RGen_subMenu1_item5'); ?></a></li>
			
			<?php }if ($this->config->get('RGen_subMenu1_item6') != ''){ ?>
			<li><a <?php if ($this->config->get('RGen_subMenu1_item_url6') != '') { ?>href="<?php echo $this->config->get('RGen_subMenu1_item_url6'); ?>"<?php } ?> class="sub-lvl"><?php echo $this->config->get('RGen_subMenu1_item6'); ?></a></li>
			
			<?php }if ($this->config->get('RGen_subMenu1_item7') != ''){ ?>
			<li><a <?php if ($this->config->get('RGen_subMenu1_item_url7') != '') { ?>href="<?php echo $this->config->get('RGen_subMenu1_item_url7'); ?>"<?php } ?> class="sub-lvl"><?php echo $this->config->get('RGen_subMenu1_item7'); ?></a></li>
			
			<?php }if ($this->config->get('RGen_subMenu1_item8') != ''){ ?>
			<li><a <?php if ($this->config->get('RGen_subMenu1_item_url8') != '') { ?>href="<?php echo $this->config->get('RGen_subMenu1_item_url8'); ?>"<?php } ?> class="sub-lvl"><?php echo $this->config->get('RGen_subMenu1_item8'); ?></a></li>
			
			<?php }if ($this->config->get('RGen_subMenu1_item9') != ''){ ?>
			<li><a <?php if ($this->config->get('RGen_subMenu1_item_url9') != '') { ?>href="<?php echo $this->config->get('RGen_subMenu1_item_url9'); ?>"<?php } ?> class="sub-lvl"><?php echo $this->config->get('RGen_subMenu1_item9'); ?></a></li>
			
			<?php }if ($this->config->get('RGen_subMenu1_item10') != ''){ ?>
			<li><a <?php if ($this->config->get('RGen_subMenu1_item_url10') != '') { ?>href="<?php echo $this->config->get('RGen_subMenu1_item_url10'); ?>"<?php } ?> class="sub-lvl"><?php echo $this->config->get('RGen_subMenu1_item10'); ?></a></li>
			
			<?php } ?>
		</ul>
	</div>
	<?php } ?>
</li>
<?php } else {

$i = 1;
$l_id = $this->config->get('config_language_id');
$RGen_ddMenu = $this->document->RGen_ddMenu;

if ($this->config->get('RGen_customMenu_status') == 1) { 
if ($RGen_ddMenu[$l_id]['name']) { 
?><li>
	<a href="<?php echo $RGen_ddMenu[$l_id]['url']; ?>" class="top-lvl"><?php echo $RGen_ddMenu[$l_id]['name']; ?></a>
	<div class="sub-menu">
		<ul>
			<?php $i = 1; foreach ($RGen_ddMenu[$l_id]['ddMenuItems'] as $item) { ?>
			<?php if ($item['name']){ ?>
			<li><a href="<?php echo $item['url']; ?>" title="<?php echo $item['name']; ?>" class="sub-lvl"><?php echo $item['name']; ?></a></li>
			<?php } ?>
			<?php $i++; } ?>
		</ul>
	</div>
</li>
<?php } } ?>

<?php } ?>