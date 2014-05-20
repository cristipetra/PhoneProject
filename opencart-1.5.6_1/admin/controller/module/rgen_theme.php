<?php
class ControllerModuleRgenTheme extends Controller {
	private $error = array(); 
	/********************************************
	CREATE TABLE FOR RGEN DB */
	public function install() {
		$this->load->model('rgen/rgentheme');
		$this->model_rgen_rgentheme->install();
	}
	/*********************************************/
	public function index() {
		$this->install();
		// Theme version
		/*$rgen_ver = "v3.03";
		$this->data['version'] = $this->config->get('rgen_theme_version');
		if(isset($this->data['version']) && $this->data['version'] == "") {
			$this->db->query("UPDATE  `" . DB_PREFIX . "setting` SET  `value` =  '" . $rgen_ver . "' WHERE  `key` =  'rgen_theme_version'");
		} else {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "setting`(`group`, `key`, `value`) VALUES ('rgen_theme','rgen_theme_version','" . $rgen_ver . "')");
		}*/
		$this->data['version'] = $this->config->get('rgen_theme_version') ? $this->config->get('rgen_theme_version') : 'RGEN THEME';
		
		$this->language->load('module/rgen_theme');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
		$this->load->model('tool/image');
		
		// COLOUR PICKER FILES
		$this->document->addStyle('view/stylesheet/jquery.colorpicker.css');
		$this->document->addScript('view/javascript/jquery/jquery.colorpicker.js');
		
		$this->data['mod'] = $this->language->get('mod');
		$this->data['ver'] = $this->language->get('ver');
		
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_content_top'] = $this->language->get('text_content_top');
		$this->data['text_content_bottom'] = $this->language->get('text_content_bottom');		
		$this->data['text_column_left'] = $this->language->get('text_column_left');
		$this->data['text_column_right'] = $this->language->get('text_column_right');
		
		$this->data['entry_description'] = $this->language->get('entry_description');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_module'] = $this->language->get('button_add_module');
		$this->data['button_remove'] = $this->language->get('button_remove');
		
		$this->data['tab_module'] = $this->language->get('tab_module');
		
		$this->data['token'] = $this->session->data['token'];
		
		// BODY BACKGROUND IMAGE
		$BodyBgImg = 'RGen_bodyBgImg';
		if (isset($this->request->post[$BodyBgImg])) {
			$this->data[$BodyBgImg] = $this->request->post[$BodyBgImg];
			$RGen_bodyBgImg = $this->request->post[$BodyBgImg];
		} else {
			$this->data[$BodyBgImg] = '';
		}
		
		// HEADER BACKGROUND IMAGE
		$HeaderBgImg = 'RGen_headerBgImg';
		if (isset($this->request->post[$HeaderBgImg])) {
			$this->data[$HeaderBgImg] = $this->request->post[$HeaderBgImg];
			$RGen_headerBgImg = $this->request->post[$HeaderBgImg];
		} else {
			$this->data[$HeaderBgImg] = '';
		}

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->data['getThemeName'] = $this->request->post['RGen_themeSettings'];
			$this->model_setting_setting->editSetting('rgen_theme', $this->request->post);
			//$this->session->data['success'] = $this->language->get('text_success');
			$this->redirect($this->url->link('module/rgen_theme', 'token=' . $this->session->data['token'], 'SSL'));
			$this->savetheme();
			//echo "<pre style='color:;'>" . print_r($this->request->server['REQUEST_METHOD'] == 'GET', TRUE) . "</pre>";
		}
		
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);
		
		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/rgen_theme', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);
		
		$this->data['action'] = $this->url->link('module/rgen_theme', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		
		// CUSTOM FOOTER ARRAY
		$RGen_FT_data = array(
		
			// GENERAL SETTINGS
			'RGen_reaponsive_status',
			'RGen_wide_layout',
			'RGen_wide_screensize',
			'RGen_prdList_defaultView',
			'RGen_refineCate_View',
			'RGen_catinfo_status',
			'RGen_refineCate_layout',
			'RGen_carouselArrow',
			'RGen_modprdView',
			'RGen_imgType',
			'RGen_colprdView_special',
			'RGen_colprdView_latest',
			'RGen_colprdView_featured',
			'RGen_colprdView_best',
			'RGen_prdBlock_view',
			'RGen_modPrdBlock_special',
			'RGen_modPrdBlock_latest',
			'RGen_modPrdBlock_featured',
			'RGen_modPrdBlock_best',
			'RGen_layout',
			'RGen_menulayout',
			'RGen_scrollTop_status',
			'RGen_menuhome',
			'RGen_header_design',
			'RGen_optimizemob',
			'RGen_header_links',
			'RGen_menusticky',
			'RGen_cssCompress',
			'RGen_jsCompress',

			// CUSTOM FONT SETTINGS
			'RGen_fontSettings_status',
			'RGen_Body_font',
			'RGen_Body_font_size',
			'RGen_Body_font_weight',
			'RGen_PageTitle_font',
			'RGen_PageTitle_font_size',
			'RGen_PageTitle_font_weight',
			'RGen_PageTitle_transform',
			'RGen_otherHeading_font',
			'RGen_otherHeading_font_weight',
			'RGen_otherHeading_transform',
			'RGen_Navigation_font',
			'RGen_Navigation_font_size',
			'RGen_Navigation_font_weight',
			'RGen_Navigation_transform',
			'RGen_Price_font_weight',
			'RGen_Price_font',
			'RGen_Button_font',
			'RGen_Button_font_weight',
			'RGen_Button_font_transform',
			'RGen_other_font',
			'RGen_other_font_weight',
			'RGen_other_font_transform',

			'RGen_capHeading_font',
			'RGen_capHeading_font_size',
			'RGen_capHeading_font_weight',
			'RGen_capHeading_font_transform',

			'RGen_capLink_font',
			'RGen_capLink_font_size',
			'RGen_capLink_font_weight',
			'RGen_capLink_font_transform',

			'RGen_capContent_font',
			'RGen_capContent_font_size',
			'RGen_capContent_font_weight',
			'RGen_capContent_font_transform',

			// MOBILE PRODUCT VIEW
			/*RGen_m_bg, RGen_m_name, RGen_m_price, RGen_m_priceOld, RGen_m_description, RGen_m_addcartBg, RGen_m_addcartTxt, RGen_m_iconColor, RGen_m_iconBdr, RGen_m_iconBg*/
			'RGen_mobPrd', 
			
			// PRDOUCT PAGE SETTINGS
			'RGen_productZoom',
			'RGen_reviewTab',
			'RGen_thumbOptions',
			'RGen_productLayout',
			
			
			// MENU SETTINGS
			'RGen_menu_AllCategory',
			'RGen_customMenu_status',
			'RGen_menu1_item',	'RGen_menu1_item_url',
				'RGen_subMenu1_item1',	'RGen_subMenu1_item2',	'RGen_subMenu1_item3',
				'RGen_subMenu1_item4',	'RGen_subMenu1_item5',	'RGen_subMenu1_item6',
				'RGen_subMenu1_item7',	'RGen_subMenu1_item8',	'RGen_subMenu1_item9',
				'RGen_subMenu1_item10',	
				
				'RGen_subMenu1_item_url1',	'RGen_subMenu1_item_url2',	'RGen_subMenu1_item_url3',
				'RGen_subMenu1_item_url4',	'RGen_subMenu1_item_url5',	'RGen_subMenu1_item_url6',
				'RGen_subMenu1_item_url7',	'RGen_subMenu1_item_url8',	'RGen_subMenu1_item_url9',
				'RGen_subMenu1_item_url10',
				
			'RGen_menu_item_status',
				'RGen_menu_item1',	'RGen_menu_item2',	'RGen_menu_item3',
				'RGen_menu_item4',	'RGen_menu_item5',
				'RGen_menu_item1_url',	'RGen_menu_item2_url',	'RGen_menu_item3_url',
				'RGen_menu_item4_url',	'RGen_menu_item5_url',
				
			'RGen_informationMenu_status',
			'RGen_multiLevelMenu_status',
			'RGen_MenuItemSpace',
			'RGen_menuhtml_status',
			'RGen_myac_status',

			'RGen_occat_status',
			'RGen_allcat_status',
			'RGen_allcat_name',
			'RGen_allcat_style',
			'RGen_allcat_menu',
			'RGen_allcat_maxsub',
			'RGen_allcat_column',
			'RGen_brand_status',
			'RGen_brand_name',
			'RGen_brand_col',
			'RGen_prdmenu_status',
			'RGen_prdmenu_name',
			'RGen_prdmenu_col',

			'RGen_megaMenu_colors',

			
			// LOGO SETTINGS 
			'RGen_logoPosition_status',
			'RGen_logoAlign',
			'RGen_logoLeft',
			'RGen_logoTop',
			'RGen_logoBG_color',
			'RGen_logoSpaceAround_LR',
			'RGen_logoSpaceAround_TB',
			
			'RGen_FT_Status',
			'RGen_FT_Status_home',
			
			'RGen_FT_about_Status',
			'FT_about_Title',
			'FT_about_Text',
			
			'RGen_FT_twitter_Status',
			'FT_twitter_Title',
			'FT_twitter_Tweets',
			'FT_twitter_User',
			'FT_twitter_widgetid',
			'FT_twitter_theme',
			'FT_twitter_linkcolor',
						
			'RGen_FT_fb_Status',
			'FT_fb_Title',
			'FT_fb_ID',
			'FT_fb_code',
			'htmlData_FT_fb_code',
			
			// FOOTER SOCIAL LINKS
			'socialLink_fb_Status',
			'socialLink_fb',
			'socialLink_twitter_Status',
			'socialLink_twitter',
			'socialLink_youtube_Status',
			'socialLink_youtube',
			'socialLink_google_Status',
			'socialLink_google',
			'socialLink_flickr_Status',
			'socialLink_flickr',
			'socialLink_pintrest_Status',
			'socialLink_pintrest',
			'socialLink_rss_Status',
			'socialLink_rss',
			'socialLink_yahoo_Status',
			'socialLink_yahoo',
			'socialLink_thumblr_Status',
			'socialLink_thumblr',
			'socialLink_insta_Status',
			'socialLink_insta',
			'socialLink_linkedin_Status',
			'socialLink_linkedin',
			'socialLink_vimeo_Status',
			'socialLink_vimeo',
			'socialLink_mailTo_Status',
			'socialLink_mailTo',
			'socialLink_addThis_Status',
			'socialLink_addThis',
			
			'copyrightText',
			
			// FOOTER CONTACT US
			'FT_Contact_status',
			'FT_Contact_phStatus',
			'FT_Contact_ph',
			'FT_Contact_ph1',
			'FT_Contact_faxStatus',
			'FT_Contact_fax',
			'FT_Contact_fax1',
			'FT_Contact_emailStatus',
			'FT_Contact_email',
			
			// READY TO USE THEME
			'RGen_theme',
			'RGen_theme_option',
			'RGen_theme_optionStatus',
			
			// GENERAL THEME COLORS
			'RGen_Icons',
			'RGen_bodyBg',
			'RGen_bodyBgImg',
			'RGen_bodyBgImg_preview',
			'RGen_bodyBgImgRepeat',
			'RGen_bodyBgImgPosition',
			'RGen_globalLines',
			'RGen_globalColour',
			'RGen_globalColourRing',
			'RGen_pageBg',
			'RGen_pageShadow',
			'RGen_ImageBox',
			'RGen_fontColor',
			'RGen_bodyBgAttachment',
			'RGen_scrollTop',
			'RGen_scrollTop_arrow',

			// CUSTOM BLOCK TOP HEADER
			'RGen_custTP_bg',
			'RGen_custTP_hd',
			'RGen_custTP_border',
			'RGen_custTP_content',
			'RGen_custTP_arrowBg',
			'RGen_custTP_arrow',

			// CUSTOM BLOCK FOOTER
			'RGen_custFT_bg',
			'RGen_custFT_hd',
			'RGen_custFT_border',
			'RGen_custFT_content',
			'RGen_custFT_arrowBg',
			'RGen_custFT_arrow',
			
			// BUTTONS AND FORMS
			'RGen_btColor',
			'RGen_btColor_hover',
			'RGen_btFontColor',
			'RGen_btFontColor_hover',
			'RGen_btColor1',
			'RGen_btColor1_hover',
			'RGen_btFontColor1',
			'RGen_btFontColor1_hover',
			'RGen_LinkColor',
			'RGen_LinkColor_hover',
			'RGen_LinkBtColor',
			'RGen_LinkBtFontColor',
			'RGen_LinkBtColor_hover',
			'RGen_LinkBtFontColor_hover',
			'RGen_TextBox',
			'RGen_TextBoxBorder',
			'RGen_TextBoxText',
			'RGen_FormLabel',
			'RGen_FormBorders',
			'RGen_FormHeaders',
			
			'RGen_arrow',
			'RGen_arrow_hover',
			'RGen_arrowBg',
			'RGen_arrowBg_hover',
			'RGen_arrowBgRing',
			'RGen_arrowBgRing_hover',
			
			'RGen_Header',
			
			'RGen_tableListHeader',
			'RGen_tableListHeaderFont',
			'RGen_tableListFont',
			'RGen_tableListBorder_right',
			'RGen_tableListBorder_bottom',

			// SLIDESHOW
			'RGen_ssBg',
			'RGen_c1_hdBg',
			'RGen_c1_hdText',
			'RGen_c1_dataBg',
			'RGen_c1_dataText',
			'RGen_c1_linkBg',
			'RGen_c1_linkBg',
			'RGen_c1_linkText',

			'RGen_c2_hdText',
			'RGen_c2_hdTextshd',
			'RGen_c2_dataText',
			'RGen_c2_dataTextshd',
			'RGen_c2_dataBdr',
			'RGen_c2_linkBg',
			'RGen_c2_linkText',
			'RGen_c2_linkBdr',
			'RGen_c2_linkBg_hover',
			'RGen_c2_linkText_hover',
			'RGen_c2_linkBdr_hover',

			'RGen_c3_Bg',
			'RGen_c3_hdText',
			'RGen_c3_dataText',
			'RGen_c3_dataBdr',
			'RGen_c3_linkBg',
			'RGen_c3_linkText',
			'RGen_c3_linkBg_hover',
			'RGen_c3_linkText_hover',
			'RGen_c3_linkBdr_hover',

			'RGen_c4_hdBg',
			'RGen_c4_hdText',
			'RGen_c4_dataText',
			'RGen_c4_linkBg',
			'RGen_c4_linkText',
			'RGen_c4_link_hover',

			'RGen_c5_Bg',
			'RGen_c5_hdText',
			'RGen_c5_dataText',
			'RGen_c5_dataBdr',
			'RGen_c5_linkBg',
			'RGen_c5_linkText',
			'RGen_c5_linkBg_hover',
			'RGen_c5_linkText_hover',
			'RGen_c5_linkBdr_hover',

			'RGen_c6_hdText',
			'RGen_c6_dataText',
			'RGen_c6_linkBg',
			'RGen_c6_linkText',
			'RGen_c6_linkBg_hover',
			'RGen_c6_link_hover',
			'RGen_c6_linkBdr_hover',
			
			// HEADER SECTION
			'RGen_headerBg',
			'RGen_headerBgImg',
			'RGen_headerBgImg_preview',
			'RGen_headerBgImgRepeat',
			'RGen_headerBgImgPosition',
			'RGen_Breadcrumb_Link',
			'RGen_Breadcrumb_Link_hover',
			'RGen_Breadcrumb_Arrow',
			'RGen_Logo',
			'RGen_Header_text',
			'RGen_Header_Link',
			'RGen_Header_Link_hover',
			
			// MENU 
			'RGen_Navbar',
			'RGen_NavMenubar',
			'RGen_Nav',
			'RGen_Nav_hover',
			'RGen_NavFont',
			'RGen_NavFont_hover',
			'RGen_NavSub_bg',
			'RGen_NavSub',
			'RGen_NavSub_hover',
			'RGen_NavSubFont',
			'RGen_NavSubFont_hover',
			'RGen_NavSubBorder',
			'RGen_homeBt',
			'RGen_homeBtRing',
			'RGen_homeBt_hover',
			'RGen_homeBtIcon',
			'RGen_homeBtIcon_hover',

			// MOB MENU COLORS
			'RGen_mob_Menubar',
			'RGen_mob_Menuicon',
			'RGen_mob_separator',
			'RGen_mob_menulink',
			'RGen_mob_menutext',
			'RGen_mob_menulink_hover',
			'RGen_mob_menutext_hover',
			'RGen_mob_submenu_separator',
			'RGen_mob_submenu',
			'RGen_mob_submenutext',
			'RGen_mob_submenu_hover',
			'RGen_mob_submenutext_hover',
			'RGen_mob_menuarrow_bg',
			'RGen_mob_menuarrow',
			
			// SEARCH
			'RGen_searchBtIcon',
			'RGen_searchBtIcon_hover',
			'RGen_searchBg',
			'RGen_searchOuterBg',
			'RGen_searchText',
			'RGen_searchBt',
			'RGen_searchBtRing',
			'RGen_searchBt_hover',
			'RGen_searchBtRing_hover',
			
			// CURRENCY AND LANGUAGE
			'RGen_CurLanBg',
			'RGen_CurLanDropdown',
			'RGen_CurLanDropdown_hover',
			'RGen_CurLanText',
			'RGen_CurLanText_hover',
			'RGen_CurLanArrow',
			'RGen_CurLanSelected',
			
			// HEADER MINI CART
			'RGen_MiniCart',
			'RGen_MiniCartText',
			'RGen_MiniCartIcon',
			'RGen_MiniCartContent',
			'RGen_MiniCartContent_border',
			'RGen_MiniCartContent_text',
			'RGen_MiniCartContent_image',
			'RGen_MiniCartContent_links',
			'RGen_MiniCartContent_total',
			'RGen_MiniCartContent_label',
			'RGen_MiniCartContent_value',

			// PRODUCT BOX 4 COLORS
			'RGen_prd4_bg',
			'RGen_prd4_bdr',
			'RGen_prd4_bdr_hover',
			'RGen_prd4_name',
			'RGen_prd4_price',
			'RGen_prd4_priceold',
			'RGen_prd4_btnbdr',
			'RGen_prd4_btnbg',
			'RGen_prd4_btnbg_hover',
			'RGen_prd4_btnicons',
			'RGen_prd4_btnicons_hover',
			'RGen_prd4_cartbg_hover',
			'RGen_prd4_carttxt',
			'RGen_prd4_carttxt_hover',

			// PRODUCT BOX 3 COLORS
			"RGen_prd3_bg",
			"RGen_prd3_bg_hover",
			"RGen_prd3_bdr_w",
			"RGen_prd3_bdr_w_hover",
			"RGen_prd3_bdr",
			"RGen_prd3_bdr_hover",
			"RGen_prd3_name",
			"RGen_prd3_name_hover",
			"RGen_prd3_priceOld",
			"RGen_prd3_priceNew",
			"RGen_prd3_cartText",
			"RGen_prd3_cartText_hover",
			"RGen_prd3_cartBg",
			"RGen_prd3_cartBg_hover",
			"RGen_prd3_prdbtIcon",
			"RGen_prd3_prdbtIcon_hover",
			"RGen_prd3_prdbtBdr",
			"RGen_prd3_prdbtBdr_hover",
			"RGen_prd3_prdbtBg",
			"RGen_prd3_prdbtBg_hover",
			"RGen_prd3_rating",

			// PRODUCT BOX 2 COLORS
			'RGen_prd2_image',
			'RGen_prd2_name',
			'RGen_prd2_priceOld',
			'RGen_prd2_priceNew',
			'RGen_prd2_priceTax',
			'RGen_prd2_link',
			'RGen_prd2_link_hover',
			'RGen_prd2_cartbt',
			'RGen_prd2_cartbt_bg',
			'RGen_prd2_cartbt_hover',
			'RGen_prd2_cartbt_bg_hover',
			'RGen_prd2_cartbt_bdr',
			'RGen_prd2_cartbt_bdr_hover',

			// PRODUCT BOX 1 COLORS
			'RGen_RefinCateHdBg',
			'RGen_RefinCateHdFontColor',
			'RGen_RefinCateBg',
			'RGen_RefinCateFontColour',
			'RGen_prdBack',
			'RGen_prdName',
			'RGen_prdLinks',
			'RGen_prdLinks_hover',
			'RGen_prdText',
			'RGen_prdHover_Bg',
			'RGen_PriceBg',
			'RGen_Price',
			'RGen_OldPrice',
			'RGen_PriceRing',
			'RGen_cartBt',
			'RGen_cartBtRing',
			'RGen_cartBt_hover',
			'RGen_cartBtRing_hover',
			'RGen_cartBtIcon',
			'RGen_cartBtIcon_hover',
			'RGen_prdBorder',
			
			'RGen_capStatus',
			'RGen_cap',

			// HOME PAGE MAIN BANNER FEATURE PRODUCT MODULE
			'RGen_bannerPosition',
			'RGen_SlideShow_Mod_status',
			'RGen_SlideShow_Mod',
			'RGen_SlideShow_Type',
			'RGen_featuredTitleBg',
			'RGen_featuredTitleFont',
			'RGen_featuredBg',
			'RGen_featuredHover_Bg',
			'RGen_featuredPrdText',
			'RGen_featuredArrow',
			'RGen_featuredArrow_hover',
			
			'RGen_featuredPrdLines',
			'RGen_featuredArrowIcon',
			'RGen_featuredArrowIcon_hover',
			'RGen_Slideshow_pager',
			'RGen_Slideshow_pagerActive',
			'RGen_featuredArrowIcon',
			
			'RGen_featuredPriceBg',
			'RGen_featuredPrice',
			'RGen_featuredPriceOld',
			'RGen_featuredCrtBtIcon',
			'RGen_featuredCrtBtIcon_hover',
			'RGen_featuredCrtBt',
			'RGen_featuredCrtBt_hover',
			'RGen_featuredCrtBtRing',
			'RGen_featuredCrtBtRing_hover',
			
			// PRODUCT PAGE
			'RGen_prdImageBg',
			'RGen_prdImageActive',
			'RGen_prdZoomText',
			'RGen_prdZoomIcon',
			'RGen_prdPriceBg',
			'RGen_prdPriceRing',
			'RGen_prdPriceOld',
			'RGen_prdPriceNew',
			'RGen_prdPriceTax',
			'RGen_prdDiscount_border',
			'RGen_prdOtherText',
			'RGen_prdQty',
			'RGen_prdQtyBorder',
			'RGen_prdQtyText',
			'RGen_prdCartBt',
			'RGen_prdCartBt_hover',
			'RGen_prdCartRing',
			'RGen_prdCartRing_hover',
			'RGen_prdCartIcon',
			'RGen_prdCartIcon_hover',
			'RGen_prdOptionLabel',
			'RGen_TabsBg',
			'RGen_TabsNormal',
			'RGen_TabText',
			'RGen_TabActiveText',
			'RGen_TabContentText',
			'RGen_WriteReview',
			'RGen_WriteReview_label',
			'RGen_WriteReview_Rating',
			'RGen_WriteReview_RatingBdr',
			'RGen_WriteReviewRating_bg',
			'RGen_WriteReviewRating_Text',
			
			// SLIDE SHOW SETTINGS
			'RGen_slideshow_Effect',
			'RGen_slideshow_animSpeed',
			'RGen_slideshow_pauseTime',
			'RGen_slideshow_startSlide',
			'RGen_slideshow_directionNav',
			'RGen_slideshow_controlNav',
			'RGen_slideshow_pauseOnHover',
			
			// FOOTER
			'RGen_FooterWrpBg',
			'RGen_FooterHeader',
			'RGen_FooterText',
			'RGen_FooterLinks',
			'RGen_FooterLinks_hover',
			'RGen_FooterBg',
			'RGen_FooterLines',
			'RGen_FooterSocial',
			'RGen_FooterSocialIcon',
			'RGen_FooterSocialIcon_hover',
			'RGen_FooterSocial_bdr',
			'RGen_FooterSocialRing',
			'RGen_FooterSocial_hover',
			'RGen_FooterSocialRing_hover',
			'RGen_contactIcons',
			'RGen_contactText',
			'RGen_contactIcon_color',
			'RGen_twitterIcon_color',
			'RGen_fbtheme',

			
			// CUSTOM CSS
			'RGen_CustomCSS_Status',
			'RGen_CustomJS_Status',
			'RGen_customFile_Status',
			'RGen_CustomCSS_file',
			'RGen_CustomCSS',
			'RGen_CustomJS'
			
			
		);

		foreach ($RGen_FT_data as $RGen_FT_val) {
			if (isset($this->request->post[$RGen_FT_val])) {
				$this->data[$RGen_FT_val] = $this->request->post[$RGen_FT_val];
			} else {
				$this->data[$RGen_FT_val] = $this->config->get($RGen_FT_val);
			}
		}
		
		$this->data['RGen'] = array();
		if (isset($this->request->post['RGen_module'])) {
			$this->data['RGen'] = $this->request->post['RGen_module'];
		} elseif ($this->config->get('RGen_module')) { 
			$this->data['RGen'] = $this->config->get('RGen_module');
		}
		
		$this->data['RGenData'] = array();
		if (isset($this->request->post['RGenData_mod'])) {
			$this->data['RGenData'] = $this->request->post['RGenData_mod'];
		} elseif ($this->config->get('RGenData_mod')) { 
			$this->data['RGenData'] = $this->config->get('RGenData_mod');
		}

		// Offer tag array
		$this->data['RGenTagData'] = array();
		if (isset($this->request->post['RGenTagData'])) {
			$this->data['RGenTagData'] = $this->request->post['RGenTagData'];
		} elseif ($this->config->get('RGenTagData')) { 
			$this->data['RGenTagData'] = $this->config->get('RGenTagData');
		}

		// Optimization settings
		$this->data['RGen_optimize'] = array();
		if (isset($this->request->post['RGen_optimize'])) {
			$this->data['RGen_optimize'] = $this->request->post['RGen_optimize'];
		} elseif ($this->config->get('RGen_optimize')) { 
			$this->data['RGen_optimize'] = $this->config->get('RGen_optimize');
		}

		$this->data['no_img'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);

		$this->data['checkPermission'] = $this->user->hasPermission('modify', 'module/rgen_theme');
			
		$this->data['text_image_manager'] = 'Image manager';
		
		$this->load->model('design/layout');
		
		$this->data['layouts'] = $this->model_design_layout->getLayouts();
		
		$getLayouts = $this->data['layouts'];
		
		$this->load->model('localisation/language');
		
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
		
		$this->template = 'module/rgen_theme.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		
		// BODY BG IMAGE PREVIEW
		$BodyBgImg_Preview = 'RGen_bodyBgImg_preview';
		if (isset($this->data[$BodyBgImg]) && $this->data[$BodyBgImg] != "" && file_exists(DIR_IMAGE . $this->data[$BodyBgImg])) {
			$this->data[$BodyBgImg_Preview] = $this->model_tool_image->resize($this->data[$BodyBgImg], 100, 100);
		} else {
			$this->data[$BodyBgImg_Preview] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		
		// HEADER IMAGE PREVIEW
		$HeaderBgImg_Preview = 'RGen_headerBgImg_preview';
		if (isset($this->data[$HeaderBgImg]) && $this->data[$HeaderBgImg] != "" && file_exists(DIR_IMAGE . $this->data[$HeaderBgImg])) {
			$this->data[$HeaderBgImg_Preview] = $this->model_tool_image->resize($this->data[$HeaderBgImg], 100, 100);
		} else {
			$this->data[$HeaderBgImg_Preview] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}

		// NO IMAGE
		$this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		//$this->savetheme();
		$this->loadtheme();
		$this->categoriesAuto();
		$this->manufacturerAuto();
		$this->productsAuto();

		$this->response->setOutput($this->render());
	}

	public function removeAll() {
		$this->load->library('rgen/rgen_lib');
		if (isset($this->request->get['name'])) {
			if ($this->request->get['name'] == 'css') {
				$this->rgen->clearCSS();
			}elseif ($this->request->get['name'] == 'js') {
				$this->rgen->clearJS();
			}else{
				$this->rgen->removeAll($this->config->get('config_template'), $this->request->get['name']);
				echo $this->rgen->removeAll($this->config->get('config_template'), $this->request->get['name']);
			}
		}

	}
	public function removeFile() {
		$this->load->library('rgen/rgen_lib');
		if (isset($this->request->get['name'])) {
			$this->rgen->removeFile($this->config->get('config_template'), $this->request->get['name']);
		}
	}
	

	// Updating image sizes
	public function verImageSizes(){
		$verImageSizes = array(
			'config_image_category_width' 	=> 100,
			'config_image_category_height' 	=> 134,

			'config_image_thumb_width'		=> 351,
			'config_image_thumb_height' 	=> 470,

			'config_image_popup_width'		=> 746,
			'config_image_popup_height' 	=> 1000,

			'config_image_product_width' 	=> 194,
			'config_image_product_height' 	=> 260,

			'config_image_additional_width' => 101,
			'config_image_additional_height'=> 136,

			'config_image_related_width' 	=> 194,
			'config_image_related_height' 	=> 260,

			'config_image_compare_width' 	=> 84,
			'config_image_compare_height' 	=> 113,

			'config_image_wishlist_width' 	=> 84,
			'config_image_wishlist_height' 	=> 113,

			'config_image_cart_width' 		=> 84,
			'config_image_cart_height' 		=> 113
		);
		$horImageSizes = array(
			'config_image_category_width' 	=> 100,
			'config_image_category_height' 	=> 77,

			'config_image_thumb_width'		=> 351,
			'config_image_thumb_height' 	=> 271,

			'config_image_popup_width'		=> 746,
			'config_image_popup_height' 	=> 577,

			'config_image_product_width' 	=> 194,
			'config_image_product_height' 	=> 150,

			'config_image_additional_width' => 101,
			'config_image_additional_height'=> 78,

			'config_image_related_width' 	=> 194,
			'config_image_related_height' 	=> 150,

			'config_image_compare_width' 	=> 84,
			'config_image_compare_height' 	=> 65,

			'config_image_wishlist_width' 	=> 84,
			'config_image_wishlist_height' 	=> 65,

			'config_image_cart_width' 		=> 84,
			'config_image_cart_height' 		=> 65
		);
		$squareImageSizes = array(
			'config_image_category_width' 	=> 100,
			'config_image_category_height' 	=> 100,

			'config_image_thumb_width'		=> 351,
			'config_image_thumb_height' 	=> 351,

			'config_image_popup_width'		=> 746,
			'config_image_popup_height' 	=> 746,

			'config_image_product_width' 	=> 194,
			'config_image_product_height' 	=> 194,

			'config_image_additional_width' => 101,
			'config_image_additional_height'=> 101,

			'config_image_related_width' 	=> 194,
			'config_image_related_height' 	=> 194,

			'config_image_compare_width' 	=> 84,
			'config_image_compare_height' 	=> 84,

			'config_image_wishlist_width' 	=> 84,
			'config_image_wishlist_height' 	=> 84,

			'config_image_cart_width' 		=> 84,
			'config_image_cart_height' 		=> 84
		);

		if (isset($this->request->get['imgType']) && $this->request->get['imgType'] == 'verimg') {
			$imgSizes = $verImageSizes;
		}elseif(isset($this->request->get['imgType']) && $this->request->get['imgType'] == 'horimg'){
			$imgSizes = $horImageSizes;
		}else{
			$imgSizes = $squareImageSizes;
		}
		foreach ($imgSizes as $sqlKey => $sqlValue) {
    		if ($sqlValue) {
      			$this->db->query("UPDATE  `" . DB_PREFIX . "setting` SET  `value` = '".$sqlValue."' WHERE  `key` =  '".$sqlKey."'");
    		}
  		}
	}


	public function installsample(){

		$datasource = $this->request->get['datasource'];

		if(is_dir(DIR_APPLICATION."model/rgen/sampledata/") == 1){
		
			$this->load->model('rgen/rgentheme');
			$this->load->model('rgen/rgencustom');
			$this->load->model('rgen/rgencustomprd');
			$this->load->model('rgen/rgenmegamenu');
			$this->load->model('rgen/rgenrevoslider');
			$this->model_rgen_rgentheme->install();
			$this->model_rgen_rgencustom->install();
			$this->model_rgen_rgencustom->installDataTable();
			$this->model_rgen_rgencustomprd->install();
			$this->model_rgen_rgenmegamenu->install();
			$this->model_rgen_rgenmegamenu->installDataTable();
			$this->model_rgen_rgenrevoslider->install();

			// Resetings rgen theme data
			$this->db->query("TRUNCATE TABLE `" . DB_PREFIX . "rgen_custom`;");
			$this->db->query("TRUNCATE TABLE `" . DB_PREFIX . "rgen_custom_description`;");
			$this->db->query("TRUNCATE TABLE `" . DB_PREFIX . "rgen_customprd`;");
			$this->db->query("TRUNCATE TABLE `" . DB_PREFIX . "rgen_megamenu`;");
			$this->db->query("TRUNCATE TABLE `" . DB_PREFIX . "rgen_megamenu_description`;");
			$this->db->query("TRUNCATE TABLE `" . DB_PREFIX . "rgen_revoslider`;");
			$this->db->query("TRUNCATE TABLE `" . DB_PREFIX . "rgen_theme`;");
			$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `group` = 'rgen_theme';");
	  		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `group` = 'rgen_custom';");
	  		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `group` = 'rgen_revoslider';");
	  		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `group` = 'rgen_customproducts';");
	  		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `group` = 'rgen_megamenu';");

	  		// Reseting opencart data
			if (is_file(DIR_APPLICATION."model/rgen/sampledata/reset_opencart.sql")) {
				$sql_data = file_get_contents(DIR_APPLICATION."model/rgen/sampledata/reset_opencart.sql");
				foreach (explode(";\n", $sql_data) as $sql) {
		    		$sql = trim($sql);
		    		$sql = str_ireplace("`oc_", "`".DB_PREFIX, $sql);
		    		if ($sql) {
		      			$this->db->query($sql);
		    		}
		  		}
			}

	  		
			$extension = array(
				array('type' => 'module','code' => 'rgen_theme'),
				array('type' => 'module','code' => 'rgen_revoslider'),
				array('type' => 'module','code' => 'rgen_megamenu'),
				array('type' => 'module','code' => 'rgen_customproducts'),
				array('type' => 'module','code' => 'rgen_custom')
			);

			// Installing extensions
			foreach ($extension as $ext_k => $ext_v) {
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "extension WHERE `code` = '" . $ext_v['code'] . "'");
				if (!isset($query->rows[0])) {
					$this->db->query("INSERT INTO `" . DB_PREFIX . "extension` (`type`, `code`) VALUES ('". $ext_v['type'] ."', '". $ext_v['code'] ."');");
				}
			}
			
			// Installing all modules
			if (is_file(DIR_APPLICATION."model/rgen/sampledata/" . $datasource . "/" . $datasource . "_allrgenmodules.sql")) {
				$sql_data = file_get_contents(DIR_APPLICATION."model/rgen/sampledata/" . $datasource . "/" . $datasource . "_allrgenmodules.sql");
				foreach (explode(";\n", $sql_data) as $sql) {
		    		$sql = trim($sql);
		    		$sql = str_ireplace("`oc_", "`".DB_PREFIX, $sql);
		    		if ($sql) {
		      			$this->db->query($sql);
		    		}
		  		}
			}

			// Installing categories and other data
			if (is_file(DIR_APPLICATION."model/rgen/sampledata/" . $datasource . "/" . $datasource . "_otherdata.sql")) {
				$sql_data = file_get_contents(DIR_APPLICATION."model/rgen/sampledata/" . $datasource . "/" . $datasource . "_otherdata.sql");
				foreach (explode(";\n", $sql_data) as $sql) {
		    		$sql = trim($sql);
		    		$sql = str_ireplace("`oc_", "`".DB_PREFIX, $sql);
					if ($sql) {
		      			$this->db->query($sql);
		    		}
		  		}
			}

			// Installing RGen theme settings
		  	if(is_file(DIR_APPLICATION."model/rgen/sampledata/" . $datasource . "/" . $datasource . "_settings.sql") ){
		  		$sql_data = file_get_contents(DIR_APPLICATION."model/rgen/sampledata/" . $datasource . "/" . $datasource . "_settings.sql");
		  		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `group` = 'rgen_theme'");
		  		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `group` = 'rgen_custom'");
		  		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `group` = 'rgen_revoslider'");
		  		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `group` = 'rgen_customproducts'");
		  		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `group` = 'rgen_megamenu'");
		  		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `group` = 'featured' AND `key` = 'featured_module'");
		  		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `group` = 'banner'");
		  		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `group` = 'slideshow'");
		  		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `group` = 'carousel'");
		  		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `group` = 'category'");
		  		foreach (explode(",\n", $sql_data) as $sql) {
		  			$sql = trim($sql).';';
		  			if ($sql) {
		  				//echo "<pre style='color:;'>" . print_r($sql, TRUE) . "</pre>";
	  					$this->db->query("INSERT INTO `" . DB_PREFIX . "setting` (`group`, `key`, `value`, `serialized`) VALUES " . $sql . "");
		    		}
		  		}
		  	}

		  	// Installing image sizes
		  	if(is_file(DIR_APPLICATION."model/rgen/sampledata/" . $datasource . "/" . $datasource . "_imagesizes.php") ){
		  		include "model/rgen/sampledata/" . $datasource . "/" . $datasource . "_imagesizes.php";
		  		foreach ($imgSizes as $sqlKey => $sqlValue) {
		    		if ($sqlValue) {
		      			$this->db->query("UPDATE  `" . DB_PREFIX . "setting` SET  `value` = '".$sqlValue."' WHERE  `key` =  '".$sqlKey."'");
		    		}
		  		}
		  	}

	  	}else{
	  		echo "<div class='error'>Sample data not available to install.</div>";
	  	}

	}

	/* Save theme settings
	******************************/
	public function savetheme() {
		$this->load->model('rgen/rgentheme');
		$this->load->model('setting/setting');

		//$this->data['RGentheme_settings_name'] = $this->config->get('RGen_themeSettings');
		$this->data['RGentheme_settings_name'] = $this->request->get['thm_name'];
		$this->data['RGentheme_settings_data'] = $this->model_setting_setting->getSetting('rgen_theme');

		// Excluding html data
		/*****************************/
		unset($this->data['RGentheme_settings_data']['FT_fb_code']);
		unset($this->data['RGentheme_settings_data']['FT_about_Text']);

		$this->load->model('localisation/language');
		$this->data['languages'] = $this->model_localisation_language->getLanguages();

		foreach ($this->data['languages'] as $lk => $lv) {
			unset($this->data['RGentheme_settings_data']['RGen_module'][$lv['language_id']]['ftAbout']);
			unset($this->data['RGentheme_settings_data']['RGen_module'][$lv['language_id']]['Menu'][2]);
			unset($this->data['RGentheme_settings_data']['RGen_module'][$lv['language_id']]['Menu'][3]);
		}
		/*****************************/
		
		$this->data['rgentheme_setting'] = array(
			$this->data['RGentheme_settings_name'] => $this->data['RGentheme_settings_data']
			);
		$this->data['chkval_settings'] = $this->model_rgen_rgentheme->getRGenValue($this->data['RGentheme_settings_name']);

		if (isset($this->data['RGentheme_settings_name']) && $this->data['RGentheme_settings_name'] != '') {
			if($this->data['chkval_settings']){
				$this->model_rgen_rgentheme->editRGenValue($this->data['RGentheme_settings_name'],  $this->data['rgentheme_setting'][$this->data['RGentheme_settings_name']]);
			}else{
				$this->model_rgen_rgentheme->insertRGen('rgen_theme',  $this->data['rgentheme_setting']);
			}
			
		}
	}

	/* Load theme settings
	******************************/
	public function loadtheme() {
		$this->load->model('rgen/rgentheme');

		$this->data['RGen_themelist'] = array();

		// Generating R.Gen theme setting list
		if (is_dir(DIR_APPLICATION."model/rgen/sampledata/") == 1) {
			if(is_file(DIR_APPLICATION."model/rgen/sampledata/rgen_themelist.php")){
				if(is_file(DIR_APPLICATION."model/rgen/sampledata/rgen_theme_settingsdata.sql")){
					include DIR_APPLICATION."model/rgen/sampledata/rgen_themelist.php";
					$sql_data = file_get_contents(DIR_APPLICATION."model/rgen/sampledata/rgen_theme_settingsdata.sql");
					foreach (explode("~RG~", $sql_data) as $sql) {
			    		$sql = trim($sql);
			    		if ($sql) {
			      			$this->db->query("INSERT IGNORE INTO `" . DB_PREFIX . "rgen_theme` (`group`, `key`, `value`, `serialized`) VALUES".$sql.";");
			    		}
			  		}
				}else{
					include DIR_APPLICATION."model/rgen/sampledata/rgen_themelist.php";
					foreach ($this->data['RGen_themelist'] as $k => $v) {
						$this->db->query("DELETE FROM `" . DB_PREFIX . "rgen_theme` WHERE `group` = 'rgen_theme' AND `key` = '".$v."'");
					}
					$this->data['RGen_themelist'] = '';
				}
			}
		}

		if (isset($this->request->get['load_thm']) && $this->request->get['load_thm'] != '') {
			$this->data['getTheme_data'] = $this->model_rgen_rgentheme->getRGenValue($this->request->get['load_thm']);
			
			// Loading demo theme settings
			$thm = $this->request->get['load_thm'];
			foreach ($this->data['getTheme_data'][$thm] as $key => $value) {
				if (isset($key)) {
					$this->model_rgen_rgentheme->editRGenSettingValue($key, $value);
				}
			}
		}else{
			$this->data['getthemelist'] = $this->model_rgen_rgentheme->getRGen('rgen_theme');
			$this->data['themelist'] = array();
			foreach ($this->data['getthemelist'] as $key => $value) {
				$this->data['themelist'][] = $key;
			}	
		}
	}

	/* Delete theme settings
	******************************/
	public function deletetheme() {
		$this->load->model('rgen/rgentheme');

		$this->model_rgen_rgentheme->deleteRGenValue($this->db->escape($this->request->get['thm_name']));
		$this->model_rgen_rgentheme->editRGenSettingValue('RGen_themeSettings', '');
	}
	

	public function categoriesAuto() {
		/*********************************************************************/
		// Categories
		$this->load->model('catalog/category');
		$selectedCat = $this->config->get('RGen_allcat_menu');
		$this->data['rgen_catlist'] = array();
		
		if (isset($selectedCat)) {
			foreach ($selectedCat as $catarry) {
				if (isset($catarry)) {
					//echo "<pre style='color:;'>" . print_r($catarry, TRUE) . "</pre>";
					$category_info = $this->model_catalog_category->getCategory($catarry);
					if ($category_info) {
						$this->data['rgen_catlist'][] = array(
							'category_id' => $category_info['category_id'],
							'name'        => ($category_info['path'] ? $category_info['path'] . ' &gt; ' : '') . $category_info['name']
						);	
					}
				}
			}
		}
		
		//echo "<pre style='color:;'>" . print_r($this->data['rgen_catlist'], TRUE) . "</pre>";
		/*********************************************************************/
	}

	public function manufacturerAuto() {
		/*********************************************************************/
		// Manufacturer 
		$this->load->model('catalog/manufacturer');
		$selectedBrand = $this->config->get('RGen_brand_menu');
		$this->data['rgen_brandlist'] = array();

		if (isset($selectedBrand)) {
			foreach ($selectedBrand as $brdarry) {
				if (isset($brdarry)) {
					//echo "<pre style='color:;'>" . print_r($catarry, TRUE) . "</pre>";
					$brand_info = $this->model_catalog_manufacturer->getManufacturer($brdarry);
					if ($brand_info) {
						$this->data['rgen_brandlist'][] = array(
							'manufacturer_id' => $brand_info['manufacturer_id'],
							'name'        => $brand_info['name'],
							'image'       => isset($brand_info['image']) ? $this->model_tool_image->resize($brand_info['image'], 100, 100) : $this->model_tool_image->resize("no_image.jpg", 100, 100),
							'url'        => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $brand_info['manufacturer_id'])
							
						);	
					}
				}
			}
		}
		
		//echo "<pre style='color:;'>" . print_r($this->data['rgen_brandlist'], TRUE) . "</pre>";
		/*********************************************************************/
	}

	public function productsAuto() {
		/*********************************************************************/
		// Products
		$this->load->model('catalog/product');
		$selectedPrd = $this->config->get('RGen_prd_menu');
		$this->data['rgen_prdlist'] = array();

		if (isset($selectedPrd)) {
			foreach ($selectedPrd as $prd) {
				if (isset($prd)) {
					//echo "<pre style='color:;'>" . print_r($catarry, TRUE) . "</pre>";
					$prd_info = $this->model_catalog_product->getProduct($prd);
					if ($prd_info) {
						$this->data['rgen_prdlist'][] = array(
							'product_id' => $prd_info['product_id'],
							'name'       => $prd_info['name']
						);	
					}
				}
			}
		}
		
		//echo "<pre style='color:;'>" . print_r($this->data['rgen_prdlist'], TRUE) . "</pre>";
		/*********************************************************************/
	}

	private function validate() {

		if (!$this->user->hasPermission('modify', 'module/rgen_theme')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
}
?>