<?php
/*
RoVidX HTML5 Video Pro - Embed Page Template
*/

	$options = get_option('rovidx_settings_videoplayer');
	$embedparam = $options["embedparam"];
	$embed = $options["embed"];
	if ($embed == 'on') {
		$embedvar_r = 'true';
	} else {
		$embedvar_r = 'false';
	}
	
	$advar = $options["preroll"];
	if ($advar == 'on') {
		$advar_r = 'true';
	} else {
		$advar_r = 'false';
	}
	
	$vidID = $_GET[$embedparam];
	
	if ($embed = "on") {
		$post = get_post($options["embedpage"]);
		$slug = $post->post_name;
	}
	
	$fsvar = $options["fullscreen"];
	if ($fsvar == 'on') {
		$fsvar_r = 'true';		
		} else {
		$fsvar_r = 'false';			
		}
		
	$rcvar = $options["rcmenu"];
	if ($rcvar == 'on') {
		$rcvar_r = 'true';		
		} else {
		$rcvar_r = 'false';			
		}
		
	$rsvar = $options["restart"];
	if ($rsvar == 'on') {
		$rsvar_r = 'true';		
		} else {
		$rsvar_r = 'false';			
		}
	
	$apvar = $options["autoplay"];
	if ($apvar == 'on') {
		$apvar_r = 'true';
		} else {
		$apvar_r = 'false';			
		}
	
	$ahvar = $options["autohide"];
	if ($ahvar == 'on') {
		$ahvar_r = '0';
		} else {
		$ahvar_r = '1';			
		}
	$shvar = $options["share"];
	if ($shvar == 'on') {
		$shvar_r = 'true';		
		} else {
		$shvar_r = 'false';			
		}
	$wmvar = $options["logo_enable"];
	if ($wmvar == 'on') {
		$wmvar_r = 'true';		
		} else {
		$wmvar_r = 'false';			
		}
	$prvar = $options["preroll"];
	if ($prvar == 'on') {
		$prvar_r = 'true';
	} else {
		$prvar_r = 'false';
		}
	$puvar = $options["popup"];
	if ($puvar == 'on') {
		$puvar_r = 'true';
	} else {
		$puvar_r = 'false';
		}
	
	$qry = new WP_Query(array(
		'p' => $vidID
		));
	
	if ($qry->have_posts()) {
        while ($qry->have_posts()) {
            $qry->the_post();
	
ob_start(); ?>  
<html>
<head>
<!--<script type="text/javascript">
if(location.href == top.location.href){ 
window.location.replace("../?p=<?php echo $vidID; ?>");
}
</script>-->
	<title><?php echo get_the_title(); ?></title>
	<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/<?php echo get_template(); ?>/embeder/css/videoPlayerMain.css" type="text/css">
  	<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/<?php echo get_template(); ?>/embeder/css/videoPlayer.theme1.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
	<script src="<?php echo site_url(); ?>/wp-content/themes/<?php echo get_template(); ?>/embeder/js/IScroll4Custom.js" type="text/javascript"></script>
	<script src='<?php echo site_url(); ?>/wp-content/themes/<?php echo get_template(); ?>/embeder/js/THREEx.FullScreen.js'></script>
	<script src="<?php echo site_url(); ?>/wp-content/themes/<?php echo get_template(); ?>/embeder/js/videoPlayer.js" type="text/javascript"></script>
	<script src="<?php echo site_url(); ?>/wp-content/themes/<?php echo get_template(); ?>/embeder/js/Playlist.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function($)
	  {
		  var wa = $(document).height();;
		  console.log(wa);
	      videoPlayer = $("#video").Video({
	          autoplay:<?php echo $apvar_r;
			  $w = $options["w"];
			  $h = $options["h"];
			   ?>,
    	      autohideControls:<?php echo $ahvar_r; ?>,
        	  videoPlayerWidth:<?php echo $w; ?>,
	          videoPlayerHeight:<?php echo $h; ?>,
    	      posterImg:"<?php echo rovidx_featured_img_url(array($w,$h)); ?>",
       		  fullscreen_native:<?php echo $fsvar_r; ?>,
	          fullscreen_browser:false,
    	      rightClickMenu:<?php echo $rcvar_r; ?>, 
    	      restartOnFinish:<?php echo $rsvar_r; ?>,
        	  spaceKeyActive:true,
			  share:[{
        	      show:<?php echo $shvar_r; ?>,
            	  facebookLink:"https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>",
	              twitterLink:"https://twitter.com/intent/tweet?source=webclient&text=<?php echo get_the_permalink(); ?>",
        	      youtubeLink:"http://youtube.com/bunkertelevision",
				  pinterestLink:"http://pinterest.com/pin/create/bookmarklet/?media=<?php echo rovidx_featured_img_url('full'); ?>&url=<?php echo get_the_permalink(); ?>&description=<?php echo get_the_excerpt(); ?>",
	              linkedinLink:"http://www.linkedin.com/cws/share?url=<?php echo get_the_permalink(); ?>&original_referer=<?php echo get_the_permalink(); ?>",
	              googlePlusLink:"https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>",
    	          deliciousLink:"https://delicious.com/post?url=<?php echo get_the_permalink(); ?>",
        	      mailLink:"mailto:"
	          }],
    	      logo:[{
        	      show:<?php echo $wmvar_r; ?>,
            	  clickable:true,
	              path:"<?php echo $options["logo_path"]; ?>",
	              goToLink:"http://conspiracyhq.tv",
	              position:"top-right"
	          }],
    	      embed:[{
        	      show:<?php echo $embedvar_r; ?>,
            	  embedCode:'<iframe src="<?php echo site_url() . "/" . $slug . "/?" . $embedparam . "=" . $vidID; ?>" width="720" height="400" scrolling="no" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'
	          }],
    	      videos:[{
       	          id:0,
           	      title:"<?php echo get_the_title(); ?>",
               	  mp4:"<?php $mykey_values = get_post_custom_values('rovidx_vurl'); 
						 foreach ($mykey_values as $key => $value) {
                echo "$value";
            }?>",
			info:"<?php echo get_the_excerpt();?>",				  
               
				  popupAdvertisementShow:<?php echo $puvar_r; ?>,
                  popupAdvertisementClickable:true,
                  popupAdvertisementPath:"<?php echo $options["popup_img"]; ?>",
                  popupAdvertisementGotoLink:"<?php echo $options["popup_link"]; ?>",
                  popupAdvertisementStartTime:"<?php echo $options["popup_start"]; ?>",
                  popupAdvertisementEndTime:"<?php echo $options["popup_stop"]; ?>",
				  			  
				  videoAdvertisementShow:<?php echo $advar_r; ?>,
                  videoAdvertisementClickable:true,
                  videoAdvertisementGotoLink:"<?php echo $options["preroll_vid"]; ?>",
                  videoAdvertisement_mp4:"<?php echo $options["preroll_link"]; ?>"
	
<?php //} ?>
              }]
      });
  });
    </script>
</head>
	<body marginheight="0" marginwidth="0">
		<div id="video" align="center"></div>       
	</body>
</html>
<?php
}}
		$fullEmbed = ob_get_contents();
        ob_end_clean();
		echo $fullEmbed;
		echo $embed;
        
?>
