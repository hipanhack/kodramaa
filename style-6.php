<?php 
$ep = get_post_meta(get_the_ID(),'ero_latest',true);
$epid = get_post_meta(get_the_ID(),'ero_latestid',true);
$type = get_post_meta(get_the_ID(),'ero_type',true);
$score = get_post_meta(get_the_ID(),'ero_skor',true);
$hot = get_post_meta(get_the_ID(),'ero_hot',true);
?>
<article class="stylesix" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
	<div class="bsx">
		<div class="thumb">
			<a href="<?php echo get_permalink($epid); ?>" itemprop="url" title="<?php echo get_the_title($epid); ?>" class="tip" rel="<?php the_ID(); ?>">
				<?php if($hot=='Yes') { ?><div class="hotbadge"><i class="fas fa-fire-alt"></i></div><?php } ?>
				<div class="typez <?php echo $type; ?>"><?php rwmb_the_value('ero_type'); ?></div>
				<?php the_post_thumbnail('',array('itemprop'=>'image','title'=>get_the_title($epid))); ?>
				<div class="bt">
					<span class="epx"><?php if($type=='Movie'){ ?><?php rwmb_the_value('ero_type'); ?><?php } else if($ep) { ?><?php echo GOV_lang::get('search_ep_label').' '.$ep; ?><?php } ?></span>
				</div>
			</a>
		</div>
		<div class="inf">
				<h2 itemprop="headline"><a href="<?php echo get_permalink($epid); ?>" itemprop="url" title="<?php echo get_the_title($epid); ?>"><?php echo get_the_title($epid); ?></a></h2>
				<ul>
				<li><b><?php echo GOV_lang::get('series_info_status_label');?>:</b> <?php echo get_post_meta(get_the_ID(),'ero_status',true); ?></li>
				<li><b><?php echo GOV_lang::get('series_info_posted_by_label')?>:</b> <?php $author_id = get_post_field( 'post_author', $epid ); echo get_the_author_meta('display_name', $author_id); ?></li>
				<li><b><?php echo GOV_lang::get('series_info_posted_on_label');?>:</b> <?php echo human_time_diff( get_the_time('U',$epid), current_time('timestamp') ) . GOV_lang::get('home_timeago_label'); ?></li>
				<li><b><?php echo GOV_lang::get('home_latest_release_stylesix');?>:</b> <a href="<?php the_permalink(); ?>" class="tip" rel="<?php the_ID(); ?>"><?php the_title(); ?></a></li>
				<?php echo get_the_term_list( get_the_ID(), 'genres', '<li><b>'. GOV_lang::get('series_info_genres_label').':</b> ', ', ', '</li>' ); ?>
				</ul>
		</div>
		<?php if($score){ ?>
		<div class="upscore">
			<span class="scrt"><?php echo GOV_lang::get('home_latest_release_score_label'); ?></span>
			<span class="scr"><?php echo $score; ?></span>
		</div>
		<?php } ?>
	</div>
</article>