<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <div class="content"<?php print $content_attributes; ?>>
		<div class="dexp-team hover-box">
			<div class="team-img"> 
				<?php print render($content['field_team_image']); ?>
				<h3><?php print $title; ?></h3> 
			</div>
			<div class="team-details">
				<h3 class="gry-bg"><?php print $title; ?></h3>
				<div class="team-position"><?php print render($content['field_team_position']); ?></div>
				<?php print render($content['body']); ?>
				<div class="team-socials">
					<?php print render($content['field_team_social']); ?>
				</div>
			</div>
		</div>
    </div>
</div>