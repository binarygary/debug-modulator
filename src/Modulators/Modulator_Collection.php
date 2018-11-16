<?php

namespace Modulator\Modulators;

class Modulator_Collection {

	protected $modulators = [];

	public function __construct( Modulator ...$modulators ) {
		foreach ( $modulators as $modulator ) {
			$this->add( $modulator );
		}
	}

	public function add( Modulator $modulator ) {
		$this->modulators[ $modulator->slug() ] = $modulator;
	}

	public function process_errors( $errors ) {
		foreach ( $this->modulators as $modulator ) {
			$modulator->store( $errors );
		}
	}

}