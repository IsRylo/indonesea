<?php

class dashboard_model // extends database
{
    public function getUserInfo($id)
    {
        $json = '../app/database/users.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        foreach ($data as $user) 
        {
            if ($user['id'] == $id) return $user;
        }
        return null;
    }

    public function updateAccount($newdata)
    {
        $json = '../app/database/users.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        foreach ($data as $key => $user) 
        {
            if ($user['id'] == $newdata['id'])
            {
                unset($data[$key]);
                array_push($data,array_replace($user, $newdata));
                $data = array_values($data);
                break;
            }
        }
        $data = json_encode($data);
        file_put_contents($json, $data);
        return;
    }

    public function getUserProducts($username)
    {
        $json = '../app/database/products.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        $products = [];
        foreach ($data as $product) 
        {
            if ($product['supplier'] == $username) array_push($products,$product);
        }
        return $products;
    }

    public function addProduct($product)
    {
        $json = '../app/database/products.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        array_push($data, $product);
        file_put_contents($json, $data);
    }

    public function getUserProduct($id, $username)
    {
       $products = $this->getUserProducts($username);
       foreach ($products as $product) {
           if ($product['id'] == $id) return $product;
       }
    }
}