<?php

namespace Game;

Abstract Class Weapon
{
	protected $pp;

	protected $att;

	protected $range;

	public function energyUp($value)
	{
		$this->pp = $value;
	}

	public function energyDown()
	{
		$this->pp = 0;
	}

	public function __construct($kwargs)
	{
		$reflect = new \ReflectionClass($kwargs['name']);
		$weapon_name = $reflect->getShortName();
		$path = '/'.$weapon_name.'/'.$weapon_name.'.json';
		$weapon = \FileMenager::decode(__DIR__.$path);
		$this->pp = 0;
		$this->att = $weapon->att;
		$this->range = $weapon->range;
	}
}