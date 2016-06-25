<?php
	include_once('Obstacles.class.php');

	class Station implements IObstacles
	{
		public function	__construct()	{ return ;}
		public function	__destruct()	{ return ;}

		/***********************************************************************
		** Put the Station on the map, avoiding wraping
		***********************************************************************/
		public function size($base)
		{
			if ($base % 150 != 0 && ($base + 1) % 150 != 0 && ($base + 2) % 150 != 0 && ($base + 3) % 150 != 0)
			{
				$size = array(
					$base - 300 => 'S',
					$base - 151 => 'S', $base - 150 => 'S', $base - 149 => 'S',
					$base - 3 => 'S', $base - 2 => 'S', $base - 1 => 'S',
					$base => 'S',
					$base + 1=> 'S', $base + 2=> 'S', $base + 3=> 'S',
					$base + 149 => 'S', $base + 150 => 'S', $base + 151 => 'S',
					$base + 300 => 'S'
				);
				return ($size);
			}
			else if (($base + 3) % 150 == 0)
			{
				$size = array(
					$base - 300 => 'S',
					$base - 151 => 'S', $base - 150 => 'S', $base - 149 => 'S',
					$base - 3 => 'S', $base - 2 => 'S', $base - 1 => 'S',
					$base => 'S',
					$base + 1=> 'S', $base + 2=> 'S',
					$base + 149 => 'S', $base + 150 => 'S', $base + 151 => 'S',
					$base + 300 => 'S'
				);
				return ($size);
			}
			else if (($base + 2) % 150 == 0)
			{
				$size = array(
					$base - 300 => 'S',
					$base - 151 => 'S', $base - 150 => 'S', $base - 149 => 'S',
					$base - 3 => 'S', $base - 2 => 'S', $base - 1 => 'S',
					$base => 'S',
					$base + 1=> 'S',
					$base + 149 => 'S', $base + 150 => 'S', $base + 151 => 'S',
					$base + 300 => 'S'
				);
				return ($size);
			}
			else if (($base + 1) % 150 == 0)
			{
				$size = array(
					$base - 300 => 'S',
					$base - 151 => 'S', $base - 150 => 'S',
					$base - 3 => 'S', $base - 2 => 'S', $base - 1 => 'S',
					$base => 'S',
					$base + 149 => 'S', $base + 150 => 'S',
					$base + 300 => 'S'
				);
				return ($size);
			}
			else if ($base % 150 == 0)
			{
				$size = array(
					$base - 300 => 'S',
					$base - 150 => 'S', $base - 149 => 'S',
					$base => 'S',
					$base + 1=> 'S', $base + 2=> 'S', $base + 3=> 'S',
					$base + 150 => 'S', $base + 151 => 'S',
					$base + 300 => 'S'
				);
				return ($size);
			}
			return (NULL);
		}
		public function destruct() { return TRUE; }
	}
?>
