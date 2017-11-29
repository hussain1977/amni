<div id ="<?php print $stats_id; ?>" class="milestone-counter <?php if ($class) print $class; ?>">
	<div data-count="<?php print $number;?>" class="stat-count highlight num"><?php print $number;?></div>
    <div class="milestone-details"><?php print $content; ?></div>
    <?php if ($icon): ?><div class="milestone-icon"><i class="<?php print $icon; ?>"></i> </div><?php endif; ?>
</div>