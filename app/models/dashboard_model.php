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
        $data = json_encode($data);
        file_put_contents($json, $data);
    }

    public function getUserProduct($id, $username)
    {
       $products = $this->getUserProducts($username);
       foreach ($products as $product) {
           if ($product['id'] == $id) return $product;
       }
    }

    public function getRecentTrans($id)
    {
        $json = '../app/database/transactions.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        $transactions = [];
        $allowed = ['trans_id', 'product_id', 'date'];
        foreach ($data as $transaction)
        {
            if ($transaction['customer_id'] == $id || $transaction['seller_id'] == $id)
            {
                $transaction =  array_intersect_key($transaction, array_flip($allowed));
                array_push($transactions, $transaction);
            }
            if (count($transactions) > 2) break;
        }
        return $transactions;
    }

    public function getTrans($id)
    {
        $json = '../app/database/transactions.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        $transactions = [];
        $allowed = ['trans_id', 'product_id', 'date'];
        foreach ($data as $transaction)
        {
            if ($transaction['customer_id'] == $id || $transaction['seller_id'] == $id)
            {
                $transaction =  array_intersect_key($transaction, array_flip($allowed));
                array_push($transactions, $transaction);
            }
        }
        return $transactions;
    }

    public function getTransDetails($id)
    {
        $json = '../app/database/transactions.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        foreach ($data as $transaction)
        {
            if ($transaction['trans_id'] == $id) return $transaction;
        }
        return false;
    }
}