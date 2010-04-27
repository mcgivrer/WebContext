<?= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?= __h('header','title') ?> - <?= __h('header','subtitle') ?></title>
		<link rel="stylesheet" href="<?=__tcss('main')?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="styles/debug.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="styles/jquery.lightbox.css" type="text/css" media="screen" />
		<script src="scripts/jquery-1.4.2.min.js" type="text/javascript" language="javascript" charset="utf-8"></script>
		<script src="scripts/jquery.lightbox-0.5.pack.js" type="text/javascript" language="javascript" charset="utf-8"></script>
		<script src="scripts/main.js" type="text/javascript" language="javascript" charset="utf-8"></script>
		<link rel="shortcut icon" href="http://web-context.local.net/webcontext.png" />
	</head>
	<body>
		<div id="page">
			<div id="header">
				<div id="webcontext-header">
					<h1><a href="<?=__linkto('home','index')?>" title="<?=__('header','title_tooltip')?>"><?= __('header','title') ?></a></h1>
					<div class="rightside">
						<p><?= __('header','subtitle')?></p>
						<form id="formsearch" class="search" method="post" action="index.php">
							<label for="search"><?=__('search','label')?>
							<input type="text"
								name="search" id="search"
								value="<?php echo ( $SearchText!='' ? $SearchText : __('search','default_text'))?>"
								size="15" maxsize="30"
								accesskey="S"
								title="<?= __('search','input_tooltip')?>"/></label>
						</form>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>

			</div>
			<div id="content">
				<? __timport('index/content'); ?>
			</div>
			<div id="footer">
				<ul><li>Copyright 2010</li>
				<li><a href="mailto:frederic.delorme@web-context.com" title="contact author">frederic.delorme@web-context.com</a></li>
				<li><a href="http://www.web-context.com/" title="visit home page">http://www.web-context.com/</a></li>
				<li><?=__renderTime()?></li></ul>
				<p>Only viewable with <a href="" title="Visit the official Mozilla Web site">Mozilla Firefox</a> and <a href="http://en.wikipedia.org/wiki/List_of_web_browsers#WebKit-based_browsers	" title="see a wikipedia list">Webkit Based internet browser</a>.</p>

			</div>
		</div>
		<? Debug::getInstance()->render();?>
	</body>
</html>

