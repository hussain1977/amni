<?php if( $element['#view_mode'] == "compare_page" ) : ?>
	<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
		<?php if (!$label_hidden): ?>
		<div class="field-label"<?php print $title_attributes; ?>><?php print $label ?>:&nbsp;</div>
		<?php endif; ?>
		<div class="field-items"<?php print $content_attributes; ?>>
			<?php print render($items[0]); ?>
		</div>
	</div>
<?php else : ?>
	<?php if(count($items) <= 1):?>
	<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
		<?php if (!$label_hidden): ?>
		<div class="field-label"<?php print $title_attributes; ?>><?php print $label ?>:&nbsp;</div>
		<?php endif; ?>
		<div class="field-items"<?php print $content_attributes; ?>>
			<?php foreach ($items as $delta => $item): ?>
			<div class="field-item <?php print $delta % 2 ? 'odd' : 'even'; ?>"<?php print $item_attributes[$delta]; ?>>
				<?php print render($item); ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div> 
	<?php else: ?>

	<div id="product-slider-wrap">
		<?php 
		  $item = $items[0];
		  $uri = $item['#item']['uri'];
		  $path = file_create_url($uri); ?>
		  <img id="product-slider-thumbnail" class="thumbnail zoomContainer" src='<?php print $path;?>' data-zoom-image="<?php print $path;?>" />
	</div>

	<ul id="product-slider-pager">
		<?php foreach ($items as $delta => $item):
		  $uri = $item['#item']['uri'];
		  $path = file_create_url($uri); ?>
		  <li><a data-image="<?php print $path;?>" data-zoom-image="<?php print $path;?>" href="#" class="<?php if($delta == 0) print 'active'; ?>"><img class="thumbnail" src="<?php print $path;?>" /></a></li>
		<?php endforeach;?>
	</ul>
	<script>
	jQuery(document).ready(function ($) {
		$("#product-slider-thumbnail").elevateZoom({
			gallery:'product-slider-pager', 
			cursor: 'pointer', 
			galleryActiveClass: "active", 
			imageCrossfade: true
		});
		$("#product-slider-thumbnail").bind("click", function(e) {
			var ez = $('#product-slider-thumbnail').data('elevateZoom');
			ez.closeAll(); 
			$.fancybox(ez.getGalleryList());
			return false;
		}); 
	});
	</script>
	<?php endif;?>

<?php endif; ?>