<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class AccountController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data = [
            'title' => 'Data Account',
            'act' => 'user',
            'user' => $userModel->findAll()
        ];
        return view('apps/data-user', $data);
    }
}
