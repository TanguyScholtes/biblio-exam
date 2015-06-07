<?php

namespace Models;

class Model
{
	protected $cx = null;
	private $table = '';

	function __construct($table)
	{
		global $options;
		$this->table = $table;

		//-------Connexion à la BDD-------//
		try
		{
			$this->cx = new \PDO(DSN, USERNAME, PASSWORD, $options);
			$this->cx -> query('SET CHARACTER SET UTF8');
			$this->cx -> query('SET NAMES UTF8');
		}
		catch(\PDOException $e) 	//Si try échoue
		{
			die($e -> getMessage()); 	//utiliser message d'erreur de PDO à la place des erreurs
		}
	}

	function all()
	{
		$sql = 'SELECT * from %s';
		return $this->cx -> query(sprintf($sql, $this->table)); 	//retourne un résultat de type PDOStatement que l'on peut parcourir avec une boucle
	}

	function find($id)
	{
		$sql = 'SELECT * FROM %s WHERE id = :id';
		$pds = $this->cx -> prepare(sprintf($sql, $this->table));
		$pds -> execute([':id' => $id]); 
		return $pds -> fetch();
	}
}