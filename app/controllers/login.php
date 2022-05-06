<?php

class login extends controller
{
    public function index()
    {
        $data['title'] = 'Login Page';
		$this->view('templates/header', $data);
        $this->view('login/login');
		$this->view('templates/footer'); 
    }

    public function log()
    {
        $data = $_POST;
        $id = $this->model('user_model')->login($data);
        if ($id > 0) {
            if( !session_id() ) session_start();
            $_SESSION['id'] = $id;
            $this->redirect('dashboard/');
        } else {
            $this->redirect('login/');
        }
    }

    public function signout()
    {
        session_destroy();
        $this->redirect('market/');
    }
}