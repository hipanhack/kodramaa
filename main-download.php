<?php 
$seri = get_post_meta(get_the_ID(), 'ero_seri', true); 
$sub = get_post_meta(get_the_ID(),'ero_subepisode',true);
if($sub=='' || $sub=='None'){
	$sub = get_post_meta($seri,'ero_sub',true);
	$subln = rwmb_the_value('ero_sub','',$seri,false);
} else {
	$subln = rwmb_the_value('ero_subepisode','',get_the_ID(),false);
	if($subln==''){ $sub = 'Sub'; $subln = 'Sub'; }
}
$author_id = get_post_field( 'post_author', get_the_ID() ); 
?>
<div class="bixbox episodedl">
	<div class="epwrapper">
		<div class="epheader">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="entry-info"><?php if(get_option('epssub')=='1'){ ?><i class="status <?php echo $sub; ?>"><?php echo $subln; ?></i><?php } ?> <?php echo GOV_lang::get('episode_page_posted_by_label'); ?> <span class="vcard author"><b class="fn"><a href="<?php echo get_author_posts_url($author_id); ?>"><?php echo get_the_author_meta('display_name', $author_id); ?></a></b></span>, <?php echo GOV_lang::get('episode_page_uploaded_at_label');?> <span class="updated"><?php the_time('F j, Y'); ?></span>, <?php echo GOV_lang::get('episode_page_more_episode_label'); ?> <a href="<?php echo get_the_permalink($seri); ?>"><?php echo get_the_title($seri); ?></a></div>
		</div>
		<div class="navimedia">
			<div class="left">
				<div class="naveps">
					<div class="nvs"><?php previous_post_link('%link', '<i class="fas fa-angle-left" aria-hidden="true"></i> '.GOV_lang::get('episode_page_nav_prev_label'), TRUE); ?></div>
					<div class="nvs nvsc"><a href='<?php echo get_permalink($seri) ?>'><?php echo GOV_lang::get('episode_page_nav_all_episodes_label'); ?></a></div>
					<div class="nvs"><?php next_post_link('%link', GOV_lang::get('episode_page_nav_next_label').' <i class="fas fa-angle-right" aria-hidden="true"></i>', TRUE); ?></div>
				</div>
			</div>
			<?php if(get_option('singlesocial')=='1'){ ?>
			<div class="right">
				<div class="sosmed">
					<a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>"><span class="fab fa-facebook-f" aria-hidden="true"></span></a>
					<a href="https://twitter.com/share?url=<?php the_permalink(); ?>"><span class="fab fa-twitter" aria-hidden="true"></span></a>
					<a href="whatsapp://send?text=<?php the_title(); ?> <?php the_permalink(); ?>"><span class="fab fa-whatsapp" aria-hidden="true"></span></a>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php $warning = get_post_meta($seri,'ero_mature',true); if($warning=='Yes'){ ?>
		<div class="warning">
			<?php echo GOV_lang::get('series_warning');?>
		</div>
		<?php } ?>
		<div class="epcontent entry-content">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php if(get_option('thumbdownload')){ ?>
				<div class="thumbnail">
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } else { echo get_the_post_thumbnail($seri); } ?>
				</div>
				<?php } ?>
				<?php if( '' !== get_post()->post_content ) { the_content(); } ?>
			<?php endwhile; endif; ?>
			<?php single_download_only_links(get_the_ID()); ?>
		</div>
	</div>
</div>
<div id="mobilepisode"></div>