<?php 
if (isset($setting['mod_id'])) {
	$this->document->addStyle('//fonts.googleapis.com/css?family=Open+Sans:300,400,700,800');

	$l_id 	= $this->config->get('config_language_id');
	$mod_id = $setting['mod_id'];
	$revo 	= $this->document->RGen_revoslider[$mod_id];
	$js 	= $js[$mod_id];

	// Slides data
	if(isset($slides[$mod_id])){
		$slides_config = $slides[$mod_id]['slide_config'];
		$slides_attr = $slides[$mod_id]['slide_attr'];
	}

	// Caption data
	if(isset($captions[$mod_id])){
		$captions_config = $captions[$mod_id];
	}else{
		$captions_config = '';
	}

	// Caption attributes	
	if(isset($cp_attr[$mod_id])){
		$captions_attr = $cp_attr[$mod_id];
	}else{
		$captions_attr='';
	}

	// Caption styles
	if(isset($css_config[$mod_id])){
		$captions_style = $css_config[$mod_id];
	}else{
		$captions_style='';
	}

	$prdonslide = isset($setting['prdonrevo']) && $setting['prdonrevo'] == 1 ? ' prdonrevo' : null;
?>

<style scoped>
<?php 
if (isset($setting['mod_id'])) { ?>
#rgen-revo<?php echo $module; ?> .revo-slides{
	<?php echo isset($setting['slider_w']) && $setting['slider_w'] != '' ? "max-width:" . $setting['slider_w'] . "px;" : null; ?>
	<?php echo isset($setting['slider_h']) && $setting['slider_h'] != '' ? "max-height:" . $setting['slider_h'] . "px;" : null; ?>
}
<?php }
if ($captions_style) {
	foreach ($captions_style as $value) { echo $value['css']; $value['fonturl']; } 
} ?>
</style>
<div class="revo-slideshow-wrapper<?php	

	echo ' ' . $setting['slider_size'];
	if ($setting['slider_size'] == 'rv-bb') { ?> beside-slideshow<?php };
	echo $prdonslide;

	?>" id="rgen-revo<?php echo $module; ?>">
	<?php if ($prdonslide == ' prdonrevo') { ?>
	<div class="revo-prdonslide"></div>
	<?php } ?>
	<div class="responsive<?php	echo $rvclass ?>">
		<div class="revo-slides">
			<ul>
				<?php 
				$attr = 0;
				if(isset($slides[$mod_id])){
				foreach ($slides_config as $slide) { 
				if(isset($slide) && $slide['status'] == 1){
				?>
				<li<?php if (isset($slides_attr[$slide['slide_id']])) {echo $slides_attr[$slide['slide_id']];} ?>>
					
					<?php /* Slide image
					******************************/
					if($slide['slideimage'] != ""){ ?>
					<img src="catalog/view/theme/rgen-opencart/revo/rs-plugin/images/dummy.png" data-lazyload="image/<?php echo $slide['slideimage']; ?>" <?php 
						echo isset($slide['bgrepeat']) ? $slide['bgrepeat'] : null;
						echo isset($slide['bgfit']) ? $slide['bgfit'] : null;
						echo isset($slide['bgposition']) ? $slide['bgposition'] : null;
					?>>
					<?php } else { ?>
					<img src="catalog/view/theme/rgen-opencart/revo/rs-plugin/images/transparent.png" <?php echo $slide['slidebg']; ?>>
					<?php } ?>

					<?php /* Slide captions
					******************************/
					$cp_attr = 0;
					
					if (isset($captions_config[$slide['slide_id']])) {
						foreach ($captions_config[$slide['slide_id']] as $caption) { 
							if (isset($caption) && $caption['status'] == 1) { 
							?><div class="caption tp-caption<?php 
								echo ' cp-' . $mod_id . '-' . $attr . $cp_attr;
								echo $caption['animation'];
								echo ' '. $caption['cptext_cssclass'];
								if($caption['cptype'] == 'video'){ echo $caption['cpvideo_size']; }
							?>"<?php 
									if (isset($captions_attr[$slide['slide_id']])) {
										echo $captions_attr[$slide['slide_id']]['cp'.$cp_attr];
									}
								?>>
								<?php 
									if($caption['cptype'] == "text"){
										if($caption['link'] != ""){
											echo '<a href="' . $caption['link'] . '"' . $caption['linkopen'] . ' style="font-size: inherit; color: inherit; text-decoration: inherit;">' . $caption['cptext'] . '</a>';
										}else{
											echo $caption['cptext'];
										}
									}elseif ($caption['cptype'] == "image") {
										if($caption['link'] != ""){
											echo '<a href="' . $caption['link'] . '"' . $caption['linkopen'] . ' style="font-size: inherit; color: inherit; text-decoration: inherit;"><img src="' . $caption['cpimage'] . '"></a>';
										}else{
											echo '<img src="' . $caption['cpimage'] . '">';
										}
									}else{
										echo $caption['cpvideo'];
									}
								?>
							</div>
					<?php }
						$cp_attr++;
						}
					} ?>

				</li>
				<?php } $attr++; } } ?>
		  </ul>
		  <div class="tp-bannertimer<?php echo isset($revo['timerPos']) && $revo['timerPos'] == 'b' ? ' tp-bottom' : null; ?>"></div>
		</div>
	</div>
	<?php if ($setting['slider_size'] == 'rv-bb' && $this->config->get('RGen_bannerPosition') == 'beside' && $getRoute == 'common/home') { ?>
	<div class="banner-beside"></div>
	<?php } ?>
</div>

<?php if(isset($slides[$mod_id]['slide_config'])){ ?>
<script>
	var api;
	jQuery(document).ready(function() {

		/* Banner position related options */
		<?php if ($this->config->get('RGen_bannerPosition') == 'below') { ?>
		$('#banner0').css({opacity:0}).appendTo('.revo-slideshow-wrapper').end().animate({opacity:1}, 500);
		<?php } ?>
		<?php if ($this->config->get('RGen_bannerPosition') == 'beside') { ?>
		$('#banner0').css({opacity:0}).appendTo('.revo-slideshow-wrapper .banner-beside').end().animate({opacity:1}, 500, function(){
			$('.revo-slideshow-wrapper.beside-slideshow').css({minHeight: $('.revo-slideshow-wrapper .banner-beside').outerHeight()});
		});
		<?php } ?>

		<?php 
		/* Window full size or window full width size */
		if ($setting['slider_size'] == 'rv-wfs' || $setting['slider_size'] == 'rv-wfws'){ ?>
			function setfullwidth(){
				<?php if ($this->config->get('RGen_reaponsive_status') == 1) { ?>
				var fullWidth = Math.floor(($(window).width() - $('.content-body-wrapper').width())/2);
				$('#rgen-revo<?php echo $module; ?>').css({marginLeft: -fullWidth, marginRight: -fullWidth});
				$('#rgen-revo<?php echo $module; ?>').css({opacity:0}).prependTo('.content-body-wrapper').end().animate({opacity:1}, 500);
				<?php }else{ ?>
				if ($(window).width() > 980) {
					var fullWidth = Math.floor(($(window).width() - $('.content-body-wrapper').width())/2);
					$('#rgen-revo<?php echo $module; ?>').css({marginLeft: -fullWidth, marginRight: -fullWidth});
					$('#rgen-revo<?php echo $module; ?>').css({opacity:0}).prependTo('.content-body-wrapper').end().animate({opacity:1}, 500);		
				};
				<?php } ?>
			}
		<?php } ?>

		<?php 
		/* Top margin for window full size */
		if ($setting['slider_size'] == 'rv-wfs'){ ?>
			function topMargin(){
				<?php if (isset($setting['slider_offset']) && $setting['slider_offset'] != ''){ ?>
				$('#rgen-revo<?php echo $module; ?> .fullscreen-container').css({marginTop: 0});
				<?php } else { ?>
				$('body').addClass('revo-fs');
				$('#rgen-revo<?php echo $module; ?> .fullscreen-container').css({marginTop: -$('#header-wrapper').outerHeight()});
				<?php } ?>
			}
		<?php }
		/* Top margin for page full size */
		if ($setting['slider_size'] == 'rv-pfs'){ ?>
			function topMargin() {
				$('body').addClass('revo-pfs');
				$('#rgen-revo<?php echo $module; ?>').css({opacity:0}).prependTo('#content').end().animate({opacity:1}, 500);
				$('#rgen-revo<?php echo $module; ?> .bannercontainer').css({marginTop: -$('#header-wrapper').outerHeight()});
				/*var sldOffset = $('#rgen-revo<?php echo $module; ?>').offset();
				var top = sldOffset.top - $('#header-wrapper').outerHeight() - $('.tp-wrp').outerHeight();
				$('#rgen-revo<?php echo $module; ?> .bannercontainer').css({marginTop: -($('#header-wrapper').outerHeight() + top)});*/
			}
		<?php }  ?>
		/* Top margin for page full width size */
		<?php if ($setting['slider_size'] == 'rv-pfws'){ ?>
			function pagefullwidth(){
				//$('#rgen-revo<?php echo $module; ?>').css({opacity:0}).prependTo('.content-body-wrapper').end().animate({opacity:1}, 500);
			}
		<?php }  ?>
		
		function revo(fw,fs){
			$(".revo-slides").css({'opacity':1});
			api = jQuery('#rgen-revo<?php echo $module; ?> .revo-slides').revolution({
				<?php echo $js; ?> hideThumbs:300,
				fullWidth: fw,
				fullScreen: fs,
				hideArrowsOnMobile: "on",
				hideBulletsOnMobile: "off",
				startwidth: <?php echo isset($setting['slider_cpw']) && $setting['slider_cpw'] != '' ? $setting['slider_cpw'] : '1170'; ?>,
				startheight: <?php echo isset($setting['slider_cph']) && $setting['slider_cph'] != '' ? $setting['slider_cph'] : '600'; ?>,
				<?php echo isset($setting['slider_offset']) && $setting['slider_offset'] != '' ? 'fullScreenOffsetContainer: "' . $setting['slider_offset'] . '",' : null ; ?> navigationType:"both",
				navigationVOffset: 0,
				touchenabled:"on",
				stopAtSlide:-1,
				stopAfterLoops:-1,
				shadow:0,
				autoHeight: <?php echo isset($setting['slider_h']) && $setting['slider_h'] != '' ? '"off"' : '"on"'; ?>
			});
		}
		<?php if ($this->config->get('RGen_reaponsive_status') == 1) { ?>
			enquire.register("only screen and (max-width: 1024px)", {
					match : function() {
						if ($('#rgen-revo<?php echo $module; ?>').hasClass('rv-wfs') == true) {
							$('#rgen-revo<?php echo $module; ?>').addClass('normal');
							$('#rgen-revo<?php echo $module; ?> .responsive').removeClass('fullscreen-container').addClass('bannercontainer');
						}else if($('#rgen-revo<?php echo $module; ?>').hasClass('rv-wfws') == true){
							$('#rgen-revo<?php echo $module; ?>').addClass('normal');
							$('#rgen-revo<?php echo $module; ?> .responsive').removeClass('fullwidthbanner-container').addClass('bannercontainer');
						};
						<?php if ($setting['slider_size'] == 'rv-pfws'){ ?>
						pagefullwidth();
						<?php }  ?>
						<?php if ($setting['slider_size'] == 'rv-bb'){ ?>
						//$('#rgen-revo<?php echo $module; ?>').addClass('beside-slideshow');
						<?php }  ?>
						<?php if ($setting['slider_size'] == 'rv-pfs'){ ?>
						topMargin();
						<?php } ?>
						var fw = "off";
						var fs = "off";
						revo(fw,fs);
					}
				}).register("only screen and (min-width: 1025px)", {
					match : function() {
						<?php if ($setting['slider_size'] == 'rv-wfws' || $setting['slider_size'] == 'rv-wfs'){ ?>
						setfullwidth();
						$(window).resize(function(){setfullwidth();});
						<?php } ?>

						<?php if ($setting['slider_size'] == 'rv-wfs' || $setting['slider_size'] == 'rv-pfs'){ ?>
						topMargin();
						<?php } ?>

						<?php if ($setting['slider_size'] == 'rv-pfws'){ ?>
						pagefullwidth();
						<?php }  ?>
						
						if ($('#rgen-revo<?php echo $module; ?>').hasClass('rv-wfs') == true) {
							$('#rgen-revo<?php echo $module; ?>').removeClass('normal');
							$('#rgen-revo<?php echo $module; ?> .responsive').removeClass('bannercontainer').addClass('fullscreen-container');
						}else if($('#rgen-revo<?php echo $module; ?>').hasClass('rv-wfws') == true){
							$('#rgen-revo<?php echo $module; ?>').removeClass('normal');
							$('#rgen-revo<?php echo $module; ?> .responsive').removeClass('bannercontainer').addClass('fullwidthbanner-container');
						};

						var fw = <?php echo isset($setting['slider_size']) && $setting['slider_size'] == 'rv-wfws' ? '"on"' : '"off"'; ?>;
						var fs = <?php echo isset($setting['slider_size']) && $setting['slider_size'] == 'rv-wfs' ? '"on"' : '"off"'; ?>;
						revo(fw,fs);
					}
				}).register("only screen and (min-width: 768px) and (max-width: 979px)", {
					match : function() {
						if ($('#rgen-revo<?php echo $module; ?>').hasClass('rv-wfs') == true) {
							$('#rgen-revo<?php echo $module; ?>').addClass('normal');
							$('#rgen-revo<?php echo $module; ?> .responsive').removeClass('fullscreen-container').addClass('bannercontainer');
						}else if($('#rgen-revo<?php echo $module; ?>').hasClass('rv-wfws') == true){
							$('#rgen-revo<?php echo $module; ?>').addClass('normal');
							$('#rgen-revo<?php echo $module; ?> .responsive').removeClass('fullwidthbanner-container').addClass('bannercontainer');
						};
						<?php if ($setting['slider_size'] == 'rv-pfws'){ ?>
						pagefullwidth();
						<?php }  ?>
						<?php if ($setting['slider_size'] == 'rv-pfs'){ ?>
						topMargin();
						<?php }  ?>
						var fw = "off";
						var fs = "off";
						revo(fw,fs);
					}
				}).register("only screen and (min-width: 200px) and (max-width: 767px)", {
					match : function() {
						if ($('#rgen-revo<?php echo $module; ?>').hasClass('rv-wfs') == true) {
							$('#rgen-revo<?php echo $module; ?>').addClass('normal');
							$('#rgen-revo<?php echo $module; ?> .responsive').removeClass('fullscreen-container').addClass('bannercontainer');
						}else if($('#rgen-revo<?php echo $module; ?>').hasClass('rv-wfws') == true){
							$('#rgen-revo<?php echo $module; ?>').addClass('normal');
							$('#rgen-revo<?php echo $module; ?> .responsive').removeClass('fullwidthbanner-container').addClass('bannercontainer');
						};
						<?php if ($setting['slider_size'] == 'rv-pfws'){ ?>
						pagefullwidth();
						<?php }  ?>
						<?php if ($setting['slider_size'] == 'rv-pfs'){ ?>
						topMargin();
						<?php }  ?>
						var fw = "off";
						var fs = "off";
						revo(fw,fs);
					},
				unmatch : function() { }
			}).listen();
		<?php }else{ ?>
			<?php if ($setting['slider_size'] == 'rv-wfws' || $setting['slider_size'] == 'rv-wfs'){ ?>
			setfullwidth();
			$(window).resize(function(){setfullwidth();});
			<?php } ?>
			
			<?php if ($setting['slider_size'] == 'rv-wfs' || $setting['slider_size'] == 'rv-pfs'){ ?>
			topMargin();
			<?php } ?>

			var fw = <?php echo isset($setting['slider_size']) && $setting['slider_size'] == 'rv-wfws' ? '"on"' : '"off"'; ?>;
			var fs = <?php echo isset($setting['slider_size']) && $setting['slider_size'] == 'rv-wfs' ? '"on"' : '"off"'; ?>;
			revo(fw,fs);
		<?php } ?>
	});
</script>
<?php } ?>

<?php } ?>