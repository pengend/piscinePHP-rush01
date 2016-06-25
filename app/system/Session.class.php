<?php

Class Session
{

	private $session;

	public function set($name, $value)
	{
		$_SESSION[$name] = $value;
		$this->session = $_SESSION;
	}

	public function get($name)
	{
		$this->session = $_SESSION;
		if (isset($this->session[$name])) {
			return $this->session[$name];
		}
		return false;
	}
}