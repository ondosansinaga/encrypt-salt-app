<?php

namespace App\Traits;

trait Salt
{
    public function generate($password)
    {
        $salt = bin2hex(random_bytes(22));

        $salted_password = $password . $salt;

        $hashed_password = md5($salted_password);

        return [
            'salt' => $salt,
            'hashed_password' => $hashed_password
        ];
    }
    public function compare($password, $salt, $hashed_password)
    {
        $salted_password = $password . $salt;

        $new_hashed_password = md5($salted_password);

        return $new_hashed_password == $hashed_password;

        // return [
        //     'salted_password' => $salted_password,
        //     'new_hashed_password' => $new_hashed_password,
        //     'hashed_password' => $hashed_password,
        //     $new_hashed_password == $hashed_password
        // ];
    }
}