<?php 
$seriesid = get_post_meta(get_the_ID(),'ero_seri',true);
$ep = get_post_meta(get_the_ID(),'ero_episodebaru',true);
$type = get_post_meta($seriesid,'ero_type',true);
$sub = get_post_meta(get_the_ID(),'ero_subepisode',true);
if($sub=='' || $sub=='None'){
	$sub = get_post_meta($seriesid,'ero_sub',true);
	$subln = rwmb_the_value('ero_sub','',$seriesid,false);
} else {
	$subln = rwmb_the_value('ero_subepisode','',get_the_ID(),false);
	if($subln==''){ $sub = 'Sub'; $subln = 'Sub'; }
}
?>
<div class="bs">
	<div class="bsx">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<div class="limit">
			<div class="typez <?php echo $type; ?>"><?php echo $type; ?></div>
			<div class="ply"><i class="far fa-play-circle"></i></div>
			<div class="bt">
				<span class="epx"><?php if($type=='Movie'){ ?><?php echo $type; ?><?php } else { ?><?php echo GOV_lang::get('search_ep_label').' '.$ep; ?><?php } ?></span>
				<span class="sb<?php echo ' '.$sub; ?>"><?php echo $subln; ?></span>
			</div>
			<?php echo get_the_post_thumbnail($seriesid); ?>
		</div>
				<div class="tt">
					<?php echo get_the_title($seriesid); ?>
				</div>
		</a>
	</div>
</div>