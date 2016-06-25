<?php

Class Event
{
	private $world;

	private $map;

	public function __construct(&$world, &$map)
	{
		$this->world = $world;
		$this->map = $map;
	}

	public function run()
	{
		if (method_exists($this, $_POST['action'])) {
			$args = $_POST;
			$action = $_POST['action'];
			unset($_POST['action']);
			call_user_func(array($this, $_POST['action']), $args);
			return true;
		}
		return false;
	}
}