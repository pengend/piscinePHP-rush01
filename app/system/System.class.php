<?php

namespace System;

Class System
{
	private $app;

	public $root;

	public static function d6()
	{
		return rand(1, 6);
	}

	public function __construct(\App $app)
	{
		$this->app = $app;
		$this->root = __DIR__ .'/../../';
	}
}