<?php
function themesia_assets() {
	wp_enqueue_style( 'style', get_stylesheet_uri(),false,'2.1.3' );
	wp_enqueue_style( 'darkstyle', get_template_directory_uri() . '/assets/css/darkmode.css',false,'2.1.3','all');
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css',false,'5.13.0','all');
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css',false,'1.0.0','all');
	if(get_option('tooltip')=='1'){wp_enqueue_style( 'qtip', get_template_directory_uri() . '/assets/css/jquery.qtip.min.css',false,'1.0.0','all');}
	if(get_option('galleryanime')=='1'){wp_enqueue_style( 'blueimp', get_template_directory_uri() . '/assets/css/blueimp-gallery.min.css',false,'2.38.0','all');}
	
	//wp_enqueue_script( 'jquery-min', get_template_directory_uri() . '/assets/js/jquery.min.js', array( 'jquery' ), '2.1.3', false );
	wp_deregister_script('jquery');
   	wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', false, '3.5.1');
   	wp_enqueue_script('jquery');
	
	if(get_option('tooltip')=='1'){wp_enqueue_script( 'qtip', get_template_directory_uri() . '/assets/js/jquery.qtip.min.js', array( 'jquery' ), '2.2.1', true );}
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '2.3.4', false );
	if(get_option('galleryanime')=='1'){wp_enqueue_script( 'blueimp', get_template_directory_uri() . '/assets/js/blueimp-gallery.min.js', array( 'jquery' ), '2.38.0', false );}
	if(get_option('homerecommend')=='1'){wp_enqueue_script( 'tabs', get_template_directory_uri() . '/assets/js/tabs.js', array( 'jquery' ), '1.0.0', false );}
	if(is_singular('post') && get_option('episodelist')=='1'){
		wp_enqueue_script( 'tsmedia', get_template_directory_uri() . '/assets/js/tsmedia.js', array( 'jquery' ), '1.0.0', false );
	}
	wp_enqueue_script( 'ts-functions', get_template_directory_uri() . '/assets/js/tsfn.js', array( 'jquery' ), '1.0.0', false );
	if(get_option('tooltip')=='1'){
		wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkg.min.js', array( 'jquery' ), '2.2.1', true );
	}
    wp_enqueue_script( 'filter', get_template_directory_uri() . '/assets/js/filter.js', array( 'jquery' ), '1.0.0', true );
	
	wp_enqueue_script( 'ts-events', get_template_directory_uri() . '/assets/js/tsevents.js', array( 'ts-functions' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'themesia_assets' );

add_action ('wp_head','themesiaHeader');
function themesiaHeader(){ ?>
<?php echo get_option('tsscriptheader'); ?>
<script>
	$(document).ready(function(){
		$(".shme").click(function(){
			$(".mm").toggleClass("shwx");
		});
		$(".expand").click(function(){
			$(".megavid").toggleClass("xp");
			$(".pd-expand").toggleClass("sxp");
		});
		$(".gnr").click(function(){
			$(".gnrx").toggleClass("shwgx");
		});
		$(".light").click(function(){
			$(".lowvid").toggleClass("highvid");
		});
		$(".colap").click(function(){
			$(".mindes").toggleClass("alldes");
		});
		$(".topmobile").click(function(){
			$(".topmobcon").toggleClass("topmobshow");
		});
	});
	</script>
<?php if(get_option('tooltip')==='1'){ ?>
<script type="text/javascript">
	$(document).ready(function()
	{
	  $('.tip').each(function(){

		var $this = $(this);
		var id = $this.attr('rel');

		$this.qtip({
		  content:{
			text: '<img src="<?php echo get_template_directory_uri(); ?>/assets/images/loading.gif" />',
			ajax:{
			  url: '<?php echo esc_url( home_url( '/' ) ); ?>wp-admin/admin-ajax.php',
			  type: 'POST', 
			  loading: false,
			  data: 'id=' + id + '&action=tooltip_action'
			}
		  },
		  show: {
			  event: 'mouseover',
			  delay: 500,
		  },
		  hide: {
			delay: 200,
			fixed: true
		  },
		  position: {
		target: 'mouse',
		adjust: { mouse: false },
			viewport: $(window)
		  }
		});
	  });
	});
	</script>
	<?php } ?>
	<script>
	var defaultTheme = "<?php echo get_option('defaulttheme'); ?>";
	</script>
	<?php $tc = get_option('themecolor'); if($tc) { ?>
		<style>
			body {background: #ededed;}
			.darkmode .bxcl ul li span.dt a{background:#30353c;}
			#main-menu,.soraddlx .sorattlx,.releases .vl,.serieslist.pop ul li.topone .limit .bw .ctr,#footer .footermenu,.bigcontent .infox .spe span:before,.commentx #submit,.naveps .nvsc a,.radiox input:checked ~ .checkmarkx,.advancedsearch button.searchz,.lista a:hover,.bxcl ul li span.dt a:hover,.bookmark,.bs .bsx .limit .typez.Drama,.hpage a,.slider:before,.darkmode .naveps .nvsc a,.darkmode .lista a,.darkmode .nav_apb a:hover,#sidebar .section ul.season li:before,#sidebar .section ul.season::-webkit-scrollbar-thumb,#sidebar .section .ongoingseries ul li a .l .fas, #sidebar .section .ongoingseries ul li a .r,.releases.latesthome,.quickfilter .filters .filter.submit button,.footer-az .az-list li a,.stylesix .bsx .upscore,.stylefor .bsx .tt span i,.soraddlx .soraurlx strong,.bxcl ul li:hover,.darkmode .quickfilter .filters .filter.submit button,.darkmode .bxcl ul li:hover,#sidebar .section .ongoingseries ul::-webkit-scrollbar-thumb,.quickfilter .filters .filter .scrollz::-webkit-scrollbar-thumb,.bxcl ul::-webkit-scrollbar-thumb,.bigcontent .infox .genxed a:hover,.lastend .inepcx a,.single-info.bixbox .infox .spe span:before,.single-info.bixbox .infox .genxed a:hover,.series-gen .nav-tabs li.active a,.naveps.bignav .nvs.nvsc a,.darkmode .naveps.bignav .nvs.nvsc a,#top-menu li a:hover,.topmobile,.comment-list .comment-body .reply a:hover{background:<?php echo $tc; ?>;}
			.pagination span.page-numbers.current,#gallery.owl-loaded .owl-dots .owl-dot.active span,.taxindex li a{background:<?php echo $tc; ?> !important;}
			.releases span,.advancedsearch button.searchz,.lista a:hover,.darkmode .lista a,.stylefor .bsx:hover,.bxcl ul li:hover,.single-info.bixbox .infox .genxed a:hover,.comment-list .comment-body .reply a {border-color:<?php echo $tc; ?>;}
			.surprise:hover {color: #FFF;background: #333;}
			a:hover,.listupd .lexa .dtl h2 a:hover,.live-search_result_container a:hover,.footer-az .az-list li a:hover,.bxcl ul li span.dt a .dashicons .darkmode #sidebar .section .serieslist ul li .leftseries span a,.stylefor a:hover,.seventh .main-seven .tt .sosev span a:hover,.stylesix .bsx .inf span a,.epl-num a,.bixbox.episodedl .epwrapper .epheader .entry-info a,.darkmode a:hover,.dlbox ul li span a,.single-info.bixbox .infox .infolimit h2,.stylenine .bsx .inf span a,.comment-list .comment-body .reply a{color:<?php echo $tc; ?>;}
			.footer-az .az-list li a:hover{color:<?php echo $tc; ?> !important;}
			.releases h1,.releases h3,#sidebar .section h4 {color:#333}
			.bs .bsx .limit .ply {background:rgba(0,0,0,0.5);}
			#main-menu ul li a:hover {text-decoration:none;color:#FFF;background:#333}
			.serieslist ul li .ctr,.bigcontent .infox .genxed a,.single-info.bixbox .infox .genxed a{color:<?php echo $tc; ?>;border-color:<?php echo $tc; ?>;}
			.darkmode .bigcontent .infox .genxed a,.darkmode .single-info.bixbox .infox .genxed a{color:#CCC}
			.darkmode .bigcontent .infox .genxed a:hover,.darkmode .single-info.bixbox .infox .genxed a:hover,.darkmode .single-info.bixbox .infox .infolimit h2{color:#FFF}
			.modex a {background: #333;}
			.modex a:hover,.stylefor .bsx .tt span i,.darkmode .naveps.bignav .nvs.nvsc a {color: #FFF;}
			.bigcontent .rt .rating,.bxcl ul li span.dt a{background: #f8f8f8;}
			.bookmark:hover{background:#1d1b26}
			.darkmode .lista a:hover{background:#333}
			@media only screen and (max-width: 800px){
				.th,.darkmode .th{background:<?php echo $tc; ?>;}
				#main-menu{background:rgba(28,28,28,.95);}
				.surprise{background:<?php echo $tc; ?>;}
			}
		</style>
	<?php } ?>
	<?php $hc = get_option('hotupdatecolor'); if($hc) { ?><style>.releases.hothome{background:<?php echo $hc; ?>;}</style><?php } ?>
	<script type='text/javascript'>
	//<![CDATA[
	$(document).ready(function(){
	   $("#shadow").css("height", $(document).height()).hide();
	   $(".light").click(function(){
		  $("#shadow").toggle();
			 if ($("#shadow").is(":hidden"))
				$(this).html("<i class='far fa-lightbulb' aria-hidden='true'></i> <span><?php echo GOV_lang::get('episode_page_turn_off_light'); ?></span>").removeClass("turnedOff");
			 else
				$(this).html("<i class='fas fa-lightbulb' aria-hidden='true'></i> <span><?php echo GOV_lang::get('episode_page_turn_on_light'); ?></span>").addClass("turnedOff");
			 });

	  });
	//]]>
	</script>
<?php }

add_action ('wp_footer','themesiaFooter');
function themesiaFooter(){ ?>
<?php if(get_option('galleryanime')=='1'){ if(is_singular('anime')){ ?>
<script>
	$('.owl-carousel').owlCarousel({
		stagePadding: 50,
		loop:true,
		margin:10,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:4
			},
			1000:{
				items:4
			}
		}
	});
	var isGalleryDragging = false;
	$("#gallery").on("mousedown touchstart", function() {
		isGalleryDragging = false;
	}).on("mousemove touchmove", function() {
		isGalleryDragging = true;
	}).on("mouseup touchend", function(event) {
		event.preventDefault();
		var wasGallerDragging = isGalleryDragging;
		isGalleryDragging = false;
		if (!wasGallerDragging) {
			event = event || window.event;
			var target = event.target || event.srcElement;
			var link = target.src ? target.parentNode : target;
			var options = { index: link, event: event };
			var links = this.getElementsByTagName('a');
			blueimp.Gallery(links, options);
		}
	});
	$("#gallery a").on("click", function(){return false;});
</script>
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
      <div class="slides"></div>
      <h3 class="title"></h3>
      <a class="prev">‹</a>
      <a class="next">›</a>
      <a class="close">×</a>
      <a class="play-pause"></a>
      <ol class="indicator"></ol>
</div>
<?php } } ?>
<?php floating(); ?>
<script>
var dmlogo1 = '<?php echo get_option('logo')?:""; ?>';
var dmlogo2 = '<?php echo get_option('logox')?:""; ?>';
jQuery("#thememode input[type='checkbox']").on('change', function(){
	var is_on = jQuery("#thememode input[type='checkbox']").prop("checked");
	if (is_on == false){
		if (dmlogo2) jQuery(".logos img").attr('src', dmlogo2);
		localStorage.setItem("thememode", "lightmode");
		jQuery("body").addClass("lightmode");
		jQuery("body").removeClass("darkmode");
	}else{
		if (dmlogo1) jQuery(".logos img").attr('src', dmlogo1);
		localStorage.setItem("thememode", "darkmode");
		jQuery("body").removeClass("lightmode");
		jQuery("body").addClass("darkmode");
	}
});
</script>
<?php echo get_option('tsscriptfooter'); ?>
<?php } 

function ts_list_mode_add_rewrite_rules(){
	add_rewrite_rule("^anime/list-mode/?$", "index.php?themesia-animelist=true", "top");
}
add_action("init", "ts_list_mode_add_rewrite_rules");

function ts_list_mode_add_var( $query_vars ) {
	$query_vars[] = "themesia-animelist";
	return $query_vars;
}
add_filter( "query_vars", "ts_list_mode_add_var" );

add_action( 'template_include', 'ts_list_mode_catch_page' );
function ts_list_mode_catch_page($original){
    if($page = get_query_var( 'themesia-animelist' )){
		remove_filter( 'wp_title', 'filter_wp_title' );
		add_filter('wp_title', function($title){
			return "List Mode - " . get_bloginfo('name');
		},99999);
		add_filter('pre_get_document_title', function($title){
			return "List Mode - " . get_bloginfo('name');
		},99999);
		$_GET['list'] = "list";
		return get_template_directory(). "/archive-anime.php";
    }
	return $original;
}