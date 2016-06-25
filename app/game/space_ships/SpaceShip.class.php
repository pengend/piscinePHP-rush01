<?php

namespace Game;

Abstract Class SpaceShip
{
	private	$_type;
	private	$_name;
	private	$_size;
	private	$_shell;
	private	$_pp;
	private	$_speed;
	private	$_maneuver;
	private	$_shield;
	private	$_weapon;
	public $_ship_id;

	public function set($name, $value)
	{
		$this->$name = $value;
	}

	public function get($name)
	{
		return $this->$name;
	}

	public function	__construct($kwargs)
	{
		$reflect = new \ReflectionClass($kwargs['name']);
		$shipname = $reflect->getShortName();
		$path = '/'.$shipname.'/'.$shipname.'.json';
		$ship = \FileMenager::decode(__DIR__.$path);
		$this->_name = $shipname;
		$this->_type = $ship->type;
		$this->_size = $this->size($ship->x, $ship->y);
		$this->_pp = $ship->pp;
		$this->_shell = $ship->shell;
		$this->_speed = $ship->speed;
		$this->_maneuver = $ship->maneuver;
		$this->_shield = $ship->shield;
//		$this->_weapon = self::initWeapons((array)$ship->weapon);
		$this->_ship_id = \FileMenager::generateToken(12);
		return;
	}

	public function	size($size_x, $size_y)
	{
		$x = 0;
		while ($x < $size_x * 150)
		{
			$y = 0;
			while ($y < $size_y)
			{
				$s_size[$x + $y] = $this->get('_type');
				$y++;
			}
			$x += 150;
		}
		return ($s_size);
	}
}