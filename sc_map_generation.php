<?php
	session_start();
	include_once('Map.class.php');

	include_once('space_entities/Obstacles.class.php');
	include_once('space_entities/Space_entity.class.php');
	include_once('space_entities/Asteroid.class.php');
	include_once('space_entities/Station.class.php');

	include_once('space_ships/ISpace_ship.class.php');
	include_once('space_ships/Space_ships.class.php');
	include_once('space_ships/Hunter.class.php');

	function	ft_map_generation()
	{
		/*******************************************************************
		** Map Generation
		*******************************************************************/
		$map = new Map();
		$map_arr = $map->gen_map();
		/*	Obstacles and spaces entities	*/
			$space_entity = new Space_entity();
			$astero = new Asteroid();
			$station = new Station();
			for ($i = 0; $i < 10; $i++)
			{
				if ($i < 2)
				{
					$to_add = $station->size(rand(0, 14999));
					$map_arr = $map->add_to_map($to_add);
				}
				$to_add = $astero->size(rand(0, 14999));
				$map_arr = $map->add_to_map($to_add);
			}

		/*******************************************************************
		** Player_Blue ships
		*******************************************************************/
			$space_ships = new Space_ships();
			$hunter = new Hunter(array('name' => 'Big Boat Destructor'));
			$map_arr = $map->place_ship($hunter, 151);
			print("HELLO");


		/*******************************************************************
		** Display map
		*******************************************************************/
		return ($map_arr);
	}
?>
