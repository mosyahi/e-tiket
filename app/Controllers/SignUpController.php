<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\BiodataModel;

class SignUpController extends BaseController
{
    public function index()
    {
        $biodataModel = new BiodataModel();
        $userModel = new UserModel();

        $password = $this->request->getPost('password');
        $password = password_hash($password, PASSWORD_DEFAULT);

        $generate = [
            'nama' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
            'status' => '1',
            'password' => $password,
        ];

        $existingEmail = $userModel->where('email', $generate['email'])->first();
        if ($existingEmail) {
            return redirect()->to('register')->with('error', 'Email sudah digunakan.');
        }

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

        $cekktp = $biodataModel->where('nomor_ktp', $data['nomor_ktp'])->first();
        $cekhp = $biodataModel->where('no_telepon', $data['no_telepon'])->first();
        if ($cekktp) {
            return redirect()->to('register')->with('error', 'Nomor KTP sudah terdaftar.');
        } elseif ($cekhp) {
            return redirect()->to('register')->with('error', 'Nomor HP sudah terdaftar.');
        }

        $biodataModel->insert($data);

        session()->setFlashdata('success', 'Registrasi Berhasil, Silahkan Login!');
        return redirect()->to('/');
    }
}
