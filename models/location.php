<?php

namespace Models;


class Location extends Model
{
	private $table = 'locations';
	function __construct(){
		parent::__construct($this->table);
	}

}