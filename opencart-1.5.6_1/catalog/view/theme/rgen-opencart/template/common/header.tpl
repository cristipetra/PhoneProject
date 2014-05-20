<?php 
$rgen_optimize = $this->config->get('RGen_optimize');
if(class_exists('VQMod')) {
$tplPath = 'catalog/view/theme/rgen-opencart/template/';
$cssPath = 'catalog/view/theme/rgen-opencart/stylesheet/';
$jsPath = 'catalog/view/theme/rgen-opencart/js/';

$cl = $this->rgen->device;
if ($this->config->get('RGen_reaponsive_status') == 1) {
	$w_status = $this->config->get('RGen_wide_layout');
	$widely = isset($w_status) && $w_status == 1 ? 'wide-ly' : null;
}else{
	$widely = '';
} ?>
<!DOCTYPE html>
<!-- <?php echo $this->config->get('rgen_theme_version') ? $this->config->get('rgen_theme_version') : 'RGEN THEME'; ?> -->
<!--[if lt IE 7]>      <html class="<?php echo $widely . ' '; ?>no-js lt-ie9 lt-ie8 lt-ie7" id="<?php echo $cl; ?>"> <![endif]-->
<!--[if IE 7]>         <html class="<?php echo $widely . ' '; ?>no-js lt-ie9 lt-ie8" id="<?php echo $cl; ?>"> <![endif]-->
<!--[if IE 8]>         <html class="<?php echo $widely . ' '; ?>no-js lt-ie9" id="<?php echo $cl; ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html dir="<?php echo $direction; ?>" id="<?php echo $cl; ?>" class="<?php echo $widely . ' '; ?>no-js" lang="<?php echo $lang; ?>" xml:lang="<?php echo $lang; ?>"> <!--<![endif]-->

<head>
	<title><?php echo $title; ?></title>
	<base href="<?php echo $base; ?>" />
	
	<meta charset="UTF-8" />
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	
	<?php if ($this->config->get('RGen_reaponsive_status') == 1) { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php } ?>
	
	<?php if ($description) { ?><meta name="description" content="<?php echo $description; ?>" /><?php } ?>
	<?php if ($keywords) { ?><meta name="keywords" content="<?php echo $keywords; ?>" /><?php } ?>
	<?php if ($icon) { ?><link href="<?php echo $icon; ?>" rel="icon" /><?php } ?>
	<?php foreach ($links as $link) { ?><link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" /><?php } ?>

	<?php /* ALL CSS FILES 
	******************************/	?>
	<link href='//fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<?php if($rgen_optimize['css'] == 1) {
		$this->rgen->cssGroup('catalog/view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css');
		$this->rgen->cssGroup($cssPath.'stylesheet.css');
		$this->rgen->cssGroup($cssPath.'nivo-slider.css');
		$this->rgen->cssGroup($cssPath.'bootstrap-grid.css');
		$this->rgen->cssGroup($cssPath.'snippets.css');
		$this->rgen->cssGroup($cssPath.'colorbox.css');
		$this->rgen->cssGroup($cssPath.'grids.css');
		$this->rgen->cssGroup($cssPath.'owl.carousel.css');
		$this->rgen->cssGroup($cssPath.'animate.css');
		// ICONS SPECIFIC
		$this->config->get('RGen_Icons') == 'vector' ? $this->rgen->cssGroup($cssPath.'icons.css') : $this->rgen->cssGroup($cssPath.'icons-images.css');
		// STORE HOME SPECIFIC
		$this->rgen->getRoute() == 'common/home' ? $this->rgen->cssGroup($cssPath.'store_home.css') : null;
		// MODULE SPECIFIC STYLES 
		foreach ($styles as $style) {
			if($style['href'] != 'catalog/view/theme/default/stylesheet/slideshow.css'){ 
				if (stripos($style['href'], "fonts.googleapis.com") == false) {
					$this->rgen->cssGroup($style['href']);
				}
			}
		} ?>
		<?php // BLOG MANAGER CSS ?>
		<?php // RESPONSIVE CSS
		if ($this->config->get('RGen_reaponsive_status') == 1 && $this->config->get('RGen_wide_layout') == 1){
			$this->config->get('RGen_wide_screensize') == 1400 ? 
			$this->rgen->cssGroup($cssPath.'wide1400.css') :
			$this->rgen->cssGroup($cssPath.'wide1200.css');
		}
		$this->config->get('RGen_reaponsive_status') == 1 ? $this->rgen->cssGroup($cssPath.'responsive.css') : null;
		?>
		<link rel="stylesheet" href="<?php echo $this->rgen->minCSS($this->rgen->cssFiles); ?>"/>

	<?php } else { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>stylesheet.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>nivo-slider.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>bootstrap-grid.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>snippets.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>colorbox.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>grids.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>owl.carousel.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>animate.css" />
		<?php if ($this->config->get('RGen_Icons') == 'vector') { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>icons.css" />
		<?php } else { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>icons-images.css" />
		<?php } ?>
	
		<?php 
		// STORE HOME STYLE
		$this->data ['getRoute'] = 'common/home';
		if (isset($this->request->get['route'])) {
			$this->data ['getRoute'] = $this->request->get['route'];
		} else {
			$this->data ['getRoute'] = 'common/home';
		}
		if($this->data ['getRoute'] == 'common/home'){ ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>store_home.css" />
		<?php } ?>
		
		<?php 
		// MODULE SPECIFIC STYLES 
		foreach ($styles as $style) { ?>
		<?php if($style['href'] == 'catalog/view/theme/default/stylesheet/slideshow.css'){ }else { ?>
		<link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
		<?php } ?>
		<?php } ?>
		<?php // BLOG MANAGER CSS ?>
		<?php /* RESPONSIVE CSS FILES 
		******************************/
		if ($this->config->get('RGen_reaponsive_status') == 1 && $this->config->get('RGen_wide_layout') == 1){
			if ($this->config->get('RGen_wide_screensize') == 1400) { ?>
			<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>cssminify1.php?files=wide1400.css" />	
			<?php } else{ ?>
			<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>cssminify1.php?files=wide1200.css" />
			<?php } ?>
		<?php } ?>
		<?php if ($this->config->get('RGen_reaponsive_status') == 1) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>cssminify1.php?files=responsive.css" />
		<?php } ?>

	<?php } ?>

	<?php if ($this->config->get('RGen_reaponsive_status') != 1) { ?>
	<style type="text/css">.revo-pfs #header-wrapper, .revo-fs #header-wrapper { background: none; }</style>
	<?php } ?>
	
	<?php 
	// MODULE SPECIFIC STYLES 
	foreach ($styles as $style) { ?>
	<?php if(stripos($style['href'], "fonts.googleapis.com") == true){ ?>
	<link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
	<?php } ?>
	<?php } ?>


	<?php /* ALL JS FILES 
	******************************/	?>
	<?php if($rgen_optimize['js'] == 1) { 
		$this->rgen->jsGroup($jsPath.'jquery.min.js');
		$this->rgen->jsGroup('catalog/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js');
		$this->rgen->jsGroup('catalog/view/javascript/jquery/ui/external/jquery.cookie.js');
		$this->rgen->jsGroup($jsPath.'plugins.js');
		$this->rgen->jsGroup($jsPath.'common.js');
		// MODULE SPECIFIC JS
		foreach ($scripts as $script) {
			if($script != 'catalog/view/javascript/jquery/nivo-slider/jquery.nivo.slider.pack.js'){ 
				$this->rgen->jsGroup($script);
			}
		}
		// RESPONSIVE JS
		if ($this->config->get('RGen_reaponsive_status') == 1) {
			$this->rgen->jsGroup($jsPath .'responsive.js');
		} ?>
		<script type="text/javascript" src="<?php echo $this->rgen->minJS($this->rgen->jsFiles); ?>"></script>
	<?php }else{ ?>
		<script type="text/javascript" src="<?php echo $jsPath; ?>jquery.min.js"></script>
		<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
		<script type="text/javascript" src="catalog/view/javascript/jquery/ui/external/jquery.cookie.js"></script>
		<script type="text/javascript" src="<?php echo $jsPath; ?>plugins.js"></script>
		<script type="text/javascript" src="<?php echo $jsPath; ?>common.js"></script>
		<?php foreach ($scripts as $script) { ?>
		<?php if($script != 'catalog/view/javascript/jquery/nivo-slider/jquery.nivo.slider.pack.js'){ ?>
		<script type="text/javascript" src="<?php echo $script; ?>"></script>
		<?php } ?>
		<?php } ?>
		<?php 
		// RESPONSIVE JS
		if ($this->config->get('RGen_reaponsive_status') == 1) { ?>
		<script type="text/javascript" src="<?php echo $jsPath; ?>responsive.js?01"></script>
		<?php } ?>
	<?php } ?>
	
	<?php if ($stores) { ?>
	<script type="text/javascript"><!--
		$(document).ready(function() {
		<?php foreach ($stores as $store) { ?>
		$('body').prepend('<iframe src="<?php echo $store; ?>" style="display: none;"></iframe>');
		<?php } ?>
		});
	//--></script>
	<?php } ?>
	
	<?php /* THEME OPTIONS STYLESHEETS
	**************************************/ ?>
	<?php if ($this->config->get('RGen_theme_optionStatus') == 1) { 

		// THEME 1 - DARK THEME
		?><?php if ($this->config->get('RGen_theme_option') == 1) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>cssminify1.php?files=dark-theme.css" />
		<?php if ($this->config->get('RGen_Icons') != 'vector') { ?>
		<link rel="stylesheet" type="text/css" href="catalog/view/theme/rgen-opencart/image/rgen/dark-theme/icon-images.css" />
		<?php } 

		// THEME 2 - LIGHT THEME
		?><?php } elseif ($this->config->get('RGen_theme_option') == 2) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>cssminify1.php?files=light-theme.css" />
		<?php if ($this->config->get('RGen_Icons') != 'vector') { ?>
		<link rel="stylesheet" type="text/css" href="catalog/view/theme/rgen-opencart/image/rgen/light-theme/icon-images.css" />
		<?php } ?>
		<?php if ($this->config->get('RGen_reaponsive_status') == 1) { ?>
		<style>
		@media only screen and (min-width: 200px) and (max-width: 767px) {
			/*a.home-btn, .home-btn { display: block; }*/
			#menu.mob-menu > span, #menu.mob-menu > ul {
				background-color: rgba(243, 117, 162, 1);
				color: #fff;
			}
			#menu > ul > li:hover > a.top-lvl, #menu > ul > li > a.top-lvl:hover, #menu > ul > li > a.top-lvl { color: #fff; }
		}
		</style>
		<?php } 

		// THEME 3 - KIDS THEME - FULL WIDTH
		?><?php } elseif ($this->config->get('RGen_theme_option') == 3) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>cssminify1.php?files=theme3.css" />
		<?php if ($this->config->get('RGen_Icons') != 'vector') { ?>
		<link rel="stylesheet" type="text/css" href="catalog/view/theme/rgen-opencart/image/rgen/kids/icon-images.css" />
		<?php } ?>
			<style>
			.bx .footer-bt, .bx #container, .wide-ly .bx #container, .wide-ly .bx .footer-bt { min-width:inherit; max-width:inherit; }
			<?php if ($this->config->get('RGen_reaponsive_status') == 1) { ?>
			@media only screen and (min-width: 200px) and (max-width: 979px) {
				.no-logo #menu, #menu { margin-bottom:0px; }
				.navigation-bar { background:none; }
				.no-logo #menu, #menu { width:auto; }
				.beside-bnr-slideshow .slideshow, .small-slideshow .slideshow { margin-top:0px; }
				#content.beside-bnr-slideshow, #content.full-slideshow, #content.medium-slideshow, #content.small-slideshow {
					padding-top:20px;	
				}
				.beside-slideshow .slideshow, .full-slideshow .slideshow, .medium-slideshow .slideshow, .small-slideshow .slideshow {
				margin-left:0px; margin-right:0px;
				}
			}
			@media only screen and (min-width: 1200px) {
				.content-body-wrapper { background-size: 1300px 1px;  }
			}
			<?php } ?>
			</style><?php

		// THEME 3 - KIDS THEME - BOXED
		?><?php } elseif ($this->config->get('RGen_theme_option') == 3.1) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>cssminify1.php?files=theme3.css" />
		<?php if ($this->config->get('RGen_Icons') != 'vector') { ?>
		<link rel="stylesheet" type="text/css" href="catalog/view/theme/rgen-opencart/image/rgen/kids/icon-images.css" />
		<?php } ?>
			<style>
			.content-body-wrapper { background:#fff; }
			@media only screen and (min-width: 980px) {
				#container {
					max-width:1080px;
					min-width:980px;
				}
			}
			
			<?php if ($this->config->get('RGen_reaponsive_status') == 1) { ?>
			@media only screen and (min-width: 200px) and (max-width: 979px) {
				.no-logo #menu, #menu { margin-bottom:0px; }
				.navigation-bar { background:none; }
				.no-logo #menu, #menu { width:auto; }
				.beside-bnr-slideshow .slideshow, .small-slideshow .slideshow { margin-top:0px; }
				#content.beside-bnr-slideshow, #content.full-slideshow, #content.medium-slideshow, #content.small-slideshow {
					padding-top:20px;	
				}
				.beside-slideshow .slideshow, .full-slideshow .slideshow, .medium-slideshow .slideshow, .small-slideshow .slideshow {
				margin-left:0px; margin-right:0px;
				}
			}
			<?php } ?>
			
			</style><?php

		// THEME 4 - B & W
		?><?php } elseif ($this->config->get('RGen_theme_option') == 4) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>cssminify1.php?files=theme4.css" />
		<?php if ($this->config->get('RGen_Icons') != 'vector') { ?>
		<link rel="stylesheet" type="text/css" href="catalog/view/theme/rgen-opencart/image/rgen/theme4/icon-images.css" />
		<?php } ?>
		<?php if ($this->config->get('RGen_reaponsive_status') == 1) { ?>
		<style type="text/css">
			@media only screen and (min-width: 200px) and (max-width: 979px) {
				.bx .footer-bt, .footer-bt { max-width: inherit; min-width: inherit; }
			}
		</style>
		<?php } ?>
		<?php

		// THEME 4 - B & W - BOXED
		?><?php } elseif ($this->config->get('RGen_theme_option') == 4.1) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>cssminify1.php?files=theme4.css" />
		<?php if ($this->config->get('RGen_Icons') != 'vector') { ?>
		<link rel="stylesheet" type="text/css" href="catalog/view/theme/rgen-opencart/image/rgen/theme4/icon-images.css" />
		<?php } ?>
		
		<?php if ($this->config->get('RGen_reaponsive_status') == 1) { ?>
		<style type="text/css">
		.fw .footer-bt, .fw #container { max-width:1080px; min-width:980px; }
		@media only screen and (min-width: 200px) and (max-width: 979px) {
			.bx .footer-bt, .footer-bt { max-width: inherit; min-width: inherit; }
		}
		</style>
		<?php } ?>

		<?php

		// THEME 5 - RETRO STYLE
		?><?php } elseif ($this->config->get('RGen_theme_option') == 5) { ?>
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>theme5.css" /> -->
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>theme5.php" />
		<?php if ($this->config->get('RGen_Icons') != 'vector') { ?>
		<link rel="stylesheet" type="text/css" href="catalog/view/theme/rgen-opencart/image/rgen/theme5/icon-images.php" />
		<?php } ?>
		<?php if ($this->config->get('RGen_reaponsive_status') == 1) { ?>
		<style type="text/css">
		@media only screen and (min-width: 200px) and (max-width: 767px) {
			.thm-5 .product-info .price-tax-y { height: auto; padding: 10px 0 10px 20px; }
		}
		</style><?php }

		// THEME 6 - RETRO STYLE
		?><?php } elseif ($this->config->get('RGen_theme_option') == 6) { ?>
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>theme5.css" /> -->
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>theme6.php" />
		<?php if ($this->config->get('RGen_Icons') != 'vector') { ?>
		<link rel="stylesheet" type="text/css" href="catalog/view/theme/rgen-opencart/image/rgen/theme6/icon-images.php" />
		<?php } ?>
		<?php if ($this->config->get('RGen_reaponsive_status') == 1) { ?>
		<style type="text/css">
		@media only screen and (min-width: 200px) and (max-width: 767px) {
			.thm-6 .product-info .price-tax-y { height: auto; padding: 10px 0 10px 20px; }
		}
		</style><?php }

		// THEME 7 - MINIMAL STYLE
		?><?php } elseif ($this->config->get('RGen_theme_option') == 7) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>theme7.php" />
		<?php if ($this->config->get('RGen_Icons') != 'vector') { ?>
		<link rel="stylesheet" type="text/css" href="catalog/view/theme/rgen-opencart/image/rgen/theme7/icon-images.php" />
		<?php } ?><?php

		// THEME 8 - MINIMAL STYLE
		?><?php } elseif ($this->config->get('RGen_theme_option') == 8) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>theme8.php" />
		<?php if ($this->config->get('RGen_Icons') != 'vector') { ?>
		<link rel="stylesheet" type="text/css" href="catalog/view/theme/rgen-opencart/image/rgen/theme8/icon-images.php" />
		<?php }

		// THEME 9 - MINIMAL STYLE
		?><?php } elseif ($this->config->get('RGen_theme_option') == 9) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>theme9.php" />
		<?php if ($this->config->get('RGen_Icons') != 'vector') { ?>
		<link rel="stylesheet" type="text/css" href="catalog/view/theme/rgen-opencart/image/rgen/theme9/icon-images.php" />
		<?php } ?>

		<?php } ?>

	<?php } ?>

	<?php if ($this->config->get('RGen_reaponsive_status') == 1) { ?>
	<style type="text/css">
	/* iPads (portrait and landscape) ----------- */
	@media only screen and (min-device-width: 200px) and (max-device-width: 979px) {
		.related-prd .prd-block, #t .product-grid .prd-block, .modprd1 .prd-block { height: 430px; border: }
		.related-prd .prd-block .info-wrp, .modprd1 .prd-block .info-wrp, #t .product-grid .prd-block .info-wrp { bottom: 0; }
		.modprd1 .caroufredsel_wrapper > ul, .modprd1 .caroufredsel_wrapper { height: 455px !important; }
		.caroufredsel_wrapper { padding-right:0px; height: auto; }
		.slidshowPrd .caroufredsel_wrapper { padding-bottom: 40px; }
	}
	</style>
	<?php } ?>

	<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>on-dark.css" />

	<style type="text/css">
	<?php if ($this->config->get('RGen_logoPosition_status') == 1) { ?> 
	.head1 .store-logo1 #logo, .store-logo1 #logo { 
		<?php if ($this->config->get('RGen_logoLeft') != '') { ?>margin-left:<?php echo $this->config->get('RGen_logoLeft'); ?>px;<?php } ?>
		<?php if ($this->config->get('RGen_logoTop') != '') { ?>margin-top:<?php echo $this->config->get('RGen_logoTop'); ?>px;<?php } ?>
		<?php if ($this->config->get('RGen_logoSpaceAround_TB') != '') { ?>
			padding-top:<?php echo $this->config->get('RGen_logoSpaceAround_TB'); ?>px;
			padding-bottom:<?php echo $this->config->get('RGen_logoSpaceAround_TB'); ?>px;
		<?php } ?>
		<?php if ($this->config->get('RGen_logoSpaceAround_LR') != '') { ?>
			padding-left:<?php echo $this->config->get('RGen_logoSpaceAround_LR'); ?>px;
			padding-right:<?php echo $this->config->get('RGen_logoSpaceAround_LR'); ?>px;
		<?php } ?>
		<?php if ($this->config->get('RGen_logoBG_color') != '') { ?>background-color:<?php echo $this->config->get('RGen_logoBG_color'); ?>;<?php } ?>
	}
	<?php } ?>
	<?php if ($this->config->get('RGen_MenuItemSpace') != '') { ?>
	#menu > ul > li > a.top-lvl {
		padding-left:<?php echo $this->config->get('RGen_MenuItemSpace'); ?>px;
		padding-right:<?php echo $this->config->get('RGen_MenuItemSpace'); ?>px;
	}
	<?php } ?>
	<?php if ($this->config->get('RGen_logoPosition_status') != 1 && $this->config->get('RGen_logoSpaceAround_LR') != '') { ?>
	.store-logo{  
		padding-left:<?php echo $this->config->get('RGen_logoSpaceAround_LR'); ?>px;
		padding-right:<?php echo $this->config->get('RGen_logoSpaceAround_LR'); ?>px;
	}
	<?php } ?>
	</style>
	
	<?php /* THEME COLOR SETTINGS
	**************************************/ ?>
	<?php 
		$CustomTheme = $this->config->get('RGen_theme');
		if ($CustomTheme == 1) {
			include VQMod::modCheck($tplPath . "common/RGen_theme_setting.php");
		}
	?>
	
	<?php /* THEME FONTS SETTINGS
	**************************************/ ?>
	<?php if ($this->config->get('RGen_fontSettings_status') == 1) { 
		include VQMod::modCheck($tplPath . "common/RGen_font_setting.php");
	} ?>
	
	<?php /* CUSTOM CSS FILE
	**************************************/ ?>
	<?php if ($this->config->get('RGen_customFile_Status') == 1 && $this->config->get('RGen_CustomCSS_file') != '' ) { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?><?php echo $this->config->get('RGen_CustomCSS_file'); ?>" />
	<?php }	?>
	
	<?php /* CUSTOM CSS INPUT
	**************************************/ ?>
	<?php if ($this->config->get('RGen_CustomCSS_Status') == 1 || $this->config->get('RGen_CustomCSS_Status') == '' && $this->config->get('RGen_CustomCSS') != '' ) { ?>
	<style type="text/css">
	<?php echo htmlspecialchars_decode( $this->config->get('RGen_CustomCSS'), ENT_QUOTES ); ?>
	</style>
	<?php }	?>

	
	<?php if ($this->config->get('RGen_htmlMenuDisplay') != 1) { ?>
	<script type="text/javascript">$('.menu-html-wrp').parent().css({display:'none'});</script>
	<?php }?>

<?php echo $google_analytics; ?>
</head>
<body class="<?php 
	echo $this->document->body_class;
	if ($this->config->get('RGen_imgType') != ''){ echo ' '.$this->config->get('RGen_imgType'); }
	?>">

<div id="container" <?php if ($this->config->get('RGen_menulayout') == 'fw') { ?>class='menu-fw'<?php } else { ?>class='menu-bx'<?php } ?>>
	<?php /* ABOVE HEADER CONTENT
	******************************/
	if ($this->rgen->device != 'm') { echo isset($rgen_header_top) ? $rgen_header_top : null; }
	/*******************************/
	?>

	<div id="header-wrapper" <?php 
		if ($this->config->get('RGen_logoAlign') == 'lg-c' && $this->config->get('RGen_logoPosition_status') == 1) { echo 'data-head="lg-c" '; } ?>class="<?php 
		if ($this->config->get('RGen_header_design') == 'hd2'){ echo 'head1 '; } else{ echo 'head0 '; }
		if (
			$this->rgen->device != 'm' && 
			$this->config->get('RGen_logoAlign') == 'lg-c' && 
			$this->config->get('RGen_logoPosition_status') == 1
			) { echo 'head-c '; }
		?>"><?php

		/*****************************
		HEADER STYLES
		******************************/
		if ($this->config->get('RGen_header_design') == 'hd2') {
			include VQMod::modCheck($tplPath . "common/RGen_topbar2.tpl");
		}else{
			include VQMod::modCheck($tplPath . "common/RGen_topbar1.tpl");
		}
	
		/*****************************
		LOGO & CATEGORY NAVIGATION LINKS
		******************************/
		?><div <?php if ($this->config->get('RGen_menusticky') == "sticky"){ echo 'id="nav-sticky" '; } ?>class="navigation-bar<?php if ($this->config->get('RGen_logoPosition_status') == 1 || $this->config->get('RGen_menulayout') == 'fw') { ?> no-logo<?php } ?><?php if ($this->config->get('RGen_menuhome') == 'tx' || $this->config->get('RGen_menuhome') == 'off') { ?> no-home<?php } ?>">
			<?php if ($this->config->get('RGen_menulayout') == 'bx' || $this->config->get('RGen_menulayout') == '') { ?>
			<?php if ($this->config->get('RGen_logoPosition_status') == 0 || $this->config->get('RGen_logoPosition_status') == '') { ?>
			<div class="store-logo">
				<?php if ($logo) {
				list($width, $height, $type, $attr) = getimagesize("image/".$this->config->get('config_logo'));
				$W = ($width/2) . 'px'; $H = $height/2 . 'px';
				?>
				<a href="<?php echo $home; ?>" id="logo" style="margin-left:-<?php echo $W; ?>; margin-top:-<?php echo $H; ?>;">
					<?php echo "<img src=\"$logo\" $attr title=\"$name\" alt=\"$name\" />"; ?>
				</a>
				<?php } ?>
			</div><?php } ?>
			<?php } ?>
			<?php 
			if (isset($this->document->RGen_Menu)) {
			if ($categories || $this->document->RGen_Menu) { 
			?><nav id="menu" <?php if ($this->rgen->device == 'm' && $this->config->get('RGen_reaponsive_status') == 1) { ?>class="mob-menu"<?php }?>>
				<span><span class="menu-name"><?php echo $this->language->get('menu_text'); ?></span></span>
				<?php if ($this->config->get('RGen_menuhome') == 'ico' || $this->config->get('RGen_menuhome') == '') { ?>
				<a href="<?php echo $home; ?>" title="<?php echo $name; ?>" class="home-btn"><?php echo $name; ?></a>
				<?php } ?>
				<ul class="menu-data">
					<?php if ($this->config->get('RGen_menuhome') == 'tx') { ?>
					<li><a href="<?php echo $home; ?>" title="<?php echo $name; ?>" class="top-lvl"><?php echo $this->language->get('text_menuhome'); ?></a></li>
					<?php } ?>
					<?php
						if ($this->config->get('rgen_megamenu_status') == 0) {
							foreach ($this->document->RGen_Menu as $result) {
								if(isset($result['RGen_allCat']) == 'RGen_allCat'){
									include VQMod::modCheck($tplPath . "common/RGen_allcategorymenu.php");
								}
								if(isset($result['RGen_brand']) == 'RGen_brand'){
									include VQMod::modCheck($tplPath . "common/RGen_brandmenu.php");
								}
								if(isset($result['RGen_catMenu']) == 'RGen_catMenu'){
									include VQMod::modCheck($tplPath . "common/RGen_categorymenu.php");
								}
								if(isset($result['RGen_prd']) == 'RGen_prd'){
									include VQMod::modCheck($tplPath . "common/RGen_prdmenu.php");
								}
								elseif(isset($result['RGen_infoMenu'])){
									include VQMod::modCheck($tplPath . "common/RGen_infomenu.php");
								}
								elseif(isset($result['RGen_myAccount']) == 'RGen_myAccount'){
									include VQMod::modCheck($tplPath . "common/RGen_myaccount.php");
								}
								elseif(isset($result['ddMenu'])){
									include VQMod::modCheck($tplPath . "common/RGen_custom_dropdown.php");
								}
								elseif(isset($result['RGen_menu_item'])){
									include VQMod::modCheck($tplPath . "common/RGen_custom_menu_items.php");
								}
								elseif(isset($result['RGen_HtmlMenu'])){
									if ($this->config->get('RGen_htmlMenuDisplay') == 1) {
										include VQMod::modCheck($tplPath . "common/RGen_customhtmlmenu.php");
									}else{
										if($this->rgen->device != 'm'){
											include VQMod::modCheck($tplPath . "common/RGen_customhtmlmenu.php");
										}
									}
								}
							}
						}else{
							echo $rgen_megamenu;
						}
					?>
				</ul>
			</nav>
			<?php } } ?>
		</div>
		<div class="wrapper"></div>
	</div>
	<?php if ($error) { ?>
	<div class="warning"><?php echo $error ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>
	<?php } ?>
	<div id="notification"></div>
	<div class="content-body-wrapper">
<?php } ?>