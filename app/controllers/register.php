<?php

class register extends controller
{
    public function index()
    {
        $data['title'] = 'Login Page';
		$this->view('templates/header', $data);
        $this->view('login/register');
		$this->view('templates/footer'); 
    }

    public function addUser()
    {
        $data = $_POST;
        $data['revenue'] = 0;
        $data['customers'] = 0;
        $data['transactions'] = 0;
        $target_dir = '../app/views/templates/images/';
        $target_file = $target_dir . basename($_FILES['profile_picture']["name"]);
        $uploadOk = 1;

        $check = getimagesize($_FILES['profile_picture']["tmp_name"]);
        if($check !== false) $uploadOk = 1;
        else $uploadOk = 0;

        if (file_exists($target_file)) $uploadOk = 0;

        // Check file size
        if ($_FILES['profile_picture']["size"] > 500000) $uploadOk = 0;
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk != 0) {
            if (move_uploaded_file($_FILES['profile_picture']["tmp_name"], $target_file)) {
                $data['profile_picture'] = $_FILES['profile_picture']['name'];
            } else {
                $this->redirect("register/");   
            }
        }
        $this->model('user_model')->addUser($data);
        $this->redirect("login/");
    }
}