<?php get_header(); $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
<div class="postbody">
<div class="bixbox">
	<?php if (have_posts()) : ?>
	<div class="releases"><h1><span><?php echo $curauth->nickname; ?></span></h1></div>
	<div class="listupd">
	<?php while ( have_posts() ) : the_post(); get_template_part('main-category'); endwhile; ?>
	</div>	
	<div class="pagination">
			<?php echo paginate_links(); ?>  
		</div>
	<?php endif; ?>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>