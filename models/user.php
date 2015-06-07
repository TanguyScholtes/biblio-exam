<?php

namespace Models;

class User extends Model
{
	private $table = 'users';
	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function exists($email, $password)
	{
		$sql = 'SELECT COUNT(id) as count
				FROM %s
				WHERE email = :email
				AND password = :password';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);
		$pds->execute([':email' => $email, ':password' => sha1($password)]);
		$res = $pds->fetch();
		return $res['count'];
	}

}