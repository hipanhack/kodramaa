<?php 
$ep = get_post_meta(get_the_ID(),'ero_latest',true);
$epid = get_post_meta(get_the_ID(),'ero_latestid',true);
$hot = get_post_meta(get_the_ID(),'ero_hot',true);
?>
<article class="stylefiv" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
	<div class="bsx">
		<div class="thumb">
			<a href="<?php echo get_permalink($epid); ?>" itemprop="url" title="<?php echo get_the_title($epid); ?>" class="tip" rel="<?php the_ID(); ?>">
				<?php if($hot=='Yes') { ?><div class="hotbadge"><i class="fas fa-fire-alt"></i></div><?php } ?>
				<?php if ( $epid && has_post_thumbnail($epid) ) { echo get_the_post_thumbnail($epid,'thumbnail',array('itemprop'=>'image','title'=>get_the_title($epid))); } else { the_post_thumbnail('',array('itemprop'=>'image','title'=>get_the_title($epid))); } ?>
			</a>
		</div>
		<div class="inf">
				<h2 itemprop="headline"><a href="<?php echo get_permalink($epid); ?>" itemprop="url" title="<?php echo get_the_title($epid); ?>"><?php echo get_the_title($epid); ?></a></h2>
				<span><i class="far fa-user" aria-hidden="true"></i> <?php echo GOV_lang::get('episode_page_posted_by_label'); ?>: <?php $author_id = get_post_field( 'post_author', $epid ); echo get_the_author_meta('display_name', $author_id); ?></span>
				<span><i class="far fa-calendar-alt" aria-hidden="true"></i> <?php echo GOV_lang::get('series_info_posted_on_label');?>: <?php echo human_time_diff( get_the_time('U',$epid), current_time('timestamp') ) . GOV_lang::get('home_timeago_label'); ?></span>
			</div>
	</div>
</article>