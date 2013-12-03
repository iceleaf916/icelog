<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<link rel="alternate" type="application/rss+xml" title="<?php _e('RSS 2.0 - all posts', 'blocks'); ?>" href="<?php echo $feed; ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php _e('RSS 2.0 - all comments', 'blocks'); ?>" href="<?php bloginfo('comments_rss2_url'); ?>" />

	<!-- style START -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/404.css" type="text/css" media="screen" />
	<!-- style END -->

	<?php wp_head(); ?>
</head>

<body>

<div id="container">
	<div id="talker">
		<?php
			if (function_exists('get_avatar') && get_option('show_avatars')) {
				echo get_avatar(get_option('admin_email'), 96);
			}
		?>
	</div>
	<h1><?php _e('Welcome to 404 error page!', 'blocks'); ?></h1>
	<div id="notice">
		<p>欢迎您来到<a href="http://www.yeezi.org">《一叶知秋》</a>的404 page。由于最近我对博客的<span style="color: #ff6600;">固定链接</span>做了调整，所以您从谷歌、百度或者其它搜索引擎链接到本站文章的时候，很可能看到这个页面。
		<br>如果你觉得不麻烦，请在下面的搜索框内输入您想搜索的内容，一般情况下，您应该可以找到你想看的文章。</p>
				<p style="text-align: center;">
				<form action="<?php bloginfo('home'); ?>/" id="search" method="get">
					<div id="searchbox">
						<input class="textfield" type="text" name="s" value="<?php echo wp_specialchars($s, 1); ?>" />
						<input class="button" type="submit" value="Search" />
						<div class="fixed"></div>
					</div>
				</form>
				</p>
		</div>
</div>

</body>
</html>
