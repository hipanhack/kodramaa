function ts_extract_epls(){
    var li = $(".eplister ul li");
	if (li.length < 1) return [];
    var data = [];
    li.each(function(k, v){
        v = jQuery(v);
        var tmp = {};
        tmp.episode = v.find('.epl-num').text();
        tmp.title = v.find('.epl-title').text();
        tmp.link = v.find("a").get(0).href;
        data.push(tmp);
    });
    return data;
}
function ts_set_first_ep(){
	var e = jQuery('.epcur.epcurfirst');
	if (e.length < 1) return;
	var v = ts_extract_epls();
	if (v.length < 1) return;
	if (v.length < 2) {
		jQuery('.lastend').hide();
		return;
	}
	v = v.pop();
	e.parent().attr('href', v.link);
	e.html('Episode ' + v.episode);
}
function loadMi(el){
	if (el.value.length < 1) return false;
	el.value&&(document.getElementById('pembed').innerHTML=atob(el.value));
	document.querySelector(".mirror>option").setAttribute('disabled', 'disabled');
	return true;
}
function getSiteLogo(){
	var el = jQuery(".logos img[itemprop]");
	if (el.length < 1) return false; 
	return el.attr('src');
}
function updateFooterLogo(){
	var newSrc = getSiteLogo();
	var theElement = jQuery(".footer-logo img"); 
	if (theElement.length < 1) return false; 
	if (newSrc == theElement.attr('src')) return true;
	if ( ! newSrc) return false;
	theElement.attr('src', newSrc);
}