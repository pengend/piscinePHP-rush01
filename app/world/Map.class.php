<?php

namespace World;

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

	public function add_to_map($arr, $object)
	{
		$i = 0;
		while ($i < 15000)
		{
			if (!is_null($arr) && array_key_exists($i, $arr))
				$this->_map[$i] = $object->_name;
			$i++;
		}
		return ($this->_map);
	}
/*
	public function place_ship($ship, $base)
	{
		$size = $ship->get('_size');
		foreach ($size as $key => $value)
			$this->_map[$key + $base] = $ship->get('_name');
		return ($this->_map);
	}
*/

		public function place_ship($ship, $base)
		{
			$size = $ship->get('_size');
			foreach ($size as $key => $whichone)
				$this->_map[$key + $base] = $ship->get('_name');
			return ($this->_map);
		}

		public function remove_ship($ship, $base)
		{
			$size = $ship->get('_size');
			foreach ($size as $key => $whichone)
				$this->_map[$key + $base] = "E";
			return ($this->_map);
		}



	public function	mapGeneration()
	{
		/*******************************************************************
		** Map Generation
		*******************************************************************/
		$map_arr = $this->gen_map();
		/*	Obstacles and spaces entities	*/
			$space_entity = new \Entities\Space_entity();
			$astero = new \Entities\Asteroid();
			$station = new \Entities\Station();
			for ($i = 0; $i < 10; $i++)
			{
				if ($i < 2)
				{
					$to_add = $station->size(rand(0, 14999));
					$map_arr = $this->add_to_map($to_add, $station);
				}
				$to_add = $astero->size(rand(0, 14999));
				$map_arr = $this->add_to_map($to_add, $astero);
			}

		/*******************************************************************
		** Player_Blue ships
		*******************************************************************/
			$space_ships = new \SpaceShip\Hunter();
			$hunter = new \SpaceShip\Hunter(array('name' => 'Big Boat Destructor'));
			$map_arr = $this->place_ship($hunter, 151);
		/*******************************************************************
		** Display map
		*******************************************************************/
		return ($map_arr);
	}
}
?>
