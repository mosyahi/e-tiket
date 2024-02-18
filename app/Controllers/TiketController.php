<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TiketModel;
use App\Models\BiodataModel;
use App\Models\UserModel;

class TiketController extends BaseController
{
    // PERHATIAN BACA!
    // Jenis_Tiket => Darat = 1, Laut = 2, Udara = 3
    // Jenis_Transportasi => Bus = 1, Kereta = 2, Angkutan Umum = 3, Kapal = 4, Pesawat = 5

    public function darat()
    {
        $tiketModel = new TiketModel();
        $biodataModel = new BiodataModel();
        $userModel = new UserModel();
        $data = [
            'title' => 'Data Tiket Transaportasi Darat',
            'act' => 'tiket-darat',
            'tiket' => $tiketModel->findAll(),
            'biodata' => $biodataModel->findAll(),
            'user' => $userModel->findAll(),
        ];
        return view('apps/tiket/index', $data);
    }

    public function laut()
    {
        $tiketModel = new TiketModel();
        $biodataModel = new BiodataModel();
        $userModel = new UserModel();
        $data = [
            'title' => 'Data Tiket Transaportasi Laut',
            'act' => 'tiket-laut',
            'tiket' => $tiketModel->findAll(),
            'biodata' => $biodataModel->findAll(),
            'user' => $userModel->findAll(),
        ];
        return view('apps/tiket/index', $data);
    }

    public function udara()
    {
        $tiketModel = new TiketModel();
        $biodataModel = new BiodataModel();
        $userModel = new UserModel();
        $data = [
            'title' => 'Data Tiket Transaportasi Udara',
            'act' => 'tiket-udara',
            'tiket' => $tiketModel->findAll(),
            'biodata' => $biodataModel->findAll(),
            'user' => $userModel->findAll(),
        ];
        return view('apps/tiket/index', $data);
    }

    public function add()
    {
        $biodataModel = new BiodataModel();
        $userModel = new UserModel();

        $user = $userModel->findAll();
        $biodata = $biodataModel->findAll();

        $data = [
            'title' => 'add-List-Jasa',
            'active' => 'jasa',
            'user' => $user,
            'biodata' => $biodata,
        ];
        return view('pages/penjual/product-jasa/add-jasa', $data);
    }

    public function store()
    {
        $tiket = new TiketModel();
        $biodataModel = new BiodataModel();

        $biodata_id = $this->request->getPost('biodata_id');
        $biodata = $biodataModel->find($biodata_id);
        $user_id = $biodata['user_id'];
        $no_telepon_biodata = $biodata['no_telepon'];

        $data = [
            'biodata_id' => $biodata_id,
            'user_id' => $user_id,
            'nama_tiket' => $this->request->getPost('nama_tiket'),
            'jenis_tiket' => $this->request->getPost('jenis_tiket'),
            'jenis_transportasi' => $this->request->getPost('jenis_transportasi'),
            'harga_tiket' => $this->request->getPost('harga_tiket'),
            'jumlah_tiket' => $this->request->getPost('jumlah_tiket'),
            'alamat_tiket' => $this->request->getPost('alamat_tiket'),
            'no_telepon' => $no_telepon_biodata,
        ];

        $tiket->insert($data);

        session()->setFlashdata('success', 'Data tiket berhasil di tambahkan!');
        return redirect()->back();
    }

    public function update($id)
    {
        $tiket = new TiketModel();
        $biodataModel = new BiodataModel();

        $biodata_id = $this->request->getPost('biodata_id');
        $biodata = $biodataModel->find($biodata_id);
        $user_id = $biodata['user_id'];
        $no_telepon_biodata = $biodata['no_telepon'];

        $data = [
            'biodata_id' => $biodata_id,
            'user_id' => $user_id,
            'nama_tiket' => $this->request->getPost('nama_tiket'),
            'jenis_tiket' => $this->request->getPost('jenis_tiket'),
            'jenis_transportasi' => $this->request->getPost('jenis_transportasi'),
            'harga_tiket' => $this->request->getPost('harga_tiket'),
            'jumlah_tiket' => $this->request->getPost('jumlah_tiket'),
            'alamat_tiket' => $this->request->getPost('alamat_tiket'),
            'no_telepon' => $no_telepon_biodata,
        ];

        $tiket->update($id, $data);

        session()->setFlashdata('success', 'Data tiket berhasil di perbaharui!');
        return redirect()->back();
    }

    public function delete($id)
    {
        $tiketModel = new TiketModel();

        $existingRecord = $tiketModel->find($id);
        if (!$existingRecord) {
            session()->setFlashdata('error', 'Data tidak ditemukan');
            return redirect()->back();
        }

        $tiketModel->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function detail_darat()
    {
        $tiketModel = new TiketModel();
        $biodataModel = new BiodataModel();
        $userModel = new UserModel();
        $data = [
            'title' => 'Detail Tiket Transaportasi Darat',
            'act' => 'detail-tiket-darat',
            'tiket' => $tiketModel->findAll(),
            'biodata' => $biodataModel->findAll(),
            'user' => $userModel->findAll(),
        ];
        return view('apps/tiket/detail', $data);
    }

    public function detail_laut()
    {
        $tiketModel = new TiketModel();
        $biodataModel = new BiodataModel();
        $userModel = new UserModel();
        $data = [
            'title' => 'Detail Tiket Transaportasi Laut',
            'act' => 'detail-tiket-laut',
            'tiket' => $tiketModel->findAll(),
            'biodata' => $biodataModel->findAll(),
            'user' => $userModel->findAll(),
        ];
        return view('apps/tiket/detail', $data);
    }

    public function detail_udara()
    {
        $tiketModel = new TiketModel();
        $biodataModel = new BiodataModel();
        $userModel = new UserModel();
        $data = [
            'title' => 'Detail Tiket Transaportasi Udara',
            'act' => 'detail-tiket-udara',
            'tiket' => $tiketModel->findAll(),
            'biodata' => $biodataModel->findAll(),
            'user' => $userModel->findAll(),
        ];
        return view('apps/tiket/detail', $data);
    }
}
