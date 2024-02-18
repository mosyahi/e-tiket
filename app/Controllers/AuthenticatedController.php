<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\BiodataModel;

class AuthenticatedController extends BaseController
{
    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $biodataModel = new BiodataModel();
        $user = $userModel->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            if ($user['status'] == '1') {
                $session = \Config\Services::session();
                $session->set('auth', true);
                $session->set('nama', $user['nama']);
                $session->set('email', $user['email']);
                $session->set('role', $user['role']);
                $session->set('status', $user['status']);
                $session->set('id_user', $user['id_user']);

                if ($user['role'] == '2') {
                    $biodataModel = new BiodataModel();
                    $biodata = $biodataModel->getBiodataByUserId($user['id_user']);
                    if ($biodata) {
                        $session->set('user_id', $biodata['user_id']);
                        $session->set('biodata_id', $biodata['id_biodata']);
                    }
                    return redirect()->to('penjual/dashboard')->with('success', 'Login Berhasil.');
                } elseif ($user['role'] == '3') {
                    $biodataModel = new BiodataModel();
                    $biodata = $biodataModel->getBiodataByUserId($user['id_user']);
                    if ($biodata) {
                        $session->set('user_id', $biodata['user_id']);
                        $session->set('biodata_id', $biodata['id_biodata']);
                    }
                    return redirect()->to('pembeli/dashboard')->with('success', 'Login Berhasil.');
                }

                return redirect()->to('admin/dashboard')->with('success', 'Login Berhasil.');
            } else {
                $session = \Config\Services::session();
                $session->setFlashdata('error', 'Akun Anda tidak aktif. Silahkan hubungi <a href="https://wa.me/628988658838" target="blank" class="text-primary">&nbsp;Admin</a>');
                return redirect()->to('/');
            }
        }

        $session = \Config\Services::session();
        $session->setFlashdata('error', 'Email atau Password Anda Salah');
        return redirect()->to('/');
    }


    public function register(): string
    {
        $data = [
            'title' => 'Sign-Up'
        ];
        return view('sign/sign-up', $data);
    }


    public function logout()
    {
        $session = session();
        $session->destroy();
        $session = \Config\Services::session();
        $session->setFlashdata('success', 'Sign-Out Berhasil.');
        return redirect()->to('/');
    }
}
