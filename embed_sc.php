<?php
function mp4upload_sc( $atts ) {
    extract( shortcode_atts( array (
        'id' => ''
    ), $atts ) );
    return <<<MP4UPLOAD
<iframe src="https://mp4upload.com/embed-{$id}.html" FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO WIDTH="100%" HEIGHT="100%" allowfullscreen="true"></iframe>
MP4UPLOAD;
}
add_shortcode ('mp4upload', 'mp4upload_sc' );

function yourupload_sc( $atts ) {
    extract( shortcode_atts( array (
        'id' => ''
    ), $atts ) );
    return <<<YOURUPLOAD
<IFRAME SRC="https://www.yourupload.com/embed/{$id}" allowfullscreen="true" FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO WIDTH=100% HEIGHT=100%></IFRAME>
YOURUPLOAD;
}
add_shortcode ('yourupload', 'yourupload_sc' );

function acefile_sc( $atts ) {
    extract( shortcode_atts( array (
        'id' => ''
    ), $atts ) );
return <<<ACEFILE
<iframe src="//acefile.co/player/{$id}/" scrolling="no" frameborder="0" width="100%" height="100%" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
ACEFILE;
}
add_shortcode ('acefile', 'acefile_sc' );

function mirrorace_sc( $atts ) {
    extract( shortcode_atts( array (
        'id' => ''
    ), $atts ) );
return <<<MIRRORACE
<iframe src="https://mirrorace.com/m/embed/{$id}" scrolling="no" frameborder="0" width="100%" height="100%" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
MIRRORACE;
}
add_shortcode ('mirrorace', 'mirrorace_sc' );

function fembed_sd( $atts ) {
    extract( shortcode_atts( array (
        'id' => ''
    ), $atts ) );
return <<<FEMBED
<iframe width="100%" height="100%" src="https://www.fembed.com/v/{$id}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
FEMBED;
}
add_shortcode ('fembed', 'fembed_sd' );

function cloudvideo_sd( $atts ) {
    extract( shortcode_atts( array (
        'id' => ''
    ), $atts ) );
return <<<CLOUDVIDEO
<iframe width="100%" height="100%" src="https://cloudvideo.tv/embed-{$id}.html" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
CLOUDVIDEO;
}
add_shortcode ('cloudvideo', 'cloudvideo_sd' );

function youtube_sd( $atts ) {
    extract( shortcode_atts( array (
        'id' => ''
    ), $atts ) );
return <<<YOUTUBE
<iframe width="100%" height="100%" src="https://www.youtube.com/embed/{$id}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
YOUTUBE;
}
add_shortcode ('youtube', 'youtube_sd' );
?>