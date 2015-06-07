<?php

namespace Models;


class Language extends Model
{
	private $table = 'languages';
	function __construct(){
		parent::__construct($this->table);
	}

}