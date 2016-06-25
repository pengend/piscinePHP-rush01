<?php

namespace Weapon;

require_once __DIR__ .'/../Weapon.class.php';

Class NavalHose extends \Game\Weapon
{
	function __construct()
	{
		parent::__construct(['name' => get_class()]);
	}
}