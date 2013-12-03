<?php get_header(); ?>

<?php if (have_posts()) : the_post(); ?>
	<div class="post">
		<h3 class="title"><?php the_title(); ?></h3>

		<div class="content">
			<?php the_content('阅读全文...'); ?>
			<div class="fixed"></div>
		</div>

		<div class="meta">
			<div class="act">
				<?php 
					edit_post_link('编辑', '', '');
				?>
			</div>
			<div class="info">
				<?php
									comments_popup_link('没有评论', '1 条评论', '% 条评论', '', '评论关闭');
				?>
			</div>
			<div class="fixed"></div>
		</div>
	</div>
<?php else: ?>

	<div class="block">
		<div class="content small r">
			对不起, 不存在相应的文章.
		</div>
	</div>

<?php endif; ?>

<?php
	if (function_exists('wp_list_comments')) {
		comments_template('', true);
	} else {
		comments_template();
	}
?>

<?php get_footer(); ?>
