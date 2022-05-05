<?php

class dashboard extends controller {
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $data['transactions'] = $this->model('dashboard_model')->getRecentTrans($_SESSION['id']);
        $data['products'] = [];
        foreach($data['transactions'] as $transaction)
        {
            array_push($data['products'], $this->model('market_model')->getProductPreview((int) $transaction['product_id']));
        }
        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer', $data);
    }

    public function transaction()
    {
        $data['title'] = 'Transaction';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $data['transactions'] = $this->model('dashboard_model')->getTrans($_SESSION['id']);
        $data['products'] = [];
        foreach($data['transactions'] as $transaction)
        {
            array_push($data['products'], $this->model('market_model')->getProductPreview((int) $transaction['product_id']));
        }
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
        $products = $this->model('market_model')->getAllProductPreviews();
        $data['product']['id'] = count($products) + 1;
        $this->view('templates/header', $data);
        $this->view('dashboard/newproduct', $data);
        $this->view('templates/footer', $data);
    }

    public function addProduct()
    {
        $data = $_POST;
        $data['images'] = [];
        filter_var($data, FILTER_SANITIZE_URL);
        $file_names = ['image1', 'image2', 'image3', 'image4', 'video', 'certificate'];
        foreach ($file_names as $name) 
        {
            if ($_FILES[$name]['name'] == '') continue;
            $target_dir = '../app/views/templates/images/';
            $target_file = $target_dir . basename($_FILES[$name]["name"]);
            $uploadOk = 1;

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES[$name]["tmp_name"]);
            if($check !== false) $uploadOk = 1;
            else $uploadOk = 0;

            if (file_exists($target_file)) $uploadOk = 0;

            // Check file size
            if ($_FILES[$name]["size"] > 500000) $uploadOk = 0;

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk != 0) {
                if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                    if ($name == 'video') $data['video'] = $_FILES[$name]["name"];
                    else if ($name == 'certificate') $data['certificate'] = $_FILES[$name]["name"];
                    else array_push($data['images'], $_FILES[$name]["name"]);
                } 
            }
        }
        // Adding data in database
        $data['location'] = null;
        $data['purity'] = null;
        $data['review'] = null;
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

    public function transactiondetails($id)
    {
        $data['title'] = 'Transaction Details';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        filter_var($id, FILTER_SANITIZE_URL);
        $data['transaction'] = $this->model('dashboard_model')->getTransDetails($id);
        $data['product'] =$this->model('market_model')->getProductPreview((int) $data['transaction']['product_id']);
        $data['customer_name'] = $this->model('dashboard_model')->getUserInfo($data['transaction']['customer_id'])['name'];
        $data['seller_name'] = $this->model('dashboard_model')->getUserInfo($data['transaction']['seller_id'])['name'];
        $this->view('templates/header', $data);
        $this->view('dashboard/transactiondetails', $data);
        $this->view('templates/footer', $data);
    }

    public function buyproduct($productID)
    {
        $data['title'] = 'Transaction Details';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        filter_var($productID, FILTER_SANITIZE_URL);
        $data['product'] =$this->model('market_model')->getProductPreview($productID);
        $data['customer_name'] = $data['user']['name'];
        $data['customer_id'] = $_SESSION['id'];
        $data['seller_name'] = $data['product']['supplier'];
        $data['seller_id'] = $this->model('dashboard_model')->getUserInfoByName($data['seller_name'])['id'];
        $this->view('templates/header', $data);
        $this->view('dashboard/newtransaction', $data);
        $this->view('templates/footer', $data);
    }

    public function addTransaction()
    {
        $data = $_POST;
        $data['trans_id'] = $this->model('dashboard_model')->createUniqueId();
        $this->model('dashboard_model')->addTransaction($data);
        $this->redirect('dashboard/transaction');
    }
}