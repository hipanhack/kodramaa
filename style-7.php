<?php
$type = get_post_meta(get_the_ID(),'ero_type',true);
$ep = get_post_meta(get_the_ID(),'ero_latest',true);
$epid = get_post_meta(get_the_ID(),'ero_latestid',true);
$sub = get_post_meta($epid,'ero_subepisode',true);
if($sub=='' || $sub=='None'){
	$sub = get_post_meta(get_the_ID(),'ero_sub',true);
	$subln = rwmb_the_value('ero_sub','',get_the_ID(),false);
} else {
	$subln = rwmb_the_value('ero_subepisode','',$epid,false);
	if($subln==''){ $sub = 'Sub'; $subln = 'Sub'; }
}
$episodes = get_post_meta( get_the_ID(), 'ero_episode', true ); if($episodes==''){ $episodes = '?'; }
$status = rwmb_the_value('ero_status','',get_the_ID(),false);
$hot = get_post_meta(get_the_ID(),'ero_hot',true);
?>
<article class="seventh" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
	<div class="main-seven">
		<a href="<?php echo get_permalink($epid); ?>" itemprop="url" title="<?php echo get_the_title($epid); ?>">
		<div class="limit">
			<?php if($hot=='Yes') { ?><div class="hotbadge"><i class="fas fa-fire-alt"></i></div><?php } ?>
			<?php if ( $epid && has_post_thumbnail($epid) ) { echo get_the_post_thumbnail($epid,'thumbnail',array('itemprop'=>'image','title'=>get_the_title($epid))); } else { the_post_thumbnail('',array('itemprop'=>'image','title'=>get_the_title($epid))); } ?>
			<?php if($type!=='Movie'){ if($ep){ echo '<div class="epin">'.$ep.'/'.$episodes.'</div>'; } } ?>
			<div class="bt">
				<?php if(get_option('removesub')=='1'){ ?><span class="sb <?php echo $sub; ?>"><?php echo $subln; ?></span><?php } ?>
				<span class="type <?php echo $type; ?>"><?php rwmb_the_value('ero_type'); ?></span>
			</div>
		</div>
		</a>
			<div class="tt">
				<div class="thethumb"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a></div>
				<div class="sosev">
					<h2 itemprop="headline"><a href="<?php echo get_permalink($epid); ?>" itemprop="url" title="<?php echo get_the_title($epid); ?>"><?php echo get_the_title($epid); ?></a></h2>
					<span><a href="<?php the_permalink(); ?>" itemprop="url" title="<?php the_title(); ?>" class="tip" rel="<?php the_ID(); ?>"><?php the_title(); ?></a></span>
					<span><?php echo $status; ?> · <?php echo human_time_diff( get_the_time('U',$epid), current_time('timestamp') ) . GOV_lang::get('home_timeago_label'); ?></span>
				</div>
			</div>
	</div>
</article>