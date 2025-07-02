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
<article class="bs styletwo" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
	<div class="bsx">
		<a href="<?php echo get_permalink($epid); ?>" itemprop="url" title="<?php echo get_the_title($epid); ?>" class="tip" rel="<?php the_ID(); ?>">
		<div class="limit">
			<?php if($hot=='Yes') { ?><div class="hotbadge"><i class="fas fa-fire-alt"></i></div><?php } ?>
			<div class="typez <?php echo $type; ?>"><?php rwmb_the_value('ero_type'); ?></div>
			<div class="ply"><i class="far fa-play-circle"></i></div>
			<div class="bt">
				<span class="epx"><?php if($type=='Movie'){ ?><?php echo $type; ?><?php } else if($ep) { ?><?php echo GOV_lang::get('search_ep_label').' '.$ep; ?><?php } ?></span>
				<?php if(get_option('removesub')=='1'){ ?><span class="sb<?php echo ' '.$sub; ?>"><?php echo $subln; ?></span><?php } ?>
			</div>
			<?php the_post_thumbnail('',array('itemprop'=>'image','title'=>get_the_title($epid))); ?>
		</div>
			<div class="tt">
				<?php the_title(); ?>
				<h2 itemprop="headline"><?php echo get_the_title($epid); ?></h2>
			</div>
		</a>
	</div>
</article>