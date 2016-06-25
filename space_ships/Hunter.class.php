<?php
	include_once('ISpace_ship.class.php');

	class Hunter implements ISpace_ship
	{
		/***********************************************************************
		** Vars
		***********************************************************************/
		private	$_type;
		private	$_name;
		private	$_size;
		private	$_shell;
		private	$_pp;
		private	$_speed;
		private	$_maneuver;
		private	$_shield;
		private	$_weapon;

		CONST	SIZE_X = 2;
		CONST	SIZE_Y = 5;
		CONST	PP = 5;
		CONST	SPEED = 5;
		CONST	MANEUVER = 5;
		CONST	SHELL = 5;
		CONST	SHIELD = 5;
		CONST	WEAPON = 5;

		/***********************************************************************
		** Accessor and mutator
		***********************************************************************/
		public function type_r()		{ return $this->_type; }
		public function name_r()		{ return $this->_name; }
		public function size_r()		{ return $this->_size; }
		public function shell_r()		{ return $this->_shell; }
		public function pp_r()			{ return $this->_pp; }
		public function speed_r()		{ return $this->_speed; }
		public function maneuver_r()	{ return $this->_maneuver; }
		public function shield_r()		{ return $this->_shield; }
		public function weapon_r()		{ return $this->_weapon; }

		public function type_w($val)		{ $_type = $val; }
		public function name_w($val)		{ $_name = $val; }
		public function size_w($val)		{ $_size = $val; }
		public function shell_w($val)		{ $_shell = $val; }
		public function pp_w($val)			{ $_pp = $val; }
		public function speed_w($val)		{ $_speed = $val; }
		public function maneuver_w($val)	{ $_maneuver = $val; }
		public function shield_w($val)		{ $_shield = $val; }
		public function weapon_w($val)		{ $_weapon = $val; }

		/***********************************************************************
		** Constructor and Destructor
		***********************************************************************/
		public function	__construct($kwargs)
		{
			$this->type_w(get_class($this));
			$this->name_w($kwargs['name']);
			$this->size_w($this->size(self::SIZE_X, self::SIZE_Y));
			$this->shell_w(self::SHELL);
			$this->pp_w(self::PP);
			$this->speed_w(self::SPEED);
			$this->maneuver_w(self::MANEUVER);
			$this->shield_w(self::SHIELD);
			$this->weapon_w(self::WEAPON);
			return;
		}
		public function	__destruct()	{ return ;}


		public function	size($size_x, $size_y)
		{
			$x = 0;
			while ($x < $size_x * 150)
			{
				$y = 0;
				while ($y < $size_y)
				{
					$s_size[$x + $y] = $this->type_r();
					$y++;
				}
				$x += 150;
			}
			return ($s_size);
		}

	}
?>
