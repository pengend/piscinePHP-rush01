<?php

Class App
{
    /**
     * @var System
     */
	public $system;

    /**
     * @var Gamer
     */
	public $gamer;

    /**
     * @var Map
     */
	public $map;

    /**
     * @var Map
     */
	public $event;

	/**
	 * @var Session
	 */
	public $session;

	/**
	 * @var SessionN
	 */
	public $cookies;

    /**
     * Handle function
     */

	public function handle()
	{
		$this->system = isset($_SESSION['system']) ? unserialize($_SESSION['system']) : new System($this);
		$this->game = isset($_SESSION['game']) ? unserialize($_SESSION['game']) : new Game\Game($this);
		$this->world = isset($_SESSION['world']) ? unserialize($_SESSION['world']) : new World\Map($this->gamer->players);
		$_SESSION['map'] = isset($_SESSION['map']) ? $_SESSION['map'] : $this->world->mapGeneration();
		$this->event = new Event($this->game, $this->world);
		if (isset($_POST['action'])) {
			$this->event->run();
			self::setSession();
		} else {
			require $this->system->root.'/view/game.php';
		}
		self::setSession();
	}


    /**
     * Response function
     */
	public function setSession()
	{
		$_SESSION['system'] = serialize($this->system);
		$_SESSION['game'] = serialize($this->game);
		$_SESSION['world'] = serialize($this->world);
	}
}
