<?php
	include_once('ISpace_ship.class.php');

	class Hunter implements ISpace_ship
	{
		public	$infos;
		public function	__construct($kwargs)
		{
			$ship = array(
				'name' => $this->name(),
				'size' => $this->size($kwargs['size_x'], $kwargs['size_y']),
				// 'coque' => ,
				// 'pp' => ,
				// 'speed' => ,
				// 'man' => ,
				// 'shield' => ,
				// 'weapon' => ,
			);
			$this->infos = $ship;
			return;
		}
		public function	__destruct()	{ return ;}

		public function	name()
		{
			return (get_class($this));
		}

		public function	size($size_x, $size_y)
		{
			$x = 0;
			while ($x < $size_x * 150)
			{
				$y = 0;
				while ($y < $size_y)
				{
					$s_size[$x + $y] = $this->name();
					$y++;
				}
				$x += 150;
			}
			return ($s_size);
		}

		public function destruct() { return TRUE; }
	}
?>
