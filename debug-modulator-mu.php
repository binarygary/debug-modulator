<?php

require WP_PLUGIN_DIR . '/debug-modulator/src/Logging/Collector.php';

function debug_modulator_startup() {
	$collector = new \Modulator\Logging\Collector();
	add_action( 'plugins_loaded', function() use ($collector) {
		set_error_handler( [ $collector, 'error_handler' ] );
	} ) ;
	register_shutdown_function( [ $collector, 'shutdown_handler'] );
}
debug_modulator_startup();