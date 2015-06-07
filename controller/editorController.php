<?php

namespace Controllers;


class EditorController extends BaseController
{

	function index()
	{
		$editor = new \Models\Editor;
		$data = $editor->all();
		$view = 'editorIndex.php';
		return [
			'view' => $view,
			'data' => $data
			];
	}


	function show()
	{
		if (isset($_GET['editor_id']))
		{
			$id = intval($_GET['editor_id']);
			$editor = new \Models\Editor;
			$data = $editor->find($id);
			$data['editors'] = $editor-> editor($id);
		}
		else
		{
			die('il manque editor_id');
		}

		$view = 'editorShow.php';

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
		if (isset($_GET['editor_id']))
		{
			$id = intval($_GET['editor_id']);
			$editor = new \Models\Editor;
			$data = $editor->find($id);

			$view = 'editorEdit.php';
		}
		else
		{
			die('il manque editor_id');
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
		$editor = new \Models\Editor;
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
			$theEditor = $editor->find($editor_id);
			$logo = $theEditor['logo'];
		}

		$editor->update(compact('editor_id', 'name', 'website', 'logo', 'slug'));

		header('Location: index.php?a=show&m=editor&editor_id=' . $editor_id);

	}

	function delete()
	{
		if (!$_SESSION['valid'])
		{
			header('Location: index.php');
		}
		if (isset($_GET['editor_id']))
		{
			$id = intval($_GET['editor_id']);
			$editor = new \Models\Editor;
			$data = $editor->find($id);

			$editor->deleteEditor($id);

			$view = 'editorDelete.php';
		}
		else
		{
			die('il manque editor_id');
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

		$editor = new \Models\Editor;
		$data = [];

		$view = 'editorCreate.php';
		
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
		$editor = new \Models\Editor;
		extract($_POST);

		//-------Traitement de l'image-------//
		$logo = '';

		if ($_FILES['logo']['error'] !== UPLOAD_ERR_NO_FILE)
		{
			$fp = new \FilesProcessor;
			$logo = $fp->save($_FILES['logo']);
		}

		$editor->create(compact('name', 'slug', 'logo', 'website'));

		header('Location: index.php?a=show&m=editor&editor_id=' . $editor['id']);

	}

}