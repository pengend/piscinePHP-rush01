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
		$this->session = new Session;
		$this->system = $this->session->get('system') ? $this->session->get('system') : new System\System($this);
		$this->gamer = new Game\Game($this);
		$this->map = new World\Map($this->gamer->players);
		$this->session->set('map', $this->map->mapGeneration());
		require $this->system->root.'/view/game.php';
	}

    /**
     * Response function
     */
	public function response()
	{

	}

}