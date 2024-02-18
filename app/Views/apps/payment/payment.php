<?= $this->extend('layouts/master-front-end') ?>
<?= $this->section('content') ?>

<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../../../template/plugins/assets/img/icons/spot-illustrations/corner-4.png);opacity: 1;">
    </div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
        <h5>Order Details: #<?= $pay['order_id'] ?></h5>
        <p class="fs--1"><?= date_create($pay['created_at'])->format('l, j F Y, H:i T'); ?>
        </p>
        <div><strong class="me-2">Status: </strong>
            <div class="badge rounded-pill badge-soft-warning fs--2">Proses Pembayaran<span class="fas fa-clock ms-1" data-fa-transform="shrink-2"></span></div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <h5 class="mb-3 fs-0">Biodata Pembeli</h5>
                <h6 class="mb-2"><?= $biodata['nama_lengkap'] ?></h6>
                <p class="mb-1 fs--1"><?= $biodata['alamat'] ?></p>
                <p class="mb-0 fs--1"> <strong>Email: </strong><a href="mailto:<?= $user['email'] ?>"><?= $user['email'] ?></a></p>
                <p class="mb-0 fs--1"> <strong>Phone: </strong><a href="tel:<?= $biodata['no_telepon'] ?>"><?= $biodata['no_telepon'] ?></a></p>
                <p class="mb-0 fs--1"> <strong>KTP: </strong><a href="tel:<?= $biodata['nomor_ktp'] ?>"><?= $biodata['no_telepon'] ?></a></p>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <h5 class="mb-3 fs-0">Detail Tiket</h5>
                <h6 class="mb-2"><?= $tiket['nama_tiket'] ?></h6>
                <p class="mb-1 fs--1"><?= $tiket['alamat_tiket'] ?></p>
                <p class="mb-0 fs--1 mt-2"> <strong>Jenis: </strong>
                    <?php if (1 == $tiket['jenis_tiket']) : ?>
                        <span class="badge badge rounded-pill badge-soft-secondary text-dark">TRANSPORTASI DARAT</span>
                    <?php elseif (2 == $tiket['jenis_tiket']) : ?>
                        <span class="badge badge rounded-pill badge-soft-secondary text-dark">TRANSPORTASI LAUT</span>
                    <?php else : ?>
                        <span class="badge badge rounded-pill badge-soft-secondary text-dark">TRANSPORTASI UDARA</span>
                    <?php endif ?>
                </p>
                <p class="mb-0 fs--1 mt-2"> <strong>Transpoprtasi: </strong>
                    <?php if (1 == $tiket['jenis_transportasi']) : ?>
                        <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                    <?php elseif (2 == $tiket['jenis_transportasi']) : ?>
                        <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                    <?php elseif (3 == $tiket['jenis_transportasi']) : ?>
                        <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                    <?php elseif (4 == $tiket['jenis_transportasi']) : ?>
                        <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                    <?php else : ?>
                        <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                    <?php endif ?>
                </p>
                <p class="mb-0 fs--1 mt-2"> <strong>CP Penjual : </strong> <?= $tiket['no_telepon'] ?></p>
            </div>
            <div class="col-md-6 col-lg-4">
                <h5 class="mb-3 fs-0">Payment Method</h5>
                <div class="d-flex"><img class="me-3" src="<?= base_url() ?>template/plugins/assets/img/icons/visa.png" width="40" height="30" alt="" />
                    <div class="flex-1">
                        <h6 class="mb-0">MIDTRANS</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="table-responsive fs--1">
            <table class="table table-striped border-bottom">
                <thead class="bg-200 text-900">
                    <tr>
                        <th class="border-0 text-center">Qty</th>
                        <th class="border-0 text-center">Tiket</th>
                        <th class="border-0 text-center">Jenis</th>
                        <th class="border-0 text-end">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-200">
                        <td class="align-middle text-center">1 Ticket</td>
                        <td class="align-middle text-center">
                            <h6 class="mb-0 text-center">
                                <?php if (1 == $tiket['jenis_transportasi']) : ?>
                                    BUS
                                <?php elseif (2 == $tiket['jenis_transportasi']) : ?>
                                    KERETA
                                <?php elseif (3 == $tiket['jenis_transportasi']) : ?>
                                    ANGKUTAN UMUM
                                <?php elseif (4 == $tiket['jenis_transportasi']) : ?>
                                    KAPAL
                                <?php else : ?>
                                    PESAWAT
                                <?php endif ?>
                            </h6>
                            <p class="mb-0">Jalur : <?= $tiket['alamat_tiket'] ?></p>
                        </td>
                        <td class="align-middle text-center">
                            <?php if (1 == $tiket['jenis_tiket']) : ?>
                                Transportasi Darat
                            <?php elseif (2 == $tiket['jenis_tiket']) : ?>
                                Transportasi Laut
                            <?php else : ?>
                                Transportasi Udara
                            <?php endif ?>
                        </td>
                        <td class="align-middle text-end">
                            RP <?= number_format($tiket['harga_tiket'], 0, ',', '.'); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row g-0 justify-content-end">
            <div class="col-auto">
                <table class="table table-sm table-borderless fs--1 text-end">
                    <tr>
                        <th class="text-900">Subtotal:</th>
                        <td class="fw-semi-bold">RP <?= number_format($tiket['harga_tiket'], 0, ',', '.'); ?> </td>
                    </tr>
                    <tr class="border-top">
                        <th class="text-900">Total:</th>
                        <td class="fw-semi-bold">RP <?= number_format($tiket['harga_tiket'], 0, ',', '.'); ?> </td>
                    </tr>
                </table>
                <a class="btn btn-sm btn-secondary" href="<?= base_url('admin/detail/tiket-darat') ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Batal Pembayaran"><span class="fas fa-times"></span> Cancel</a>
                <button class="btn btn-sm btn-primary" id="pay-button"><span class="fas fa-shopping-cart"></span> Bayar Sekarang</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripting') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= config('Midtrans')->clientKey ?>"></script>
<?php if (session('role') == 1) : ?>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            snap.pay('<?= $snapToken ?>', {
                onSuccess: function(result) {
                    var orderId = result.order_id;
                    var paymentMethod = result.payment_type;
                    updateTransactionStatus(orderId, 'Success', paymentMethod);
                },
                onPending: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    document.getElementById('payment-status').innerHTML = 'Payment is pending...';

                    updateTransactionStatus('Pending');
                },
                onError: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    document.getElementById('payment-status').innerHTML = 'Payment failed!';

                    updateTransactionStatus('Failed');
                }
            });
        };

        function updateTransactionStatus(orderId, status, paymentMethod) {
            $.ajax({
                url: '<?= base_url('admin/payment/update/') ?>' + orderId,
                method: 'POST',
                data: {
                    status: status,
                    order_id: orderId,
                    payment_method: paymentMethod
                },
                success: function(response) {
                    console.log('Transaction status updated on the server.');
                    window.location.href = '<?= base_url('admin/payment/billing/SdzC64i0Nt8mRsEUK6eK1q4npbrh1pDI128sEi35WPCrz97eVB') ?>';
                },
                error: function(error) {
                    console.error('Error updating transaction status:', error);
                }
            });
        }
    </script>
<?php elseif (session('role') == 2) : ?>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            snap.pay('<?= $snapToken ?>', {
                onSuccess: function(result) {
                    var orderId = result.order_id;
                    var paymentMethod = result.payment_type;
                    updateTransactionStatus(orderId, 'Success', paymentMethod);
                },
                onPending: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    document.getElementById('payment-status').innerHTML = 'Payment is pending...';

                    updateTransactionStatus('Pending');
                },
                onError: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    document.getElementById('payment-status').innerHTML = 'Payment failed!';

                    updateTransactionStatus('Failed');
                }
            });
        };

        function updateTransactionStatus(orderId, status, paymentMethod) {
            $.ajax({
                url: '<?= base_url('penjual/payment/update/') ?>' + orderId,
                method: 'POST',
                data: {
                    status: status,
                    order_id: orderId,
                    payment_method: paymentMethod
                },
                success: function(response) {
                    console.log('Transaction status updated on the server.');
                    window.location.href = '<?= base_url('penjual/payment/billing/SdzC64i0Nt8mRsEUK6eK1q4npbrh1pDI128sEi35WPCrz97eVB') ?>';
                },
                error: function(error) {
                    console.error('Error updating transaction status:', error);
                }
            });
        }
    </script>
<?php else : ?>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            snap.pay('<?= $snapToken ?>', {
                onSuccess: function(result) {
                    var orderId = result.order_id;
                    var paymentMethod = result.payment_type;
                    updateTransactionStatus(orderId, 'Success', paymentMethod);
                },
                onPending: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    document.getElementById('payment-status').innerHTML = 'Payment is pending...';

                    updateTransactionStatus('Pending');
                },
                onError: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    document.getElementById('payment-status').innerHTML = 'Payment failed!';

                    updateTransactionStatus('Failed');
                }
            });
        };

        function updateTransactionStatus(orderId, status, paymentMethod) {
            $.ajax({
                url: '<?= base_url('pembeli/payment/update/') ?>' + orderId,
                method: 'POST',
                data: {
                    status: status,
                    order_id: orderId,
                    payment_method: paymentMethod
                },
                success: function(response) {
                    console.log('Transaction status updated on the server.');
                    window.location.href = '<?= base_url('pembeli/payment/billing/SdzC64i0Nt8mRsEUK6eK1q4npbrh1pDI128sEi35WPCrz97eVB') ?>';
                },
                error: function(error) {
                    console.error('Error updating transaction status:', error);
                }
            });
        }
    </script>
<?php endif ?>
<?= $this->endSection() ?>