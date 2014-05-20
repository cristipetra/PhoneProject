<?php 
$Active_modules = $this->config->get('RGen_FT_about_Status') + $this->config->get('RGen_FT_fb_Status') + $this->config->get('RGen_FT_twitter_Status');
$l_id = $this->config->get('config_language_id');

if ($this->config->get('RGen_FT_Status') == '1') { ?>
<div class="custom-footer column-<?php echo $Active_modules; ?>">
	
	<?php if ($this->config->get('RGen_FT_about_Status') == '1') : ?>
	
	<div id="aboutus-content" class="column">
		<?php if($this->config->get('FT_about_Text') != ''){ ?>
			<h2 class="header-2"><?php echo $this->config->get('FT_about_Title'); ?></h2>
			<p><?php echo html_entity_decode($this->config->get('FT_about_Text')); ?></p>
		<?php }else{
			if (isset($this->document->RGen_CustomFt[$l_id]['ftAbout_title'])) { ?>
			<h2 class="header-2"><?php echo $this->document->RGen_CustomFt[$l_id]['ftAbout_title']; ?></h2>	
			<?php } 
			if (isset($this->document->RGen_CustomFt[$l_id]['ftAbout'])) { ?>
			<div><?php echo htmlspecialchars_decode($this->document->RGen_CustomFt[$l_id]['ftAbout'], ENT_QUOTES ); ?></div>
			<?php }	?>
		<?php } ?>
	</div>
	
	<?php endif; ?>
	
    <!--  TWITTER -->
	<?php if($this->config->get('RGen_FT_twitter_Status') == '1'): ?>
	<div id="twitter" class="column">
		<h2 class="header-2"><?php echo $this->config->get('FT_twitter_Title'); ?></h2>
		
		<a class="twitter-timeline" <?php if($this->config->get('FT_twitter_linkcolor') != ''){ ?>data-link-color="#<?php echo $this->config->get('FT_twitter_linkcolor'); ?>"<?php }else{ ?>data-link-color="#944737"<?php } ?> href="https://twitter.com/<?php echo $this->config->get('FT_twitter_User'); ?>" data-chrome="noheader nofooter noborders noscrollbar transparent" data-theme="<?php echo $this->config->get('FT_twitter_theme'); ?>" data-tweet-limit="<?php echo $this->config->get('FT_twitter_Tweets'); ?>" data-related="twitterapi,twitter" data-aria-polite="assertive" data-widget-id="<?php echo $this->config->get('FT_twitter_widgetid'); ?>">Tweets by @<?php echo $this->config->get('FT_twitter_User'); ?></a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		<a target="_blank" href="http://twitter.com/#!/<?php echo $this->config->get('FT_twitter_User'); ?>"><?php echo $this->language->get('follow_twitter'); ?></a>
	</div>
	<?php endif; ?>
    
    
    <!--  FACEBOOK -->
	<?php if ($this->config->get('RGen_FT_fb_Status') == '1') { 
	$colW = (940-(($Active_modules-1) * 60)) / $Active_modules;
	?>
	<div id="facebook-block" class="column fan_box">
		<h2 class="header-2"><?php echo $this->config->get('FT_fb_Title'); ?></h2>
		<div class="facebook-block">
			<?php 
			$htmlData_FT_fb_code = $this->config->get('htmlData_FT_fb_code');
			echo htmlspecialchars_decode(isset($htmlData_FT_fb_code) ? $htmlData_FT_fb_code : null, ENT_QUOTES ); ?>
			<script>
			$(document).ready(function(){
				$(".facebook-block iframe").css({width:$(".facebook-block").width()});
			});
			$(window).resize(function(){
				$(".facebook-block iframe").css({width:$(".facebook-block").width()});
			});
			</script>

		</div>
	</div>
	<?php } ?>
    
	<div class="clearfix"></div>
</div>
<?php } ?>