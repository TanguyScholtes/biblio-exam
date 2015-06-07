<?php

namespace Controllers;


class BookController extends BaseController
{

	function index()
	{
		$book = new \Models\Book;
		$data = $book->all();
		$view = 'bookIndex.php';
		return [
			'view' => $view,
			'data' => $data
			];
	}


	function show()
	{
		if (isset($_GET['book_id']))
		{
			$id = intval($_GET['book_id']);
			$book = new \Models\Book;
			$data = $book->find($id);
			$data['authors'] = $book-> authors($id);
			$data['genre'] = $book-> genre($id);
			$data['location'] = $book-> location($id);
			$data['language'] = $book-> language($id);
			$data['editor'] = $book-> editor($id);
		}
		else
		{
			die('il manque book_id');
		}

		$view = 'bookShow.php';

		return [
				'view' => $view,
				'data' => $data
				];
	}

	function edit()
	{
		if (!$_SESSION['valid'])
		{
			header('Location: index.php');
		}
		if (isset($_GET['book_id']))
		{
			$id = intval($_GET['book_id']);
			$book = new \Models\Book;
			$author = new \Models\Author;
			$data = $book->find($id);

				$genre = new \Models\Genre;
				$language = new \Models\Language;
				$editor = new \Models\Editor;
				$location = new \Models\Location;

			$data['authors'] = $book->authors($id);
			$data['allAuthors'] = $author->all();

				$data['genre'] = $book->genre($id);
				$data['allGenres'] = $genre->all();
				$data['language'] = $book->language($id);
				$data['allLanguages'] = $language->all();
				$data['editor'] = $book->editor($id);
				$data['allEditors'] = $editor->all();
				$data['location'] = $book->location($id);
				$data['allLocations'] = $location->all();


			$view = 'bookedit.php';
		}
		else
		{
			die('il manque book_id');
		}
		return [
				'data' => $data,
				'view' => $view
				];
	}

	function update()
	{
		if (!$_SESSION['valid'] || $_SERVER['REQUEST_METHOD'] !== 'POST')
		{
			header('Location: index.php');
		}
		$book = new \Models\Book;
		extract($_POST);

		//-------Traitement de l'image-------//
		$front_cover = '';

		if ($_FILES['front_cover']['error'] !== UPLOAD_ERR_NO_FILE)
		{
			$fp = new \FilesProcessor;
			$front_cover = $fp->save($_FILES['front_cover']);

		}
		else
		{
			$theBook = $book->find($book_id);
			$front_cover = $theBook['front_cover'];
		}

		$book->update(compact('book_id', 'title', 'summary', 'front_cover', 'genre', 'language', 'location', 'isbn', 'npages', 'editor', 'slug'));
		$book->resetAuthors($theBook['id']);

		foreach ($authors as $author)
		{
			$book->attachAuthors($theBook['id'], $author);
		}

		header('Location: index.php?a=show&m=book&book_id=' . $book_id);

	}

	function delete()
	{
		if (!$_SESSION['valid'])
		{
			header('Location: index.php');
		}
		if (isset($_GET['book_id']))
		{
			$id = intval($_GET['book_id']);
			$book = new \Models\Book;
			$author = new \Models\Author;
			$data = $book->find($id);
			$data['authors'] = $book->authors($id);

			foreach ($data['authors'] as $author)
			{
				$book->detachAuthors($id, $author);
			}
			$book->deleteBook($id);

			$view = 'bookDelete.php';
		}
		else
		{
			die('il manque book_id');
		}
		return [
				'data' => $data,
				'view' => $view
				];

	}

	function create()
	{
		if (!$_SESSION['valid'])
		{
			header('Location: index.php');
		}

		$book = new \Models\Book;
		$author = new \Models\Author;
		$data = [];

			$genre = new \Models\Genre;
			$language = new \Models\Language;
			$editor = new \Models\Editor;
			$location = new \Models\Location;

		$data['allAuthors'] = $author->all();

			$data['allGenres'] = $genre->all();
			$data['allLanguages'] = $language->all();
			$data['allEditors'] = $editor->all();
			$data['allLocations'] = $location->all();


		$view = 'bookCreate.php';
		
		return [
				'data' => $data,
				'view' => $view
				];
	}

	function validate()
	{
		if (!$_SESSION['valid'] || $_SERVER['REQUEST_METHOD'] !== 'POST')
		{
			header('Location: index.php');
		}
		$book = new \Models\Book;
		extract($_POST);

		//-------Traitement de l'image-------//
		$front_cover = '';

		if ($_FILES['front_cover']['error'] !== UPLOAD_ERR_NO_FILE)
		{
			$fp = new \FilesProcessor;
			$front_cover = $fp->save($_FILES['front_cover']);

		}

		$book->create(compact('title', 'slug', 'datepub', 'summary', 'front_cover', 'genre', 'language', 'location', 'isbn', 'npages', 'editor'));

		foreach ($authors as $author)
		{
			$book->attachAuthors($book['id'], $author);
		}

		header('Location: index.php?a=show&m=book&book_id=' . $book['id']);

	}

}