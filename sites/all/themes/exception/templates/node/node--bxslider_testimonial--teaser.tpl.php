<div id="node-<?php print $node->nid; ?>" class="testimonial <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	<div class="testimonials-bg"> 
		<div class="testimonials-image">
			<?php print render($content['field_testimonial_image']); ?>
		</div>
		<span><?php print render($content['body']); ?></span> 
		<div class="rating"> 
		<?php print render($content['field_testimonial_rating']); ?>
		</div>
	</div>
	<div class="testimonials-name">
		<strong><?php print $title; ?>:</strong> 
		<?php print render($content['field_testimonial_position'][0]); ?>
	</div>
</div> 