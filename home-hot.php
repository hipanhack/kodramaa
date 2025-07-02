<?php $gpt = get_option('thotupdate'); if($gpt){ $stylehot = get_option('stylehot'); if($stylehot==''){$stylehot='1';}	?>
	<?php $kln = get_option('topf'); if($kln) { ?><div class="kln"><?php echo $kln; ?></div><br/><?php } ?>
	<div class="bixbox">
		<div class="releases hothome"><h3><?php echo GOV_lang::get('home_hot_series_update_label');?></h3></div>
		<div class="listupd <?php if($stylehot=='4'){ echo 'flex'; } else { echo 'normal'; } ?>">
		<div class="excstf">
		<?php $featured = new WP_Query(array(
					"post_type"  => "anime",
					"meta_key" => "ero_hot",
					"meta_value" => "Yes",
					"orderby" => "modified",
					"showposts"     => $gpt,
					"ignore_sticky_posts" => 1,
					"no_found_rows"  => true,
					"update_post_term_cache" => false,
					"update_post_meta_cache" => false,
					"cache_results" => false
				)); while($featured->have_posts()) : $featured->the_post();
					if($stylehot=='1'){
						get_template_part('main-update'); 
					} else if($stylehot=='2'){
						get_template_part('style-2');
					} else if($stylehot=='3'){
						get_template_part('style-3');
					} else if($stylehot=='4'){
						get_template_part('style-4');
					} else if($stylehot=='5'){
						get_template_part('style-5');
					} else if($stylehot=='6'){
						get_template_part('style-6');
					} else if($stylehot=='7'){
						get_template_part('style-7');
					} else if($stylehot=='8'){
						get_template_part('style-8');
					} else if($stylehot=='9'){
						get_template_part('style-9');
					}						
				endwhile; ?>
			</div>
		</div>
	</div>
<?php } ?>	