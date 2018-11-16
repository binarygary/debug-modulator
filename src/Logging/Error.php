<?php

namespace Modulator\Logging;


class Error {

	protected $error_no;
	protected $message;
	protected $file;
	protected $line;
	protected $context;

	public function __construct( $errno, $message, $file = null, $line = null, $context = null ) {
		$this->error_no = $errno;
		$this->message  = $message;
		$this->file     = $file;
		$this->line     = $line;
		$this->context  = $context;
	}

}