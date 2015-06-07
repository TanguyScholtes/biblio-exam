<?php

namespace Controllers;

class AuthorController extends BaseController
{

	function index()
	{
		$author = new \Models\Author;
		$data = $author->all();
		$view = 'authorIndex.php';
		return [
			'view' => $view,
			'data' => $data
			];
	}


	function show()
	{
		if (isset($_GET['author_id']))
		{
			$id = intval($_GET['author_id']);
			$author = new \Models\Author;
			$data = $author->find($id);
			$data['books'] = $author-> books($id);
		}
		else
		{
			die('il manque author_id');
		}

		$view = 'authorShow.php';

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
		if (isset($_GET['author_id']))
		{
			$id = intval($_GET['author_id']);
			$author = new \Models\Author;
			$data = $author->find($id);

			$view = 'authorEdit.php';
		}
		else
		{
			die('il manque author_id');
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
		$author = new \Models\Author;
		extract($_POST);

		//-------Traitement de l'image-------//
		$photo = '';

		if ($_FILES['photo']['error'] !== UPLOAD_ERR_NO_FILE)
		{
			$fp = new \FilesProcessor;
			$photo = $fp->save($_FILES['photo']);

		}
		else
		{
			$theAuthor = $author->find($author_id);
			$photo = $theAuthor['photo'];
		}

		$author->update(compact('author_id', 'name', 'first_name', 'photo', 'bio', 'datebirth', 'datedeath', 'slug'));

		header('Location: index.php?a=show&m=author&author_id=' . $author_id);

	}

	function delete()
	{
		if (!$_SESSION['valid'])
		{
			header('Location: index.php');
		}
		if (isset($_GET['author_id']))
		{
			$id = intval($_GET['author_id']);
			$book = new \Models\Book;
			$author = new \Models\Author;
			$data = $author->find($id);
			$data['books'] = $author->books($id);

			foreach ($data['books'] as $book)
			{
				$author->detachBooks($id, $book);
			}
			$author->deleteAuthor($id);

			$view = 'authorDelete.php';
		}
		else
		{
			die('il manque author_id');
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

		$author = new \Models\Author;
		$data = [];

		$view = 'authorCreate.php';
		
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
		$author = new \Models\Author;
		extract($_POST);

		//-------Traitement de l'image-------//
		$photo = '';

		if ($_FILES['photo']['error'] !== UPLOAD_ERR_NO_FILE)
		{
			$fp = new \FilesProcessor;
			$photo = $fp->save($_FILES['photo']);

		}

		$author->create(compact('name', 'first_name', 'photo', 'bio', 'datebirth', 'datedeath', 'slug'));

		header('Location: index.php?a=show&m=author&author_id=' . $author['id']);

	}

}