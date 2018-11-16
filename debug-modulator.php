<?php

/*
Plugin Name: Debug Modulator
Description: Splash debug logs for each request in unique ways.
Version:     1.0.0
*/

require_once 'vendor/autoload.php';

$plugin = new Modulator\WordPress\Plugin( __FILE__ );
if ( ! $plugin->installed() ) {
	$plugin->install();
}
$plugin->hooks();