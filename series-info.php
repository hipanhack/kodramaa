<?php if(get_option('seriesinfo')=='1') { $seri = get_post_meta(get_the_ID(),'ero_seri',true); $seridesc = get_post_field('post_content', $seri); ?>
<div class="single-info bixbox">
	<div class="thumb">
		<?php echo get_the_post_thumbnail($seri); ?>
	</div>
	<div class="infox">
				<div class="infolimit">
					<h2 itemprop="partOfSeries"><?php echo get_the_title($seri); ?></h2>
					<?php $meta = get_post_meta( $seri, 'ero_japanese', true ); if($meta){ ?><span class="alter"><?php echo $meta; ?></span><?php } ?>
				</div>
				<?php $score = get_post_meta( $seri, 'ero_skor', true ); ?>
				<div class="rating">
					<?php
					if(!$score || ! is_numeric($score)){ $score = '0.0';}
					$scorepros = $score * 10;
					if($score){ ?>
					<strong><?php echo GOV_lang::get('series_info_rating_label', ["rating" => $score]);?></strong>
					<div class="rating-prc">
						<div class="rtp">
							<div class="rtb"><span style="width:<?php echo $scorepros; ?>%"></span></div>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="info-content">
				<div class="spe">
					<?php $meta = rwmb_the_value('ero_status','',$seri,false); if($meta){ ?><span><b><?php echo GOV_lang::get('series_info_status_label');?>:</b> <?php echo $meta; ?></span><?php } ?>
					<?php echo get_the_term_list( $seri, 'network', '<span><b>'. GOV_lang::get('series_info_network_label') .':</b> ', ', ', '</span>' ); ?>
					<?php echo get_the_term_list( $seri, 'studio', '<span><b>'. GOV_lang::get('series_info_studio_label') .':</b> ', ', ', '</span>' ); ?>
					<?php $meta = get_post_meta( $seri, 'ero_tayang', true ); if($meta){ ?><span class="split"><b><?php echo GOV_lang::get('series_info_released_label');?>:</b> <?php echo $meta; ?></span><?php } ?>
					<?php $meta = get_post_meta( $seri, 'ero_durasi', true ); if($meta){ ?><span><b><?php echo GOV_lang::get('series_info_duration_label');?>:</b> <?php echo $meta; ?></span><?php } ?>
					<?php echo get_the_term_list( $seri, 'season', '<span><b>' . GOV_lang::get('series_info_season_label') . ':</b> ', ', ', '</span>' ); ?>
					<?php echo get_the_term_list( $seri, 'country', '<span><b>'. GOV_lang::get('series_info_country_label') .':</b> ', ', ', '</span>' ); ?>
					<?php $meta = rwmb_the_value('ero_type','',$seri,false); if($meta){ ?><span><b><?php echo GOV_lang::get('series_info_type_label');?>:</b> <?php echo $meta; ?></span><?php } ?>
					<?php $meta = get_post_meta( $seri, 'ero_episode', true ); if($meta){ ?><span><b><?php echo GOV_lang::get('series_info_total_episodes_label');?>:</b> <?php echo $meta; ?></span><?php } ?>
					<?php $meta = get_post_meta( $seri, 'ero_fansub', true ); if($meta){ ?><span class="split"><b><?php echo GOV_lang::get('series_info_fansub_label');?>:</b> <?php echo $meta; ?></span><?php } ?>
					<?php $cenxor = get_option('censorx'); if($cenxor=='1'){ $meta = rwmb_the_value('ero_censor','',$seri,false); if($meta){ ?><span><b><?php echo GOV_lang::get('series_info_censor_label');?>:</b> <?php echo $meta; ?></span><?php } } ?>
					<?php echo get_the_term_list( $seri, 'director', '<span class="split"><b>'. GOV_lang::get('series_info_director_label') .':</b> ', ', ', '</span>' ); ?>
					<?php echo get_the_term_list( $seri, 'cast', '<span class="split"><b>'. GOV_lang::get('series_info_casts_label') .':</b> ', ', ', '</span>' ); ?>
				</div>
				<?php echo get_the_term_list( $seri, 'genres', '<div class="genxed">', ' ', '</div>' ); ?>
				<?php if($seridesc){ ?>
					<div class="desc mindes">
						<?php echo $seridesc; ?>
						<span class="colap"></span>
					</div>
				<?php } ?>
				</div>
			</div>
</div>
<?php } ?>