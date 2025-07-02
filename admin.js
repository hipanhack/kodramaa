jQuery(".themesia-panel ul.nav-tabs li").on('click', function(){
	jQuery(".themesia-panel ul.nav-tabs li").removeClass("active");
	jQuery(".tab-pane").removeClass("active");
	var id = jQuery(this).find("a");
	id = id.attr("href");
	jQuery(id).addClass('active');
	jQuery(this).addClass('active');
	return false;
});

