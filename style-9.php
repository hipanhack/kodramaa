<?php 
$ep = get_post_meta(get_the_ID(),'ero_latest',true);
$epid = get_post_meta(get_the_ID(),'ero_latestid',true);
$hot = get_post_meta(get_the_ID(),'ero_hot',true);
?>
<article class="stylenine" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
	<div class="bsx">
		<div class="thumb">
			<a href="<?php echo get_permalink($epid); ?>" itemprop="url" title="<?php echo get_the_title($epid); ?>" class="tip" rel="<?php the_ID(); ?>">
				<?php if($hot=='Yes') { ?><div class="hotbadge"><i class="fas fa-fire-alt"></i></div><?php } ?>
				<?php if ( $epid && has_post_thumbnail($epid) ) { echo get_the_post_thumbnail($epid,'thumbnail',array('itemprop'=>'image','title'=>get_the_title($epid))); } else { the_post_thumbnail('',array('itemprop'=>'image','title'=>get_the_title($epid))); } ?>
			</a>
		</div>
		<div class="inf">
				<h2 itemprop="headline"><a href="<?php echo get_permalink($epid); ?>" itemprop="url" title="<?php echo get_the_title($epid); ?>"><?php echo get_the_title($epid); ?></a></h2>
				<span><?php echo GOV_lang::get('series_info_posted_on_label');?> <?php echo get_the_date('F j, Y',$epid); ?> <?php echo get_the_time('g:i a',$epid); ?>, <?php echo GOV_lang::get('episode_page_posted_by_label'); ?> <?php $author_id = get_post_field( 'post_author', $epid ); echo get_the_author_meta('display_name', $author_id); ?></span>
				<span><?php echo GOV_lang::get('home_latest_release_stylenine');?> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
			</div>
	</div>
</article>