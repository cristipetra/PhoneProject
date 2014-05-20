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
		
		<?php if ($error_warning) { ?>
		<div class="warning"><?php echo $error_warning; ?></div>
		<?php } ?>
		
		<?php echo $content_top; ?>
		
		<?php echo $text_description; ?>
		<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
			<div class="box-form">
				<h2 class="header-3"><?php echo $text_order; ?></h2>
				<div class="content">
					<table class="form">
						<tr>
							<td><?php echo $entry_firstname; ?> <span class="required">*</span></td>
							<td><input type="text" name="firstname" value="<?php echo $firstname; ?>" class="large-field" />
								<?php if ($error_firstname) { ?>
								<span class="error"><?php echo $error_firstname; ?></span>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td><?php echo $entry_lastname; ?> <span class="required">*</span></td>
							<td>
								<input type="text" name="lastname" value="<?php echo $lastname; ?>" class="large-field" />
								<?php if ($error_lastname) { ?>
								<span class="error"><?php echo $error_lastname; ?></span>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td><?php echo $entry_email; ?> <span class="required">*</span></td>
							<td>
								<input type="text" name="email" value="<?php echo $email; ?>" class="large-field" />
								<?php if ($error_email) { ?>
								<span class="error"><?php echo $error_email; ?></span>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td><?php echo $entry_telephone; ?> <span class="required">*</span></td>
							<td>
								<input type="text" name="telephone" value="<?php echo $telephone; ?>" class="large-field" />
								<?php if ($error_telephone) { ?>
								<span class="error"><?php echo $error_telephone; ?></span>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td><?php echo $entry_order_id; ?> <span class="required">*</span></td>
							<td>
								<input type="text" name="order_id" value="<?php echo $order_id; ?>" class="large-field" />
								<?php if ($error_order_id) { ?>
								<span class="error"><?php echo $error_order_id; ?></span>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td><?php echo $entry_date_ordered; ?></td>
							<td>
								<input type="text" name="date_ordered" value="<?php echo $date_ordered; ?>" class="large-field date" />
							</td>
						</tr>
					</table>
				</div>	
			</div>
			
			<div class="box-form">
				<h2 class="header-3"><?php echo $text_product; ?></h2>
				<div class="content" id="return-product">
					<table class="form">
						<tr>
							<td><?php echo $entry_product; ?> <span class="required">*</span></td>
							<td>
								<input type="text" name="product" value="<?php echo $product; ?>" class="large-field" />
								<?php if ($error_product) { ?>
								<span class="error"><?php echo $error_product; ?></span>
								<?php } ?>	
							</td>
						</tr>
						<tr>
							<td><?php echo $entry_model; ?> <span class="required">*</span></td>
							<td>
								<input type="text" name="model" value="<?php echo $model; ?>" class="large-field" />
								<?php if ($error_model) { ?>
								<span class="error"><?php echo $error_model; ?></span>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td><?php echo $entry_quantity; ?></td>
							<td>
								<input type="text" name="quantity" value="<?php echo $quantity; ?>" class="large-field" />
							</td>
						</tr>
						<tr>
							<td valign="top"><?php echo $entry_reason; ?> <span class="required">*</span></td>
							<td>
								
								<?php foreach ($return_reasons as $return_reason) { ?>
								<?php if ($return_reason['return_reason_id'] == $return_reason_id) { ?>
								<div>
									<input type="radio" name="return_reason_id" value="<?php echo $return_reason['return_reason_id']; ?>" id="return-reason-id<?php echo $return_reason['return_reason_id']; ?>" checked="checked" />
									<label for="return-reason-id<?php echo $return_reason['return_reason_id']; ?>"><?php echo $return_reason['name']; ?></label>
								</div>
								<?php } else { ?>
								<div>	
									<input type="radio" name="return_reason_id" value="<?php echo $return_reason['return_reason_id']; ?>" id="return-reason-id<?php echo $return_reason['return_reason_id']; ?>" />
									<label for="return-reason-id<?php echo $return_reason['return_reason_id']; ?>"><?php echo $return_reason['name']; ?></label>
								</div>
								<?php  } ?>
								<?php  } ?>
								<?php if ($error_reason) { ?>
								<span class="error"><?php echo $error_reason; ?></span>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td valign="top"><?php echo $entry_opened; ?></td>
							<td>
								<?php if ($opened) { ?>
								<input type="radio" name="opened" value="1" id="opened" checked="checked" />
								<?php } else { ?>
								<input type="radio" name="opened" value="1" id="opened" />
								<?php } ?>
								<label for="opened"><?php echo $text_yes; ?></label>
								<?php if (!$opened) { ?>
								<input type="radio" name="opened" value="0" id="unopened" checked="checked" />
								<?php } else { ?>
								<input type="radio" name="opened" value="0" id="unopened" />
								<?php } ?>
								<label for="unopened"><?php echo $text_no; ?></label>
								<br />
								<br />
								<label for="comment"><?php echo $entry_fault_detail; ?></label><br />
								<textarea name="comment" cols="80" rows="6" class="large-field"><?php echo $comment; ?></textarea>
							</td>
						</tr>
						<tr>
							<td valign="top"><?php echo $entry_captcha; ?></td>
							<td>
								<img src="index.php?route=account/return/captcha" style="vertical-align:middle;" alt="" />
								<input type="text" name="captcha" style="height:28px; position:relative; top:3px; margin-left:5px;" value="<?php echo $captcha; ?>" />
								
								<?php if ($error_captcha) { ?>
								<span class="error"><?php echo $error_captcha; ?></span>
								<?php } ?>
							</td>
						</tr>
						
					</table>
				
				</div>
			</div>
			
			
			<?php if ($text_agree) { ?>
			<div class="buttons">
				<div class="left"><a href="<?php echo $back; ?>" class="button"><?php echo $button_back; ?></a></div>
				<div class="right">
					<?php echo $text_agree; ?>
					<?php if ($agree) { ?>
					<input type="checkbox" name="agree" value="1" checked="checked" />
					<?php } else { ?>
					<input type="checkbox" name="agree" value="1" />
					<?php } ?>
					<input type="submit" value="<?php echo $button_continue; ?>" class="button dark-bt" />
				</div>
			</div>
			<?php } else { ?>
			<div class="buttons">
				<div class="left"><a href="<?php echo $back; ?>" class="button dark-bt"><?php echo $button_back; ?></a></div>
				<div class="right">
					<input type="submit" value="<?php echo $button_continue; ?>" class="button dark-bt" />
				</div>
			</div>
			<?php } ?>
		</form>
		
	</div>
	<?php echo $content_bottom; ?>

</div>

<script type="text/javascript"><!--
$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
	$('.colorbox').colorbox({
		width: 640,
		height: 480,
		onComplete:function(){
			$('#cboxLoadedContent').wrapInner('<div class="popup-box"></div>');
			$('#cboxLoadedContent').find('h1').addClass('page-heading').wrapInner('<strong></strong>');
		}
	});

});
//--></script> 
<?php echo $footer; ?>