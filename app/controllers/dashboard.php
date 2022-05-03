<?php

class dashboard extends controller {
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer', $data);
    }

    public function transaction()
    {
        $data['title'] = 'Transaction';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $this->view('templates/header', $data);
        $this->view('dashboard/transactions', $data);
        $this->view('templates/footer', $data);
    }

    public function myproducts()
    {
        $data['title'] = 'My Products';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $data['products'] = $this->model('dashboard_model')->getUserProducts($data['user']['name']);
        $this->view('templates/header', $data);
        $this->view('dashboard/myproducts', $data);
        $this->view('templates/footer', $data);
    }
    
    public function myaccount()
    {
        $data['title'] = 'My Account';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $this->view('templates/header', $data);
        $this->view('dashboard/myaccount', $data);
        $this->view('templates/footer', $data);
    }

    public function updateAccount()
    {
        $data = $_POST;
        filter_var($data, FILTER_SANITIZE_URL);
        $this->model('dashboard_model')->updateAccount($data);
        $this->redirect("dashboard/myaccount");
    }

    public function payment()
    {
        $data['title'] = 'Payment';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $this->view('templates/header', $data);
        $this->view('dashboard/payment', $data);
        $this->view('templates/footer', $data);
    }

    public function newproduct()
    {
        $data['title'] = 'New Product';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $data['products'] = $this->model('dashboard_model')->getUserProducts($data['user']['name']);
        $this->view('templates/header', $data);
        $this->view('dashboard/newproduct', $data);
        $this->view('templates/footer', $data);
    }

    public function addproduct()
    {
        $data = $_POST;
        filter_var($data, FILTER_SANITIZE_URL);
        $this->model('dashboard_model')->addProduct($data);
        $this->redirect("dashboard/myproducts");
    }

    public function updateProduct($id)
    {
        $data['title'] = 'Update Product';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $data['product'] = $this->model('dashboard_model')->getUserProduct($id, $data['user']['name']);
        $this->view('templates/header', $data);
        $this->view('dashboard/myproductdetails', $data);
        $this->view('templates/footer', $data);
    }
}