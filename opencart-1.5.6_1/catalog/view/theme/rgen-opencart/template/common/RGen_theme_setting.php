<style type="text/css"><?php 
if(
	$this->config->get('RGen_bodyBg') != '' ||
	$this->config->get('RGen_bodyBgImg') != '' ||
	$this->config->get('RGen_bodyBgAttachment') != 'inherit' || 
	$this->config->get('RGen_fontColor') != ''
){ 
?>body { <?php 

	if($this->config->get('RGen_bodyBg') != ''){ 
	?>background: none;	background-color:<?php echo $this->config->get('RGen_bodyBg'); ?>;<?php 
	}
	
	if($this->config->get('RGen_bodyBgImg') != ''){ 
	?>background-image:url(<?php echo $this->config->get('config_url'); ?>image/<?php echo $this->config->get('RGen_bodyBgImg'); ?>);<?php		
	?>background-repeat:<?php echo $this->config->get('RGen_bodyBgImgRepeat'); ?>;<?php 
	?>background-position:<?php echo $this->config->get('RGen_bodyBgImgPosition'); ?>;<?php
	}
	
	if($this->config->get('RGen_bodyBgAttachment') != 'inherit'){ 
	?>background-attachment:<?php echo $this->config->get('RGen_bodyBgAttachment'); ?>;<?php 
	}
	
	if($this->config->get('RGen_fontColor') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_fontColor'); ?>;<?php 
	}
?>}<?php 
}

if($this->config->get('RGen_fontColor') != ''){ 
?>body, p, .category-info p, .tab-content{ color:#<?php echo $this->config->get('RGen_fontColor'); ?>; }<?php 
} 

/* GLOBAL COLOR - 1 */
if($this->config->get('RGen_globalColour') != ''){ 
?>#menu,
.navigation-bar,
#header .button-search,
.product-info .price,
.social-wrp a:hover,
.product-info .cart,
.cart-bt:hover,
.product-list .prd-block .info-wrp .price,
.prd-block .info-wrp .price,
.store-home .slideshow .nivo-controlNav a.active,
.home-btn:hover,
.thumb-wrapper .bx-prev:hover,
.next:hover,
.prev:hover,
.jcarousel-next:hover,
.jcarousel-prev:hover,
.cart-bt:hover,
.store-home #slidshow-box .next,
.store-home #slidshow-box .prev { <?php
	?>background-color:#<?php echo $this->config->get('RGen_globalColour'); ?>;	}<?php 
}

if($this->config->get('RGen_globalColourRing') != ''){ 
?>.slideshow .nivo-controlNav a { <?php
	?>box-shadow:0px 0px 0px 2px <?php echo $this->config->get('RGen_globalColourRing')?>; }<?php 
}

/* MAIN CONTAINER BACK */
if($this->config->get('RGen_pageBg') != '' && $this->config->get('RGen_theme_option') != 5){ 
?>#container, .page-heading strong, .pagination .links, .popup-box, .header-1 span { <?php
	?>background-color:<?php echo $this->config->get('RGen_pageBg'); ?>; }<?php 
}
/* THEME-5 PAGE BACKGROUND SETTINGS */
if($this->config->get('RGen_pageBg') != '' && $this->config->get('RGen_theme_option') == 5 ){ ?>
#container { background: transparent; }
.footer-wrapper, .content-body-wrapper, .page-heading strong, .pagination .links, .popup-box, .header-1 span { 
	background-color:<?php echo $this->config->get('RGen_pageBg'); ?>; 
}
<?php }


?>.custom1 .header-1, .custom1 .header-1 span { background: none; }
#container { <?php 

if($this->config->get('RGen_pageShadow') == ''){ 
	?>-webkit-box-shadow: none; box-shadow: none;<?php 
} else { 
	?>-webkit-box-shadow: 0px 0px 8px 0px <?php echo $this->config->get('RGen_pageShadow'); ?>;<?php
	?>box-shadow: 0px 0px 8px 0px <?php echo $this->config->get('RGen_pageShadow'); ?>;<?php 
} 

?>}<?php


/* IMAGE BOX */
if($this->config->get('RGen_ImageBox') != ''){ ?>
.category-info .image, 
.img-frame, 
.mini-cart-info .image a, 
.mini-cart-info .image span,
.col-prd .image, 
.product-info .image, 
.product-info .image-additional a,
.product-info .th-b .image-additional-b a,
.product-info .th-b .image-additional-b .active img,
.product-info .image-additional .active a { <?php
	?>background-color:<?php echo $this->config->get('RGen_ImageBox'); ?>;<?php
	?>border-color:<?php echo $this->config->get('RGen_ImageBox'); ?>; }<?php 
} 

/* LINK COLOUR 1 */

if($this->config->get('RGen_LinkColor') != ''){ 
?>.blogSearch .readmore,
.articleContent .readMore span a,
#blogArticle .articleHeader h1 a, 
#blogCatArticles .articleHeader h3 a,
.articleHeader span a,
a, a:visited, a b,
#footer .column a,
.col-links > ul > li > a,
.col-links > ul > li ul > li > a { <?php
	?>color:#<?php echo $this->config->get('RGen_LinkColor'); ?>; }<?php 
} 

if($this->config->get('RGen_LinkColor_hover') != ''){ 
?>.articleContent .readMore span a:hover,
.articleHeader span a:hover,
#blogArticle .articleHeader h1 a:hover, 
#blogCatArticles .articleHeader h3 a:hover,
a:hover,
#footer .column a:hover,
.col-links > ul > li a:hover,
.col-links > ul > li ul > li > a:hover { <?php
	?>color:#<?php echo $this->config->get('RGen_LinkColor_hover'); ?>; }<?php 
} 

if($this->config->get('RGen_LinkBtColor') != '' || $this->config->get('RGen_LinkBtFontColor') != ''){ 
?>.link-bt { <?php 

if($this->config->get('RGen_LinkBtColor') != ''){ 
	?>background:#<?php echo $this->config->get('RGen_LinkBtColor'); ?>;<?php 
} 
if($this->config->get('RGen_LinkBtFontColor') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_LinkBtFontColor'); ?>;<?php 
} 
?> }<?php
}

if($this->config->get('RGen_LinkBtColor_hover') != '' || $this->config->get('RGen_LinkBtFontColor_hover') != ''){ 
?>.link-bt:hover { <?php 
if($this->config->get('RGen_LinkBtColor_hover') != ''){ 
	?>background:#<?php echo $this->config->get('RGen_LinkBtColor_hover'); ?>;<?php 
} 
if($this->config->get('RGen_LinkBtFontColor_hover') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_LinkBtFontColor_hover'); ?>;<?php 
} 
?> }<?php
}

/* BUTTONS */
if($this->config->get('RGen_btColor') != '' || $this->config->get('RGen_btFontColor') != ''){ 
?>input.button, .button, a.button, a.sml-button, input.sml-button {<?php 
if($this->config->get('RGen_btColor') != ''){ 
	?>background-color:#<?php echo $this->config->get('RGen_btColor'); ?>;<?php 
} 
if($this->config->get('RGen_btFontColor') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_btFontColor'); ?>;<?php 
} 
?> }<?php
}
if($this->config->get('RGen_btColor_hover') != '' || $this->config->get('RGen_btFontColor_hover') != ''){ 
?>input.button:hover, .button:hover, .sml-button:hover { <?php 
if($this->config->get('RGen_btColor_hover') != ''){ 
	?>background-color:#<?php echo $this->config->get('RGen_btColor_hover'); ?>;<?php 
} 
if($this->config->get('RGen_btFontColor_hover') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_btFontColor_hover'); ?>;<?php 
} 
?> }<?php
}

if($this->config->get('RGen_btColor1') != '' || $this->config->get('RGen_btFontColor1') != ''){
?>input.dark-bt, a.dark-bt, #confirm .payment .button { <?php 
if($this->config->get('RGen_btColor1') != ''){ 
	?>background-color:#<?php echo $this->config->get('RGen_btColor1'); ?>;<?php 
}

if($this->config->get('RGen_btFontColor1') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_btFontColor1'); ?>;<?php
}
?> }<?php
}

if($this->config->get('RGen_btColor1_hover') != '' || $this->config->get('RGen_btFontColor1_hover') != ''){ 
?>input.dark-bt:hover, .dark-bt:hover, #confirm .payment .button:hover { <?php
if($this->config->get('RGen_btColor1_hover') != ''){ 
	?>background-color:#<?php echo $this->config->get('RGen_btColor1_hover'); ?>;<?php 
} 
if($this->config->get('RGen_btFontColor1_hover') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_btFontColor1_hover'); ?>;<?php 
}
?> }<?php 
}

/* FORMS */ 
if($this->config->get('RGen_TextBox') != '' || $this->config->get('RGen_TextBoxBorder') != '' || $this->config->get('RGen_TextBoxText') != ''){ 
?>input[type='text'], input[type='password'], textarea { <?php
if($this->config->get('RGen_TextBox') != ''){ 
	?>background:<?php echo $this->config->get('RGen_TextBox'); ?>;<?php
}
if($this->config->get('RGen_TextBoxBorder') != ''){ 
	?>border-color:<?php echo $this->config->get('RGen_TextBoxBorder'); ?>;	box-shadow:none;<?php
}
if($this->config->get('RGen_TextBoxText') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_TextBoxText'); ?>;<?php
} ?> }<?php
}

if($this->config->get('RGen_FormLabel') != ''){ 
?>table.form tr td:first-child, .box-form label {
	color:#<?php echo $this->config->get('RGen_FormLabel'); ?>;	}<?php
}

if($this->config->get('RGen_FormHeaders') != '' || $this->config->get('RGen_FormBorders') != ''){ 
?>.box-form .header-3 { <?php
if($this->config->get('RGen_FormHeaders') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_FormHeaders'); ?>;<?php
}
if($this->config->get('RGen_FormBorders') != ''){ 
	?>border-color:<?php echo $this->config->get('RGen_FormBorders'); ?>;<?php
} ?> }<?php
}

/* SCROLLER ARROWS */
if($this->config->get('RGen_arrowBg') != '' || $this->config->get('RGen_arrowBgRing') != '' || $this->config->get('RGen_arrow') != ''){ 
?>.next,
.prev, 
.jcarousel-next, 
.jcarousel-prev,
.thumb-wrapper .next,
.thumb-wrapper .prev { <?php 
if($this->config->get('RGen_arrowBg') != ''){ 
	?>background-color:#<?php echo $this->config->get('RGen_arrowBg'); ?>;<?php 
} 
if($this->config->get('RGen_arrowBgRing') != ''){
	?>box-shadow:0px 0px 0px 6px <?php echo $this->config->get('RGen_arrowBgRing'); ?>;<?php
} 
if($this->config->get('RGen_arrow') != ''){
	?>color: #<?php echo $this->config->get('RGen_arrow'); ?>;<?php
} 
?> }<?php
}

if($this->config->get('RGen_arrowBg_hover') != '' || $this->config->get('RGen_arrowBgRing_hover') != '' || $this->config->get('RGen_arrow_hover') != ''){ 
?>.next:hover, 
.prev:hover, 
.jcarousel-next:hover, 
.jcarousel-prev:hover,
.thumb-wrapper .next:hover,
.thumb-wrapper .prev:hover { <?php 
if($this->config->get('RGen_arrowBg_hover') != ''){ 
	?>background-color:#<?php echo $this->config->get('RGen_arrowBg_hover'); ?>;<?php 
} 
if($this->config->get('RGen_arrowBgRing_hover') != ''){
	?>box-shadow:0px 0px 0px 6px <?php echo $this->config->get('RGen_arrowBgRing_hover'); ?>;<?php 
}
if($this->config->get('RGen_arrow_hover') != ''){
	?>color: #<?php echo $this->config->get('RGen_arrow_hover'); ?>;<?php
} 
?> }<?php
}

/* HEADERS */
if($this->config->get('RGen_Header') != ''){ 
?>#blogArticle .articleHeader h1,
#blogCatArticles .articleHeader h3,
.header-1, .header-2, .header-3, .header-4, .column .box-heading, .page-heading strong {
	color:#<?php echo $this->config->get('RGen_Header'); ?>;
	}<?php 
} 
if($this->config->get('RGen_globalLines') != ''){ 
?>
.custom1 .header-1,
.modprd2 .box-heading, .arrow-tr .box-heading,
#payment-address #payment-new, 
#shipping-address #shipping-new,
.shipping-method .header-2,
.manufacturer-heading,
.cart-options .tabs,
.cart-options .tabs ul,
.cart-options .tabs ul li,
.box-form .header-3,
.contactus .left .header-3,
.catelist .header-1,
.catelist ul li a,
.product-info .description,
.product-info .review,
.product-info .options,
.read-review,
.review-comment,
.col-links > ul > li,
.address-list ul li,
.col-prd,
.col-prd .name,
.wishlist-info tbody td,
.wishlist-info td,
.cart-info tbody td,
.cart-info tbody .reward,
.cart-total tr.last td,
.cart-total tr td,
#shipping-method .radio,
.checkout-product tbody td,
.checkout-product tfoot td,
.checkout-product .other-amount.last td,
.checkout-product .total-amount td,
table.list td,
#footer h3,
.manufacturer-list,
.custom-footer .column,
#twitter ul li,
.column .box-heading,
.col-links > ul > li > ul {
	border-color:<?php echo $this->config->get('RGen_globalLines'); ?>;	
}<?php
}

/* TABLE LIST */
if($this->config->get('RGen_tableListHeaderFont') != '' || $this->config->get('RGen_tableListBorder_bottom') != '' || $this->config->get('RGen_tableListHeader') != ''){ 
?>table.list thead td,
.wishlist-info thead td,
.cart-info thead td,
.compare-info thead td { <?php 
if($this->config->get('RGen_tableListHeaderFont') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_tableListHeaderFont'); ?>;<?php 
} 
if($this->config->get('RGen_tableListBorder_bottom') != ''){ 
	?>border-bottom-color:<?php echo $this->config->get('RGen_tableListBorder_bottom'); ?>;<?php 
} 
if($this->config->get('RGen_tableListHeader') != ''){ 
	?>background-color:<?php echo $this->config->get('RGen_tableListHeader'); ?>;<?php 
} 
?> }<?php
}

if($this->config->get('RGen_tableListBorder_bottom') != '' || $this->config->get('RGen_tableListBorder_right') != '' || $this->config->get('RGen_tableListFont') != ''){ 
?>table.list td,
.wishlist-info tbody td,
.cart-info tbody td,
.compare-info td { <?php 
if($this->config->get('RGen_tableListBorder_bottom') != ''){ 
	?>border-bottom-color:<?php echo $this->config->get('RGen_tableListBorder_bottom'); ?>;<?php 
} 
if($this->config->get('RGen_tableListBorder_right') != ''){ 
	?>border-right-color:<?php echo $this->config->get('RGen_tableListBorder_right'); ?>;<?php 
}
if($this->config->get('RGen_tableListFont') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_tableListFont'); ?>;<?php 
} 
?> }<?php 
}

if($this->config->get('RGen_tableListBorder_bottom') != ''){ 
?>.cart-total tr.last td,
.cart-total .total-amount td {
	border-bottom-color:<?php echo $this->config->get('RGen_tableListBorder_bottom'); ?>;
	}<?php 
} 

if($this->config->get('RGen_tableListBorder_right') != ''){ 
?>.cart-total tr td {
	border-right-color:<?php echo $this->config->get('RGen_tableListBorder_right'); ?>;
	}<?php 
}

if($this->config->get('RGen_tableListHeaderFont') != ''){ 
?>.compare-info tr td:first-child  {
	color:#<?php echo $this->config->get('RGen_tableListHeaderFont'); ?>;
	}<?php 
}

/* HEADER 
********************************/
if($this->config->get('RGen_headerBg') != '' || $this->config->get('RGen_headerBgImg') != ''){ 
?>#header-wrapper {<?php
	if($this->config->get('RGen_headerBg') != ''){ 
	?>background: none;
	background-color:<?php echo $this->config->get('RGen_headerBg'); ?>;<?php 
	}
	
	if($this->config->get('RGen_headerBgImg') != ''){ 
	?>background-image:url(<?php echo $this->config->get('config_url'); ?>image/<?php echo $this->config->get('RGen_headerBgImg'); ?>);<?php		
	?>background-repeat:<?php echo $this->config->get('RGen_headerBgImgRepeat'); ?>;<?php 
	?>background-position:<?php echo $this->config->get('RGen_headerBgImgPosition'); ?>;<?php
	} 
?> }<?php
}

if($this->config->get('RGen_Breadcrumb_Arrow') != ''){ 
?>.breadcrumb { color:#<?php echo $this->config->get('RGen_Breadcrumb_Arrow'); ?>; }<?php
}
if($this->config->get('RGen_Breadcrumb_Link') != ''){ 
?>.breadcrumb a { color:#<?php echo $this->config->get('RGen_Breadcrumb_Link'); ?>; }<?php
}
if($this->config->get('RGen_Breadcrumb_Link_hover') != ''){ 
?>.breadcrumb a:hover { color:#<?php echo $this->config->get('RGen_Breadcrumb_Link_hover'); ?>; }<?php
}
if($this->config->get('RGen_Logo') != ''){ 
?>.store-logo { background-color:<?php echo $this->config->get('RGen_Logo'); ?>; }<?php 
}

/* HEADER LINKS */
if($this->config->get('RGen_Header_Link') != ''){ ?>
.head1 .links-bar a,
#header #welcome a,
#header .links a {
	color:#<?php echo $this->config->get('RGen_Header_Link'); ?>;
	}<?php 
} 

if($this->config->get('RGen_Header_Link_hover') != ''){ ?>
#header #welcome a:hover,
#header .links a:hover {
	color:#<?php echo $this->config->get('RGen_Header_Link_hover'); ?>;
	}<?php 
}

if($this->config->get('RGen_Header_text') != ''){
?>.head1 .links-bar, #header #welcome {
	color:#<?php echo $this->config->get('RGen_Header_text'); ?>;
	}<?php 
}


/* MAIN NAVIGATION */
if($this->config->get('RGen_Navbar') != ''){ 
?>.navigation-bar { background-color:<?php echo $this->config->get('RGen_Navbar'); ?>; }
<?php if($this->config->get('RGen_theme_option') == 6 || $this->config->get('RGen_theme_option') == 5){ ?>
.navigation-bar:after,
.navigation-bar:before{ border-top-color: <?php echo $this->config->get('RGen_Navbar'); ?>; border-bottom-color: <?php echo $this->config->get('RGen_Navbar'); ?>; }
<?php } ?>

<?php }
if($this->config->get('RGen_NavMenubar') != ''){ ?>
#menu { background-color:<?php echo $this->config->get('RGen_NavMenubar'); ?>; }
<?php 
}
if($this->config->get('RGen_NavFont') != '' || $this->config->get('RGen_Nav') != ''){ 
?>#menu > ul > li > a.top-lvl {
	background-color:<?php echo $this->config->get('RGen_Nav'); ?>;
	color:#<?php echo $this->config->get('RGen_NavFont'); ?>; 
}<?php 
} 
if($this->config->get('RGen_Nav_hover') != '' || $this->config->get('RGen_NavFont_hover') != ''){ 
?>#menu > ul > li:hover > a.top-lvl { <?php 
if($this->config->get('RGen_Nav_hover') != ''){ 
	?>background-color:<?php echo $this->config->get('RGen_Nav_hover'); ?>;<?php 
} 
if($this->config->get('RGen_NavFont_hover') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_NavFont_hover'); ?>;<?php 
}
?> }<?php 
}
if($this->config->get('RGen_NavSub_bg') != ''){ 
?>#menu > ul > li .sub-menu { background-color:<?php echo $this->config->get('RGen_NavSub_bg'); ?>; }<?php 
} 

if($this->config->get('RGen_NavSub') != ''){ 
?>#menu > ul > li .sub-menu > ul { background-color:<?php echo $this->config->get('RGen_NavSub'); ?>; }<?php 
} 

if($this->config->get('RGen_NavSubFont') != '' || $this->config->get('RGen_NavSubBorder') != ''){ 
?>#menu > ul > li ul > li > a.sub-lvl { <?php 
if($this->config->get('RGen_NavSubFont') != ''){ 
	?>color: #<?php echo $this->config->get('RGen_NavSubFont'); ?>;<?php 
} 
if($this->config->get('RGen_NavSubBorder') != ''){ 
	?>border-bottom-color:<?php echo $this->config->get('RGen_NavSubBorder'); ?>;<?php 
} 
?> }<?php
}
if($this->config->get('RGen_NavSub_hover') != '' || $this->config->get('RGen_NavSubFont_hover') != ''){ 
?>#menu > ul > li ul > li > a.sub-lvl:hover { <?php 
if($this->config->get('RGen_NavSub_hover') != ''){ 
	?>background-color: <?php echo $this->config->get('RGen_NavSub_hover'); ?>;<?php 
} 
if($this->config->get('RGen_NavSubFont_hover') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_NavSubFont_hover'); ?>;<?php 
} ?> }<?php
}

/* BRANDS, PRODUCT AND CATEGORY MENU */
if($this->config->get('RGen_megaMenu_colors') != ''){ 
	$RGen_megaMenu_colors_val = $this->config->get('RGen_megaMenu_colors');
	$RGen_megaMenu_colors = explode('|', isset($RGen_megaMenu_colors_val) ? $RGen_megaMenu_colors_val : null);
?>
#menu > ul > li .menu-html-wrp {
	background-color: <?php echo $RGen_megaMenu_colors[0]; /*RGen_menuOuter_bg*/ ?>;
}
#menu .menu-html-wrp .menu-html {
	background-color: <?php echo $RGen_megaMenu_colors[1]; /*RGen_menuInner_bg*/ ?>;
}
#menu .sub-menu .hr,
#menu .menu-mega .menu-mg-data .menu-grid {
	border-color: <?php echo $RGen_megaMenu_colors[2]; /*RGen_mg_menuSeparators*/ ?>;
}
#menu .menu-mega .menu-sub .menu-sub-list,
#menu .cat-mega .cat-sub .cat-sub-list {
	border-color: <?php echo $RGen_megaMenu_colors[3]; /*RGen_mg_sublinkBorder*/ ?>;
}
#menu .menu-mega .menu-grid .menu-main,
#menu .prd-mega .prd-grid .name,
#menu .cat-mega .cat-grid .cat-main,
#menu .menu-mega .menu-mg-data .brand-grid a strong {
	border-color: <?php echo $RGen_megaMenu_colors[12]; /*RGen_mg_mainlinkBorder*/ ?>;
}
#menu .prd-mega .prd-grid,
#menu .menu-mega .menu-mg-data .brand-grid a {
	border-color: <?php echo $RGen_megaMenu_colors[6]; /*RGen_mg_menuItemBorder*/ ?>;
}
#menu .prd-mega .prd-grid:hover,
#menu .menu-mega .menu-mg-data .brand-grid a:hover {
	border-color: <?php echo $RGen_megaMenu_colors[7]; /*RGen_mg_menuItemBorder_hover*/ ?>;
}
#menu .menu-mega .menu-grid .menu-main,
#menu .menu-mega .menu-mg-data .brand-grid a strong,
#menu .prd-mega .prd-grid a {
	color: #<?php echo $RGen_megaMenu_colors[4]; /*RGen_mg_menuLinks*/ ?>;
}
#menu .menu-mega .menu-sub .menu-sub-list > a,
#menu .cat-mega .cat-grid .cat-sub .cat-sub-list > a {
	color: #<?php echo $RGen_megaMenu_colors[5]; /*RGen_mg_subLinks*/ ?>;
}
#menu .prd-mega .prd-grid .price-wrp .price-new {
	color: #<?php echo $RGen_megaMenu_colors[10]; /*RGen_mg_priceNew*/ ?>;
}
#menu .prd-mega .prd-grid .price-wrp .price-old {
	color: #<?php echo $RGen_megaMenu_colors[11]; /*RGen_mg_priceOld*/ ?>;
}
#menu .prd-mega .prd-grid a.addcart-bt {
	background: <?php echo $RGen_megaMenu_colors[8]; /*RGen_mg_btnBg*/ ?>;
	color: #<?php echo $RGen_megaMenu_colors[9]; /*RGen_mg_btnTxt*/ ?>;
}
<?php } ?>
/* MOBILE MENU */
#menu.mob-menu { background-color: <?php echo $this->config->get('RGen_mob_Menubar'); ?>; }
#menu.mob-menu > span:before { color: <?php echo $this->config->get('RGen_mob_Menuicon'); ?>; }
#menu.mob-menu > ul > li {
	border-color: <?php echo $this->config->get('RGen_mob_separator'); ?>;
}
#menu > ul > li > a.top-lvl {
	background-color: <?php echo $this->config->get('RGen_mob_menulink'); ?>;
	color: #<?php echo $this->config->get('RGen_mob_menutext'); ?>;
}
#menu > ul > li:hover > a.top-lvl {
	background-color: <?php echo $this->config->get('RGen_mob_menulink_hover'); ?>;
	color: #<?php echo $this->config->get('RGen_mob_menutext_hover'); ?>;
}
#menu.mob-menu .sub-menu {
	background: <?php echo $this->config->get('RGen_mob_submenu'); ?>;
}
#menu.mob-menu > ul > li ul li a.sub-lvl {
	border-color: <?php echo $this->config->get('RGen_mob_submenu_separator'); ?>;
	background-color: <?php echo $this->config->get('RGen_mob_submenu'); ?>;
	color: #<?php echo $this->config->get('RGen_mob_submenutext'); ?>;
}
#menu.mob-menu > ul > li ul li a.sub-lvl:hover {
	background-color: <?php echo $this->config->get('RGen_mob_submenu_hover'); ?>;
	color: #<?php echo $this->config->get('RGen_mob_submenutext_hover'); ?>;
}
#menu.mob-menu .mc {
	background-color: <?php echo $this->config->get('RGen_mob_menuarrow_bg'); ?>;
	color: #<?php echo $this->config->get('RGen_mob_menuarrow'); ?>;
}

<?php
/* HOME BUTTON */
if($this->config->get('RGen_homeBt') != '' || $this->config->get('RGen_homeBtRing') != '' || $this->config->get('RGen_homeBtIcon') != ''){ 
?>a.home-btn { <?php 
if($this->config->get('RGen_homeBt') != ''){ 
	?>background-color:<?php echo $this->config->get('RGen_homeBt'); ?>;<?php 
}
if($this->config->get('RGen_homeBtIcon') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_homeBtIcon'); ?>;<?php 
}
if($this->config->get('RGen_homeBtRing') != ''){
	?>box-shadow:0px 0px 0px 5px <?php echo $this->config->get('RGen_homeBtRing'); ?>;<?php
} 
?> }<?php
}
if($this->config->get('RGen_homeBt_hover') != '' || $this->config->get('RGen_homeBtIcon_hover') != ''){ 
?>a.home-btn:hover { <?php
if($this->config->get('RGen_homeBt_hover') != ''){ 
	?>background-color:<?php echo $this->config->get('RGen_homeBt_hover'); ?>;<?php
}
if($this->config->get('RGen_homeBtIcon_hover') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_homeBtIcon_hover'); ?>;<?php 
} 
?>} <?php 
}

if($this->config->get('RGen_searchBg') != '' || $this->config->get('RGen_searchText') != ''){ 
?>#header #search input, .head1 #header #search input { <?php 
if($this->config->get('RGen_searchBg') != ''){
	?>background:<?php echo $this->config->get('RGen_searchBg'); ?>;<?php
}
if($this->config->get('RGen_searchText') != ''){
	?>color:#<?php echo $this->config->get('RGen_searchText'); ?>;<?php
}
?> }<?php
}
if($this->config->get('RGen_searchOuterBg') != ''){ 
?>#header #search .search-box, .head1 #header #search .search-box {
	background:<?php echo $this->config->get('RGen_searchOuterBg'); ?>;<?php
?> }<?php
}

if($this->config->get('RGen_searchBt') != '' || $this->config->get('RGen_searchBtRing') != '' || $this->config->get('RGen_searchBtIcon') != ''){ 
?>#header .button-search { <?php 
if($this->config->get('RGen_searchBt') != ''){ 
	?>background-color:<?php echo $this->config->get('RGen_searchBt'); ?>;<?php 
}
if($this->config->get('RGen_searchBtIcon') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_searchBtIcon'); ?>;<?php 
}
if($this->config->get('RGen_searchBtRing') != ''){
	?>box-shadow:0px 0px 0px 5px <?php echo $this->config->get('RGen_searchBtRing'); ?>;<?php
}?> }<?php
}

if($this->config->get('RGen_searchBtRing_hover') != '' || $this->config->get('RGen_searchBt_hover') != '' || $this->config->get('RGen_searchBtIcon_hover') != ''){
?>#header #search.active .button-search, #header .button-search:hover { <?php
if($this->config->get('RGen_searchBtRing_hover') != ''){
	?>box-shadow:0px 0px 0px 5px <?php echo $this->config->get('RGen_searchBtRing_hover'); ?>;<?php 
} 
if($this->config->get('RGen_searchBt_hover') != ''){ 
	?>background-color:<?php echo $this->config->get('RGen_searchBt_hover'); ?>;<?php 
}
if($this->config->get('RGen_searchBtIcon_hover') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_searchBtIcon_hover'); ?>;<?php 
}
?> }
.head1 #header .button-search, .head1 #header .button-search:hover { box-shadow: none; }<?php
}

/* CURRENCY AND LANGUAGE */
if($this->config->get('RGen_CurLanBg') != '' || $this->config->get('RGen_CurLanSelected') != ''){ 
?>#currency, #language, .dd { <?php
if($this->config->get('RGen_CurLanBg') != ''){ 
	?>background-color: <?php echo $this->config->get('RGen_CurLanBg'); ?>;<?php
}
if($this->config->get('RGen_CurLanSelected') != ''){ 
	?>color: #<?php echo $this->config->get('RGen_CurLanSelected'); ?>;<?php
}
?> }<?php
}
if($this->config->get('RGen_CurLanArrow') != ''){
?>.selected-language:before, .selected-currency:before, .dd .dd-hdl:before {
	color: #<?php echo $this->config->get('RGen_CurLanArrow'); ?>; }<?php
}

if($this->config->get('RGen_CurLanDropdown') != ''){
?>#currency ul, #language ul, .dd ul {
	background:<?php echo $this->config->get('RGen_CurLanDropdown'); ?>; 
	}<?php
}
if($this->config->get('RGen_CurLanText') != ''){
?>#currency ul li a, #language ul li a, .dd ul li a {
	color: #<?php echo $this->config->get('RGen_CurLanText'); ?>; 
	}<?php
}
if($this->config->get('RGen_CurLanText_hover') != '' || $this->config->get('RGen_CurLanDropdown_hover') != ''){
?>#currency ul li a:hover, #language ul li a:hover, .dd ul li a:hover {
	color: #<?php echo $this->config->get('RGen_CurLanText_hover'); ?>; 
	background: <?php echo $this->config->get('RGen_CurLanDropdown_hover'); ?>;
	}<?php
}
/* HEADER MINI CART */
if($this->config->get('RGen_MiniCart') != ''){
?>#header #cart .heading { background-color:<?php echo $this->config->get('RGen_MiniCart'); ?>; }<?php
}
if($this->config->get('RGen_MiniCartText') != ''){
?>#header #cart .heading a span { color:#<?php echo $this->config->get('RGen_MiniCartText'); ?>; }<?php
}
if($this->config->get('RGen_MiniCartIcon') != ''){
?>#header #cart .heading a { color:#<?php echo $this->config->get('RGen_MiniCartIcon'); ?>; }
.dd .dd-hdl:after { background-color:#<?php echo $this->config->get('RGen_MiniCartIcon'); ?>; }<?php
}
if($this->config->get('RGen_MiniCartContent') != '' || $this->config->get('RGen_MiniCartContent_text') != ''){
?>#header #cart .content { <?php
if($this->config->get('RGen_MiniCartContent') != ''){
	?>background:<?php echo $this->config->get('RGen_MiniCartContent'); ?>;<?php
}
if($this->config->get('RGen_MiniCartContent') != ''){
	?>color:#<?php echo $this->config->get('RGen_MiniCartContent_text'); ?>;<?php
}
?>}<?php
}

if($this->config->get('RGen_MiniCartContent_text') != ''){
?>.mini-cart-info td.total strong { color:#<?php echo $this->config->get('RGen_MiniCartContent_text'); ?>; }<?php
}

if($this->config->get('RGen_MiniCartContent') != ''){
?>#header #cart .cart-arrow { color:<?php echo $this->config->get('RGen_MiniCartContent'); ?>; }<?php
}

if($this->config->get('RGen_MiniCartContent_image') != ''){
?>.mini-cart-info .image a { background:<?php echo $this->config->get('RGen_MiniCartContent_image'); ?>; }<?php
}

if($this->config->get('RGen_MiniCartContent_links') != ''){
?>.mini-cart-info td.total a,
.mini-cart-info .name a { color:#<?php echo $this->config->get('RGen_MiniCartContent_links'); ?>; }<?php
}

if($this->config->get('RGen_MiniCartContent_border') != ''){
?>.mini-cart-info td { border-color:<?php echo $this->config->get('RGen_MiniCartContent_border'); ?>; }<?php
}

if($this->config->get('RGen_MiniCartContent_total') != ''){
?>.mini-cart-total { background:<?php echo $this->config->get('RGen_MiniCartContent_total'); ?>; }<?php
}

if($this->config->get('RGen_MiniCartContent_value') != ''){
?>.mini-cart-total td { color:#<?php echo $this->config->get('RGen_MiniCartContent_value'); ?>;	}<?php
}

if($this->config->get('RGen_MiniCartContent_label') != ''){
?>.mini-cart-total tr td:first-child { color:#<?php echo $this->config->get('RGen_MiniCartContent_label'); ?>; }<?php
} 

/* SLIDESHOW */
if($this->config->get('RGen_ssBg') != ''){
?>.slideshow { background-color: <?php echo $this->config->get('RGen_ssBg'); ?>; }<?php
}

/* SLIDESHOW - CAPTION 1 */
if($this->config->get('RGen_c1_hdBg') != '' || $this->config->get('RGen_c1_hdText') != ''){
?>.cap1 .nivo-caption .cap-hd {
	background-color: <?php echo $this->config->get('RGen_c1_hdBg'); ?>;
	color: <?php echo "#" . $this->config->get('RGen_c1_hdText'); ?>; }<?php 
}
if($this->config->get('RGen_c1_dataBg') != '' || $this->config->get('RGen_c1_dataText') != ''){
?>.cap1 .nivo-caption .cap-data {
	background-color: <?php echo $this->config->get('RGen_c1_dataBg'); ?>;
	color: <?php echo "#" . $this->config->get('RGen_c1_dataText'); ?>; }<?php
}
if($this->config->get('RGen_c1_dataBg') != '' || $this->config->get('RGen_c1_dataText') != ''){
?>.cap1 .nivo-caption .cap-link {
	background-color: <?php echo $this->config->get('RGen_c1_linkBg'); ?>;
	color: <?php echo "#" . $this->config->get('RGen_c1_linkText'); ?>; }<?php
}

/* SLIDESHOW - CAPTION 2 */
if($this->config->get('RGen_c2_hdText') != '' || $this->config->get('RGen_c2_hdTextshd') != ''){
?>.cap2 .nivo-caption .cap-hd {
	color: <?php echo "#" . $this->config->get('RGen_c2_hdText'); ?>;
	text-shadow: 0px 1px 3px <?php echo $this->config->get('RGen_c2_hdTextshd'); ?>;
	filter: dropshadow(color=<?php echo $this->config->get('RGen_c2_hdTextshd'); ?>, offx=0, offy=1); }<?php
}
if($this->config->get('RGen_c2_dataText') != '' || $this->config->get('RGen_c2_dataTextshd') != '' || $this->config->get('RGen_c2_dataBdr') != ''){
?>.cap2 .nivo-caption .cap-data {
	color: <?php echo "#" . $this->config->get('RGen_c2_dataText'); ?>;
	text-shadow: 0px 1px 3px <?php echo $this->config->get('RGen_c2_dataTextshd'); ?>;
	filter: dropshadow(color=<?php echo $this->config->get('RGen_c2_dataTextshd'); ?>, offx=0, offy=1);
	border-color: <?php echo $this->config->get('RGen_c2_dataBdr'); ?>; }<?php
}
if($this->config->get('RGen_c2_linkBdr') != '' || $this->config->get('RGen_c2_linkBg') != '' || $this->config->get('RGen_c2_linkText') != ''){
?>.cap2 .nivo-caption .cap-link {
	border-color: <?php echo $this->config->get('RGen_c2_linkBdr'); ?>;
	background-color: <?php echo $this->config->get('RGen_c2_linkBg'); ?>;
	color: <?php echo "#" . $this->config->get('RGen_c2_linkText'); ?>; }<?php
}
if($this->config->get('RGen_c2_linkBdr_hover') != '' || $this->config->get('RGen_c2_linkBg_hover') != '' || $this->config->get('RGen_c2_linkText_hover') != ''){
?>.cap2 .nivo-caption .cap-link:hover {
	border-color: <?php echo $this->config->get('RGen_c2_linkBdr_hover'); ?>;
	background-color: <?php echo $this->config->get('RGen_c2_linkBg_hover'); ?>;
	color: <?php echo "#" . $this->config->get('RGen_c2_linkText_hover'); ?>; }<?php
}

/* SLIDESHOW - CAPTION 3 */
if($this->config->get('RGen_c3_Bg') != ''){
?>.cap3 .nivo-caption > div {
	background-color: <?php echo $this->config->get('RGen_c3_Bg'); ?>; }<?php
}
if($this->config->get('RGen_c3_hdText') != ''){
?>.cap3 .nivo-caption .cap-hd {
	color: <?php echo "#" . $this->config->get('RGen_c3_hdText'); ?>; }<?php
}
if($this->config->get('RGen_c3_dataText') != '' || $this->config->get('RGen_c3_dataBdr') != ''){
?>.cap3 .nivo-caption .cap-data {
	color: <?php echo "#" . $this->config->get('RGen_c3_dataText'); ?>;
	border-color: <?php echo $this->config->get('RGen_c3_dataBdr'); ?>; }<?php
}
if($this->config->get('RGen_c3_linkBg') != '' || $this->config->get('RGen_c3_linkText') != ''){
?>.cap3 .nivo-caption .cap-link {
	background-color: <?php echo $this->config->get('RGen_c3_linkBg'); ?>;
	color: <?php echo "#" . $this->config->get('RGen_c3_linkText'); ?>; }<?php
}
if($this->config->get('RGen_c3_linkBg_hover') != '' || $this->config->get('RGen_c3_linkText_hover') != '' || $this->config->get('RGen_c3_linkBdr_hover') != ''){
?>.cap3 .nivo-caption .cap-link:hover {
	background-color: <?php echo $this->config->get('RGen_c3_linkBg_hover'); ?>;
	color: <?php echo "#" . $this->config->get('RGen_c3_linkText_hover'); ?>;
	border-color: <?php echo $this->config->get('RGen_c3_linkBdr_hover'); ?>; }<?php
}


/* CAPTION 4 */
if($this->config->get('RGen_c4_hdBg') != '' || $this->config->get('RGen_c4_hdText') != ''){
?>.cap4 .nivo-caption .cap-hd {
	background-color: <?php echo $this->config->get('RGen_c4_hdBg'); ?>;
	color: <?php echo "#" . $this->config->get('RGen_c4_hdText'); ?>; }<?php
}
if($this->config->get('RGen_c4_dataText') != ''){
?>.cap4 .nivo-caption .cap-data {
	color: <?php echo "#" . $this->config->get('RGen_c4_dataText'); ?>; }<?php
}
if($this->config->get('RGen_c4_linkBg') != '' || $this->config->get('RGen_c4_linkText') != ''){
?>.cap4 .nivo-caption .cap-link {
	background: <?php echo $this->config->get('RGen_c4_linkBg'); ?>;
	color: <?php echo "#" . $this->config->get('RGen_c4_linkText'); ?>; }<?php
}
if($this->config->get('RGen_c4_link_hover') != ''){
?>.cap4 .nivo-caption .cap-link:hover {
	-webkit-box-shadow: 0px 0px 0px 6px <?php echo $this->config->get('RGen_c4_link_hover'); ?>;
	box-shadow: 0px 0px 0px 6px <?php echo $this->config->get('RGen_c4_link_hover'); ?>; }<?php
}

/* CAPTION 5 */
if($this->config->get('RGen_c5_Bg') != ''){
?>.cap5 .nivo-caption > div {
	border-color: <?php echo $this->config->get('RGen_c5_Bg'); ?>; }<?php
}
if($this->config->get('RGen_c5_hdText') != ''){
?>.cap5 .nivo-caption .cap-hd {
	color: <?php echo "#" . $this->config->get('RGen_c5_hdText'); ?>; }<?php
}
if($this->config->get('RGen_c5_dataText') != '' || $this->config->get('RGen_c5_dataBdr') != ''){
?>.cap5 .nivo-caption .cap-data {
	color: <?php echo "#" . $this->config->get('RGen_c5_dataText'); ?>;
	border-color: <?php echo $this->config->get('RGen_c5_dataBdr'); ?>; }<?php
}
if($this->config->get('RGen_c5_linkBg') != '' || $this->config->get('RGen_c5_linkText') != ''){
?>.cap5 .nivo-caption .cap-link {
	background-color: <?php echo $this->config->get('RGen_c5_linkBg'); ?>;
	color: <?php echo "#" . $this->config->get('RGen_c5_linkText'); ?>; }<?php
}
if($this->config->get('RGen_c5_linkBg_hover') != '' || $this->config->get('RGen_c5_linkText_hover') != '' || $this->config->get('RGen_c5_linkBdr_hover') != ''){
?>.cap5 .nivo-caption .cap-link:hover {
	background-color: <?php echo $this->config->get('RGen_c5_linkBg_hover'); ?>;
	color: <?php echo "#" . $this->config->get('RGen_c5_linkText_hover'); ?>;
	border-color: <?php echo $this->config->get('RGen_c5_linkBdr_hover'); ?>; }<?php
}

/* CAPTION 6 */
if($this->config->get('RGen_c6_hdText') != ''){
?>.cap6 .nivo-caption .cap-hd {
	color: <?php echo "#" . $this->config->get('RGen_c6_hdText'); ?>; }<?php
}
if($this->config->get('RGen_c6_dataText') != ''){
?>.cap6 .nivo-caption .cap-data {
	color: <?php echo "#" . $this->config->get('RGen_c6_dataText'); ?>; }<?php
}
if($this->config->get('RGen_c6_linkBg') != '' || $this->config->get('RGen_c6_linkText') != ''){
?>.cap6 .nivo-caption .cap-link {
	background-color: <?php echo $this->config->get('RGen_c6_linkBg'); ?>;
	color: <?php echo "#" . $this->config->get('RGen_c6_linkText'); ?>; }<?php
}
if($this->config->get('RGen_c6_linkBg_hover') != '' || $this->config->get('RGen_c6_link_hover') != '' || $this->config->get('RGen_c6_linkBdr_hover') != ''){
?>.cap6 .nivo-caption .cap-link:hover {
	background-color: <?php echo $this->config->get('RGen_c6_linkBg_hover'); ?>;
	color: <?php echo "#" . $this->config->get('RGen_c6_link_hover'); ?>;
	border-color: <?php echo $this->config->get('RGen_c6_linkBdr_hover'); ?>; }<?php
}

/* PRODUCT BOX - 1 */
/* if($this->config->get('RGen_RefinCateHdBg') != ''){ 
?>.refine-cate h2 { background-color:<?php echo $this->config->get('RGen_RefinCateHdBg'); ?>; }<?php 
} */
if($this->config->get('RGen_RefinCateHdFontColor') != ''){ 
?>.refine-cate h2 span { color:#<?php echo $this->config->get('RGen_RefinCateHdFontColor'); ?>; }<?php 
} 

if($this->config->get('RGen_RefinCateBg') != '' || $this->config->get('RGen_RefinCateFontColour') != ''){ 
?>.refine-cate ul li a { <?php 
if($this->config->get('RGen_RefinCateBg') != ''){ 
	?>background-color:<?php echo $this->config->get('RGen_RefinCateBg'); ?>;<?php 
} 
if($this->config->get('RGen_RefinCateFontColour') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_RefinCateFontColour'); ?>; <?php 
} 
?> }<?php 
}


if($this->config->get('RGen_prdBack') != ''){ ?>
.commentList .even,
#productRelated .relProduct,
.prd-block,
.product-list .image,
.product-list .info-wrp,
.prd-block .info {
	background-color:<?php echo $this->config->get('RGen_prdBack'); ?>; }<?php 
}
if($this->config->get('RGen_prdHover_Bg') != ''){ ?>
.prd-block .info {
	background-color:<?php echo $this->config->get('RGen_prdHover_Bg'); ?>; }<?php 

?>.product-list .info { background:none; }<?php
}
if($this->config->get('RGen_prdBorder') != ''){ ?>
.prd-block .info-wrp ul li, 
.product-list .buy-option ul li,
.prd-block .info {
	border-color:<?php echo $this->config->get('RGen_prdBorder'); ?>; }<?php
}
if($this->config->get('RGen_prdName') != ''){ 
?>.prd-block a.name {
	color:#<?php echo $this->config->get('RGen_prdName'); ?>; }<?php 
} 
if($this->config->get('RGen_prdLinks') != ''){ 
?>.prd-block .info-wrp ul li a, 
.product-list .buy-option ul li a {
	color:#<?php echo $this->config->get('RGen_prdLinks'); ?>; }<?php 
}
if($this->config->get('RGen_prdLinks_hover') != ''){ 
?>.prd-block .info-wrp ul li a:hover, 
.product-list .buy-option ul li a:hover {
	color:#<?php echo $this->config->get('RGen_prdLinks_hover'); ?>;
	}<?php 
}
if($this->config->get('RGen_prdText') != ''){ 
?>.product-list .description {
	color:#<?php echo $this->config->get('RGen_prdText'); ?>; }<?php 
} 

if($this->config->get('RGen_PriceBg') != '' || $this->config->get('RGen_Price') != ''){ 
?>.prd-block .info-wrp .price,
.product-list .prd-block .info-wrp .price,
.product-info .price { <?php 
if($this->config->get('RGen_PriceBg') != ''){ 
	?>background-color:#<?php echo $this->config->get('RGen_PriceBg'); ?>;<?php 
}
if($this->config->get('RGen_Price') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_Price'); ?>;<?php 
} ?> }<?php 
}

if($this->config->get('RGen_Price') != ''){ 
?>.product-info .price-new,
.prd-block .info-wrp .price-new,
.product-list .prd-block .price-new {
	color:#<?php echo $this->config->get('RGen_Price'); ?>;	}<?php 
} 
if($this->config->get('RGen_PriceRing') != ''){
?>.product-list .prd-block .info-wrp .price,
.product-info .price { 
	box-shadow: 0px 0px 0px 10px <?php echo $this->config->get('RGen_PriceRing'); ?>; }<?php
}
if($this->config->get('RGen_OldPrice') != ''){ 
?>.prd-block .info-wrp .price-old,
.product-info .price .price-old {
	color: #<?php echo $this->config->get('RGen_OldPrice'); ?>;
	}<?php 
}

if($this->config->get('RGen_cartBt') != '' || $this->config->get('RGen_cartBtRing') != '' || $this->config->get('RGen_cartBtIcon') != ''){ 
?>.cart-bt,
.prd-block .cart-bt,
.product-info .cart .cart-bt,
.product-list .buy-option .cart-bt { <?php 
if($this->config->get('RGen_cartBt') != ''){ 
	?>background-color:#<?php echo $this->config->get('RGen_cartBt'); ?>;<?php 
}
if($this->config->get('RGen_cartBtRing') != ''){
	?>box-shadow: 0px 0px 0px 6px <?php echo $this->config->get('RGen_cartBtRing'); ?>;<?php
} 
if($this->config->get('RGen_cartBtIcon') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_cartBtIcon'); ?>;<?php 
}
?> }<?php
}

if($this->config->get('RGen_cartBt_hover') != '' || $this->config->get('RGen_cartBtRing_hover') != '' || $this->config->get('RGen_cartBtIcon_hover') != ''){ 
?>.cart-bt:hover,
.prd-block .cart-bt:hover,
.product-info .cart .cart-bt:hover,
.product-list .buy-option .cart-bt:hover { <?php 
if($this->config->get('RGen_cartBt_hover') != ''){ 
	?>background-color:#<?php echo $this->config->get('RGen_cartBt_hover'); ?>;<?php 
}
if($this->config->get('RGen_cartBtRing_hover') != ''){
	?>box-shadow: 0px 0px 0px 6px <?php echo $this->config->get('RGen_cartBtRing_hover'); ?>;<?php
} 
if($this->config->get('RGen_cartBtIcon_hover') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_cartBtIcon_hover'); ?>;<?php 
}
?> }<?php
} 

/* PRODUCT BOX - 1 */
if($this->config->get('RGen_prd2_image') != ''){ 
?>.prd-block1 .image { background: <?php echo $this->config->get('RGen_prd2_image'); ?>; }<?php
}
if($this->config->get('RGen_prd2_name') != ''){ 
?>.prd-block1 .name { color: #<?php echo $this->config->get('RGen_prd2_name'); ?>; }<?php
}
if($this->config->get('RGen_prd2_priceOld') != ''){ 
?>.prd-block1 .price-old { color: #<?php echo $this->config->get('RGen_prd2_priceOld'); ?>; }<?php
}
if($this->config->get('RGen_prd2_priceNew') != ''){ 
?>.prd-block1 .price-new { color: #<?php echo $this->config->get('RGen_prd2_priceNew'); ?>; }<?php
}
if($this->config->get('RGen_prd2_priceTax') != ''){ 
?>.prd-block1 .price-tax { color: #<?php echo $this->config->get('RGen_prd2_priceTax'); ?>; }<?php
}
if($this->config->get('RGen_prd2_link') != ''){ 
?>.prd-block1 ul li a { color: #<?php echo $this->config->get('RGen_prd2_link'); ?>; }<?php
}
if($this->config->get('RGen_prd2_link_hover') != ''){ 
?>.prd-block1 ul li a:hover { color: #<?php echo $this->config->get('RGen_prd2_link_hover'); ?>; }<?php
}
if($this->config->get('RGen_prd2_cartbt_bg') != '' || $this->config->get('RGen_prd2_cartbt') != '' || $this->config->get('RGen_prd2_cartbt_bdr') != ''){ 
?>.prd-block1 a.cart-bt { <?php
	if($this->config->get('RGen_prd2_cartbt_bg') != ''){ 
	?>background-color: <?php echo $this->config->get('RGen_prd2_cartbt_bg'); ?>;<?php
	}
	if($this->config->get('RGen_prd2_cartbt') != ''){ 
	?>color: <?php echo $this->config->get('RGen_prd2_cartbt'); ?>;<?php  
	}
	if($this->config->get('RGen_prd2_cartbt_bdr') != ''){ 
	?>-webkit-box-shadow: inset 0px 0px 0px 2px <?php echo $this->config->get('RGen_prd2_cartbt_bdr'); ?>;
	box-shadow: inset 0px 0px 0px 2px <?php echo $this->config->get('RGen_prd2_cartbt_bdr'); ?>;<?php  
	}
?> } <?php
}
if($this->config->get('RGen_prd2_cartbt_bg_hover') != '' || $this->config->get('RGen_prd2_cartbt_hover') != '' || $this->config->get('RGen_prd2_cartbt_bdr_hover') != ''){ 
?>.prd-block1 a.cart-bt:hover {<?php
	if($this->config->get('RGen_prd2_cartbt_bg_hover') != ''){ 
	?>background-color: <?php echo $this->config->get('RGen_prd2_cartbt_bg_hover'); ?>;<?php
	}
	if($this->config->get('RGen_prd2_cartbt_hover') != ''){ 
	?>color: <?php echo $this->config->get('RGen_prd2_cartbt_hover'); ?>;<?php  
	}
	if($this->config->get('RGen_prd2_cartbt_bdr_hover') != ''){ 
	?>-webkit-box-shadow: inset 0px 0px 0px 2px <?php echo $this->config->get('RGen_prd2_cartbt_bdr_hover'); ?>;
	box-shadow: inset 0px 0px 0px 2px <?php echo $this->config->get('RGen_prd2_cartbt_bdr_hover'); ?>;<?php  
	}
?> } <?php
}

/* PRODUCT BOX - 2 */
if($this->config->get('RGen_prd3_bdr') != '' || $this->config->get('RGen_prd3_bg') != ''){ 
?>.prd-block2 { <?php
	if($this->config->get('RGen_prd3_bdr') != ''){ 
	?>box-shadow: inset 0px 0px 0 <?php if($this->config->get('RGen_prd3_bdr_w') != ''){ echo $this->config->get('RGen_prd3_bdr_w'); }else{ echo '2'; } ?>px <?php echo $this->config->get('RGen_prd3_bdr'); ?>;<?php
	}
	if($this->config->get('RGen_prd3_bg') != ''){ 
	?>background-color: <?php echo $this->config->get('RGen_prd3_bg'); ?>;<?php
	}
?> } <?php
} 

if($this->config->get('RGen_prd3_bdr_hover') != '' || $this->config->get('RGen_prd3_bg_hover') != ''){ 
?>.prd-block2:hover { <?php
	if($this->config->get('RGen_prd3_bdr_hover') != ''){ 
	?>box-shadow: inset 0px 0px 0 <?php if($this->config->get('RGen_prd3_bdr_w_hover') != ''){ echo $this->config->get('RGen_prd3_bdr_w_hover'); }else{ echo '2'; } ?>px <?php echo $this->config->get('RGen_prd3_bdr_hover'); ?>;<?php
	}
	if($this->config->get('RGen_prd3_bg_hover') != ''){ 
	?>background-color: <?php echo $this->config->get('RGen_prd3_bg_hover'); ?>;<?php
	}
?> } <?php
}

if($this->config->get('RGen_prd3_name') != ''){ 
?>.prd-block2 a.name {
	color: #<?php echo $this->config->get('RGen_prd3_name'); ?>; }<?php
}

if($this->config->get('RGen_prd3_name_hover') != ''){ 
?>.prd-block2 a.name:hover {
	color: #<?php echo $this->config->get('RGen_prd3_name_hover'); ?>; }<?php
}

if($this->config->get('RGen_prd3_priceOld') != ''){ 
?>.prd-block2 .info-wrp .price-tax, .prd-block2 .info-wrp .price-old {
	color: #<?php echo $this->config->get('RGen_prd3_priceOld'); ?>; }<?php
}
if($this->config->get('RGen_prd3_priceNew') != ''){ 
?>.prd-block2 .info-wrp .price-new {
	color: #<?php echo $this->config->get('RGen_prd3_priceNew'); ?>; }<?php
}

if($this->config->get('RGen_prd3_cartText') != '' || $this->config->get('RGen_prd3_cartBg') != ''){ 
?>.prd-block2 .addtocart { <?php
	if($this->config->get('RGen_prd3_cartText') != ''){ 
	?>color: #<?php echo $this->config->get('RGen_prd3_cartText'); ?>;<?php
	}
	if($this->config->get('RGen_prd3_cartBg') != ''){ 
	?>background-color: <?php echo $this->config->get('RGen_prd3_cartBg'); ?>;<?php
	}
?> } <?php
}

if($this->config->get('RGen_prd3_cartText_hover') != '' || $this->config->get('RGen_prd3_cartBg_hover') != ''){ 
?>.prd-block2 .addtocart:hover { <?php
	if($this->config->get('RGen_prd3_cartText') != ''){ 
	?>color: #<?php echo $this->config->get('RGen_prd3_cartText_hover'); ?>;<?php
	}
	if($this->config->get('RGen_prd3_cartBg') != ''){ 
	?>background-color: <?php echo $this->config->get('RGen_prd3_cartBg_hover'); ?>;<?php
	}
?> } <?php
}

if($this->config->get('RGen_prd3_prdbtBdr') != '' || $this->config->get('RGen_prd3_prdbtIcon') != '' || $this->config->get('RGen_prd3_prdbtBg') != ''){ 
?>.prd-block2 .buy-option .prdbt { <?php
	if($this->config->get('RGen_prd3_prdbtBdr') != ''){
	?>box-shadow: inset 0px 0px 0px 2px <?php echo $this->config->get('RGen_prd3_prdbtBdr'); ?>;<?php
	}
	if($this->config->get('RGen_prd3_prdbtIcon') != ''){
	?>color: #<?php echo $this->config->get('RGen_prd3_prdbtIcon'); ?>;<?php
	}
	if($this->config->get('RGen_prd3_prdbtBg') != ''){
	?>background-color: <?php echo $this->config->get('RGen_prd3_prdbtBg'); ?>;<?php
	}
?> } <?php
}

if($this->config->get('RGen_prd3_prdbtBdr_hover') != '' || $this->config->get('RGen_prd3_prdbtIcon_hover') != '' || $this->config->get('RGen_prd3_prdbtBg_hover') != ''){ 
?>.prd-block2 .buy-option .prdbt:hover { <?php
	if($this->config->get('RGen_prd3_prdbtBdr_hover') != ''){
	?>box-shadow: inset 0px 0px 0px 2px <?php echo $this->config->get('RGen_prd3_prdbtBdr_hover'); ?>;<?php
	}
	if($this->config->get('RGen_prd3_prdbtIcon_hover') != ''){
	?>color: #<?php echo $this->config->get('RGen_prd3_prdbtIcon_hover'); ?>;<?php
	}
	if($this->config->get('RGen_prd3_prdbtBg_hover') != ''){
	?>background-color: <?php echo $this->config->get('RGen_prd3_prdbtBg_hover'); ?>;<?php
	}
?> } <?php
}
if($this->config->get('RGen_prd3_rating') != ''){
?>.prd-block2 .info-wrp .rating {
	background-color: <?php echo $this->config->get('RGen_prd3_rating'); ?>; }<?php
}

/* PRODUCT BOX - 3 */ ?>
.prd-block3 {
	background-color: <?php echo $this->config->get('RGen_prd4_bg'); ?>;
	box-shadow: 0 0 0px 1px <?php echo $this->config->get('RGen_prd4_bdr'); ?>;
}
.prd-block3:hover {
	box-shadow: 0 0 0px 1px <?php echo $this->config->get('RGen_prd4_bdr_hover'); ?>;
}
.prd-block3 .nameText a {
	color: #<?php echo $this->config->get('RGen_prd4_name'); ?>;
}
.prd-block3 .price {
	color: #<?php echo $this->config->get('RGen_prd4_price'); ?>;
}
.prd-block3 .price-tax, .prd-block3 .price-old {
	color: #<?php echo $this->config->get('RGen_prd4_priceold'); ?>;	
}
.prd-block3 .buy-options a {
	color: #<?php echo $this->config->get('RGen_prd4_btnicons'); ?>;
	background-color: <?php echo $this->config->get('RGen_prd4_btnbg'); ?>;
	border-color: <?php echo $this->config->get('RGen_prd4_btnbdr'); ?>;
}
.prd-block3 .buy-options a:hover {
	color: #<?php echo $this->config->get('RGen_prd4_btnicons_hover'); ?>;
	background-color: <?php echo $this->config->get('RGen_prd4_btnbg_hover'); ?>;
	border-color: <?php echo $this->config->get('RGen_prd4_btnbg_hover'); ?>;
}
.prd-block3 .buy-options .addtocart {
	color: #<?php echo $this->config->get('RGen_prd4_carttxt'); ?>;
}
.prd-block3 .buy-options .addtocart:hover {
	color: #<?php echo $this->config->get('RGen_prd4_carttxt_hover'); ?>;
	background-color: <?php echo $this->config->get('RGen_prd4_cartbg_hover'); ?>;
	border-color: <?php echo $this->config->get('RGen_prd4_cartbg_hover'); ?>;
}

<?php
/* MAIN BANNER FEATURE PRODUCT */
if($this->config->get('RGen_featuredTitleBg') != '' || $this->config->get('RGen_featuredTitleFont') != ''){ 
?>.store-home #slidshow-box .box-heading { <?php 
if($this->config->get('RGen_featuredTitleBg') != ''){ 
	?>background-color:<?php echo $this->config->get('RGen_featuredTitleBg'); ?>;<?php 
} 
if($this->config->get('RGen_featuredTitleFont') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_featuredTitleFont'); ?>;<?php 
} ?> }<?php
}

if($this->config->get('RGen_featuredArrow') != '' || $this->config->get('RGen_featuredArrowIcon') != ''){ 
?>.store-home #slidshow-box .next, 
.store-home #slidshow-box .prev { <?php
if($this->config->get('RGen_featuredArrow') != ''){ 
	?>background-color:<?php echo $this->config->get('RGen_featuredArrow'); ?>;<?php
}
if($this->config->get('RGen_featuredArrowIcon') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_featuredArrowIcon'); ?>;<?php
} ?> }<?php
}

if($this->config->get('RGen_featuredArrow_hover') != '' || $this->config->get('RGen_featuredArrowIcon_hover') != ''){ 
?>.store-home #slidshow-box .next:hover, 
.store-home #slidshow-box .prev:hover {	<?php
if($this->config->get('RGen_featuredArrow') != ''){ 
	?>background-color:<?php echo $this->config->get('RGen_featuredArrow_hover'); ?>;<?php
}
if($this->config->get('RGen_featuredArrowIcon_hover') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_featuredArrowIcon_hover'); ?>;<?php
} ?> }<?php
}

if($this->config->get('RGen_featuredBg') != ''){
?>.store-home #slidshow-box .prd-block {
	background-color:<?php echo $this->config->get('RGen_featuredBg'); ?>; }<?php 
}

if($this->config->get('RGen_featuredHover_Bg') != ''){ 
?>.store-home #slidshow-box .prd-block .info {
	background-color:<?php echo $this->config->get('RGen_featuredHover_Bg'); ?>; }<?php 
}

if($this->config->get('RGen_featuredPrdLines') != ''){
?>#slidshow-box .prd-block .info-wrp ul li,
#slidshow-box .prd-block .info {
	border-color:<?php echo $this->config->get('RGen_featuredPrdLines'); ?>; }<?php 
} 
if($this->config->get('RGen_featuredPrdText') != ''){
?>.store-home #slidshow-box .prd-block a.name,
.store-home #slidshow-box .prd-block .info-wrp ul li a {
	color:#<?php echo $this->config->get('RGen_featuredPrdText'); ?>; }<?php 
} 

if($this->config->get('RGen_featuredPriceBg') != ''){
?>.store-home #slidshow-box .price {
	background-color:#<?php echo $this->config->get('RGen_featuredPriceBg'); ?>; }<?php 
} 

if($this->config->get('RGen_featuredPrice') != ''){
?>.store-home #slidshow-box .price-new {
	color: #<?php echo $this->config->get('RGen_featuredPrice'); ?>; }<?php 
}

if($this->config->get('RGen_featuredPriceOld') != ''){
?>.store-home #slidshow-box .price-old {
	color: #<?php echo $this->config->get('RGen_featuredPriceOld'); ?>; }<?php 
} 

if($this->config->get('RGen_featuredCrtBt') != '' || $this->config->get('RGen_featuredCrtBtRing') != ''){
?>.store-home #slidshow-box .prd-block .cart-bt { <?php
if($this->config->get('RGen_featuredCrtBt') != ''){
	?>background-color:#<?php echo $this->config->get('RGen_featuredCrtBt'); ?>;<?php 
}
if($this->config->get('RGen_featuredCrtBtRing') != ''){
	?>box-shadow: 0px 0px 0px 6px <?php echo $this->config->get('RGen_featuredCrtBtRing'); ?>;<?php
} 
if($this->config->get('RGen_featuredCrtBtIcon') != ''){
	?>color:#<?php echo $this->config->get('RGen_featuredCrtBtIcon'); ?>;<?php
}
?> }<?php
}

if($this->config->get('RGen_featuredCrtBt_hover') != '' || $this->config->get('RGen_featuredCrtBtRing_hover') != ''){ 
?>.store-home #slidshow-box .prd-block .cart-bt:hover {	<?php 
if($this->config->get('RGen_featuredCrtBt_hover') != ''){ 
	?>background-color:#<?php echo $this->config->get('RGen_featuredCrtBt_hover'); ?>;<?php 
}
if($this->config->get('RGen_featuredCrtBtRing_hover') != ''){
	?>box-shadow: 0px 0px 0px 6px <?php $this->config->get('RGen_featuredCrtBtRing_hover'); ?>;<?php
} 
if($this->config->get('RGen_featuredCrtBtIcon_hover') != ''){
	?>color:#<?php echo $this->config->get('RGen_featuredCrtBtIcon_hover'); ?>;<?php
}
?> }<?php
}

if($this->config->get('RGen_Slideshow_pager') != ''){
?>.store-home .slideshow .nivo-controlNav a {
	background-color:<?php echo $this->config->get('RGen_Slideshow_pager'); ?>; }<?php
}
if($this->config->get('RGen_Slideshow_pagerActive') != ''){
?>.store-home .slideshow .nivo-controlNav a.active {
	background-color:<?php echo $this->config->get('RGen_Slideshow_pagerActive'); ?>; }<?php
}
/* PRODUCT PAGE */ 
if($this->config->get('RGen_prdImageBg') != ''){
?>.image-additional li, .product-info .image {
	background:<?php echo $this->config->get('RGen_prdImageBg'); ?>;
}<?php
}
if($this->config->get('RGen_prdImageActive') != ''){
?>.th-l .image-additional .active a, .image-additional .active a { 
	border-color:<?php echo $this->config->get('RGen_prdImageActive'); ?>;
	color:<?php echo $this->config->get('RGen_prdImageActive'); ?>; }<?php
}
if($this->config->get('RGen_prdZoomText') != ''){
?>.product-info .image .zoom-text {
	color:#<?php echo $this->config->get('RGen_prdZoomText'); ?>; }<?php
}
if($this->config->get('RGen_prdZoomIcon') != ''){
?>.product-info .image .zoom-text b {
	color:#<?php echo $this->config->get('RGen_prdZoomIcon'); ?>;	
}<?php
}

if($this->config->get('RGen_prdDiscount_border') != ''){
?>.product-info .r .discount, .prd-layout1 .discount, .product-info .r .discount li, .prd-layout1 .discount li {
	border-color:<?php echo $this->config->get('RGen_prdDiscount_border'); ?>;
}<?php
}

if($this->config->get('RGen_prdPriceBg') != '' || $this->config->get('RGen_prdPriceRing') != ''){
?>.product-info .price { <?php
if($this->config->get('RGen_prdPriceBg') != ''){
	?>background-color:<?php echo $this->config->get('RGen_prdPriceBg'); ?>;<?php
}
if($this->config->get('RGen_prdPriceRing') != ''){
	?>box-shadow: 0px 0px 0px 10px <?php echo $this->config->get('RGen_prdPriceRing'); ?>;<?php
}?> }<?php
}
if($this->config->get('RGen_prdPriceOld') != ''){
?>.product-info .price-old {
	color:#<?php echo $this->config->get('RGen_prdPriceOld'); ?>;	
}<?php
}
if($this->config->get('RGen_prdPriceNew') != ''){
?>.product-info .price-new {
	color:#<?php echo $this->config->get('RGen_prdPriceNew'); ?>;
}<?php
}
if($this->config->get('RGen_prdPriceTax') != ''){
?>.product-info .price-tax {
	color:#<?php echo $this->config->get('RGen_prdPriceTax'); ?>;
}<?php
}
if($this->config->get('RGen_prdOtherText') != ''){
?>.product-info .r .minimum, .product-info .r .reward, .prd-layout1 .reward {
	color:#<?php echo $this->config->get('RGen_prdOtherText'); ?>;
}<?php
}

if($this->config->get('RGen_prdQty') != '' || $this->config->get('RGen_prdQtyBorder') != '' || $this->config->get('RGen_prdQtyText') != ''){
?>.product-info .qty .qty-input { <?php
if($this->config->get('RGen_prdQty') != ''){
	?>background:<?php echo $this->config->get('RGen_prdQty'); ?>;<?php
}
if($this->config->get('RGen_prdQtyBorder') != ''){
	?>border-color:<?php echo $this->config->get('RGen_prdQtyBorder'); ?>;<?php
}
if($this->config->get('RGen_prdQtyText') != ''){
	?>color:#<?php echo $this->config->get('RGen_prdQtyText'); ?>;<?php
} ?> }<?php
}

if($this->config->get('RGen_prdCartIcon') != '' || $this->config->get('RGen_prdCartBt') != '' || $this->config->get('RGen_prdCartRing') != ''){
?>.product-info .cart .cart-bt { <?php
if($this->config->get('RGen_prdCartIcon') != ''){
	?>color: #<?php echo $this->config->get('RGen_prdCartIcon'); ?>;<?php
}
if($this->config->get('RGen_prdCartBt') != ''){
	?>background-color: <?php echo $this->config->get('RGen_prdCartBt'); ?>;<?php
}
if($this->config->get('RGen_prdCartRing') != ''){
	?>box-shadow: 0px 0px 0px 6px <?php echo $this->config->get('RGen_prdCartRing'); ?>;<?php
} ?> }<?php
}

if($this->config->get('RGen_prdCartIcon_hover') != '' || $this->config->get('RGen_prdCartBt_hover') != '' || $this->config->get('RGen_prdCartRing_hover') != ''){
?>.product-info .cart .cart-bt:hover { <?php
if($this->config->get('RGen_prdCartIcon_hover') != ''){
	?>color: #<?php echo $this->config->get('RGen_prdCartIcon_hover'); ?>;<?php
}
if($this->config->get('RGen_prdCartBt_hover') != ''){
	?>background-color: <?php echo $this->config->get('RGen_prdCartBt_hover'); ?>;<?php
}
if($this->config->get('RGen_prdCartRing_hover') != ''){
	?>box-shadow: 0px 0px 0px 6px <?php echo $this->config->get('RGen_prdCartRing_hover'); ?>;<?php
} ?> }<?php
}
if($this->config->get('RGen_prdOptionLabel') != ''){
?>.product-info .option b { color:#<?php echo $this->config->get('RGen_prdOptionLabel'); ?>; }<?php
}

if($this->config->get('RGen_TabsBg') != ''){
?>.htabs a.selected, .tab-content {
	background-color:<?php echo $this->config->get('RGen_TabsBg'); ?>;
}<?php
}

if($this->config->get('RGen_TabsNormal') != '' || $this->config->get('RGen_TabText') != ''){
?>.htabs a { <?php
if($this->config->get('RGen_TabsNormal') != ''){
	?>background-color:<?php echo $this->config->get('RGen_TabsNormal'); ?>;<?php
}
if($this->config->get('RGen_TabText') != ''){
	?>color:#<?php echo $this->config->get('RGen_TabText'); ?>;<?php
} ?> }<?php
}
if($this->config->get('RGen_TabActiveText') != ''){
?>.htabs a.selected { color:#<?php echo $this->config->get('RGen_TabActiveText'); ?>; }<?php
}
if($this->config->get('RGen_TabContentText') != ''){
?>.tab-content { color:#<?php echo $this->config->get('RGen_TabContentText'); ?>; }<?php
}
if($this->config->get('RGen_WriteReview') != ''){
?>.read-review .wrt-off, .write-review {
	background:<?php echo $this->config->get('RGen_WriteReview'); ?>;
}<?php
}
if($this->config->get('RGen_WriteReview_label') != ''){
?>.write-review label { color:#<?php echo $this->config->get('RGen_WriteReview_label'); ?>; }<?php
}
if($this->config->get('RGen_WriteReview_Rating') != ''){
?>.write-review ol li {
	background-color:<?php echo $this->config->get('RGen_WriteReview_Rating'); ?>;
}<?php
}
if($this->config->get('RGen_WriteReview_RatingBdr') != ''){
?>.write-review ol li, .write-review ol {
	border-color:<?php echo $this->config->get('RGen_WriteReview_RatingBdr'); ?>;
}<?php
}

if($this->config->get('RGen_WriteReviewRating_bg') != '' || $this->config->get('RGen_WriteReviewRating_Text') != ''){
?>.write-review .bad, .write-review .good { <?php
if($this->config->get('RGen_WriteReviewRating_bg') != ''){
	?>background-color:#<?php echo $this->config->get('RGen_WriteReviewRating_bg'); ?>;<?php
}
if($this->config->get('RGen_WriteReviewRating_Text') != ''){
	?>color:#<?php echo $this->config->get('RGen_WriteReviewRating_Text'); ?>;<?php
} ?> }<?php
} 

/* CUSTOM BLOCK TOP HEADER */
if($this->config->get('RGen_custTP_bg') != '' || $this->config->get('RGen_custTP_arrowBg') != ''){
?>.tp-wrp {
	background-color: <?php echo $this->config->get('RGen_custTP_bg'); ?>; 
	border-color: <?php echo $this->config->get('RGen_custTP_arrowBg'); ?>; }<?php
}
if($this->config->get('RGen_custTP_content') != ''){
?>.tp-wrp .wrapper {
	color: #<?php echo $this->config->get('RGen_custTP_content'); ?>; }<?php
}
if($this->config->get('RGen_custTP_border') != '' || $this->config->get('RGen_custTP_hd') != ''){
?>.tp-wrp .header-2 {
	border-color: <?php echo $this->config->get('RGen_custTP_border'); ?>;
	color: #<?php echo $this->config->get('RGen_custTP_hd'); ?>; }<?php 
}
if($this->config->get('RGen_custTP_arrowBg') != ''){
?>.tp-wrp .hdl {
	background: <?php echo $this->config->get('RGen_custTP_arrowBg'); ?>;
	border-color: <?php echo $this->config->get('RGen_custTP_arrowBg'); ?>; }<?php
}
if($this->config->get('RGen_custTP_arrow') != ''){
?>.tp-wrp .hdl:before {
	color: <?php echo $this->config->get('RGen_custTP_arrow'); ?>; }<?php
}
/* CUSTOM BLOCK FOOTER */
if($this->config->get('RGen_custFT_bg') != '' || $this->config->get('RGen_custFT_arrowBg') != ''){
?>.ft-wrp {
	background-color: <?php echo $this->config->get('RGen_custFT_bg'); ?>; 
	border-color: <?php echo $this->config->get('RGen_custFT_arrowBg'); ?>; }<?php
}
if($this->config->get('RGen_custFT_content') != ''){
?>.ft-wrp .wrapper {
	color: #<?php echo $this->config->get('RGen_custFT_content'); ?>; }<?php
}
if($this->config->get('RGen_custFT_border') != '' || $this->config->get('RGen_custFT_hd') != ''){
?>.ft-wrp .header-2 {
	border-color: <?php echo $this->config->get('RGen_custFT_border'); ?>;
	color: #<?php echo $this->config->get('RGen_custFT_hd'); ?>; }<?php 
}
if($this->config->get('RGen_custFT_arrowBg') != ''){
?>.ft-wrp .hdl {
	background: <?php echo $this->config->get('RGen_custFT_arrowBg'); ?>;
	border-color: <?php echo $this->config->get('RGen_custFT_arrowBg'); ?>; }<?php
}
if($this->config->get('RGen_custFT_arrow') != ''){
?>.ft-wrp .hdl:before {
	color: <?php echo $this->config->get('RGen_custFT_arrow'); ?>; }<?php
}






/* FOOTER */
if($this->config->get('RGen_FooterWrpBg') != ''){
?>.footer-wrapper { background:<?php echo $this->config->get('RGen_FooterWrpBg'); ?>; }<?php
}
if($this->config->get('RGen_FooterText') != ''){
?>.footer-wrapper {color:#<?php echo $this->config->get('RGen_FooterText'); ?>; }<?php
}
if($this->config->get('RGen_FooterLines') != ''){
?>#twitter ul li, .custom-footer .column, #footer h3 {
	border-color:<?php echo $this->config->get('RGen_FooterLines'); ?>; }<?php
}
if($this->config->get('RGen_FooterHeader') != ''){
?>.custom-footer .header-2, #footer h3 {
	color:#<?php echo $this->config->get('RGen_FooterHeader'); ?>; }<?php
}
if($this->config->get('RGen_FooterLinks') != ''){
?>.custom-footer a, #footer .column a, #twitter ul li > a {
	color:#<?php echo $this->config->get('RGen_FooterLinks'); ?>; }<?php
}
if($this->config->get('RGen_FooterLinks_hover') != ''){
?>.custom-footer a:hover, #footer .column a:hover, #twitter ul li > a:hover {
	color:#<?php echo $this->config->get('RGen_FooterLinks_hover'); ?>; }<?php
}

if($this->config->get('RGen_twitterIcon_color') != ''){
?>#twitter ul li:before {
	color:#<?php echo $this->config->get('RGen_twitterIcon_color'); ?>; }<?php
}

if($this->config->get('RGen_contactText') != ''){
?>#footer .contact-info li span {
	color:#<?php echo $this->config->get('RGen_contactText'); ?>; }<?php
}
if($this->config->get('RGen_contactIcons') != '' || $this->config->get('RGen_contactIcon_color') != ''){ ?>
#footer .contact-info .ph-image,
#footer .contact-info .fax-image,
#footer .contact-info .email-image { <?php
if($this->config->get('RGen_contactIcons') != ''){ 	
	?>background-color:<?php echo $this->config->get('RGen_contactIcons'); ?>;<?php
}
if($this->config->get('RGen_contactIcon_color') != ''){ 	
	?>color:#<?php echo $this->config->get('RGen_contactIcon_color'); ?>;<?php
}
?> }<?php 
}

if($this->config->get('RGen_FooterBg') != '' || $this->config->get('RGen_FooterSocial_bdr') != ''){ 
?>.footer-bt { <?php
if($this->config->get('RGen_FooterBg') != ''){ 
	?>background-color:<?php echo $this->config->get('RGen_FooterBg'); ?>;<?php
}
if($this->config->get('RGen_FooterSocial_bdr') != ''){ 
	?>border-color:<?php echo $this->config->get('RGen_FooterSocial_bdr'); ?>;<?php
}
?> }<?php 
}

if($this->config->get('RGen_FooterSocial') != '' || $this->config->get('RGen_FooterSocialRing') != '' || $this->config->get('RGen_FooterSocialIcon') != ''){ 
?>.social-wrp a { <?php 
if($this->config->get('RGen_FooterSocial') != ''){ 
	?>background-color:#<?php echo $this->config->get('RGen_FooterSocial'); ?>;<?php 
} 
if($this->config->get('RGen_FooterSocialRing') != ''){ 
	?>box-shadow: 0px 0px 0px 6px <?php echo $this->config->get('RGen_FooterSocialRing'); ?>;<?php 
}
if($this->config->get('RGen_FooterSocialIcon') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_FooterSocialIcon'); ?>;<?php
} ?> }<?php
}

if($this->config->get('RGen_FooterSocial_hover') != '' || $this->config->get('RGen_FooterSocialRing_hover') != '' || $this->config->get('RGen_FooterSocialIcon_hover') != ''){ 
?>.social-wrp a:hover { <?php 
if($this->config->get('RGen_FooterSocial_hover') != ''){ 
	?>background-color:#<?php echo $this->config->get('RGen_FooterSocial_hover'); ?>; <?php 
}
if($this->config->get('RGen_FooterSocialRing_hover') != ''){
	?>box-shadow: 0px 0px 0px 6px <?php echo $this->config->get('RGen_FooterSocialRing_hover'); ?>;<?php
}
if($this->config->get('RGen_FooterSocialIcon_hover') != ''){ 
	?>color:#<?php echo $this->config->get('RGen_FooterSocialIcon_hover'); ?>;<?php
} 
?> }<?php
}

if($this->config->get('RGen_scrollTop') != '' || $this->config->get('RGen_scrollTop_arrow') != ''){
?>.scroll-top { <?php
if($this->config->get('RGen_scrollTop') != ''){
	?>background-color: <?php echo $this->config->get('RGen_scrollTop'); ?>;<?php
}
if($this->config->get('RGen_scrollTop_arrow') != ''){ 
	?>color: #<?php echo $this->config->get('RGen_scrollTop_arrow'); ?>;<?php
} 
?> }<?php
}
if($this->config->get('RGen_mobPrd') != ''){ 
	$RGen_mobPrd_val = $this->config->get('RGen_mobPrd');
	$RGen_mobPrd = explode('|', isset($RGen_mobPrd_val) ? $RGen_mobPrd_val : null);
	/*RGen_m_bg, RGen_m_name, RGen_m_price, RGen_m_priceOld, RGen_m_description, RGen_m_addcartBg, RGen_m_addcartTxt, RGen_m_iconColor, RGen_m_iconBdr, RGen_m_iconBg*/
?>
.m-prd { background: <?php echo $RGen_mobPrd[0]; ?>; }
.m-prd .info .name { color: <?php echo '#'.$RGen_mobPrd[1]; ?>; }
.m-prd .info .price-wrp { color: <?php echo '#'.$RGen_mobPrd[2]; ?>; }
.m-prd .info .price-wrp .price-tax, 
.m-prd .info .price-wrp .price-old { color: <?php echo '#'.$RGen_mobPrd[3]; ?>; }
.m-prd .info .description { color: <?php echo '#'.$RGen_mobPrd[4]; ?>; }
.m-prd ul li .addcart-bt { background-color: <?php echo $RGen_mobPrd[5]; ?>; color: <?php echo $RGen_mobPrd[6]; ?>; }
.m-prd ul li:last-child a { 
	color: <?php echo $RGen_mobPrd[7]; ?>;
	border-color: <?php echo $RGen_mobPrd[8]; ?>; 
	background-color: <?php echo $RGen_mobPrd[9]; ?>; 
}
<?php } ?>

</style>