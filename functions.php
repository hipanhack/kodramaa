<?php
defined("ABSPATH") || die("!");
include 'inc/core.php';
include 'inc/hook.php';
include 'embed_sc.php';

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*** widget section ***/
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
    	'name' => 'Sidebar Right',
        "id" => 'sidebar-1',
        'before_widget' => '<div class="section">',
        'after_widget' => '</div>',
        'before_title' => '<div class="releases"><h3>',
        'after_title' => '</h3></div>',
    ));
}
/*** menu section ***/
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'main' => __( 'Main Menu' ),
			'top' => __( 'Top Menu' ),
			'footer' => __( 'Footer Menu' ), 
		)
	);
}

function add_menu_attributes( $atts, $item, $args ) {
  $atts['itemprop'] = 'url';
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_attributes', 10, 3 );

function SearchFilter($query)   
{  
    if ($query->is_search)   
    {  
        $query->set('post_type', array('anime'));  
    }  
    return $query;  
}  
if( !is_admin() ){
	add_filter('pre_get_posts', 'SearchFilter'); 
}
function meks_disable_srcset( $sources ) {
    return false;
}
add_filter( 'wp_calculate_image_srcset', 'meks_disable_srcset' );
/*** thumbnail section ***/
if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
}

add_theme_support( 'title-tag' );

add_action('init','random_add_rewrite');
function random_add_rewrite() {
   global $wp;
   $wp->add_query_var('random');
   add_rewrite_rule('random/?$', 'index.php?random=1', 'top');
}

add_action('template_redirect','random_template');
function random_template() {
   if (get_query_var('random') == 1) {
           $posts = get_posts('post_type=anime&orderby=rand&numberposts=1');
           foreach($posts as $post) {
                   $link = get_permalink($post);
           }
           wp_redirect($link,307);
           exit;
   }
}

/*** title viewer section ***/
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        return add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        return update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
		if ($post->post_type != "anime") return;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return GOV_lang::get("wpb_get_post_views_label", ["count" => "0"]);
    }
    return GOV_lang::get("wpb_get_post_views_label", ["count" => $count]);
}

/*** load dashicons section ***/
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
wp_enqueue_style( 'dashicons' );
}
add_action( 'pre_get_posts', 'reorder_tax' );
function reorder_tax( $query ) {
if(!is_admin()){
    if (is_tax('genres') || is_tax('studio')):
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
    endif;
}
}
add_action( 'pre_get_posts', 'allseason_tax' );
function allseason_tax( $query ) {
if(!is_admin()){
    if (is_tax('season')):
		$query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
        $query->set( 'showposts', '500' );
    endif;
}
}
add_action( 'pre_get_posts', 'reorder_blog' );
function reorder_blog( $query ) {
if(!is_admin()){
    if (is_post_type_archive('blog')):
		$blogarchive = get_option('blogarchive');
        $query->set( 'showposts', $blogarchive );
    endif;
}
}
function resize_photon($url,$w=1000,$h=1000){
	if(strpos($url,'.wp.com/')===false) return $url;
	$url = explode('?',$url)[0];
	$w += 20;
	$h += 20;
	return $url.'?resize='.$w.','.$h;
}
function thumb_photon($id=false,$w=1000,$h=1000){
	return '<img src='.resize_photon(get_the_post_thumbnail_url($id),$w,$h)." />";
}
function slicer($awal, $akhir, $text){
		$text = explode($awal,$text);
		$text = explode($akhir, $text[1]);
		$text = $text[0];
		return $text;
}
function getBaseUrl($url) 
{
    return slicer('://','/',$url);
}
function dlbox( $atts , $content = null ) {
	ob_start();
	echo '<div class="dlbox"><ul>';
	echo '<li class="head"><span class="q"><b>'.GOV_lang::get('box_download_server').'</b></span><span class="w">'.GOV_lang::get('box_download_quality').'</span><span class="e">'.GOV_lang::get('box_download_link').'</span></li>';
	echo strip_tags(do_shortcode($content));
	echo '</ul></div>';
	$output = ob_get_clean(); return $output;
}
add_shortcode( 'dl', 'dlbox' );
// Add Shortcode
function linkdlbox( $atts ) {
	extract( shortcode_atts( array (
			's' => '',
			'q' => '',
			'l' => '',
		),
		$atts )
	);
	if($l){
		$lx = get_chdl_sc($l);
	}
	echo '<li><span class="q"><b><img src="https://www.google.com/s2/favicons?domain='.getBaseUrl($l).'" /> '.$s.'</b></span><span class="w">'.$q.'</span><span class="e"><a href="'.$lx.'" target="_blank">'.GOV_lang::get('box_download_download').'</a></span></li>';
}
add_shortcode( 'link', 'linkdlbox' );

function ddl( $atts , $content = null ) { ob_start(); ?>
<div class="soraddlx nosplitx">
<?php echo do_shortcode($content); ?>
</div>
<?php $output = ob_get_clean(); return $output; } add_shortcode( 'ddl', 'ddl' );
function ttl( $atts , $content = null ) { ?>
<div class="sorattlx"><h3><?php echo $content; ?></h3></div>
<?php } add_shortcode( 'ttl', 'ttl' );
function url( $atts , $content = null ) { ?>
<div class="soraurlx"><?php echo theme_sora_client($content); ?></div>
<?php } add_shortcode( 'url', 'url' );

function themesia_get_host_name($url = FALSE){
	if ( ! is_string($url)) return "";
	$host = parse_url($url, PHP_URL_HOST);
	if ( ! $host) return "";
	$host = str_replace(["www."], "", $host);
	return $host;
}
add_action('wp_ajax_nopriv_tooltip_action', 'ttp_function');
add_action('wp_ajax_tooltip_action', 'ttp_function');

function ttp_function(){
    include 'tooltip.php';
  exit;
}

function wpa_cpt_tags( $query ) {
    if ( $query->is_tag() && $query->is_main_query() ) {
        $query->set( 'post_type', array( 'anime' ) );
    }
}
add_action( 'pre_get_posts', 'wpa_cpt_tags' );

function breadcrumb_ts(){ if(get_option('tsbreadcrumb')=='1'){ ?>
	<div class="ts-breadcrumb bixbox">
		<ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
			<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
				<a itemprop="item" href="<?php echo site_url(); ?>/"><span itemprop="name"><?php echo GOV_lang::get('breadcrumb_home_label');?></span></a>
				<meta itemprop="position" content="1">
			</li>
			 › 
			<?php if(is_singular('anime')) { ?>
			<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
				 <a itemprop="item" href="<?php the_permalink(); ?>"><span itemprop="name"><?php the_title(); ?></span></a>
				<meta itemprop="position" content="2">
			</li>
			<?php } else { $serid = get_post_meta(get_the_id(),'ero_seri',true); ?>
			<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
				 <a itemprop="item" href="<?php echo get_permalink($serid); ?>"><span itemprop="name"><?php echo get_the_title($serid); ?></span></a>
				<meta itemprop="position" content="2">
			</li>
			 › 
			<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
				 <a itemprop="item" href="<?php the_permalink(); ?>"><span itemprop="name"><?php the_title(); ?></span></a>
				<meta itemprop="position" content="3">
			</li>
			<?php } ?>
		</ol>
	</div>	
<?php } }
function ts_get_page_slug($s){
	if ( ! is_numeric($s) && is_string($s) && strlen($s) > 0) return get_site_url() . "/" . trim($s) . "/";
	return get_permalink($s);
}