<?php
class controller{
    public function view($view, $data = [])
	{
		require_once '../app/views/' . $view . '.php';
	}

	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		return new $model;
	}

	public function redirect($url)
	{
		ob_start();
		header('Location: '.base_url . $url);
		ob_end_flush();
		die();
	}

	public function logincheck()
	{
		if (!isset($_SESSION['id']))
		{
			$this->redirect('dashboard/login');
		}
	}
}