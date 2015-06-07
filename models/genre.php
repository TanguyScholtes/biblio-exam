<?php

namespace Models;


class Genre extends Model
{
	private $table = 'genres';
	function __construct(){
		parent::__construct($this->table);
	}

	function books($id)
	{
		$sql = 'SELECT *
				FROM books
				WHERE genre_id = :genre_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':genre_id' => $id]);
		return $pds->fetchAll();
	}

	function update($datas)
	{
		var_dump($datas);
		$sql = 'UPDATE %s SET name = :name,
							  slug = :slug,
							  logo = :logo
			    WHERE id = :genre_id';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);
		$inputs = [
					':genre_id' => $datas['genre_id'],
					':name' => $datas['name'],
					':slug' => $datas['slug'],
					':logo' => $datas['logo']
				  ];
		$pds->execute($inputs);
	}

	function deleteGenre($genre_id)
	{
		$sql = 'DELETE FROM genres WHERE id=:genre_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':genre_id' => $genre_id]);
	}

	function create($datas)
	{
		$sql = 'INSERT INTO genres (
									`id` ,
									`name` ,
									`slug` ,
									`logo` ,
									`created_at` ,
									`updated_at`
								   )
				VALUES (
						NULL ,
						:name,
						:slug,
						:logo,
						CURRENT_TIMESTAMP ,
						CURRENT_TIMESTAMP
						)';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);
		$inputs = [
					':name' => $datas['name'],
					':slug' => $datas['slug'],
					':logo' => $datas['logo']
				  ];
		$pds->execute($inputs);
	}


}