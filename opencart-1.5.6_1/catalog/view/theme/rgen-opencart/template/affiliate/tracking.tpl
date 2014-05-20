<?php echo $header; ?>

<div id="content">
	
	<!--CONTENT LEFT -->
	<?php echo $column_left; ?>
	
	<!--CONTENT RIGHT -->
	<?php echo $column_right; ?>
	
	<!--PAGE CONTENT WRAPPER -->
	<div class="content-body">
		
		<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<span><?php echo $breadcrumb['separator']; ?></span><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
		</div>
		
		<h1 class="page-heading"><strong><?php echo $heading_title; ?></strong></h1>
		
		<?php echo $content_top; ?>
		
		<p><?php echo $text_description; ?></p>
		
		<div class="box-form m0">
			<table class="form">
				<tr>
					<td valign="top"><?php echo $text_code; ?></td>
					<td><textarea style="width:80%" cols="40" rows="5"><?php echo $code; ?></textarea></td>
				</tr>
				<tr>
					<td valign="top"><?php echo $text_generator; ?></td>
					<td valign="top"><input style="width:80%" type="text" name="product" value="" /></td>
				</tr>
				<tr>
					<td valign="top"><?php echo $text_link; ?></td>
					<td><textarea style="width:80%" name="link" cols="40" rows="5"></textarea></td>
				</tr>
			</table>	
		</div>
	
		<div class="buttons">
			<div class="right"><a href="<?php echo $continue; ?>" class="button dark-bt"><?php echo $button_continue; ?></a></div>
		</div>
		
	</div>
	<?php echo $content_bottom; ?>

</div>
<script type="text/javascript"><!--
$('input[name=\'product\']').autocomplete({
	delay: 500,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=affiliate/tracking/autocomplete&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {		
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.link
					}
				}));
			}
		});
	},
	select: function(event, ui) {
		$('input[name=\'product\']').attr('value', ui.item.label);
		$('textarea[name=\'link\']').attr('value', ui.item.value);
						
		return false;
	},
	focus: function(event, ui) {
      return false;
   }
});
//--></script> 

<?php echo $footer; ?>