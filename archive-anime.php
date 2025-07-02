<?php get_header(); ?>
<div class="postbody">
<div class="bixbox">
	<div class="releases"><h1><span>Anime Lists</span></h1></div>
		   <div class="mrgn">
			<?php echo do_shortcode('[lists]'); ?>
</div>
</div>
<?php get_sidebar(); ?>
<script>$(".section .quickfilter").parent().remove()</script>
<?php get_footer(); ?>