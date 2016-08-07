<?php

abstract class PageController {

	protected $title;
	protected $metaDesc;
	protected $dbc;
	protected $plates;
	protected $data = [];

	public function __construct() {

		$this->plates = new League\Plates\Engine('app/templates');
	
	}

	abstract public function buildHTML();

}