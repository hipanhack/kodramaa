<?php
if(get_option('relatedepisode')=='1'){
	$previous = get_previous_post(true);
	$next = get_next_post(true);
	$seri = get_post_meta(get_the_ID(), 'ero_seri', true);
	if ($next||$previous){
		echo '<div class="bixbox"><div class="releases"><h3>'.GOV_lang::get('related_episodes').'</h3></div><div class="listupd">';
		if($previous){ ?>
			<div class="stylefiv">
				<div class="bsx">
					<div class="thumb">
						<a href="<?php echo get_permalink($previous); ?>" title="<?php echo get_the_title($previous); ?>">
							<?php if ( has_post_thumbnail($previous) ) { echo get_the_post_thumbnail($previous); } else { echo get_the_post_thumbnail($seri); } ?>
						</a>
					</div>
					<div class="inf">
						<h2><a href="<?php echo get_permalink($previous); ?>" title="<?php echo get_the_title($previous); ?>"><?php echo get_the_title($previous); ?></a></h2>
						<span><i class="far fa-user"></i> <?php echo GOV_lang::get('episode_page_posted_by_label'); ?>: <?php $author_id = get_post_field( 'post_author', $previous ); echo get_the_author_meta('display_name', $author_id); ?></span>
						<span><i class="far fa-calendar-alt"></i> <?php echo GOV_lang::get('series_info_posted_on_label');?>: <?php echo human_time_diff( get_the_time('U',$previous), current_time('timestamp') ) . GOV_lang::get('home_timeago_label'); ?></span>
					</div>
				</div>
			</div>
		<?php }
		if($next){ ?>
			<div class="stylefiv">
				<div class="bsx">
					<div class="thumb">
						<a href="<?php echo get_permalink($next); ?>" title="<?php echo get_the_title($next); ?>">
							<?php if ( has_post_thumbnail($next) ) { echo get_the_post_thumbnail($next); } else { echo get_the_post_thumbnail($seri); } ?>
						</a>
					</div>
					<div class="inf">
						<h2><a href="<?php echo get_permalink($next); ?>" title="<?php echo get_the_title($next); ?>"><?php echo get_the_title($next); ?></a></h2>
						<span><i class="far fa-user"></i> <?php echo GOV_lang::get('episode_page_posted_by_label'); ?>: <?php $author_id = get_post_field( 'post_author', $next ); echo get_the_author_meta('display_name', $author_id); ?></span>
						<span><i class="far fa-calendar-alt"></i> <?php echo GOV_lang::get('series_info_posted_on_label');?>: <?php echo human_time_diff( get_the_time('U',$next), current_time('timestamp') ) . GOV_lang::get('home_timeago_label'); ?></span>
					</div>
				</div>
			</div>
		<?php }
		echo '</div></div>';
	}
}
?>