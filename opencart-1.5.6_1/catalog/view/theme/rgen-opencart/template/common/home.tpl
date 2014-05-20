<?php if(class_exists('VQMod')) { ?>
<?php echo $header; ?>
<?php
if ($this->config->get('RGen_bannerPosition') == 'onslide') { 
	$bnrOnSlide = " bnr-onslide";
}else {
	$bnrOnSlide = "";
}
?>
<?php if ($this->config->get('RGen_SlideShow_Type') == 'wf-full') { ?>
<div id="content" class="store-home wf-full-slideshow<?php echo $bnrOnSlide; ?>">
<?php } elseif($this->config->get('RGen_SlideShow_Type') == 'w-full') { ?>
<div id="content" class="store-home w-full-slideshow<?php echo $bnrOnSlide; ?>">
<?php } elseif($this->config->get('RGen_SlideShow_Type') == 'full') { ?>
<div id="content" class="store-home full-slideshow<?php echo $bnrOnSlide; ?>">
<?php } elseif($this->config->get('RGen_SlideShow_Type') == 'medium') { ?>
<div id="content" class="store-home medium-slideshow<?php echo $bnrOnSlide; ?>">
<?php } elseif($this->config->get('RGen_SlideShow_Type') == 'normal') { ?>
<div id="content" class="store-home small-slideshow<?php echo $bnrOnSlide; ?>">
<?php } elseif($this->config->get('RGen_SlideShow_Type') == 'beside_bnr') { ?>
<div id="content" class="store-home beside-bnr-slideshow">
<?php } else { ?>
<div id="content" class="store-home">
<?php } ?>
	
	<!--CONTENT LEFT -->
	<?php echo $column_left; ?>
	
	<!--CONTENT RIGHT -->
	<?php echo $column_right; ?>
	
	<!--PAGE CONTENT WRAPPER -->
	<div class="content-body">
		<h1 style="display: none;"><?php echo $heading_title; ?></h1>
		<?php echo $content_top; ?>
	
	</div>
	
	<?php echo $content_bottom; ?>
</div>

<?php echo $footer; ?>
<?php }else{ ?>
<div style="font-family:arial; font-size:16px; line-height:2; color:#7c4a4a; text-align:center; padding:20px; background:#ffdbdb; border:1px solid #e06b6b; border-radius:10px; width:500px; margin:30px auto;">
	vQmod not installed.<br>
	Please install <strong><a href="https://code.google.com/p/vqmod/" target="_blank">vQmod-OpenCart 2.4.1+</a></strong> to run theme.
</div>
<?php } ?>