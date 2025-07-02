<?php defined("ABSPATH") || die("!"); ?>
<?php get_header(); ?>

<div class="postbody">
	<?php ts_slider(); ?>
	<?php get_template_part('home-hot'); ?>
	<?php get_template_part('home-latest'); ?>
	<?php echo do_shortcode(get_option('schome')); ?>
	<?php get_template_part('home-random-genres'); ?>
	<?php get_template_part('home-blog'); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>