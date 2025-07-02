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
<div class="item meta">
					<div class="tb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
					<?php echo get_the_post_thumbnail($seri); ?>
					<meta itemprop="url" content="<?php echo get_the_post_thumbnail_url($seri); ?>">
					<meta itemprop="width" content="190">
					<meta itemprop="height" content="260">
					</div>
					<div class="lm">
						<div class="title-section">
							<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
						</div>
						<meta itemprop="episodeNumber" content="<?php echo get_post_meta(get_the_ID(),'ero_episodebaru',true); ?>">
						<span class="epx"> <?php echo get_post_meta($seri,'ero_type',true); ?> <span class="lg"><?php echo $sub; ?></span></span>
						
					<span class="year">
							<?php if(get_option('epssub')=='1'){ ?><i class="status <?php echo $sub; ?>"><?php echo $subln; ?></i><?php } ?>
							<?php echo GOV_lang::get('episode_page_uploaded_at_label');?> <span class="updated"><?php the_time('F j, Y'); ?></span> · 
							<?php echo wpb_get_post_views(get_the_ID()); ?> · 
							<?php echo GOV_lang::get('episode_page_posted_by_label'); ?> <span class="vcard author"><b class="fn"><a href="<?php echo get_author_posts_url($author_id); ?>"><?php echo get_the_author_meta('display_name', $author_id); ?></a></b></span> · <?php echo GOV_lang::get('home_latest_release_stylesix'); ?> <a href="<?php echo get_the_permalink($seri); ?>"><?php echo get_the_title($seri); ?></a>
						</span>
					</div>
				<?php if(get_option('singlesocial')=='1'){ ?>
				<div class="sosmed">
					<a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>"><span class="fab fa-facebook-f" aria-hidden="true"></span></a>
					<a href="https://twitter.com/share?url=<?php the_permalink(); ?>"><span class="fab fa-twitter" aria-hidden="true"></span></a>
					<a href="whatsapp://send?text=<?php the_title(); ?> <?php the_permalink(); ?>"><span class="fab fa-whatsapp" aria-hidden="true"></span></a>
				</div>
				<?php } ?>
</div>
<?php $ann = get_option('anntopplayer'); if($ann) { ?><div class="announ"><?php echo $ann; ?></div><?php } ?>
<?php 
	$mirrorx = playable_mirror(get_the_ID()); 
	if($mirrorx){ ?>
<div class="megavid">
				<?php $kln = get_option('reader1'); if($kln) { ?><div class="kln"><?php echo $kln; ?></div><br/><?php } ?>
				<div class="video-content">
					<?php $kln = get_option('overplay');if($kln){ ?>
					<div id="overplay">
						<div class="chain" align="center"><a href="#" id="close-teaser" onclick="document.getElementById('overplay').style.display = 'none';" style="cursor:pointer;"><img src="https://3.bp.blogspot.com/-ZZSacDHLWlM/VhvlKTMjbLI/AAAAAAAAF2M/UDzU4rrvcaI/s1600/btn_close.gif"/></a>
						<?php echo $kln; ?>
						</div>
					</div>
					<?php } ?>

					<?php videocontent(); ?>
				</div>
				<div class="item video-nav">
					<div class="mobius">
					<?php
						videomirror(get_the_ID());
					?>
					<div class="iconx">
						<div class="icol expand"><i class="fa fa-expand" aria-hidden="true"></i> <span><?php echo GOV_lang::get('episode_page_expand_player'); ?></span></div>
						<div class="icol light"><i class="far fa-lightbulb"></i> <span><?php echo GOV_lang::get('episode_page_turn_off_light'); ?></span></div>
						<?php $dl = get_chdl(get_the_ID()); if($dl){ ?>
						<a href="<?php echo $dl; ?>" target="_blank" rel="nofollow"><div class="icol"><i class="fas fa-cloud-download-alt"></i> <span><?php echo GOV_lang::get('episode_page_download_button'); ?></span></div></a>
						<?php } ?>
					</div>
					</div>
				</div>
</div>
<?php $warning = get_post_meta($seri,'ero_mature',true); if($warning=='Yes'){ ?>
	<div class="warning">
		<?php echo GOV_lang::get('series_warning');?>
	</div>
	<?php } ?>
<?php $ann = get_option('annbotplayer'); if($ann) { ?><div class="announ"><?php echo $ann; ?></div><?php } ?>
<div class="naveps bignav">
						<div class="nvs"><?php if (is_object(get_previous_post(TRUE)) && strlen(get_previous_post(TRUE)->post_title) > 0) { previous_post_link('%link', '<i class="fas fa-angle-left"></i> <span class="tex">'.GOV_lang::get('episode_page_nav_prev_label').'</span>', TRUE); } else { echo '<span class="nolink"><i class="fas fa-angle-left"></i> <span class="tex">'.GOV_lang::get('episode_page_nav_prev_label').'</span></span>'; } ?></div>
	<div class="nvs nvsc"><a href='<?php echo get_permalink($seri) ?>'><i class="fas fa-th-list"></i> <span class="tex"><?php echo GOV_lang::get('episode_page_nav_all_episodes_label'); ?></span></a></div>
						<div class="nvs"><?php if (is_object(get_next_post(TRUE)) && strlen(get_next_post(TRUE)->post_title) > 0) { next_post_link('%link','<span class="tex">'. GOV_lang::get('episode_page_nav_next_label').'</span> <i class="fas fa-angle-right"></i>', TRUE); } else { echo '<span class="nolink"><span class="tex">'.GOV_lang::get('episode_page_nav_next_label').'</span> <i class="fas fa-angle-right"></i> </span>'; } ?></div>
</div>
<?php } ?>	
<?php $kln = get_option('reader2'); if($kln) { ?><div class="kln"><?php echo $kln; ?></div><br/><?php } ?>	
	<div id="mobilepisode"></div>
	<div class="entry-content">
	<div class="bixbox infx">
		<p><?php echo GOV_lang::get('episode_page_below_player_keywords', ["anime_title" => get_the_title($seri), "episode_title" => get_the_title(), "blogname" => esc_attr( get_bloginfo( 'name', 'display' ) )]); ?> </p>
	</div>
	<?php if (have_posts()) : while (have_posts()) : the_post(); if( '' !== get_post()->post_content ) { ?>
		<div class="bixbox mctn">
			<?php the_content(); ?>
		</div>
	<?php } endwhile; endif; ?>
	
	<?php single_download_links(get_the_ID()); ?>
	</div>