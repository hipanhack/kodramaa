<?php 
$ep = get_post_meta(get_the_ID(),'ero_latest',true);
$epid = get_post_meta(get_the_ID(),'ero_latestid',true);
if(!is_home()){$epid = get_the_ID();}
$status = get_post_meta(get_the_ID(),'ero_status',true);
$type = get_post_meta(get_the_ID(),'ero_type',true);
$sub = get_post_meta($epid,'ero_subepisode',true);
if($sub=='' || $sub=='None'){
	$sub = get_post_meta(get_the_ID(),'ero_sub',true);
	$subln = rwmb_the_value('ero_sub','',get_the_ID(),false);
} else {
	$subln = rwmb_the_value('ero_subepisode','',$epid,false);
	if($subln==''){ $sub = 'Sub'; $subln = 'Sub'; }
}
$hot = get_post_meta(get_the_ID(),'ero_hot',true);
?>
<article class="bs styletere" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
	<div class="bsx">
		<a href="<?php echo get_permalink($epid); ?>" title="<?php echo get_the_title($epid); ?>">
		<div class="tt"><?php the_title(); ?></div>
		<div class="limit">
			<?php if($hot=='Yes') { ?><div class="hotbadge"><i class="fas fa-fire-alt"></i></div><?php } ?>
			<div class="typez <?php echo $type; ?>"><?php rwmb_the_value('ero_type'); ?></div>
			<div class="ply"><i class="far fa-play-circle"></i></div>
			<?php if(get_option('removesub')=='1'){ ?>
			<div class="bt">
				<span class="sb<?php echo ' '.$sub; ?>"><?php echo $subln; ?></span>
			</div>
			<?php } ?>
			<?php if ( $epid && has_post_thumbnail($epid) ) { echo get_the_post_thumbnail($epid,'thumbnail',array('itemprop'=>'image','title'=>get_the_title($epid))); } else { the_post_thumbnail('',array('itemprop'=>'image','title'=>get_the_title($epid))); } ?>
		</div>
		<div class="epdate">
				<h2 itemprop="headline"><?php echo get_the_title($epid); ?></h2>
				<?php if($type=='Movie'){ ?><span class="epx"><?php echo $type; ?></span><?php } else if($ep) { ?><span class="epx"><?php echo GOV_lang::get('search_ep_label').' '.$ep; ?></span><?php } ?>
				<span class="datex"><?php echo human_time_diff( get_the_time('U',$epid), current_time('timestamp') ) . GOV_lang::get('home_timeago_label'); ?></span>
		</div>
		</a>
	</div>
</article>