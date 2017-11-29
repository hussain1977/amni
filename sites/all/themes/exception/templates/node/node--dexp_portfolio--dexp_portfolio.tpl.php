<div id="node-<?php print $node->nid; ?>" class="dexp-portfolio <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <?php
    $lightboxrel = 'portfolio_'.$nid;
    $portfolio_images = field_get_items('node', $node, 'field_portfolio_images');
    $first_image = '';
    if($portfolio_images){
      foreach($portfolio_images as $k => $portfolio_image){
        if($k == 0){
          $first_image = file_create_url($portfolio_image['uri']);
        }else{
          $image_path = file_create_url($portfolio_image['uri']);
          print '<a href="'.$image_path.'" class="fancybox" rel="'.$lightboxrel.'" title="" style="display:none">&nbsp;</a>';
        }
      }
    }
    ?>
	<div class="portfolio-item">
		<div class="image-holder">
			<div class="image-over">
				<a class="fx link"   style=""><b class="fa fa-link"></b></a>
				<a title="<?php print $title; ?>" class="fancybox" href="<?php print $first_image; ?>"><b class="fa fa-search"></b></a>
			</div>
			<img src="<?php print $first_image; ?>">
		</div>
		<div class="portfolio-name">
			<h3><a href="<?php print $node_url?>"><?php print $title;?></a></h3>
			<span><?php print strip_tags(render($content['field_portfolio_categories'])); ?></span>
		</div>
	</div>	
</div> 