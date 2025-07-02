<?php 
defined('ABSPATH') || die();
$target = $_POST["id"]; 
if(! is_numeric($target)) die();
GOV_cache::fragment_cache("tooltip_cache_{$target}", 3600 * 24 * 30, function() use ($target){ ?>
	<div class="tooltip">
		<div class="thumbnail"><?php echo get_the_post_thumbnail($target); ?></div>
		<div class="detail">
			<?php $score = get_post_meta( $target, 'ero_skor', true ); ?>
				<div class="rating">
					<?php
					if(!$score || ! is_numeric($score)){ $score = '0.0';}
					$scorepros = $score * 10;
					if($score){ ?>
					<strong><?php echo GOV_lang::get('series_info_rating_label', ["rating" => $score]);?></strong>
					<div class="rating-prc" itemscope="itemscope" itemprop="aggregateRating" itemtype="//schema.org/AggregateRating">
						<meta itemprop="ratingValue" content="<?php echo $score; ?>">
						<meta itemprop="worstRating" content="1">
						<meta itemprop="bestRating" content="10">
						<meta itemprop="ratingCount" content="10">
						<div class="rtp">
							<div class="rtb"><span style="width:<?php echo $scorepros; ?>%"></span></div>
						</div>
					</div>
					<?php } ?>
				</div>
			<table>
				<?php $meta = get_post_meta( $target, 'ero_type', true ); if($meta){ ?><tr><td><b><?php echo GOV_lang::get('series_info_type_label');?></b></td><td><?php echo $meta; ?></td></tr><?php } ?>
				<?php $meta = get_post_meta( $target, 'ero_status', true ); if($meta){ ?><tr><td><b><?php echo GOV_lang::get('series_info_status_label');?></b></td><td><?php echo $meta; ?></span><?php } ?>
				<?php $meta = get_post_meta( $target, 'ero_durasi', true ); if($meta){ ?><tr><td><b><?php echo GOV_lang::get('series_info_duration_label');?></b></td><td><?php echo $meta; ?></span><?php } ?>
				<?php echo get_the_term_list( $target, 'genres', '<tr><td><b>'. GOV_lang::get('series_info_genres_label').'</b></td><td>', ', ', '</td></tr>' ); ?>
				<?php echo get_the_term_list( $target, 'studio', '<tr><td><b>'. GOV_lang::get('series_info_studio_label') .'</b></td><td>', ', ', '</td></tr>' ); ?>
			</table>
			<div class="contexcerpt"><?php echo get_the_excerpt($target); ?></div>
		</div>
	</div>
<?php }); ?>