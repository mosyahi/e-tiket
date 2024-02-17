<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TiketModel;
use App\Models\BiodataModel;
use App\Models\PesananModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class PesananController extends BaseController
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
            'act' => 'bus',
            'title' => 'Pesanan Tiket Bus',
            'pesanan' => $pesanan,
            'biodata' => $biodata,
            'transaksi' => $transaksi,
            'user' => $user,
            'tiket' => $tiket,
        ];

        return view('apps/pemesanan', $data);
    }

    public function kereta()
    {
        $pesanan = $this->pesananModel->findAll();
        $transaksi = $this->transaksiModel->findAll();
        $biodata = $this->biodataModel->findAll();
        $user = $this->userModel->findAll();
        $tiket = $this->tiketModel->findAll();

        $data = [
            'act' => 'kereta',
            'title' => 'Pesanan Tiket Kereta',
            'pesanan' => $pesanan,
            'biodata' => $biodata,
            'transaksi' => $transaksi,
            'user' => $user,
            'tiket' => $tiket,
        ];

        return view('apps/pemesanan', $data);
    }

    public function angkutan()
    {
        $pesanan = $this->pesananModel->findAll();
        $transaksi = $this->transaksiModel->findAll();
        $biodata = $this->biodataModel->findAll();
        $user = $this->userModel->findAll();
        $tiket = $this->tiketModel->findAll();

        $data = [
            'act' => 'angkutan',
            'title' => 'Pesanan Tiket Angkutan',
            'pesanan' => $pesanan,
            'biodata' => $biodata,
            'transaksi' => $transaksi,
            'user' => $user,
            'tiket' => $tiket,
        ];

        return view('apps/pemesanan', $data);
    }

    public function kapal()
    {
        $pesanan = $this->pesananModel->findAll();
        $transaksi = $this->transaksiModel->findAll();
        $biodata = $this->biodataModel->findAll();
        $user = $this->userModel->findAll();
        $tiket = $this->tiketModel->findAll();

        $data = [
            'act' => 'kapal',
            'title' => 'Pesanan Tiket Kapal',
            'pesanan' => $pesanan,
            'biodata' => $biodata,
            'transaksi' => $transaksi,
            'user' => $user,
            'tiket' => $tiket,
        ];

        return view('apps/pemesanan', $data);
    }

    public function pesawat()
    {
        $pesanan = $this->pesananModel->findAll();
        $transaksi = $this->transaksiModel->findAll();
        $biodata = $this->biodataModel->findAll();
        $user = $this->userModel->findAll();
        $tiket = $this->tiketModel->findAll();

        $data = [
            'act' => 'pesawat',
            'title' => 'Pesanan Tiket Pesawat',
            'pesanan' => $pesanan,
            'biodata' => $biodata,
            'transaksi' => $transaksi,
            'user' => $user,
            'tiket' => $tiket,
        ];

        return view('apps/pemesanan', $data);
    }

    public function delete($id)
    {
        $pesananModel = new PesananModel();
        $transaksiModel = new TransaksiModel();

        $existingRecord = $pesananModel->find($id);

        if (!$existingRecord) {
            session()->setFlashdata('error', 'Record not found.');
            return redirect()->back()->with('error', 'Data gagal dihapus.');
        }

        $pemesananId = $existingRecord['id_pemesanan'];

        $pesananModel->delete($id);

        $transaksiModel->where('pemesanan_id', $pemesananId)->delete();

        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->back();
    }
}
