<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PesananModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use App\Models\BiodataModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $biodataModel = new BiodataModel();
        $userModel = new UserModel();
        $transaksiModel = new TransaksiModel();
        $pesananModel = new PesananModel();

        $data = [
            'title' => 'Dashboard',
            'act' => 'dashboard',
            'biodata' => $biodataModel->findAll(),
            'user' => $userModel->findAll(),
            'transaksi' => $transaksiModel->findAll(),
            'pesanan' => $pesananModel->findAll(),
        ];
        return view('apps/index', $data);
    }
}
