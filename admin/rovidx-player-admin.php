<?php
function roVideoPlayerMenu()
{
	add_submenu_page('rovidx-options', 'HTML5 Video Pro', 'HTML5 Video Pro', 'manage_options', 'rovplayer', 'rovidx_video_lite_addon_page');
}
add_action('admin_menu', 'roVideoPlayerMenu');
function rovidx_video_lite_addon_page()
{
	$options = get_option('rovidx_settings_videoplayer');
	$license = get_option('rovidx_player_license_key');
	$status = get_option('rovidx_player_license_status');
	$autoplay = $options["autoplay"];
	$autohide = $options["autohide"];
	$fullscreen = $options["fullscreen"];
	$rcmenu = $options["rcmenu"];
	$restart = $options["restart"];
	$share = $options["share"];
	$logo_enable = $options["logo_enable"];
	$logo_path = $options["logo_path"];
	$preroll = $options["preroll"];
	$preroll_vid = $options["preroll_vid"];
	$preroll_link = $options["preroll_link"];
	$popup = $options["popup"];
	$popup_img = $options["popup_img"];
	$popup_link = $options["popup_link"];
	$popup_start = $options["popup_start"];
	$popup_stop = $options["popup_stop"];
	$embed = $options["embed"];
	$embedpage = $options["embedpage"];
	$embedparam = $options["embedparam"];
	$theme = $options["player_theme"];
?>

<div class="wrap">
<h1>RoVidX HTML5 Video Pro Controls</h1>
<hr />
<div style="width: 45%; float:left;">
  <form id="rovidxform" method="post" action="options.php">
    <?php
	settings_fields('rovidx_settings_videoplayer_group');
	do_settings_sections('rovidx_settings_videoplayer_group');
?>
    <h3>
      <?php
	_e('Maximum Dimensions'); ?>
    </h3>
    <input type="text" name="rovidx_settings_videoplayer[w]" value="<?php
	echo $options['w'] ?>" size="4">
    Max Width
    </input>
    <input type="text" name="rovidx_settings_videoplayer[h]" value="<?php
	echo $options["h"]; ?>" size="4">
    Max Height
    </input>
    <br />
    <hr />
    <h3>
      <?php
	_e('Shortcode Dimensions'); ?>
    </h3>
    <input type="text" name="rovidx_settings_videoplayer[ws]" value="<?php
	echo $options['ws'] ?>" size="4">
    Max Width
    </input>
    <input type="text" name="rovidx_settings_videoplayer[hs]" value="<?php
	echo $options["hs"]; ?>" size="4">
    Max Height
    </input>
    <br />
    <?php
	wp_dropdown_pages(array(
		'depth' => 1,
		'name' => 'rovidx_settings_videoplayer[embedpage]',
		'selected' => $embedpage,
		'echo' => 1,
		'sort_order' => 'ASC',
		'sort_column' => 'post_title',
		'post_type' => 'page'
	)); ?>
    Select Player Page<br />
    <input type="text" name="rovidx_settings_videoplayer[embedparam]" value="<?php
	echo $embedparam; ?>" size="6">
    Video ID Key (?<em><strong>key</strong></em>=9999)
    </input>
    <br />
    
    <!-- <hr />

          <select name="rovidx_settings_videoplayer[player_theme]" id="rovidx_settings_videoplayer[player_theme]">

			  <option value="1" <?php // if($theme == '1') { echo '"selected="selected"'; }
	 ?>>Theme 1</option>

			  <option value="2" <?php // if($theme == '2') { echo '"selected="selected"'; }
	 ?>>Theme 2</option>

			  <option value="3" <?php // if($theme == '3') { echo '"selected="selected"'; }
	 ?>>Theme 3</option>

			  <option value="4" <?php // if($theme == '4') { echo '"selected="selected"'; }
	 ?>>Theme 4</option>

              <option value="5" <?php // if($theme == '5') { echo '"selected="selected"'; }
	 ?>>Theme 5</option>

            </select>-->
    
    <hr />
    <h3>
      <?php
	_e('Player Controls'); ?>
    </h3>
    <input type="checkbox" name="rovidx_settings_videoplayer[autoplay]" <?php
	if ($autoplay == 'on')
	{
		echo 'checked="checked"';
	} ?>>
    Autoplay Video
    </input>
    <br />
    <input type="checkbox" name="rovidx_settings_videoplayer[autohide]" <?php
	if ($autohide == 'on')
	{
		echo 'checked="checked"';
	} ?>>
    Autohide Controls
    </input>
    <br />
    <input type="checkbox" name="rovidx_settings_videoplayer[fullscreen]" <?php
	if ($fullscreen == 'on')
	{
		echo 'checked="checked"';
	} ?>>
    Allow Fullscreen
    </input>
    <br />
    <input type="checkbox" name="rovidx_settings_videoplayer[rcmenu]" <?php
	if ($rcmenu == 'on')
	{
		echo 'checked="checked"';
	} ?>>
    Right Click Menu
    </input>
    <br />
    <input type="checkbox" name="rovidx_settings_videoplayer[restart]" <?php
	if ($restart == 'on')
	{
		echo 'checked="checked"';
	} ?>>
    Restart on Video Finish
    </input>
    <br />
    <input type="checkbox" name="rovidx_settings_videoplayer[share]" <?php
	if ($share == 'on')
	{
		echo 'checked="checked"';
	} ?>>
    Enable Sharing
    </input>
    <hr />
    <h3>
      <?php
	_e('Pro Options'); ?>
    </h3>
    <input type="checkbox" name="rovidx_settings_videoplayer[embed]"   <?php
	if ($embed == 'on')
	{
		echo 'checked="checked"';
	} ?>>
    Share Embed Code
    </input>
    <br />
    <hr />
    <input type="checkbox" name="rovidx_settings_videoplayer[logo_enable]"   <?php
	if ($logo_enable == 'on')
	{
		echo 'checked="checked"';
	} ?>>
    Enable Watermark
    </input>
    <br />
    <?php
	if ($logo_enable == 'on')
	{ ?>
    <input type="url" name="rovidx_settings_videoplayer[logo_path]" value="<?php
		echo $logo_path; ?>" size="50">
    Watermark URL
    </input>
    <br />
    <?php
	} ?>
    <hr />
    <input type="checkbox" name="rovidx_settings_videoplayer[preroll]"  <?php
	if ($preroll == 'on')
	{
		echo 'checked="checked"';
	} ?>>
    Enable Preroll Advertisment
    </input>
    <br />
    <?php
	if ($preroll == 'on')
	{ ?>
    <input type="text" name="rovidx_settings_videoplayer[preroll_vid]" value="<?php
		echo $preroll_vid; ?>" size="50">
    Preroll URL
    </input>
    <br />
    <input type="text" name="rovidx_settings_videoplayer[preroll_link]" value="<?php
		echo $preroll_link; ?>" size="50">
    Preroll Link
    </input>
    <br />
    <?php
	} ?>
    <hr />
    <input type="checkbox" name="rovidx_settings_videoplayer[popup]"   <?php
	if ($popup == 'on')
	{
		echo 'checked="checked"';
	} ?>>
    Enable Popup Advertisment
    </input>
    <br />
    <?php
	if ($popup == 'on')
	{ ?>
    <br />
    <input type="url" name="rovidx_settings_videoplayer[popup_img]" value="<?php
		echo $popup_img; ?>" size="50">
    Popup Image URL
    </input>
    <br />
    <input type="text" name="rovidx_settings_videoplayer[popup_link]" value="<?php
		echo $popup_link; ?>" size="50">
    Popup Link
    </input>
    <br />
    <input type="text" name="rovidx_settings_videoplayer[popup_start]" value="<?php
		echo $popup_start; ?>" size="6">
    Popup Opens At (hh:mm:ss)
    </input>
    <br />
    <input type="text" name="rovidx_settings_videoplayer[popup_stop]" value="<?php
		echo $popup_stop; ?>" size="6">
    Popup Closes At (hh:mm:ss)
    </input>
    <br />
    <?php
	} ?>
    <hr />
    <input type="submit" class="button-primary" value="Save Options" />
  </form>
  <div><h3>Tutorial Video</h3>
  <iframe width="560" height="315" src="//www.youtube.com/embed/vCXKHEp8npM" frameborder="0" allowfullscreen></iframe>
  </div>
</div>
<div style="width: 45%; float:right"> </div>
<?php
}
function rovidx_register_videoplayer_settings()
{
	register_setting('rovidx_settings_videoplayer_group', 'rovidx_settings_videoplayer', 'rovidx_settings_videoplayer_validate');
	register_setting('rovidx_player_license', 'rovidx_player_license_key', 'rovidx_player_sanitize_license');
}
add_action('admin_init', 'rovidx_register_videoplayer_settings');
function rovidx_settings_videoplayer_validate($input)
{
	if ($input['w'] == NULL)
	{
		$input['w'] = '1920';
	}
	if ($input['h'] == NULL)
	{
		$input['h'] = '1080';
	}
	if ($input['ws'] == NULL)
	{
		$input['ws'] = '640';
	}
	if ($input['hs'] == NULL)
	{
		$input['hs'] = '360';
	}
	if ($input['autoplay'] != 'on')
	{
		$input['autoplay'] = 'off';
	}
	if ($input['autohide'] != 'on')
	{
		$input['autohide'] = 'off';
	}
	if ($input['fullscreen'] != 'on')
	{
		$input['fullscreen'] = 'off';
	}
	if ($input['rcmenu'] != 'on')
	{
		$input['rcmenu'] = 'off';
	}
	if ($input['restart'] != 'on')
	{
		$input['restart'] = 'off';
	}
	if ($input['share'] != 'on')
	{
		$input['share'] = 'off';
	}
	if ($input['logo_enable'] != 'on')
	{
		$input['logo_enable'] = 'off';
	}
	if ($input['logo_path'] == NULL)
	{
		$input['logo_path'] = 'off';

	}
	if ($input['preroll'] != 'on')
	{
		$input['preroll'] = 'off';
	}
	if ($input['preroll_vid'] == NULL)
	{
		$input['preroll_vid'] = 'http://YOURDOMAIN.COM/VIDEO';
	}
	if ($input['preroll_link'] == NULL)
	{
		$input['preroll_link'] = 'http://YOURDOMAIN.COM/LINK';
	}
	if ($input['popup'] != 'on')
	{
		$input['popup'] = 'off';
	}
	if ($input['popup_img'] == NULL)
	{
		$input['popup_img'] = 'off';
	}
	if ($input['popup_link'] == NULL)
	{
		$input['popup_link'] = 'off';
	}
	if ($input['popup_start'] == NULL)
	{
		$input['popup_start'] = 'off';
	}
	if ($input['popup_stop'] == NULL)
	{
		$input['popup_stop'] = 'off';
	}
	if ($input['embed'] != 'on')
	{
		$input['embed'] = 'off';
	}
	if ($input['embedpage'] == NULL)
	{
		$input['popup_stop'] = 'off';
	}
	if ($input['embedparam'] == NULL)
	{
		$input['embedparam'] = 'off';
	}
	if ($input['player_theme'] == NULL)
	{
		$input['player_theme'] = 'off';
	}
	return $input;
}
