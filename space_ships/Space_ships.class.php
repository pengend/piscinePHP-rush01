<?php
	Class Space_ships
	{
		public function	__construct()	{ return ;}
		public function	__destruct()	{ return ;}
		public static $arr = array();

		public function create_ship($who)
		{
			if (method_exists(get_class($who), "size"))
				self::$arr[get_class($who)] = new $who;
		}
	}
?>
