<?php

namespace SpaceShip;

require_once __DIR__ .'/../SpaceShip.class.php';

Class HandOfTheEmperor extends \Game\SpaceShip
{
	public function	__construct()
	{
		parent::__construct(['name' => get_class()]);
	}

	public function	__destruct()	{ return ;}

}
