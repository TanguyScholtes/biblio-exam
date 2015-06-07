<?php

namespace Models;


	$requests = [
		'books_list' => 'SELECT * FROM books',
		'book_detail' => 'SELECT * FROM books WHERE id = :id', //:id est un "joker", du contenu non-défini que la fonction PDO prepare va pouvoir alimenter pour la sécuriser
		//'book_editor' => 'SELECT editors as editeur FROM books WHERE books.editor_id = editors.id',
		'authors_list' => 'SELECT * FROM authors',
		'editors_list' => 'SELECT * FROM editors',
		'genres_list' => 'SELECT * FROM genres'
	];