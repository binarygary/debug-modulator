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
	protected $mu_file;
	protected $mu_destination;

	public function __construct( $file ) {
		$this->file           = $file;
		$this->mu_file        = sprintf( '%s/%s', dirname( $this->file ), self::MU_FILE_NAME );
		$this->mu_destination = sprintf( '%s/%s', WPMU_PLUGIN_DIR, self::MU_FILE_NAME );
	}

	public function installed() {
		return function_exists( 'debug_modulator_startup' );
	}

	public function install() {
		copy( $this->mu_file, $this->mu_destination );
	}

	public function uninstall() {
		unlink( $this->mu_destination );
	}

	public function hooks() {

	}


}