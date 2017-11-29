<div class="panel panel-default">
  <div class="panel-heading">
  <div class="panel-title">
	<a class="<?php print $item_collapse;?> <?php if($class){print $class;}?>" data-parent="#ACCORDION_WRAPPER_ID" data-toggle="collapse" href="#<?php print $accordion_item_id;?>">
		<strong></strong> <h4><span><?php if ($icon!=""){ print "<i class='$icon'></i>";}?><?php print $title;?></span></h4>
	</a>
</div>
  </div>
  <div class="panel-collapse collapse <?php print $item_active;?>" id="<?php print $accordion_item_id;?>">
    <div class="panel-body">
      <?php print $content;?>
    </div>
  </div>
</div>