<?php

class dashboard extends controller {
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['name'] = 'PT Perkebunanan Nusantara';
        $data['image'] = "who.jfif";
        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer', $data);
    }
    
    public function myaccount()
    {
        echo "Hello";
    }
}