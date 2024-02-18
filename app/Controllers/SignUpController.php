<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\BiodataModel;
use App\Models\OtpModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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

        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'no_telepon'        => $this->request->getPost('no_telepon'),
            'tanggal_lahir'          => $this->request->getPost('tanggal_lahir'),
            'alamat'          => $this->request->getPost('alamat'),
            'nomor_ktp'          => $this->request->getPost('nomor_ktp'),
            'foto_ktp'           => $this->request->getFile('foto_ktp'),
            // 'user_id'       => $userModel->getInsertID(),
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

        $otp = $this->generateOTP();

        if ($this->kirimOtp($generate['email'], $otp)) {
            session()->setTempdata('registration_data', $generate, 300);
            session()->setTempdata('registration_bio', $data, 300);

            return redirect()->to('verifikasi-otp')->with('success', 'Kode OTP sudah terkirim. Silakan cek Email anda!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal mengirimkan email OTP. Silakan coba lagi.');
        }

        session()->setFlashdata('success', 'Registrasi Berhasil, Silahkan Login!');
        return redirect()->to('/');
    }

    public function verif()
    {
        $session = session();
        $registrationData = $session->getTempdata('registration_data');
        $registrationBio = $session->getTempdata('registration_bio');

        // Jika data registrasi tidak ada dalam sesi, arahkan pengguna kembali ke halaman pendaftaran
        if (!$registrationData) {
            return redirect()->to('register')->with('error', 'Silakan melakukan pendaftaran terlebih dahulu.');
        }

        if ($this->request->getMethod() === 'post') {
            $otp = $this->request->getPost('otp');

            if ($this->verificationOtp($otp)) {

                $model = new UserModel();
                $modelBio = new BiodataModel();
                // $model->insert($registrationData);
                // $modelBio->insert($registrationBio);

                $userId = $model->insert($registrationData);
                $registrationBio['user_id'] = $userId;
                $dataBiodata = [
                    'nama_lengkap' => $registrationBio['nama_lengkap'],
                    'no_telepon' => $registrationBio['no_telepon'],
                    'tanggal_lahir' => $registrationBio['tanggal_lahir'],
                    'alamat' => $registrationBio['alamat'],
                    'nomor_ktp' => $registrationBio['nomor_ktp'],
                    'foto_ktp' => $registrationBio['foto_ktp'],
                    'user_id' => $registrationBio['user_id'],
                ];

                $newName = $dataBiodata['foto_ktp'];
                $uploadedFile = $this->request->getFile('foto_ktp');

                if ($uploadedFile && $uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
                    $uploadedFile->move('./files', $newName);
                }

                $modelBio->insert($dataBiodata);

                $this->deleteOTPFromDB($otp);

                $session->removeTempdata('registration_data');
                $session->removeTempdata('registration_bio');

                return redirect()->to('/')->with('success', 'Registrasi berhasil. Silakan login.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Kode OTP tidak valid. Silakan coba lagi.');
            }
        }

        $hello = [
            'title' => 'Verifikasi OTP'
        ];

        return view('sign/verification', $hello);
    }

    public function kirimOtp($email, $otp)
    {
        $model = new OTPModel();
        $data = [
            'email' => $email,
            'otp' => $otp,
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($model->insert($data)) {
            return $this->sendOTP($email, $otp);
        } else {
            return false;
        }
    }

    public function sendOTP($email, $otp)
    {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ptpintex6@gmail.com';
            $mail->Password = 'gdwsdthvsrfvdrmk';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('ptpintex6@gmail.com', 'Market-Shoot');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'OTP Registrasi Dig-Market';

            // $emailMessage = '<html>';
            // $emailMessage .= '<head>';
            // $emailMessage .= '<style>';
            // $emailMessage .= '.body { font-family: Arial, sans-serif; color: #333; }';
            // $emailMessage .= '.container { max-width: 600px; margin: 0 auto; padding: 20px; background-color: #ffff; }';
            // $emailMessage .= '.logo { display: block; margin: 0 auto; }';
            // $emailMessage .= 'h1 { text-align: center; margin-bottom: 20px; }';
            // $emailMessage .= 'table { width: 100%; }';
            // $emailMessage .= 'td { padding: 10px; text-align: center; }';
            // $emailMessage .= 'strong { font-weight: bold; }';
            // $emailMessage .= '</style>';
            // $emailMessage .= '</head>';
            // $emailMessage .= '<body>';
            // $emailMessage .= '<div class="container">';
            // $emailMessage .= '<img src="https://songsofsyx.com/wiki/images/9/9e/Lock_icon.png" alt="Logo" class="logo" style="width: 50px; height: 50px;">';
            // $emailMessage .= '<h1>Kode OTP</h1>';
            // $emailMessage .= '<table>';
            // $emailMessage .= '<tr><td style="background-color: #eee;"><strong> OTP Anda : ' . $otp . '</strong></td></tr>';
            // $emailMessage .= '</table>';
            // $emailMessage .= '</div>';
            // $emailMessage .= '</body>';
            // $emailMessage .= '</html>';

            $emailMessage = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, .1);
        }

        .header {
            background-color: #91b6ff;
            color: #fff;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .header img {
            max-width: 100px;
        }

        .header h1 {
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        table {
            width: 100%;
        }

        table td {
            padding: 8px;
        }

        .footer {
            text-align: center;
            background-color: #91b6ff;
            padding: 10px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .footer p {
            color: #fff;
            display: inline-block;
            margin: 0 10px;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
        }

        .footer img {
            width: 24px;
            height: 24px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://songsofsyx.com/wiki/images/9/9e/Lock_icon.png" alt="Logo Perusahaan">
            <h1>Langkah Terakhir Untuk Registrasi</h1>
        </div>
        <div class="content">
            <table>
                <tr>
                    <td style="text-align: center;">
                        Kode OTP : <strong style="font-size: 20px;">' . $otp . '</strong>
                    </td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p><a href="https://www.instagram.com/"><img src="https://seeklogo.com/images/I/instagram-logo-1494D6FE63-seeklogo.com.png" alt="Instagram" class="social-icon"> Instagram</a></p>
            <p><a href="https://example.com"><img src="https://freepngimg.com/thumb/whatsapp/4-2-whatsapp-transparent.png" alt="WhatsApp" class="social-icon"> WhatsApp</a></p>
        </div>
    </div>
</body>
</html>';


            $mail->Body = $emailMessage;

            $mail->send();
            return $otp;
        } catch (Exception $e) {
            return false;
        }
    }


    protected function verificationOtp($otp)
    {
        $model = new OTPModel();
        $otpData = $model->where('otp', $otp)->first();

        if ($otpData) {
            if (hash_equals($otpData['otp'], $otp)) {
                $createdAt = strtotime($otpData['created_at']);
                $currentTime = time();

                if ($currentTime - $createdAt <= 300) {
                    return true;
                }
            }
        }

        return false;
    }


    protected function deleteOTPFromDB($otp)
    {
        $model = new OTPModel();
        $model->where('otp', $otp)->delete();
    }

    protected function generateOTP($length = 6)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $otp = '';
        $charactersLength = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $otp .= $characters[rand(0, $charactersLength - 1)];
        }

        return $otp;
    }
}
