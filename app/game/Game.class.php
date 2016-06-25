<?php

namespace Game;
	
Class Game
{
	private $system;

	public $players = [];

	private function initPlayer($config_player)
	{

	}

	private function getAvailaibleShips($source)
	{
        if (!($folder = opendir($source))) {
            return ;
        }
        while (($value = readdir($folder)) !== false) {
        	if ($value[0] != '.' && is_dir($source.'/'.$value)) {
        		$value = '\\SpaceShip\\'.$value;
        		$this->ships[] = new $value();
        	}
        }
        return $this->ships;
	}

	public function __construct(\App $app)
	{
		$this->system = $app->system;
		$this->ships = self::getAvailaibleShips( __DIR__ . '/space_ships');
	}

	public function dumpShips()
	{
		
	}

}