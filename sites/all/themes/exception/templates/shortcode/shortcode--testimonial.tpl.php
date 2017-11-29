<div class="item <?php if ($sequence == 0) print 'active'; ?>">
   <?php if($image) : ?>   <img alt="" src="<?php  print $image;?>"> <?php endif; ?>
    <p><?php print $content; ?></p>  
	<div class="testimonials-name main-bg"><strong><?php if($name) print $name;?>:</strong> <?php if($position) print $position;?></div>
</div>