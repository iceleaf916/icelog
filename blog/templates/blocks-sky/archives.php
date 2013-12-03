<?php
/*
	Template Name: Archives Page
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : the_post(); ?>

	<div class="post">
		<div class="content">
			<?php the_content(); ?>
			<p>
			<?php wp_easyarchives(); ?>
			<div class="fixed"></div>
		</div>
	</div>

<?php else : ?>

	<div class="block">
		<div class="content small r">
			Sorry,the post does not exist.
		</div>
	</div>

<?php endif; ?>

<?php get_footer(); ?>
