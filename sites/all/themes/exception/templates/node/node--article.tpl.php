<?php
/**
* @file
* Default theme implementation to display a node.
*
* Available variables:
* - $title: the (sanitized) title of the node.
* - $content: An array of node items. Use render($content) to print them all,
* or print a subset such as render($content['field_example']). Use
* hide($content['field_example']) to temporarily suppress the printing of a
* given element.
* - $user_picture: The node author's picture from user-picture.tpl.php.
* - $date: Formatted creation date. Preprocess functions can reformat it by
* calling format_date() with the desired parameters on the $created variable.
* - $name: Themed username of node author output from theme_username().
* - $node_url: Direct URL of the current node.
* - $display_submitted: Whether submission information should be displayed.
* - $submitted: Submission information created from $name and $date during
* template_preprocess_node().
* - $classes: String of classes that can be used to style contextually through
* CSS. It can be manipulated through the variable $classes_array from
* preprocess functions. The default values can be one or more of the
* following:
* - node: The current template type; for example, "theming hook".
* - node-[type]: The current node type. For example, if the node is a
* "Blog entry" it would result in "node-blog". Note that the machine
* name will often be in a short form of the human readable label.
* - node-teaser: Nodes in teaser form.
* - node-preview: Nodes in preview mode.
* The following are controlled through the node publishing options.
* - node-promoted: Nodes promoted to the front page.
* - node-sticky: Nodes ordered above other non-sticky nodes in teaser
* listings.
* - node-unpublished: Unpublished nodes visible only to administrators.
* - $title_prefix (array): An array containing additional output populated by
* modules, intended to be displayed in front of the main title tag that
* appears in the template.
* - $title_suffix (array): An array containing additional output populated by
* modules, intended to be displayed after the main title tag that appears in
* the template.
*
* Other variables:
* - $node: Full node object. Contains data that may not be safe.
* - $type: Node type; for example, story, page, blog, etc.
* - $comment_count: Number of comments attached to the node.
* - $uid: User ID of the node author.
* - $created: Time the node was published formatted in Unix timestamp.
* - $classes_array: Array of html class attribute values. It is flattened
* into a string within the variable $classes.
* - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
* teaser listings.
* - $id: Position of the node. Increments each time it's output.
*
* Node status variables:
* - $view_mode: View mode; for example, "full", "teaser".
* - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
* - $page: Flag for the full page state.
* - $promote: Flag for front page promotion state.
* - $sticky: Flags for sticky post setting.
* - $status: Flag for published status.
* - $comment: State of comment settings for the node.
* - $readmore: Flags true if the teaser content of the node cannot hold the
* main body content.
* - $is_front: Flags true when presented in the front page.
* - $logged_in: Flags true when the current user is a logged-in member.
* - $is_admin: Flags true when the current user is an administrator.
*
* Field variables: for each field instance attached to the node a corresponding
* variable is defined; for example, $node->body becomes $body. When needing to
* access a field's raw values, developers/themers are strongly encouraged to
* use these variables. Otherwise they will have to explicitly specify the
* desired field language; for example, $node->body['en'], thus overriding any
* language negotiation rule that was previously applied.
*
* @see template_preprocess()
* @see template_preprocess_node()
* @see template_process()
*
* @ingroup themeable
*/
?>
<div id="node-<?php print $node->nid; ?>" class="blog-single post">
	<div class="post-image">
    <a href="<?php print $node_url; ?>">
        <div class="mask"><i class="fa fa-chain"></i></div>
        <div class="post-info">
            <div class="main-bg">
				<span><?php print format_date($created, 'custom', 'd');?></span>
				<span><?php print format_date($created, 'custom', 'M');?></span>
				<span><?php print format_date($created, 'custom', 'Y');?></span>
				<span class="tri-col"></span>
            </div>
        </div> 
		<?php print render($content['field_media']);?>
	</a>
	</div>
	<h3 class="post-title">
       <a href="<?php print $node_url;?>"><?php print $title;?></a>
	</h3>
  
	<div class="meta">
		<ul>
			<li class="posted-by">
				<i class="fa fa-user"></i> <?php print t('By:'); ?> <?php print $name;?>
			</li>
			<li class="category"><i class="fa fa-folder-open"></i> <?php print t('Category:'); ?> <?php print render($content['field_blog_categories']);?></li>
			<li class="comment-count">
				<i class="fa fa-comments"></i>
				<?php print t('Comments:'); ?> <?php print $comment_count;?> 
			</li>
		</ul>
	</div> 
    <section class="post-content">
        <div class="post_desc">
          <?php print render($content['body']);?>
        </div>
		<div class="post-tags">
			<?php if(isset($blog_tags)) print '<i class="fa fa-tags"></i> ' . $blog_tags;?>
		</div>
		<div class="share-post"> 
			<span class="title">Share this post on:</span>
			<ul class="social-share">
			<?php global $base_url; ?>
			<?php $share_url = $base_url . drupal_get_path_alias('node/'.$node->nid); ?>
				<li><a class="main-bg" href="https://plusone.google.com/_/+1/confirm?hl=en&amp;url=<?php print $share_url; ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;" class="gbs"><i class="fa fa-google-plus"></i></a></li>
				<li><a class="main-bg" href="https://www.facebook.com/sharer/sharer.php?u=<?php print $share_url; ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;" class="fbs"><i class="fa fa-facebook"></i></a></li>
				<li><a class="main-bg" href="https://twitter.com/intent/tweet?text=<?php print $title; ?>&url=<?php print $share_url; ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;" class="tws"><i class="fa fa-twitter"></i></a></li>
				<li><a class="main-bg" href="http://www.stumbleupon.com/submit?url=<?php print $share_url; ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;" class="sps"><i class="fa fa-stumbleupon"></i></a></li>
				<li><a class="main-bg" href="http://reddit.com/submit?url=<?php print $share_url; ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;" class="rts"><i class="fa fa-reddit"></i></a></li>
				<li><a class="main-bg" href="http://digg.com/submit?url=<?php print $share_url; ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;" class="dgs"><i class="fa fa-digg"></i></a></li>
				<li><a class="main-bg" href="http://www.tumblr.com/share/link?url=<?php print $share_url; ?>&name=<?php print $title; ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;" class="trs"><i class="fa fa-tumblr"></i></a></li>
			</ul>
		</div>

    </section>


	<!--div class="blog-author">
		<div class='blog-author-inner'>
            <div class='avatar-author'>
                <?php //if (!empty($user_picture)) print $user_picture; else 
                    //print '<img src="/sites/all/themes/exception/assets/images/person.png">';
                ?>
            </div>
            <div class='name-author'>
                <?php //print $name; ?>
            </div>
        </div>    
    </div-->
	

</div>
<?php print render($content['comments']); ?>