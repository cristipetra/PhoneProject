<?php if ($this->config->get('RGen_informationMenu_status') == 1) { ?>
<li>
	<a class="top-lvl"><?php echo $this->language->get('text_information'); ?></a>
	<div class="sub-menu">
		<ul>
		<?php foreach ($this->document->RGen_infoMenu as $information) { ?>
		<li><a href="<?php echo $information['href']; ?>" class="sub-lvl"><?php echo $information['title']; ?></a></li>
		<?php } ?>
		</ul>
	</div>
</li>
<?php } ?>