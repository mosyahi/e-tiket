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

        // Format Rupiah
        $totalJumlahTransaksi = $transaksiModel->selectSum('jumlah_transaksi')->first()['jumlah_transaksi'];
        $formattedTotalJumlahTransaksi = 'IDR ' . number_format($totalJumlahTransaksi, 0, ',', '.');

        // Status Pembayaran
        $countSuccessTransaksi = $transaksiModel->where('status_pembayaran', 'Success')->countAllResults();
        $countPendingTransaksi = $transaksiModel->where('status_pembayaran', 'Pending')->countAllResults();

        // Role Count
        $penjual = $userModel->where('role', 2)->countAllResults();
        $pembeli = $userModel->where('role', 3)->countAllResults();

        $data = [
            'title' => 'Dashboard',
            'act' => 'dashboard',
            'biodata' => $biodataModel->findAll(),
            'user' => $userModel->findAll(),
            'transaksi' => $transaksiModel->findAll(),
            'pesanan' => $pesananModel->findAll(),
            'countTransaksi' => $formattedTotalJumlahTransaksi,
            'countTransaksiSuccess' => $countSuccessTransaksi,
            'countTransaksiFail' => $countPendingTransaksi,
            'countPenjual' => $penjual,
            'countPembeli' => $pembeli,
        ];
        return view('apps/index', $data);
    }
}
