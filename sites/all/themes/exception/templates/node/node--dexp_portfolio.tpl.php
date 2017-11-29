<div id="node-<?php print $node->nid; ?>" class="portfolio-single <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_portfolio_images']);
    $language=$node->language;
    ?>
	<div class="portfolio-single-top clearfix">
		<div class="container"<?php print $content_attributes; ?>>
			<div class="row">
				<div class="portfolio-images">
				<?php
				if (isset($node->field_portfolio_media[$language])) {
					print render($content['field_portfolio_media']);
				} else {
					print render($content['field_portfolio_images']);
				}
				?>
				</div>
			</div>
		</div>
	</div>
	<div class="portfolio-single-bottom gry-bg clearfix">
		<div class="container"<?php print $content_attributes; ?>>
			 
				<div class="portfolio-info title title-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
					 
					<?php print render($content['body']); ?>
				</div>
				 
			</div>    
		</div>
	</div>
    <?php //print render($content['comments']); ?>
</div>