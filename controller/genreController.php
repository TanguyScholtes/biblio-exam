<?php

namespace Controllers;


class GenreController extends BaseController
{

	function index()
	{
		$genre = new \Models\Genre;
		$data = $genre->all();
		$view = 'genreIndex.php';
		return [
			'view' => $view,
			'data' => $data
			];
	}


	function show()
	{
		if (isset($_GET['genre_id']))
		{
			$id = intval($_GET['genre_id']);
			$genre = new \Models\Genre;
			$data = $genre->find($id);
			$data['books'] = $genre-> books($id);
		}
		else
		{
			die('il manque genre_id');
		}

		$view = 'genreShow.php';

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
		if (isset($_GET['genre_id']))
		{
			$id = intval($_GET['genre_id']);
			$genre = new \Models\Genre;
			$data = $genre->find($id);

			$view = 'genreEdit.php';
		}
		else
		{
			die('il manque genre_id');
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
		$genre = new \Models\Genre;
		extract($_POST);

		//-------Traitement de l'image-------//
		$logo = '';

		if ($_FILES['logo']['error'] !== UPLOAD_ERR_NO_FILE)
		{
			$fp = new \FilesProcessor;
			$logo = $fp->save($_FILES['logo']);

		}
		else
		{
			$theGenre = $genre->find($genre_id);
			$logo = $theGenre['logo'];
		}

		$genre->update(compact('genre_id', 'name', 'logo', 'slug'));

		header('Location: index.php?a=show&m=genre&genre_id=' . $genre_id);

	}

	function delete()
	{
		if (!$_SESSION['valid'])
		{
			header('Location: index.php');
		}
		if (isset($_GET['genre_id']))
		{
			$id = intval($_GET['genre_id']);
			$genre = new \Models\Genre;
			$data = $genre->find($id);

			$genre->deleteGenre($id);

			$view = 'genreDelete.php';
		}
		else
		{
			die('il manque genre_id');
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

		$genre = new \Models\Genre;
		$data = [];

		$view = 'genreCreate.php';
		
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
		$genre = new \Models\Genre;
		extract($_POST);

		//-------Traitement de l'image-------//
		$logo = '';

		if ($_FILES['logo']['error'] !== UPLOAD_ERR_NO_FILE)
		{
			$fp = new \FilesProcessor;
			$logo = $fp->save($_FILES['logo']);
		}

		$genre->create(compact('name', 'slug', 'logo'));

		header('Location: index.php?a=show&m=genre&genre_id=' . $genre['id']);

	}

}