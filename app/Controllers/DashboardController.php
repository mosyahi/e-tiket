<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PesananModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use App\Models\BiodataModel;
use App\Models\TiketModel;

class DashboardController extends BaseController
{
    protected $userModel;
    protected $biodataModel;
    protected $tiketModel;
    protected $pesananModel;
    protected $transaksiModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->biodataModel = new BiodataModel();
        $this->tiketModel = new TiketModel();
        $this->pesananModel = new PesananModel();
        $this->transaksiModel = new TransaksiModel();
    }

    public function index()
    {
        if (session('role') == 1) {
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
        } elseif (session('role') == 2) {
            $biodataModel = new BiodataModel();
            $userModel = new UserModel();

            $user_id = session('user_id');

            $successCount = $this->transaksiModel
                ->where('user_id', $user_id)
                ->where('status_pembayaran', 'Success')
                ->countAllResults();

            $pesanan = $this->transaksiModel
                ->where('user_id', $user_id)
                ->whereIn('status_pembayaran', ['Success', 'Pending', 'Failed'])
                ->countAllResults();

            $ticket = $this->tiketModel
                ->where('user_id', $user_id)
                ->countAllResults();

            $failedPendingCount = $this->transaksiModel
                ->where('user_id', $user_id)
                ->whereIn('status_pembayaran', ['Failed', 'Pending'])
                ->countAllResults();
            $totalJumlahTransaksi = $this->transaksiModel
                ->where('user_id', $user_id)
                ->selectSum('jumlah_transaksi')
                ->get()
                ->getRow()
                ->jumlah_transaksi;

            $formattedTotalJumlahTransaksi = 'Rp ' . number_format($totalJumlahTransaksi, 0, ',', '.');

            $data = [
                'title' => 'Dashboard',
                'act' => 'dashboard',
                'biodata' => $biodataModel->findAll(),
                'pesanan' => $pesanan,
                'tiket' => $ticket,
                'countTransaksi' => $formattedTotalJumlahTransaksi,
                'countTransaksiSuccess' => $successCount,
                'countTransaksiFail' => $failedPendingCount,
            ];
            return view('apps/index', $data);
        } else {
            $biodataModel = new BiodataModel();
            $userModel = new UserModel();

            $user_id = session('user_id');

            $successCount = $this->transaksiModel
                ->where('user_id', $user_id)
                ->where('status_pembayaran', 'Success')
                ->countAllResults();

            $pesanan = $this->transaksiModel
                ->where('user_id', $user_id)
                ->whereIn('status_pembayaran', ['Success', 'Pending', 'Failed'])
                ->countAllResults();

            $ticket = $this->tiketModel
                ->where('user_id', $user_id)
                ->countAllResults();

            $failedPendingCount = $this->transaksiModel
                ->where('user_id', $user_id)
                ->whereIn('status_pembayaran', ['Failed', 'Pending'])
                ->countAllResults();
            $totalJumlahTransaksi = $this->transaksiModel
                ->where('user_id', $user_id)
                ->selectSum('jumlah_transaksi')
                ->get()
                ->getRow()
                ->jumlah_transaksi;

            $formattedTotalJumlahTransaksi = 'Rp ' . number_format($totalJumlahTransaksi, 0, ',', '.');

            $data = [
                'title' => 'Dashboard',
                'act' => 'dashboard',
                'biodata' => $biodataModel->findAll(),
                'pesanan' => $pesanan,
                'tiket' => $ticket,
                'countTransaksi' => $formattedTotalJumlahTransaksi,
                'countTransaksiSuccess' => $successCount,
                'countTransaksiFail' => $failedPendingCount,
            ];
            return view('apps/index', $data);
        }
    }
}
