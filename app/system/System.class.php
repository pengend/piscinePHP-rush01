<?php

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

	public static function jsonArray($array)
	{
		$dump = '{';
		foreach ($array as $key => $value) {
			$dump .= '"'.$key.'"'.':';
			if (is_object($value)) {
				$dump .= $value->jsonDump();
			} else if (is_array($value)) {
				$dump .= self::jsonDump($key, $value);
			} else {
				$dump .= '"'.$value.'"';
			}
			$dump .= ',';
		}
		$dump = rtrim($dump, ',');
		$dump .= '}';
		return $dump;
	}

	public static function jsonDump($key, $var, $in_array = 0)
	{
		$var = is_array($var) ? self::jsonArray($var) : '"'.$var.'"';
		$dump = '"'.$key.'":'.$var;
		$dump = !$in_array ? $dump.',' : '{'.$dump.'}';
		return ($dump);
	}
}