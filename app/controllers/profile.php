<?php

class profile extends controller
{
    public function index($user_id)
    {
        $data['title'] = 'Overview';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($user_id);
        $data['transactions'] = $this->model('profile_model')->getRecentTrans($user_id);
        $data['products'] = [];
        foreach($data['transactions'] as $transaction)
        {
            array_push($data['products'], $this->model('market_model')->getProductPreview((int) $transaction['product_id']));
        }
        $this->view('templates/header', $data);
        $this->view('profile/index', $data);
        $this->view('templates/footer', $data);
    }

    public function transaction($user_id)
    {
        $data['title'] = 'Transactions';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($user_id);
        $data['transactions'] = $this->model('profile_model')->getTrans($user_id);
        $data['products'] = [];
        foreach($data['transactions'] as $transaction)
        {
            array_push($data['products'], $this->model('market_model')->getProductPreview((int) $transaction['product_id']));
        }
        $this->view('templates/header', $data);
        $this->view('profile/transactions', $data);
        $this->view('templates/footer', $data);
    }

    public function products($user_id)
    {
        $data['title'] = 'Products';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($user_id);
        $data['products'] = $this->model('dashboard_model')->getUserProducts($data['user']['name']);
        $this->view('templates/header', $data);
        $this->view('profile/myproducts', $data);
        $this->view('templates/footer', $data);
    }

    public function details($user_id)
    {
        $data['title'] = 'Account Details';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($user_id);
        $this->view('templates/header', $data);
        $this->view('profile/myaccount', $data);
        $this->view('templates/footer', $data);
    }

    public function transactiondetails($user_id, $trans_id)
    {
        $data['title'] = 'Transaction Details';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($user_id);
        filter_var($trans_id, FILTER_SANITIZE_URL);
        filter_var($user_id, FILTER_SANITIZE_URL);
        $data['transaction'] = $this->model('dashboard_model')->getTransDetails($trans_id);
        $data['product'] =$this->model('market_model')->getProductPreview((int) $data['transaction']['product_id']);
        $data['customer_name'] = $this->model('dashboard_model')->getUserInfo($data['transaction']['customer_id'])['name'];
        $data['seller_name'] = $this->model('dashboard_model')->getUserInfo($data['transaction']['seller_id'])['name'];
        $this->view('templates/header', $data);
        $this->view('profile/transactiondetails', $data);
        $this->view('templates/footer', $data);
    }
}