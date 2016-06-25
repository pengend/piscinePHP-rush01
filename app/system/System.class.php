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

	public function jsonDump($array)
	{
		$dump = '{';
		foreach ($array as $key => $value) {
			$dump .= '"'.$key.'"'.':';
			if (is_object($value)) {
				$dump .= $value->jsonDump();
			} if (is_array($value)) {
				$dump .= self::jsonDump($value);
			} else {
				$dump .= '"'.$value.'"';
			}
			$dump .= ',';
		}
		$dump = rtrim($dump, ',');
		$dump .= '}';
		return $dump;
	}
}