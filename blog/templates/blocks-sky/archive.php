<?php get_header(); ?>
<?php
	if (function_exists('wp_list_comments')) {
		add_filter('get_comments_number', 'comment_count', 0);
	}
?>

	<div class="post">

		<h3 class="title">
			<?php
				if (is_search()) {
					echo '搜索结果';
				} else {
					echo '存档';
				}
			?>
		</h3>

		<div class="content">
			<ul id="archive">

				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<li class="archive-post">
							<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<div class="excerpt">
								<?php the_content('阅读全文...'); ?>
							</div>
							<div class="small">
								<?php
									comments_popup_link('没有评论', '1 条评论', '% 条评论', '', '评论关闭');
									edit_post_link('编辑', ' | ', '');
								?>
							</div>
							<div class="small">
								<?php
									the_time('Y年n月j日');
									printf(' |  归档于 %1$s', get_the_category_list(', '));
								?>
							</div>
						</li>
					<?php endwhile; ?>

				<?php else: ?>
					<li class="archive-post">
						<div class="small">
							对不起, 不存在相应的文章.
						</div>
					</li>

				<?php endif; ?>
			</ul>
		</div>

		<div class="meta">
			<div class="info">

<?php
// If this is a search
if (is_search()) {
	printf('关键字: &#8216;%1$s&#8217;', wp_specialchars($s, 1) );
// If this is a category archive
} elseif (is_category()) {
	printf('&#8216;%1$s&#8217; 分类的存档', single_cat_title('', false) );
// If this is a tag archive
} elseif ( is_tag() ) {
	printf('文章标签 &#8216;%1$s&#8217;', single_tag_title('', false) );
// If this is a daily archive
} elseif (is_day()) {
	printf('%1$s 的存档', get_the_time('Y年n月j日') );
// If this is a monthly archive
} elseif (is_month()) {
	printf('%1$s 的存档', get_the_time('Y年n月') );
// If this is a yearly archive
} elseif (is_year()) {
	printf('%1$s 的存档', get_the_time('Y年') );
// If this is an author archive
} elseif (is_author()) {
	printf('%1$s 的存档', get_the_author() );
// If this is a paged archive
} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
	echo '博客存档';
}
?>

			</div>
			<div class="fixed"></div>
		</div>
	</div>

	<div id="pagenavi" class="block">
				<?php wp_pagenavi() ?>
	</div>

<?php get_footer(); ?>
