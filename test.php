<?php
	include('Map.class.php');
	$map = new Map();
	$dp_map = $map->gen_map();
	$sect_map = $map->gen_sectors($dp_map);

	var_dump($sect_map);
	// foreach ($sect_map as $x)
	// {
	// 	foreach ($x as $y)
	// 	{
	// 		foreach ($y as $sector_x)
	// 		{
	// 			foreach ($sector_x as $sector_y)
	// 			{
	// 				print($sector_y);
	// 				print("\n");
	// 			}
	// 		}
	// 	}
	// }
?>
