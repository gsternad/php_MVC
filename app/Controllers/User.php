<?php

namespace App\Controllers;

use App\Core\Database;
use App\Models\Contract;
use App\Core\Render;
use App\Models\User as UserModel;

class User implements Contract
{
    public function draw($request)
    {
        $pdo = new UserModel();
        $query = "SELECT * FROM users 
                  WHERE ID = :id";
        $args = [':id' => $request->route['method']];
        $user = $pdo->read($query, $args, 'fetch');
        echo Render::getInstance()->render($request->route['template'], [
            "User" => $user,
        ]);
    }
}