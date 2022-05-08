<?php

class profile_model
{
    public function getRecentTrans($id)
    {
        $json = '../app/database/transactions.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        $transactions = [];
        $allowed = ['trans_id', 'product_id', 'date'];
        foreach ($data as $transaction)
        {
            if ($transaction['status'] != 'Completed') continue;

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
            if ($transaction['status'] != 'Completed') continue;
            
            if ($transaction['customer_id'] == $id || $transaction['seller_id'] == $id)
            {
                $transaction =  array_intersect_key($transaction, array_flip($allowed));
                array_push($transactions, $transaction);
            }
        }
        return $transactions;
    }
}