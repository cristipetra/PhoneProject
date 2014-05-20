<?php 
if ($this->rgen->device == 't' || $this->rgen->device == 'd') { 
if ($modules) { ?>
<div id="column-left" class="column">
  <?php foreach ($modules as $module) { ?>
  <?php echo $module; ?>
  <?php } ?>
</div>
<?php } } ?> 
