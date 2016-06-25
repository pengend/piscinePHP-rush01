<?php

Class Event
{
	private $game;

	private $world;

	public function __construct(&$game, &$world)
	{
		$this->game = $game;
		$this->world = $world;
	}

	public function run()
	{
		if (method_exists($this, $_POST['action'])) {
			$args = $_POST;
			unset($args['action']);
			$args = array_values($args);
			call_user_func_array(array($this, $_POST['action']), $args);
			return true;
		}
		return false;
	}

	function register_ship($shipname, $player, $base)
	{
		$shipname = '\\SpaceShip\\'.$shipname;
		$ship = new $shipname();
		$ship->_ship_id = FileMenager::generateToken(12);
		foreach ($this->game->players as $key => $value) {
			if ($value->id == $player)
				$this->game->players[$key]->addShip($ship);
		}
		$_SESSION['map'] = $this->world->place_ship($ship, $base);
		echo System::jsonArray($this->game->players);
		return ;
	}

	function destroy_session()
	{
		session_destroy();
		exit();
	}
}