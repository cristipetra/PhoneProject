<?php echo $header; ?>

<div id="content">
	
	<!--CONTENT LEFT -->
	<?php echo $column_left; ?>
	
	<!--CONTENT RIGHT -->
	<?php echo $column_right; ?>
	
	<!--PAGE CONTENT WRAPPER -->
	<div class="content-body search-page">
		
		<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<span><?php echo $breadcrumb['separator']; ?></span><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
		</div>
		
		<h1 class="page-heading"><strong><?php echo $heading_title; ?></strong></h1>
		
		<?php echo $content_top; ?>
		
		<div class="box-form">
			<h2 class="header-3"><?php echo $text_critea; ?></h2>
			<div class="content">
				<table class="form">
					<tr>
						<td valign="top"><label style="position:relative; top:8px;"><?php echo $entry_search; ?></label></td>
						<td>
							<?php if ($search) { ?>
							<input type="text" name="search" value="<?php echo $search; ?>" />
							<?php } else { ?>
							<input type="text" name="search" value="<?php echo $search; ?>" onclick="this.value = '';" onkeydown="this.style.color = '000000'" style="color: #999;" />
							<?php } ?>
							<select name="category_id">
								<option value="0"><?php echo $text_category; ?></option>
								<?php foreach ($categories as $category_1) { ?>
								<?php if ($category_1['category_id'] == $category_id) { ?>
								<option value="<?php echo $category_1['category_id']; ?>" selected="selected"><?php echo $category_1['name']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $category_1['category_id']; ?>"><?php echo $category_1['name']; ?></option>
								<?php } ?>
								<?php foreach ($category_1['children'] as $category_2) { ?>
								<?php if ($category_2['category_id'] == $category_id) { ?>
								<option value="<?php echo $category_2['category_id']; ?>" selected="selected">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_2['name']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $category_2['category_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_2['name']; ?></option>
								<?php } ?>
								<?php foreach ($category_2['children'] as $category_3) { ?>
								<?php if ($category_3['category_id'] == $category_id) { ?>
								<option value="<?php echo $category_3['category_id']; ?>" selected="selected">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_3['name']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $category_3['category_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_3['name']; ?></option>
								<?php } ?>
								<?php } ?>
								<?php } ?>
								<?php } ?>
							</select>
							
							<br />
							<?php if ($sub_category) { ?>
							<input type="checkbox" name="sub_category" value="1" id="sub_category" checked="checked" />
							<?php } else { ?>
							<input type="checkbox" name="sub_category" value="1" id="sub_category" />
							<?php } ?>
							<label for="sub_category"><?php echo $text_sub_category; ?></label>
							
							<?php if ($description) { ?>
							<input type="checkbox" name="description" value="1" id="description" checked="checked" />
							<?php } else { ?>
							<input type="checkbox" name="description" value="1" id="description" />
							<?php } ?>
							<label for="description"><?php echo $entry_description; ?></label>
							<br /><br />
							<input type="button" value="<?php echo $button_search; ?>" id="button-search" class="button" />
						</td>
					</tr>
				</table>
			</div>
		</div>
		
		<h2 class="header-2"><?php echo $text_search; ?></h2><br /><br />
		
		<!--PRODUCT FILTER TOOLS -->
		<?php if ($products) { ?>
		<div class="product-filter">
			<div class="sort"><b><?php echo $text_sort; ?></b>
				<select onchange="location = this.value;">
					<?php foreach ($sorts as $sorts) { ?>
					<?php if ($sorts['value'] == $sort . '-' . $order) { ?>
					<option value="<?php echo $sorts['href']; ?>" selected="selected"><?php echo $sorts['text']; ?></option>
					<?php } else { ?>
					<option value="<?php echo $sorts['href']; ?>"><?php echo $sorts['text']; ?></option>
					<?php } ?>
					<?php } ?>
				</select>
			</div>
			<div class="limit"><b><?php echo $text_limit; ?></b>
				<select onchange="location = this.value;">
					<?php foreach ($limits as $limits) { ?>
					<?php if ($limits['value'] == $limit) { ?>
					<option value="<?php echo $limits['href']; ?>" selected="selected"><?php echo $limits['text']; ?></option>
					<?php } else { ?>
					<option value="<?php echo $limits['href']; ?>"><?php echo $limits['text']; ?></option>
					<?php } ?>
					<?php } ?>
				</select>
			</div>
			
			<div class="product-compare"><a href="<?php echo $compare; ?>" id="compare-total" class="button"><?php echo $text_compare; ?></a></div>
			
			<div class="display">
				<b><?php echo $text_list; ?></b> 
				<a onclick="display('grid');"><?php echo $text_grid; ?></a>
			</div>
			<span class="hr"></span>
		</div>
		
		
		
		<!--PRODUCT LIST AREA -->
		<div class="product-list">
			
			<!--PRODUCT BOX -->
			<?php 
			if ($this->config->get('RGen_prdBlock_view') == 'prd1' || $this->config->get('RGen_prdBlock_view') == '') {
				include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_productblock1.php');
			} elseif ($this->config->get('RGen_prdBlock_view') == 'prd2') {
				include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_productblock2.php');
			} elseif ($this->config->get('RGen_prdBlock_view') == 'prd3') {
				include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_productblock3.php');
			} elseif ($this->config->get('RGen_prdBlock_view') == 'prd4') {
				include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_productblock4.php');
			}
			?>
			<div class="clearfix"></div>
		</div>
		
		<div class="pagination"><?php echo $pagination; ?></div>
		<?php } else { ?>
		<div class="content"><?php echo $text_empty; ?></div>
		<?php }?>
		
	</div>
	<div class="clearfix"></div>
	<?php echo $content_bottom; ?>

</div>
<script type="text/javascript"><!--
$('#content input[name=\'search\']').keydown(function(e) {
	if (e.keyCode == 13) {
		$('#button-search').trigger('click');
	}
});

$('select[name=\'category_id\']').bind('change', function() {
	if (this.value == '0') {
		$('input[name=\'sub_category\']').attr('disabled', 'disabled');
		$('input[name=\'sub_category\']').removeAttr('checked');
	} else {
		$('input[name=\'sub_category\']').removeAttr('disabled');
	}
});

$('select[name=\'category_id\']').trigger('change');

$('#button-search').bind('click', function() {
	url = 'index.php?route=product/search';
	
	var search = $('#content input[name=\'search\']').attr('value');
	
	if (search) {
		url += '&search=' + encodeURIComponent(search);
	}

	var category_id = $('#content select[name=\'category_id\']').attr('value');
	
	if (category_id > 0) {
		url += '&category_id=' + encodeURIComponent(category_id);
	}
	
	var sub_category = $('#content input[name=\'sub_category\']:checked').attr('value');
	
	if (sub_category) {
		url += '&sub_category=true';
	}
		
	var filter_description = $('#content input[name=\'description\']:checked').attr('value');
	
	if (filter_description) {
		url += '&description=true';
	}

	location = url;
});
//--></script>
<?php echo $footer; ?>