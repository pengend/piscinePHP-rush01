<?php

namespace Game;
	
Class Game
{
	private $app;

	public $players = [];

	private function initPlayer($config_player)
	{
		foreach ($config_player as $key => $value) {
			$this->players[] = new Player($value);
		}
	}

	public function __construct(\App $app)
	{
		$this->app = $app;
		self::initPlayer((array)\FileMenager::decode($app->system->root.'/app/config/players.json'));
	}

}