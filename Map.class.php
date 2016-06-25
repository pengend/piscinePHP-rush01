<?php
	Class Map
	{
		protected static $_map = array();
		public function __construct()	{ return; }
		public function __destruct()	{ return; }

		public function gen_map()
		{
			$this->_map = array();

			$i = 0;
			while ($i < 15000)
			{
				$this->_map[$i] = "E";
				$i++;
			}
			return ($this->_map);
		}

		public function add_to_map($arr)
		{
			$i = 0;
			while ($i < 15000)
			{
				if (!is_null($arr) && array_key_exists($i, $arr))
					$this->_map[$i] = $arr[$i];
				$i++;
			}
			return ($this->_map);
		}
// /*
		public function place_ship($ship, $base)
		{
			print_r($ship);
			print($ship->size_r());
			foreach ($ship as $ship)
			{
				foreach ($ship->size_r() as $key => $value)
				{
					print_r($key + $base);
					$this->_map[$key + $base] = $ship['name'];
				}
				print_r($value['name']);
			}
			return ($this->_map);
		}
	// */
	}
?>
