<div id="banner<?php echo $module; ?>" class="banner">
	<?php foreach ($banners as $banner) { ?>
	<?php if ($banner['link']) { ?>
	<div class="bnr-bx"><a href="<?php echo $banner['link']; ?>"><img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" title="<?php echo $banner['title']; ?>" /></a></div>
	<?php } else { ?>
	<div class="bnr-bx"><img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" title="<?php echo $banner['title']; ?>" /></div>
	<?php } ?>
	<?php } ?>
</div>
<script type="text/javascript"><!--
$(document).ready(function() {
	$('#banner<?php echo $module; ?> div:first-child').css('display', 'block');
});

if($('#content').hasClass('store-home') == false){
	
	if($('#banner<?php echo $module; ?>').find('.bnr-bx').length > 1){
		var banner = function() {
			$('#banner<?php echo $module; ?>').cycle({
				before: function(current, next) {
					$(next).parent().height($(next).outerHeight());
				}
			});
		}
		setTimeout(banner, 2000);
	}
	
}

/* JS FOR STORE HOME BANNERS */
$('.banner').each(function(index, element) {
	if($(this).find('.clearfix').length == 0 && $(this).parent().hasClass('column') == false){
		$(this).append('<div class="clearfix hr" />');
	}
	if($(this).children('.bnr-bx').length == 1) { $(this).addClass('bnr-bx-col1'); }
	if($(this).children('.bnr-bx').length == 2) { $(this).addClass('bnr-bx-col2'); }
	if($(this).children('.bnr-bx').length == 3) { $(this).addClass('bnr-bx-col3'); }
	if($(this).children('.bnr-bx').length == 4) { $(this).addClass('bnr-bx-col4'); }
});
$('.banner').children('.bnr-bx:last').addClass('last');


//--></script>