<?php get_header(); ?>
<div class="postbody nosidebar">
<div class="newseason">
	<?php if (have_posts()) : ?>
	<h1><?php single_tag_title(); ?></h1>
	<div class="listseries">
	<?php while ( have_posts() ) : the_post(); $color = ['red','blue','orange','purple','pink']; shuffle($color); ?>
		<div class="card">
			<div class="card-box">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<div class="card-thumb">
					<?php the_post_thumbnail(); ?>
					<div class="card-title">
						<h2><?php the_title(); ?></h2>
						<span class="studio <?php echo $color[0]; ?>"><?php echo strip_tags(get_the_term_list( get_the_ID(), 'studio', '', ', ', '' )); ?></span>
					</div>
				</div>
				</a>
				<div class="card-info">
					<div class="card-info-top">
						<div class="stats">
							<div class="left">
								<span><?php $meta = get_post_meta( get_the_ID(), 'ero_episode', true ); if($meta){ echo $meta; } else { echo '?'; } ?> <?php echo GOV_lang::get('season_episodes_label'); ?> · <?php rwmb_the_value('ero_type'); ?></span>
								<span class="status"><?php rwmb_the_value('ero_status'); ?></span>
								<?php $meta = get_post_meta( get_the_ID(), 'ero_japanese', true ); if($meta){ echo '<span class="alternative">'.$meta.'</span>'; } ?>
							</div>
							<div class="right <?php echo $color[0]; ?>">
								<span><?php $meta = get_post_meta( get_the_ID(), 'ero_skor', true ); if($meta){ echo $meta; } else { echo '?'; } ?></span>
							</div>
						</div>
						<div class="desc">
							<?php the_content(); ?>
						</div>
					</div>
					<div class="card-info-bottom <?php echo $color[0]; ?>">
						<?php echo get_the_term_list( get_the_ID(), 'genres', '', ' ', '' ); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
	</div>	
	<?php endif; ?>
</div>
</div>
<?php get_footer(); ?>