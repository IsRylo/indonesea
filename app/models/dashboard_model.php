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
    public function getUserInfoByName($name)
    {
        $json = '../app/database/users.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        foreach ($data as $user) 
        {
            if ($user['name'] == $name) return $user;
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

    public function updateTransaction($newdata)
    {
        $json = '../app/database/transactions.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        var_dump($data);
        foreach ($data as $key => $transaction) {
            if ($transaction['trans_id'] == $newdata['trans_id']) {
                $data[$key] = $newdata;
                if ($data[$key]['ship_status'] == "Completed" && $data[$key]['deposit'] > $data[$key]['total'] * 0.15) $data[$key]['status'] = "Completed";
                $data = json_encode($data);
                file_put_contents($json, $data);
                return;
            }
        }
    }

    public function getRandomID() {
        $word = array_merge(range(0, 9), range('A', 'Z'));
        shuffle($word);
        return substr(implode($word), 0, 6);
    }
    
    public function createUniqueId() {
        while (1) {
           $word = $this->getRandomID();
           if (!$this->idExists($word)) {
               return $word;
           }
        }
    }

    public function idExists($word)
    {
        $json = '../app/database/transactions.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        foreach ($data as $transaction) {
            if ($transaction['trans_id'] == $word) return true;
        }
        return false;
    }

    public function addTransaction($newdata)
    {
        $json = '../app/database/transactions.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        array_unshift($data, $newdata);
        $data = json_encode($data);
        file_put_contents($json, $data);
    }

    public function getMOUs($id)
    {
        $json = '../app/database/mou.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        $mous = [];
        foreach ($data as $mou) {
            if ($mou['trans_id'] == $id) {
                array_push($mous, $mou);
            }
        }
        return $mous;
    }

    public function approvemyMOU($tran_id, $user_id)
    {
        $json = '../app/database/mou.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        foreach ($data as $key => $mou) {
            if ($data[$key]['user_id'] == $user_id && $mou['trans_id'] == $tran_id) {
                $data[$key]['approval1'] = true;
                break;
            }
        }
        $data = json_encode($data);
        file_put_contents($json, $data);
        $this->checkapproval($tran_id);
    }
    public function disapprovemyMOU($tran_id, $user_id)
    {
        $json = '../app/database/mou.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        foreach ($data as $key => $mou) {
            if ($mou['user_id'] == $user_id && $mou['trans_id'] == $tran_id) {
                $data[$key]['approval1'] = false;
               break;
            }
        }
        $data = json_encode($data);
        file_put_contents($json, $data);
    }

    public function approvepartnerMOU($tran_id, $user_id)
    {
        $json = '../app/database/mou.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        foreach ($data as $key => $mou) {
            if ($mou['user_id'] != $user_id && $mou['trans_id'] == $tran_id) {
                $data[$key]['approval2'] = true;
                break;
            }
        }
        $data = json_encode($data);
        file_put_contents($json, $data);
        $this->checkapproval($tran_id);
    }
    public function disapprovepartnerMOU($tran_id, $user_id)
    {
        $json = '../app/database/mou.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        foreach ($data as $key => $mou) {
            if ($mou['user_id'] != $user_id && $mou['trans_id'] == $tran_id) {
                $data[$key]['approval2'] = false;
               break;
            }
        }
        $data = json_encode($data);
        file_put_contents($json, $data);
    }

    public function checkapproval($trans_id)
    {
        $json = '../app/database/mou.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        foreach ($data as $key => $mou) {
            if ($mou['approval1'] &&  $mou['approval2']) {
                $trans_data = file_get_contents('../app/database/transactions.json');
                $trans_data = json_decode($trans_data, true);
                foreach ($trans_data as $key => $transaction) {
                    if ($transaction['trans_id'] == $trans_id) {
                        $trans_data[$key]['mou'] = $mou['mou'];
                        $trans_data[$key]['status'] = "Ongoing";

                        $product_data = file_get_contents('../app/database/products.json');
                        $product_data = json_decode($product_data, true);
                        foreach ($product_data as $key => $product) {
                            if ($product['id'] == $transaction['product_id']) {
                                $product_data[$key]['stock'] -= $transaction['amount'];
                                $product_data[$key]['stock_terjual'] += $transaction['amount'];
                                $product_data = json_encode($product_data);
                                file_put_contents('../app/database/products.json', $product_data);
                                break;
                            }
                        }
                        break;
                    }
                }
                $trans_data = json_encode($trans_data);
                file_put_contents('../app/database/transactions.json', $trans_data);
                break;
            }
        }
    }

    public function updateMOU($updatedata)
    {
        $json = '../app/database/mou.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        $updated = false;
        foreach ($data as $key => $mou) {
            if ($mou['trans_id'] == $updatedata['trans_id'] && $mou['user_id'] == $updatedata['user_id']) {
                $data[$key] = $updatedata;
                $updated = true;
                break;
            }
        }
        if (!$updated) array_push($data,$updatedata);
        $data = json_encode($data);
        file_put_contents($json, $data);
    }

    public function pay($payment)
    {
        $json = '../app/database/transactions.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);

        foreach ($data as $key => $transaction) {
            if ($transaction['trans_id'] == $payment['trans_id']) {
                $data[$key]['deposit'] += $payment['deposit'];
                $data = json_encode($data);
                file_put_contents($json, $data);
                return;
            }
        }
    }

    public function getAllRequests()
    {
        $json = '../app/database/requests.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        return $data;
    }

    public function getRequest($id)
    {
        $json = '../app/database/requests.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        foreach ($data as $request) {
            if ($request['request_id'] == $id) return $request;
        }
    }

    public function addRequest($post)
    {
        $json = '../app/database/requests.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        $post['request_id'] = count($data) + 1;
        if ($data == null) $data = $post;
        else array_unshift($data, $post);
        $data = json_encode($data);
        file_put_contents($json, $data);
    }
}