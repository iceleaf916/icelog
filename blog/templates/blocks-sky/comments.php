<script type="text/javascript" src="http://www.yeezi.org/wp-content/themes/blocks-sky/js/comment.js"></script>

<?php
	// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
		die ('请不要立即加载本页面, 谢谢!');
	}

	$trackbacks = array();
?>

<?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
	<div class="block">
		<div class="content small r">请输入密码再查看评论内容.</div>
	</div>
<?php return; endif; ?>

<?php if ( $comments ) : ?>
	<ol id="comments" class="comments">
	<?php
		if (function_exists('wp_list_comments')) {
			wp_list_comments('type=comment&callback=custom_comments');
			$trackbacks = $comments_by_type['pings'];
		}
	?>
	</ol>

<?php
	if (get_option('page_comments')) {
		$comment_pages = paginate_comments_links('echo=0');
		if ($comment_pages) {
?>
		<div id="commentnavi" class="block">
			<div class="content g">
				<span class="pages">评论分页</span>
				<div id="commentpager"><?php echo $comment_pages; ?></div>
			</div>
		</div>
<?php
		}
	}
?>

	<?php if($trackbacks) : ?>
		<div id="trackbacks" class="block">
			<div class="header">
				<a id="trackbacks_show" href="javascript:void(0);" onclick="MGJS.setStyleDisplay('trackbacks_hide','');MGJS.setStyleDisplay('trackbacks_box','');MGJS.setStyleDisplay('trackbacks_show','none');">显示</a>
				<a id="trackbacks_hide" href="javascript:void(0);" onclick="MGJS.setStyleDisplay('trackbacks_show','');MGJS.setStyleDisplay('trackbacks_box','none');MGJS.setStyleDisplay('trackbacks_hide','none');">隐藏</a>
				<span class="title">Trackbacks</span>
			</div>
			<div id= "trackbacks_box">
				<ul>
					<?php foreach ($trackbacks as $comment) : ?>
						<li>
							<small><?php comment_date('Y/m/d'); ?> - </small>
							<?php comment_author_link(); ?>
							<?php edit_comment_link('编辑', ' <small>(', ')</small>'); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<script type="text/javascript">MGJS.setStyleDisplay('trackbacks_hide','none');MGJS.setStyleDisplay('trackbacks_box','none');</script>
	<?php endif; ?>

<?php elseif (comments_open()) : // If there are no comments yet. ?>
	<div class="block">
		<div class="content small g">本文目前尚无任何评论.</div>
	</div>

<?php endif; ?>

<?php if (!comments_open()) : // If comments are closed. ?>
	<div class="block">
		<div class="content small g">本文的评论功能被关闭了.</div>
	</div>

<?php elseif ( get_option('comment_registration') && !$user_ID ) : // If registration required and not logged in. ?>
	<div class="block">
		<div class="content small g">
			<?php
				if (function_exists('wp_login_url')) {
					$login_link = wp_login_url();
				} else {
					$login_link = 'http://www.yeezi.org/wp-login.php?redirect_to=' . urlencode(get_permalink());
				}
			?>
			<?php printf('您必须 <a href=\"%s\">登录</a> 后才能发表评论.', $login_link); ?>
		</div>
	</div>

<?php else : ?>
	<div id="respond">
	<form id="commentform" action="http://www.yeezi.org/wp-comments-post.php" method="post">
		<div class="body">
			<div class="header">
				<h3 class="title">
					发表评论
				</h3>
				<?php if (function_exists('wp_list_comments')) : ?>
					<?php cancel_comment_reply_link('取消') ?>
				<?php endif; ?>
				<div class="fixed"></div>
			</div>
			<div class="notice">
				<strong>XHTML:</strong> <?php printf('您可以使用这些标签: %s', allowed_tags()); ?>
			</div>

			<div class="text"><textarea name="comment" id="comment" class="textarea" cols="64" rows="8" tabindex="4"></textarea></div>
			<div class="info">

				<div class="part">

				<?php if ( $user_ID ) : ?>
					<?php
						if (function_exists('wp_logout_url')) {
							$logout_link = wp_logout_url();
						} else {
							$logout_link = 'http://www.yeezi.org/wp-login.php?action=logout';
						}
					?>
					<div class="row">登录帐号:  <a href="http://www.yeezi.org/wp-admin/profile.php"><strong><?php echo $user_identity; ?></strong></a>. <a href="<?php echo $logout_link; ?>" title="退出登录">退出登录</a></div>

				<?php else : ?>
					<?php if ( $comment_author != "" ) : ?>
						<?php printf('欢迎回来, <strong>%s</strong>', $comment_author) ?>
						<span id="show_author_info"><a href="javascript:void(0);" onclick="MGJS.setStyleDisplay('author_info','');MGJS.setStyleDisplay('show_author_info','none');MGJS.setStyleDisplay('hide_author_info','');">更改 &raquo;</a></span>
						<span id="hide_author_info"><a href="javascript:void(0);" onclick="MGJS.setStyleDisplay('author_info','none');MGJS.setStyleDisplay('show_author_info','');MGJS.setStyleDisplay('hide_author_info','none');">隐藏 &raquo;</a></span>
					<?php endif; ?>

					<div id="author_info">
						<div><label for="author" class="small">昵称: <?php if ($req) echo '*'; ?></label></div>
						<div><input type="text" class="textfield" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" /></div>
						<div><label for="email" class="small">电子邮箱: <?php if ($req) echo '*'; ?> (保密)</label></div>
						<div><input type="text" class="textfield" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" /></div>
						<div><label for="url" class="small">网址:</label></div>
						<div><input type="text" class="textfield" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" /></div>
					</div>

					<?php if ( $comment_author != "" ) : ?>
						<script type="text/javascript">MGJS.setStyleDisplay('hide_author_info','none');MGJS.setStyleDisplay('author_info','none');</script>
					<?php endif; ?>

				<?php endif; ?>
				</div>

				<?php if (function_exists('wp_list_comments')) : ?>
					<?php comment_id_fields(); ?>
				<?php endif; ?>

				<div class="part">
					<input name="submit" type="submit" id="submit" class="button" tabindex="5" value="提交评论" />
					<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				</div>

				<div class="feed">
					<?php comments_rss_link('订阅本文评论'); ?>
				</div>
			</div>

			<div class="fixed"></div>
		</div>
		<?php do_action('comment_form', $post->ID); ?>
	</form>
	</div>

<?php endif; ?>
