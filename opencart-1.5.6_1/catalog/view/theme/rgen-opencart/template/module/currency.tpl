<?php if (count($currencies) > 1) { ?>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="currency_form">
	<div id="currency">
		<?php foreach ($currencies as $currency) { ?>
		<?php if ($currency['code'] == $currency_code) { ?>
			
			<?php if ($currency['symbol_left']) { ?>
				<span class="selected-currency"><?php echo $currency['symbol_left']; ?></span>
			<?php } else { ?>
				<span class="selected-currency"><?php echo $currency['symbol_right']; ?></span>
			<?php } ?>
			
		<?php } ?>
		<?php } ?>
		
		<ul>
			<?php foreach ($currencies as $currency) { ?>
			
			<?php if ($currency['symbol_left']) { ?>
			<li><a onclick="$('input[name=\'currency_code\']').attr('value', '<?php echo $currency['code']; ?>'); $('#currency_form').submit();" title="<?php echo $currency['title']; ?>"><?php echo $currency['symbol_left']; ?></a></li>
			
			<?php } else { ?>
			<li><a onclick="$('input[name=\'currency_code\']').attr('value', '<?php echo $currency['code']; ?>'); $('#currency_form').submit();" title="<?php echo $currency['title']; ?>"><?php echo $currency['symbol_right']; ?></a></li>
			<?php } ?>
			
			<?php } ?>
		</ul>
		
		<input type="hidden" name="currency_code" value="" />
		<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
	</div>
</form>
<?php } ?>