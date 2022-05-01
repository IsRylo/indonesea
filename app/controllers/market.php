<?php

class market extends controller
{
    public function index()
    {
        $data['title'] = 'Market Page';
        $data['categories'] = $this->model('market_model')->getAllCategories();
        $data['products'] = $this->model('market_model')->getAllProductPreviews();

		$this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('market/home', $data);
		$this->view('templates/footer');
    }

    public function search_product()
    {
        $query = $_POST['search'];
        $data['title'] = 'Search Result';
        $data['query'] = $query;
        filter_var($query, FILTER_SANITIZE_URL);
        $data['products'] = $this->model('market_model')->getProductPreviews($query);

		$this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('market/search', $data);
		$this->view('templates/footer');
    }

    public function categories($category)
    {
        $data['title'] = 'Market Page';
        filter_var($category, FILTER_SANITIZE_URL);
        $data['products'] = $this->model('market_model')->getProductPreviewsByCategory($category);

		$this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('market/search', $data);
		$this->view('templates/footer');
    }

    public function productdetails($product_id)
    {
        $data['title'] = 'Product Detail';
        filter_var($product_id, FILTER_VALIDATE_INT);
        $data['product'] = $this->model('market_model')->getProductDetails((int) $product_id);
		$this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('market/product', $data);
		$this->view('templates/footer');
    }
}