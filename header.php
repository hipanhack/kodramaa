<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width" />
<?php $metac = get_option('themecolor'); if($metac==''){$metac='#0c70de';} ?>
<meta name="theme-color" content="<?php echo $metac; ?>">
<meta name="msapplication-navbutton-color" content="<?php echo $metac; ?>">
<meta name="apple-mobile-web-app-status-bar-style" content="<?php echo $metac; ?>">



<?php wp_head(); ?>
	
</head>
<body class="<?php echo get_option('defaulttheme'); ?>" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<script>
			if (localStorage.getItem("thememode") == null){
				if (defaultTheme == "lightmode"){
					jQuery("body").addClass("lightmode");
					jQuery("body").removeClass("darkmode");
				}else{
					jQuery("body").addClass("darkmode");
					jQuery("body").removeClass("lightmode");
				}
			}else if (localStorage.getItem("thememode") == "lightmode"){
				jQuery("body").addClass("lightmode");
				jQuery("body").removeClass("darkmode");
			}else{
				jQuery("body").addClass("darkmode");
				jQuery("body").removeClass("lightmode");
			}
	</script>
<div id='shadow'></div>
<div class="th">
	<div class="centernav bound">
<div class="shme"><i class="fa fa-bars" aria-hidden="true"></i></div>
<header class="mainheader" role="banner" itemscope itemtype="http://schema.org/WPHeader">
<div class="site-branding logox">
<?php
$topmenu = wp_nav_menu( array( 'theme_location' => 'top','fallback_cb' => '','echo' => '0' ) );
$logo = get_option('logo'); 
$lightlogo = get_option('logox');
if($logo) { if(is_home()){ ?>
		<h1 class="logos">
			<a title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?>" itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img itemprop="image" src="<?php echo $logo; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?>"><span class="hdl"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?></span></a>
		</h1>
		<?php } else { ?>
		<span class="logos">
			<a title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?>" itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img itemprop="image" src="<?php echo $logo; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?>"><span class="hdl"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?></span></a>
		</span>
		<?php } } ?>
		<meta itemprop="name" content="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
	</div>
</header>
<div class="searchx<?php if($topmenu){echo ' topcon';}?>">
 		<form action="<?php bloginfo('url'); ?>/" id="form" method="get" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">
			<meta itemprop="target" content="<?php bloginfo('url'); ?>/?s={query}"/>
  			<input id="s" itemprop="query-input" class="search-live" type="text" placeholder="<?php echo GOV_lang::get('search_placeholder_label');?>" name="s"/>
			<button type="submit" id="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
 		</form>
	</div>
	<div id="thememode">
			<label class="switch">
			  <input type="checkbox">
			  <span class="slider round"></span>
			</label>
		</div>
		<script>
			if (localStorage.getItem("thememode") == null){
				if (defaultTheme == "lightmode"){
					jQuery(".logos img").attr('src', '<?php echo $lightlogo; ?>');
					jQuery("#thememode input[type='checkbox']").prop('checked', false);
				}else{
					jQuery(".logos img").attr('src', '<?php echo $logo; ?>');
					jQuery("#thememode input[type='checkbox']").prop('checked', true);
				}
			}else if (localStorage.getItem("thememode") == "lightmode"){
				jQuery(".logos img").attr('src', '<?php echo $lightlogo; ?>');
				jQuery("#thememode input[type='checkbox']").prop('checked', false);
			}else{
				jQuery(".logos img").attr('src', '<?php echo $logo; ?>');
				jQuery("#thememode input[type='checkbox']").prop('checked', true);
			}
		</script>
		<?php if($topmenu){ echo '<span class="topmobile"><i class="fa fa-th-large" aria-hidden="true"></i></span><div id="top-menu" class="topmobcon">'.$topmenu.'</div>'; } ?>
	</div>
	</div>
<nav id="main-menu" class="mm">
<div class="centernav">
<div class="bound">
<span itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
<?php 
	$nav_menu = wp_nav_menu(array('theme_location'=>'main', 'container'=>'', 'link_before'=>'<span itemprop="name">','link_after'=>'</span>','fallback_cb' => '', 'echo' => 0)); 
		if(empty($nav_menu))
			$nav_menu = '<ul>'.wp_list_categories(array('show_option_all'=>__('Home', 'dp'), 'title_li'=>'', 'echo'=>0)).'</ul>';
		echo $nav_menu;
?>
</span>
<a href="<?php bloginfo('url'); ?>/random" class="surprise"><i class="far fa-star" aria-hidden="true"></i> <?php echo GOV_lang::get('surprise_me_label');?></a>
<div class="clear"></div>
</div>
</div>
</nav>
<?php if(is_home()){ $kln = get_option('toprec'); if($kln) { ?><div class="blox mlb kln"><?php echo $kln; ?></div><br/><?php } } ?>

<div id="content">
	<div class="wrapper">
		<?php $ann = get_option('anngeneral'); if($ann) { ?><div class="announ"><?php echo $ann; ?></div><?php } ?>