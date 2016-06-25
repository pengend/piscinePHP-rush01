<?php

namespace Game;

use \Weapon as Weapon;
use \System as System;

Abstract Class SpaceShip
{
	private	$_type;
	private	$_name;
	private $_x;
	private $_y;	
	private	$_size;
	private	$_shell;
	private	$_pp;
	private	$_speed;
	private	$_maneuver;
	private	$_shield;
	private	$_color;
	private	$_weapon;
	public $_ship_id;

	public function	__construct($kwargs)
	{
		$reflect = new \ReflectionClass($kwargs['name']);
		$shipname = $reflect->getShortName();
		$path = '/'.$shipname.'/'.$shipname.'.json';
		$ship = \FileMenager::decode(__DIR__.$path);
		$this->_name = $shipname;
		$this->_type = $ship->type;
		$this->_x = $ship->x;
		$this->_y = $ship->y;
		$this->_size = $this->size($ship->x, $ship->y);
		$this->_pp = $ship->pp;
		$this->_shell = $ship->shell;
		$this->_speed = $ship->speed;
		$this->_maneuver = $ship->maneuver;
		$this->_color = $ship->color;
		$this->_shield = $ship->shield;
		$this->_weapon = self::initWeapons((array)$ship->weapon);
	}

	public function set($name, $value)
	{
		$this->$name = $value;
	}

	public function get($name)
	{
		return $this->$name;
	}


	final function initWeapons($list_weapons)
	{
		foreach ($list_weapons as $key => $value) {
			$value = "Weapon\\".$value;
			$this->_weapon[] = new $value();
		}
		return $this->_weapon;
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

	public function jsonDump()
	{
		$dump = '{';
		$dump .= System::jsonDump('name', $this->_name);
		$dump .= System::jsonDump('shell', $this->_shell);
		$dump .= System::jsonDump('x', $this->_x);
		$dump .= System::jsonDump('y', $this->_y);
		$dump .= System::jsonDump('size', $this->_size);
		$dump .= System::jsonDump('pp', $this->_pp);
		$dump .= System::jsonDump('speed', $this->_speed);
		$dump .= System::jsonDump('maneuver', $this->_maneuver);
		$dump .= System::jsonDump('shield', $this->_shield);
		$dump .= System::jsonDump('ship_id', $this->_ship_id);
		$dump .= System::jsonDump('color', $this->_color);
		$dump .= System::jsonDump('weapon', $this->_weapon);
		$dump = rtrim($dump, ',');
		$dump .= '}';
		return $dump;
	}
}


















