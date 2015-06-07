<?php

namespace Models;


class Editor extends Model
{
	private $table = 'editors';
	function __construct(){
		parent::__construct($this->table);
	}

	function editor($id)
	{
		$sql = 'SELECT *, editors.id as editor_id
				FROM editors
				JOIN books ON editor_id = editors.id
				WHERE editors.id = :editor_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':editor_id' => $id]);
		return $pds->fetchAll();
	}

	function update($datas)
	{
		var_dump($datas);
		$sql = 'UPDATE %s SET name = :name,
							  website = :website,
							  slug = :slug,
							  logo = :logo
			    WHERE id = :editor_id';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);
		$inputs = [
					':editor_id' => $datas['editor_id'],
					':name' => $datas['name'],
					':website' => $datas['website'],
					':slug' => $datas['slug'],
					':logo' => $datas['logo']
				  ];
		$pds->execute($inputs);
	}

	function deleteEditor($editor_id)
	{
		$sql = 'DELETE FROM editors WHERE id=:editor_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':editor_id' => $editor_id]);
	}

	function create($datas)
	{
		$sql = 'INSERT INTO editor (
									`id` ,
									`name` ,
									`slug` ,
									`website` ,
									`logo` ,
									`created_at` ,
									`updated_at`
								   )
				VALUES (
						NULL ,
						:name,
						:slug,
						:website,
						:logo,
						CURRENT_TIMESTAMP ,
						CURRENT_TIMESTAMP
						)';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);
		$inputs = [
					':name' => $datas['name'],
					':slug' => $datas['slug'],
					':website' => $datas['website'],
					':logo' => $datas['logo']
				  ];
		$pds->execute($inputs);
	}

}