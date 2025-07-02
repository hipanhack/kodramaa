<?php get_header(); ?>
<div class="postbody">
<div class="bixbox">
	<div class="releases"><h1><span><?php echo GOV_lang::get('search_page_title', ["title" => get_search_query()]);?></span></h1></div>
	<?php if (have_posts()) : ?>
	<div class="listupd">
	<?php while ( have_posts() ) : the_post(); get_template_part('main'); endwhile; ?>
	</div>	
	<div class="pagination">
			<?php echo paginate_links(); ?>  
		</div>
	<?php else : ?>
	<div class="listupd">
		<center><h3><?php echo GOV_lang::get('search_page_notfound'); ?></h3></center>
	</div>
	<?php endif; ?>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>