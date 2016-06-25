<?php

namespace Entities;

class Asteroid implements \Game\IObstacles
{
	public $color;

	public function	__construct()	{ $this->color = 'grey';return ;}
	public function	__destruct()	{ return ;}

	/***********************************************************************
	** Put the Asteroid on the map, avoiding wraping
	***********************************************************************/
	public function size($base)
	{
		if ($base % 150 != 0 && ($base + 1) % 150 != 0)
		{
			$size = array(
				$base - 151 => 'A', $base - 150 => 'A', $base - 149 => 'A', $base - 1 => 'A',
				$base => 'A',
				$base + 1=> 'A', $base + 149 => 'A', $base + 150 => 'A', $base + 151 => 'A'
			);
			return ($size);
		}
		else if (($base + 1) % 150 == 0)
		{
			$size = array(
				$base - 151 => 'A', $base - 150 => 'A', $base - 1 => 'A',
				$base => 'A',
				$base + 149 => 'A', $base + 150 => 'A',
			);
			return ($size);
		}
		else if ($base % 150 == 0)
		{
			$size = array(
				$base - 150 => 'A', $base - 149 => 'A',
				$base => 'A',
				$base + 1=> 'A', $base + 150 => 'A', $base + 151 => 'A'
			);
			return ($size);
		}
		return (NULL);
	}
	public function destruct() { return TRUE; }
}
?>
