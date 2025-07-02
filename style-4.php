<?php 
$ep = get_post_meta(get_the_ID(),'ero_latest',true);
$epid = get_post_meta(get_the_ID(),'ero_latestid',true);
$type = get_post_meta(get_the_ID(),'ero_type',true);
$status = get_post_meta(get_the_ID(),'ero_status',true);
$hot = get_post_meta(get_the_ID(),'ero_hot',true);
?>
<article class="stylefor" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
	<div class="bsx">
		<a href="<?php echo get_permalink($epid); ?>" itemprop="url" title="<?php echo get_the_title($epid); ?>" class="tip" rel="<?php the_ID(); ?>">
		<div class="limit">
			<?php if($hot=='Yes') { ?><div class="hotbadge"><i class="fas fa-fire-alt"></i></div><?php } ?>
			<?php the_post_thumbnail('',array('itemprop'=>'image','title'=>get_the_title($epid))); ?>
			<div class="tt">
				<h2 itemprop="headline"><?php echo get_the_title($epid); ?></h2>
				<span><?php echo $status; ?> <?php if($type=='Movie'){ echo '<i>'.rwmb_the_value('ero_type','',get_the_ID(),false).'</i>'; } else if($ep) { echo '<i>'.$ep.'</i>'; } ?></span>
			</div>
		</div>
		</a>
	</div>
</article>