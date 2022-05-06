<?php

class user_model 
{
    public function login($logindata)
    {
        $json = '../app/database/users.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        foreach ($data as $user) {
            if ($user['email'] == $logindata['email'] && $user['password'] == $logindata['password']) {
                return $user['id'];
            }
        }
        return 0;
    }

    public function addUser($newdata)
    {
        $json = '../app/database/users.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        $newdata['id'] = count($data) + 1;
        array_push($data, $newdata);
        $data = json_encode($data);
        file_put_contents($json, $data);
    }
}