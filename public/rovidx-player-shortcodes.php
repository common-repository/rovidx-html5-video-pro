<?php
function roVideoPlayer_shortcode($roAtts){
	$options = get_option('rovidx_settings_videoplayer');
	$wid = $options["ws"];
	$hei = $options["hs"];
	$roPID =  get_the_id();

	$roAtts = shortcode_atts( array(
 	      'w' => $wid,
 	      'h' => $hei
      ), $roAtts );
	  
	 $roEmbed = '<iframe src="'. site_url() . '/?p=' . $options['embedpage'] . '&' . $options['embedparam'] . '=' . $roPID . '" width="'.$roAtts["w"].'px" height="'.$roAtts["h"].'px"  scrolling="no" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
      return $roEmbed;
	  
	}
function roVideoPlayer_init()
{
	add_shortcode("videoplayer", "roVideoPlayer_shortcode");
}

add_action("plugins_loaded", "roVideoPlayer_init");