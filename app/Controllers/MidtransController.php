<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Midtrans\Config as MidtransConfig;
use App\Models\TiketModel;
use App\Models\BiodataModel;
use App\Models\PesananModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class MidtransController extends BaseController
{
    public function index($orderId)
    {
        MidtransConfig::$serverKey = config('Midtrans')->serverKey;
        MidtransConfig::$clientKey = config('Midtrans')->clientKey;
        MidtransConfig::$isProduction = false;

        date_default_timezone_set('Asia/Jakarta');
        $tanggalPembelian = date('Y-m-d H:i');
        $tanggalSelesai = date('Y-m-d H:i', strtotime($tanggalPembelian . ' +1 day'));

        $tiket = new TiketModel();
        $tiketModel = $tiket->where('id_tiket', $orderId)->first();

        if (!$tiketModel) {
            return redirect()->back();
        }

        $biodataModel = new BiodataModel();
        $biodataData = $biodataModel->where('id_biodata', $tiketModel['biodata_id'])->first();

        $userModel = new UserModel();
        $userData = $userModel->where('id_user', $tiketModel['user_id'])->first();

        $firstName = $biodataData['nama_lengkap'] ?? 'Guest';
        $order_id = time();

        $transaction = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $tiketModel['harga_tiket'],
            ],
            'customer_details' => [
                'first_name' => $firstName,
                'email' => session('email'),
                'phone' => $biodataData['no_telepon'],
            ],
            'finish_redirect_url' => base_url('admin/payment/update/' . $orderId),
        ];

        $midtrans = new \Midtrans\Snap();
        $snapToken = $midtrans->getSnapToken($transaction);

        $pesananModel = new PesananModel();
        $pesananData = [
            'user_id' => $biodataData['user_id'],
            'biodata_id' => $biodataData['id_biodata'],
            'tiket_id' => $tiketModel['id_tiket'],
            'tanggal_pembelian' => $tanggalPembelian,
            'tanggal_selesai' => $tanggalSelesai,
            'no_telepon' => $biodataData['no_telepon'],
        ];
        $pesananModel->insert($pesananData);
        $pemesanan = $pesananModel->getInsertID();

        $transaksiModel = new TransaksiModel();
        $transaksiData = [
            'user_id' => $biodataData['user_id'],
            'order_id' => $order_id,
            'tiket_id' => $tiketModel['id_tiket'],
            'pemesanan_id' => $pesananModel->insertID(),
            'jumlah_transaksi' => $tiketModel['harga_tiket'],
            'metode_pembayaran' => 'Midtrans',
            'status_pembayaran' => 'Pending',
        ];
        $transaksiModel->insert($transaksiData);
        $pay = $transaksiModel->getInsertID();

        $data = [
            'snapToken' => $snapToken,
            'tiket' => $tiketModel,
            'biodata' => $biodataData,
            'user' => $userData,
            'pay' => $transaksiModel->find($pay),
            'pesanan' => $pemesanan,
            'title' => 'Payment',
            'act' => 'tiket',
        ];

        return view('apps/payment/payment', $data);
    }


    public function update($orderId)
    {
        $status = $this->request->getPost('status');
        $paymentMethod = $this->request->getPost('payment_method');

        if (empty($status) || empty($orderId)) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Invalid request']);
        }

        $transaksiModel = new TransaksiModel();
        $transaksiModel->where('order_id', $orderId)->set([
            'status_pembayaran' => $status,
            'metode_pembayaran' => strtoupper($paymentMethod)
        ])->update();

        return redirect()->to('admin/payment/billing/SdzC64i0Nt8mRsEUK6eK1q4npbrh1pDI128sEi35WPCrz97eVB')->with('success', 'Pembayaran berhasil!');
    }

    public function billing()
    {
        $data = [
            'act' => 'tiket',
            'title' => 'Billing Payment',
        ];

        return view('apps/payment/billing', $data);
    }
}
