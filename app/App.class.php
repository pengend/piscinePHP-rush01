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
		$this->system = $this->session->get('system') ? $this->session->get('system') : new System($this);
		$this->game = $this->session->get('game') ? $this->session->get('game') : new Game\Game($this);
		$this->world = $this->session->get('world') ? $this->session->get('world') : new World\Map($this->gamer->players);

		$this->event = new Event($this->game, $this->world);
		$this->session->get('map') ? 0 : $this->session->set('map', $this->world->mapGeneration());

		require $this->system->root.'/view/game.php';
	}

    /**
     * Response function
     */
	public function response()
	{

	}

}
