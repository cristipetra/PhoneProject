<div class="left">
	<div class="box-form">
		<h2 class="header-3"><?php echo $text_new_customer; ?></h2>
		<p><?php echo $text_checkout; ?></p>
		
		<div class="checkout-option">
			<label for="register">
				<?php if ($account == 'register') { ?>
				<input type="radio" name="account" value="register" id="register" checked="checked" />
				<?php } else { ?>
				<input type="radio" name="account" value="register" id="register" />
				<?php } ?>
				<b><?php echo $text_register; ?></b>
			</label><br />
			
			<?php if ($guest_checkout) { ?>
			<label for="guest">
				<?php if ($account == 'guest') { ?>
				<input type="radio" name="account" value="guest" id="guest" checked="checked" />
				<?php } else { ?>
				<input type="radio" name="account" value="guest" id="guest" />
				<?php } ?>
				<b><?php echo $text_guest; ?></b>
			</label>
			<?php } ?>
		</div>
		
		<p><?php echo $text_register_account; ?></p>
		<input type="button" value="<?php echo $button_continue; ?>" id="button-account" class="button dark-bt" />
		
	</div>
</div>
<div id="login" class="right">
	<div class="box-form">
		<h2 class="header-3"><?php echo $text_returning_customer; ?></h2>
		<p><?php echo $text_i_am_returning_customer; ?></p>
		<label for="email"><?php echo $entry_email; ?></label>
		<input type="text" name="email" value="" />
		<label for="password"><?php echo $entry_password; ?></label>
		<input type="password" name="password" value="" />
		<a href="<?php echo $forgotten; ?>"><?php echo $text_forgotten; ?></a>
		<input type="button" value="<?php echo $button_login; ?>" id="button-login" class="button dark-bt" />
	</div>
</div>