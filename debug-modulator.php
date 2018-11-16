<?php

/*
Plugin Name: Debug Modulator
Description: Splash debug logs for each request in unique ways.
Version:     1.0.0
*/

require_once 'vendor/autoload.php';

$plugin = new Modulator\WordPress\Plugin( __FILE__ );

register_activation_hook( __FILE__, function () use ( $plugin ) {
	$plugin->install();
} );

register_deactivation_hook( __FILE__, function () use ( $plugin ) {

} );

if ( ! $plugin->installed() ) {
	$plugin->install();
}

$plugin->hooks();