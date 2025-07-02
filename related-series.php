<?php 
defined("ABSPATH") || die("!");
if(get_option('relatedseries')=='1'){ 
	$metas = get_post_meta( get_the_ID(), 'ero_seri', true );
	$terms = get_the_terms( $metas , 'genres', 'string');
	$term_ids = wp_list_pluck($terms,'term_id');
	$term_ids = array_slice($term_ids, 0, 2);
	$args=array(
		'post_type' => 'anime',
		'tax_query' => array(
			array(
				'taxonomy' => 'genres',
				'field' => 'id',
				'terms' => $term_ids,
				'operator'=> 'AND'
			)),
		'post__not_in' => array($metas),
		'posts_per_page'=> 5,
		'orderby' => 'rand',
		'ignore_sticky_posts'=>1
	);
	$my_query = new wp_query( $args );
	if( $my_query->have_posts() ) { ?>
		<div class="bixbox">
				<div class="releases"><h3><span><?php echo GOV_lang::get('recommended_series');?></span></h3></div>
				<div class="listupd">
				<?php 
				while( $my_query->have_posts() ) { 
					$my_query->the_post();
					get_template_part('main');
				} 
				wp_reset_query(); ?>
				</div>
		</div>
	<?php } ?>
<?php } ?>