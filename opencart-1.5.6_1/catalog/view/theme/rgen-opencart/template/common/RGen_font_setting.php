<?php /* FONTS SETTINGS
	**************************************/ 
$defaultFont = array( 
	'Arial', 
	'Verdana', 
	'Helvetica', 
	'Lucida Grande', 
	'Trebuchet MS', 
	'Times New Roman', 
	'Tahoma', 
	'Georgia'
);

$bodyFont 				= 	$this->config->get('RGen_Body_font');
$pageTitleFont			=	$this->config->get('RGen_PageTitle_font');
$otherHeadingFont		=	$this->config->get('RGen_otherHeading_font');
$navFont				=	$this->config->get('RGen_Navigation_font');
$priceFont				=	$this->config->get('RGen_Price_font');
$buttonFont				=	$this->config->get('RGen_Button_font');
$otherFont				=	$this->config->get('RGen_other_font');
$capHd					=	$this->config->get('RGen_capHeading_font');
$capContent				=	$this->config->get('RGen_capContent_font');
$capLink				=	$this->config->get('RGen_capLink_font');

$HTM_bodyFont 			= 	in_array($bodyFont, $defaultFont);
$HTM_pageTitleFont		=	in_array($pageTitleFont, $defaultFont);
$HTM_otherHeadingFont	=	in_array($otherHeadingFont, $defaultFont);
$HTM_navFont			=	in_array($navFont, $defaultFont);
$HTM_priceFont			=	in_array($priceFont, $defaultFont);
$HTM_buttonFont			=	in_array($buttonFont, $defaultFont);
$HTM_otherFont			=	in_array($otherFont, $defaultFont);
$HTM_capHDFont			=	in_array($capHd, $defaultFont);
$HTM_capContentFont		=	in_array($capContent, $defaultFont);
$HTM_capLinkFont		=	in_array($capLink, $defaultFont);

if(
	$bodyFont != '--' && $HTM_bodyFont == false || 
	$pageTitleFont != '--' && $HTM_pageTitleFont == false || 
	$otherHeadingFont != '--' && $HTM_otherHeadingFont == false || 
	$navFont != '--' && $HTM_navFont == false || 
	$priceFont != '--' && $HTM_priceFont == false || 
	$buttonFont != '--' && $HTM_buttonFont == false ||
	$otherFont != '--' && $HTM_otherFont == false || 
	$capHd != '--' && $HTM_capHDFont == false ||
	$capContent != '--' && $HTM_capContentFont == false || 
	$capLink != '--' && $HTM_capLinkFont == false
	){
?>
<link href='//fonts.googleapis.com/css?family=<?php 
if ($bodyFont != '--' && $HTM_bodyFont == false) {
	print($bodyFont);
}
if ($pageTitleFont != '--' && $HTM_pageTitleFont == false) {
	if ($bodyFont != '--' && $HTM_bodyFont == false)
	{ echo '|'; }
	print($pageTitleFont);
}
if ($otherHeadingFont != '--' && $HTM_otherHeadingFont == false) {
	if (
		$bodyFont != '--' && $HTM_bodyFont == false || 
		$pageTitleFont != '--' && $HTM_pageTitleFont == false
		){ echo '|'; }
	print($otherHeadingFont);
}
if ($navFont != '--' && $HTM_navFont == false) {
	if (
		$bodyFont != '--' && $HTM_bodyFont == false || 
		$pageTitleFont != '--' && $HTM_pageTitleFont == false || 
		$otherHeadingFont != '--' && $HTM_otherHeadingFont == false
		){ echo '|'; }
	print($navFont); 
}
if ($priceFont != '--' && $HTM_priceFont == false) {
	if (
		$bodyFont != '--' && $HTM_bodyFont == false || 
		$pageTitleFont != '--' && $HTM_pageTitleFont == false || 
		$otherHeadingFont != '--' && $HTM_otherHeadingFont == false || 
		$navFont != '--' && $HTM_navFont == false
		){ echo '|'; }
	print($priceFont);
}
if ($buttonFont != '--' && $HTM_buttonFont == false) {
	if (
		$bodyFont != '--' && $HTM_bodyFont == false || 
		$pageTitleFont != '--' && $HTM_pageTitleFont == false || 
		$otherHeadingFont != '--' && $HTM_otherHeadingFont == false || 
		$navFont != '--' && $HTM_navFont == false || 
		$priceFont != '--' && $HTM_priceFont == false
		){ echo '|'; }
	print($buttonFont);
}
if ($otherFont != '--' && $HTM_otherFont == false) {
	if (
		$bodyFont != '--' && $HTM_bodyFont == false || 
		$pageTitleFont != '--' && $HTM_pageTitleFont == false || 
		$otherHeadingFont != '--' && $HTM_otherHeadingFont == false || 
		$navFont != '--' && $HTM_navFont == false || 
		$priceFont != '--' && $HTM_priceFont == false ||
		$buttonFont != '--' && $HTM_buttonFont == false
		){ echo '|'; }
	print($otherFont);
}
if ($capHd != '--' && $HTM_capHDFont == false) {
	if (
		$bodyFont != '--' && $HTM_bodyFont == false || 
		$pageTitleFont != '--' && $HTM_pageTitleFont == false || 
		$otherHeadingFont != '--' && $HTM_otherHeadingFont == false || 
		$navFont != '--' && $HTM_navFont == false || 
		$priceFont != '--' && $HTM_priceFont == false ||
		$buttonFont != '--' && $HTM_buttonFont == false ||
		$otherFont != '--' && $HTM_otherFont == false
		){ echo '|'; }
	print($capHd);
}
if ($capContent != '--' && $HTM_capContentFont == false) {
	if (
		$bodyFont != '--' && $HTM_bodyFont == false || 
		$pageTitleFont != '--' && $HTM_pageTitleFont == false || 
		$otherHeadingFont != '--' && $HTM_otherHeadingFont == false || 
		$navFont != '--' && $HTM_navFont == false || 
		$priceFont != '--' && $HTM_priceFont == false ||
		$buttonFont != '--' && $HTM_buttonFont == false ||
		$otherFont != '--' && $HTM_otherFont == false || 
		$capHd != '--' && $HTM_capHDFont == false
		){ echo '|'; }
	print($capContent);
}
if ($capLink != '--' && $HTM_capLinkFont == false) {
	if (
		$bodyFont != '--' && $HTM_bodyFont == false || 
		$pageTitleFont != '--' && $HTM_pageTitleFont == false || 
		$otherHeadingFont != '--' && $HTM_otherHeadingFont == false || 
		$navFont != '--' && $HTM_navFont == false || 
		$priceFont != '--' && $HTM_priceFont == false ||
		$buttonFont != '--' && $HTM_buttonFont == false ||
		$otherFont != '--' && $HTM_otherFont == false || 
		$capHd != '--' && $HTM_capHDFont == false || 
		$capContent != '--' && $HTM_capContentFont == false
		){ echo '|'; }
	print($capLink);
}

?>&amp;v1' rel='stylesheet' type='text/css'>
<?php }?>

<style type="text/css">

<?php if($bodyFont != '--') { $fontName =  $bodyFont; $fontStr = str_replace("+", " ", $fontName); ?>

body { 
	font-family: "<?php echo $fontStr ?>";
	<?php if($this->config->get('RGen_Body_font_size')!='--') { ?> 
	font-size: <?php echo $this->config->get('RGen_Body_font_size') ?>;
	<?php } ?>
	<?php if($this->config->get('RGen_Body_font_weight')!='--') { ?>
	font-weight: <?php echo $this->config->get('RGen_Body_font_weight') ?>;
	<?php } ?>
	}

<?php } ?>

<?php if($pageTitleFont != '--') { $fontName =  $pageTitleFont; $fontStr = str_replace("+", " ", $fontName); ?>

.page-heading, 
.page-heading strong { 
	font-family: "<?php echo $fontStr ?>";
	font-weight:inherit;
	<?php if($this->config->get('RGen_PageTitle_font_size')!='--') { ?>
	font-size: <?php echo $this->config->get('RGen_PageTitle_font_size') ?>;
	<?php } ?>
	<?php if($this->config->get('RGen_PageTitle_font_weight')!='--') { ?>
	font-weight: <?php echo $this->config->get('RGen_PageTitle_font_weight') ?>;
	<?php } ?>
	<?php if($this->config->get('RGen_PageTitle_transform')!='--') { ?>
	text-transform: <?php echo $this->config->get('RGen_PageTitle_transform') ?>;
	<?php } else { ?>
	text-transform: inherit;
	<?php } ?>
	}

<?php } ?>

<?php if($otherHeadingFont != '--') { $fontName =  $otherHeadingFont; $fontStr = str_replace("+", " ", $fontName); ?>
#blogArticle .articleHeader h1,
#blogCatArticles .articleHeader h3,
.header-1, 
.header-2, 
.header-3, 
.header-4,
.column .box-heading, 
.checkout-heading, 
.htabs a, 
.product-info .cart .qty strong, 
#footer .contact-info li span,  
#footer .contact-info li a, 
.refine-cate h2 span {
	font-family: "<?php echo $fontStr ?>";
	font-weight:inherit;
	<?php if($this->config->get('RGen_otherHeading_font_weight')!='--') { ?>
	font-weight: <?php echo $this->config->get('RGen_otherHeading_font_weight') ?>;
	<?php } ?>
	<?php if($this->config->get('RGen_otherHeading_transform')!='--') { ?>
	text-transform: <?php echo $this->config->get('RGen_otherHeading_transform') ?>;
	<?php } else { ?>
	text-transform: inherit;
	<?php } ?>
	}
	
<?php } ?>

<?php if($navFont != '--') { $fontName =  $navFont; $fontStr = str_replace("+", " ", $fontName); ?>

#menu > ul > li > a.top-lvl { 
	font-family: "<?php echo $fontStr ?>"; 
	font-weight:inherit;
	<?php if($this->config->get('RGen_Navigation_font_size')!='--') { 
	?>font-size: <?php echo $this->config->get('RGen_Navigation_font_size') ?>; 
	<?php } ?>
	<?php if($this->config->get('RGen_Navigation_font_weight')!='--') { 
	?>font-weight: <?php echo $this->config->get('RGen_Navigation_font_weight') ?>; 
	<?php } ?>
	<?php if($this->config->get('RGen_Navigation_transform')!='--') { ?>
	text-transform: <?php echo $this->config->get('RGen_Navigation_transform') ?>;
	<?php } else { ?>
	text-transform: inherit;
	<?php } ?>
	}

<?php } ?>

<?php if($priceFont != '--') { $fontName =  $priceFont; $fontStr = str_replace("+", " ", $fontName); ?>

.prd-block .info-wrp .price, 
.prd-block1 .price,
.prd-block2 .info-wrp .price,
.product-list .prd-block .info-wrp .price, 
.col-prd .col-price, 
.product-compare, 
.product-info .price, 
.product-info .price-old, 
.product-info .price-new, 
.product-info .price-tax, 
.compare-info .price-old, 
.compare-info .price-new, 
.cart-info tbody .price, 
.cart-info tbody .total, 
.wishlist-info .price, 
.shipping-method .price, 
.checkout-product tbody .price, 
.checkout-product tbody .total, 
.mini-cart-total td, 
.balance, .cart-total table, 
.checkout-product tfoot td, 
.product-list .prd-block .price-new, 
.product-list .prd-block .price-old,
.product-list .prd-block .price-tax { 
	font-family: "<?php echo $fontStr ?>";
	font-weight:inherit;
	<?php if($this->config->get('RGen_Price_font_weight')!='--') { ?>
	font-weight: <?php echo $this->config->get('RGen_Price_font_weight') ?>; 
	<?php } ?>
	}
	
<?php } ?>

<?php if($buttonFont != '--') { $fontName =  $buttonFont; $fontStr = str_replace("+", " ", $fontName); ?>
.button, .sml-button { 
	font-family: "<?php echo $fontStr ?>";
	font-weight:inherit;
	<?php if($this->config->get('RGen_Button_font_weight')!='--') { ?>
	font-weight: <?php echo $this->config->get('RGen_Button_font_weight') ?>; 
	<?php } ?>
	<?php if($this->config->get('RGen_Button_font_transform')!='--') { ?>
	text-transform: <?php echo $this->config->get('RGen_Button_font_transform') ?>;
	<?php } else { ?>
	text-transform: inherit;
	<?php } ?>
	}
<?php } ?>

<?php if($otherFont != '--') { $fontName =  $otherFont; $fontStr = str_replace("+", " ", $fontName); ?>
.prd-block .nameText a,
.prd-block1 .nameText a,
.prd-block2 a.name,
.col-prd .name,
table.list thead td, 
.compare-info thead td, 
.compare-info thead tr td:first-child, 
.wishlist-info thead td, 
.cart-info thead td,
.order-list .order-id, 
.download-list .download-id, 
.return-list .return-id, 
.cart-options .tabs li label, 
.shipping-method .radio .shipping-name, 
.contactus .left strong, 
.compare-info tr td:first-child, 
.checkout-product thead td, 
.pagination .links a, 
.pagination .links b, 
.wishlist-info tbody .name a, 
.checkout-product tbody .quantity, 
.sitemap-info .first > li > a, 
.brands-a2z a, 
.store-home .slideshow .nivo-controlNav a { 
	font-family: "<?php echo $fontStr ?>"; 
	font-weight:inherit;
	<?php if($this->config->get('RGen_other_font_weight')!='--') { ?>
	font-weight: <?php echo $this->config->get('RGen_other_font_weight') ?>;
	<?php } ?>
	<?php if($this->config->get('RGen_other_font_transform')!='--') { ?>
	text-transform: <?php echo $this->config->get('RGen_other_font_transform') ?>;
	<?php } else { ?>
	text-transform: inherit;
	<?php } ?>
	}
	
<?php } ?>

<?php if($capHd != '--') { $fontName =  $capHd; $fontStr = str_replace("+", " ", $fontName); ?>
.cap1 .nivo-caption .cap-hd,
.cap2 .nivo-caption .cap-hd,
.cap3 .nivo-caption .cap-hd { 
	font-family: "<?php echo $fontStr ?>";
	font-weight:inherit;
	<?php if($this->config->get('RGen_capHeading_font_weight')!='--') { ?>
	font-weight: <?php echo $this->config->get('RGen_capHeading_font_weight') ?>; 
	<?php } ?>
	<?php if($this->config->get('RGen_capHeading_font_size')!='--') { 
	?>font-size: <?php echo $this->config->get('RGen_capHeading_font_size') ?>; 
	<?php } ?>
	<?php if($this->config->get('RGen_capHeading_font_transform')!='--') { ?>
	text-transform: <?php echo $this->config->get('RGen_capHeading_font_transform') ?>;
	<?php } else { ?>
	text-transform: inherit;
	<?php } ?>
	}
<?php } ?>

<?php if($capContent != '--') { $fontName =  $capContent; $fontStr = str_replace("+", " ", $fontName); ?>
.cap1 .nivo-caption .cap-data,
.cap2 .nivo-caption .cap-data,
.cap3 .nivo-caption .cap-data { 
	font-family: "<?php echo $fontStr ?>";
	font-weight:inherit;
	<?php if($this->config->get('RGen_capContent_font_weight')!='--') { ?>
	font-weight: <?php echo $this->config->get('RGen_capContent_font_weight') ?>; 
	<?php } ?>
	<?php if($this->config->get('RGen_capContent_font_size')!='--') { 
	?>font-size: <?php echo $this->config->get('RGen_capContent_font_size') ?>; 
	<?php } ?>
	<?php if($this->config->get('RGen_capContent_font_transform')!='--') { ?>
	text-transform: <?php echo $this->config->get('RGen_capContent_font_transform') ?>;
	<?php } else { ?>
	text-transform: inherit;
	<?php } ?>
	}
<?php } ?>

<?php if($capLink != '--') { $fontName =  $capLink; $fontStr = str_replace("+", " ", $fontName); ?>
.cap1 .nivo-caption .cap-link,
.cap2 .nivo-caption .cap-link,
.cap3 .nivo-caption .cap-link { 
	font-family: "<?php echo $fontStr ?>";
	font-weight:inherit;
	<?php if($this->config->get('RGen_capLink_font_weight')!='--') { ?>
	font-weight: <?php echo $this->config->get('RGen_capLink_font_weight') ?>; 
	<?php } ?>
	<?php if($this->config->get('RGen_capLink_font_size')!='--') { 
	?>font-size: <?php echo $this->config->get('RGen_capLink_font_size') ?>; 
	<?php } ?>
	<?php if($this->config->get('RGen_capLink_font_transform')!='--') { ?>
	text-transform: <?php echo $this->config->get('RGen_capLink_font_transform') ?>;
	<?php } else { ?>
	text-transform: inherit;
	<?php } ?>
	}
<?php } ?>
</style>