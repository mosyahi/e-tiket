<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BiodataModel;
use App\Models\UserModel;

class DataDiriController extends BaseController
{
    public function index()
    {
        $biodataModel = new BiodataModel();
        $userModel = new UserModel();
        $data = [
            'title' => 'Data Diri Penjual',
            'act' => 'penjual',
            'biodata' => $biodataModel->findAll(),
            'user' => $userModel->findAll(),
        ];
        return view('apps/biodata/index', $data);
    }

    public function pembeli()
    {
        $biodataModel = new BiodataModel();
        $userModel = new UserModel();
        $data = [
            'title' => 'Data Diri Pembeli',
            'act' => 'pembeli',
            'biodata' => $biodataModel->findAll(),
            'user' => $userModel->findAll(),
        ];
        return view('apps/biodata/index', $data);
    }

    public function create()
    {
        $biodataModel = new BiodataModel();
        $userModel = new UserModel();

        $password = 'User.123';
        $password = password_hash($password, PASSWORD_DEFAULT);

        $generate = [
            'nama' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
            'status' => '1',
            'password' => $password,
        ];

        $userModel->insert($generate);

        $id_user = $userModel->getInsertID();
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'no_telepon'        => $this->request->getPost('no_telepon'),
            'tanggal_lahir'          => $this->request->getPost('tanggal_lahir'),
            'alamat'          => $this->request->getPost('alamat'),
            'nomor_ktp'          => $this->request->getPost('nomor_ktp'),
            'foto_ktp'           => $this->request->getFile('foto_ktp'),
            'user_id'       => $id_user,
        ];

        if ($data['foto_ktp']->isValid() && !$data['foto_ktp']->hasMoved()) {
            $newName = $data['foto_ktp']->getRandomName();
            $data['foto_ktp']->move('./files', $newName);
            $data['foto_ktp'] = $newName;
        }

        $biodataModel->insert($data);

        session()->setFlashdata('success', 'Biodata berhasil ditambahkan!');
        return redirect()->back();
    }

    public function update($id)
    {
        $biodataModel = new BiodataModel();

        $data = [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'no_telepon'   => $this->request->getVar('no_telepon'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'alamat'        => $this->request->getVar('alamat'),
            'nomor_ktp'     => $this->request->getVar('nomor_ktp'),
        ];

        $biodataModel->update($id, $data);

        session()->setFlashdata('success', 'Biodata berhasil diupdate!');
        return redirect()->back();
    }

    public function delete($id)
    {
        $biodataModel = new BiodataModel();
        $userModel = new UserModel();

        $existingRecord = $biodataModel->find($id);
        if (!$existingRecord) {
            session()->setFlashdata('error', 'Record not found.');
            return redirect()->to(base_url('admin/customer'));
        }

        $photoPath = './files/' . $existingRecord['foto_ktp'];
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }

        $biodataModel->delete($id);

        $userId = $existingRecord['user_id'];
        $userModel->delete($userId);

        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->back();
    }
}
