<div id ="<?php print $stats_id; ?>" class="milestone-counter milestone-counter-bottom <?php if ($class) print $class; ?>">
    <?php if ($icon): ?><div class="milestone-icon"><i class="<?php print $icon; ?>"></i> </div><?php endif; ?>
    <div class="milestone-details"><?php print $content; ?></div>
	<div data-count="<?php print $number;?>" class="stat-count highlight num"><?php print $number;?></div>
</div>