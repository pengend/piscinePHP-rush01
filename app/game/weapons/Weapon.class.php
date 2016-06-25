<?php

namespace Game;

use \System as System;

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
		$this->_shortRange = (array)$weapon->short_range;
		$this->_mediumRange = (array)$weapon->medium_range;
		$this->_longRange = (array)$weapon->long_range;
	}

	public function jsonDump()
	{
		$dump = '{';
		$dump .= System::jsonDump('name', $this->_name);
		$dump .= System::jsonDump('power', $this->_power);
		$dump .= System::jsonDump('short_range', $this->_shortRange);
		$dump .= System::jsonDump('medium_range', $this->_mediumRange);
		$dump .= System::jsonDump('long_range', $this->_longRange);
		$dump = rtrim($dump, ',');
		$dump .= '}';
		return $dump;
	}
}