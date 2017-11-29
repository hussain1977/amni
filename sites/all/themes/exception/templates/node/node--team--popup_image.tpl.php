<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <div class="content"<?php print $content_attributes; ?>>
        <?php print render($title_prefix); ?>
        <?php print render($title_suffix); ?>
        <?php
// We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        $path = drupal_get_path_alias("node/" . $node->nid);
        $language = $node->language;
        if(!isset($node->field_team_image[$language])){
        $language="und";
        }
        $image_path = file_create_url($node->field_team_image[$language][0]['uri']);
        ?>                
	<div class="dexp-team-2 team-popup">
		<div class="team-img"><?php print render($content['field_team_image']); ?> </div>
		<div class="team-details">
			<h3><?php print $title; ?></h3>
			<div class="team-position"><?php print render($content['field_team_position']); ?></div>
			<?php print render($content['body']); ?>
			<div class="team-socials">
				<?php print render($content['field_team_social']); ?>
			</div>
		</div>
	</div>
    </div>
</div>