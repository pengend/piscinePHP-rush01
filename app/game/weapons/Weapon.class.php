<?php

namespace Game;

Abstract Class Weapon
{
	protected $_name;

	protected $_power;

	protected $_pp;

	protected $_shortRange;

	protected $_mediumRange;

	protected $_longRange;

	public function __construct($kwargs)
	{
		$reflect = new \ReflectionClass($kwargs['name']);
		$weapon_name = $reflect->getShortName();
		$path = '/'.$weapon_name.'/'.$weapon_name.'.json';
		$weapon = \FileMenager::decode(__DIR__.$path);
		$this->_name = $weapon->name;
		$this->_power = $weapon->power;
		$this->_shortRange = $weapon->range;
		$this->_mediumRange = $weapon->medium_range;
		$this->_longRange = $weapon->long_range;
	}
}