<?php $kln = get_option('tople'); if($kln) { ?><div class="kln"><?php echo $kln; ?></div><br/><?php } ?>
<?php $gpt = get_option('tlatestepisode'); if($gpt){ ?>
<div class="bixbox">
	<?php 
	if (have_posts()) : 
	$style = get_option('stylelatest');
	if($style==''){$style='1';}	
	?>
	<div class="releases latesthome"><h3><?php echo GOV_lang::get('home_latest_release_label');?></h3><a class="vl" href="<?php bloginfo('url'); ?>/anime/?status=&type=&order=update"><?php echo GOV_lang::get('view_all_label');?></a></div>
	<div class="listupd <?php if($style=='4'){ echo 'flex'; } else { echo 'normal'; } ?>">
		<div class="excstf">
		<?php									
			$paged = get_query_var("paged")?:1;
			$paged = intval($paged);
			if ($paged < 1) $paged = 1;
			$main = $wp_query;
			while($main->have_posts()) : $main->the_post(); 
				if($style=='1'){
					get_template_part('main-update'); 
				} else if($style=='2'){
					get_template_part('style-2');
				} else if($style=='3'){
					get_template_part('style-3');
				} else if($style=='4'){
					get_template_part('style-4');
				} else if($style=='5'){
					get_template_part('style-5');
				} else if($style=='6'){
					get_template_part('style-6');
				} else if($style=='7'){
					get_template_part('style-7');
				} else if($style=='8'){
					get_template_part('style-8');
				} else if($style=='9'){
					get_template_part('style-9');
				}
			endwhile; ?>
		</div>
		<div class="hpage">
			<?php if( ($main->post_count && $paged>1) || ($main->post_count < 1 && $paged>1) ){ ?>
					<a href="<?php echo get_site_url()?>/page/<?php echo $paged-1; ?>/" class="l"><i class="fas fa-angle-left" aria-hidden="true"></i> <?php echo GOV_lang::get('previous');?></a>
				<?php } ?>
				<?php if($main->post_count>=$gpt){ ?>
					<a href="<?php echo get_site_url()?>/page/<?php echo $paged+1; ?>/" class="r"><?php echo GOV_lang::get('next');?> <i class="fas fa-angle-right" aria-hidden="true"></i></a>
			<?php } ?>
		</div>
	</div>
	 <?php endif; ?>
</div>
<?php } ?>