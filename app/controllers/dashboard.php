<?php

class dashboard extends controller {
    public function index()
    {
        $this->logincheck();
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
        $this->logincheck();
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
        $this->logincheck();
        $data['title'] = 'My Products';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $data['products'] = $this->model('dashboard_model')->getUserProducts($data['user']['name']);
        $this->view('templates/header', $data);
        $this->view('dashboard/myproducts', $data);
        $this->view('templates/footer', $data);
    }
    
    public function myaccount()
    {
        $this->logincheck();
        $data['title'] = 'My Account';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $this->view('templates/header', $data);
        $this->view('dashboard/myaccount', $data);
        $this->view('templates/footer', $data);
    }

    public function updateAccount()
    {
        $this->logincheck();
        $data = $_POST;
        filter_var($data, FILTER_SANITIZE_URL);
        $this->model('dashboard_model')->updateAccount($data);
        $this->redirect("dashboard/myaccount");
    }

    public function payment($trans_id = null)
    {
        $this->logincheck();
        $data['title'] = 'Payment';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $data['trans_id'] = $trans_id;
        $this->view('templates/header', $data);
        $this->view('dashboard/payment', $data);
        $this->view('templates/footer', $data);
    }

    public function pay()
    {
        $data = $_POST;
        $this->model('dashboard_model')->pay($data);
        $this->redirect('dashboard/transactiondetails/' . $_POST['trans_id']);
    }

    public function newproduct()
    {
        $this->logincheck();
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
        $this->logincheck();
        $data['title'] = 'Update Product';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $data['product'] = $this->model('dashboard_model')->getUserProduct($id, $data['user']['name']);
        $this->view('templates/header', $data);
        $this->view('dashboard/myproductdetails', $data);
        $this->view('templates/footer', $data);
    }

    public function transactiondetails($id)
    {
        $this->logincheck();
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
        $this->logincheck();
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
        $this->logincheck();
        $data = $_POST;
        $data['trans_id'] = $this->model('dashboard_model')->createUniqueId();
        $this->model('dashboard_model')->addTransaction($data);
        $this->redirect('dashboard/transaction');
    }

    public function updateTransaction()
    {
        $this->logincheck();
        $data = $_POST;
        $this->model('dashboard_model')->updateTransaction($data);
        $this->redirect('dashboard/transactiondetails/' . $_POST['trans_id']);
    }

    public function mouexchange($id)
    {
        $this->logincheck();
        $data['title'] = 'MOU';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $data['transaction'] = $this->model('dashboard_model')->getTransDetails($id);
        $data['mou'] = $this->model('dashboard_model')->getMOUs($id);
        $this->view('templates/header', $data);
        $this->view('dashboard/mou', $data);
        $this->view('templates/footer', $data);
    }

    public function approvemyMOU($tran_id)
    {
        $this->logincheck();
        $this->model('dashboard_model')->approvemyMOU($tran_id, $_SESSION['id']);
        $this->redirect('dashboard/mouexchange/'.$tran_id);
        $this->redirect('dashboard/index');
    }

    public function disapprovemyMOU($tran_id)
    {
        $this->logincheck();
        $this->model('dashboard_model')->disapprovemyMOU($tran_id, $_SESSION['id']);
        $this->redirect('dashboard/mouexchange/'.$tran_id);
    }

    public function approvepartnerMOU($tran_id)
    {
        $this->logincheck();
        $this->model('dashboard_model')->approvepartnerMOU($tran_id, $_SESSION['id']);
        $this->redirect('dashboard/mouexchange/'.$tran_id);
    }

    public function disapprovepartnerMOU($tran_id)
    {
        $this->logincheck();
        $this->model('dashboard_model')->disapprovepartnerMOU($tran_id, $_SESSION['id']);
        $this->redirect('dashboard/mouexchange/'.$tran_id);
    }

    public function insertMOU()
    {
        $this->logincheck();
        $data = $_POST;
        $target_dir = '../app/views/templates/images/';
        $target_file = $target_dir . basename($_FILES['mou']["name"]);
        $uploadOk = 1;
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk != 0) {
            if (move_uploaded_file($_FILES['mou']["tmp_name"], $target_file)) {
                $data['mou'] = $_FILES['mou']['name'];
            } 
        }
        $this->model('dashboard_model')->updateMOU($data);
        $this->redirect("dashboard/mouexchange/" . $_POST['trans_id']);
    }

    public function logincheck()
    {
        if (!isset($_SESSION['id'])) $this->redirect('login/');
    }

    public function review($trans_id)
    {
        $this->logincheck();
        $data['title'] = 'MOU';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $data['transaction'] = $this->model('dashboard_model')->getTransDetails($trans_id);
        $this->view('templates/header', $data);
        $this->view('dashboard/review', $data);
        $this->view('templates/footer', $data);
    }
    
    public function insertReview()
    {
        $this->logincheck();
        $data = $_POST;
        if ($data['customer_id'] == $_SESSION['id']) {
            $this->model('market_model')->addReview($data);
            $this->redirect("market/productdetails/" . $_POST['product_id']);
        } else {
            $this->redirect('dashboard/');
        }
    }

    public function signout()
    {
        unset($_SESSION['id']);
        $this->redirect('market/');
    }

    public function request()
    {
        $this->logincheck();
        $data['title'] = 'Request';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $data['requests'] = $this->model('dashboard_model')->getAllRequests();
        $this->view('templates/header', $data);
        $this->view('dashboard/request', $data);
        $this->view('templates/footer', $data);
    }

    public function requestdetails($id)
    {
        $this->logincheck();
        $data['title'] = 'Request';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $data['request'] = $this->model('dashboard_model')->getRequest($id);
        $data['requester'] = $this->model('dashboard_model')->getUserInfo($data['request']['requester_id']);
        $this->view('templates/header', $data);
        $this->view('dashboard/requestdetails', $data);
        $this->view('templates/footer', $data);
    }

    public function createrequest()
    {
        $this->logincheck();
        $data['title'] = 'Request';
        $data['user'] = $this->model('dashboard_model')->getUserInfo($_SESSION['id']);
        $this->view('templates/header', $data);
        $this->view('dashboard/createRequest', $data);
        $this->view('templates/footer', $data);
    }

    public function addRequest()
    {
        $data = $_POST;
        var_dump($data);
        $this->model('dashboard_model')->addRequest($data);
        $this->redirect('dashboard/request');
    }
}