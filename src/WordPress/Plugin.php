<?php

namespace Modulator\WordPress;

/**
 * Class Plugin
 * On plugin activate/deactivate we handle moving the ../../debug-modulator-mu.php file to
 * mu-plugins.
 *
 * @package Modulator\Plugin
 */
class Plugin {

	const MU_FILE_NAME = 'debug-modulator-mu.php';

	protected $file;

	public function __construct( $file ) {
		$this->file = $file;
	}

	public function installed() {
		return function_exists( 'debug_modulator_startup' );
	}

	public function install() {
		$mu_file        = sprintf( '%s/%s', dirname( $this->file ), self::MU_FILE_NAME );
		$mu_destination = sprintf( '%s/%s', WPMU_PLUGIN_DIR, self::MU_FILE_NAME );

		copy( $mu_file, $mu_destination );
	}

	public function hooks() {

	}


}