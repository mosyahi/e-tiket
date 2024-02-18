<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Sign-In'
        ];
        return view('sign/sign-in', $data);
    }
}
