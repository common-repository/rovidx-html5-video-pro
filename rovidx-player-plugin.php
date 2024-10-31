<?php
/**
 * Plugin Name: RoVidX HTML5 Video Pro
 * Plugin URI: http://rovidx.com/videoplayer
 * Description: HTML5 video player with Prerolls, Watermarks and Embed Sharing... Yes, it's 100% free...
 * Version: 1.0.0
 * Author: RoVidX Media Solutions
 * Author URI: http://RoVidX.com/
 * License: GPL2
 *
 */
if (!defined('WPINC'))
{
	die;
}
if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX))
{
	require_once (plugin_dir_path(__FILE__) . 'admin/rovidx-player-admin.php');

	require_once (plugin_dir_path(__FILE__) . 'admin/rovidx-player-func.php');

}
require_once (plugin_dir_path(__FILE__) . 'public/rovidx-player-embed.php');

require_once (plugin_dir_path(__FILE__) . 'public/rovidx-player-shortcodes.php');