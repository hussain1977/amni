<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=""> <!--<![endif]-->
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
		<?php print $head; ?>
		<title><?php print $head_title; ?></title>
		<?php print $styles; ?>
		<?php print $scripts; ?>
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php print url(drupal_get_path('theme', $GLOBALS['theme']));?>/assets/css/ie9.css"><![endif]-->
		<!--[if IE 8]><link rel="stylesheet" type="text/css" href="<?php print url(drupal_get_path('theme', $GLOBALS['theme']));?>/assets/css/ie9.css"><![endif]-->
		<!--[if IE 9]><link rel="stylesheet" type="text/css" href="<?php print url(drupal_get_path('theme', $GLOBALS['theme']));?>/assets/css/ie9.css"><![endif]-->
	</head>
	<body class="<?php print $classes; ?>" <?php print $attributes;?>>
		<div id="skip-link">
		<a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
		</div>
		<?php print $page_top; ?>
		<?php print $page; ?>
		<?php print $page_bottom; ?>
	</body>
</html>
