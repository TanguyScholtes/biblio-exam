<?php

namespace Models;


class Book extends Model
{
	private $table = 'books';
	function __construct(){
		parent::__construct($this->table);
	}

	function authors($id)
	{
		$sql = 'SELECT *, authors.id as author_id
				FROM authors
				JOIN author_book ON authors.id = author_id
				JOIN books ON book_id = books.id
				WHERE books.id = :book_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':book_id' => $id]);
		return $pds->fetchAll();
	}

	function genre($id)
	{
		$sql = 'SELECT genres.id as genre_id, genres.name as genre_name
				FROM genres
				LEFT JOIN books
				ON books.genre_id = genres.id
				WHERE books.id = :book_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':book_id' => $id]);
		return $pds->fetch();
	}

	function editor($id)
	{
		$sql = 'SELECT editors.id as editor_id, editors.name as editor_name
				FROM editors
				LEFT JOIN books
				ON books.editor_id = editors.id
				WHERE books.id = :book_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':book_id' => $id]);
		return $pds->fetch();
	}

	function language($id)
	{
		$sql = 'SELECT languages.id as language_id, languages.full_name as language_name
				FROM languages
				LEFT JOIN books
				ON books.language_id = languages.id
				WHERE books.id = :book_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':book_id' => $id]);
		return $pds->fetch();
	}

	function location($id)
	{
		$sql = 'SELECT locations.id as location_id, locations.name as location_name
				FROM locations
				LEFT JOIN books
				ON books.location_id = locations.id
				WHERE books.id = :book_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':book_id' => $id]);
		return $pds->fetch();
	}

	function update($datas)
	{
		var_dump($datas);
		$sql = 'UPDATE %s SET title = :title,
							  summary = :summary,
							  front_cover = :front_cover,
							  slug = :slug,
							  location_id = :location,
							  language_id = :language,
							  genre_id = :genre,
							  isbn = :isbn,
							  npages = :npages,
							  editor_id = :editor
			    WHERE id = :book_id';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);
		$inputs = [
					':book_id' => $datas['book_id'],
					':title' => $datas['title'],
					':slug' => $datas['slug'],
					':summary' => $datas['summary'],
					':front_cover' => $datas['front_cover'],
					':location' => $datas['location'],
					':language' => $datas['language'],
					':genre' => $datas['genre'],
					':isbn' => $datas['isbn'],
					':npages' => $datas['npages'],
					':editor' => $datas['editor']
				  ];
		$pds->execute($inputs);
	}

	function attachAuthors($book_id, $author_id)
	{
		$sql = 'INSERT INTO author_book (author_id, book_id) VALUES (:author_id, :book_id)';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':author_id' => $author_id, ':book_id' => $book_id]);
	}

	function detachAuthors($book_id, $author_id)
	{
		$sql = 'DELETE FROM author_book WHERE author_id=:author_id AND book_id=:book_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':author_id' => $author_id, ':book_id' => $book_id]);
	}

	function resetAuthors($book_id)
	{
		$sql = 'DELETE FROM author_book WHERE book_id=:book_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':book_id' => $book_id]);
	}

	function authorHasBook($id, $authors)
	{
		$sql = 'SELECT *
				FROM author_book
				WHERE author_id = :author_id
				AND book_id = :book_id';
		foreach ($authors as $author_id)
		{
			$pds = $this->cx->prepare($sql);
			$pds->execute(['author_id' => $author_id, ':book_id' => $id]);

			if (!$pds->fetch())
			{
				$book->attachAuthors(intval($book_id), $authors);
			}
			else
			{
				$book->detachAuthors(intval($book_id), $authors);
			}
		}
	}

	function deleteBook($book_id)
	{
		$sql = 'DELETE FROM books WHERE id=:book_id';
		$pds = $this->cx->prepare($sql);
		$pds->execute([':book_id' => $book_id]);
	}

	function create($datas)
	{
		$sql = 'INSERT INTO books (
									`id` ,
									`title` ,
									`slug` ,
									`front_cover` ,
									`summary` ,
									`isbn` ,
									`npages` ,
									`datepub` ,
									`language_id` ,
									`genre_id` ,
									`location_id` ,
									`editor_id` ,
									`created_at` ,
									`updated_at`
								   )
				VALUES (
						NULL ,
						:title,
						:slug,
						:front_cover,
						:summary,
						:isbn,
						:npages,
						:datepub,
						:language_id,
						:genre_id,
						:location_id,
						:editor_id,
						CURRENT_TIMESTAMP ,
						CURRENT_TIMESTAMP
						)';
		$sql = sprintf($sql, $this->table);
		$pds = $this->cx->prepare($sql);
		$inputs = [
					':title' => $datas['title'],
					':slug' => $datas['slug'],
					':datepub' => $datas['datepub'],
					':summary' => $datas['summary'],
					':front_cover' => $datas['front_cover'],
					':location_id' => $datas['location'],
					':language_id' => $datas['language'],
					':genre_id' => $datas['genre'],
					':isbn' => $datas['isbn'],
					':npages' => $datas['npages'],
					':editor_id' => $datas['editor']
				  ];
		$pds->execute($inputs);
	}

}
