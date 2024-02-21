<?php
	/*
	 * Plugin Name:       Udemy Plus
	 * Plugin URI:        https://udemy.com
	 * Description:       A plugin for adding blocks to a theme.
	 * Version:           1.0.0
	 * Requires at least: 5.9
	 * Requires PHP:      7.2
	 * Author:            Carmelo Andrés
	 * Author URI:        https://carmeloandres.com/
	 * License:           GPL v2 or later
	 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
	 * Update URI:        https://carmeloandres.com/udemy-plus/
	 * Text Domain:       udemy-plus
	 * Domain Path:       /languages
	 */

	if( ! function_exists('add_action')){
		echo 'Seems like you stumbled here by accident.';
		exit;
	}

	// Setup
	define('UP_PLUGIN_DIR',plugin_dir_path(__FILE__));

	// Includes
	$rootFiles = glob(UP_PLUGIN_DIR.'includes/*.php');
	$subdirectoryFiles = glob(UP_PLUGIN_DIR.'includes/**/*.php');
	$allFiles = array_merge($rootFiles, $subdirectoryFiles);

	foreach($allFiles as $filename){
		include_once($filename);
	}

	//include(UP_PLUGIN_DIR.'includes/register-blocks.php');
	//include(UP_PLUGIN_DIR.'includes/blocks/search-form.php');
	//include(UP_PLUGIN_DIR.'includes/blocks/page-header.php');

	// Hooks
	add_action('init','up_register_blocks');
	add_action('rest_api_init','up_rest_api_init');
	add_action('wp_enqueue_scripts','up_enqueue_scripts');

	