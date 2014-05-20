<?php if (count($languages) > 1) { ?>

<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="language_form">
	<div id="language">
		
		<?php foreach ($languages as $language) { ?>
		<?php if ($language['code'] == $language_code) { ?>
			<span class="selected-language"><img src="image/flags/<?php echo $language['image']; ?>" alt="<?php echo $language['name']; ?>" title="<?php echo $language['name']; ?>" /></span>
		<?php } ?>
		<?php } ?>
		
		<ul>
			<?php foreach ($languages as $language) { ?>
			<li><a onclick="$('input[name=\'language_code\']').attr('value', '<?php echo $language['code']; ?>'); $('#language_form').submit();" title="<?php echo $language['name']; ?>"><img src="image/flags/<?php echo $language['image']; ?>" alt="<?php echo $language['name']; ?>" title="<?php echo $language['name']; ?>" /></a></li>
			<?php } ?>
		</ul>
		<input type="hidden" name="language_code" value="" />
		<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
	</div>
</form>
<?php } ?>
