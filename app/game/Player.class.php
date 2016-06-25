<?php

namespace Game;

use \System as System;

Class Player
{
	public $id;

	public $ships;

	public $point;

	public function __construct()
	{
		$this->id = \FileMenager::generateToken(6);
		$this->ships = [];
	}

	public function addShip(&$ship)
	{
		$this->ships[] = $ship;
	}

	public function jsonDump()
	{
		$dump = '{';
		$dump .= System::jsonDump('name', $this->id);
		$dump .= System::jsonDump('ships', $this->ships);
		$dump = rtrim($dump, ',');
		$dump .= '}';
		return $dump;
	}
}