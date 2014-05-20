	</div>
	<?php $rgen_optimize = $this->config->get('RGen_optimize'); ?>
	<!-- <div class="content-body-wrapper"> close -->
	<div class="footer-wrapper">
		<?php 
			$On_customFT = $this->config->get('RGen_FT_Status');
			
			if ($On_customFT == 1 && $getRoute == 'common/home') {
				require_once VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_theme.tpl');
			}elseif ($On_customFT == 1 && $this->config->get('RGen_FT_Status_home') == 'all') {
				require_once VQMod::modCheck('catalog/view/theme/rgen-opencart/template/module/rgen_theme.tpl');
			}
		?>
		<?php  ?>

		<footer id="footer">
			<?php if ($informations) { ?>
			<div class="column">
				<h3 class="header-3"><?php echo $text_information; ?></h3>
				<ul>
					<?php foreach ($informations as $information) { ?>
					<li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
					<?php } ?>
				</ul>
			</div>
			<?php } ?>
			<div class="column">
				<h3 class="header-3"><?php echo $text_service; ?></h3>
				<ul>
					<li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
					<li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
					<li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
				</ul>
			</div>
			<div class="column">
				<h3 class="header-3"><?php echo $text_extra; ?></h3>
				<ul>
					<li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
					<li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
					<li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>
					<li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
				</ul>
			</div>
			<div class="column">
				<h3 class="header-3"><?php echo $text_account; ?></h3>
				<ul>
					<li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
					<li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
					<li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
					<li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
				</ul>
			</div>
			
			<?php if ($this->config->get('FT_Contact_status') == '1') { ?>
			<div class="column contact-info">
				<ul>
					<?php if ($this->config->get('FT_Contact_phStatus') == '1') { ?>
					<li>
						<span class="ph-image" title="Phone"></span>
						<span class="ph-text">
							<?php echo $this->config->get('FT_Contact_ph'); ?><br />
							<?php echo $this->config->get('FT_Contact_ph1'); ?>
						</span>
					</li>
					<?php } ?>
					
					<?php if ($this->config->get('FT_Contact_faxStatus') == '1') { ?>
					<li>
						<span class="fax-image" title="Fax"></span>
						<span class="fax-text">
							<?php echo $this->config->get('FT_Contact_fax'); ?> 
							<?php echo $this->config->get('FT_Contact_fax1'); ?>
						</span>
					</li>
					<?php } ?>
					
					<?php if ($this->config->get('FT_Contact_emailStatus') == '1') { ?>
					<li>
						<span class="email-image" title="Email us"></span>
						<a href="mailto:<?php echo $this->config->get('FT_Contact_email'); ?>" class="email-text"><?php echo $this->language->get('text_emailus'); ?></a></span>
					</li>
					<?php } ?>

				</ul>
			</div>
			<?php } ?>
			
		</footer>
		<?php
		/* ABOVE SOCIAL CONTENT
		******************************/
		echo isset($rgen_footer)?$rgen_footer:null;
		?>
		<div class="footer-bt">
			<table>
				<tr>
					<td class="social-wrp">
						<?php if ($this->config->get('socialLink_fb_Status') == '1') : ?>
						<a href="<?php echo $this->config->get('socialLink_fb'); ?>" target="_blank" class="facebook-icon"></a>
						<?php endif; ?>
						
						<?php if ($this->config->get('socialLink_twitter_Status') == '1') : ?>
						<a href="<?php echo $this->config->get('socialLink_twitter'); ?>" target="_blank" class="twitter-icon"></a>
						<?php endif; ?>
						
						<?php if ($this->config->get('socialLink_youtube_Status') == '1') : ?>
						<a href="<?php echo $this->config->get('socialLink_youtube'); ?>" target="_blank" class="youtube-icon"></a>
						<?php endif; ?>
						
						<?php if ($this->config->get('socialLink_google_Status') == '1') : ?>
						<a href="<?php echo $this->config->get('socialLink_google'); ?>" target="_blank" class="google-icon"></a>
						<?php endif; ?>
						
						<?php if ($this->config->get('socialLink_flickr_Status') == '1') : ?>
						<a href="<?php echo $this->config->get('socialLink_flickr'); ?>" target="_blank" class="flickr-icon"></a>
						<?php endif; ?>

						<?php if ($this->config->get('socialLink_pintrest_Status') == '1') : ?>
						<a href="<?php echo $this->config->get('socialLink_pintrest'); ?>" target="_blank" class="pintrest-icon"></a>
						<?php endif; ?>

						<?php if ($this->config->get('socialLink_yahoo_Status') == '1') : ?>
						<a href="<?php echo $this->config->get('socialLink_yahoo'); ?>" target="_blank" class="yahoo-icon"></a>
						<?php endif; ?>

						<?php if ($this->config->get('socialLink_thumblr_Status') == '1') : ?>
						<a href="<?php echo $this->config->get('socialLink_thumblr'); ?>" target="_blank" class="tumblr-icon"></a>
						<?php endif; ?>

						<?php if ($this->config->get('socialLink_insta_Status') == '1') : ?>
						<a href="<?php echo $this->config->get('socialLink_insta'); ?>" target="_blank" class="insta-icon"></a>
						<?php endif; ?>

						<?php if ($this->config->get('socialLink_linkedin_Status') == '1') : ?>
						<a href="<?php echo $this->config->get('socialLink_linkedin'); ?>" target="_blank" class="linkedin-icon"></a>
						<?php endif; ?>

						<?php if ($this->config->get('socialLink_vimeo_Status') == '1') : ?>
						<a href="<?php echo $this->config->get('socialLink_vimeo'); ?>" target="_blank" class="vimeo-icon"></a>
						<?php endif; ?>

						<?php if ($this->config->get('socialLink_mailTo_Status') == '1') : ?>
							<a class="mailto-icon addthis_button_email"></a>
						<?php endif; ?>
						
						<?php if ($this->config->get('socialLink_addThis_Status') == '1') { ?>
							<a class="addthis-icon addthis_button_compact"></a>
							<script type="text/javascript" src="//s7.addthis.com/js/250/addthis_widget.js"></script> 
						<?php } ?>
						
						<?php if(isset($this->document->RGen_social)) { ?>
							<?php foreach ($this->document->RGen_social as $result) { ?>
							<?php if($result && $result['status'] == 1) { ?>
							<a <?php if($result['url']){ ?>href="<?php echo $result['url']; ?>"<?php } ?> <?php if($result['normal']){ ?>target="_blank" style="background-image:url(catalog/view/theme/rgen-opencart/image/rgen/social-icons/<?php echo $result['normal']; ?>);" data-icon="<?php echo $result['normal']; ?>"<?php } ?> <?php if($result['hover']){ ?>data-hover="<?php echo $result['hover']; ?>"<?php } ?> class="custom-icon"></a>
							<?php } ?>
							<?php } ?>
						<?php } ?>
						<script type="text/javascript">
						$('.custom-icon').each(function(index, element) {
							$(this).hover(
								function(){
									if($(this).attr('data-hover')){
									$(this).css("background-image", 'url(catalog/view/theme/rgen-opencart/image/rgen/social-icons/' + $(this).attr('data-hover') + ')'); 
									}
								},
								function(){
									if($(this).attr('data-icon')){
									$(this).css("background-image", 'url(catalog/view/theme/rgen-opencart/image/rgen/social-icons/' + $(this).attr('data-icon') + ')'); 
									}
								}
							);
						});
						</script>
						
					</td>
					<td class="cards">
						<?php 
						/* FOOTER CARDS
						******************************/
						if (isset($this->document->footer_cards)) {
						foreach ($this->document->footer_cards as $result) { ?>
						<div<?php echo isset($result['class']) ? 'class="'.$result['class'].'"' : null; ?>>
							<?php if(isset($result['description'][$this->config->get('config_language_id')])){ ?>
							<?php echo html_entity_decode($result['description'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8'); ?>
							<?php } ?>
						</div>
						<?php } } 
						?>
					</td>
				</tr>
			</table>

		</div>
		<div class="cp-text" id="powered"><?php echo $powered; ?></div>
		
		<?php 
		/* BELOW FOOTER CONTENT
		******************************/
		if ($this->rgen->device != 'm') { echo isset($rgen_footer_bottom) ? $rgen_footer_bottom : null; }
		?>
		
	</div><!-- <div class="footer-wrapper"> close -->
</div><!-- <div id="container"> close -->
<?php if ($this->config->get('RGen_CustomJS') != '' && $this->config->get('RGen_CustomJS_Status') == 1) { 
	echo htmlspecialchars_decode($this->config->get('RGen_CustomJS'), ENT_QUOTES );
} ?>

<?php if ($this->config->get('RGen_scrollTop_status') == '1') { ?>
<span class="scroll-top"></span>
<?php } ?>

<?php
/* LEFT OR RIGHT CONTENT
******************************/
if ($this->rgen->device != 'm') { echo isset($rgen_sticky) ? $rgen_sticky : null; }
?>

</body>
<!-- <?php echo $this->config->get('rgen_theme_version') ? $this->config->get('rgen_theme_version') : 'RGEN THEME'; ?> -->
</html>
