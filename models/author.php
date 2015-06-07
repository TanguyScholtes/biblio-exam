<?php

namespace Models;

class Author extends Model
{
	private $table = 'authors';
	function __construct(){
		parent::__construct($this->table);
	}

	function books($id)
	{
		$sql = 'SELECT *, books.id as book_id
				FROM books
				JOIN author_book ON books.id = book_id
				JOIN authors ON author_id = authors.id
				WHERE authors.id = :author_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':author_id' => $id]);
		return $pds->fetchAll();
	}

	function update($datas)
	{
		var_dump($datas);
		$sql = 'UPDATE %s SET name = :name,
							  bio = :bio,
							  slug = :slug,
							  photo = :photo,
							  first_name = :first_name,
							  datebirth = :datebirth,
							  datedeath = :datedeath
			    WHERE id = :author_id';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);
		$inputs = [
					':author_id' => $datas['author_id'],
					':name' => $datas['name'],
					':bio' => $datas['bio'],
					':slug' => $datas['slug'],
					':photo' => $datas['photo'],
					':first_name' => $datas['first_name'],
					':datebirth' => $datas['datebirth'],
					':datedeath' => $datas['datedeath']
				  ];
		$pds->execute($inputs);
	}

	function detachBooks($author_id, $book_id)
	{
		$sql = 'DELETE FROM author_book WHERE author_id=:author_id AND book_id=:book_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':author_id' => $author_id, ':book_id' => $book_id]);
	}

	function deleteAuthor($author_id)
	{
		$sql = 'DELETE FROM authors WHERE id=:author_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':author_id' => $author_id]);
	}

}
