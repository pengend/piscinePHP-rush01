<?php
	include_once('Obstacles.class.php');

	class Asteroid implements IObstacles
	{
		public function	__construct()	{ return ;}
		public function	__destruct()	{ return ;}

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
