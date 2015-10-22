<?php
/**
 * Theme Functions
 *
 * @package Flux
 * @author Indonez
 * @link http://indonez.com
 */

require_once ('admin/index.php');

define('FUNCTIONS_PATH', get_template_directory() . '/functions/' );

require_once (FUNCTIONS_PATH.'post-types.php');
require_once (FUNCTIONS_PATH.'metaboxes.php');
require_once (FUNCTIONS_PATH.'theme-functions.php');
require_once (FUNCTIONS_PATH.'theme-widgets.php');
require_once (FUNCTIONS_PATH.'activation-plugin.php');
?>