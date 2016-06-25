<?php

namespace Entities;

Class Space_entity
{
	public function	__construct()	{ return ;}
	public function	__destruct()	{ return ;}
	public static $arr = array();

	public function create_entity($who)
	{
		if (method_exists(get_class($who), "size"))
			self::$arr[get_class($who)] = new $who;
	}
}
?>
