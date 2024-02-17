<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TiketModel;
use App\Models\BiodataModel;
use App\Models\PesananModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class TransaksiController extends BaseController
{
    protected $pesananModel;
    protected $transaksiModel;
    protected $biodataModel;
    protected $userModel;
    protected $tiketModel;

    public function __construct()
    {
        $this->pesananModel = new PesananModel();
        $this->transaksiModel = new TransaksiModel();
        $this->biodataModel = new BiodataModel();
        $this->userModel = new UserModel();
        $this->tiketModel = new TiketModel();
    }

    public function bus()
    {
        $pesanan = $this->pesananModel->findAll();
        $transaksi = $this->transaksiModel->findAll();
        $biodata = $this->biodataModel->findAll();
        $user = $this->userModel->findAll();
        $tiket = $this->tiketModel->findAll();

        $data = [
            'act' => 'pay-bus',
            'title' => 'Transaksi Tiket Bus',
            'pesanan' => $pesanan,
            'biodata' => $biodata,
            'transaksi' => $transaksi,
            'user' => $user,
            'tiket' => $tiket,
        ];

        return view('apps/transaksi', $data);
    }

    public function kereta()
    {
        $pesanan = $this->pesananModel->findAll();
        $transaksi = $this->transaksiModel->findAll();
        $biodata = $this->biodataModel->findAll();
        $user = $this->userModel->findAll();
        $tiket = $this->tiketModel->findAll();

        $data = [
            'act' => 'pay-kereta',
            'title' => 'Transaksi Tiket Kereta',
            'pesanan' => $pesanan,
            'biodata' => $biodata,
            'transaksi' => $transaksi,
            'user' => $user,
            'tiket' => $tiket,
        ];

        return view('apps/transaksi', $data);
    }

    public function angkutan()
    {
        $pesanan = $this->pesananModel->findAll();
        $transaksi = $this->transaksiModel->findAll();
        $biodata = $this->biodataModel->findAll();
        $user = $this->userModel->findAll();
        $tiket = $this->tiketModel->findAll();

        $data = [
            'act' => 'pay-angkutan',
            'title' => 'Transaksi Tiket Angkutan',
            'pesanan' => $pesanan,
            'biodata' => $biodata,
            'transaksi' => $transaksi,
            'user' => $user,
            'tiket' => $tiket,
        ];

        return view('apps/transaksi', $data);
    }

    public function kapal()
    {
        $pesanan = $this->pesananModel->findAll();
        $transaksi = $this->transaksiModel->findAll();
        $biodata = $this->biodataModel->findAll();
        $user = $this->userModel->findAll();
        $tiket = $this->tiketModel->findAll();

        $data = [
            'act' => 'pay-kapal',
            'title' => 'TransaksiTiket Kapal',
            'pesanan' => $pesanan,
            'biodata' => $biodata,
            'transaksi' => $transaksi,
            'user' => $user,
            'tiket' => $tiket,
        ];

        return view('apps/transaksi', $data);
    }

    public function pesawat()
    {
        $pesanan = $this->pesananModel->findAll();
        $transaksi = $this->transaksiModel->findAll();
        $biodata = $this->biodataModel->findAll();
        $user = $this->userModel->findAll();
        $tiket = $this->tiketModel->findAll();

        $data = [
            'act' => 'pay-pesawat',
            'title' => 'Transaksi Tiket Pesawat',
            'pesanan' => $pesanan,
            'biodata' => $biodata,
            'transaksi' => $transaksi,
            'user' => $user,
            'tiket' => $tiket,
        ];

        return view('apps/transaksi', $data);
    }

    public function delete($id)
    {
        $transaksiModel = new TransaksiModel();
        $pesananModel = new PesananModel();

        $transaksiModel->transBegin();

        try {
            $existingRecord = $transaksiModel->find($id);

            if (!$existingRecord) {
                throw new \Exception('Data tidak ditemukan.');
            }

            $pemesananId = $existingRecord['pemesanan_id'];
            $transaksiModel->delete($id);
            $pesananModel->where('id_pemesanan', $pemesananId)->delete();

            $transaksiModel->transCommit();

            session()->setFlashdata('success', 'Data berhasil dihapus.');
            return redirect()->back();
        } catch (\Exception $e) {
            $transaksiModel->transRollback();

            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->with('error', 'Data gagal dihapus.');
        }
    }
}
