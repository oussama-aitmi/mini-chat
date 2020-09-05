<?php

namespace App\Service;

use App\Entity\User;

class AuthService
{
    public function isLogged()
    {
        return isset($_SESSION['user']);
    }

    public function login($pseudo, $password)
    {
        $row = User::getUser($pseudo, $password);

        if(!empty($row)) {
            $_SESSION['user'] = $row;
        }

        return $row;
    }
}
