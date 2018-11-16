<?php

namespace Modulator\Logging;

class Collector {

	protected static $_instance;
	protected $errors = [];

	public function __construct() {
		self::$_instance = $this;
	}

	public function error_handler( $errno, $message, $file = null, $line = null, $context = null ) {
		$this->errors[] = new Error( $errno, $message, $file, $line, $context );
	}

	public function shutdown_handler() {
		do_action( 'modulator/process_errors', $this->errors );
	}

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			$className       = __CLASS__;
			self::$_instance = new $className();
		}

		return self::$_instance;
	}

}