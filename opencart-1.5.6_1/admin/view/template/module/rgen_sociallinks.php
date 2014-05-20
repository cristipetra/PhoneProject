<h4>Social links</h4>
<div class="form-horizontal social-links">

	<div class="control-group">
		<label class="control-label">Facebook</label>
		<div class="controls">
			<?php 
				$dbKey 	= $socialLink_fb_Status;
				$name	= 'socialLink_fb_Status';
				$id		= 'socialLink_fb_Status';
			?>
			<!-- <span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>

			<?php 
				$dbKey 			= $socialLink_fb;
				$name			= 'socialLink_fb';
				$id				= 'socialLink_fb';
				$placeholder	= 'Enter full URL';
			?>
			<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Twitter</label>
		<div class="controls">
			<?php 
				$dbKey 	= $socialLink_twitter_Status;
				$name	= 'socialLink_twitter_Status';
				$id		= 'socialLink_twitter_Status';
			?>
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span>

			<?php 
				$dbKey 			= $socialLink_twitter;
				$name			= 'socialLink_twitter';
				$id				= 'socialLink_twitter';
				$placeholder	= 'Enter full URL';
			?>
			<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Youtube</label>
		<div class="controls">
			<?php 
				$dbKey 	= $socialLink_youtube_Status;
				$name	= 'socialLink_youtube_Status';
				$id		= 'socialLink_youtube_Status';
			?>
			<!-- <span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>

			<?php 
				$dbKey 			= $socialLink_youtube;
				$name			= 'socialLink_youtube';
				$id				= 'socialLink_youtube';
				$placeholder	= 'Enter full URL';
			?>
			<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Google +</label>
		<div class="controls">
			<?php 
				$dbKey 	= $socialLink_google_Status;
				$name	= 'socialLink_google_Status';
				$id		= 'socialLink_google_Status';
			?>
			<!-- <span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>

			<?php 
				$dbKey 			= $socialLink_google;
				$name			= 'socialLink_google';
				$id				= 'socialLink_google';
				$placeholder	= 'Enter full URL';
			?>
			<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Flickr</label>
		<div class="controls">
			<?php 
				$dbKey 	= $socialLink_flickr_Status;
				$name	= 'socialLink_flickr_Status';
				$id		= 'socialLink_flickr_Status';
			?>
			<!-- <span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>

			<?php 
				$dbKey 			= $socialLink_flickr;
				$name			= 'socialLink_flickr';
				$id				= 'socialLink_flickr';
				$placeholder	= 'Enter full URL';
			?>
			<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Pintrest</label>
		<div class="controls">
			<?php 
				$dbKey 	= $socialLink_pintrest_Status;
				$name	= 'socialLink_pintrest_Status';
				$id		= 'socialLink_pintrest_Status';
			?>
			<!-- <span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>

			<?php 
				$dbKey 			= $socialLink_pintrest;
				$name			= 'socialLink_pintrest';
				$id				= 'socialLink_pintrest';
				$placeholder	= 'Enter full URL';
			?>
			<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Yahoo</label>
		<div class="controls">
			<?php 
				$dbKey 	= $socialLink_yahoo_Status;
				$name	= 'socialLink_yahoo_Status';
				$id		= 'socialLink_yahoo_Status';
			?>
			<!-- <span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>

			<?php 
				$dbKey 			= $socialLink_yahoo;
				$name			= 'socialLink_yahoo';
				$id				= 'socialLink_yahoo';
				$placeholder	= 'Enter full URL';
			?>
			<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Thumblr</label>
		<div class="controls">
			<?php 
				$dbKey 	= $socialLink_thumblr_Status;
				$name	= 'socialLink_thumblr_Status';
				$id		= 'socialLink_thumblr_Status';
			?>
			<!-- <span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>

			<?php 
				$dbKey 			= $socialLink_thumblr;
				$name			= 'socialLink_thumblr';
				$id				= 'socialLink_thumblr';
				$placeholder	= 'Enter full URL';
			?>
			<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Instagram</label>
		<div class="controls">
			<?php 
				$dbKey 	= $socialLink_insta_Status;
				$name	= 'socialLink_insta_Status';
				$id		= 'socialLink_insta_Status';
			?>
			<!-- <span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>

			<?php 
				$dbKey 			= $socialLink_insta;
				$name			= 'socialLink_insta';
				$id				= 'socialLink_insta';
				$placeholder	= 'Enter full URL';
			?>
			<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Linkedin</label>
		<div class="controls">
			<?php 
				$dbKey 	= $socialLink_linkedin_Status;
				$name	= 'socialLink_linkedin_Status';
				$id		= 'socialLink_linkedin_Status';
			?>
			<!-- <span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>

			<?php 
				$dbKey 			= $socialLink_linkedin;
				$name			= 'socialLink_linkedin';
				$id				= 'socialLink_linkedin';
				$placeholder	= 'Enter full URL';
			?>
			<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Vimeo</label>
		<div class="controls">
			<?php 
				$dbKey 	= $socialLink_vimeo_Status;
				$name	= 'socialLink_vimeo_Status';
				$id		= 'socialLink_vimeo_Status';
			?>
			<!-- <span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>

			<?php 
				$dbKey 			= $socialLink_vimeo;
				$name			= 'socialLink_vimeo';
				$id				= 'socialLink_vimeo';
				$placeholder	= 'Enter full URL';
			?>
			<input type="text" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Mail to</label>
		<div class="controls">
			<?php 
				$dbKey 	= $socialLink_mailTo_Status;
				$name	= 'socialLink_mailTo_Status';
				$id		= 'socialLink_mailTo_Status';
			?>
			<!-- <span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Share this</label>
		<div class="controls">
			<?php 
				$dbKey 	= $socialLink_addThis_Status;
				$name	= 'socialLink_addThis_Status';
				$id		= 'socialLink_addThis_Status';
			?>
			<!-- <span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></span>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>
		</div>
	</div>
	

	<?php 
	$socialMod = 0;
	if(isset($RGenData['RGen_social'])){
	foreach($RGenData['RGen_social'] as $RGen_social){ 
		if(isset($RGen_social['status'])){ 
			$RGen_social['status'];
		} else { 
			$RGen_social['status'] = 0; 
		}
	?>
	
	<div class="control-group" id="socialMod<?php echo $socialMod; ?>">
		<label class="control-label">Social icon</label>
		<div class="controls">

			<?php 
				$dbKey 	= $RGen_social['status'];
				$name	= 'RGenData_mod[RGen_social][' . $socialMod . '][status]';
				$id		= 'RGen_social-' . $socialMod;
			?>
			<!-- <span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
			</span> -->
			<span class="switch">
				<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $name; ?>" <?php if ($dbKey) { ?>checked="checked"<?php }?> value="1">
				<label for="<?php echo $id; ?>" class="switch-img"></label>
				<?php if (!$dbKey) { ?><input type="hidden" name="<?php echo $name; ?>" value="0"><?php }?>
			</span>
			
			<?php 
				$dbKey 			= isset($RGen_social['normal']) ? $RGen_social['normal'] : '';
				$name			= 'RGenData_mod[RGen_social][' . $socialMod . '][normal]';
				$placeholder	= 'Image name: normal';
			?>
			<input type="text" class='input-medium' placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">

			<?php 
				$dbKey 			= isset($RGen_social['hover']) ? $RGen_social['hover'] : '';
				$name			= 'RGenData_mod[RGen_social][' . $socialMod . '][hover]';
				$placeholder	= 'Image name: hover';
			?>
			<input type="text" class='input-medium' placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">

			<?php 
				$dbKey 			= isset($RGen_social['url']) ? $RGen_social['url'] : '';
				$name			= 'RGenData_mod[RGen_social][' . $socialMod . '][url]';
				$placeholder	= 'URL';
			?>
			<input type="text" class='input-medium' placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">

			<?php 
				$dbKey 			= isset($RGen_social['sort_order']) ? $RGen_social['sort_order'] : '';
				$name			= 'RGenData_mod[RGen_social][' . $socialMod . '][sort_order]';
				$placeholder	= 'Sort order';
			?>
			<input type="text" class="input-mini" placeholder="<?php echo $placeholder; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" value="<?php echo $dbKey; ?>">
			<a title="Remove" onclick="$('#socialMod<?php echo $socialMod; ?>').remove();" class="btn btn-danger">&times;</a>
				
		</div>
	</div>
	<?php $socialMod++; } 
	}
	?>

	<div class="control-group addNew">
		<label class="control-label"><a class="btn btn-success">Add new icon</a></label>
		<div class="controls">
			<span class="help-block">Save your icon image into this folder => <strong>catalog/view/theme/rgen-opencart/image/rgen/social-icons/</strong></span>
			<br />
			<span class="help-block">
				Image name example: <br /><strong>Normal => twitter.png <br />Hover => twitter_hover.png</strong>
			</span>
		</div>
	</div>

</div>

<script type="text/javascript">
$('.addNew .btn').live('click', function(){
	addSocial();
});
var socialMod = <?php echo $socialMod; ?>;
function addSocial(){
	html = '<div class="control-group" id="socialMod' + socialMod + '">';
	html += '	<label class="control-label">Social icon</label>';
	html += '	<div class="controls">';
	html += '		<span class="switch">';
	html += '			<input type="checkbox" id="RGen_social-' + socialMod + '" name="RGenData_mod[RGen_social][' + socialMod + '][status]" checked="checked" value="1">'
	html += '			<label for="RGen_social-' + socialMod + '" class="switch-img"></label>';
	html += '		</span>';
	html += '		<input class="input-medium" title="Image name: normal" placeholder="Image name: normal" type="text" name="RGenData_mod[RGen_social][' + socialMod + '][normal]" value="">';
	html += '		<input class="input-medium" title="Image name: hover" placeholder="Image name: hover" type="text" name="RGenData_mod[RGen_social][' + socialMod + '][hover]" value="">';
	html += '		<input class="input-medium" title="URL" placeholder="URL" type="text" name="RGenData_mod[RGen_social][' + socialMod + '][url]" value="">';
	html += '		<input class="input-mini" title="Sort order" placeholder="Sort order" class="input-small" type="text" name="RGenData_mod[RGen_social][' + socialMod + '][sort_order]" value="">';
	html += '		<a title="Remove" onclick="$(\'#socialMod' + socialMod + '\').remove();" class="btn btn-danger">&times;</a>';
	html += '	</div>';
	html += '</div>';
	$('.addNew').before(html);
	socialMod++;
}

</script>